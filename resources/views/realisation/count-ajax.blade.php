
        <div class="formSep">
        <div class="row-fluid">
            <div class="span4">
                <p class="sepH_a"><span class="muted">Numero de compte : </span><strong> {{$result->compte}} </strong></p>
                <input type="hidden" name="compte" value=" {{$result->compte}} ">
            </div>
            <div class="span6">
                <p class="sepH_a"><span class="muted">Libelle de compte : </span><strong> {{$result->libelle}} </strong></p>
            </div>
            <input type="hidden" name="compte_id" value="{{$result->id}}">
        </div>
        </div>
