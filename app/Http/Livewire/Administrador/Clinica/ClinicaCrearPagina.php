<?php

namespace App\Http\Livewire\Administrador\Clinica;

use App\Models\Especialidad;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class ClinicaCrearPagina extends Component
{
    public $especialidades;
    public $sedes;

    public
        $especialidad_id = "",
        $sedesArray = [],
        $nombre = null,
        $apellido = null,
        $username = null,
        $email = null,
        $password = null,
        $dni = null,
        $cop = null,
        $celular = null,
        $fecha_nacimiento = null,
        $genero = "hombre",
        $puntos = 0,
        $ruc = null,
        $nombre_clinica = null;

    protected $rules = [
        'especialidad_id' => 'required',
        'sedesArray' => 'required|array|min:1',
        'sedesArray.*' => 'exists:sedes,id',
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required|unique:users',
        'username' => 'required|unique:users',
        'password' => 'required',
        'dni' => 'required|digits:8|unique:odontologos',
        'cop' => 'required|max:6|unique:odontologos',
        'celular' => 'required|digits:9',
        'fecha_nacimiento' => 'required',
        'genero' => 'required',
        'puntos' => 'required',
        'ruc' => 'required|digits:11|unique:odontologos',
        'nombre_clinica' => 'required|unique:odontologos',
    ];

    protected $validationAttributes = [
        'especialidad_id' => 'especialidad',
        'sedesArray' => 'sede',
        'nombre' => 'nombre',
        'apellido' => 'apellido',
        'username' => 'nombre de usuario',
        'email' => 'email',
        'password' => 'contraseña',
        'dni' => 'DNI',
        'cop' => 'COP',
        'celular' => 'celular',
        'fecha_nacimiento' => 'fecha de nacimiento',
        'genero' => 'genero',
        'puntos' => 'puntos',
        'ruc' => 'ruc',
        'nombre_clinica' => 'nombre de la clínica',
    ];

    protected $messages = [
        'especialidad_id.required' => 'La :attribute es requerido.',
        'sedesArray.required' => 'La :attribute es requerido.',
        'nombre.required' => 'El :attribute es requerido.',
        'apellido.required' => 'El :attribute es requerido.',
        'username.required' => 'El :attribute es requerido.',
        'username.unique' => 'El :attribute ya existe.',
        'email.required' => 'El :attribute es requerido.',
        'email.unique' => 'El :attribute ya existe.',
        'password.required' => 'La :attribute es requerido.',
        'dni.required' => 'El :attribute es requerido.',
        'dni.unique' => 'El :attribute ya existe.',
        'dni.digits' => 'El :attribute acepta 7 dígitos.',
        'cop.unique' => 'El :attribute ya existe.',
        'cop.required' => 'El :attribute es requerido.',
        'cop.digits' => 'El :attribute acepta 6 dígitos.',
        'celular.required' => 'El :attribute es requerido.',
        'celular.digits' => 'El :attribute acepta 9 dígitos.',
        'fecha_nacimiento.required' => 'La :attribute es requerido.',
        'genero.required' => 'El :attribute es requerido.',
        'puntos.required' => 'Los :attribute son requerido.',
        'ruc.required' => 'El :attribute es requerido.',
        'ruc.unique' => 'El :attribute ya existe.',
        'ruc.digits' => 'El :attribute acepta 11 dígitos.',
        'nombre_clinica.required' => 'El :attribute es requerido.',
        'nombre_clinica.unique' => 'El :attribute ya existe.',
    ];

    public function mount()
    {
        $this->especialidades = Especialidad::all();
        $this->sedes = Sede::all();
    }

    public function generarUsername($nombre, $apellido)
    {
        $nombre_sin_espacios = preg_replace('/[^A-Za-z0-9\-]/', '', $nombre);
        $apellido_sin_espacios = preg_replace('/[^A-Za-z0-9\-]/', '', $apellido);

        $nombre_abreviado = substr($nombre_sin_espacios, 0, 2);
        $apellido_abreviado = substr($apellido_sin_espacios, 0, 2);

        $resto_username = str_shuffle($nombre_sin_espacios . $apellido_sin_espacios);
        $resto_username = substr($resto_username, 0, 6);

        $username = Str::lower($nombre_abreviado . $apellido_abreviado . $resto_username);
        $username = substr($username, 0, 8);
        $username;

        return $username;
    }

    public function updatedNombre()
    {
        $this->username = $this->generarUsername($this->nombre, $this->apellido);
    }

    public function updatedApellido()
    {

        $this->username = $this->generarUsername($this->nombre, $this->apellido);
    }


    public function crearClinica()
    {
        $this->validate();

        $usuario = new User();
        $usuario->email = $this->email;
        $usuario->username = $this->username;
        $usuario->password = Hash::make($this->password);
        $usuario->rol = "odontologo";
        $usuario->save();

        $usuario->odontologo()->create(
            [
                'especialidad_id' => $this->especialidad_id,
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'email' => $this->email,
                'dni' => $this->dni,
                'cop' => $this->cop,
                'celular' => $this->celular,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'genero' => $this->genero,
                'puntos' => $this->puntos,
                'rol' => "clinica",
                'ruc' => $this->ruc,
                'nombre_clinica' => $this->nombre_clinica,
            ]
        );

        $usuario->odontologo->sedes()->attach($this->sedesArray);

        $this->emit('mensajeCreado', "Creado.");

        return redirect()->route('administrador.clinica.editar', $usuario->odontologo->id);
    }

    public function render()
    {
        return view('livewire.administrador.clinica.clinica-crear-pagina')->layout('layouts.administrador.index');
    }
}
