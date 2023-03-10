<div>
    <!--SEO-->
    @section('tituloPagina', 'Odontólogo - Editar')

    <!--CONTENEDOR CABECERA-->
    <div class="contenedor_administrador_cabecera">
        <!--CONTENEDOR TITULO-->
        <div class="contenedor_titulo_admin">
            <h2>Editar odontólogo</h2>
        </div>
        <!--CONTENEDOR BOTONES-->
        <div class="contenedor_botones_admin">
            <a href="{{ route('administrador.odontologo.index') }}">
                <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
            <button wire:click="$emit('eliminarOdontologoModal')">
                Eliminar odontólogo <i class="fa-solid fa-trash-can"></i>
            </button>
            <a href="{{ route('administrador.odontologo.crear') }}">
                Nuevo odontólogo <i class="fa-solid fa-square-plus"></i></a>
            <a href="{{ route('administrador.odontologo.informacion', $odontologo) }}">
                Información del odontólogo <i class="fa-solid fa-eye"></i></a>
        </div>
    </div>

    <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
    <div class="contenedor_administrador_contenido">

        <div class="contenedor_panel_producto_admin">

            <!--CONTENEDOR SUBTITULO-->
            <div class="contenedor_subtitulo_admin">
                <h3>Formulario</h3>
            </div>

            <!--FORMULARIO-->
            <div x-data="{ digitosDni: '', digitosCelular: '', digitosCop: '', digitosRuc: '' }" class="formulario">

                <!--SEDES Y ESPECIALIDADES-->
                <div class="contenedor_2_elementos">
                    <!--SEDES-->
                    {{-- <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Sedes: <span class="campo_obligatorio">(Obligatorio)</span></p>
                        <select wire:model="sede_id">
                            <option value="" selected disabled>Seleccione una sede</option>
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                            @endforeach
                        </select>
                        @error('sede_id')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div> --}}
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Sedes: <span class="campo_obligatorio">(Obligatorio)</span></p>
                        <select wire:model="sedesSeleccionadas" id="sedesSeleccionadas" name="sedesSeleccionadas[]"
                            multiple>
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                            @endforeach
                        </select>
                        @error('sedesSeleccionadas')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--ESPECIALIDADES-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Especialidades: <span
                                class="campo_obligatorio">(Obligatorio)</span></p>
                        <select wire:model="especialidad_id">
                            <option value="" selected disabled>Seleccione una especialidad</option>
                            @foreach ($especialidades as $especialidad)
                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                            @endforeach
                        </select>
                        @error('especialidad_id')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!--EMAIL Y PASSWORD-->
                <div class="contenedor_2_elementos">
                    <!--EMAIL-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Correo: <span class="campo_obligatorio">(Obligatorio)</span></p>
                        <input type="email" wire:model="email">
                        @error('email')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--PASSWORD-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Contraseña actual: <span
                                class="campo_obligatorio">(Obligatorio)</span></p>
                        <input type="password" wire:model="password" disabled>
                        @error('password')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!--NUEVO PASSWORD Y NOMBRE-->
                <div class="contenedor_2_elementos">
                    <!--NUEVO PASSWORD-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Nueva contraseña: <span class="campo_opcional">(Opcional)</span>
                        </p>
                        <input type="password" wire:model="editar_password" autocomplete="off">
                        @error('editar_password')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--NOMBRE-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Nombres: <span class="campo_obligatorio">(Obligatorio)</span>
                        </p>
                        <input type="text" wire:model="nombre">
                        @error('nombre')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!--APELLIDO Y DNI-->
                <div class="contenedor_2_elementos">
                    <!--APELLIDO-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Apellidos: <span class="campo_obligatorio">(Obligatorio)</span>
                        </p>
                        <input type="text" wire:model="apellido">
                        @error('apellido')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--USERNAME-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Username: <span class="campo_obligatorio">(Obligatorio)</span>
                        </p>
                        <input type="text" wire:model="username" disabled>
                        @error('username')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!--COP Y CELULAR-->
                <div class="contenedor_2_elementos">
                    <!--DNI-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">DNI: <span class="campo_obligatorio">(Obligatorio)</span></p>
                        <input type="number" wire:model="dni" x-ref="digitosDniRef"
                            x-on:keydown="limitarEntrada($refs.digitosDniRef, 8, $event)" x-init="digitosDni = $refs.digitosDniRef.value">
                        @error('dni')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--COP-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">COP: <span class="campo_obligatorio">(Obligatorio)</span> </p>
                        <input type="number" wire:model="cop" x-ref="digitosCopRef"
                            x-on:keydown="limitarEntrada($refs.digitosCopRef, 6, $event)" x-init="digitosCop = $refs.digitosCopRef.value">
                        @error('cop')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!--FECHA DE NACIMIENTO Y PUNTOS-->
                <div class="contenedor_2_elementos">
                    <!--CELULAR-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Celular: <span class="campo_obligatorio">(Obligatorio)</span></p>
                        <input type="number" wire:model="celular" x-ref="digitosCelularRef"
                            x-on:keydown="limitarEntrada($refs.digitosCelularRef, 9, $event)" x-init="digitosCelular = $refs.digitosCelularRef.value">
                        @error('celular')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--PUNTOS-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">PUNTOS: <span class="campo_obligatorio">(Obligatorio)</span>
                        </p>
                        <input type="number" wire:model="puntos">
                        @error('puntos')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!--GÉNERO-->
                <div class="contenedor_2_elementos">
                      <!--FECHA DE NACIMIENTO-->
                      <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Fecha de Nacimiento: <span
                                class="campo_obligatorio">(Obligatorio)</span></p>
                        <input type="date" wire:model="fecha_nacimiento">
                        @error('fecha_nacimiento')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--GÉNERO-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Género: <span class="campo_obligatorio">(Obligatorio)</span>
                        </p>
                        <div>
                            <label>
                                <input type="radio" value="hombre" name="genero" wire:model="genero">
                                Hombre
                            </label>
                            <label>
                                <input type="radio" value="mujer" name="genero" wire:model="genero">
                                Mujer
                            </label>
                        </div>
                        @error('genero')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="contenedor_1_elementos_100">
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">¿Tiénes una clínica?</p>
                        <div>
                            <label>
                                <input type="radio" value="1" name="tiene_clinica"
                                    wire:model.defer="tiene_clinica" x-on:click="$wire.tiene_clinica = true">
                                Sí
                            </label>
                            <label>
                                <input type="radio" value="0" name="tiene_clinica"
                                    wire:model.defer="tiene_clinica" x-on:click="$wire.tiene_clinica = false">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <!--NOMBRE CLÍNICA-->
                <div class="contenedor_2_elementos" x-show="$wire.tiene_clinica">
                    <!--RUC-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">RUC: <span class="campo_obligatorio">(Obligatorio)</span>
                        </p>
                        <input type="text" wire:model="ruc" x-ref="digitosRucRef"
                            x-on:keydown="limitarEntrada($refs.digitosRucRef, 11, $event)" x-init="digitosRuc = $refs.digitosRucRef.value">
                        @error('ruc')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--NOMBRE CLÍNICA-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Nombre de la clínica: <span
                                class="campo_obligatorio">(Obligatorio)</span>
                        </p>
                        <input type="text" wire:model="nombre_clinica">
                        @error('nombre_clinica')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                </div> --}}

                <!--ENVIAR-->
                <div class="contenedor_1_elementos">
                    <button wire:loading.attr="disabled" wire:target="editarOdontologo"
                        wire:click="editarOdontologo">
                        Actualizar
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>

@push('script')
    <script>
        function limitarEntrada(input, longitudMaxima, event) {
            const valor = input.value;

            if (valor.length >= longitudMaxima && event.key !== 'Backspace' && event.key !== 'Delete' &&
                event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') {
                event.preventDefault();
            }
        }

        Livewire.on('eliminarOdontologoModal', () => {
            Swal.fire({
                title: '¿Quieres eliminar?',
                text: "No podrás recuparlo.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('administrador.odontologo.odontologo-editar-pagina',
                        'eliminarOdontologo');
                    Swal.fire(
                        '¡Eliminado!',
                        'Eliminaste correctamente.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
