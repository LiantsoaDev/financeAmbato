@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('style')
<!-- aditional stylesheets -->
        <!-- datatables -->
            <link rel="stylesheet" href="{{asset('js/lib/datatables/css/datatables_beoro.css')}}">
            <link rel="stylesheet" href="{{asset('js/lib/datatables/extras/TableTools/media/css/TableTools.css')}}">


        <!-- main stylesheet -->
            <link rel="stylesheet" href="{{asset('css/beoro.css')}}">
@endsection

@section('content')
<!-- main content -->
            <div class="container">

                <div class="row-fluid">
                    <div class="span12">
                        <div class="w-box w-box-green">
                            <div class="w-box-header">
                                <h4>Site</h4>
                                <i class="icsw16-settings icsw16-white pull-right"></i>
                            </div>
                            <div class="w-box-content cnt_a">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <p class="heading_a">Mail Settings</p>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="formSep">
                                                    <label for="s_mailer">Mailer</label>
                                                    <select id="s_mailer" name="s_mailer" class="span6">
                                                        <option value="mail">PHP Mail</option>
                                                        <option value="sendmail">Sendmail</option>
                                                        <option value="smtp">SMTP</option>
                                                    </select>
                                                </div>
                                                <div class="formSep">
                                                    <label for="s_mail_from">From Email</label>
                                                    <input type="text" class="span8" id="s_mail_from" name="s_mail_from" value="beoro@example.com" />
                                                </div>
                                                <div class="formSep">
                                                    <label for="s_mail_name">From Name</label>
                                                    <input type="text" class="span8" id="s_mail_name" name="s_mail_name" value="Beoro Admin" />
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <div class="formSep">
                                                    <label for="s_smtp_user">SMTP Username</label>
                                                    <input type="text" class="span8" id="s_smtp_user" name="s_smtp_user" />
                                                </div>
                                                <div class="formSep">
                                                    <label for="s_smtp_password">SMTP Password</label>
                                                    <input type="text" class="span8" id="s_smtp_password" name="s_smtp_password" />
                                                </div>
                                                <div class="formSep">
                                                    <label for="s_smtp_host">SMTP Host</label>
                                                    <input type="text" class="span8" id="s_smtp_host" name="s_smtp_host" value="localhost" />
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">
				<div class="w-box w-box-green">
                            <div class="w-box-header">
                                <h4>Basic Datatables</h4>
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
                                <form action="{{route('update.budget')}}" method="POST">	
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
		                                        <input type="numeric" id="mask_numeric" class="span10" placeholder="Ar ___,__,__" name="montant{{$key+1}}" ><span class="add-on">.00 MGA</span>
		                                    </div>
                                         </td>
                                    </tr>
								@endforeach
                                </tbody>
                                </table>
                                <div class="w-box-footer">
                                    <div class="f-center">
                                        <button type="submit" class="btn btn-beoro-3">Enregistrer</button>
                                        <button type="reset" class="btn btn-link inv-cancel">Annuler</button>
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
            <script src="{{asset('js/lib/datatables/js/jquery.dataTables.min.js')}}"></script>
        <!-- datatables column reorder -->
            <script src="{{asset('js/lib/datatables/extras/ColReorder/media/js/ColReorder.min.js')}}"></script>
        <!-- datatables column toggle visibility -->
            <script src="{{asset('js/lib/datatables/extras/ColVis/media/js/ColVis.min.js')}}"></script>
        <!-- datatable table tools -->
            <script src="{{asset('js/lib/datatables/extras/TableTools/media/js/TableTools.min.js')}}"></script>
            <script src="{{asset('js/lib/datatables/extras/TableTools/media/js/ZeroClipboard.js')}}"></script>
        <!-- datatables bootstrap integration -->
            <script src="{{asset('js/lib/datatables/js/jquery.dataTables.bootstrap.min.js')}}"></script>

            <script src="{{asset('js/pages/beoro_datatables.js')}}"></script>
            <!-- masked inputs -->
            <script src="{{asset('js/lib/jquery-inputmask/jquery.inputmask.min.js')}}"></script>
            <!-- WYSIWG Editor -->
            <script src="{{asset('js/lib/ckeditor/ckeditor.js')}}"></script>
            <script src="{{asset('js/pages/beoro_form_elements.js')}}"></script>
            <script type="text/javascript">
            	$(document).ready(function() {
    				var table = $('#dt_basic').DataTable();

				    $('button').click( function(e) {
				    	e.preventDefault();
				        var data = table.$('input, select').serialize();
				        // Submit form data via Ajax
					      $.ajax({
					        url: '{{route('update.budget')}}',
					        headers: {
					                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					       },
					        data: data,
					        type: 'POST',
					        success: function(data){
					            alert("Les modifications ont été enregistrés avec succès");
					        }
					    });
				    });
				} );
            </script>
@endsection