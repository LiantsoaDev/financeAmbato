@if( $mouvement->count() > 0 )
<div class="w-box w-box-blue" id="table">
        <div class="w-box-header">
            <h4>Invoices Preview</h4>
        </div>
        <div class="w-box-content cnt_a invoice_preview">
                    <table class="table invE_table">
                        <thead>
                            <tr>
                                <th>Libelle</th>
                                <th>Caisse/Banque</th>
                                <th>Numéro de compte</th>
                                <th>montant en Ar</th>
                                <th>Numéro de Pièce</th>
                                <th>Numéro de chèque</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mouvement as $mvt)
                            <tr>
                                <td>{{ $mvt->libelle }}</td>
                                <td>{{ (!empty($mvt->debit->type)? $mvt->debit->type : $mvt->credit->type) }}</td>
                                <td>{{ $mvt->compte->compte }}</td>
                                <td>{{ (!empty($mvt->debit->montant)? $mvt->debit->montant : $mvt->credit->montant ) }}</td>
                                <td>{{ $mvt->piece }}</td>
                                <td>{{ $mvt->cheque }}</td>
                            </tr>
                            @endforeach
                            <tr class="last_row">
                                <td colspan="4">&nbsp;</td>
                                <td colspan="2">
                                    <p class="sepH_a"><span class="muted sepV_b">Sous-total</span>MGA {{$total}}</p>
                                    <p class="sepH_a"><span class="muted sepV_b">Rapport (%)</span>{{$rapport}} %</p>
                                    <p class="sepH_a"><span class="muted sepV_b">Discount</span>-</p>
                                    <p><strong><span class="sepV_b">Total</span>MGA {{$total}}</strong></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>	
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="inv_notes">
                        <span class="label label-info">Notes</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut bibendum libero. Maecenas ultricies ligula sed urna rutrum mollis. Sed quis sem eget risus eleifend vulputate non a justo. Morbi vel mauris sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>
                </div>
            </div>
    </div>
@else
<div class="alert alert-error">
        <a data-dismiss="alert" class="close">×</a>
        <strong>Oups ! </strong> Aucun mouvement disponible pour ce Compte pour le moment .
    </div>
@endif