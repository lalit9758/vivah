<?php
session_start();
?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
      <![endif]-->
</head>

<body>

    <?php
    include_once("includes/header.php");
    ?>

    <?php
    include_once('includes/mainMenu.php');
    ?>



    <!-- BANNER & SEARCH -->
    <section>
        <div class="str">
            <div class="hom-head">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <span><i class="no1">#1</i> Matrimony</span>
                                <h1>Find your<br><b>Right Match</b> here</h1>
                                <p>Most trusted Matrimony Brand in the World.</p>
                            </div>
                            <div class="ban-search chosenini">
                                <form id="searchForm">
                                    <ul>
                                        <li class="sr-look">
                                            <div class="form-group">
                                                <label>I'm looking for</label>
                                                <select id="gender-filter" class="chosen-select">
                                                    <option value="">Gender</option>
                                                    <option value="Men">Men</option>
                                                    <option value="Women">Women</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-age">
                                            <div class="form-group">
                                                <label>Age</label>
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
                                                    <!-- Add other age ranges -->
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-reli">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <select id="religion-filter" class="chosen-select">
                                                    <option value="">Religion</option>
                                                    <option value="Any">Any</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Muslim">Muslim</option>
                                                    <option value="Jain">Jain</option>
                                                    <option value="Christian">Christian</option>
                                                    <!-- Add other religions -->
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-cit">
                                            <div class="form-group">
                                                <label>City</label>
                                                <select id="location-filter" class="chosen-select">
                                                    <option value="">Location</option>
                                                    <option value="Any location">Any location</option>

                                                    <option value="Chennai">Chennai</option>
                                                    <option value="Bangaluru">Bangaluru</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <!-- Add other locations -->
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-btn">
                                            <input type="submit" value="Search">
                                        </li>
                                    </ul>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- BANNER SLIDER -->
    <section>
        <div class="hom-ban-sli">
            <div>
                <ul class="ban-sli">
                    <li>
                        <div class="image">
                            <img src="assets/images/ban-bg.jpg" alt="" loading="lazy">
                        </div>
                    </li>
                    <li>
                        <div class="image">
                            <img src="assets/images/banner.jpg" alt="" loading="lazy">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- QUICK ACCESS -->
    <section id="quick-access-section">
        <!-- Dynamic content will be injected here -->
    </section>

    <!-- END -->

    <?php
    include_once('includes/reviews.php');
    ?>

    <!-- BANNER -->
    <?php
    include_once('includes/banner.php');
    ?>
    <!-- END -->

    <!-- START -->
    <?php
    include_once('includes/start.php');
    ?>
    <!-- END -->

    <!-- ABOUT START -->

    <!-- END -->

    <!-- COUNTS START -->
    <?php
    include_once('includes/counts.php');
    ?>

    <!-- END -->

    <!-- MOMENTS START -->
    <section>
    <div class="wedd-tline">
        <div class="container">
            <div class="row">
                <div class="home-tit">
                    <p>Moments</p>
                    <h2><span>How it works</span></h2>
                    <span class="leaf1"></span>
                    <span class="tit-ani-"></span>
                </div>
                <div class="inn">
                    <ul>
                        <li>
                            <div class="tline-inn">
                                <div class="tline-im animate animate__animated animate__slower" data-ani="animate__fadeInUp">
                                    <img src="assets/images/icon/rings.png" alt="" loading="lazy">
                                </div>
                                <div class="tline-con animate animate__animated animate__slow" data-ani="animate__fadeInUp">
                                    <h5>Register</h5>
                                    <span>Timing: 7:00 PM</span>
                                    <p>Begin your journey by creating an account on our platform. Provide essential details to help us find the perfect match for you.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tline-inn tline-inn-reve">
                                <div class="tline-con animate animate__animated animate__slower" data-ani="animate__fadeInUp">
                                    <h5>Find your Match</h5>
                                    <span>Timing: 7:00 PM</span>
                                    <p>Browse through profiles that match your preferences. Use our advanced filters to narrow down your search for a compatible partner.</p>
                                </div>
                                <div class="tline-im animate animate__animated animate__slow" data-ani="animate__fadeInUp">
                                    <img src="assets/images/icon/wedding-2.png" alt="" loading="lazy">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tline-inn">
                                <div class="tline-im animate animate__animated animate__slower" data-ani="animate__fadeInUp">
                                    <img src="assets/images/icon/love-birds.png" alt="" loading="lazy">
                                </div>
                                <div class="tline-con animate animate__animated animate__slow" data-ani="animate__fadeInUp">
                                    <h5>Send Interest</h5>
                                    <span>Timing: 7:00 PM</span>
                                    <p>Express your interest by sending a request to the profiles you like. Let them know you're eager to connect and learn more about them.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tline-inn tline-inn-reve">
                                <div class="tline-con animate animate__animated animate__slower" data-ani="animate__fadeInUp">
                                    <h5>Get Profile Information</h5>
                                    <span>Timing: 7:00 PM</span>
                                    <p>Once your interest is accepted, access more detailed information about your potential match to facilitate meaningful conversations.</p>
                                </div>
                                <div class="tline-im animate animate__animated animate__slow" data-ani="animate__fadeInUp">
                                    <img src="assets/images/icon/network.png" alt="" loading="lazy">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tline-inn">
                                <div class="tline-im animate animate__animated animate__slower" data-ani="animate__fadeInUp">
                                    <img src="assets/images/icon/chat.png" alt="" loading="lazy">
                                </div>
                                <div class="tline-con animate animate__animated animate__slow" data-ani="animate__fadeInUp">
                                    <h5>Start Meetups</h5>
                                    <span>Timing: 7:00 PM</span>
                                    <p>Coordinate meetups to explore your connection further. Our platform provides secure and easy-to-use tools to plan your meetings.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tline-inn tline-inn-reve">
                                <div class="tline-con animate animate__animated animate__slower" data-ani="animate__fadeInUp">
                                    <h5>Getting Married</h5>
                                    <span>Timing: 7:00 PM</span>
                                    <p>When you’re ready, take the next big step towards a beautiful journey together. Our community is here to support your new chapter.</p>
                                </div>
                                <div class="tline-im animate animate__animated animate__slow" data-ani="animate__fadeInUp">
                                    <img src="assets/images/icon/wedding-couple.png" alt="" loading="lazy">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- END -->

    <!-- RECENT COUPLES -->
    <section>
        <div class="hom-couples-all">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>trusted brand</p>
                        <h2><span>Recent Couples</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                </div>
            </div>
            <div class="hom-coup-test">
                <ul class="couple-sli" id="couples-list">
                    <!-- Dynamic content will be injected here -->
                </ul>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- TEAM START -->
    <!-- <section>
        <div class="ab-team">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>OUR PROFESSIONALS</p>
                        <h2><span>Meet Our Team</span></h2>
                        <span class="leaf1"></span>
                    </div>
                    <ul>
                        <li>
                            <div>
                                <img src="assets/images/profiles/6.jpg" alt="" loading="lazy">
                                <h4>Ashley Jen</h4>
                                <p>Marketing Manager</p>
                                <ul class="social-light">
                                    <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div>
                                <img src="assets/images/profiles/7.jpg" alt="" loading="lazy">
                                <h4>Ashley Jen</h4>
                                <p>Marketing Manager</p>
                                <ul class="social-light">
                                    <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div>
                                <img src="assets/images/profiles/8.jpg" alt="" loading="lazy">
                                <h4>Emily Arrov</h4>
                                <p>Creative Manager</p>
                                <ul class="social-light">
                                    <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div>
                                <img src="assets/images/profiles/9.jpg" alt="" loading="lazy">
                                <h4>Julia sear</h4>
                                <p>Client Coordinator</p>
                                <ul class="social-light">
                                    <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section> -->
    <!-- END -->

    <?php
    include_once("includes/gallery.php");
    ?>

    <!-- BLOG TS START -->
    <!-- <section>
        <div class="hom-blog">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>Blog posts</p>
                        <h2><span>Blog & Articles</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="blog">
                        <ul>
                            <li>
                                <div class="blog-box">
                                    <img src="assets/images/blog/1.jpg" alt="" loading="lazy">
                                    <span>Wedding - Johnny</span>
                                    <h2>Wedding arrangements</h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content.</p>
                                    <a href="blog-details.php" class="cta-dark"><span>Read more</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="blog-box">
                                    <img src="assets/images/blog/2.jpg" alt="" loading="lazy">
                                    <span>Wedding - Johnny</span>
                                    <h2>Wedding arrangements</h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content.</p>
                                    <a href="blog-details.php" class="cta-dark"><span>Read more</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="blog-box">
                                    <img src="assets/images/blog/3.jpg" alt="" loading="lazy">
                                    <span>Wedding - Johnny</span>
                                    <h2>Invitation cards</h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content.</p>
                                    <a href="blog-details.php" class="cta-dark"><span>Read more</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- END -->

    <!-- FIND YOUR MATCH BANNER -->
    <?php
    if (!isset($_SESSION['email'])) {
    ?>
        <section>
            <div class="str count">
                <div class="container">
                    <div class="row">
                        <div class="fot-ban-inn">
                            <div class="lhs">
                                <h2>Find your perfect Match now</h2>
                                <p>lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.Lorem Ipsum is
                                    simply dummy text of the printing and typesetting industry.</p>
                                <a href="sign-up" class="cta-3">Register Now</a>
                                <a href="contact" class="cta-4">Help & Support</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>
    <!-- END -->

    <!-- FOOTER -->
    <?php
    include_once('includes/footer.php');
    ?>
    <!-- END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select-opt.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/home.js"></script>
    <script src="assets/js/slick.js"></script>

</body>

</html>