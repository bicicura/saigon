<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Consulta;
use App\Models\Nacionalidad;
use App\Models\Skill;
use App\Models\Talentos;
use App\Models\Talles;
use Illuminate\Support\Facades\Storage;
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
    public $nacionalidad = "";
    public $skills = [ 'deportes' => [] , 'bailes' => [], 'musica' => []  ];
    public $link;
    public $cara;
    public $cuerpo;

    public $nacionalidades;
    public $talentos_deportes;
    public $talentos_music;
    public $talentos_dance;
    public $talles_calzado;
    public $talles_remera;
    public $talles_pantalon;
    
    public $cuitCheckbox;
    public $deportes = true;
    public $bailes = true;
    public $musica = true;

    public $talles;

    public $notificacionError = '';
    public $doneNotification = '';

    public function traducirNotificaciones() {
        if (app()->getLocale() === 'en') {
            $this->notificacionError = 'ERROR Check the fields.';
            $this->doneNotification = 'Form sent successfully!';
            return;
        }

        $this->notificacionError = 'ERROR Revise los campos.';
        $this->doneNotification = 'Formulario enviado exitosamente!';
    }


    public function submit() 
    {
        
        // valido y aviso si hay algún error y salgo de la función
        try {
            $this->validateForm();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatchBrowserEvent('notify', ['message' => $this->notificacionError, 'status' => 'error']);
            $this->validateForm();
        }

        // creo una nueva instancia de un nuevo perfil
        $Consulta = new Consulta;

        // configuro el objeto para la db
        $Consulta->nombre = $this->nombre;
        $Consulta->email = $this->email;
        $Consulta->celular = $this->celular;
        $Consulta->dni = $this->dni;
        $Consulta->nacionalidad = $this->nacionalidad;
        $Consulta->cuit = $this->cuit;
        $Consulta->sexo = $this->sexo;
        $Consulta->date_of_birth = $this->nacimiento;
        $Consulta->altura = $this->altura;
        $Consulta->remera = $this->remera;
        $Consulta->pantalon = $this->pantalon;
        $Consulta->calzado = $this->calzado;
        $Consulta->link = $this->link;

        $Consulta->cara = '-';
        $Consulta->cuerpo = '-';

        // lo guardo en db
        $Consulta->save();

        // uplodeo los archivos de CARA y CUERPO y obtengo los nombres.
        $caraFileName = $this->storeFile($this->cara, $Consulta->id, 'foto-cara');
        $cuerpoFileName = $this->storeFile($this->cuerpo, $Consulta->id, 'foto-cuerpo');

        $Consulta->cara = $caraFileName;
        $Consulta->cuerpo = $cuerpoFileName;

        // lo guardo en db
        $Consulta->save();
        
        
        $this->storeSkills($Consulta->id);

        // notifico al user que se guardó correctamente su petición
        $this->savedNotification();

        // reseteo los inputs del form
        $this->resetExcept(['nacionalidades', 'talles_calzado', 'talles_pantalon', 'talles_remera', 'talentos_deportes', 'talentos_music', 'talentos_dance']); 

    }   

    public function updatedCara() {
        $this->validate(['cara' => 'mimes:webp,jpg,jpeg,png|max:8000|dimensions:min_width=600,min_height=600']);
        // Si el File se valido correctamente, se emite el evento para darle aviso al user que se ha cargado correctamente.
        $this->dispatchBrowserEvent('file-validated', ['type' => 'cara']);
    }

    public function updatedCuitCheckbox($val) {
        $val? $this->cuit = "-" : $this->cuit = ""; 
    }

    public function updatedCuerpo() {
        $this->validate(['cuerpo' => 'mimes:webp,jpg,jpeg,png|max:8000|dimensions:min_width=600,min_height=600']);
        // Si el File se valido correctamente, se emite el evento para darle aviso al user que se ha cargado correctamente.
        $this->dispatchBrowserEvent('file-validated', ['type' => 'cuerpo']);
    }

    public function storeFile($file, $id, $fileName) {
        // hago el file una instancia del image intervention
        $file = Image::make($file);
        // para que mantenga la orientación correcta y no se rota al aplica resize 
        $file->orientate()
        // si es otro formato, lo paso a jpg y bajo la calidad al 80%
        ->encode('jpg', 80)
        // se va a respetar el numero mas grande WxH, el mas chico va a variar para mantener el aspect ratio
        ->resize(1000, 1200, function($contraint) {
            // aplico el aspect ratio
            $contraint->aspectRatio();
            // se previene estirar una img si los parametros son mas grandes q el file original.
            $contraint->upsize();
        });

        // paso el id/int a string
        $id = strval($id);

        // creo el directorio en consultas con el id de la consulta, si ya esta creado, salteo.
        if(!Storage::exists('consultas/'.$id)) {
            Storage::makeDirectory('consultas/'.$id); //creates directory
        }

        // guardo el archivo en el disco que adecuado
        $file->save(storage_path('app/consultas/'.$id.'/'.$file->filename.'.jpg'));

        // para renombrar los archivos como yo quiero.
        Storage::move('consultas/'.$id.'/'.$file->filename.'.jpg', 'consultas/'.$id.'/'.$id.'-'.$fileName.'.jpg'); // keep the same folder to just rename 

        // devuelvo el path/nombre del archivo.
        return $id.'/'.$file->basename;
    }

    public function getNacionalidades() {
        return $this->nacionalidades = Nacionalidad::orderBy('comun', 'DESC')->orderBy('nombre', 'ASC')->get();
    }

    public function getTalles() {
        $talles = Talles::where('valid', '1')->get();

        $this->talles_calzado = $talles->filter(function ($value, $key) {            
            return $value['tipo'] == "calzado" ? $value : '';
        });

        $this->talles_pantalon = $talles->filter(function ($value, $key) {            
            return $value['tipo'] == "pantalon" ? $value : '';
        });

        $this->talles_remera = $talles->filter(function ($value, $key) {            
            return $value['tipo'] == "remera" ? $value : '';
        });

    }
    
    public function getTalentos() {

        $talentos = Talentos::get();
        
        $this->talentos_deportes = $talentos->filter(function ($value, $key) {            
            return $value['seccion'] == "sports" ? $value : '';
        });

        $this->talentos_music = $talentos->filter(function ($value, $key) {            
            return $value['seccion'] == "music" ? $value : '';
        });

        $this->talentos_dance = $talentos->filter(function ($value, $key) {            
            return $value['seccion'] == "dancing" ? $value : '';
        });

    }

    public function storeSkills($id) {
        foreach ($this->skills as $key => $value) {
            if (empty($value)) {
                $Skill = new Skill;
                $Skill->consulta_id = $id;
                // este val es el que representa que no hace la actividad. Se encuentra en params.json
                $Skill->val = 1111;
                $Skill->skill_tipo = $key;
                $Skill->save();
            } else {
                foreach ($value as $skill) {
                    $Skill = new Skill;
                    $Skill->consulta_id = $id;
                    $Skill->val = $skill;
                    $Skill->skill_tipo = $key;
                    $Skill->save();
                }
            }
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

    public function savedNotification() {
        //cierro el nav form
        $this->dispatchBrowserEvent('close-form');
        // muestro notificacion de enviado
        $this->dispatchBrowserEvent('notify', ['message' => $this->doneNotification, 'status' => 'success']);

    }

    public function validateForm() {
        $this->validate(
            [
                'nombre' => 'required|min:2',
                'email' => 'required|email', 
                'celular' => 'required|min:6',
                'nacionalidad' => 'required',
                'dni' => 'required|numeric',
                'cuit' => 'required|alpha_dash',
                'sexo' => 'required',
                'nacimiento' => 'required|date',
                'altura' => 'required|numeric|between:50,250',
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

    public function mount() {
        $this->traducirNotificaciones();
        $this->getNacionalidades();
        $this->getTalentos();
        $this->getTalles();
    }

    public function render()
    {
        return view('livewire.nav-form');
    }

}
