<x-app-layout>

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/">
        <title>Mesa de Bienvenida</title>
        <script src="https://kit.fontawesome.com/d07c279fdc.js" crossorigin="anonymous"></script>


        <!-- Incluye la biblioteca jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Incluye la biblioteca DataTables -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous" />


        <style>
            body,
            html {
                height: 100%;
                margin: 0;
                background: #F2F4F6;
            }

            .back {
                background: #F2F4F6;
                border-radius: 40px;

                height: 730px;
                box-shadow: rgb(27, 89, 248, 0.2) 0px 4px 12px;
            }

            .back-content {

                background: #F2F4F6;
                width: 76%;
                left: 30px;
                height: 650px;
                margin-left: 350px;
                border-bottom-left-radius: 20px;
                border-top-left-radius: 20px;
                border-top-right-radius: 40px;
                border-bottom-right-radius: 40px;
                box-shadow: rgb(27, 89, 248, 0.2) 0px 4px 12px;
            }

            .back-table {
                background: #FFF;
                height: 585px;
                border-bottom-left-radius: 20px;
                border-top-left-radius: 20px;
                border-top-right-radius: 40px;
                border-bottom-right-radius: 40px;
            }

            .form {
                margin-top: 150px;
                text-align: center
            }

            .menu {

                position: fixed;
                top: 90px;
                left: 25px;
                width: 300px;
                height: 649px;
                /* Ancho del menú */
                background-color: #FFF;
                /* Color de fondo del menú */

                opacity: 1;
                transform: translateY(-100%);
                transition: transform 0.3s ease, opacity 0.3s ease;
                border-bottom-left-radius: 30px;
                border-top-left-radius: 30px;
                border-bottom-right-radius: 20px;
                border-top-right-radius: 20px;
                box-shadow: 0px 4px 6px rgb(27, 89, 248, 0.2);
                text-align: left;
            }

            .menu.active {
                display: block;
                opacity: 1;
                transform: translateY(0);
            }

            .menu ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
                max-height: 600px;
                /* Ajusta la altura máxima del menú según sea necesario */
                overflow-y: auto;
                /* Añade una barra de desplazamiento vertical cuando sea necesario */
            }

            .menu ul::-webkit-scrollbar {
                width: 10px;
                /* Ancho de la barra de desplazamiento */
            }

            .menu ul::-webkit-scrollbar-thumb {
                background-color: #888;
                /* Color del relleno de la barra de desplazamiento */
                border-radius: 5px;
                /* Radio de borde de la barra de desplazamiento */
            }

            .menu ul::-webkit-scrollbar-track {
                background-color: #f2f2f2;
                /* Color del fondo de la barra de desplazamiento */
            }

            .menu ul li {
                padding: 15px 20px;
                /* Aumenta el espacio entre elementos */
                font-size: 16px;
                /* Reducir el tamaño del texto */
                border-bottom: 1px solid #EEE;
                /* Línea divisoria entre elementos */
            }

            .menu ul li:last-child {
                border-bottom: none;
                /* No aplicar línea divisoria al último elemento */
            }

            .menu ul li a {
                text-decoration: none;
                color: #000;
                display: block;
                transition: color 0.3s ease;
                /* Agregar transición de color al hacer hover */
            }

            .menu ul li a:hover {
                color: #000;
                background-color: #DFEEFF;
                padding: 5px;
                border-radius: 10px;
                /* Cambiar el color de fondo al hacer hover */
            }


            ul {
                list-style-type: disc;
                font-weight: 500;
            }


            .input {
                width: 150px;
                height: 40px;
                border-radius: 10px;
                border: 1px #C2C2C2 solid;
            }

            .btn {
                width: 250px;
                height: 40px;
                border-radius: 10px;
                background: #000;
                border: 1px #C2C2C2 solid;
                color: #F2F4F6;
            }

            .btne {
                width: 250px;
                height: 40px;
                border-radius: 10px;
                background: #27B436;
                border: 1px #C2C2C2 solid;
                color: #F2F4F6;
            }

            i {
                margin: 10px;
                font-size: 30px;
            }

            .fixed-header {
                position: sticky;
                /* Fija la posición de las cabeceras */
                top: 0;
                /* Fija las cabeceras en la parte superior del contenedor */
                z-index: 1;
                /* Asegura que las cabeceras estén por encima del contenido de la tabla */
                background-color: #FFF;
                /* Color de fondo para las cabeceras */
            }

            .back-table {
                height: 550px;
                /* Altura máxima de la tabla */
                overflow-y: auto;
                /* Agregar una barra de desplazamiento vertical cuando sea necesario */
            }

            /* Estilos para WebKit (Chrome, Safari) */
            .back-table::-webkit-scrollbar {
                width: 10px;
                /* Ancho de la barra de desplazamiento */
            }

            .back-table::-webkit-scrollbar-thumb {
                background-color: #888;
                /* Color del relleno de la barra de desplazamiento */
                border-radius: 5px;
                /* Radio de borde de la barra de desplazamiento */
            }

            .back-table::-webkit-scrollbar-track {
                background-color: #f2f2f2;
                /* Color del fondo de la barra de desplazamiento */
            }

            /* Estilos para Firefox */
            .back-table {
                scrollbar-width: 10PX;
                /* Ancho de la barra de desplazamiento en Firefox */
            }

            .back-table::-moz-scrollbar {
                width: 10px;
                /* Ancho de la barra de desplazamiento en Firefox */
            }

            .back-table::-moz-scrollbar-thumb {
                background-color: #888;
                /* Color del relleno de la barra de desplazamiento en Firefox */
                border-radius: 5px;
                /* Radio de borde de la barra de desplazamiento en Firefox */
            }

            .back-table::-moz-scrollbar-track {
                background-color: #f2f2f2;
                /* Color del fondo de la barra de desplazamiento en Firefox */
            }

            th {
                width: 300px;
                padding: 10px;
                text-align: center;
            }

            .plus {
                font-size: x-large;
                font-weight: bolder;
                padding: 0 5px;
                border-radius: 50%;
            }

            li.active {
                background-color: rgb(27, 89, 248, 0.1);
                font-weight: bold;
                color: #1B59F8;
            }

            .file:hover {
                background-color: rgb(27, 89, 248, 0.03);
            }
        </style>
    </head>

    <body class="antialiased">
        <div class="back">
            <div style="">
                <nav class="container-fluid d-flex justify-content-between align-items-center">
                    {{-- <button class="" style="border: 0; " onclick="toggleMenu()">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button> --}}

                    <div id="menu" class="menu active">

                        <form action="{{ route('tiendas') }}" method="post">
                            @csrf
                            <div class="form">

                                <label style="font-weight:bolder; font-size:x-large; padding:10px">Tienda:
                                </label><input class="input" type="text" name="store" id="store"
                                    placeholder="Ingrese clave de tienda" style="text-align:center margin-bottom:20px;">

                                <div id="secondInputContainer" style="display: none;">
                                    <label style="font-weight:bolder; font-size:x-large; padding:10px;">A:</label><input
                                        class="input" type="text" name="secondInput" id="secondInput"
                                        placeholder="Ingrese fin de rango de tiendas" style=" text-align:center; ">
                                </div>
                                <div
                                    style=" display: flex; justify-content: center; align-items: center; padding:10px;">
                                    <input type="checkbox" name="showSecondInput[]" id="showSecondInput"
                                        style=" padding:5px"> <label style="">Buscar por rango de tiendas</label>
                                </div>

                                <button style="font-weight: bolder;" class="btn" type="submit">Buscar</button>



                            </div>
                        </form>
                        <a href="{{ route('exportToExcelStores', ['store' => request('store'), 'showSecondInput' => request('showSecondInput'), 'secondInput' => request('secondInput')]) }}"
                            class="buttonExport">
                            <div style=" display: flex; justify-content: center; align-items: center; padding:20px;">
                                <button class="btne">
                                    Exportar
                                </button>
                            </div>
                        </a>
                    </div>


                </nav>
            </div>
            <div class="back-content">

                <div class="container" style="text-align:center;  ">
                    <div class="nart"
                        style="display: flex; justify-content: space-between; align-items:center; margin:20px">
                        <h1
                            style="margin-right: 300px; margin-top:20px; text-align:left; font-weight:700; font-size:x-large;">
                            TOP Ventas en Tiendas
                        </h1>

                    </div>


                    <div class="back-table" style="heigth:300px;overflow-y: scroll;">


                        <div class="table-wrapper"
                            style=" overflow-y: auto;overflow-x: auto;text-align:center; margin:10px;">
                            <table id="tablaArticulos" class="display" style="overflow:scroll; text-align:center;">
                                <thead style="position: sticky; top: 0;">

                                    <tr>
                                        <th>Imagen</th>
                                        <th>SKU</th>
                                        <th>Ventas</th>
                                        <th>Inventario</th>
                                        <th>Centro</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $article)
                                        @php
                                            // Concatenar el SKU a la URL base de la imagen
                                            $imageUrl =
                                                'https://posdg.onlyclouddg.com/img/miniaturas/' .
                                                $article->SKU .
                                                '.webp';

                                        @endphp
                                        <tr class="file">
                                            <td><img style="width: 100px; text-align:center;" src="{{ $imageUrl }}"
                                                    alt=""></td>
                                            <td>{{ $article->SKU }}</td>
                                            <td>{{ number_format($article->Ventas, 0) }}</td>
                                            <td>{{ number_format($article->Inventario, 0) }}</td>

                                            <td>{{ $article->CenterId }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const showSecondInputCheckbox = document.getElementById('showSecondInput');
                const secondInputContainer = document.getElementById('secondInputContainer');

                showSecondInputCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        secondInputContainer.style.display = 'block';
                    } else {
                        secondInputContainer.style.display = 'none';
                    }
                });
            });
        </script>
        <script>
            function toggleMenu() {
                // Obtener el elemento de menú a desplegar
                var menu = document.getElementById("menu");
                // Alternar la clase "show" para mostrar u ocultar el menú
                menu.classList.toggle("show");
            }

            function toggleMenu() {
                var menu = document.getElementById("menu");
                menu.classList.toggle("active");
            }
            $(document).ready(function() {
                $('#tablaArticulos').DataTable({
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    },
                    "paging": false, // Desactivar la paginación
                    "lengthChange": false, // Desactivar la selección de cantidad de registros por página
                    "info": false // Desactivar la información sobre la cantidad de registros
                });
            });
        </script>
    </body>

    </html>



</x-app-layout>
