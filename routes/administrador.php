<?php

use App\Http\Controllers\Administrador\CanjeoController;
use App\Http\Controllers\Administrador\VentaController;
use App\Http\Livewire\Administrador\Administrador\AdministradorCrearPagina;
use App\Http\Livewire\Administrador\Administrador\AdministradorEditarPagina;
use App\Http\Livewire\Administrador\Administrador\AdministradorInformacionPagina;
use App\Http\Livewire\Administrador\Administrador\AdministradorTodoPagina;
use App\Http\Livewire\Administrador\Canjeo\CanjeoCrearLivewire;
use App\Http\Livewire\Administrador\Canjeo\CanjeoEditarLivewire;
use App\Http\Livewire\Administrador\Canjeo\CanjeoTodoLivewire;
use App\Http\Livewire\Administrador\Clinica\ClinicaCrearPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaDireccionCrearPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaDireccionEditarPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaEditarPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaEstadisticaDepartamentoCantidadPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaEstadisticaDepartamentoListaPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaEstadisticaDistritoListaPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaEstadisticaProvinciaListaPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaInformacionPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaPacienteCrearPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaPacienteEditarPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaPacienteTodoPagina;
use App\Http\Livewire\Administrador\Clinica\ClinicaTodoPagina;
use App\Http\Livewire\Administrador\Encargado\EncargadoCrearPagina;
use App\Http\Livewire\Administrador\Encargado\EncargadoEditarPagina;
use App\Http\Livewire\Administrador\Encargado\EncargadoInformacionPagina;
use App\Http\Livewire\Administrador\Encargado\EncargadoTodoPagina;
use App\Http\Livewire\Administrador\Especialidad\EspecialidadCrearPagina;
use App\Http\Livewire\Administrador\Especialidad\EspecialidadEditarPagina;
use App\Http\Livewire\Administrador\Especialidad\EspecialidadEstadisticaClinicaCantidadPagina;
use App\Http\Livewire\Administrador\Especialidad\EspecialidadEstadisticaClinicaListaPagina;
use App\Http\Livewire\Administrador\Especialidad\EspecialidadEstadisticaOdontologoCantidadPagina;
use App\Http\Livewire\Administrador\Especialidad\EspecialidadEstadisticaOdontologoListaPagina;
use App\Http\Livewire\Administrador\Especialidad\EspecialidadInformacionPagina;
use App\Http\Livewire\Administrador\Especialidad\EspecialidadTodoPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoCrearPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoDireccionCrearPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoDireccionEditarPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoEditarPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoEstadisticaDepartamentoCantidadPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoEstadisticaDepartamentoListaPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoEstadisticaDistritoListaPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoEstadisticaProvinciaListaPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoInformacionPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoPacienteCrearPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoPacienteEditarPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoPacienteTodoPagina;
use App\Http\Livewire\Administrador\Odontologo\OdontologoTodoPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteClinicaTodoPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteCrearPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteDireccionCrearPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteDireccionEditarPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteEditarPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteEstadisticaDepartamentoPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteInformacionPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteOdontogoTodoPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteOdontologoPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteTodoPagina;
use App\Http\Livewire\Administrador\Paciente\PacienteVerPagina;
use App\Http\Livewire\Administrador\Sede\SedeClinicaTodoPagina;
use App\Http\Livewire\Administrador\Sede\SedeCrearPagina;
use App\Http\Livewire\Administrador\Sede\SedeEditarPagina;
use App\Http\Livewire\Administrador\Sede\SedeEstadisticaClinicaCantidadPagina;
use App\Http\Livewire\Administrador\Sede\SedeEstadisticaOdontologoCantidadPagina;
use App\Http\Livewire\Administrador\Sede\SedeEstadisticaRegistroAnosCantidadPagina;
use App\Http\Livewire\Administrador\Sede\SedeEstadisticaRegistroMesActualCantidadPagina;
use App\Http\Livewire\Administrador\Sede\SedeEstadisticaRegistroMesesAnoActualCantidadPagina;
use App\Http\Livewire\Administrador\Sede\SedeEstadisticaRegistroMesesAnosActualCantidadPagina;
use App\Http\Livewire\Administrador\Sede\SedeInformacionPagina;
use App\Http\Livewire\Administrador\Sede\SedeOdontologoTodoPagina;
use App\Http\Livewire\Administrador\Sede\SedePacienteTodoPagina;
use App\Http\Livewire\Administrador\Sede\SedeTodoPagina;
use App\Http\Livewire\Administrador\Servicio\ServicioCrearPagina;
use App\Http\Livewire\Administrador\Servicio\ServicioEditarPagina;
use App\Http\Livewire\Administrador\Servicio\ServicioInformacionPagina;
use App\Http\Livewire\Administrador\Servicio\ServicioTodoPagina;
use App\Http\Livewire\Administrador\Usuario\UsuarioEstadisticaDepartamentoCantidadPagina;
use App\Http\Livewire\Administrador\Usuario\UsuarioEstadisticaDepartamentoListaPagina;
use App\Http\Livewire\Administrador\Venta\VentaCrearLivewire;
use App\Http\Livewire\Administrador\Venta\VentaEditarLivewire;
use App\Http\Livewire\Administrador\Venta\VentaEstadisticaVentaAnosCantidadPagina;
use App\Http\Livewire\Administrador\Venta\VentaEstadisticaVentaMesActualCantidadPagina;
use App\Http\Livewire\Administrador\Venta\VentaEstadisticaVentaMesActualListaPagina;
use App\Http\Livewire\Administrador\Venta\VentaEstadisticaVentaMesesAnoActualCantidadPagina;
use App\Http\Livewire\Administrador\Venta\VentaEstadisticaVentaMesesAnoActualListaPagina;
use App\Http\Livewire\Administrador\Venta\VentaTodoLivewire;
use App\Models\Odontologo;
use Illuminate\Support\Facades\Route;

Route::get('prueba-administrador', function () {
    return "Administrador";
});

Route::get('administradores', AdministradorTodoPagina::class)->name('administrador.index');
Route::get('administrador/crear', AdministradorCrearPagina::class)->name('administrador.crear');
Route::get('administrador/{administrador}/editar', AdministradorEditarPagina::class)->name('administrador.editar');
Route::get('administrador/{administrador}/informacion', AdministradorInformacionPagina::class)->name('administrador.informacion');

Route::get('sedes', SedeTodoPagina::class)->name('sede.index');//
Route::get('sede/crear', SedeCrearPagina::class)->name('sede.crear');//
Route::get('sede/{sede}/editar', SedeEditarPagina::class)->name('sede.editar');//
Route::get('sede/{sede}/informacion', SedeInformacionPagina::class)->name('sede.informacion');//
Route::get('sede/{sede}/odontologos', SedeOdontologoTodoPagina::class)->name('sede.odontologo.todo');//
Route::get('sede/{sede}/clinicas', SedeClinicaTodoPagina::class)->name('sede.clinica.todo');//
Route::get('sede/{sede}/pacientes', SedePacienteTodoPagina::class)->name('sede.paciente.todo');//
Route::get('sede/odontologos', SedeEstadisticaOdontologoCantidadPagina::class)->name('sede.estadistica.odontologo.cantidad');//
Route::get('sede/clinicas', SedeEstadisticaClinicaCantidadPagina::class)->name('sede.estadistica.clinica.cantidad');//
Route::get('sede/registros-mes-actual', SedeEstadisticaRegistroMesActualCantidadPagina::class)->name('sede.estadistica.registro.mes.actual.cantidad');//
Route::get('sede/registros-meses-anio-actual', SedeEstadisticaRegistroMesesAnoActualCantidadPagina::class)->name('sede.estadistica.registro.mes.ano.actual.cantidad');//
Route::get('sede/registros-anios', SedeEstadisticaRegistroAnosCantidadPagina::class)->name('sede.estadistica.registro.ano.cantidad');//

Route::get('encargados', EncargadoTodoPagina::class)->name('encargado.index');//
Route::get('encargado/crear', EncargadoCrearPagina::class)->name('encargado.crear');//
Route::get('encargado/{encargado}/editar', EncargadoEditarPagina::class)->name('encargado.editar');//
Route::get('encargado/{encargado}/informacion', EncargadoInformacionPagina::class)->name('encargado.informacion');//

Route::get('especialidades', EspecialidadTodoPagina::class)->name('especialidad.index');//
Route::get('especialidad/crear', EspecialidadCrearPagina::class)->name('especialidad.crear');//
Route::get('especialidad/{especialidad}/editar', EspecialidadEditarPagina::class)->name('especialidad.editar');//
Route::get('especialidad/{especialidad}/informacion', EspecialidadInformacionPagina::class)->name('especialidad.informacion');//
Route::get('especialidad/odontologos', EspecialidadEstadisticaOdontologoCantidadPagina::class)->name('especialidad.estadistica.odontologo.cantidad');//
Route::get('especialidad/{especialidad}/odontologos', EspecialidadEstadisticaOdontologoListaPagina::class)->name('especialidad.estadistica.odontologo.lista');//
Route::get('especialidad/clinicas', EspecialidadEstadisticaClinicaCantidadPagina::class)->name('especialidad.estadistica.clinica.cantidad');//
Route::get('especialidad/{especialidad}/clinicas', EspecialidadEstadisticaClinicaListaPagina::class)->name('especialidad.estadistica.clinica.lista');//

Route::get('odontologos', OdontologoTodoPagina::class)->name('odontologo.index');//
Route::get('odontologo/crear', OdontologoCrearPagina::class)->name('odontologo.crear');//
Route::get('odontologo/{odontologo}/editar', OdontologoEditarPagina::class)->name('odontologo.editar');//
Route::get('odontologo/{odontologo}/informacion', OdontologoInformacionPagina::class)->name('odontologo.informacion');//
Route::get('odontologo/{odontologo}/pacientes', OdontologoPacienteTodoPagina::class)->name('odontologo.paciente.todo');//
Route::get('odontologo/{odontologo}/paciente/crear', OdontologoPacienteCrearPagina::class)->name('odontologo.paciente.crear');
Route::get('odontologo/{odontologo}/paciente/{paciente}/editar', OdontologoPacienteEditarPagina::class)->name('odontologo.paciente.editar');
Route::get('odontologo/{odontologo}/direccion/crear', OdontologoDireccionCrearPagina::class)->name('odontologo.direccion.crear');//
Route::get('odontologo/{odontologo}/direccion/editar', OdontologoDireccionEditarPagina::class)->name('odontologo.direccion.editar');//
Route::get('odontologos/departamentos', OdontologoEstadisticaDepartamentoCantidadPagina::class)->name('odontologo.estadistica.departamento.cantidad');//
Route::get('odontologos/departamento/{departamento}', OdontologoEstadisticaDepartamentoListaPagina::class)->name('odontologo.estadistica.departamento.lista');//
Route::get('odontologos/provincia/{provincia}', OdontologoEstadisticaProvinciaListaPagina::class)->name('odontologo.estadistica.provincia.lista');//
Route::get('odontologos/distrito/{distrito}', OdontologoEstadisticaDistritoListaPagina::class)->name('odontologo.estadistica.distrito.lista');//

Route::get('clinicas', ClinicaTodoPagina::class)->name('clinica.index');//
Route::get('clinica/crear', ClinicaCrearPagina::class)->name('clinica.crear');//
Route::get('clinica/{clinica}/editar', ClinicaEditarPagina::class)->name('clinica.editar');//
Route::get('clinica/{clinica}/informacion', ClinicaInformacionPagina::class)->name('clinica.informacion');
Route::get('clinica/{clinica}/pacientes', ClinicaPacienteTodoPagina::class)->name('clinica.paciente.todo');//
Route::get('clinica/{clinica}/paciente/crear', ClinicaPacienteCrearPagina::class)->name('clinica.paciente.crear');
Route::get('clinica/{clinica}/paciente/{paciente}/editar', ClinicaPacienteEditarPagina::class)->name('clinica.paciente.editar');
Route::get('clinica/{clinica}/direccion/crear', ClinicaDireccionCrearPagina::class)->name('clinica.direccion.crear');
Route::get('clinica/{clinica}/direccion/editar', ClinicaDireccionEditarPagina::class)->name('clinica.direccion.editar');
Route::get('clinicas/departamentos', ClinicaEstadisticaDepartamentoCantidadPagina::class)->name('clinica.estadistica.departamento.cantidad');
Route::get('clinicas/departamento/{departamento}', ClinicaEstadisticaDepartamentoListaPagina::class)->name('clinica.estadistica.departamento.lista');
Route::get('clinicas/provincia/{provincia}', ClinicaEstadisticaProvinciaListaPagina::class)->name('clinica.estadistica.provincia.lista');
Route::get('clinicas/distrito/{distrito}', ClinicaEstadisticaDistritoListaPagina::class)->name('clinica.estadistica.distrito.lista');

Route::get('servicios', ServicioTodoPagina::class)->name('servicio.index');//
Route::get('servicio/crear', ServicioCrearPagina::class)->name('servicio.crear');//
Route::get('servicio/{servicio}/editar', ServicioEditarPagina::class)->name('servicio.editar');//
Route::get('servicio/{servicio}/informacion', ServicioInformacionPagina::class)->name('servicio.informacion');//

Route::get('pacientes', PacienteTodoPagina::class)->name('paciente.index');//
Route::get('paciente/crear', PacienteCrearPagina::class)->name('paciente.crear');//
Route::get('paciente/{paciente}/editar', PacienteEditarPagina::class)->name('paciente.editar');//
Route::get('paciente/{paciente}/informacion', PacienteInformacionPagina::class)->name('paciente.informacion');//
Route::get('paciente/{paciente}/odontologos', PacienteOdontogoTodoPagina::class)->name('paciente.odontologo.todo');
Route::get('paciente/{paciente}/clinicas', PacienteClinicaTodoPagina::class)->name('paciente.clinica.todo');
Route::get('paciente/{paciente}/direccion/crear', PacienteDireccionCrearPagina::class)->name('paciente.direccion.crear');//
Route::get('paciente/{paciente}/direccion/editar', PacienteDireccionEditarPagina::class)->name('paciente.direccion.editar');//

Route::get('ventas', VentaTodoLivewire::class)->name('venta.index');//
Route::get('venta/crear', VentaCrearLivewire::class)->name('venta.crear');
Route::get('venta/{venta}/editar', VentaEditarLivewire::class)->name('venta.editar');
Route::post('venta/{venta}/dropzone', [VentaController::class, 'dropzone'])->name('venta.dropzone');//
Route::get('venta/ventas-mes-actual-cantidad', VentaEstadisticaVentaMesActualCantidadPagina::class)->name('venta.estadistica.venta.mes.actual.cantidad');//
Route::get('venta/ventas-mes-actual-lista', VentaEstadisticaVentaMesActualListaPagina::class)->name('venta.estadistica.venta.mes.actual.lista');//
Route::get('venta/ventas-meses-anio-actual-cantidad', VentaEstadisticaVentaMesesAnoActualCantidadPagina::class)->name('venta.estadistica.venta.mes.ano.actual.cantidad');//
Route::get('venta/ventas-meses-anio-actual-lista', VentaEstadisticaVentaMesesAnoActualListaPagina::class)->name('venta.estadistica.venta.mes.ano.actual.lista');//
Route::get('venta/ventas-anios-cantidad', VentaEstadisticaVentaAnosCantidadPagina::class)->name('venta.estadistica.venta.ano.cantidad');//

Route::get('usuarios/departamentos', UsuarioEstadisticaDepartamentoCantidadPagina::class)->name('usuario.estadistica.departamento.cantidad');
Route::get('usuarios/departamento/{departamento}', UsuarioEstadisticaDepartamentoListaPagina::class)->name('usuario.estadistica.departamento.lista');

Route::get('canjeos', CanjeoTodoLivewire::class)->name('canjeo.index');
Route::get('canjeo/crear', CanjeoCrearLivewire::class)->name('canjeo.crear');
Route::get('canjeo/{canjeo}/editar', CanjeoEditarLivewire::class)->name('canjeo.editar');
Route::post('canjeo/{canjeo}/dropzone', [CanjeoController::class, 'dropzone'])->name('canjeo.dropzone');
