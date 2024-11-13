<x-app-layout>

    <head>
        <link rel="stylesheet" href="{{ asset('assets/css/detailStore.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

        <!-- Asegúrate de cargar jQuery antes de DataTables -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    </head>

    
    <div class="container">
        <h1 style="font-size: 46px; font-weight: 400; color:##737373; padding-left:10px;letter-spacing: -0.08rem; margin:10px; ">{{$description}} <span style="color:#b9b9b9;font-size:38px; ">/ {{$store}} / </span><span style="color:#b9b9b9; font-size:38px">{{$group}}</span></h1>
   

            <table class="custom-table" style="width: 80%; margin:0 auto; text-align:center; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="text-align: center">SKU</th>
                        <th>Inventario</th>
                        <th>Ventas</th>
                        
                    </tr>
                </thead>
            <tbody style="text-align: center">
                @foreach($centerSales as $ventas)
                @php
               
               $imageUrl = 'https://posdg.onlyclouddg.com/img/miniaturas/' .  $ventas->SKU . '.webp';
               @endphp
                <tr >
                    
                    <td>{{$ventas->SKU}}</td>
                    <td><?php echo intval($ventas->Inventario); ?></td>
                    <td><?php echo intval($ventas->Ventas); ?></td>
                    
                    
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inicializa DataTable en la tabla con el ID "table"
            $('.custom-table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                searching: true,
                lengthChange: true, // Activa la opción para cambiar la cantidad de registros por página
                pageLength: 1000, // Establece la cantidad de registros por página predeterminada
                
                lengthChange: false,
                info: false,
                
            });
        });
    </script>
    
    
</x-app-layout>

