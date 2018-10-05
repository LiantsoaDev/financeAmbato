@extends('layouts.app')


@section('content')
    
    <!-- main content -->
    <div class="container">
            <div class="row-fluid">
                <div class="span12">
                        <div class="w-box w-box-green" id="invoice_add_edit">
                                <form id="inv_form">
                                    <div class="w-box-header">
                                        <h4>Add/Edit Invoice</h4>
                                        <span class="pull-right close-box inv-cancel">&times;</span>
                                    </div>
                                    <div class="w-box-content cnt_a">
                                        <div class="row-fluid">
                                            <div class="span8">
                                                <div class="formSep">
                                                    <div class="row-fluid">
                                                        <div class="span6">
                                                            <label for="inv_cl_email">Email</label>
                                                            <input type="text" class="span12" id="inv_cl_email" name="inv_cl_email" />
                                                        </div>
                                                        <div class="span6">	
                                                            <label for="inv_cl_email">Contact Name</label>
                                                            <input type="text" class="span12" id="inv_cl_name" name="inv_cl_name" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="formSep">
                                                    <label for="inv_cl_org_name">Organization Name</label>
                                                    <input type="text" class="span12" id="inv_cl_org_name" name="inv_cl_org_name" />
                                                </div>
                                                <div class="formSep">
                                                    <label for="inv_cl_address">Address</label>
                                                    <input type="text" class="span12" id="inv_cl_address" name="inv_cl_address" />
                                                    <span class="help-block">Street</span>
                                                    <div class="row-fluid">
                                                        <div class="span4">
                                                            <input type="text" class="span12" id="inv_cl_address_city" name="inv_cl_address_city" />
                                                            <span class="help-block">City</span>
                                                        </div>
                                                        <div class="span4">
                                                            <input type="text" class="span12" id="inv_cl_address_state" name="inv_cl_address_state" />
                                                            <span class="help-block">Province/State</span>
                                                        </div>
                                                        <div class="span4">
                                                            <input type="text" class="span12" id="inv_cl_address_zip" name="inv_cl_address_zip" />
                                                            <span class="help-block">Zip Code</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="span4">
                                                <div class="formSep">
                                                    <label for="inv_number">Invoice Number</label>
                                                    <input type="text" class="span12" id="inv_number" name="inv_number" />
                                                </div>
                                                <div class="formSep">
                                                    <label for="inv_date">Date of Issue</label>
                                                    <input type="text" class="span12" id="inv_date" name="inv_date" />
                                                </div>
                                                <div class="formSep">
                                                    <label for="inv_discount">Discount</label>
                                                    <div class="input-prepend">
                                                        <span class="add-on">$</span><input class="span6" id="inv_discount" name="inv_discount" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-fluid sepH_c">
                                            <table class="table invE_table">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Item</th>
                                                        <th>Description</th>
                                                        <th>Unit Cost ($)</th>
                                                        <th>Qty</th>
                                                        <th>Tax (%)</th>
                                                        <th>Total ($)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="inv_row">
                                                        <td class="inv_clone_row"><i class="icon-plus inv_clone_btn"></i></td>
                                                        <td><input type="text" class="span12" name="invE_item[]" /></td>
                                                        <td><input type="text" class="span12" name="invE_description[]" /></td>
                                                        <td><input type="text" class="span12 jQinv_item_unit" name="invE_unit_cost[]" /></td>
                                                        <td><input type="text" class="span12 jQinv_item_qty" name="invE_qty[]" /></td>
                                                        <td><input type="text" class="span12 jQinv_item_tax" name="invE_tax[]" /></td>
                                                        <td><input type="text" readonly class="span12 jQinv_item_total" name="invE_total[]" /></td>
                                                    </tr>
                                                    <tr class="last_row">
                                                        <td colspan="5">&nbsp;</td>
                                                        <td colspan="2">
                                                            <p class="clearfix">Subtotal: <span class="invE_subtotal">$<span>0.00</span></span></p>
                                                            <p>Tax: <span class="invE_tax">$<span>0.00</span></span></p>
                                                            <p>Discount: <span class="invE_discount">$<span>0.00</span></span></p>
                                                            <p><strong>Balance: <span class="invE_balance">$<span>0.00</span></span></strong></p>
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
                                            <button class="btn btn-beoro-3">Save</button>
                                            <button class="btn btn-link inv-cancel">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    <div class="w-box w-box-blue">
                        <div class="w-box-header">
                            <h4>Invoices Preview</h4>
                        </div>
                        <div class="w-box-content cnt_a invoice_preview">
                            <div class="toolbar clearfix">
                                <div class="pull-left">
                                    <div class="toolbar-icons clearfix">
                                        <a href="#" class="ptip_ne" title="New Invoice"><i class="icsw16-document icsw16-white"></i></a>
                                        <a href="#" class="ptip_ne" title="Edit Invoice"><i class="icsw16-pencil icsw16-white"></i></a>
                                        <a href="#" class="ptip_ne" title="Print Invoice"><i class="icsw16-printer icsw16-white"></i></a>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <span class="toolbar_text"><span class="muted">Updated:</span> 24/11/2012 10:24</span>
                                </div>
                            </div>
                            <h1><span>Invoice #23123/2012</span></h1>
                            <div class="row-fluid">
                                <div class="span4">
                                    <p class="sepH_a"><span class="muted">Invoice Number</span>: 23123/2012</p>
                                    <p class="sepH_a"><span class="muted">Invoice Date</span>: 23/11/2012</p>
                                    <p class="sepH_a"><span class="muted">Due Date</span>: 08/12/2012</p>
                                </div>
                                <div class="span4">
                                    <strong class="muted">From</strong>
                                    <address>
                                        <strong>Lorem Ipsum, Inc.</strong><br>
                                        123 Lorem ipsum<br>
                                        San Francisco, CA 12345<br>
                                        <abbr title="Phone">P:</abbr> (123) 456-7890
                                    </address>
                                </div>
                                <div class="span4">
                                    <strong class="muted">To</strong>
                                    <address>
                                        <strong>Lorem Ipsum, Inc.</strong><br>
                                        123 Lorem ipsum<br>
                                        San Francisco, CA 12345<br>
                                    </address>	
                                </div>
                            </div>
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

@endsection