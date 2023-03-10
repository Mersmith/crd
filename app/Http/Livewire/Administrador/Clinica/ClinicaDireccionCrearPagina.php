<?php

namespace App\Http\Livewire\Administrador\Clinica;

use App\Models\Departamento;
use App\Models\Direccion;
use App\Models\Distrito;
use App\Models\Clinica;
use App\Models\Provincia;
use Livewire\Component;

class ClinicaDireccionCrearPagina extends Component
{
    public $clinica;
    public $usuario_clinica;

    public $departamentos, $provincias = [], $distritos = [];

    public $direccion = "", $referencia = "", $codigo_postal = "";
    public $departamento_id = "", $provincia_id = "", $distrito_id = "";
    public $departamento_nombre = "", $provincia_nombre = "", $distrito_nombre = "";

    protected $rules = [
        'departamento_id' => 'required',
        'provincia_id' => 'required',
        'distrito_id' => 'required',
        'direccion' => 'required',
        'referencia' => 'required',
        'departamento_nombre' => 'required',
        'provincia_nombre' => 'required',
        'distrito_nombre' => 'required',
        'codigo_postal' => 'required',
    ];

    protected $messages = [
        'departamento_id' => 'El departamento es requerido.',
        'provincia_id' => 'La provincia es requerida.',
        'distrito_id' => 'El distrito es requerido.',
        'direccion' => 'La direccion es requerida.',
        'referencia' => 'La referencia es requerida.',
        'codigo_postal' => 'El código postal es requerido.',
    ];

    public function mount(Clinica $clinica)
    {
        $this->clinica = $clinica;
        $this->usuario_clinica = $clinica->user;

        $this->departamentos = Departamento::all();
    }

    public function updatedDepartamentoId($value)
    {
        $this->provincias = Provincia::where('departamento_id', json_decode($value)->id)->get();
        $this->reset(['provincia_id', 'distrito_id']);
        $this->departamento_nombre = json_decode($value)->nombre;
    }

    public function updatedProvinciaId($value)
    {
        $this->distritos = Distrito::where('provincia_id', json_decode($value)->id)->get();
        $this->reset('distrito_id');
        $this->provincia_nombre = json_decode($value)->nombre;
    }

    public function updatedDistritoId($value)
    {
        $this->distrito_nombre = json_decode($value)->nombre;
    }

    public function crearDireccion()
    {
        $this->validate();

        $direccion = new Direccion();

        $direccion->user_id = $this->clinica->user->id;
        $direccion->departamento_id = json_decode($this->departamento_id)->id;
        $direccion->provincia_id = json_decode($this->provincia_id)->id;
        $direccion->distrito_id = json_decode($this->distrito_id)->id;

        $direccion->direccion = $this->direccion;
        $direccion->referencia = $this->referencia;
        $direccion->departamento_nombre = $this->departamento_nombre;
        $direccion->provincia_nombre = $this->provincia_nombre;
        $direccion->distrito_nombre = $this->distrito_nombre;
        $direccion->codigo_postal = $this->codigo_postal;

        $direccion->save();
        return redirect()->route('administrador.clinica.informacion', $this->clinica);
    }

    public function render()
    {
        return view('livewire.administrador.clinica.clinica-direccion-crear-pagina')->layout('layouts.administrador.index');
    }
}
