<?php
if(isset($_GET['mbreadcumb'])){$menu_ul=$_GET['mbreadcumb'];}else{$menu_ul="domaine";};
$domaine=$_GET['domaine'];
if(!isset($formule))
{
$formule=$_GET['formule'];
}

function extension($str)
{
$long=strlen($str)-strrpos($str,".");
$rlong=$long*(-1);
$ext=substr($str, $rlong);
return $ext;
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
$link=mysqli_connect("localhost", "root", "","africaweb", "3308");

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
<style>
  .hide{

  }
  </style>
<!-- external javascripts -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="js/jquery-plugin-collection.js"></script>

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
<br>
<br>
    <section class="layer-overlay overlay-white-5 bg-silver-light">
      <div class="container pb-60">
        <div class="row">
          <div class="col-md-12">
            <form action="/paiement" method="POST">
              @csrf
            <table class="table domain-price-table">
              <tbody>
                <tr>
                  <td>Domaine</td>
                  <td>Formule</td>
                  <td>Durée et prix</td>
                  <!--<td>Commander</td>-->
                </tr>

                <tr>
                  <td><?php echo $domaine; ?></td>
                  <td style="color: green;"><b><?php echo strtoupper($formule); ?></b></td>
                  <td>
                  <?php 
                  $prix_domaine=prix_domaine(extension($domaine));
                  if ($formule=="starter") 
                  {
                    echo '<select name="duree">
                                    <option value="12-starter" selected>12 mois - '.($prix_domaine).' FCFA + 11.880F CFA (990F CFA x 12)</option>
                                    <option value="24-starter">24 mois - '.($prix_domaine*2).' FCFA + 23.760F CFA (990F CFA x 24)</option>
                                    <option value="36-starter">36 mois - '.($prix_domaine*3).' FCFA + 35.640F CFA (990F CFA x 36)</option>
                          </select>';
                  } 
                  else if ($formule=="basic") 
                  {
                    echo '<select name="duree">
                                    <option value="12-basic" selected>12 mois - 23.880F CFA (1.990F CFA x 12)</option>
                                    <option value="24-basic">24 mois - 47.760F CFA (1.990F CFA x 24)</option>
                                    <option value="36-basic">36 mois - 71.640F CFA (1.990F CFA x 36)</option>
                          </select>';
                  } 

                  else if ($formule=="gold") 
                  {
                    echo '<select name="duree">
                                    <option value="12-gold" selected>12 mois - 47.880F CFA (3.990F CFA x 12)</option>
                                    <option value="24-gold">24 mois - 95.760F CFA (3.990F CFA x 24)</option>
                                    <option value="36-gold">36 mois - 143.640F CFA (3.990F CFA x 36)</option>
                          </select>';
                  } 



                  else if ($formule=="premium") 
                  {
                    echo '<select name="duree">
                                    <option value="12-premium" selected>12 mois - 95.880F CFA (7.990F CFA x 12)</option>
                                    <option value="24-premium">24 mois - 191.760F CFA (7.990F CFA x 24)</option>
                                    <option value="36-premium">36 mois - 287.640F CFA (7.990F CFA x 36)</option>
                          </select>';
                  }
                  else if ($formule=="domain") 
                  {
                    echo prix_domaine(extension($domaine)).'F CFA (1 an)';
                  }

                  ?>

                      <input type="hidden" name="domain" value={{$domaine}}>   
                      
                      <div class="hide">          
                        <input type="text" id="dns1" name="dns1" value="">  
                      <input type="text" id="dns2" name="dns2" value="">                
                      <input type="text"  id="dns3" name="dns3" value="">                
                      <input type="text" id="dns4" name="dns4" value=""> 
                    </div>
                      <input type="hidden" name="prix_domain" value={{prix_domaine(extension($domaine))}}>                
                  </td>
                </tr>
                <tr>
                  <td colspan="3"  style="text-align: right;">
                                  {{-- <select name="moyen-paiement">
                                    <option value="choix" selected> -- choisir moyen de paiement -- </option>
                                    <option value="orange"> -- Orange Money -- </option>
                                    <option value="mtn"> -- MTN MoMo -- </option>
                                    <option value="moov"> -- Moov Money -- </option>
                                  </select> --}}
                      
                 <button type="submit" class="btn btn-sm btn-theme-colored">Continuer l'achat</button>

                  </td>
                </tr>

              </tbody>
            </table>
            </form>











          </div>
        </div>
      </div>
    </section>
    

    <section class="clients bg-silver-light">
      <div class="container pt-30 pb-30">
        <div class="row">
          <div class="col-md-12">
            <!-- Section: Clients -->
            <div class="owl-carousel-6col clients-logo transparent text-center" data-autoplay="false">
              <div class="item"> <a href="#"><img src="/images/paiements/mastercard.jpg" height="100px" alt=""></a></div>
              <div class="item"> <a href="#"><img src="/images/paiements/moov.webp" height="100px" alt=""></a></div>
              <div class="item"> <a href="#"><img src="/images/paiements/mtn.jpg" height="100px" alt=""></a></div>
              <div class="item"> <a href="#"><img src="/images/paiements/orange.jpg" height="100px" alt=""></a></div>
              <div class="item"> <a href="#"><img src="/images/paiements/visa.webp" height="100px" alt=""></a></div>

            </div>
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
<script>
$(document).ready(function() {
  var dns1=localStorage.getItem('dns1');
  var dns2=localStorage.getItem('dns2');
  var dns3=localStorage.getItem('dns3');
  var dns4=localStorage.getItem('dns4');

  if(dns1==null){
    dns1 = "dns1.africaweb.ci";
  }
  if(dns1==null){
    dns2 = "dns2.africaweb.ci";
  }
  $('input[name="dns1"]').val(dns1);
  $('input[name="dns2"]').val(dns2);
  $('input[name="dns3"]').val(dns3);
  $('input[name="dns4"]').val(dns4);
  //console.log(dns1);
//document.getElementById('dns1').setAttribute('value', "dns1.africaweb.ci");
//document.getElementById('dns2').val(dns2);
});
  </script>
</body>
</html>