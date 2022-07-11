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

    public $active = true;
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

    public function deleteProfile() {
        // busco el casting en db.
        $Casting = Casting::find($this->perfilId);
        // borro las imgs del disco
        if ($Casting->seccion === "Fotografía") {
            $this->deleteFotografias($Casting);
        } else {
            $this->deleteThumbnail($Casting['thumbnail']);
        }
        // borro el registro de la tabla de Castings
        $Casting->delete();
        // oculto el modal en el front
        $this->deleteModal = false;
        // emito la notificación de Casting guardado.
        $this->dispatchBrowserEvent('notify', ['message' => '🗑️ Casting eliminado', 'status' => 'error']);
        // refresco el componente.
        $this->emit('refreshTable');
    }

    public function query() {
        $query = Casting::where('nombre', 'like', '%'.$this->search.'%');

        if ($this->reel) {
            $query->where('reel', 1);
            return $castings = $query->paginate(20);
        }

        return $castings = $query->paginate(6);
    }

    public function render()
    {
        $castings = $this->query();

        return view('livewire.panel-table', [
            'castings' => $castings
        ]);
    }
}
