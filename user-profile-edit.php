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
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
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

    <!-- REGISTER -->
    <section>
    <div class="login pro-edit-update">
        <div class="container">
            <div class="row">
                <div class="inn">
                    <div class="rhs">
                        <div class="form-login">
                            <form id="updateProfileForm">
                                <!-- PROFILE BIO -->
                                <div class="edit-pro-parti">
                                    <div class="form-tit">
                                        <h4>Basic info</h4>
                                        <h1>Edit my profile</h1>
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Phone:</label>
                                        <input type="number" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                                <!-- ADVANCED BIO -->
                                <div class="edit-pro-parti">
                                    <div class="form-tit">
                                        <h4>Advanced info</h4>
                                        <h1>Advanced bio</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Gender:</label>
                                            <input type="text" class="form-control" id="gender" name="gender">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">City:</label>
                                            <input type="text" class="form-control" id="city" name="city">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Date of birth:</label>
                                            <input type="date" class="form-control" id="dob" name="dob">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Age:</label>
                                            <input type="number" class="form-control" id="age" name="age">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Height:</label>
                                            <input type="text" class="form-control" id="height" name="height">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Weight:</label>
                                            <input type="text" class="form-control" id="weight" name="weight">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Degree:</label>
                                            <input type="text" class="form-control" id="degree" name="degree">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Religion:</label>
                                            <input type="text" class="form-control" id="religion" name="religion">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Profession:</label>
                                        <input type="text" class="form-control" id="profession" name="profession">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Company:</label>
                                        <input type="text" class="form-control" id="company" name="company">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Position:</label>
                                        <input type="text" class="form-control" id="position" name="position">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Salary:</label>
                                        <input type="text" class="form-control" id="salary" name="salary">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Marital Status:</label>
                                        <input type="text" class="form-control" id="marital_status" name="marital_status">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Children:</label>
                                        <input type="number" class="form-control" id="children" name="children">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Address:</label>
                                        <textarea class="form-control" id="address" name="address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">About:</label>
                                        <textarea class="form-control" id="about" name="about"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Facebook:</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Twitter:</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">WhatsApp:</label>
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">LinkedIn:</label>
                                        <input type="text" class="form-control" id="linkedin" name="linkedin">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">YouTube:</label>
                                        <input type="text" class="form-control" id="youtube" name="youtube">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Instagram:</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Job Type:</label>
                                        <input type="text" class="form-control" id="job_type" name="job_type">
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Hobbies:</label>
                                        <input type="text" class="form-control" id="hobbies" name="hobbies">
                                    </div>
                                </div>
                                <!-- END ADVANCED BIO -->
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>
                        </div>
                    </div>
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
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/profile-edit.js"></script>
    <script src="assets/js/slick.js"></script>
</body>

</html>
