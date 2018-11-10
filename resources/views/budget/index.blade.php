@extends('layouts.app')


@section('breadcrumb')

<div class="container">
    <ul id="breadcrumbs">
        <li><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
        <li><a href="javascript:void(0)">Budgetisations</a></li>
        <li><a href="{{URL::current()}}">Listes des budgets</a></li>
    </ul>
</div>

@endsection


@section('style')
<!-- aditional stylesheets -->
        <!-- datatables -->
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/css/datatables_beoro.css')}}">
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/extras/TableTools/media/css/TableTools.css')}}">


        <!-- main stylesheet -->
            <link rel="stylesheet" href="{{asset('public/css/beoro.css')}}">
@endsection




@section('content')
<div class="container">
   	<div class="row-fluid">
        <div class="span12">
<div class="w-box w-box-orange">
                            <div class="w-box-header">
                                <h4>Column Reorder & toggle visibility</h4>
                            </div>
                            <div class="w-box-content">
                                <table id="dt_colVis_Reorder" class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th style=" width: 100px">Numero de compte</th>
                                        <th style=" width: 200px">Libelle</th>
                                        <th>B/C</th>
                                        <th>Réalisations</th>
                                        <th>Action</th>
                                        <th>B{{\Carbon\Carbon::now()->subYears(1)->format('Y')}}</th>
                                        <th>Rapport en % </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($comptes as $cpts)
                                    <tr>
                                    	<td>{{$cpts->id}}</td>
                                    	<td>{{$cpts->compte}}</td>
                                    	<td>{{$cpts->libelle}}</td>
                                    	<td>C</td>
                                    	<td>93 000,00 Ar</td>
                                    	<td>
                                                <div class="btn-group">
                                                <a href="{{route('budget.show','gTBtYrEP8X'.$cpts->id)}}" class="btn btn-mini" title="Edit"><i class="icon-pencil"></i></a>
                                                    <a href="#" class="btn btn-mini" title="View"><i class="icon-eye-open"></i></a>
                                                    <a href="#" class="btn btn-mini" title="Delete"><i class="icon-trash"></i></a>
                                                </div>
                                        </td>
                                    	<td>93 000,00 Ar</td>
                                    	<td>93 000,00 Ar</td>
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

@endsection