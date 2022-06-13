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

    protected $listeners = ['stopInfiniteScrolling'];

    public function stopInfiniteScrolling() {
        $this->noMoreOffset = true;
    }

    // me fijo si hay que mostrar el btn de pedir mas castings o no.
    public function mount() {
        $castingsCount = Casting::where('seccion', $this->seccion)->count();
        if ($castingsCount <= 9) {
            $this->stopInfiniteScrolling();
        }
    }


    public function showMore()
    {
        $this->count += $this->perPage;
        // para actualizar el locoScroll una vez traída más info
        $this->dispatchBrowserEvent('updateLocoScroll');
    }

    public function render()
    {
        return view('livewire.casting-list');
    }
}
