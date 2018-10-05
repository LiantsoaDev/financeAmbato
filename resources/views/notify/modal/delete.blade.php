<!-- Modal -->
<div class="modal fade" id="suppression{{$budget->id}}" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirmation de suppression du budget {{$budget->annee}}</h4>
            </div>
            <div class="modal-body">
                    <form role="form" method="POST" action="{{$delete}}">
                        {{ csrf_field() }}
                            <div class="form-inline">
                              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Confirmer votre mot de passe : </label>
                            <input type="hidden" name="id" value="{{$budget->id}}">
                              <input type="password" class="form-control" id="psw" name="password" placeholder="Entrer le mot de passe">
                              <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-off"></span> Confirmer</button>
                            </div>
                    </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
          </div>
          
        </div>
      </div>