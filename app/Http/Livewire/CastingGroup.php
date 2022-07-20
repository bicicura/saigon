<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Casting;

class CastingGroup extends Component
{
    
    public $perPage;
    public $offset;
    public $seccion;

    public function querySeccion() {
        
        $this->seccion === 'Ficción'? $query = Casting::with(['getProductora', 'getFotografias']) : $query = Casting::with(['getProductora']) ;

        $castings = $query->where('seccion', $this->seccion)->limit($this->perPage)->offset($this->offset)->orderBy('id', 'desc')->get(['id', 'nombre', 'director', 'productora_id', 'thumbnail', 'slug']);

        return $castings;
    }

    public function render()
    {
        $castings = $this->querySeccion();
        return view('livewire.casting-group', ['castings' => $castings]);
    }
}