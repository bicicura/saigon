<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Casting;

class CastingList extends Component
{

    public $perPage = 9;
    public $count = 9;
    public $noMoreOffset = false;
    public $seccion;
    public $castingsCount;

    public function stopInfiniteScrolling() {
        $this->noMoreOffset = true;
    }

    // me fijo si hay que mostrar el btn de pedir mas castings o no.
    public function mount() {
        $this->castingsCount = Casting::where('seccion', $this->seccion)->count();
        if ($this->castingsCount <= 9) { $this->stopInfiniteScrolling(); }
    }


    public function showMore()
    {
        $this->count += $this->perPage;
        // para actualizar el locoScroll una vez traída más info
        $this->dispatchBrowserEvent('updateLocoScroll');
        // si la cantidad de castings traidos es >= superior a la cantidad de castings en la db
        if ($this->count >= $this->castingsCount) { $this->stopInfiniteScrolling(); }
    }

    public function render()
    {
        return view('livewire.casting-list');
    }
}
