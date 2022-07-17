<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use App\Models\Productora;

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
        // borro el registro de la tabla de perfiles
        $perfil->delete();
        // oculto el modal en el front
        $this->deleteModal = false;
        // emito la notificación de perfil guardado.
        $this->dispatchBrowserEvent('notify', ['message' => '🗑️ Productora eliminada', 'status' => 'error']);
        // refresco el componente.
        $this->emit('refreshTable');
    }


    public function render()
    {
        return view('livewire.productoras-table', [
            'productoras' => Productora::
            where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(5)
        ]);
    }

}
