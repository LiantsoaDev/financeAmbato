@extends('layouts.app')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('style')

    <!-- splashy icon pack -->
    <link rel="stylesheet" href="{{asset('public/img/splashy/splashy.css')}}">
    <!-- flag icons -->
    <link rel="stylesheet" href="{{asset('public/img/flags/flags.css')}}">
    <!-- select2css --->
    <link rel="stylesheet" href="{{asset('public/js/lib/select2/select2.css')}}">
    
    <!-- aditional stylesheets -->
        <!-- Artisto -->
        <link rel="stylesheet" href="{{asset('public/js/lib/jquery-ui/css/Aristo/Aristo.css')}}">
        <!-- datepicker -->
        <link rel="stylesheet" href="{{asset('public/js/lib/bootstrap-datepicker/css/datepicker.css')}}">
        <!-- main stylesheet -->
        <link rel="stylesheet" href="{{asset('public/css/beoro.css')}}">
        <!-- sticky css -->
        <link rel="stylesheet" href="{{asset('public/js/lib/sticky/sticky.css')}}"> 
        <link href="{{asset('public/css/loading-bar.css')}}" rel="stylesheet" />

@endsection

@section('breadcrumb')
    
<div class="container">
    <ul id="breadcrumbs">
        <li><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
        <li><a href="javascript:void(0)">Réalisations</a></li>
        <li><a href="{{route('mouvement.journal')}}">Journal</a></li>
        <li><a href="{{route('mouvement.etat',$compte)}}">Etat</a></li>
        <li><a href="{{URL::current()}}">Modification</a></li>
    </ul>
</div>

@endsection

@section('content')

<!-- main content -->
<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="w-box w-box-blue">
                <div class="w-box-header">
                    <h4>Editable elements</h4>
                </div>
                <div class="w-box-content cnt_a">
                    <p><button class="btn btn-small" id="enable">Enable/Disable</button></p>

                    <form id="form-post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$mouvement->id}}">    

                    <table class="table table-bordered table-striped" id="user">
                        <tbody> 
                            <tr>         
                                <td width="15%">Date</td>
                                <td width="50%">
                                        <div class="controls">
                                            <input class="span4" value="{{$mouvement->date}}" type="date" name="date">
                                        </div>
                                </td>
                                <td width="35%"><span class="muted">Champ Date</span></td>
                            </tr>
                            <tr>         
                                <td>Libelle de mouvement</td>
                                <td><textarea rows="3" class="span8" name="libelle">{{$mouvement->libelle}}</textarea></td>
                                <td><span class="muted">Champ libelle de mouvement</span></td>
                            </tr>  
                            <tr>         
                                <td>Caisse/Banque</td>
                                <td>
                                    <select class="span4" name="type">
                                        <option>Aucun selection</option>

                                        @if( $mouvement->type == 'C')
                                            <option value="C" selected="selected">Caisse</option>
                                            <option value="B">Banque</option>
                                        @elseif( $mouvement->type == 'B')
                                            <option value="B" selected="selected">Banque</option>
                                            <option value="C">Caisse</option>
                                        @endif

                                    </select>
                                </td>
                                <td><span class="muted">Champ type d'encaissement : Banque ou Caisse</span></td>
                            </tr>
                            <tr>         
                                <td>Numéro de pièce</td>
                                <td width="50%"><input type="text" placeholder="Taper quelque chose…" class="span8" name="piece" value="{{ (!empty($mouvement->piece)?$mouvement->piece : null) }}"></td>
                                <td width="35%"><span class="muted">Champ Numéro de pièce</span></td>
                            </tr> 
                            <tr>         
                                <td>Numéro de chèque</td>
                                <td width="50%"><input type="text" placeholder="Taper quelque chose…" class="span8" name="cheque" value="{{ (!empty($mouvement->cheque)?$mouvement->cheque : null) }}"></td>
                                <td width="35%"><span class="muted">Champ Numéro de chèque</span></td>
                            </tr>       
                            <tr>         
                                <td>Montant</td>
                                <td width="50%">
                                    <input type="text" placeholder="Type something…" class="span4" name="montant" value="{{ (!empty($mouvement->debit->montant)?number_format($mouvement->debit->montant, 2, ',', ' ') : number_format($mouvement->credit->montant, 2, ',', ' ')) }}"/><span class="add-on"> MGA</span>
                                </td>
                                <td width="35%"><span class="muted">Champ montant</span></td>
                            </tr>                     
                        </tbody>
                    </table>

                </form>

                </div>
                <div class="w-box-footer">
                    <div class="f-center">
                        <button type="submit" class="btn btn-beoro-3" form="form-post" id="click-form">Enregistrer</button>
                        <a href="{{route('mouvement.etat',$compte)}}" class="btn btn-default">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>

@endsection

@section('script')
        <!-- datepicker -->
        <script src="{{asset('public/js/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('public/js/lib/select2/select2.min.js')}}"></script>
        <script src="{{asset('public/js/pages/beoro_form_elements.js')}}"></script>
        <!-- sticky notifications -->
        <script src="{{asset('public/js/lib/sticky/sticky.min.js')}}"></script> 
        <script>
             $(document).ready(function() {
                if($('#dpicker').length) { $('#dpicker').datepicker() } });
        </script>
        
        <script type="text/javascript">
                jQuery(document).on('click', '#click-form', function(e) { 
                    e.preventDefault();
                    var data = $('input,select,textarea').serialize();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                    url: "{{ url('/private/update-mouvement') }}",
                    method: 'post',
                    data: data,
                    success: function(data){
                        $.sticky("<b>Succès!</b> <br> <h5>Les Entrées ont été modifiées avec succès </h5>", {autoclose : 10000, position: "top-right", type: "st-success" });
                    }});
                });
        </script>

@endsection