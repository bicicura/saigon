<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Casting;

class CastingCarusel extends Component
{

    public $CastingSelected;
    public $open = false;

    protected $listeners = ['castingClicked' => 'assignCastingValue'];

    public function assignCastingValue($Casting) {
        $Casting = Casting::find($Casting['id']);
        $this->open = true;
        $this->dispatchBrowserEvent('build');
        return $this->CastingSelected = $Casting;
    }

    public function close() {
        return $this->open = false;
    }

    public function hydrate()
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
