<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Casting;
use App\Models\Fotografia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Image;

class CreatePost extends Component
{

    use WithFileUploads;

    public $type;

    public $thumbnailProvider = "vimeo";

    public $seccion = '';
    public $newThumbnail;
    public $nombre;
    public $productora;
    public $director;
    public $categoria = '';
    public $video_url;
    public $reel = 0;
    public $newReelVideo;

    public $fotografias = [];

    // para cuando editas un casting.
    public $casting;
    public $avatarActual;
    public $reelActual;

    public function formValidation() {
        
        $inputsToValidate = [
            'nombre' => 'required',
            'director' => 'required',
            'productora' => 'required',
            // 'categoria' => 'required',
            // 'video_url' => 'required',
        ];

        // si el user esta editando un perfil || si el user esta creando un nuevo perfil.
        if (($this->newThumbnail || !$this->newThumbnail && !$this->avatarActual) && $this->thumbnailProvider === 'custom') {
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
        // if ($this->seccion != 'Fotografía') $fileName = $this->storeAvatar();
        if ($this->thumbnailProvider === "vimeo") {
            $fileName = $this->getThumbnailFromProvider();
        } elseif ($this->thumbnailProvider === "custom") {
            $fileName = $this->storeAvatar();
        }
        
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
        $this->dispatchBrowserEvent('notify', ['message' => 'Casting editado exitosamente! ❤️', 'status' => 'success']);
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

        // El seteo reelName a null o al nombre del reel actual
        $reelName = $this->reelActual;

        // si se subió un  nuevo video para el reel
        if ($this->newReelVideo) {
            // se borra el anterior en caso de haber otro video ya establecido como reel
            if ($this->reelActual) { Storage::disk('reel')->delete($this->reelActual); }
            // se guarda el reel en el directorio reel
            $reelName = $this->newReelVideo->store('/', 'reel');
            // en caso de querer sacar el casting del reel, se borra el video que había
        } else if (!$this->newReelVideo && $this->reelActual && !$this->reel) {
            Storage::disk('reel')->delete($this->reelActual);
            $reelName = null;
        }

        $this->assignCastingValues($this->casting, $avatarFileName, $reelName);

        // notificación de éxito
        session()->flash('success', 'Casting editado exitosamente! ❤️');
        //redireccionar
        return redirect()->to('/es/dashboard/castings');
    }

    public function assignCastingValues($Casting, $avatarFileName = null, $reelName = null) { 

        $Casting->seccion = $this->seccion;
        $Casting->nombre = $this->nombre;
        // por si cambió el nombre del casting.
        $Casting->slug = null;
        $Casting->director = $this->director;
        $Casting->productora = $this->productora;
        $Casting->thumbnail = $avatarFileName;
        $Casting->categoria = $this->categoria;
        $Casting->url = $this->video_url;
        $Casting->reel = $this->reel;
        $Casting->reel_video = $reelName;

        $Casting->save();

        return $Casting->id;
    }

    // para subir thumbnail directo de Vimeo con el id del vid.
    public function getThumbnailFromProvider() {
        $url = 'https://vimeo.com/'.$this->video_url;
        $response = Http::get('https://vimeo.com/api/oembed.json?url='.$url);
        $thumbnail_url = $response['thumbnail_url'];

        $response = Http::get($thumbnail_url);

        $img = $response->body();
        $fileName = Str::random(50).'.jpg';

        file_put_contents('thumbnails/'.$fileName, $img);
        return $fileName;
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}