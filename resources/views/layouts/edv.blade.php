
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Alisveris.com">
<meta name="keywords" content="geyim,paltar,telefon,acki,tshirt">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- SITE TITLE -->
<title>EdvCoin.com</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="/assets/css/animate.css">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="/assets/css/all.min.css">
<link rel="stylesheet" href="/assets/css/ionicons.min.css">
<link rel="stylesheet" href="/assets/css/themify-icons.css">
<link rel="stylesheet" href="/assets/css/linearicons.css">
<link rel="stylesheet" href="/assets/css/flaticon.css">
<link rel="stylesheet" href="/assets/css/simple-line-icons.css">
<link rel="stylesheet" href="/assets/fontawesome/css/all.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="/assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="/assets/owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="/assets/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="/assets/css/magnific-popup.css">
<!-- jquery-ui CSS -->
<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<!-- Slick CSS -->
<link rel="stylesheet" href="/assets/css/slick.css">
<link rel="stylesheet" href="/assets/css/slick-theme.css">
<!-- Style CSS -->
<link rel="stylesheet" href="/assets/css/style.css?newcache01">
<link rel="stylesheet" href="/assets/css/responsive.css">
@yield('css')
</head>
<body>
<span class="baseurl" data-url="/{{ Config('app.locale') }}"></span>

@yield('content')
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<script src="/assets/js/jquery-1.12.4.min.js"></script> 
<!-- jquery-ui --> 
<script src="/assets/js/jquery-ui.js"></script>
<!-- popper min js -->
<script src="/assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="/assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="/assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="/assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="/assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="/assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="/assets/js/jquery.countdown.min.js"></script> 
<!-- imagesloaded js --> 
<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="/assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="/assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="/assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="/assets/js/jquery.elevatezoom.js"></script>
<!-- Google Map Js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7TypZFTl4Z3gVtikNOdGSfNTpnmq-ahQ&amp;callback=initMap"></script>
<!-- sweetalert js -->
<script src="/assets/js/sweetalert2.js"></script>
<!-- scripts js --> 
<script src="/assets/js/scripts.js?newcache01"></script>
@yield('js')
</body>
</html>