<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Casting;

class CastingGroup extends Component
{

    public $perPage;
    public $offset;
    public $seccion;

    public $stop = false;

    public function noMoreOffset() {
        $this->emitUp('stopInfiniteScrolling');
    }

    public function checkOffset($castings, $offset) {
        if  (!$castings->offsetExists($offset)) {
            $this->noMoreOffset();
        }
    }

    public function render()
    {
        $castings = Casting::where('seccion', $this->seccion)->limit($this->perPage)->offset($this->offset)->get();
        return view('livewire.casting-group', ['castings' => $castings]);
    }
}
