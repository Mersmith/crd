<div>
    <!--SEO-->
    @section('tituloPagina', 'Sedes')

    <!--CONTENEDOR CABECERA-->
    <div class="contenedor_administrador_cabecera">
        <!--CONTENEDOR TITULO-->
        <div class="contenedor_titulo_admin">
            <h2>Sedes</h2>
        </div>

        <!--CONTENEDOR BOTONES-->
        <div class="contenedor_botones_admin">
            <a href="{{ route('administrador.sede.crear') }}">
                Nueva sede <i class="fa-solid fa-square-plus"></i></a>
            <a href="{{ route('administrador.sede.estadistica.registro.mes.actual.cantidad') }}">
                Registros mes actual <i class="fa-solid fa-calendar"></i></a>
            <a href="{{ route('administrador.sede.estadistica.registro.mes.ano.actual.cantidad') }}">
                Registros año actual <i class="fa-regular fa-calendar-days"></i></a>
            <a href="{{ route('administrador.sede.estadistica.registro.ano.cantidad') }}">
                Todos los años <i class="fa-solid fa-calendar-days"></i></a>
        </div>
    </div>

    <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
    <div class="contenedor_administrador_contenido">

        <!--BUSCADOR-->
        <div class="contenedor_panel_producto_admin formulario">
            <div class="contenedor_elemento_item">
                <p class="estilo_nombre_input">Buscar sede: <span class="campo_opcional">(Opcional)</span>
                </p>
                <input type="text" wire:model="buscarSede" placeholder="Buscar...">
            </div>
        </div>
        <!--TABLA-->
        <div class="contenedor_panel_producto_admin">

            @if ($sedes->count())
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Lista de sedes <span> Cantidad: {{ $cantidad_total_sedes }}</span></h3>
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
                                        Sede</th>
                                    <th>
                                        Dirección</th>
                                    <th>
                                        Encargado</th>
                                    <th>
                                        Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sedes as $sede)
                                    <tr style="text-align: center;">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $sede->nombre }}
                                        </td>
                                        <td>
                                            {{ $sede->direccion }}
                                        </td>
                                        <td>
                                            {{ $sede->encargados()->first() ? $sede->encargados()->first()->nombre : 'Falta asignar' }}
                                        </td>
                                        <td>
                                            <a style="color: #009eff;"
                                                href="{{ route('administrador.sede.informacion', $sede) }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a style="color: green;"
                                                href="{{ route('administrador.sede.editar', $sede) }}">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($sedes->hasPages())
                    <div>
                        {{ $sedes->links('pagination::tailwind') }}
                    </div>
                @endif
            @else
                <div class="contenedor_no_existe_elementos">
                    <p>No hay sedes.</p>
                    <i class="fa-solid fa-spinner"></i>
                </div>
            @endif

        </div>

    </div>
</div>
