<!doctype html>
<html lang="en">

<head>
    <title>Wedding Matrimony</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="assets/images/fav.ico" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
      <![endif]-->
</head>

<body>
    <!-- PRELOADER -->
    <div id="preloader">
        <div class="plod">
            <span class="lod1"><img src="assets/images/loder/1.png" alt="" loading="lazy"></span>
            <span class="lod2"><img src="assets/images/loder/2.png" alt="" loading="lazy"></span>
            <span class="lod3"><img src="assets/images/loder/3.png" alt="" loading="lazy"></span>
        </div>
    </div>
    <?php
    if (isset($_SESSION['email'])) {
    ?>
        <div class="pop-bg"></div>
    <?php
    }
    ?>
    <!-- END PRELOADER -->
    <!-- POPUP SEARCH -->
    <div class="pop-search">
        <span class="ser-clo">+</span>
        <div class="inn">
            <form>
                <input type="text" placeholder="Search here...">
            </form>
            <div class="rel-sear">
                <h4>Top searches:</h4>
                <a href="all-profiles">Browse all profiles</a>
                <a href="all-profiles">Mens profile</a>
                <a href="all-profiles">Female profile</a>
                <a href="all-profiles">New profiles</a>
            </div>
        </div>
    </div>
    <!-- END -->
    <!-- TOP MENU -->
    <div class="head-top">
        <div class="container">
            <div class="row">
                <div class="lhs">
                    <ul>
                        <!-- <li><a href="#!" class="ser-open"><i class="fa fa-search" aria-hidden="true"></i></a></li> -->
                        <li><a href="about">About</a></li>
                        <li><a href="faq">FAQ</a></li>
                        <li><a href="contact">Contact</a></li>
                    </ul>
                </div>
                <div class="rhs">
                    <ul>
                        <li><a href="tel:+6398813601"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+01 5312
                                5312</a></li>
                        <li><a href="lalitrajput44818@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; help@company.com</a></li>
                        <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select-opt.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/home.js"></script>
</body>

</html>