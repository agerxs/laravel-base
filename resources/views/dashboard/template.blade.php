<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Africaweb | Tableau de bord</title>
    <!-- Css Files -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="/dashboard/css/root.css" rel="stylesheet">
    
</head>
<body>
    <!-- Start Page Loading -->
    <div class="loading"><img src="/dashboard/img/loading.gif" alt="loading-img"></div>
    <!-- End Page Loading --> 
    <!-- Start Top -->
    <div id="top" class="clearfix"> 
        <!-- Start App Logo -->
        <div class="applogo" style="background-color: white"> <a href="index.html" class="logo"><img src="/images/logo_png.png" alt="Africaweb" height="80%"></a> </div>
        <!-- End App Logo --> 
        <!-- Start Sidebar Show Hide Button --> 
        <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a> <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a> 
        <!-- End Sidebar Show Hide Button --> 
        <!-- Start Searchbox -->
        <form class="searchform">
            <input type="text" class="searchbox" id="searchbox" placeholder="Rechercher...">
            <span class="searchbutton"><i class="fa fa-search"></i></span>
        </form>
        <!-- End Searchbox --> 
        <!-- Start Sidepanel Show-Hide Button --> 
        <a href={{ route('home') }} class="sidepanel-open-button"><i class="fa fa-home"></i></a> 
        <!-- End Sidepanel Show-Hide Button --> 
        <!-- Start Top Right -->
        <ul class="top-right">
                            <li class="dropdown link"> <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="/dashboard/img/profileimg.png" alt="img"><b>{{Auth::user()->email}}</b><span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
                                        <li role="presentation" class="dropdown-header">Profil</li>
                                        <li><a href="#"><i class="fa falist fa-wrench"></i>Modifier Profil</a></li>
                                        <li class="divider"></li>
                                        <li><a href={{ route('logout') }}><i class="fa falist fa-power-off"></i> Déconnexion</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- End Top Right --> 
                        </div>
                        <!-- End Top --> 
                        <!-- Start Sidabar -->
                        <div class="sidebar clearfix">
                            <ul class="sidebar-panel nav metismenu" id="side-menu" data-plugin="metismenu">
                                <li class="active"><a href={{ route('dashboard.index') }}><span class="icon color5"><i class="fa fa-home" aria-hidden="true"></i></span><span class="nav-title">Tableau de bord</span></a>
                                </li>
                                <li><a href={{ route('users.index') }}><span class="icon color9"><i class="fa fa-users" aria-hidden="true"></i></span>Utilisateurs</a>
                                <li><a href="#"><span class="icon color9"><i class="fa fa-circle" aria-hidden="true"></i></span>Services</a>
                                </li>    
                                <li><a href={{ route('domains.index') }}><span class="icon color9"><i class="fa fa-list" aria-hidden="true"></i></span>Domaines</a></li>
                                         
                                <li><a href={{route('payments.index')}}><span class="icon color9"><i class="fa fa-file" aria-hidden="true"></i></span>Factures</a>
                                </li>               
                                <li><a href="#"><span class="icon color9"><i class="fa fa-ticket" aria-hidden="true"></i></span>Tickets<span><i class="fa fa-external-link pl-3" aria-hidden="true"></i></span></a>
                                </li>                        
                                </li>
                                                               
                            </ul>
                        </div>
                        <!-- End Sidabar --> 
                        <!-- Start Content -->
                        <div class="content"> 
                            <!-- Start Container -->
                            <div class="container-default animated fadeInRight"> <br>
                                @yield('content')
                               
                            </div>
    <!-- End Container --> 
    <!-- Start Footer -->
    <div class="row footer">
        <div class="col-md-6 text-left"> Copyright &copy; 2020 Africaweb.ci Tous droits réservés. </div>
        
    </div>
    <!-- End Footer --> 
</div>
<!-- End Content --> 

<!-- jQuery Library --> 

<script type="text/javascript" src="/dashboard/js/jquery.min.js"></script> 
<!-- Bootstrap Core JavaScript File --> 
<script type="text/javascript" src="/dashboard/js/bootstrap/dist/js/popper.min.js"></script> 
<script type="text/javascript" src="/dashboard/js/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Plugin.js - Some Specific JS codes for Plugin Settings --> 
<script type="text/javascript" src="/dashboard/js/plugins.js"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- MetisMenu --> 
<script type="text/javascript" src="/dashboard/js/metismenu/metisMenu.min.js"></script>
<!-- Flot Chart --> 
<script type="text/javascript" src="/dashboard/js/flot-chart/flot-chart.js"></script><!-- main file --> 
<script type="text/javascript" src="/dashboard/js/flot-chart/flot-chart-time.js"></script><!-- time.js --> 
<script type="text/javascript" src="/dashboard/js/flot-chart/flot-chart-stack.js"></script><!-- stack.js --> 
<script type="text/javascript" src="/dashboard/js/flot-chart/flot-chart-pie.js"></script><!-- pie.js --> 
<script type="text/javascript" src="/dashboard/js/flot-chart/flot-chart-plugin.js"></script><!-- demo codes --> 
<!-- Chartist --> 
<script type="text/javascript" src="/dashboard/js/chartist/chartist.js"></script><!-- main file --> 
<script type="text/javascript" src="/dashboard/js/chartist/chartist-plugin.js"></script><!-- demo codes --> 
<!-- Counterup -->
<script type="text/javascript" src="/dashboard/js/counterup/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="/dashboard/js/counterup/jquery.counterup.min.js"></script>

<script src="/dashboard/js/datatables/datatables.min.js"></script>
<!-- MetisMenu --> 
<script type="text/javascript" src="/dashboard/js/metismenu/metisMenu.min.js"></script>
</body>
</html>