<x-app-layout>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <link rel="stylesheet" href="{{ asset('assets/css/tokenGeneration.css') }}">
    <div class="container">
        <div class="content">
            <h1 style="font-size:30px; color: #575757">Generar Token <i class="fa fa-key" aria-hidden="true"></i></h1>
            <div class="form" >
                <div class="register">
                    <p>Ingrese correctamente los campos</p>
                    <p> <FONT  COLOR="red">*</FONT> Campos necesarios</p>
                    <form method="POST" action="{{ route('tokenG') }}">
                        @csrf

                        <script>
                            // Función para convertir a mayúsculas cuando se cambia el valor del campo "centro"
                            function convertirAMayusculas(input) {
                                input.value = input.value.toUpperCase();
                            }
                        </script>
                        
                        <div class="mt-4">
                            <label for="centro">Centro <FONT  COLOR="red">*</FONT></label><br>
                            <input type="text" class="input" id="centro" name="centro" placeholder="Ej. D123" maxlength="4" pattern="[A-Za-z][0-9]{3}" oninput="convertirAMayusculas(this)" required>
                        </div>
                        <div class="mt-4">
                            <label for="date"> Fecha <FONT  COLOR="red">*</FONT></label> <br>
                            <input type="date" class="input" id='fecha' name="fecha" required>
                            <div class="mt-4">
                                <label for="name"> N° de colaborador <FONT  COLOR="red">*</FONT></label><br>
                                <input type="text" class="input" id="numero_colaborador" name="colaborador" placeholder="Ej. 12345" maxlength="5" pattern="\d{5}" required>
                            </div>
                            <div class="mt-4">
                                <label for="centro">Puesto <FONT  COLOR="red">*</FONT></label><br>
                                <select class="input" id="puesto" name="puesto" style="width: 300px">
                                    <option  disabled selected>Seleccione un puesto</option>
                                    @if (!empty($puestos))
                                        @foreach ($puestos as $puesto)
                                        <?php
                                        // Agregar un 0 si la longitud de clave_cargo es menor a 2
                                        $clave_cargo = str_pad($puesto->clave_cargo, 2, '0', STR_PAD_LEFT);
                                        ?>
                                        <option value="{{ $clave_cargo }}">{{ $puesto->cargo }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div style="padding-top:10px ">
                                <label for="name"> Motivo de generación de Token</label> <br>
                                <input type="text" class="input" id="motivo_generacion_token"
                                    name="motivo_generacion_token">
                            </div>
                            <input type="hidden" name="usuario" value="{{ auth()->user()->name }}">

                            <div class="button">
                                <button class="btn" type="submit" name="name" required autofocus
                                    autocomplete="name">Generar Token <i class="fa fa-key" aria-hidden="true"></i></button>
                            </div>

                                



                    </form>


                </div>
            </div>
            <div class="token" style="margin-bottom: 20px">

                <p>Token Generado:</p>
                <div class="copy">
                    <button id="copyButton" class="copy" style="font-size: x-large;">Click aquí para copiar token <i class="fa fa-clone"
                            aria-hidden="true"></i></button>
                </div>
                @if (!empty($new_token))
                    <div style="padding-top: 30px">
                        <h1 class="tg" id="tokenValue">{{ $new_token }}</h1>
                    </div>
                @endif

            </div>
        </div>


    </div>
    <x-validation-errors class="mb-4" />


    <script>
        const copyButton = document.getElementById('copyButton');
        const tokenValue = document.getElementById('tokenValue');

        copyButton.addEventListener('click', () => {
            // Seleccionar el texto del token
            const range = document.createRange();
            range.selectNode(tokenValue);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);

            // Copiar el texto seleccionado al portapapeles
            document.execCommand('copy');

            // Limpiar la selección
            window.getSelection().removeAllRanges();

            // Notificar al usuario que se ha copiado el texto
            const alert = document.createElement('div');
            alert.className = 'alert';
            alert.innerText = 'Token copiado al portapapeles: ' + tokenValue.innerText;

            // Agregar la alerta dentro del div con clase "token"
            const tokenDiv = document.querySelector('.token');
            tokenDiv.appendChild(alert);

            // Eliminar la alerta después de un tiempo
            setTimeout(() => {
                alert.remove();
            }, 3000); // Eliminar la alerta después de 3 segundos
        });
    </script>
</x-app-layout>
