<div>

    <!--SEO-->
    @section('tituloPagina', 'Especialidad - Clínicas')

    <!--CONTENEDOR CABECERA-->
    <div class="contenedor_administrador_cabecera">
        <!--CONTENEDOR TITULO-->
        <div class="contenedor_titulo_admin">
            <h2>Especialidad: {{ $especialidad->nombre }}</h2>
        </div>
        <!--CONTENEDOR BOTONES-->
        <div class="contenedor_botones_admin">
            <a href="{{ route('administrador.especialidad.index') }}">
                <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
        </div>
    </div>

    <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
    <div class="contenedor_administrador_contenido">

        <!--BUSCADOR-->
        <div class="contenedor_panel_producto_admin formulario">
            <div class="contenedor_elemento_item">
                <p class="estilo_nombre_input">Buscar clínica: <span class="campo_opcional">(Opcional)</span> </p>
                <input type="text" wire:model="buscarClinica" placeholder="Buscar...">
            </div>
        </div>

        <!--TABLA-->
        <div class="contenedor_panel_producto_admin">
            @if ($clinicas->count())

                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Lista de odontólogos <span> Cantidad: {{ $cantidad_total_clinicas }}</span></h3>
                </div>

                <!--CONTENEDOR BOTONES-->
                <div class="contenedor_botones_admin">
                    <button>
                        PDF <i class="fa-solid fa-file-pdf"></i>
                    </button>
                    <button>
                        EXCEL <i class="fa-regular fa-file-excel"></i>
                    </button>
                    <button onClick="window.scrollTo(0, document.body.scrollHeight);">
                        Abajo <i class="fa-solid fa-arrow-down"></i>
                    </button>
                </div>

                <!--TABLA-->
                <div class="tabla_administrador py-4 overflow-x-auto">
                    <div class="inline-block min-w-full overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th>
                                        Nº</th>
                                    <th>
                                        Clínica</th>
                                    <th>
                                        Nombres</th>
                                    <th>
                                        Apellidos</th>
                                    <th>
                                        Especialidad</th>
                                    <th>
                                        Sede</th>
                                    <th>
                                        Email</th>
                                    <th>
                                        DNI</th>
                                    <th>
                                        COP</th>
                                    <th>
                                        Celular</th>
                                    <th>
                                        Nacimiento</th>
                                    <th>
                                        Género</th>
                                    <th>
                                        Puntos</th>
                                    <th>
                                        Registro</th>
                                    <th>
                                        Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clinicas as $clinica)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $clinica->nombre_clinica }}
                                        </td>
                                        <td>
                                            {{ $clinica->nombre }}
                                        </td>
                                        <td>
                                            {{ $clinica->apellido }}
                                        </td>
                                        <td>
                                            {{ $clinica->especialidad->nombre }}
                                        </td>
                                        <td>
                                            {{ $clinica->sede->nombre }}
                                        </td>
                                        <td>
                                            {{ $clinica->email }}
                                        </td>
                                        <td>
                                            {{ $clinica->user->dni }}
                                        </td>
                                        <td>
                                            {{ $clinica->user->cop }}
                                        </td>
                                        <td>
                                            {{ $clinica->celular }}
                                        </td>
                                        <td>
                                            {{ $clinica->fecha_nacimiento }}
                                        </td>
                                        <td>
                                            {{ $clinica->genero }}
                                        </td>
                                        <td>
                                            {{ $clinica->puntos }}
                                        </td>
                                        <td>
                                            {{ $clinica->created_at }}
                                        </td>
                                        <td>
                                            <a style="color: #009eff;"
                                                href="{{ route('administrador.clinica.informacion', $clinica) }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="contenedor_no_existe_elementos">
                    <p>No hay odontólogos.</p>
                    <i class="fa-solid fa-spinner"></i>
                </div>
            @endif
        </div>

    </div>

</div>