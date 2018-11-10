@extends('layouts.app')
  
@section('style')
<!-- aditional stylesheets -->
        <!-- datatables -->
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/css/datatables_beoro.css')}}">
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/extras/TableTools/media/css/TableTools.css')}}">


        <!-- main stylesheet -->
            <link rel="stylesheet" href="{{asset('public/css/beoro.css')}}">
@endsection

@section('breadcrumb')

<div class="container">
    <ul id="breadcrumbs">
        <li><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
        <li><a href="javascript:void(0)">Réalisations</a></li>
        <li><a href="{{URL::current()}}">Journal</a></li>
    </ul>
</div>

@endsection


@section('content')

    <div class="container">
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
                                <th>Libelle de compte</th>
                                <th>Montant ( Total Ar )</th>
                                <th>Etats</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listes as $key => $list)
                            <tr>
                                <td>{{$key}}</td><td>{{$list->compte->compte}}</td><td>{{ucfirst($list->compte->libelle)}}</td><td>{{ number_format($list->total, 2, ',', ' ') }} Ar</td>
                                <td>
                                    <div class="btn-group">
                                            <a href="{{route('mouvement.etat',$list->compte->compte)}}" class="btn btn-default" title="Mouvement du compte"><i class="icon-folder-open"></i> Etats</a>
                                    </div>
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

@endsection