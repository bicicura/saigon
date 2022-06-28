<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Profile;
use App\Models\Skills;
use Image;

class NavForm extends Component
{
    use WithFileUploads;

    public $nombre = "";
    public $email = "";
    public $celular = "";
    public $dni = "";
    public $cuit = "";
    public $sexo = "";
    public $nacimiento = "";
    public $altura = "";
    public $remera = "";
    public $pantalon = "";
    public $calzado = "";
    public $nacionalidad;
    public $skills = [ 'deportes' => [] , 'bailes' => [], 'musica' => []  ];
    public $link;
    public $cara;
    public $cuerpo;

    public $deportes = true;
    public $bailes = true;
    public $musica = true;

    protected $rules = 
    [
        'nombre' => 'required|min:2',
        'email' => 'required|email',
        'celular' => 'required|min:6',
        'nacionalidad' => 'required|min:6',
        'dni' => 'required|numeric',
        'cuit' => 'required|numeric',
        'sexo' => 'required',
        'nacimiento' => 'required|date',
        'altura' => 'required|integer|between:100,230',
        'remera' => 'required',
        'pantalon' => 'required',
        'calzado' => 'required',
        'cara' => 'required',
        'cuerpo' => 'required',
    ];

    public function submit() 
    {
        // dd($this->storeSkills());

    
        // valido y aviso si hay algún error y salgo de la función
        try {
            $this->validateForm();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatchBrowserEvent('notify', ['message' => 'ERROR Revise los campos.', 'status' => 'error']);
            $this->validateForm();
        }

        // uplodeo los archivos de CARA y CUERPO y obtengo los nombres.
        $caraFileName = $this->storeFile($this->cara);
        $cuerpoFileName = $this->storeFile($this->cuerpo);

        // creo una nueva instancia de un nuevo perfil
        $Profile = new Profile;

        // configuro el objeto para la db
        $Profile->nombre = $this->nombre;
        $Profile->email = $this->email;
        $Profile->celular = $this->celular;
        $Profile->dni = $this->dni;
        $Profile->nacionalidad = $this->nacionalidad;
        $Profile->cuit = $this->cuit;
        $Profile->sexo = $this->sexo;
        $Profile->date_of_birth = $this->nacimiento;
        $Profile->altura = $this->altura;
        $Profile->remera = $this->remera;
        $Profile->pantalon = $this->pantalon;
        $Profile->calzado = $this->calzado;
        // $Profile->skills = $this->skills;
        $Profile->link = $this->link;
        $Profile->cara = $caraFileName;
        $Profile->cuerpo = $cuerpoFileName;

        // lo guardo en db
        $Profile->save();
        
        $this->storeSkills($Profile->id);

        // notifico al user que se guardó correctamente su petición
        $this->savedNotification();
    }   

    public function updatedCara() {
        $this->validate(['cara' => 'mimes:webp,jpg,jpeg,png|max:8000']);
        // Si el File se valido correctamente, se emite el evento para darle aviso al user que se ha cargado correctamente.
        $this->dispatchBrowserEvent('file-validated', ['type' => 'cara']);
    }

    public function updatedCuerpo() {
        $this->validate(['cuerpo' => 'mimes:webp,jpg,jpeg,png|max:8000']);
        // Si el File se valido correctamente, se emite el evento para darle aviso al user que se ha cargado correctamente.
        $this->dispatchBrowserEvent('file-validated', ['type' => 'cuerpo']);
    }

    public function storeFile($file) {
        // hago el file una instancia del image intervention
        $file = Image::make($file);
        // para que mantenga la orientación correcta y no se rota al aplica resize 
        $file->orientate()
        // si es otro formato, lo paso a jpg y bajo la calidad al 80%
        ->encode('jpg', 80)
        // se va a respetar el numero mas grande WxH, el mas chico va a variar para mantener el aspect ratio
        ->resize(600, 800, function($contraint) {
            // aplico el aspect ratio
            $contraint->aspectRatio();
            // se previene estirar una img si los parametros son mas grandes q el file original.
            $contraint->upsize();
        });

        // guardo el archivo en el disco que adecuado
        $file->save(storage_path('app/perfiles/'.$file->filename.'.jpg'));

        // devuelvo el nombre del archivo.
        return $file->basename;
    }

    public function storeSkills($id) {
        $selectedSkills = array_merge($this->skills['deportes'], $this->skills['bailes'], $this->skills['musica']);
        foreach ($selectedSkills as $skill) {
            $Skill = new Skills;
            $Skill->profiles_id = $id;
            $Skill->skill_nombre = $skill;
            $Skill->save();
        }
    }

    public function skillClicked($skill) {
        if ($this->$skill) {
            $this->skills[$skill] = [];
        }
    }

    public function updatedSkillsDeportes($skill) {
        empty($skill)? $this->deportes = true : $this->deportes = false;
    }

    public function updatedSkillsBailes($skill) {
        empty($skill)? $this->bailes = true : $this->bailes = false;
    }

    public function updatedSkillsMusica($skill) {
        empty($skill)? $this->musica = true : $this->musica = false;
    }

    public function render()
    {   
        return view('livewire.nav-form');
    }

    public function savedNotification() {
        //cierro el nav form
        $this->dispatchBrowserEvent('close-form');
        // muestro notificacion de enviado
        $this->dispatchBrowserEvent('notify', ['message' => 'Formulario enviado exitosamente', 'status' => 'success']);

    }

    public function validateForm() {
        $this->validate(
            [
                'email' => 'required|email', 
                'nombre' => 'required|min:2',
                'celular' => 'required|min:6',
                'nacionalidad' => 'required|min:6',
                'dni' => 'required|numeric',
                'cuit' => 'required|numeric',
                'sexo' => 'required',
                'nacimiento' => 'required|date',
                'altura' => 'required|numeric|between:100,230',
                'remera' => 'required',
                'pantalon' => 'required',
                'calzado' => 'required',
                'cara' => 'required',
                'cuerpo' => 'required',

            ],
            [
                'required' => __('El campo es obligatorio'),
                'min' => __('El campo debe contener al menos :min caracteres'),
                'email' => __('El formato de email es incorrecto'),
                'numeric' => __('El campo deber ser un número'),
                'date' => __('El campo no es una fecha válida'),
                'between.numeric' => __('El campo debe estar entre :min y :max'),
            ],
        );
    }
}
