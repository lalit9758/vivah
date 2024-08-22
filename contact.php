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
    include_once("includes/mainMenu.php");
    ?>
    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ab-ban pg-cont">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <span>We are here to assist you.</span>
                                <h1>Contact us</h1>
                                <p>Most Trusted and premium Matrimony Service in the World.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="ab-sec2 pg-cont">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="we-here">
                                <h3>Our office</h3>
                                <p>Most Trusted and premium Matrimony Service in the World.</p>
                                <span><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+916398813601">+92 (8800) 68 - 8960</a></span>
                                <span><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:lalitrajput44818@gmail.com"> help@company.com </a></span>
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> it park dehradun</span>
                            </div>
                        </li>
                        <li>
                            <div class="we-cont">
                                <img src="assets/images/icon/trust.png" alt="">
                                <h4>Customer Relations</h4>
                                <p>Most Trusted and premium Matrimony Service in the World.</p>
                                <a href="mailto:lalitrajput44818@gmail.com" class="cta-rou-line">Get Support</a>
                            </div>
                        </li>
                        <li>
                            <div class="we-cont">
                                <img src="assets/images/icon/telephone.png" alt="">
                                <h4>WhatsApp Support</h4>
                                <p>Most Trusted and premium Matrimony Service in the World.</p>
                                <a href="tel:+6398813601" class="cta-rou-line"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Talk to sales</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- REGISTER -->
    <!-- <section>
        <div class="login pg-cont">
            <div class="container">
                <div class="row">

                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Contact to us</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="assets/images/login-couple.png" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <h4>Let's talk</h4>
                                    <h1>Send your enquiry now </h1>
                                </div>
                                <div class="form-login">
                                    <form class="cform fvali" method="post" action="https://rn53themes.net/themes/matrimo/mail/mail-contact.php">
                                        <div class="alert alert-success cmessage" style="display: none" role="alert">
                                            Your message was sent successfully.
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Name:</label>
                                            <input type="text" id="name" class="form-control" placeholder="Enter your full name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Phone:</label>
                                            <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Message:</label>
                                            <textarea name="message" class="form-control" id="message" placeholder="Enter message" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send Enquiry</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> -->
    <!-- END -->

    <?php
    include_once("includes/footer.php");
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/mail.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/slick.js"></script>
</body>

</html>