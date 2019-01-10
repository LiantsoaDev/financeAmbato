<table class="table table-responsive">
        <thead>
            <tr>
                <th><h5>Libelle</h5></th>
                <th><h5>Caisse/Banque</h5></th>
                <th><h5>Numéro de compte</h5></th>
                <th><h5>Numéro de Pièce</h5></th>
                <th><h5>Numéro de chèque</h5></th>
                <th><h5>Action</h5></th>
                <th><h5>montant en Ar</h5></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $mouvement as $m )
                <tr>
                    <td><h5>{{ucfirst($m->libelle)}}</h5></td>
                    <td><h5>{{$m->type}}</h5></td>
                    <td><h5>{{$m->compte->compte}}</h5></td>
                    <td><h5>{{$m->piece}}</h5></td>
                    <td><h5>{{$m->cheque}}</h5></td>
                    <td>
                            <a href="{{route('mouvement.update',[$m->id,$m->compte->compte])}}" class="btn btn-mini" title="Modifier"><i class="icon-pencil"></i></a>
                        <a href="#" class="btn btn-mini" title="Supprimer"><i class="icon-trash"></i></a>
                    </td>
                    <td><h5>{{ !empty($m->debit->montant)? $m->debit->montant : $m->credit->montant }} Ar</h5></td>
                    
                </tr>
            @endforeach
                <tr colspan="3">
                    <td></td><td></td><td></td><td></td><td></td>
                    <td><h5>TOTAL</h5></td>
                    <td><h5>MGA {{$total}}</h5></td>
                </tr>
        </tbody>
    </table> 