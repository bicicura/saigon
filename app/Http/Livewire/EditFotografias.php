<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fotografia;
use App\Models\Book;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Image;

class EditFotografias extends Component
{

    use WithFileUploads;

    public $imgs;
    public $casting_id;
    public $uploadedImg = [];
    public $table = '';
    public $directorio = '';

    // Encuentra el valor maximo de la columna Order en la tabla. Lo uso para cuando se suban nuevas imgs, ponerlas al final.
    public function findMaxOrderValue() {
        $this->table === 'book'? $col = 'actor_id' : $col = 'casting_id';
        $orderMaxValue = DB::table($this->table)
        ->where($col, $this->casting_id)
        ->max('order');
        return $orderMaxValue;
    } 

    public function updateFotografiasOrder($orderedIds) {
        $this->imgs = collect($orderedIds)->map(function ($id) {
           return collect ($this->imgs)->where('id', (int) $id['value'])->first();
        });
        
        $n = 1;
        foreach ($this->imgs as $img) {
           $img->order = $n;
           $img->save();
           $n++;
        }

        $this->maxOrderValue = $n;

        $this->savedNotification('Orden actualizado!', 'success');
    }

    public function deleteFotografia($id) {
        $this->table === 'book'? $imgRecord = Book::find($id) : $imgRecord = Fotografia::find($id);
        Storage::disk($this->directorio)->delete($imgRecord->img);
        $imgRecord->delete();
        $this->savedNotification('Imagen eliminada!', 'success');
    }

    public function saveImgs() {

        if ($this->table === 'book') {
            $width = 600;
            $height= 800;
        } else { 
            $width = 1500;
            $height= 1000;
        }

        $orderMaxValue = $this->findMaxOrderValue();
        
        foreach ($this->uploadedImg as $photo) {
            $file = Image::make($photo);
            // hago q mantenga su orientacion original
            $file->orientate()
            // la convertimos a jpg y reducimos la calidad al 80
            ->encode('jpg', 80)
            // la resizeamos, manteniendo el aspect ratio y prevenir que se amplíe.
            ->resize($width, $height, function($contraint) {
                $contraint->aspectRatio();
                $contraint->upsize();
            });
            //guardamos en directorio
            $file->save(storage_path('app/'.$this->directorio.'/'.$file->filename.'.jpg'));

            if ($this->table === 'book') {
                $Fotografia = new Book;
                $Fotografia->actor_id = $this->casting_id;
            } else {
                $Fotografia = new Fotografia;
                $Fotografia->casting_id = $this->casting_id;
            }            
            // seteo el orden de la nueva Fotografia al ultimo de la fila
            $Fotografia->order = $orderMaxValue + 1;
            $Fotografia->img = $file->basename;
            $Fotografia->save();
            //incremento en uno el valor maximo del orden para que la proxima sea la última. 
            $orderMaxValue++;
        }

        $this->savedNotification('Imagenes cargadas exitosamente!', 'success');
        $this->uploadedImg = [];
    }

    public function queryToRender() {

        $this->table === 'book'? $imgs = Book::where('actor_id', $this->casting_id)->orderBy('order')->get() : $imgs = Fotografia::where('casting_id', $this->casting_id)->orderBy('order')->get();

        return $imgs;
    }

    public function render()
    {
        $this->imgs = $this->queryToRender();
        return view('livewire.edit-fotografias', ['imgs' => $this->imgs]);
    }

    public function savedNotification($message, $status) {
        //evento del browser
        $this->dispatchBrowserEvent('notify', ['message' => $message, 'status' => $status]);
    }
}
