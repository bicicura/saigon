<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Productora;

class CreateProductora extends Component
{
    public $type;

    public $nombre;
    public $productoraEditada;

    protected $rules = 
    [
        'nombre' => 'required',
    ];

    public function create() {

        // validar
        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatchBrowserEvent('notify', ['message' => '❌ ERROR Revise los campos.', 'status' => 'error']);
            $this->validate();
        }

        $flag = Productora::where('nombre', $this->nombre)->count();

        if ($flag) {
            $this->dispatchBrowserEvent('notify', ['message' => '❌ Ya hay una Productora con ese nombre.', 'status' => 'error']);
            return;
        }

        // Crear instancia de Productora
        $Productora = new Productora;

        // Asigno al objeto los atributos del form
        $Productora->nombre = $this->nombre;

        // lo guardo
        $Productora->save();

        // notificación de éxito
        session()->flash('success', 'Productora creada exitosamente! ❤️');
        //redireccionar
        return redirect()->to('/es/dashboard/productoras');
    }

    public function update() {

        // validar
        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatchBrowserEvent('notify', ['message' => '❌ ERROR Revise los campos.', 'status' => 'error']);
            $this->validate();
        }

        $flag = Productora::where('nombre', $this->nombre)->count();

        if ($flag) {
            $this->dispatchBrowserEvent('notify', ['message' => '❌ Ya hay una Productora con ese nombre.', 'status' => 'error']);
            return;
        }

        // lo guardo
        $this->productoraEditada->nombre = $this->nombre;
        $this->productoraEditada->save();

        // notificación de éxito
        session()->flash('success', 'Productora creada exitosamente! ❤️');
        //redireccionar
        return redirect()->to('/es/dashboard/productoras');

    }

    
    public function render()
    {
        return view('livewire.create-productora');
    }
}