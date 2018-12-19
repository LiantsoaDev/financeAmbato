@extends('layouts.app')

@section('style')
<!-- aditional stylesheets -->
        <!-- datatables -->
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/css/datatables_beoro.css')}}">
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/extras/TableTools/media/css/TableTools.css')}}">
        <!-- select2css --->
        <link rel="stylesheet" href="{{asset('public/js/lib/select2/select2.css')}}">
        <!-- main stylesheet -->
            <link rel="stylesheet" href="{{asset('public/css/beoro.css')}}">
            <link href="{{asset('public/css/loading-bar.css')}}" rel="stylesheet" />
        
@endsection

@section('breadcrumb')

<div class="container">
    <ul id="breadcrumbs">
        <li><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
        <li><a href="javascript:void(0)">Réalisations</a></li>
        <li><a href="{{route('mouvement.journal')}}">Journal</a></li>
        <li><a href="{{URL::current()}}">Etat</a></li>
    </ul>
</div>

@endsection


@section('content')
    
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                    <div class="w-box w-box-blue" id="imprime_moi">
                            <div class="w-box-header">
                                <h4>Invoices Preview</h4>
                            </div>
                            <div class="w-box-content cnt_a invoice_preview">

                                    @include('notify.message')

                                <div class="toolbar clearfix">
                                    <div class="pull-left">
                                        <div class="toolbar-icons clearfix">
                                            <a class="ptip_ne" title="Envoyer l'Etat par email" data-toggle="modal" data-target="#myModal"><i class="icsw16-pencil icsw16-white"></i></a>
                                            <a href="{{ route('download.pdf', $compte->compte ) }}" class="ptip_ne" title="Télécharger l'Etat"><i class="icsw16-printer icsw16-white"></i></a>
                                        </div>
                                    </div>

                                    @include('journal.sendmail')

                                    <div class="pull-right">
                                        <span class="toolbar_text"><span class="muted">Dernière mise à jour:</span> {{\Carbon\Carbon::now()->format('d/m/Y H:i:s')}}</span>
                                    </div>
                                </div>
                                <h2><span>Etats</span></h2>
                                <div class="row-fluid">
                                    <div class="span8">
                                        <p class="sepH_a"><span class="muted"><strong> Numéro de compte </strong></span><strong> : {{$compte->compte}} </strong></p>
                                        <p class="sepH_a"><span class="muted"><strong> Libellé de compte </strong></span><strong> : {{$compte->libelle}} </strong></p>
                                        <p class="sepH_a"><span class="muted"><strong>Date de création </strong></span><strong> : {{ (!empty($compte->created_at)?$compte->created_at : ' ../../.. ') }}</strong></p>
                                        <p class="sepH_a"><span class="muted"><strong>Date de modification </strong></span><strong> : {{ (!empty($compte->updated_at)?$compte->updated_at : ' ../../.. ') }}</strong></p>
                                    </div>
                                    <div class="span4">
                                        <strong class="muted">Plus d'information</strong>
                                        <p class="sepH_a"><span class="muted"><strong> Montant ( Total en Ar ) </strong></span><strong> : {{$total}} Ar</strong></p>	
                                        @php
                                            $nature = substr($compte->compte,0,1);
                                            switch ($nature) {
                                                case '6':
                                                    $nature = "débiteur";
                                                    break;
                                                case '7':
                                                    $nature = "créditeur";
                                                    break;
                                            }
                                        @endphp
                                        <p class="sepH_a"><span class="muted"><strong> Nature du compte </strong></span><strong> : Compte {{$nature}} </strong></p>	
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <table class="table invE_table">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Libelle de mouvement</th>
                                                    <th>Action</th>
                                                    <th>Caisse/Banque</th>
                                                    <th>Numéro de pièce</th>
                                                    <th>Numéro de chéque</th>
                                                    <th>Montant</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($mouvements as $m)
                                                <tr>
                                                    <td>{{ date('d/m/Y',strtotime($m->date)) }}</td>
                                                    <td>{{$m->libelle}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                                <a href="{{route('mouvement.update',[$m->id,$compte->compte])}}" class="btn btn-mini" title="Edit"><i class="icon-pencil"></i></a>
                                                                <a href="#" class="btn btn-mini" title="Delete"><i class="icon-trash"></i></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($m->type == 'B')
                                                        <div class="sepH_b">
                                                                <button class="btn btn-success disabled">Banque</button>
                                                            </div>
                                                        @elseif($m->type == 'C')
                                                        <div class="sepH_b">
                                                                <button class="btn btn-primary disabled">Caisse</button>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>{{$m->piece}}</td>
                                                    <td>{{$m->cheque}}</td>
                                                    <td><strong>{{ (!empty($m->debit->montant)?$m->debit->montant : $m->credit->montant) }} Ar </strong></td>
                                                </tr>
                                                @endforeach
                                                <tr class="last_row">
                                                    <td colspan="5">&nbsp;</td>
                                                    <td colspan="2">
                                                        <p class="sepH_a"><span class="muted sepV_b">Sous total</span>MGA {{$total}}</p>
                                                        <p class="sepH_a"><span class="muted sepV_b">Rapport (%)</span>-</p>
                                                        <p class="sepH_a"><span class="muted sepV_b">Discount</span>-</p>
                                                        <p><strong><span class="sepV_b">Total</span>MGA {{$total}}</strong></p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>	
                                    </div>
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
                        </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
 <!-- datatables -->
            <script src="{{asset('public/js/lib/datatables/js/jquery.dataTables.min.js')}}"></script>
        <!-- datatables column reorder -->
            <script src="{{asset('public/js/lib/datatables/extras/ColReorder/media/js/ColReorder.min.js')}}"></script>
        <!-- datatables column toggle visibility -->
            <script src="{{asset('public/js/lib/datatables/extras/ColVis/media/js/ColVis.min.js')}}"></script>
        <!-- datatable table tools -->
            <script src="{{asset('public/js/lib/datatables/extras/TableTools/media/js/TableTools.min.js')}}"></script>
            <script src="{{asset('public/js/lib/datatables/extras/TableTools/media/js/ZeroClipboard.js')}}"></script>
        <!-- datatables bootstrap integration -->
            <script src="{{asset('public/js/lib/datatables/js/jquery.dataTables.bootstrap.min.js')}}"></script>
            <script src="{{asset('public/js/pages/beoro_datatables.js')}}"></script>
        <!-- Page script Page.js -->
            <script src="{{asset('public/js/loading/page.min.js')}}"></script>
        <!-- enchanced select box, tag handler -->
            <script src="{{asset('public/js/lib/select2/select2.min.js')}}"></script>
            <script>
                $(document).ready(function() {
                    if($('#s2_destination').length) {
                        $('#s2_destination').select2({
                            tags:[{!!$listes_chaines!!}],
                            tokenSeparators: [",", " "]
                        });
                    }
                });
            </script>
             <!-- Loading Data -->
             <script src="{{asset('public/js/pages/beoro_form_elements.js')}}"></script>

@endsection