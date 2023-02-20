<div>
    @if ($odontologos->count())

        <!--BUSCADOR-->
        <div class="contenedor_panel_producto_admin formulario">
            <div class="contenedor_elemento_item">
                <p class="estilo_nombre_input">Buscar producto: <span class="campo_opcional">(Opcional)</span> </p>
                <input type="text" wire:model="buscarOdontologo" placeholder="Buscar...">
            </div>
        </div>

        <!--TABLA-->
        <div class="contenedor_panel_producto_admin">
            <!--CONTENEDOR SUBTITULO-->
            <div class="contenedor_subtitulo_admin">
                <h3>Lista</h3>
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
                                    Fecha Nacimiento</th>
                                <th>
                                    Género</th>

                                <th>
                                    Puntos</th>
                                <th>
                                    Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($odontologos as $odontologo)
                                <tr>
                                    <td>
                                        {{ $odontologo->nombre }}
                                    </td>
                                    <td>
                                        {{ $odontologo->apellido }}
                                    </td>
                                    <td>
                                        {{ $odontologo->especialidad->nombre }}
                                    </td>
                                    <td>
                                        {{ $odontologo->sede->nombre }}
                                    </td>
                                    <td>
                                        {{ $odontologo->email }}
                                    </td>
                                    <td>
                                        {{ $odontologo->user->dni }}
                                    </td>
                                    <td>
                                        {{ $odontologo->user->cop }}
                                    </td>
                                    <td>
                                        {{ $odontologo->celular }}
                                    </td>
                                    <td>
                                        {{ $odontologo->fecha_nacimiento }}
                                    </td>
                                    <td>
                                        {{ $odontologo->genero }}
                                    </td>
                                    <td>
                                        {{ $odontologo->puntos }}
                                    </td>
                                    <td>
                                        <a href="{{ route('administrador.odontologo.informacion', $odontologo) }}">
                                            <i class="fa-solid fa-eye" style="color: #009eff;"></i>
                                        </a>
                                        |
                                        <a href="{{ route('administrador.odontologo.editar', $odontologo) }}">
                                            <span><i class="fa-solid fa-pencil"></i></span>
                                        </a>
                                        |
                                        <a style="color: red;">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @else
        <div class="contenedor_no_existe_elementos">
            <p>No hay elementos</p>
            <i class="fa-solid fa-spinner"></i>
        </div>
    @endif
</div>
