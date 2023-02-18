<div>
    <!--SEO-->
    @section('tituloPagina', 'Usuarios | Departamento')

    <!--CONTENEDOR CABECERA-->
    <div class="contenedor_administrador_cabecera">
        <!--CONTENEDOR TITULO-->
        <div class="contenedor_titulo_admin">
            <h2>Departamentos</h2>
        </div>        
    </div>

    <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
    <div class="contenedor_administrador_contenido">

        @if ($departamentos_usuarios_cantidad->count())
   
            <!--TABLA-->
            <div class="contenedor_panel_producto_admin">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Usuarios</h3>
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
                                        Departamento</th>
                                    <th>
                                        Cantidad</th>
                                    <th>
                                        Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departamentos_usuarios_cantidad as $departamento)
                                    <tr>
                                        <td>
                                            {{ $departamento->nombre }}
                                        </td>
                                        <td>
                                            {{ $departamento->cantidad }}
                                        </td>
                                        <td>
                                            <a href="{{ route('administrador.usuario.estadistica.departamento.lista', $departamento->id) }}">
                                                <i class="fa-solid fa-eye" style="color: #009eff;"></i>
                                            </a>
                                            |
                                            <a href="">
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
</div>
