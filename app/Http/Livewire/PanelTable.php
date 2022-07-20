<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Casting;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class PanelTable extends Component
{

    use WithPagination;

    // public $castings;

    public $active = false;
    public $search;
    public $deleteId;
    public $perfilId = null;
    public $deleteModal = null;
    public $reel = false;
    protected $listeners = ['refreshTable' => '$refresh'];
    

    public function deleteThumbnail($thumbnail) {
        Storage::disk('thumbnails')->delete($thumbnail);
    }

    public function deleteFotografias($casting) {
        $imgs = $casting->getFotografias;
        foreach ($imgs as $img) {
            Storage::disk('fotos')->delete($img->img);
        }
    }
    
    public function sticky($id) {
        $Casting = Casting::find($id);

        if ($Casting->sticky) {
            $Casting->sticky = 0;
            $Casting->save();
            return;
        }

        $Casting->sticky = 1;
        $Casting->save();
    }

    public function deleteProfile() {
        // busco el casting en db.
        $Casting = Casting::find($this->perfilId);
        // borro las imgs del disco
        if ($Casting->seccion === "Fotografía" || $Casting->seccion === "Ficción") {
            $this->deleteFotografias($Casting);
        } else {
            $this->deleteThumbnail($Casting['thumbnail']);
        }

        // si tiene un reel, lo borro.
        $this->handleReel($Casting);

        // borro el registro de la tabla de Castings
        $Casting->delete();
        // oculto el modal en el front
        $this->deleteModal = false;
        // emito la notificación de Casting guardado.
        $this->dispatchBrowserEvent('notify', ['message' => '🗑️ Casting eliminado', 'status' => 'error']);
        // refresco el componente.
        $this->emit('refreshTable');
    }

    public function handleReel($Casting) {
        if ($Casting->reel) {
            Storage::disk('reel')->delete($Casting->reel_video);
        }
    }

    public function query() {
        $query = Casting::with('getProductora')->where('nombre', 'like', '%'.$this->search.'%');

        if ($this->reel) {
            $query->where('reel', 1);
            return $castings = $query->paginate(20);
        }

        return $castings = $query->orderBy('sticky', 'DESC')->orderBy('id', 'DESC')->paginate(6);
    }

    public function render()
    {
        $castings = $this->query();

        return view('livewire.panel-table', [
            'castings' => $castings
        ]);
    }
}
