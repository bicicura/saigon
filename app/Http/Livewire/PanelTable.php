<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Casting;
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
    protected $listeners = ['refreshTable' => '$refresh'];

    public function render()
    {
        return view('livewire.panel-table', [
            'castings' => Casting::
            where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(5)
        ]);
    }
}
