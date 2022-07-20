<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Consulta;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class TableInbox extends Component
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
        $perfil = Consulta::find($this->perfilId);
        // borro las imgs del disco
        $this->deleteAvatar($perfil['cara'], $perfil['cuerpo']);
        // borro el registro de la tabla de perfiles
        $perfil->delete();
        // oculto el modal en el front
        $this->deleteModal = false;
        // emito la notificación de perfil guardado.
        $this->dispatchBrowserEvent('notify', ['message' => '🗑️ Perfil eliminado', 'status' => 'error']);
        // refresco el componente.
        $this->emit('refreshTable');
    }

    public function deleteAvatar($cara, $cuerpo) {
        Storage::disk('consultas')->delete($cara);
        Storage::disk('consultas')->delete($cuerpo);
    }


    public function render()
    {
        return view('livewire.table-inbox', [
            'interesados' => Consulta::
            where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(5)
        ]);
    }

}
