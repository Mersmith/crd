<?php

namespace App\Http\Livewire\Administrador\Especialidad;

use App\Models\Especialidad;
use Livewire\Component;
use Livewire\WithPagination;

class EspecialidadEstadisticaOdontologoListaPagina extends Component
{
    use WithPagination;
    public $especialidad;
    public $buscarOdontologo;
    public $cantidad_total_odontologos;
    protected $paginate = 30;

    public function updatingBuscarOdontologo()
    {
        $this->resetPage();
    }

    public function mount(Especialidad $especialidad)
    {
        $this->especialidad = $especialidad;
        $this->cantidad_total_odontologos = $especialidad->odontologos()->where('rol', '=', 'odontologo')->count();
    }

    public function render()
    {
        $odontologos =  $this->especialidad->odontologos()->where('rol', '=', 'odontologo')
        ->where('nombre', 'LIKE', '%' . $this->buscarOdontologo . '%')
        ->paginate(30);

        return view('livewire.administrador.especialidad.especialidad-estadistica-odontologo-lista-pagina', compact('odontologos'))->layout('layouts.administrador.index');
    }
}
