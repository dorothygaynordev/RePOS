<x-app-layout>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/tokensGenerated.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

        <!-- Asegúrate de cargar jQuery antes de DataTables -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/tokenGenerated.css') }}">
    </head>
    
    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <h1 style="font-size:30px; color: #575757; text-align:center;" >Tokens Generados</h1>
                <div class="table" style="margin:auto">

                    <div class="table-container">
                        
                        <table class="custom-table" style="margin: 30px; height:100px;">
                            <thead>
                                <tr>
                                    <th>Token</th>
                                    <th>Fecha de uso</th>
                                    <th>Colaborador</th>
                                    <th>Tienda</th>
                                    <th>Generó</th>
                                    <th>Fecha de creación</th>
                                    
                                    
                                </tr>
                            </thead>
                            @if (!empty($tokens))
                            @foreach($tokens as $token)
                            <tr>
                                <td>{{$token->token}}</td>
                                <td>{{$token->fechaUso}}</td>
                                <td>{{$token->colaborador}}</td>
                                <td>{{$token->tienda}}</td>
                                <td>{{$token->generador}}</td>
                                <td>{{$token->created_at}}</td>
                                
                            </tr>
                            @endforeach
                            @else
                            <p colspan:"15"> No hay nada para mostrar </p>
                            @endif
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-validation-errors class="mb-4" />

</x-app-layout>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Inicializa DataTable en la tabla con el ID "table"
        $('.custom-table').DataTable({
            paging: false,
            lengthChange: false,
            info: false,
            
        });
    });
</script>