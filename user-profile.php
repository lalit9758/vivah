<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page
    header('Location: login');
    exit(); // Ensure that the rest of the script does not execute after redirection
}
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
    <!-- LOGIN -->
    <section>
        <div class="db">
            <div class="container">
                <div class="row">
                    <?php
                    include_once("includes/profile-sidebar.php");
                    ?>
                    <div class="col-md-7 col-lg-8">
                        <div class="col-md-12 col-lg-12 col-xl-12 db-sec-com">
                            <div class="foll-set-tit fol-pro-abo-ico">
                                <h2>Profile</h2><a href="user-profile-edit" class="sett-edit-btn sett-acc-edit-eve"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                            </div>

                        </div>

                        <?php
                        include_once("includes/profile-info.php");
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    <?php
    include_once("includes/footer.php");
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select-opt.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>