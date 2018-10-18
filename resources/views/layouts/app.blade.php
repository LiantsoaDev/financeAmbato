<!DOCTYPE HTML>
<html lang="en-US">
    
<head>

        <meta charset="UTF-8">
        <title>{{config('app.name','Finance Ambatonankanga')}}</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <!-- X-CSRF-TOKEN -->
        @yield('meta')
        <link rel="icon" type="image/ico" href="{{asset('public/favicon.ico')}}">
        
    <!-- common stylesheets-->
        <!-- bootstrap framework css -->
            <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap-responsive.min.css')}}">
        <!-- iconSweet2 icon pack (16x16) -->
            <link rel="stylesheet" href="{{asset('public/img/icsw2_16/icsw2_16.css')}}">
        <!-- splashy icon pack -->
            <link rel="stylesheet" href="{{asset('public/img/splashy/splashy.css')}}">
        <!-- flag icons -->
            <link rel="stylesheet" href="{{asset('public/img/flags/flags.css')}}">
        <!-- power tooltips -->
            <link rel="stylesheet" href="{{asset('public/js/lib/powertip/jquery.powertip.css')}}">
        <!-- google web fonts -->
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Abel">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300">

    <!-- aditional stylesheets -->
        <!-- colorbox -->
            <link rel="stylesheet" href="{{asset('public/js/lib/colorbox/colorbox.css')}}">
        <!--fullcalendar -->
            <link rel="stylesheet" href="{{asset('public/js/lib/fullcalendar/fullcalendar_beoro.css')}}">


        <!-- main stylesheet -->
            <link rel="stylesheet" href="{{asset('public/css/beoro.css')}}">

        <!-- Externl Style Css -->
            @yield('style')

        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css"><![endif]-->
        <!--[if IE 9]><link rel="stylesheet" href="css/ie9.css"><![endif]-->
            
        <!--[if lt IE 9]>
            <script src="js/ie/html5shiv.min.js"></script>
            <script src="js/ie/respond.min.js"></script>
            <script src="js/lib/flot-charts/excanvas.min.js"></script>
        <![endif]-->

    </head>
    <body class="bg_d" onload="notified()">
    <!-- main wrapper (without footer) -->    
        <div class="main-wrapper">
        <!-- top bar -->
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <div class="pull-right top-search">
                            <form action="#" >
                                <input type="text" name="q" id="q-main">
                                <button class="btn"><i class="icon-search"></i></button>
                            </form>
                        </div>
                        <div id="fade-menu" class="pull-left">
                            <ul class="clearfix" id="mobile-nav">
                                <li>
                                    <a href="javascript:void(0)">Budgetisations</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('budget.list')}}">Listes</a>
                                        </li>
                                        <li>
                                            <a href="{{route('create.budget')}}">Nouveau budget</a>
                                        </li>
                                        <li>
                                            <a href="#">Editer un budget</a>
                                        </li>
                                        <li>
                                            <a href="{{route('budget.register')}}">Registres</a>
                                        </li>
                                        <li>
                                            <a href="index463f.html?page=form_validation">Paramêtres</a>
                                        </li>
                                        <li>
                                            <a href="#">Importer</a>
                                            <ul>
                                                <li><a href="{{route('budget.selection')}}">manuellement</a></li>
                                                <li>
                                                    <a href="#">depuis un fichier</a>
                                                    <ul>
                                                            <li><a href="#">.csv</a></li>
                                                            <li><a href="#">.xlxs</a></li>
                                                        </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="index463f.html?page=form_validation">Exporter</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Réalisations</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('realisation.index')}}">Formulaire de saisie</a>
                                        </li>
                                        <li>
                                            <a href="indexb730.html?page=charts">Listes des mouvements</a>
                                        </li>
                                        <li>
                                            <a href="indexb300.html?page=contact_list">Registre des réalisations</a>
                                        </li>
                                        <li>
                                            <a href="index6f93.html?page=datatables">Datatables</a>
                                        </li>
                                        <li>
                                            <a href="indexd586.html?page=editable_elements">Editable Elements</a>
                                        </li>
                                        <li>
                                            <a href="index5f4e.html?page=file_manager">File manager</a>
                                        </li>
                                        <li>
                                            <a href="indexd590.html?page=gallery">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="indexae6f.html?page=gmaps">Google Maps</a>
                                        </li>
                                        <li>
                                            <a href="#">Tables</a>
                                            <ul>
                                                <li><a href="index8a93.html?page=tables_regular">Regular Tables</a></li>
                                                <li><a href="index1088.html?page=table_stacking">Stacking Table</a></li>
                                                <li><a href="index19e1.html?page=table_examples">Table examples</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="indexbb4d.html?page=wizard">Wizard</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">UI Elements</a>
                                    <ul>
                                        <li><a href="index9d8e.html?page=alerts_buttons">Alerts, Buttons</a></li>
                                        <li><a href="index7632.html?page=grid">Grid</a></li>
                                        <li><a href="index7fa9.html?page=icons">Icons</a></li>
                                        <li><a href="index8067.html?page=js_grid">JS Grid</a></li>
                                        <li>
                                            <a href="index7d5f.html?page=notifications">Notifications</a>
                                        </li>
                                        <li><a href="index7a1c.html?page=tabs_accordions">Tabs, Accordions</a></li>
                                        <li><a href="index2043.html?page=tooltips_popovers">Tooltips, Popovers</a></li>
                                        <li><a href="indexa62f.html?page=typography">Typography</a></li>
                                        <li><a href="index589c.html?page=widgets">Widgets</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Other pages</a>
                                    <ul>
                                        <li><a href="index72d4.html?page=ajax_content">Ajax content</a></li>
                                        <li><a href="index2154.html?page=blank">Blank page</a></li>
                                        <li><a href="index1b62.html?page=blog_page">Blog page</a></li>
                                        <li><a href="index9852.html?page=blog_page_single">Blog page (single)</a></li>
                                        <li><a href="index38c4.html?page=chat">Chat</a></li>
                                        <li><a href="error_404.html">Error 404</a></li>
                                        <li><a href="indexbb2d.html?page=help_faq">Help/Faq</a></li>
                                        <li><a href="indexb59b.html?page=invoices">Invoices</a></li>
                                        <li><a href="login.html">Login Page</a></li>
                                        <li><a href="indexa8a8.html?page=mailbox">Mailbox</a></li>
                                        <li><a href="index0aa3.html?page=user_profile">User profile</a></li>
                                        <li><a href="index74a7.html?page=settings">Site Settings</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Paramêtres</a>
                                    <ul>
                                        <li>
                                            <a href="#">Membres</a>
                                            <ul>
                                                <li><a href="#">Registre</a></li>
                                                <li><a href="{{route('page.add.membre')}}">Ajouter</a></li>
                                                <li><a href="#">Supprimer</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Entités</a>
                                            <ul>
                                                <li><a href="#">Registre</a></li>
                                                <li><a href="{{route('show.entity')}}">Ajouter</a></li>
                                                <li>
                                                    <a href="#">Section 4.4</a>
                                                    <ul>
                                                        <li><a href="#">Section 4.4.1</a></li>
                                                        <li><a href="#">Section 4.4.2</a></li>
                                                        <li><a href="#">Section 4.4.4</a></li>
                                                        <li><a href="#">Section 4.4.5</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Rapport d'erreur</a></li>
                                        <li><a href="#">Historiques</a></li>
                                        <li><a href="#">Notifications</a></li>
                                        <li><a href="#">A propos</a></li>
                                        <li><a href="#">Termes et conditions</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        <!-- header -->
            <header>
                <div class="container">
                    <div class="row">
                        <div class="span3">
                            <div class="main-logo"><a href="{{route('home')}}"><img src="{{asset('public/img/beoro_logo.png')}}" alt="Beoro Admin"></a></div>
                        </div>
                        <div class="span5">
                            <nav class="nav-icons">
                                <ul>
                                    <li><a href="javascript:void(0)" class="ptip_s" title="Dashboard"><i class="icsw16-home"></i></a></li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="icsw16-create-write"></i> <span class="caret"></span></a>
                                        <ul role="menu" class="dropdown-menu">
                                            <li role="presentation"><a href="#" role="menuitem">Action</a></li>
                                            <li role="presentation"><a href="#" role="menuitem">Another action</a></li>
                                            <li class="divider" role="presentation"></li>
                                            <li role="presentation"><a href="#" role="menuitem">Separated link</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)" class="ptip_s" title="Mailbox"><i class="icsw16-mail"></i><span class="badge badge-info">6</span></a></li>
                                    <li><a href="javascript:void(0)" class="ptip_s" title="Comments"><i class="icsw16-speech-bubbles"></i><span class="badge badge-important">14</span></a></li>
                                    <li class="active"><span class="ptip_s" title="Statistics (active)"><i class="icsw16-graph"></i></span></li>
                                    <li><a href="javascript:void(0)" class="ptip_s" title="Settings"><i class="icsw16-cog"></i></a></li>
                                </ul>
                             </nav>
                        </div>
                        <div class="span4">
                            <div class="user-box">
                                <div class="user-box-inner">
                                    <img src="{{asset('public/img/avatars/avatar.png')}}" alt="" class="user-avatar img-avatar">
                                    <div class="user-info">
                                        Welcome, <strong>{{ Auth::user()->name }}</strong>
                                        <ul class="unstyled">
                                            <li><a href="index0aa3.html?page=user_profile">Settings</a></li>
                                            <li>&middot;</li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

        <!-- breadcrumbs -->
            <div class="container">
                <ul id="breadcrumbs">
                    <li><a href="javascript:void(0)"><i class="icon-home"></i></a></li>
                    <li><a href="javascript:void(0)">Content</a></li>
                    <li><a href="javascript:void(0)">Article: Lorem ipsum dolor...</a></li>
                    <li><a href="javascript:void(0)">Comments</a></li>
                    <li><span>Lorem ipsum dolor sit amet...</span></li>
                </ul>
            </div>

            <!-- main content -->
            @yield('content')
            <!-- end content -->

    <!-- footer --> 
        <footer>
            <div class="container">
                <div class="row">
                    <div class="span5">
                        <div>&copy; {{config('app.name').' - '. date('Y')}} </div>
                    </div>
                    <div class="span7">
                        <ul class="unstyled">
                            <li><a href="{{route('home')}}">Accueil</a></li>
                            <li>&middot;</li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-forms').submit();">
                                    Déconnexion
                                </a>

                                <form id="logout-forms" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        
    <!-- Common JS -->
        <!-- jQuery framework -->
            <script src="{{asset('public/js/jquery.min.js')}}"></script>
            <script src="{{asset('public/js/jquery-migrate.js')}}"></script>
        <!-- bootstrap Framework plugins -->
            <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- top menu -->
            <script src="{{asset('public/js/jquery.fademenu.js')}}"></script>
        <!-- top mobile menu -->
            <script src="{{asset('public/js/selectnav.min.js')}}"></script>
        <!-- actual width/height of hidden DOM elements -->
            <script src="{{asset('public/js/jquery.actual.min.js')}}"></script>
        <!-- jquery easing animations -->
            <script src="{{asset('public/js/jquery.easing.1.3.min.js')}}"></script>
        <!-- power tooltips -->
            <script src="{{asset('public/js/lib/powertip/jquery.powertip-1.1.0.min.js')}}"></script>
        <!-- date library -->
            <script src="{{asset('public/js/moment.min.js')}}"></script>
        <!-- common functions -->
            <script src="{{asset('public/js/beoro_common.js')}}"></script>

    <!-- Dashboard JS -->
        <!-- jQuery UI -->
            <script src="{{asset('public/js/lib/jquery-ui/jquery-ui-1.10.2.custom.min.js')}}"></script>
        <!-- touch event support for jQuery UI -->
            <script src="{{asset('public/js/lib/jquery-ui/jquery.ui.touch-punch.min.js')}}"></script>
        

        <!-- Editabl External JS -->    
        @yield('script')
        <!-- end Editable External JS -->

<script>
    if($(window).width() > '1280') {
        $('body').append('<a href="javascript:void" class="fluid_lay" style="position:fixed;top:6px;right:10px;z-index:10000" title="fluid layout"><i class="splashy-arrow_state_grey_left"></i><i class="splashy-arrow_state_grey_right"></i></a>');
        $('.fluid_lay').click(function() {
            var url = window.location.href;    
            if (url.indexOf('?') > -1){
               url += '&fluid=1'
            }else{
               url += '?fluid=1'
            }
            window.location.href = url;
        });
        $(window).on('resize',function() {
            if($(window).width() > '1280') {
                $('.fluid_lay').show();
            } else {
                $('.fluid_lay').hide();
            }
        })
    }
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65387713-1', 'auto');
  ga('send', 'pageview');

</script>
    </body>

</html>
