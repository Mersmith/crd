<?php

namespace App\Http\Livewire\Administrador\Servicio;

use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;

class ServicioTodoPagina extends Component
{
    use WithPagination;
    public $buscarServicio;
    public $cantidad_total_servicios;
    protected $paginate = 20;

    public function updatingBuscarServicio()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->cantidad_total_servicios = Servicio::count();
    }

    public function render()
    {
        $servicios = Servicio::where('nombre', 'like', '%' . $this->buscarServicio . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('livewire.administrador.servicio.servicio-todo-pagina', compact('servicios'))->layout('layouts.administrador.index');
    }
}
