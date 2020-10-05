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
              <h2 class="title text-theme-color-2 line-bottom-double-line-centered"><span class="text-theme-colored"><?php echo $domaine; ?> </span></h2>
              <p class="font-18 mt-10">Veuillez configurer vos DNS svp.</p>
              <form action="">
                <div class="form-group row">
                  <div class="col-sm-10 col-offset-2">
                    <input type="checkbox" name="africaweb" id="africaweb">
                    <label>Je possède déjà un nom de domaine chez Africaweb.
                  </div>
                  
                </div>
                <div class="form-group row">
                  <label for="dns1" class="col-sm-2 text-right">DNS 1 : </label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="dns1" name="dns1" placeholder="dns1.africaweb.ci" value="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="dns2" class="col-sm-2 text-right">DNS 2 : </label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="dns2" name="dns2" placeholder="dns2.africaweb.ci" value="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="dns3" class="col-sm-2 text-right">DNS 3 : </label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="dns3" name="dns3" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="dns4" class="col-sm-2 text-right">DNS 4 : </label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="dns4" name="dns4" value="">
                  </div>
                </div>
                <div class="row">
                  <button type="button" class="btn btn-primary" value="Enregistrer" onclick="store()">Enregistrer</button>
                </div>
              </form>
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
  $(document).ready(function(){
  $("#africaweb").click(function(){
    if($(this).prop("checked") == true){
     $('input[name="dns1"]').val('dns1.africaweb.ci');
     $('input[name="dns2"]').val('dns2.africaweb.ci');
    }
    else{
      $('input[name="dns1"]').val('');
     $('input[name="dns2"]').val('');
    }
  });
  
});
function store(){
     var dns1= document.getElementById("dns1");
     var dns2= document.getElementById("dns2");
     var dns3= document.getElementById("dns3");
     var dns4= document.getElementById("dns4");
     
     localStorage.setItem("dns1", dns1.value);
     localStorage.setItem("dns2", dns2.value);
     localStorage.setItem("dns3", dns3.value);
     localStorage.setItem("dns4", dns4.value);
     window.location.href = '/recap_formule?formule=domain&domaine='+ '{{$_GET['domaine']}}';
  

    }
</script>
</body>
</html>