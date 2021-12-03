@extends('adminlte::page')

@section('title', 'ADMIN RECIPES')

@section('content_header')
<h1>
    Recetas
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-recipe">
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
                    <h3 class="card-title">Listado de Recetas</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="recipes" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Receta</th>
                            <th>Contenido</th>
                            <th>Portada</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recipes as $recipe)
                        <tr>
                            <td>{{ $recipe->id }}</td>
                            <td>{{ $recipe->title }}</td>
                            <td>{{ $recipe->content }}</td>
                            <td>
                                <img src="{{ asset($recipe->thumbnail) }}" alt="{{ $recipe->title }}" width="100px" class="img-fluid rounded-lg">
                            </td>
                            <td class="">
                                <div class="relative">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-recipe-{{$recipe->id}}">
                                        Editar
                                    </button>
                                    <form class="" action="{{ route('admin.recipes.delete', $recipe->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                    </form>
                              </div>
                        </td>
                        </tr>
                        <!-- modal update -->
                        @include('admin.recipes.modal-update-recipe')
                        <!-- /.modal update -->
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Receta</th>
                            <th>Contenido</th>
                            <th>Portada</th>
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



<!-- modal create -->
<div class="modal fade" id="modal-create-recipe">
    <div class="modal-dialog">
        <div class="modal-content bg-default w-5/6">
            <div class="modal-header">
                <h4 class="modal-title">Crear Receta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                
                <form action="{{ route('admin.recipes.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="mr-3">Título</label>
                            <input type="text" name="title" class="dorm-control" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail" class="mr-3">Imagen de portada</label>
                            <input type="file" name="thumbnail" class="dorm-control" id="thumbnail" required>
                        </div>
                        <div class="form-group">
                            <label for="content" class="mr-3">Contenido</label>
                            <textarea name="content" class="dorm-control" id="content" cols="50" rows="15" required></textarea>
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
<!-- /.modal create -->
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#recipes').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop