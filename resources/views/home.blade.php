@extends('layouts.app')

@section('style')
<!-- aditional stylesheets -->
        <!-- datatables -->
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/css/datatables_beoro.css')}}">
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/extras/TableTools/media/css/TableTools.css')}}">
@endsection

@section('content')

<!-- main content -->
            <div class="container">
                <div class="row-fluid">
                    <div class="span8">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Analytics</h4>
                                <i class="icsw16-graph icsw16-white pull-right"></i>
                            </div>
                            <div class="w-box-content cnt_a">
                                <div class="slidewrap">
                                    <ul class="slider" id="sliderName">
                                        <li class="slide">  
                                            <span class="hide headName">Pageviews</span>
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div id="ch_pages" class="chart_a"></div>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span10 offset1">
                                                    <div class="row-fluid">
                                                        <div class="span4">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 24h<span class="up">+12%</span></p>
                                                                <p class="anlt_content">2 131</p>
                                                            </div>
                                                        </div>
                                                        <div class="span4">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 7 days<span class="down">-5%</span></p>
                                                                <p class="anlt_content">14 483</p>
                                                            </div>
                                                        </div>
                                                        <div class="span4">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last Month<span class="up">+14%</span></p>
                                                                <p class="anlt_content">64 250</p>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="slide">
                                            <span class="hide headName">Users</span>
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div id="ch_users" class="chart_a"></div>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span10 offset1">
                                                    <div class="row-fluid">
                                                        <div class="span6">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 24h<span class="up">+8%</span></p>
                                                                <p class="anlt_content">184</p>
                                                            </div>
                                                        </div>
                                                        <div class="span6">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 7 days<span class="up">+20%</span></p>
                                                                <p class="anlt_content">1468</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="slide">
                                            <span class="hide headName">Sales</span>
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div id="ch_sales" class="chart_a"></div>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span10 offset1">
                                                    <div class="row-fluid">
                                                        <div class="span6">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 24h<span class="up">+20%</span></p>
                                                                <p class="anlt_content">$1 843</p>
                                                            </div>
                                                        </div>
                                                        <div class="span6">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 7 days<span class="down">-10%</span></p>
                                                                <p class="anlt_content">$11 638</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        
                        <!-- notification status -->
                        @include('notify.index')
                        <!-- end notification status -->
                        
                        <div class="w-box w-box-green hideable">
                            <div class="w-box-header">
                                <h4>Todo list</h4>
                                <div class="pull-right">
                                    <span class="label"><span class="jQ-todoAll-count"></span> tasks</span>
                                </div>
                            </div>
                            <div class="w-box-content todo-list">
                                <div class="add_box input-append">
                                    <input class="span10" type="text" placeholder="Add item" id="addTask" /><button class="btn btn-small" type="button"><i class="icon-plus"></i></button>
                                </div>
                                <h4>Personal (<span class="todo-nb"></span>)</h4>
                                <ul class="connectedSortable">
                                    <li class="high-pr"><input type="checkbox" class="todo-check" /> Buy groceries</li>
                                    <li class="low-pr completed"><input type="checkbox" checked class="todo-check" /> Do laundry</li>
                                    <li class="low-pr"><input type="checkbox" class="todo-check" /> Meeting with Macy</li>
                                    <li class="high-pr"><input type="checkbox" class="todo-check" /> Pick up kids</li>
                                </ul>
                                <h4>Work (<span class="todo-nb"></span>)</h4>
                                <ul class="connectedSortable">
                                    <li class="medium-pr"><input type="checkbox" class="todo-check" /> Send press releases</li>
                                    <li class="low-pr"><input type="checkbox" class="todo-check" /> Buy books</li>
                                    <li class="high-pr completed"><input type="checkbox" checked class="todo-check" /> Update main site</li>
                                </ul>
                            </div>
                        </div>
                    </div>  
                </div>
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
                                                    <th>Réalisations</th>
                                                    <th>Action</th>
                                                    <th>B{{\Carbon\Carbon::now()->format('Y')}}</th>
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
                                                    <td>{{ (!empty($realisation[$cpts->compte])? number_format($realisation[$cpts->compte]['realisation'], 2, ',', ' ').' Ar' : '-') }}</td>
                                                    <td>
                                                            <div class="btn-group">
                                                            <a href="{{route('budget.show','gTBtYrEP8X'.$cpts->id)}}" class="btn btn-mini" title="Edit"><i class="icon-pencil"></i></a>
                                                                <a href="#" class="btn btn-mini" title="View"><i class="icon-eye-open"></i></a>
                                                                <a href="#" class="btn btn-mini" title="Delete"><i class="icon-trash"></i></a>
                                                            </div>
                                                    </td>
                                                    <td>{{ (!empty($realisation[$cpts->compte])? number_format($realisation[$cpts->compte]['budget'], 2, ',', ' ').' Ar' : '-') }}</td>
                                                    <td>{{ (!empty($realisation[$cpts->compte])? number_format($realisation[$cpts->compte]['precedente'], 2, ',', ' ').' Ar' : '-') }}</td>
                                                    <td>93 000,00 Ar</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="w-box hideable">
                            <div class="w-box-header">
                                <h4>Latest comments</h4>
                                <i class="icsw16-speech-bubble icsw16-white pull-right"></i>
                            </div>
                            <div class="w-box-content">
                                <table class="table table-striped table-list">
                                    <tbody>
                                        <tr>
                                            <td class="list-image"><a href="javascript:void(0)" title="Comment by Summer Throssell" class="ptip_ne"><i class="splashy-comments"></i></a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec cursus dictum rhoncus...</a>
                                                <span class="minor">on October 24 @ 7:23</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="list-image"><a href="javascript:void(0)" title="Comment by Summer Throssell" class="ptip_ne"><i class="splashy-comments"></i></a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec cursus dictum rhoncus...</a>
                                                <span class="minor">on October 24 @ 7:23</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="list-image"><a href="javascript:void(0)" title="Comment by Summer Throssell" class="ptip_ne"><i class="splashy-comments"></i></a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec cursus dictum rhoncus. Duis quis pretium massa. Integer laoreet erat id neque interdum...</a>
                                                <span class="minor">on October 24 @ 7:23</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="list-image"><a href="javascript:void(0)" title="Comment by Summer Throssell" class="ptip_ne"><i class="splashy-comments"></i></a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec cursus dictum rhoncus...</a>
                                                <span class="minor">on October 24 @ 7:23</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="list-image"><a href="javascript:void(0)" title="Comment by Summer Throssell" class="ptip_ne"><i class="splashy-comments"></i></a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="list-text">Lorem ipsum dolor sit amet...</a>
                                                <span class="minor">on October 24 @ 7:23</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                         </div>
                    </div>
                    <div class="span8">
                        <div class="w-box w-box-blue">
                            <div class="w-box-header">
                            </div>
                            <div class="w-box-content">
                                <div id="calendar_widget"></div>
                            </div>
                         </div>
                    </div>  
                </div>
            </div>
            <div class="footer_space"></div>
        </div> 

@endsection

@section('script')
<!-- colorbox -->
            <script src="{{asset('public/js/lib/colorbox/jquery.colorbox.min.js')}}"></script>
        <!-- fullcalendar -->
            <script src="{{asset('public/js/lib/fullcalendar/fullcalendar.min.js')}}"></script>
        <!-- flot charts -->
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.js')}}"></script>
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.resize.js')}}"></script>
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.pie.js')}}"></script>
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.orderBars.js')}}"></script>
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.tooltip.js')}}"></script>
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.time.js')}}"></script>
        <!-- responsive carousel -->
            <script src="{{asset('public/js/lib/carousel/plugin.min.js')}}"></script>
        <!-- responsive image grid -->
            <script src="{{asset('public/js/lib/wookmark/jquery.imagesloaded.min.js')}}"></script>
            <script src="{{asset('public/js/lib/wookmark/jquery.wookmark.min.js')}}"></script>

            <script src="{{asset('public/js/pages/beoro_dashboard.js')}}"></script>
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
