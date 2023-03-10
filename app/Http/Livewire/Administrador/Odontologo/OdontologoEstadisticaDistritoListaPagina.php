<?php

namespace App\Http\Livewire\Administrador\Odontologo;

use App\Models\Distrito;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class OdontologoEstadisticaDistritoListaPagina extends Component
{
    use WithPagination;
    public $buscarOdontologo;
    protected $paginate = 10;

    //public $odontologos_distritos;
    public $distrito_id;

    public function updatingBuscarOdontologo()
    {
        $this->resetPage();
    }

    public function mount(Distrito $distrito)
    {
        $this->distrito_id = $distrito->id;

        /*$this->odontologos_distritos = DB::table('odontologos')
            ->join('direccions', 'odontologos.user_id', '=', 'direccions.user_id')
            ->where('direccions.distrito_id', '=', $distrito_id)
            ->select('odontologos.*')
            ->get();*/
    }

    public function render()
    {
        $odontologos_distritos = DB::table('odontologos')
        ->join('direccions', 'odontologos.user_id', '=', 'direccions.user_id')
        ->where('direccions.distrito_id', '=', $this->distrito_id)
        ->where(function ($query) {
             $query->where('nombre', 'like', '%' . $this->buscarOdontologo . '%')
                   ->orWhere('email', 'LIKE', '%' . $this->buscarOdontologo . '%');
        })
        ->where('odontologos.rol', '=', 'odontologo') 
        ->orderBy('odontologos.created_at', 'desc')
        ->paginate(10);
        /*$odontologos_distritos = DB::table('odontologos')
            ->join('direccions', 'odontologos.user_id', '=', 'direccions.user_id')
            ->where('direccions.distrito_id', '=', $this->distrito_id)
            ->select('odontologos.*')
            ->get();*/

        return view('livewire.administrador.odontologo.odontologo-estadistica-distrito-lista-pagina', compact('odontologos_distritos'))->layout('layouts.administrador.index');
    }
}
