<label for="v_country" class="control-label req">Listes des Entités:</label>
    <div class="controls">
        <select name="list" id="v_country" class="span6">
            @foreach($getentites as $entity)
            <option value="{{$entity->id}}">{{$entity->nom}}</option>
            @endforeach
        </select>
    </div>