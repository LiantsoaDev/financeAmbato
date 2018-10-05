@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
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

                @if( URL::current() == route('budget.selection') )
                    <!-- inc. import. manual.  -->
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
                                                <p class="heading_a">Choix d'une année budgetaire</p>
                                                <form method="POST" action="{{$action}}">
                                                {{csrf_field()}}
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="formSep">
                                                            <label for="s_mailer">Choisissez une année budgetaire </label>
                                                            <select id="s_mailer" name="year" class="span6">
                                                                @foreach($years as $y)
                                                                    <option value="{{$y}}">{{$y}}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="help-block">Choisissez une Année antérieure</span>
                                                            
                                                            @if ($errors->any())
                                                                @foreach ($errors->all() as $error)
                                                                <div class="alert alert-error">
                                                                        <a data-dismiss="alert" class="close">×</a>
                                                                        <strong>Avertissement ! </strong> {{$error}}.
                                                                    </div>
                                                                @endforeach
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                    <hr>
                                                    <button type="submit" class="btn btn-success">Valider</button>
                                                    <a href="javascript:back.history()" type="button" class="btn btn-danger">Retour</a>
                                                    </div>
                                                </div> 
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end import. manual -->
                @endif

                <div class="row-fluid">
                    <div class="span12">
                            <div class="w-box w-box-blue">
                                    <div class="w-box-header">
                                        <h4>Registre des budgets</h4>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-small btn-inverse inv_new">Add new invoice</a>
                                        </div>
                                    </div>
                                    <div class="w-box-content">
                                        <table class="table table-striped" data-provides="rowlink">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Libelle</th>
                                                    <th>Date de création</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($annee_budgetaire as $budget)
                                                <tr data-invoice-id="10">
                                                <td>{{$budget->id}}/{{$budget->annee}}</td>
                                                <td><a href="{{route('select.budget',$budget->annee)}}" class="inv_preview">Budget de l'année {{$budget->annee}}</a></td>
                                                <td>{{date('d/m/Y H:m:s',strtotime($budget->created_at))}}</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a ptip_s" title="Aperçu"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a ptip_s" title="Editer un budget"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b ptip_s" title="Telecharger en PDF"><i class="splashy-document_letter_download"></i></a>
                                                    <a class="inv_remove ptip_s" title="suppression"><i class="splashy-document_letter_remove" data-toggle="modal" data-target="#suppression{{$budget->id}}"></i></a>
                                                    @include('notify.modal.delete')
                                                </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
            @include('notify.index')
@endsection