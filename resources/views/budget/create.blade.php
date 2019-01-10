@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumb')
<div class="container">
    <ul id="breadcrumbs">
        <li><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
        <li><a href="javascript:void(0)">Budgetisations</a></li>
        <li><a href="{{URL::current()}}">Création nouveau budget</a></li>
    </ul>
</div>
@endsection

@section('style')
<!-- aditional stylesheets -->
        <!-- datatables -->
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/css/datatables_beoro.css')}}">
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/extras/TableTools/media/css/TableTools.css')}}">
        <!-- aditional stylesheets -->
        <!-- jQuery UI theme -->
            <link rel="stylesheet" href="{{asset('public/js/lib/jquery-ui/css/Aristo/Aristo.css')}}">
        <!-- datepicker -->
            <link rel="stylesheet" href="{{asset('public/js/lib/bootstrap-datepicker/css/datepicker.css')}}">
        <!-- main stylesheet -->
            <link rel="stylesheet" href="{{asset('public/css/beoro.css')}}">
@endsection

@section('content')
<!-- main content -->
            <div class="container">

                <div class="row-fluid">
                    <div class="span12">
				<div class="w-box w-box-green">
                            <div class="w-box-header">
                            <h4>Conception du Budget pour l'année {{empty($annee)? null: $annee}}</h4>
                            </div>
                            <div class="w-box-content">
                                <table id="dt_basic" class="dataTables_full table table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Numéro de compte</th>
                                        <th style="width: 450px">Libelle</th>
                                        <th>Type</th>
                                        <th>Montant en Ar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form id="form-validate" action="{{route('insert.budget')}}" method="POST">	
                                <input id="year" type="hidden" name="year" value="{{$annee}}">
                                @foreach($comptes as $key => $cpts)
                                    <tr>
                                    	<td>{{$cpts->id}}</td>
                                    	<td>{{$cpts->compte}}</td>
                                    	<td>
                                    		<div class="span12">	
                                                {{$cpts->libelle}}
                                            </div>
                                         </td>
                                    	<td>
                                    		<div class="span12">	
                                                <select class="span12">
                                                	<option></option>
	                                                <option value="charge">Charge/Dépense</option>
	                                                <option value="produit">Produit/Recette</option>
	                                            </select>
                                            </div>
                                         </td>
                                    	<td>
                                    		<div class="input-append">
                                            <input type="numeric" id="mask_numeric{{$key}}" class="span10" name="montant{{$cpts->id}}" placeholder="Ar ___.___.___.__" value="{{ (!empty($budget[$cpts->id])? $budget[$cpts->id] :null) }}"><span class="add-on">.00 MGA</span>
                                        </div>
                                         </td>
                                    </tr>
								@endforeach
                                </tbody>
                                </table>
                                <div class="w-box-footer">
                                    <div class="f-center">
                                        <button type="submit" class="btn btn-beoro-3" id="validate" role="form-validate">Enregistrer</button>
                                        <a href="{{route('budget.selection')}}" type="reset" class="btn btn-default">Retour</a>
                                    </div>
                                </div>
                                </form>
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
            <!-- masked inputs -->
            <script src="{{asset('public/js/lib/jquery-inputmask/jquery.inputmask.min.js')}}"></script>
            <!-- WYSIWG Editor -->
            <script src="{{asset('public/js/lib/ckeditor/ckeditor.js')}}"></script>
            <script src="{{asset('public/js/pages/beoro_form_elements.js')}}"></script>
        <!-- datepicker -->
        <script src="{{asset('public/js/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

        <!-- aditional stylesheets -->
        <!-- sticky notifications -->
        <link rel="stylesheet" href="{{asset('public/js/lib/sticky/sticky.css')}}"> 
        <!-- sticky notifications -->
        <script src="{{asset('public/js/lib/sticky/sticky.min.js')}}"></script>   
        <!-- additionnal javascript -->
            <script type="text/javascript">
            	$(document).ready(function() {
    				var table = $('#dt_basic').DataTable();

				    $('#validate').click( function(e) {
				    	e.preventDefault();
                        var data = table.$('input, select').serialize();
				        // Submit form data via Ajax
					      $.ajax({
					        url: '{{route('insert.budget')}}',
					        headers: {
					                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    'id' : {{$annee}}
					       },
					        data: data ,
					        type: 'POST',
					        success: function(data){
					            $.sticky("<b>Succès!</b> <br> <h5>Les Entrées ont été ajoutés avec succès </h5>", {autoclose : 10000, position: "top-right", type: "st-success" });
					        }
					    });
				    });
				} );
            </script>
@endsection