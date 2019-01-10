<!-- Modal Style -->
<style>
    .modal.fade.in.modal-b
    {
        width: 1050px;
        margin: auto;
        top: 10%;
        left: 18%;
    }
</style>
        <!-- Modal -->
        <div class="modal fade modal-b" id="details" role="dialog">
                <div class="modal-dialog modal-lg">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Détails des mouvements du compte {{$m->compte->compte}}</h4>
                    </div>
                    <div class="modal-body" id="detail">
                                       
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Valider</button>
                    </div>
                  </div>
                  
                </div>
              </div>