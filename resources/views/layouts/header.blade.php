<?php $menu_ul="";?>
<header id="header" class="header">
  <div class="header-top bg-theme-colored-2 sm-text-center p-0">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="widget no-border m-0">
            <ul class="list-inline xs-text-center text-white mt-5">
              <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-theme-colored vertical-align-middle mr-10"></i> +225 41-3030-10</a> </li>
              <li class="m-0 pl-10 pr-10">
                <a href="#" class="text-white"><i class="fa fa-envelope-o text-theme-colored vertical-align-middle mr-10"></i> info@africaweb.ci</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-4 pr-0">
          <div class="widget no-border m-0">
            <ul class="styled-icons icon-flat icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
              <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
              {{-- <li><a href="#"><i class="fa fa-cart-plus text-white">(0)</i></a></li> --}}
            </ul>
          </div>
        </div>
        <div class="col-md-3">
{{--           <a class="btn btn-colored btn-flat btn-theme-colored pb-10 ajaxload-popup mr-10 fa fa-lock text-white pb-10 ajaxload-popup"  href="/ajax-load/login"> Espace Client</a>
 --}}
 @if (Auth::check())      
 <div class="dropdown show">
  <a class=" dropdown-toggle btn btn-colored btn-flat btn-theme-colored pb-10 mr-10  text-white pb-10 " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="fa fa-lock"></span>
    
    Espace client
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <ul>
    <li class="dropdown-item pb-10 pr-10 pl-10 pb-10" href="#">
      <a href={{ route('dashboard')}}> <span class="fa fa-twitter"></span>
      
      Tableau de bord</a></li>
    <li class="dropdown-item pb-10 pl-10 pr-10  pb-10" href="#">
      <a href="/logout"><span class="fa fa-arrow-left"></span>
      Déconnexion</a></li>
  </ul>
  </div>
</div>
  
  {{-- <li><a href="#"><i class="fa fa-cart-plus text-white">(0)</i></a></li> --}}
   

 @else
 <a class="btn btn-colored btn-flat btn-theme-colored pb-10 mr-10 text-white pb-10 "  href="/login">
  <span class="fa fa-lock"></span>
  Inscription / Connexion</a>
 @endif

          <!--<a class="text-white pb-10 ajaxload-popup" href="ajax-load/register-form.html"><i class="fa fa-lock vertical-align-middle mr-10"></i>Espace Client</a>-->
        </div>
      </div>
    </div>
  </div>
  <div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
      <div class="container">
        <nav id="menuzord-right" class="menuzord default">
          <a class="menuzord-brand pull-left flip xs-pull-center mt-20 pt-5" href="{{ route('welcome') }}">
            <img src="/images/logo-wide.png" alt="">
          </a>
          <ul class="menuzord-menu">

            <li <?php if($menu_ul=='accueil'){echo 'class="active"';} else{echo '';} ?> >
            <a href="{{ route('welcome', ['mbreadcrumb' => 'accueil']) }}">Accueil</a>
            </li>

            <li <?php if($menu_ul=='domaine'){echo 'class="active"';} else{echo '';} ?> >
            <a href="#home">Nom de Domaine</a>
              <ul class="dropdown">
                <li><a href="{{ route('enregistrement', ['mbreadcrumb' => 'domaine']) }}">Enregistrer un domaine</a></li>
                <li><a href="{{ route('welcome', ['mbreadcrumb' => 'domaine']) }}">Transférer domaine</a></li>
                <li><a href="{{ route('tarifs', ['mbreadcrumb' => 'domaine']) }}">Tarifs</a></li>
              </ul>
            </li>

            <li <?php if($menu_ul=='host'){echo 'class="active"';} else{echo '';} ?> >
            <!--<a href="page-shared-hosting.html">Hébergement Web</a>-->
            <a href="{{ route('hebergement', ['mbreadcrumb' => 'host']) }}">Hébergement Web</a>
            </li>


            <li <?php if($menu_ul=='websms'){echo 'class="active"';} else{echo '';} ?> >
            <a href="{{ route('websms', ['mbreadcrumb' => 'accueil']) }}">Web SMS</a>
            </li>

            
            <li <?php if($menu_ul=='formations'){echo 'class="active"';} else{echo '';} ?> >
            <a href="#home">Formations</a>
              <ul class="dropdown">
                <li><a href="{{ route('welcome', ['mbreadcrumb' => 'formations']) }}">Atelier Marketing Digital</a></li>
                <li><a href="{{ route('welcome', ['mbreadcrumb' => 'formations']) }}">Atelier HTML/CSS</a></li>
                <li><a href="{{ route('welcome', ['mbreadcrumb' => 'formations']) }}">Atelier PHP</a></li>
                <li><a href="{{ route('welcome', ['mbreadcrumb' => 'formations']) }}">Atelier Prestashop</a></li>
              </ul>
            </li>


            <li <?php if($menu_ul=='applications'){echo 'class="active"';} else{echo '';} ?> >
            <a href="#home">Applications
            </a>
              <ul class="dropdown">
                <li><a href="{{ route('welcome', ['mbreadcrumb' => 'applications']) }}">Gestion eCommerce</a></li>
              </ul>
            </li>

            <li <?php if($menu_ul=='contact'){echo 'class="active"';} else{echo '';} ?> >
           <a href="{{ route('welcome', ['mbreadcrumb' => 'contact']) }}">Contact</a>
           </li>

          </ul>

          




        </nav>
      </div>
    </div>
  </div>
</header>
