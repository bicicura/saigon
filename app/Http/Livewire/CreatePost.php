<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Casting;
use App\Models\Fotografia;
use Illuminate\Support\Facades\Storage;
use Image;

class CreatePost extends Component
{

    use WithFileUploads;

    public $type;

    public $seccion = '';
    public $newThumbnail;
    public $nombre;
    public $productora;
    public $director;
    public $categoria = '';
    public $video_url;

    public $fotografias = [];

    // para cuando editas un casting.
    public $casting;
    public $avatarActual;

    public function formValidation() {
        
        $inputsToValidate = [
            'nombre' => 'required',
            'director' => 'required',
            'productora' => 'required',
            // 'categoria' => 'required',
            // 'video_url' => 'required',
        ];

        // si el user esta editando un perfil || si el user esta creando un nuevo perfil.
        if ($this->newThumbnail || !$this->newThumbnail && !$this->avatarActual) {
            $newAvatarValidation = ['newThumbnail' => 'image|max:1000'];
            $inputsToValidate = array_merge($inputsToValidate, $newAvatarValidation);
        }

        $this->validate($inputsToValidate);
        
    }

    public function formValidationFotografia() {
        
        $inputsToValidate = [
            'nombre' => 'required',
            'productora' => 'required',
            'director' => 'required',
            // 'categoria' => 'required',
        ];

        $this->validate($inputsToValidate);
        
    }

    // public function saveFotografias($CastingId) {
    //     $n = 0;
    //     foreach ($this->fotografias as $photo) {
    //         $filename = $photo->store('/', 'fotos');
    //         $Fotografia = new Fotografia;
    //         $Fotografia->casting_id = $CastingId;
    //         $Fotografia->order = $n;
    //         $Fotografia->img = $filename;
    //         $Fotografia->save();
    //         $n++;
    //     }
    // }

    public function saveFile($source_file) {
        $file = Image::make($source_file);
        // hago q mantenga su orientacion original
        $file->orientate()
        // la convertimos a jpg y reducimos la calidad al 80
        ->encode('jpg', 80)
        // la resizeamos, manteniendo el aspect ratio y prevenir que se amplíe.
        ->resize(1500, 1000, function($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        });
        //guardamos en directorio
        $file->save(storage_path('app/fotos/'.$file->filename.'.jpg'));

        // devuelvo el nombre del archivo + extensión.
        return $file->filename.'.jpg'; 
    }

    public function saveBook($castingId) {
        $n = 0;
        foreach ($this->fotografias as $photo) {
            $fileName = $this->saveFile($photo);
            // Creo instancia de Book
            $Fotografia = new Fotografia;
            // Le asigno el id del actor
            $Fotografia->casting_id = $castingId;
            // Le asigno un nro de orden
            $Fotografia->order = $n;
            // le agrego el nombre del archivo
            $Fotografia->img = $fileName;
            // guardo en db
            $Fotografia->save();
            // incremento el numero d orden +1
            $n++;
        }
    }

    public function updatedNewThumbnail() {
        $this->validate(['newThumbnail' => 'image|max:1000']);
    }

    public function storeAvatar() {
        return $this->newThumbnail->store('/', 'thumbnails');
    }

    public function save() {

        $this->executeValidation();

        $fileName = null;

        if ($this->seccion != 'Fotografía') $fileName = $this->storeAvatar();  
        
        $Casting = new Casting;
        
        $CastingId = $this->assignCastingValues($Casting, $fileName);

        if ($this->seccion === "Fotografía") {
            $this->saveBook($CastingId);
        }

        $Casting->save();

        // if ($this->seccion === 'Castings Fotografía') $this->saveFotografias($CastingId);

        // notificación de éxito
        session()->flash('success', 'Casting creado exitosamente! ❤️');
        //redireccionar
        return redirect()->to('/es/dashboard/castings');
        
    }

    public function savedNotification() {
        //evento del browser
        $this->dispatchBrowserEvent('notify', ['message' => 'Perfil guardado ❤️', 'status' => 'success']);
        //evento de livewire
        $this->emitSelf('notify-saved');
    }

    public function executeValidation() {

        if ($this->seccion === "Fotografía") {
            try {
                $this->formValidationFotografia();
            } catch (\Illuminate\Validation\ValidationException $e) {
                $this->dispatchBrowserEvent('notify', ['message' => '❌ ERROR Revise los campos.', 'status' => 'error']);
                $this->formValidationFotografia();
            }
        } else {
            try {
                $this->formValidation();
            } catch (\Illuminate\Validation\ValidationException $e) {
                $this->dispatchBrowserEvent('notify', ['message' => '❌ ERROR Revise los campos.', 'status' => 'error']);
                $this->formValidation();
            }
        }
    }

    public function update() {

        $this->executeValidation();

        $avatarFileName = $this->avatarActual;
        // si el user actualizo el avatar, se guarda en localmente y se borra el anterior.
        if ($this->newThumbnail) {
            // guardo el avatar nuevo en storage
            $avatarFileName = $this->storeAvatar();
            // borro el viejo
            Storage::disk('thumbnails')->delete($this->avatarActual);
        }

        $this->assignCastingValues($this->casting, $avatarFileName);

        $this->savedNotification();

    }

    public function assignCastingValues($Casting, $avatarFileName = null) { 

        $Casting->seccion = $this->seccion;
        $Casting->nombre = $this->nombre;
        $Casting->director = $this->director;
        $Casting->productora = $this->productora;
        $Casting->thumbnail = $avatarFileName;
        $Casting->categoria = $this->categoria;
        $Casting->url = $this->video_url;

        $Casting->save();

        return $Casting->id;
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}