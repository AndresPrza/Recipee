@extends('adminlte::page')

@section('title', 'ADMIN INGREDIENTS')

@section('content_header')
<h1>
    Ingredientes
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-ingredient">
        Crear
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de ingredientes</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="ingredients" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ingredient</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingredients as $ingredient)
                        <tr>
                            <td>{{ $ingredient->id }}</td>
                            <td>{{ $ingredient->ingredient }}</td>
                            <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-ingredient-{{$ingredient->id}}">
                                Editar
                            </button>
                            <form action="{{ route('admin.ingredients.delete', $ingredient->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                             <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        </tr>
                        <!-- modal update -->
                        @include('admin.ingredients.modal-update-ingredient')
                        <!-- /.modal update -->
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Ingredient</th>
                            <th>acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-ingredient">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Subir ingrediente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                
                <form action="{{ route('admin.ingredients.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="ingredient" class="mr-3">Ingrediente</label>
                            <input type="text" name="ingredient" class="dorm-control" id="ingredient">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </div>
                </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#ingredients').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop