<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Image;

class ReelEdit extends Component
{

    use WithFileUploads;

    public $Reel;
    public $newThumbnail;
    public $nombre;
    public $video_url;
    public $active;

    public $fotografias = [];

    // para cuando editas un Reel.
    public $avatarActual;


    public function storeAvatar($source_file) {
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
        $file->save(storage_path('app/thumbnails/'.$file->filename.'.jpg')); 

        // devuelvo el nombre del archivo + extensión.
        return $file->filename.'.jpg'; 
    }

    public function update() {

        $avatarFileName = $this->avatarActual;
        // si el user actualizo el avatar, se guarda en localmente y se borra el anterior.
        if ($this->newThumbnail) {
            // guardo el avatar nuevo en storage
            $avatarFileName = $this->storeAvatar($this->newThumbnail);
            // borro el viejo
            Storage::disk('thumbnails')->delete($this->avatarActual);
        }

        $this->assignReelValues($this->Reel, $avatarFileName);

        // notificación de éxito
        session()->flash('success', 'Reel editado exitosamente! ❤️');
        //redireccionar
        return redirect()->to('/es/dashboard/castings');
    }

    public function assignReelValues($Casting, $avatarFileName = null) { 

        $this->Reel->nombre = $this->nombre;
        $this->Reel->active = $this->active;
        // por si cambió el nombre del Reel.
        
        $this->Reel->thumbnail = $avatarFileName;
        $this->Reel->url = $this->video_url;

        $this->Reel->save();

        return $this->Reel->id;
    }

    public function render()
    {
        return view('livewire.reel-edit');
    }
}
