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

    <!-- MENU POPUP -->
    <div class="menu-pop menu-pop1">
        <span class="menu-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
        <div class="inn">
            <img src="assets/images/logo.png" alt="" loading="lazy" class="logo-brand-only">
            <p><strong>Best Wedding Matrimony</strong> lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu
                fringilla.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <ul class="menu-pop-info">
                <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i>+92 (8800) 68 - 8960</a></li>
                <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i>+92 (8800) 68 - 8960</a></li>
                <li><a href="#!"><i class="fa fa-envelope-o" aria-hidden="true"></i>help@company.com</a></li>
                <li><a href="#!"><i class="fa fa-map-marker" aria-hidden="true"></i>3812 Lena Lane City Jackson
                        Mississippi</a></li>
            </ul>
            <div class="menu-pop-help">
                <h4>Support Team</h4>
                <div class="user-pro">
                    <img src="assets/images/profiles/1.jpg" alt="" loading="lazy">
                </div>
                <div class="user-bio">
                    <h5>Ashley emyy</h5>
                    <span>Senior personal advisor</span>
                    <a href="enquiry" class="btn btn-primary btn-sm">Ask your doubts</a>
                </div>
            </div>
            <div class="menu-pop-soci">
                <ul>
                    <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- CONTACT EXPERT -->
    <?php
    if (isset($_SESSION['email'])) {
    ?>
        <div class="menu-pop menu-pop2">
            <span class="menu-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
            <div class="db-nav-list">
                <ul>
                    <li>
                        <a href="user-profile">
                            <i class="fa fa-male" aria-hidden="true"></i>Profile
                        </a>
                    </li>
                    <li>
                        <a href="user-interests">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>Interests
                        </a>
                    </li>
                    <li>
                        <a href="user-chat">
                            <i class="fa fa-commenting-o" aria-hidden="true"></i>Chat list
                        </a>
                    </li>
                    <li>
                        <a href="logout">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>Log out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <?php
    }
    ?>

    <!-- END -->

    <!-- MAIN MENU -->
    <div class="hom-top">
        <div class="container">
            <div class="row">
                <div class="hom-nav">
                    <!-- LOGO -->
                    <div class="logo">
                        <span class="menu desk-menu">
                            <i></i><i></i><i></i>
                        </span>
                        <a href="index" class="logo-brand"><img src="assets/images/logo.png" alt="" loading="lazy" class="ic-logo"></a>
                    </div>

                    <!-- EXPLORE MENU -->
                    <?php
                    if (isset($_SESSION['email'])) {
                    ?>
                        <div class="bl">
                            <ul>
                                <li>
                                    <a href="index">Home</a>
                                </li>
                                <li>
                                    <a href="all-profiles">All profiles</a>
                                </li>
                                <li>
                                    <a href="services">All Services</a>
                                </li>
                                <li><a href="photo-gallery-1">photo-gallery</a></li>
                            </ul>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="bl">
                            <ul>
                                <li>
                                    <a href="index">Home</a>
                                </li>
                                <li>
                                    <a href="all-profiles">All profiles</a>
                                </li>
                                <li>
                                    <a href="services">All Services</a>
                                </li>
                                <li><a href="photo-gallery-1">photo-gallery</a></li>
                                <li><a href="sign-up">Register</a></li>
                                <li>
                                    <a href="login">Login</a>
                                </li>
                            </ul>
                        </div>
                    <?PHP
                    }
                    ?>


                    <!-- USER PROFILE -->

                    <?php
                    if (isset($_SESSION['email'])) {
                    ?>
                        <div class="al">
                            <div class="head-pro" id="profile-logo">

                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <!-- <div class="al">
                            <div class="head-pro">
                                <img src="assets/images/profiles/Default_profile.jpg" alt="" loading="lazy">
                                <b>Email</b><br>
                                <h4>User Name</h4>
                                <span class="fclick"></span>
                            </div>
                        </div> -->
                        
                    <?php
                    }
                    ?>

                    <!--MOBILE MENU-->
                    <div class="mob-menu">
                        <div class="mob-me-ic">
                            <!-- <span class="ser-open mobile-ser">
                                <img src="assets/images/icon/search.svg" alt="">
                            </span> -->
                            <!-- <span class="mobile-exprt" data-mob="dashbord">
                                <img src="assets/images/icon/users.svg" alt="">
                            </span> -->
                            <span class="mobile-menu" data-mob="mobile">
                                <img src="assets/images/icon/menu.svg" alt="">
                            </span>
                        </div>
                    </div>
                    <!--END MOBILE MENU-->
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- EXPLORE MENU POPUP -->
    <?php
    if (isset($_SESSION['email'])) {
    ?>
        <div class="mob-me-all mobile_menu">
            <div class="mob-me-clo"><img src="assets/images/icon/close.svg" alt=""></div>
            <div class="mv-bus">
                <h4><i class="fa fa-globe" aria-hidden="true"></i> EXPLORE CATEGORY</h4>
                <ul>
                    <li>
                        <a href="index">Home</a>
                    </li>
                    <li>
                        <a href="all-profiles">All profiles</a>
                    </li>
                    <li>
                        <a href="services">All Services</a>
                    </li>
                    <li><a href="photo-gallery-1">Photo Gallery</a></li>
                    <li><a href="user-profile">My Profile</a></li>
                    <li><a href="logout">Log Out</a></li>
                </ul>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="mob-me-all mobile_menu">
            <div class="mob-me-clo"><img src="assets/images/icon/close.svg" alt=""></div>
            <div class="mv-bus">
                <h4><i class="fa fa-globe" aria-hidden="true"></i> EXPLORE CATEGORY</h4>
                <ul>
                    <li>
                        <a href="index">Home</a>
                    </li>
                    <li>
                        <a href="all-profiles">All profiles</a>
                    </li>
                    <li>
                        <a href="services">All Services</a>
                    </li>
                    <li><a href="photo-gallery-1">Photo Gallery</a></li>
                    <li><a href="sign-up">Register</a></li>
                    <li>
                        <a href="login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    <?php
    }
    ?>


    <!-- END MOBILE MENU POPUP -->

    <!-- MOBILE USER PROFILE MENU POPUP -->
    <!-- <div class="mob-me-all dashbord_menu">
        <div class="mob-me-clo"><img src="assets/images/icon/close.svg" alt=""></div>
        <div class="mv-bus">
            <div class="head-pro">
                <img src="assets/images/profiles/1.jpg" alt="" loading="lazy">
                <b>user profile</b><br>
                <h4>Ashley emyy</h4>
            </div>
            <ul>
                <li><a href="login">Login</a></li>
                <li><a href="sign-up">Sign-up</a></li>
                <li><a href="plans">Pricing plans</a></li>
                <li><a href="all-profiles">Browse profiles</a></li>
            </ul>
        </div>
    </div> -->
    <!-- END USER PROFILE MENU POPUP -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select-opt.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/home.js"></script>
    <script src="assets/js/profile.js"></script>
</body>

</html>