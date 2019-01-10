<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Envoyer l'Etat par email : </h4>
        </div>
        <form action="{{route('send.email')}}" method="post" id="send-form-submit">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="col-md-6">
                    <input type="hidden" name="compte" value="{{$compte->compte}}">
                    <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Destinataire</label>
                            <input type="text" id="s2_destination" class="span12" name="destinataire" value="">
                            <span class="help-block">Tapper Nom d'utilisateur à envoyer.</span>
                    </div>
                    <div class="form-group">
                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Message : </label>
                        <textarea rows="3" class="span12" name="message" placeholder="Taper un message ici..."></textarea>
                    </div>
                    <div class="alert alert-success center span10">
                        <a data-dismiss="alert" class="close">×</a>
                        <strong>Pièce Jointe Associée : </strong> la pièce jointe est prête à être envoyé.
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" form="send-form-submit">Envoyer</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
       </form>
      </div>
      
    </div>
  </div>