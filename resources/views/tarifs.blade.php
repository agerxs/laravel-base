<?php
//if(isset($_GET['mbreadcumb'])){$menu_ul=$_GET['mbreadcumb'];}else{$menu_ul="domaine";};
$menu_ul='domaine';

?>



<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="AfricaWeb, premier site d'hébergement en Afrique Francophone" />
<meta name="keywords" content="Hébergement,Africaweb.ci,www.africaweb.ci,hosting,domain,cloud,vps,shared,.ci,ssl,wordpress hosting,ssd" />
<meta name="author" content="AfricaWeb" />

<!-- Page Title -->
<title>Tarifs des noms de domaines - AfricaWeb Hébergement Web - Domaine - Formation</title>

<!-- Favicon and Touch Icons -->
<link href="images/favicon.png" rel="shortcut icon" type="image/png">
<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- CSS | Theme Color -->
<link href="css/colors/theme-skin-sky-blue.css" rel="stylesheet" type="text/css">
<!-- external javascripts -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="js/jquery-plugin-collection.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img class="ml-5" src="images/preloaders/4.gif" alt="">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>

  <!-- Header -->

            @include('layouts.header')
  
  <!-- FIN Header -->


  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-1" data-bg-img="images/bg/bg1.jpg">
      <div class="container pb-40">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-7 pt-20">
              <div class="row">
                <div class="col-md-12">
                  <h3 class="text-white sm-text-center font-weight-300 mt-0 mb-15">Tout commence par un <span class="text-theme-colored font-weight-700">Domaine</span>. Trouvez le bon</h3>
                </div>
              </div>
      <form method="get" action="{{route('resultat_domain')}}">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-7 pr-0 pr-xs-15">
                  <div class="form-group mb-15">
                    <input name="domaine" class="form-control required domaine font-weight-700" aria-required="true" type="domaine">
                    <input name="mbreadcumb" type="hidden" value="domaine">

                  </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 pr-0 pl-0 pr-xs-15 pl-xs-15">
                  <div class="form-group mb-15 mt-0">
                    <input name="form_botcheck" class="form-control" value="" type="hidden">
                    <button type="submit" class="btn btn-theme-colored btn-lg btn-flat border-1px form-control" data-loading-text="Please wait...">Trouver</button>
                  </div>
                </div>
              </div>
      </form>
        </div> 
<!--
            <div class="col-md-5">
              <img src="http://placehold.it/399x267" alt="">
            </div>
-->
          </div>
        </div>
      </div>
    </section>

                    
                                                          

    <!-- Divider: Other Services -->
    <!--<section class="layer-overlay overlay-white-5 bg-silver-light" data-bg-img="http://placehold.it/514x257">-->
    <section class="layer-overlay overlay-white-5 bg-silver-light">
      <div class="container pb-60">
        <div class="row">
          <div class="col-md-12">
            <table class="table domain-price-table">
              <tbody>
                <tr>
                  <td>Domaine</td>
                  <td>1 an</td>
                  <td>2 ans</td>
                  <td>Renouvellement</td>
                  <td>Transfert</td>
                  <td>Commander</td>
                </tr>

              
    

    @foreach ($results as $tld)
    

                <tr>
                  <td><?php  printf($tld['extension_tld']);?></td>
                  <td><?php  printf($tld['prixVente_tld']);?>F CFA</td>
                  <td><?php  printf($tld['prixVente_tld']*2);?>F CFA</td>
                  <td><?php  printf($tld['prixVente_tld']);?>F CFA</td>
                  <td><?php  printf($tld['prixVente_tld']);?>F CFA</td>
                  <td><a href="#" class="btn btn-sm btn-theme-colored">Réserver</a></td>
                </tr>


@endforeach
<?php 
//} 

// $result->close();

?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    
    
    <!-- Divider: Call To Action -->
    <section class="bg-theme-colored-2">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="call-to-action pt-0 pb-0">
            <div class="col-md-3 text-center font-16 pt-40 pb-40 border-right-dark"> 
              <a href="#" class="text-white"><i class="fa fa-headphones mr-10"></i>Centre d'appel 365j</a> 
            </div>
            <div class="col-md-3 text-center font-16 pt-40 pb-40 border-right-dark"> 
              <a href="#" class="text-white"><i class="fa fa-envelope-o mr-10"></i> support@africaweb.ci</a> 
            </div>
            <div class="col-md-3 text-center font-16 pt-40 pb-40 border-right-dark"> 
              <a href="#" class="text-white"><i class="fa fa-mobile mr-10"></i> +225 41 3030 10</a> 
            </div>
            <div class="col-md-3 text-center font-16 pt-40 pb-40"> 
              <a href="#" class="text-white"><i class="fa fa-whatsapp mr-10"></i> +225 41 3030 10</a> 
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  
<!-- FOOTER CALL -->
@include('layouts.footer')
<!-- END FOOTER CALL -->

<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

</body>
</html>