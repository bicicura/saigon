<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use App\Models\Productora;
use App\Models\Casting;

class ProductorasTable extends Component
{

    use WithPagination;

    public $active = true;
    public $search;
    public $deleteId;
    public $perfilId = null;
    public $deleteModal = null;
    protected $listeners = ['refreshTable' => '$refresh'];

    public function deleteProfile() {
        // busco el perfil en db.
        $perfil = Productora::find($this->perfilId);

        $casting = Casting::where('productora_id', $this->perfilId)->first();

        if ($casting !== null) {
            $this->dispatchBrowserEvent('notify', ['message' => '❌ ERROR. Hay Casting/s que pertenecen a esta Productora.', 'status' => 'error']);
            return;
        }

        // borro el registro de la tabla de perfiles
        $perfil->delete();
        // oculto el modal en el front
        $this->deleteModal = false;
        // emito la notificación de perfil guardado.
        $this->dispatchBrowserEvent('notify', ['message' => '🗑️ Productora eliminada exitosamente!', 'status' => 'success']);
        // refresco el componente.
        $this->emit('refreshTable');
    }


    public function render()
    {
        return view('livewire.productoras-table', [
            'productoras' => Productora::
            where('nombre', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', "DESC")
            ->paginate(6)
        ]);
    }

}
