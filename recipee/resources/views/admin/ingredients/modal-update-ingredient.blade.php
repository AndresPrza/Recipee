<div class="modal fade" id="modal-update-ingredient-{{$ingredient->id}}">
    <div class="modal-dialog">
         <div class="modal-content bg-default">
             <div class="modal-header">
                 <h4 class="modal-title">Editar Ingrediente</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                       </div>
                                        
                     <form action="{{ route('admin.ingredients.update', $ingredient->id) }}" method="POST">
                         {{ csrf_field() }}
                         <div class="modal-body">
                             <div class="form-group">
                                 <label for="ingredient" class="mr-3">Ingrediente</label>
                                 <input type="text" name="ingredient" class="dorm-control" id="ingredient" value="{{ $ingredient->ingredient }}">
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