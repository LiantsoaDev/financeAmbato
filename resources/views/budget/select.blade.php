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

                <div class="row-fluid">
                    <div class="span12">
                            <div class="w-box w-box-blue">
                                    <div class="w-box-header">
                                        <h4>Invoices</h4>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-small btn-inverse inv_new">Add new invoice</a>
                                        </div>
                                    </div>
                                    <div class="w-box-content">
                                        <table class="table table-striped" data-provides="rowlink">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Client</th>
                                                    <th>Date of Issue</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr data-invoice-id="10">
                                                    <td>1/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>10/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="11">
                                                    <td>2/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>11/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="12">
                                                    <td>3/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>12/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="13">
                                                    <td>4/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>13/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="14">
                                                    <td>5/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>14/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="15">
                                                    <td>6/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>15/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="16">
                                                    <td>7/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>16/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="17">
                                                    <td>8/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>17/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="18">
                                                    <td>9/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>18/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="19">
                                                    <td>10/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>19/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="20">
                                                    <td>11/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>20/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="21">
                                                    <td>12/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>21/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="22">
                                                    <td>13/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>22/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
                                                <tr data-invoice-id="23">
                                                    <td>14/2012</td>
                                                    <td><a href="#" class="inv_preview">Lorem ipsum, inc.</a></td>
                                                    <td>23/11/2012</td>
                                                    <td class="nolink">
                                                        <a href="#" class="inv_preview sepV_a"><i class="splashy-zoom_in"></i></a>
                                                        <a href="#" class="inv_edit sepV_a"><i class="splashy-document_letter_edit"></i></a>
                                                        <a href="#" class="inv_download sepV_b"><i class="splashy-document_letter_download"></i></a>
                                                        <a href="#" class="inv_remove"><i class="splashy-document_letter_remove"></i></a>
                                                    </td>
                                                </tr>
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
@endsection