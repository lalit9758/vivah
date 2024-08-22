<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Wedding Matrimony</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="assets/images/fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php include_once("includes/header.php"); ?>
    <?php include_once("includes/mainMenu.php"); ?>

    <!-- SUB-HEADING -->
    <section>
        <div class="all-pro-head">
            <div class="container">
                <div class="row">
                    <h1>Lakhs of Happy Marriages</h1>
                    <!-- <a href="sign-up.php">Join now for Free <i class="fa fa-handshake-o" aria-hidden="true"></i></a> -->
                </div>
            </div>
        </div>
        <div class="fil-mob fil-mob-act">
            <h4>Profile filters <i class="fa fa-filter" aria-hidden="true"></i> </h4>
        </div>
    </section>

    <!-- START -->
    <section>
        <div class="all-weddpro all-jobs all-serexp chosenini">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 fil-mob-view">
                        <span class="filter-clo">+</span>
                        <!-- START -->
                        <div class="filt-com lhs-cate">
                            <h4><i class="fa fa-search" aria-hidden="true"></i> I'm looking for</h4>
                            <div class="form-group">
                                <select id="gender-filter" class="chosen-select">
                                    <option value="">Gender</option>
                                    <option value="Men">Men</option>
                                    <option value="Women">Women</option>
                                </select>
                            </div>
                        </div>
                        <!-- END -->
                        <!-- START -->
                        <div class="filt-com lhs-cate">
                            <h4><i class="fa fa-clock-o" aria-hidden="true"></i>Age</h4>
                            <div class="form-group">
                                <select id="age-filter" class="chosen-select">
                                    <option value="">Select age</option>
                                    <option value="18-30">18 to 30</option>
                                    <option value="31-40">31 to 40</option>
                                    <option value="41-50">41 to 50</option>
                                    <option value="51-60">51 to 60</option>
                                    <option value="61-70">61 to 70</option>
                                    <option value="71-80">71 to 80</option>
                                    <option value="81-90">81 to 90</option>
                                    <option value="91-100">91 to 100</option>
                                </select>
                            </div>
                        </div>
                        <!-- END -->
                        <!-- START -->
                        <div class="filt-com lhs-cate">
                            <h4><i class="fa fa-bell-o" aria-hidden="true"></i>Select Religion</h4>
                            <div class="form-group">
                                <select id="religion-filter" class="chosen-select">
                                    <option value="">Religion</option>
                                    <option value="Any">Any</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Jain">Jain</option>
                                    <option value="Christian">Christian</option>
                                </select>
                            </div>
                        </div>
                        <!-- END -->
                        <!-- START -->
                        <div class="filt-com lhs-cate">
                            <h4><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h4>
                            <div class="form-group">
                                <select id="location-filter" class="chosen-select">
                                    <option value="">Location</option>
                                    <option value="Chennai">Chennai</option>
                                    <option value="Bangaluru">Bangaluru</option>
                                    <option value="Delhi">Delhi</option>
                                </select>
                            </div>
                        </div>
                        <!-- END -->
                        <!-- START -->
                        <!-- <div class="filt-com lhs-rati lhs-avail lhs-cate">
                            <h4><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Availablity</h4>
                            <ul>
                                <li>
                                    <div class="rbbox">
                                        <input type="radio" value="" name="availability" class="rating_check" id="exav1" checked>
                                        <label for="exav1">All</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="rbbox">
                                        <input type="radio" value="Available" name="availability" class="rating_check" id="exav2">
                                        <label for="exav2">Available</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="rbbox">
                                        <input type="radio" value="Offline" name="availability" class="rating_check" id="exav3">
                                        <label for="exav3">Offline</label>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                        <!-- END -->

                        <!-- START -->
                        <div class="filt-com filt-send-query">
                            <div class="send-query">
                                <h5>What are you looking for?</h5>
                                <p>We will help you to arrange the best match for you.</p>
                                <a href="#!" data-toggle="modal" data-target="#expfrm">Send your queries</a>
                            </div>
                        </div>
                        <!-- END -->
                    </div>
                    <div class="col-md-9">
                        <div class="short-all">
                            <div class="short-lhs">
                                Showing profiles
                            </div>
                            <div class="short-rhs">
                                <ul>
                                    <!-- <li>Sort by:</li>
                                    <li>
                                        <div class="form-group">
                                            <select class="chosen-select">
                                                <option value="">Most relevant</option>
                                                <option value="newest">Date listed: Newest</option>
                                                <option value="oldest">Date listed: Oldest</option>
                                            </select>
                                        </div>
                                    </li> -->
                                    <li>
                                        <div class="sort-grid sort-grid-1">
                                            <i class="fa fa-th-large" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sort-grid sort-grid-2 act">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="all-list-sh">
                            <ul>
                                <!-- Dynamic profiles will be injected here by JavaScript -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- INTEREST POPUP -->
    <div class="modal fade" id="sendInter">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title seninter-tit">Send interest to <span class="intename2">Jolia</span></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body seninter">
                    <div class="lhs">
                        <img src="assets/images/profiles/1.jpg" alt="" class="intephoto2">
                    </div>
                    <div class="rhs">
                        <h4>Permissions: <span class="intename2">Jolia</span> Can view the below details</h4>
                        <ul>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_about" checked>
                                    <label for="pro_about">About section</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_photo">
                                    <label for="pro_photo">Profile photo</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_photo">
                                    <label for="pro_photo">Contact details</label>
                                </div>
                            </li>
                        </ul>
                        <button class="btn btn-theme">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include_once("includes/footer.php"); ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select-opt.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/all-profiles.js"></script>
    <script src="assets/js/slick.js"></script>
</body>

</html>