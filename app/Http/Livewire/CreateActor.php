<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actor;
use App\Models\Book;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Image;

class CreateActor extends Component
{

    use WithFileUploads;

    public $type;

    public $nombre;
    public $date_of_birth;
    public $nacionalidad;
    public $altura;
    public $imdb;
    public $ig;
    public $cv;
    public $videos;
    public $bio;
    public $newThumbnail;
    public $book = [];

    // para cuando editas un casting.
    public $actor;
    public $avatarActual;

    protected $rules = 
    [
        'nombre' => 'required',
        'nacionalidad' => 'required',
        'date_of_birth' => 'required|date',
        'altura' => 'required|integer|between:100,230',
    ];

    public function saveFile($source_file) {
        $file = Image::make($source_file);
        // hago q mantenga su orientacion original
        $file->orientate()
        // la convertimos a jpg y reducimos la calidad al 80
        ->encode('jpg', 80)
        // la resizeamos, manteniendo el aspect ratio y prevenir que se amplíe.
        ->resize(600, 800, function($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        });
        //guardamos en directorio
        $file->save(storage_path('app/actors/'.$file->filename.'.jpg'));

        // devuelvo el nombre del archivo + extensión.
        return $file->filename.'.jpg'; 
    }
    
    public function storeThumbnail() {

        $file = Image::make($this->newThumbnail);
        // hago q mantenga su orientacion original
        $file->orientate()
        // la convertimos a jpg y reducimos la calidad al 80
        ->encode('jpg', 80)
        // la resizeamos, manteniendo el aspect ratio y prevenir que se amplíe.
        ->resize(600, 800, function($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        });
        //guardamos en directorio
        $file->save(storage_path('app/actors/'.$file->filename.'.jpg'));

        return $file->filename.'.jpg';
    }

    public function saveBook($ActorId) {
        $n = 0;
        foreach ($this->book as $photo) {
            $fileName = $this->saveFile($photo);
            // Creo instancia de Book
            $Fotografia = new Book;
            // Le asigno el id del actor
            $Fotografia->actor_id = $ActorId;
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

    public function create() {
        
        // validar
        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatchBrowserEvent('notify', ['message' => 'ERROR Revise los campos.', 'status' => 'error']);
            $this->validate();
        }

        // fileName
        $fileName = $this->saveFile($this->newThumbnail);

        // Crear instancia de Actor
        $Actor = new Actor;

        // Asigno al objeto los atributos del form
        $ActorId = $this->assignActorValues($Actor, $fileName);

        // Guardo el book
        $this->saveBook($ActorId);

        // lo guardo
        $Actor->save();

        // notificación de éxito
        session()->flash('success', 'Actor creado exitosamente! ❤️');
        //redireccionar
        return redirect()->to('/es/dashboard/management');
    }

    public function update() {

        // $this->executeValidation();

        $avatarFileName = $this->avatarActual;
        // si el user actualizo el avatar, se guarda en localmente y se borra el anterior.
        if ($this->newThumbnail) {
            // guardo el avatar nuevo en storage
            $avatarFileName = $this->saveFile($this->newThumbnail);
            // borro el viejo
            Storage::disk('actors')->delete($this->avatarActual);
        }

        $this->assignActorValues($this->actor, $avatarFileName);

        // notificación de éxito
        session()->flash('success', 'Perfil editado exitosamente! ❤️');
        //redireccionar
        return redirect()->to('/es/dashboard/management');

        $this->savedNotification();

    }

    public function assignActorValues($Actor, $avatarFileName) {
        $Actor->nombre = $this->nombre;
        $Actor->date_of_birth = $this->date_of_birth;
        $Actor->nacionalidad = $this->nacionalidad;
        $Actor->altura = $this->altura;
        $Actor->imdb = $this->imdb;
        $Actor->ig = $this->ig;
        $Actor->cv = $this->cv;
        $Actor->videos = $this->videos;
        $Actor->bio = $this->bio;
        $Actor->thumbnail = $avatarFileName;

        $Actor->save();

        return $Actor->id;

    }

    public function render()
    {
        return view('livewire.create-actor');
    }
}