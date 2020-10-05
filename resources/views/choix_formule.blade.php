<?php
if(isset($_GET['mbreadcumb'])){$menu_ul=$_GET['mbreadcumb'];}else{$menu_ul="domaine";};
?>



<!DOCTYPE html>
<html dir="ltr" lang="fr">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Hostplan - Web Domain Hosting WHMCS HTML5 Template" />
<meta name="keywords" content="hosting,domain,cloud,vps,shared,dadicated,reseller,wordpress hosting,ssd" />
<meta name="author" content="ThemeMascot" />

<!-- Page Title -->
<title>AfricaWeb - Hébergement Web - Domaine - Formation</title>

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

<br>


    <!-- Section: Pricing -->
    <section id="pricing" class="bg-silver-light">
      <div class="container-fluid">
        <div class="section-title text-center mb-40">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="title text-theme-color-2 line-bottom-double-line-centered"><span class="text-theme-colored"><?php echo $_GET['domaine']; ?> </span></h2>
              <p class="font-18 mt-10">Choisissez votre formule d'hébergement</p>
              <a class="btn btn-colored btn-theme-colored text-uppercase mt-10" href={{ route('dns', ['domaine'=>$_GET['domaine']]) }}>J'ai déjà un hébergement</a><br>
            </div>
          </div>
        </div>
        <div class="section-content">
        <center>
          <div class="row">
            <div class="col-md-12">
              <div class="owl-carousel-5col" data-dots="true">

<!--                <div class="item">
                  <div class="pricing-table bg-white border-1px text-center">
                    <div class="pt-0 pb-40">
                      <div class="bg-theme-colored-2 position-relative overflow-hidden pt-15 pb-20">
                        <p class="text-white font-16 line-bottom-centered mb-20">Starting At</p>
                        <h2 class="package-type text-uppercase text-white font-24 mb-0">Reseller Hosting</h2>
                        <div class="package-icon"><i class="fa fa-database"></i></div>
                        <div class="pricing-ribbon">
                          <h5>featuredg</h5>
                        </div>
                      </div>
                      <h1 class="price font-45 font-weight-600 text-theme-colored bg-white line-height-1 font-opensans m-0 pt-15"><span class="font-26 text-theme-colored font-raleway font-weight-600 currency">$</span>30<span class="font-25 font-weight-600 text-gray-lightgray">.00</span></h1>
                      <h5 class="text-theme-colored mt-5 mb-20">per year</h5>
                      <ul class="table-list pt-0 pl-0">
                        <li>20GB Storage</li>
                        <li>Free Domain Register</li>
                        <li>15GB Bandwidth</li>
                        <li>20 Email Account</li>
                        <li>Free Cpanel</li>
                        <li>24/7 instant Support</li>
                      </ul>
                      <a class="btn btn-colored btn-theme-colored text-uppercase mt-10" href="#">Order Now!</a><br>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="pricing-table bg-white border-1px text-center">
                    <div class="pt-0 pb-40">
                      <div class="bg-theme-colored-2 position-relative pt-15 pb-20">
                        <p class="text-white font-16 line-bottom-centered mb-20">Starting At</p>
                        <h2 class="package-type text-uppercase text-white font-24 mb-0">VPS Hosting</h2>
                        <div class="package-icon"><i class="fa fa-server"></i></div>
                      </div>
                      <h1 class="price font-45 font-weight-600 text-theme-colored bg-white line-height-1 font-opensans m-0 pt-15"><span class="font-26 text-theme-colored font-raleway font-weight-600 currency">$</span>50<span class="font-25 font-weight-600 text-gray-lightgray">.00</span></h1>
                      <h5 class="text-theme-colored mt-5 mb-20">per year</h5>
                      <ul class="table-list pt-0 pl-0">
                        <li>50GB Storage</li>
                        <li>Free Domain Register</li>
                        <li>30GB Bandwidth</li>
                        <li>50 Email Account</li>
                        <li>Free Cpanel</li>
                        <li>24/7 instant Support</li>
                      </ul>
                      <a class="btn btn-colored btn-theme-colored text-uppercase mt-10" href="#">Order Now!</a><br>
                    </div>
                  </div>
                </div>

-->

                <div class="item">
                  <div class="pricing-table bg-white border-1px text-center">
                    <div class="pt-0 pb-40">
                      <div class="bg-theme-colored-2 position-relative overflow-hidden pt-15 pb-20">
                        <p class="text-white font-16 line-bottom-centered mb-20"><br>Particuliers et débutants</p>
                        <h2 class="package-type text-uppercase text-white font-24 mb-0">STARTER</h2>
                        <div class="package-icon"><i class="fa fa-server"></i></div>
                        
                        <!--<div class="pricing-ribbon">
                          <h5>Eco</h5>
                        </div>-->

                      </div>
                      <h1 class="price font-45 font-weight-600 text-theme-colored bg-white line-height-1 font-opensans m-0 pt-15">990<span class="font-26 text-theme-colored font-raleway font-weight-600 currency">F CFA</span><span class="font-25 font-weight-600 text-gray-lightgray"></span></h1>
                      <h5 class="text-theme-colored mt-5 mb-20">par mois</h5>
                      <ul class="table-list pt-0 pl-0">
                        <li>Performances Générale<center><img src="images/bar1.png" style="width: 40px; height: 23px;"></center></li>
                        <li>Aucun Domaine offert</li>
                        <li>40 Go Espace disque</li>
                        <li>400 Go Bande passante</li>
                        <li>01 Sites Web Hébergés</li>
                        <li>100 sous domaines illimités</li>
                        <li>3 comptes FTP</li>
                        <li>3 Bases de données MySql</li>
                        <li>3 Adresses email</li>
                        <li>Cpanel gratuit</li>
                        <li>Assistance 365</li>

                      </ul>
                      <a class="btn btn-colored btn-theme-colored text-uppercase mt-10" href="/recap_formule?formule=starter&domaine=<?php echo $_GET['domaine']; ?>">Commander</a><br>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="pricing-table bg-white border-1px text-center">
                    <div class="pt-0 pb-40">
                      <div class="bg-theme-colored-2 position-relative overflow-hidden pt-15 pb-20">
                        <p class="text-white font-16 line-bottom-centered mb-20"><br>Site Web Dynamique</p>
                        <h2 class="package-type text-uppercase text-white font-24 mb-0">BASIC</h2>
                        <div class="package-icon"><i class="fa fa-server"></i></div>
                        <div class="pricing-ribbon">
                          <h5>PLUS VENDU</h5>
                        </div>
                      </div>
                      <h1 class="price font-45 font-weight-600 text-theme-colored bg-white line-height-1 font-opensans m-0 pt-15">1.990<span class="font-26 text-theme-colored font-raleway font-weight-600 currency">F CFA</span><span class="font-25 font-weight-600 text-gray-lightgray"></span></h1>
                      <h5 class="text-theme-colored mt-5 mb-20">par mois</h5>
                      <ul class="table-list pt-0 pl-0">
                        <li>Performances Générale<center><img src="images/bar2.png" style="width: 40px; height: 23px;"></center></li>
                        <li>01 Domaine Offert !</li>
                        <li>100 Go Espace disque</li>
                        <li>Bande passante illimitée</li>
                        <li>07 Sites Web Hébergés</li>
                        <li>100 sous domaines</li>
                        <li>15 comptes FTP</li>
                        <li>15 Bases de données MySql</li>
                        <li>20 Adresses email</li>
                        <li>Cpanel gratuit</li>
                        <li>Assistance 365</li>
                      </ul>
                      <a class="btn btn-colored btn-theme-colored text-uppercase mt-10" href="/recap_formule?formule=basic&domaine=<?php echo $_GET['domaine']; ?>">Commandez</a><br>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="pricing-table bg-white border-1px text-center">
                    <div class="pt-0 pb-40">
                      <div class="bg-theme-colored-2 position-relative pt-15 pb-20">
                        <p class="text-white font-16 line-bottom-centered mb-20">Projet d'envergure<br>entreprise, institutions etc.</p>
                        <h2 class="package-type text-uppercase text-white font-24 mb-0">GOLD</h2>
                        <div class="package-icon"><i class="fa fa-server"></i></div>
                      </div>
                      <h1 class="price font-45 font-weight-600 text-theme-colored bg-white line-height-1 font-opensans m-0 pt-15">3.990<span class="font-26 text-theme-colored font-raleway font-weight-600 currency">F CFA</span><span class="font-25 font-weight-600 text-gray-lightgray"></span></h1>
                      <h5 class="text-theme-colored mt-5 mb-20">par mois</h5>
                      <ul class="table-list pt-0 pl-0">
                        <li>Performances Générale<center><img src="images/bar3.png" style="width: 40px; height: 23px;"></center></li>
                        <li>01 Domaine Offert !</li>
                        <li>250 Go Espace disque</li>
                        <li>Bande passante illimitée</li>
                        <li>15 Sites Web Hébergés</li>
                        <li>270 sous domaines</li>
                        <li>70 comptes FTP</li>
                        <li>70 Bases de données MySql</li>
                        <li>35 Adresses email</li>
                        <li>Cpanel gratuit</li>
                        <li>Assistance 365</li>
                      </ul>
                      <a class="btn btn-colored btn-theme-colored text-uppercase mt-10" href="/recap_formule?formule=gold&domaine=<?php echo $_GET['domaine']; ?>">Commandez</a><br>
                    </div>
                  </div>
                </div>

                <div class="item">
                  <div class="pricing-table bg-white border-1px text-center">
                    <div class="pt-0 pb-40">
                      <div class="bg-theme-colored-2 position-relative pt-15 pb-20">
                        <p class="text-white font-16 line-bottom-centered mb-20">Gros Projets Web, sociétés, experts, eCommerces</p>
                        <h2 class="package-type text-uppercase text-white font-24 mb-0">PREMIUM</h2>
                        <div class="package-icon"><i class="fa fa-server"></i></div>
                      </div>
                      <h1 class="price font-45 font-weight-600 text-theme-colored bg-white line-height-1 font-opensans m-0 pt-15">7.990<span class="font-26 text-theme-colored font-raleway font-weight-600 currency">F CFA</span><span class="font-25 font-weight-600 text-gray-lightgray"></span></h1>
                      <h5 class="text-theme-colored mt-5 mb-20">par mois</h5>
                      <ul class="table-list pt-0 pl-0">
                        <li>Performances Générale<center><img src="images/bar4.png" style="width: 40px; height: 23px;"></center></li>
                        <!--<li>01 Nom de Domaine & SSL Gratuit !</li>-->
                        <li>01 Domaine & SSL Offert !</li>
                        <li>Espace disque illimités</li>
                        <li>Bande passante illimitées</li>
                        <li>Sites Web Hébergés illimités</li>
                        <li>Sous domaines illimités</li>
                        <li>Comptes FTP illimités</li>
                        <li>Bases de données MySql illimitées</li>
                        <li>Adresses email illimitées</li>
                        <li>Cpanel gratuit</li>
                        <li>Assistance 365</li>
                      </ul>
                      <a class="btn btn-colored btn-theme-colored text-uppercase mt-10" href="/recap_formule?formule=premium&domaine=<?php echo $_GET['domaine']; ?>">Commandez</a><br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </center>
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
<script>
  $(document).ready({

  @if(isset($_GET['formule']))  
      window.location.href = '/recap_formule?formule=' +'{{$_GET['formule']}}' +'&domaine='+ '{{$_GET['domaine']}}';
  @endif
  });
</script>
</body>
</html>