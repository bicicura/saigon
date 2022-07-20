<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Newsletter;

class NewsletterSubscription extends Component
{

    public $email;
    public $title;
    public $seccion;
    public $type;

    public function validateForm() {
        $this->validate(
            [
                'email' => 'required|email', 
            ],
            [
                'required' => __('El campo es obligatorio'),
                'email' => __('El formato de email es incorrecto'),
            ],
        );
    }

    public function add() {

        // valido y aviso si hay algún error y salgo de la función
        try {
            $this->validateForm();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatchBrowserEvent('notify', ['message' => 'Formato de Email incorrecto!', 'status' => 'error']);
            $this->validateForm();
        }

        $check_email_registrado = Newsletter::where('email', $this->email)->first();

        if ($check_email_registrado) {
            $this->dispatchBrowserEvent('notify', ['message' => '¡El email ya esta registrado!', 'status' => 'error']);
            return;
        }

        $subscripcion = New Newsletter();
        $subscripcion->email = $this->email;
        $subscripcion->save();

        $this->dispatchBrowserEvent('notify', ['message' => 'Solicitud enviada!', 'status' => 'success']);

        $this->reset(['email']);
    }

    public function remove() {

        // valido y aviso si hay algún error y salgo de la función
        try {
            $this->validateForm();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatchBrowserEvent('notify', ['message' => 'Formato de Email incorrecto!', 'status' => 'error']);
            $this->validateForm();
        }

        $check_email_registrado = Newsletter::where('email', $this->email)->first();

        if (!$check_email_registrado) {
            $this->dispatchBrowserEvent('notify', ['message' => '¡El email no se encuentra registrado!', 'status' => 'error']);
            return;
        }

        $check_email_registrado->delete();

        $this->dispatchBrowserEvent('notify', ['message' => 'Solicitud enviada!', 'status' => 'success']);
        $this->dispatchBrowserEvent('desuscribir');
        
        $this->reset(['email']);

    }

    public function render()
    {
        return view('livewire.newsletter-subscription');
    }
}
