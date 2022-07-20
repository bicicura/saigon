<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CastingCarusel extends Component
{

    public $CastingSelected;
    public $open = false;

    protected $listeners = ['castingClicked' => 'assignCastingValue'];

    public function assignCastingValue($Casting) {
        $this->CastingSelected = $Casting;
        $this->open = true;
        $this->dispatchBrowserEvent('build');
        return $this->CastingSelected;
    }

    public function close() {
        return $this->open = false;
    }

    public function updatedOpen()
    {
        if ($this->open) {
            return $this->dispatchBrowserEvent('build');
        }
    }

    public function updated() {
        
    }

    public function render()
    {
        return view('livewire.casting-carusel', ['CastingSelected' => $this->CastingSelected, 'open' => $this->open]);
    }
}
