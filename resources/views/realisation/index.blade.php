@extends('layouts.app')

@section('style')
    <!-- enchanced select box, tag handler -->
    <link rel="stylesheet" href="{{asset('public/js/lib/select2/select2.css')}}">
    <!-- datepicker -->
    <link rel="stylesheet" href="{{asset('public/js/lib/bootstrap-datepicker/css/datepicker.css')}}">
@endsection
    

@section('content')
    
    <!-- main content -->
    <div class="container">
            <div class="row-fluid">
                <div class="span12">
                        <div class="w-box w-box-green" id="invoice_add_edit">
                                <form id="inv_form">
                                    <div class="w-box-header">
                                        <h4>Mouvements / Réalisations </h4>
                                        <span class="pull-right close-box inv-cancel">&times;</span>
                                    </div>
                                    <div class="w-box-content cnt_a">
                                            <div class="toolbar clearfix">
                                                    <div class="pull-left">
                                                        <div class="toolbar-icons clearfix">
                                                            <a href="#" class="ptip_ne" title="New Invoice"><i class="icsw16-document icsw16-white"></i></a>
                                                            <a href="#" class="ptip_ne" title="Edit Invoice"><i class="icsw16-pencil icsw16-white"></i></a>
                                                            <a href="#" class="ptip_ne" title="Print Invoice"><i class="icsw16-printer icsw16-white"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="pull-right">
                                                        <span class="toolbar_text"><span class="muted">Dernière mise à jour:</span> {{ \Carbon\Carbon::now()->format('d/m/y') }} </span>
                                                    </div>
                                                </div> 
                                        <div class="row-fluid">
                                                <div class="span6">
                                                        <select id="s2_single" class="span12" onchange="loadDataCount(this.value)">
                                                            <option value=""></option>
                                                        <optgroup label="Listes Numero et libelle de compte">
                                                            @foreach ($allcount as $count)
                                                                <option value="{{$count->compte}}">{{$count->compte}} - {{$count->libelle}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                        </select><br/>
                                                    </div>
                                        </div>
                                        <div class="toolbar clearfix" id="txtHint">
                                                <div class="formSep">
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <p class="sepH_a"><span class="muted">Numero de compte : </span><strong>Aucun</strong></p>
                                                    </div>
                                                    <div class="span4">
                                                            <p class="sepH_a"><span class="muted">Libelle de compte : </span><strong>Aucun</strong></p>
                                                    </div>
                                                    <div class="span4">
                                                    <p class="sepH_a"><span class="muted">Date de création</span><strong>: {{ \Carbon\Carbon::now()->format('d/m/Y')}}</strong></p>
                                                        <p class="sepH_a"><span class="muted">Dernière modification : </span><strong> {{ \Carbon\Carbon::now()->format('d/m/Y')}} </strong></p>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>    
                                        <div class="row-fluid sepH_c">
                                            <table class="table invE_table">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Date</th>
                                                        <th>Caisse/Banque</th>
                                                        <th>Description</th>
                                                        <th>Montant (MGA)</th>
                                                        <th>N° Pièce</th>
                                                        <th>N° Chèque</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="inv_row">
                                                    <td class="inv_clone_row"><i class="icon-plus inv_clone_btn"></i></td>
                                                    <td><input type="text" class="span12 dpicker" name="invE_item[]" data-date-format="dd/mm/yyyy"/></td>
                                                        <td>
                                                            <select class="span12" name="type[]">
                                                                    <option></option>
                                                                    <option value="C">Caisse</option>
                                                                    <option value="B">Banque</option>
                                                                </select>
                                                        </td>
                                                        <td><input type="text" class="span12" name="invE_description[]" /></td>
                                                        <td><input type="text" class="span12 jQinv_item_unit" name="invE_unit_cost[]" /></td>
                                                        <td><input type="text" class="span12" name="piece[]" /></td>
                                                        <td><input type="text" class="span12" name="cheque[]" /></td>
                                                        <td><input type="hidden" class="span12 jQinv_item_qty" name="invE_qty[]" value="1" /></td>
                                                    </tr>
                                                    <tr class="last_row">
                                                        <td colspan="5">&nbsp;</td>
                                                        <td colspan="2">
                                                            <p class="clearfix"><strong>Sous total: <span class="invE_subtotal">MGA <span>0.00</span></span></strong></p>
                                                            <p>Remise: <span class="invE_tax">MGA <span>0.00</span></span></p>
                                                            <p>Balance: <span class="invE_balance">MGA <span>0.00</span></span></p>
                                                            <input type="hidden" id="inV_subtotal" name="inV_subtotal" value="0">
                                                            <input type="hidden" id="inV_tax" name="inV_tax" value="0">
                                                            <input type="hidden" id="inV_balance" name="inV_balance" value="0">
                                                        </td>
                                                    </tr>
                                                </tbody>	
                                            </table>
                                        </div>
                                    </div>
                                    <div class="w-box-footer">
                                        <div class="f-center">
                                            <button class="btn btn-beoro-3">Enregistrer</button>
                                            <button class="btn btn-default">Retour</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    <div class="w-box w-box-blue">
                        <div class="w-box-header">
                            <h4>Invoices Preview</h4>
                        </div>
                        <div class="w-box-content cnt_a invoice_preview">
                            <div class="row-fluid">
                                <div class="span12">
                                    <table class="table invE_table">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Unit Cost</th>
                                                <th>Qty</th>
                                                <th>Tax</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Lorem ipsum <small>(Lorem ipsum dolor...)</small></td>
                                                <td>$50.00</td>
                                                <td>2.00</td>
                                                <td>5%</td>
                                                <td>$95.00</td>
                                            </tr>
                                            <tr>
                                                <td>Lorem ipsum <small>(Lorem ipsum dolor...)</small></td>
                                                <td>$70.00</td>
                                                <td>3.00</td>
                                                <td>9%</td>
                                                <td>$191.10</td>
                                            </tr>
                                            <tr class="last_row">
                                                <td colspan="3">&nbsp;</td>
                                                <td colspan="2">
                                                    <p class="sepH_a"><span class="muted sepV_b">Subtotal</span>$310.00</p>
                                                    <p class="sepH_a"><span class="muted sepV_b">Tax (10%)</span>$23.90</p>
                                                    <p class="sepH_a"><span class="muted sepV_b">Discount</span>-</p>
                                                    <p><strong><span class="sepV_b">Total</span>$286.10</strong></p>
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
        <div class="footer_space"></div>
        <!-- end content -->

@endsection

@section('script')
    
        <!-- table rowlink -->
        <script src="{{asset('public/js/bootstrap-rowlink.min.js')}}"></script>
        <script src="{{asset('public/js/pages/beoro_invoices.js')}}"></script>
        <!-- masked inputs -->
        <script src="{{asset('public/js/lib/jquery-inputmask/jquery.inputmask.min.js')}}"></script>
        <script src="{{asset('public/js/lib/jquery-inputmask/jquery.inputmask.extensions.js')}}"></script>
        <script src="{{asset('public/js/lib/jquery-inputmask/jquery.inputmask.date.extensions.js')}}"></script>
        <!-- enchanced select box, tag handler -->
        <script src="{{asset('public/js/lib/select2/select2.min.js')}}"></script>
        <!-- datepicker -->
        <script src="{{asset('public/js/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('public/js/pages/beoro_form_elements.js')}}"></script>
        <!-- multiple inputs -->
        <script>
            $(function() {
                $( ".dpicker" ).datepicker({ dateFormat: "yy-mm-dd" });
            }); 
        </script>
        
        

        <!-- asynchronous JavaScript and XML Data Loading -->
        <script>
                function loadDataCount(str) {
                  if (str=="") {
                    document.getElementById("txtHint").innerHTML="";
                    return;
                  } 
                  if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                  } else { // code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                      document.getElementById("txtHint").innerHTML=this.responseText;
                    }
                  }
                  xmlhttp.open("GET","{{ url('private/details-comptes/').'/' }}"+str,true);
                  xmlhttp.send();
                }
        </script>

@endsection