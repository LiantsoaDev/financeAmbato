@extends('layouts.app')
  
@section('style')
<!-- aditional stylesheets -->
        <!-- datatables -->
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/css/datatables_beoro.css')}}">
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/extras/TableTools/media/css/TableTools.css')}}">

        <!-- datepicker -->
        <link rel="stylesheet" href="{{asset('public/js/lib/bootstrap-datepicker/css/datepicker.css')}}">

        <!-- main stylesheet -->
            <link rel="stylesheet" href="{{asset('public/css/beoro.css')}}">
@endsection

@section('breadcrumb')

<div class="container">
    <ul id="breadcrumbs">
        <li><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
        <li><a href="javascript:void(0)">Réalisations</a></li>
        <li><a href="{{URL::current()}}">Journal</a></li>
        <button class="btn btn-inverse pull-right accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1"> Appliquer un filtre</button>
    </ul>
</div>
@endsection


@section('content')

    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div class="w-box w-box-green">
                    
                    @include('journal.accordions')

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
                            @foreach($tab_chaines as $key => $list)
                            <tr>
                                <td>#</td>
                                <td>{{$key}}</td>
                                <td>{{ ucfirst($list->libelle) }}</td>
                                <td>{{ $list->montant }} Ar</td>
                                <td>
                                    <div class="btn-group">
                                            <a href="{{route('mouvement.etat',$key)}}" class="btn btn-default" title="Mouvement du compte"><i class="icon-folder-open"></i> Etats</a>
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
            

            <!-- masked inputs -->
            <script src="{{asset('public/js/lib/jquery-inputmask/jquery.inputmask.min.js')}}"></script>
            <script src="{{asset('public/js/lib/jquery-inputmask/jquery.inputmask.extensions.js')}}"></script>
            <script src="{{asset('public/js/lib/jquery-inputmask/jquery.inputmask.date.extensions.js')}}"></script>
            <!-- datepicker -->
            <script src="{{asset('public/js/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
            <script src="{{asset('public/js/pages/beoro_form_elements.js')}}"></script>
            <!-- multiple inputs -->
            <script>
                $(function() {
                    $( "#dpick1" ).datepicker({ dateFormat: "yy-mm-dd" });
                    $( "#intervallepicker1" ).datepicker({ dateFormat: "yy-mm-dd" });
                    $( "#intervallepicker2" ).datepicker({ dateFormat: "yy-mm-dd" });
                }); 
            </script>

@endsection