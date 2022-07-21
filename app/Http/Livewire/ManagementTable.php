<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use App\Models\Actor;

class ManagementTable extends Component
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
        $perfil = Actor::find($this->perfilId);
        // borro las imgs del disco
        // $this->deleteAvatar($perfil['thumbnail']);
        $this->deleteBook($perfil);
        // borro el registro de la tabla de perfiles
        $perfil->delete();
        // oculto el modal en el front
        $this->deleteModal = false;
        // emito la notificación de perfil guardado.
        $this->dispatchBrowserEvent('notify', ['message' => '🗑️ Perfil eliminado', 'status' => 'error']);
        // refresco el componente.
        $this->emit('refreshTable');
    }

    // public function deleteAvatar($cara) {
    //     Storage::disk('actors')->delete($cara);
    // }

    public function deleteBook($perfil) {
        $imgs = $perfil->getBook;
        foreach ($imgs as $img) {
            Storage::disk('actors')->delete($img->img);
        }
    }


    public function render()
    {
        return view('livewire.management-table', [
            'actors' => Actor::
            where('nombre', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'DESC')
            ->paginate(5)
        ]);
    }

}
