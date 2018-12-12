@extends('layouts.app')

@section('style')

    <!-- splashy icon pack -->
    <link rel="stylesheet" href="{{asset('public/img/splashy/splashy.css')}}">
    <!-- flag icons -->
        <link rel="stylesheet" href="{{asset('public/img/flags/flags.css')}}">
    
    <!-- aditional stylesheets -->
        <!-- x-editable -->
        <link rel="stylesheet" href="{{asset('public/js/lib/x-editable/bootstrap-editable/css/bootstrap-editable.css')}}">
        <link rel="stylesheet" href="{{asset('public/js/lib/x-editable/inputs-ext/address/address.css')}}">

@endsection

@section('breadcrumb')
    
<div class="container">
    <ul id="breadcrumbs">
        <li><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
        <li><a href="javascript:void(0)">Réalisations</a></li>
        <li><a href="javascript:history.back()">Journal</a></li>
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
                    <table class="table table-bordered table-striped" id="user">
                        <tbody> 
                            <tr>         
                                <td width="15%">Date</td>
                                <td width="50%"><a data-original-title="Selectionner une date" data-pk="1" data-template="D / MMM / YYYY" data-viewformat="DD/MM/YYYY" data-format="YYYY-MM-DD" data-value="1984-05-15" data-type="combodate" id="dob" href="#"></a></td>
                                <td width="35%"><span class="muted">Date field</span></td>
                            </tr>
                            <tr>         
                                <td>Libelle de mouvement</td>
                                <td><a data-original-title="Enter comments" data-placeholder="Your comments here..." data-pk="1" data-type="textarea" id="comments" href="#">awesome<br>user!</a></td>
                                <td><span class="muted">Textarea. Submit by ctrl+enter</span></td>
                            </tr>  
                            <tr>         
                                <td>Caisse/Banque</td>
                                <td><a data-original-title="Selectionner type" data-value="" data-pk="1" data-type="select" id="sex" href="#"></a></td>
                                <td><span class="muted">Select, loaded from js array. Custom display</span></td>
                            </tr>
                            <tr>         
                                <td>Numéro de pièce</td>
                                <td><a data-original-title="Select group" data-source="/groups" data-value="5" data-pk="1" data-type="select" id="group" href="#">Admin</a></td>
                                <td><span class="muted">Select, loaded from server. <strong>No buttons</strong> mode</span></td>
                            </tr> 
                            <tr>         
                                <td>Numéro de chèque</td>
                                <td><a data-original-title="Select status" data-source="/status" data-value="0" data-pk="1" data-type="select" id="status" href="#">Active</a></td>
                                <td><span class="muted">Error when loading list items</span></td>
                            </tr>       
                            <tr>         
                                <td>Montant</td>
                                <td><a data-original-title="When you want vacation to start?" data-placement="right" data-pk="1" data-viewformat="dd.mm.yyyy" data-type="date" id="vacation" href="#">25.02.2013</a></td>
                                <td><span class="muted">Datepicker</span></td>
                            </tr>
                            <tr>         
                                <td>Date</td>
                                <td><a data-original-title="Select Date of birth" data-pk="1" data-template="D / MMM / YYYY" data-viewformat="DD/MM/YYYY" data-format="YYYY-MM-DD" data-value="1984-05-15" data-type="combodate" id="dob" href="#"></a></td>
                                <td><span class="muted">Date field</span></td>
                            </tr> 
                            <tr>         
                                <td>Setup event</td>
                                <td><a data-original-title="Setup event date and time" data-pk="1" data-viewformat="MMM D, YYYY, HH:mm" data-format="YYYY-MM-DD HH:mm" data-template="D MMM YYYY  HH:mm" data-type="combodate" id="event" href="#"></a></td>
                                <td><span class="muted">Datetime field</span></td>
                            </tr>                     
                            <tr>         
                                <td>Comments</td>
                                <td><a data-original-title="Enter comments" data-placeholder="Your comments here..." data-pk="1" data-type="textarea" id="comments" href="#">awesome<br>user!</a></td>
                                <td><span class="muted">Textarea. Submit by ctrl+enter</span></td>
                            </tr>                                     
                            <tr>         
                                <td>Fresh fruits</td>
                                <td><a data-original-title="Select fruits" data-value="2,3" data-type="checklist" id="fruits" href="#"></a></td>
                                <td><span class="muted">Checklist</span></td>
                            </tr>  
                            
                            <tr>         
                                <td>Address</td>
                                <td><a data-original-title="Please, fill address" data-pk="1" data-type="address" id="address" href="#"></a></td>
                                <td><span class="muted">Your custom input, several fields</span></td>
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
    
    <!-- Mockjax -->
    <script src="{{asset('public/js/jquery.mockjax.js')}}"></script>
    <!-- x-editable -->
        <script src="{{asset('public/js/lib/x-editable/bootstrap-editable/js/bootstrap-editable.min.js')}}"></script>
        <script src="{{asset('public/js/lib/x-editable/inputs-ext/address/address.js')}}"></script>

        <script src="{{asset('public/js/pages/beoro_editable_elements.js')}}"></script>

@endsection