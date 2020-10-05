<?php


if(isset($_GET['mbreadcumb'])) {$menu_ul=$_GET['mbreadcumb'];}

function statut_domaine($domaine,$ext)
    {
        $fulldomaine=$domaine.$ext;
        $len=strlen($fulldomaine);
        $domainecheck=file_get_contents("https://www.francedns.com/bin/das-web.php?login=SD61&password=5htv1yntnt43fgu&domain=".$fulldomaine); 


        $long=strlen($domainecheck);
        $pos_dep=strpos($domainecheck,":");
        $pos_fin=strrpos($domainecheck,"Execution");
        $taille_rep=$long-$pos_dep-$pos_fin;

        $long_rep=$pos_fin-4-$pos_dep-3;
        $reponse=substr($domainecheck,$pos_dep+2,$long_rep);
        //$statutdomaine= reponse($domainecheck); 
        return $reponse;
    }

    function prix_domaine($ext)
    {
        $link=mysqli_connect("localhost", "root", "","africaweb", "3308");
        
    $resultat = mysqli_query($link, "SELECT `prixVente_tld` FROM `tld` where `extension_tld`='$ext'");
    while($tld = mysqli_fetch_array($resultat))
    {   
        $prix=$tld['prixVente_tld'];
    }
    return $prix;
    }

?>




<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Hostplan - Web Domain Hosting WHMCS HTML5 Template" />
<meta name="keywords" content="hosting,domain,cloud,vps,shared,dadicated,reseller,wordpress hosting,ssd" />
<meta name="author" content="ThemeMascot" />

<!-- Page Title -->
<title>AfricaWeb - Resultat recherche <?php echo $fulldomaine; ?> </title>

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
              <form  name="reservation_form" method="get" action="{{ route('resultat_domain').'#rslt' }}">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-7 pr-0 pr-xs-15">
                  <div class="form-group mb-15">
                    <input name="domaine" class="form-control required domaine font-weight-700" value="<?php echo $domaine; ?>" aria-required="true" type="domaine">
                    <input name="mbreadcumb" type="hidden" value="domaine">

                  </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 pr-0 pl-0 pr-xs-15 pl-xs-15">
                  <div class="form-group mb-15 mt-0">

                    <input name="form_botcheck" class="form-control" value="" type="hidden">
                    <button type="submit" class="btn btn-theme-colored btn-lg btn-flat border-1px form-control" data-loading-text="Patientez...">Trouver</button>
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
    <section class="layer-overlay overlay-white-5 bg-silver-light" data-bg-img="images/photos/bg-pattern.png">
      <div class="container pb-60">
        <div class="row">
          @isset($var)
          <?php 
          if($pack!=null)
          { ?>
            <div class="col-md-12 alert bg-info">
                Vous avez sélectionné le pack {{$pack}}.
            </div>
            <?php
          }
           ?>
           @endisset
          <div class="col-md-12">

<?php
if($statut_domaine == "AVAILABLE")
  {echo   '<font  style="font-weight: normal;font-size: 17px;" class="title text-theme-color-2">Bonne nouvelle ! <span class="text-theme-colored"  style="font-weight: bold;">'.$racine_domaine.$extension.'</span> est <span class="text-theme-colored"  style="font-weight: bold;">
    disponible !  ';
    if(isset($_GET['pack'])){
echo '<a href="/choix_formule?pack='.$_GET['pack'].'&domaine='.$racine_domaine.$extension.'"' ;
    }else
      {
        echo '<a href="/choix_formule?domaine='.$racine_domaine.$extension.'"' ;
      }

    echo 'class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></span></font>' ; }

else
	{echo   '<h4 class="title text-theme-color-2">Désolé ! Le domaine  <span style="color: red;">'.$racine_domaine.$extension.' </span>n\'est pas <span style="color: red;">disponible</span>. Choisissez-en un autre<span class="text-theme-colored"></span></h4>' ; }
	
?>



<br>
<br>
            <table class="table domain-price-table">
              <tbody style="font-weight: normal;font-size: 17px;" >
                <tr height="3px">
                  <td colspan="2" height="3px"></td>
                </tr>

                <?php

                if(statut_domaine($racine_domaine,$extension) == "AVAILABLE")
                  { 
                    echo '
                <tr>
                  <td>'.$racine_domaine.$extension.' <font color="green">('.prix_domaine($extension).'F CFA)</font></td>';
                  if(isset($_GET['pack'])){
                    
                  echo '<td><a href="/choix_formule?pack='.$_GET['pack'].'&domaine='.$racine_domaine.$extension.'" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;}
                else {echo '<td><a href="/choix_formule?domaine='.$racine_domaine.$extension.'" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>';}
              
              }



                if(statut_domaine($racine_domaine,".com") == "AVAILABLE")
                  { 
                    echo '
                <tr>
                  <td>'.$racine_domaine.'.com <font color="green">('.prix_domaine(".com").'F CFA)</font></td>';
                  if(isset($_GET['pack']))
                  {
                    echo '<td><a href="/choix_formule?pack='.$_GET['pack'].'&domaine='.$racine_domaine.'.com" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
                  else{
                    echo '<td><a href="/choix_formule?domaine='.$racine_domaine.'.com" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }}


                if(statut_domaine($racine_domaine,".net") == "AVAILABLE")
                  { 
                    echo '
                <tr>
                  <td>'.$racine_domaine.'.net <font color="green">('.prix_domaine(".net").'F CFA)</font></td>';
                  if(isset($_GET['pack']))
                  {
                    echo '<td><a href="/choix_formule?pack='.$_GET['pack'].'&domaine='.$racine_domaine.'.net" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
                  else{
                    echo '<td><a href="/choix_formule?domaine='.$racine_domaine.'.net" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }}

                if(statut_domaine($racine_domaine,".org") == "AVAILABLE")
                  { 
                    echo '
                <tr>
                  <td>'.$racine_domaine.'.org <font color="green">('.prix_domaine(".org").'F CFA)</font></td>';
                  if(isset($_GET['pack']))
                  {
                    echo '<td><a href="/choix_formule?pack='.$_GET['pack'].'&domaine='.$racine_domaine.'.org" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
                  else{
                    echo '<td><a href="/choix_formule?domaine='.$racine_domaine.'.org" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
              }


                if(statut_domaine($racine_domaine,".info") == "AVAILABLE")
                  { 
                    echo '
                <tr>
                  <td>'.$racine_domaine.'.info <font color="green">('.prix_domaine(".info").'F CFA)</font></td>';
                  if(isset($_GET['pack']))
                  {
                    echo '<td><a href="/choix_formule?pack='.$_GET['pack'].'&domaine='.$racine_domaine.'.info" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
                  else{
                    echo '<td><a href="/choix_formule?domaine='.$racine_domaine.'.info" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
                }


                if(statut_domaine($racine_domaine,"-ci.com") == "AVAILABLE")
                  { 
                    echo '
                <tr>
                  <td>'.$racine_domaine.'-ci.com <font color="green">('.prix_domaine(".com").'F CFA)</font></td>';
                  if(isset($_GET['pack']))
                  {
                    echo '<td><a href="/choix_formule?pack='.$_GET['pack'].'&domaine='.$racine_domaine.'-ci.com" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
                  else{
                    echo '<td><a href="/choix_formule?domaine='.$racine_domaine.'-ci.com" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
                }



                if(statut_domaine($racine_domaine,"-ci.net") == "AVAILABLE")
                  { 
                    echo '
                <tr>
                  <td>'.$racine_domaine.'-ci.net <font color="green">('.prix_domaine(".net").'F CFA)</font></td>';
                  if(isset($_GET['pack']))
                  {
                    echo '<td><a href="/choix_formule?pack='.$_GET['pack'].'&domaine='.$racine_domaine.'-ci.net" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
                  else{
                    echo '<td><a href="/choix_formule?domaine='.$racine_domaine.'-ci.net" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }}



                if(statut_domaine($racine_domaine,"-ci.org") == "AVAILABLE")
                  { 
                    echo '
                <tr>
                  <td>'.$racine_domaine.'-ci.org <font color="green">('.prix_domaine(".org").'F CFA)</font></td>';
                  if(isset($_GET['pack']))
                  {
                    echo '<td><a href="/choix_formule?pack='.$_GET['pack'].'&domaine='.$racine_domaine.'-ci.org" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
                  else{
                    echo '<td><a href="/choix_formule?domaine='.$racine_domaine.'-ci.org" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }}




                if(statut_domaine($racine_domaine,"-ci.info") == "AVAILABLE")
                  { 
                    echo '
                <tr>
                  <td>'.$racine_domaine.'-ci.info <font color="green">('.prix_domaine(".info").'F CFA)</font></td>';
                  if(isset($_GET['pack']))
                  {
                    echo '<td><a href="/choix_formule?pack='.$_GET['pack'].'&domaine='.$racine_domaine.'-ci.info" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }
                  else{
                    echo '<td><a href="/choix_formule?domaine='.$racine_domaine.'-ci.org" class="btn btn-sm btn-theme-colored">Acheter ce domaine</a></td>
                </tr>'
                ;
                  }}

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