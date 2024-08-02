@extends('layouts.app')

@section('title')
    BASE DE DATOS
@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css"/>

@endsection


@section('body')
    <div class="container-fluid py-4">

        <div class="row justify-content-center">

            <div class="col-lg-12 col-md-12 justify-content-center align-items-center" style="display: flex;">


                <div class="card m-3">

                    <div class="card-header">
                        <h6 class="card-title text-center">
                            BASE DE DATOS - EL TEMPLO DE LA MODA S.A.S
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table" id="table_users">
                                <thead>
                                    <th>NOMBRE</th>
                                    <th>TELÉFONO</th>
                                    <th>FECHA DE CUMPLEAÑOS</th>
                                    <th>TIENDA</th>
                                    <th>COMPAÑIA</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->date_brirthay }}</td>
                                            <td>{{ $user->name_shop }}</td>
                                            <td>{{ $user->name_company }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection



@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

<script>
var table = $('#table_users').DataTable({
    orderCellsTop: true,
    fixedHeader: true,
    lengthChange: false,
    paging: false,
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
 });

 //Creamos una fila en el head de la tabla y lo clonamos para cada columna
 $('#table_users thead tr').clone(true).appendTo( '#table_users thead' );

 $('#table_users thead tr:eq(1) th').each( function (i) {
     var title = $(this).text(); //es el nombre de la columna
     $(this).html( '<input type="text" placeholder="Filtrar" />' );

     $( 'input', this ).on( 'keyup change', function () {
         if ( table.column(i).search() !== this.value ) {
             table
                 .column(i)
                 .search( this.value )
                 .draw();
         }
     } );
 } );
</script>
@endsection
