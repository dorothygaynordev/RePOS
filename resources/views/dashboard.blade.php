<x-app-layout>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

        <!-- Asegúrate de cargar jQuery antes de DataTables -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    </head>

    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
        <form method="GET" action="{{ route('dashboard') }}">
            @csrf
            <div class="control">
                <div class="select">
                    <div>
                        @if (auth()->check() && in_array(auth()->user()->puesto, [1, 14]))
                            <label>Zona</label><br>
                            <select name="zona" id="zona">
                                <option value="Todas" disabled selected>Seleccione</option>
                                @foreach ($zonas as $zona)
                                    <option value="{{ $zona->descripcion }}">{{ $zona->descripcion }}</option>
                                @endforeach
                            </select>
                        @else
                            <h1 class="zone">Zona: {{ $zonaUsuarioObj->descripcion }}</h1>
                        @endif
                    </div>
                    <div>
                        <label>Reporte</label>
                        <select name="report" id="report">
                            <option value="canceled" disabled selected>Seleccione</option>
                            <option value="1">Cancelaciones</option>
                            <option value="2">Devoluciones (Cambios físicos)</option>
                            <option value="3">Devoluciones (Reembolsos en efectivo)</option>
                        </select>
                    </div>
                </div>
                <div class="range">
                    <div class="date">
                        <div>
                            <label for="fechaInicio">Fecha de inicio:</label><br>
                            <input type="date" id="fechaInicio" name="fechaInicio" class="fecha">
                        </div>
                        <div>
                            <label for="fechaFin">Fecha de fin:</label><br>
                            <input type="date" id="fechaFin" name="fechaFin" class="fecha">
                        </div>
                    </div>
                </div>
                <div class="file">
                    <div>
                        <label>Centros</label>
                        <input name="centros" class="fecha" type="text" style="font-size: 12px" placeholder="Ingrese clave de tienda">
                    </div>
                    <div class="buttons">
                        <div class="btn">
                            <button type="submit" class="buttonFilter" style="">
                                Filtrar <i class="fa fa-filter" aria-hidden="true"></i>
                            </button>
        </form>
        </div>
        <a href="{{ route('exportToExcel' , ['zona' => request('zona'), 'report' => request('report'),'fechaInicio' => request('fechaInicio'), 'fechaFin' => request('fechaFin')])  }}" class="buttonExport">
            <div class="btn">
                <button>
                    Exportar<i class="fa fa-table" style="padding: 5px" aria-hidden="true"></i>
                </button>
            </div>
        </a>
        </div>
        </div>
        </div>
        <div class="btn" style="text-align: center">
            <a href="{{ route('dashboard') }}" class="delfilter">Limpiar filtros <i class="fa fa-refresh"
                    aria-hidden="true"></i></a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">


            <div class="table-container">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Centro</th>
                            <th>SKU</th>
                            <th>Folio</th>
                            <th>Fecha</th>
                            <th>Zona</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Importe</th>
                            <th>Vendedor</th>
                            <th>Forma de Pago</th>
                            <th>Usuario</th>
                            <th>Autorizador</th>
                            <th>Medio de autorización</th>
                            <th>Tipo de movimiento</th>
                            <th>Ticket</th>

                        </tr>
                    </thead>
                    @if (!empty($reportes))
                        @foreach ($reportes as $campo)
                            <tr>
                                <td>{{ $campo->tienda }}</td>
                                <td>{{ $campo->sku }}</td>
                                <td>
                                    {{ $campo->folio }}</td>
                                <td>{{ $campo->fecha }}</td>
                                <td>{{ $campo->zona }}</td>
                                <td>{{ $campo->cantidad }}</td>
                                <td>{{ $campo->precio }}</td>
                                <td>{{ $campo->descuento }}</td>
                                <td>{{ $campo->importe }}</td>
                                <td>{{ $campo->vendedor }}</td>
                                {{-- Forma de pago --}}
                                <td>
                                    @if ($campo->forma_pago == 1)
                                        Efectivo
                                    @elseif($campo->forma_pago == 2)
                                        Tarjeta VISA/MC
                                    @elseif($campo->forma_pago == 3)
                                        P/T
                                    @elseif($campo->forma_pago == 4)
                                        AMEX
                                    @elseif($campo->forma_pago == 5)
                                        Crédito Empleado
                                    @elseif($campo->forma_pago == 6)
                                        -
                                    @elseif($campo->forma_pago == 7)
                                        A placo
                                    @elseif($campo->forma_pago == 8)
                                        Mixto
                                    @elseif($campo->forma_pago == 9)
                                        Orkresta
                                    @elseif($campo->forma_pago == 10)
                                        Vale Todo
                                    @elseif($campo->forma_pago == 11)
                                        Kueski pay
                                    @elseif($campo->forma_pago == 12)
                                        Omnity
                                    @endif
                                </td>
                                <td>{{ $campo->usuario }}</td>
                                <td>{{ $campo->autorizador }}</td>
                                {{-- Medio autorizacion --}}
                                <td>
                                    @if ($campo->Medio_aut == 1)
                                        Huella
                                    @elseif($campo->Medio_aut == 2)
                                        Token
                                    @else
                                        Sin movimiento
                                    @endif
                                </td>
                                {{-- Tipo de Movimiento --}}
                                <td>
                                    @if ($campo->tipo_mov == 1)
                                        Cancelacion
                                    @elseif($campo->tipo_mov == 2)
                                        Devolucion
                                    @elseif($campo->tipo_mov == 3)
                                        Devolucion (Reembolso efectivo)
                                    @endif
                                </td>
                                <td><button>
                                        <i class="fa fa-ticket fa-2x open-file" aria-hidden="true"
                                            data-folio="{{ $campo->folio }}" data-tienda="{{ $campo->tienda }}"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p colspan:"15"> No hay nada para mostrar </p>
                    @endif

                </table>
            </div>
            <div id="fileContentContainer"></div>
        </div>
    </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var buttons = document.querySelectorAll('.open-file');

        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                var folio = this.getAttribute('data-folio');
                var tienda = this.getAttribute('data-tienda');
                var url = '{{ route('ticket', ['folio' => ':folio', 'tienda' => ':tienda']) }}'
                    .replace(':folio', folio)
                    .replace(':tienda', tienda);
                window.open(url, '_blank');
            });
        });
    });
</script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Inicializa DataTable en la tabla con el ID "table"
        $('.custom-table').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish_Mexico.json"
            },
            searching: false,
            lengthChange: true, // Activa la opción para cambiar la cantidad de registros por página
            lengthMenu: [10, 25, 50, 100], // Define las opciones de cantidad de registros por página
            pageLength: 10, // Establece la cantidad de registros por página predeterminada
            lengthChange: false,
            info: false,
            order: [
                [0, ''],
                [1, ''],
                [2, ''],
                [3, ''],
                [4, '']
            ], // Ordena todas las columnas en orden ascendente
            columnDefs: [{
                targets: [
                    8, 9, 10, 11, 12, 13, 14, 15
                ],
                orderable: false // Desactiva el ordenamiento para la columna especificada
            }]
        });
    });
</script>
