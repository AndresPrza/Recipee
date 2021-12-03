<div class="modal fade" id="modal-update-recipe-{{$recipe->id}}">
    <div class="modal-dialog">
         <div class="modal-content bg-default">
             <div class="modal-header">
                 <h4 class="modal-title">Editar Receta</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                       </div>
                                        
                     <form action="{{ route('admin.recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
                         {{ csrf_field() }}
                         <div class="modal-body">
                             <div class="form-group">
                                 <label for="recipe" class="mr-3">Título</label>
                                 <input type="text" name="title" class="dorm-control" id="recipe" value="{{ $recipe->title }}" required>
                             </div>
                             <div class="form-group">
                                <label for="thumbnail" class="mr-3">Imagen de portada</label>
                                <input type="file" name="thumbnail" class="dorm-control" id="thumbnail">
                             </div>
                             <label for="content" class="mr-3">Contenido</label>
                            <textarea name="contentInput" class="dorm-control" id="contentInput" cols="50" rows="15" required>{{ $recipe->content }}</textarea>
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