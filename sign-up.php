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
    <!-- REGISTER -->
    <section>
        <div class="login">
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Find your life partner</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="assets/images/login-couple.png" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <h1>Sign up to Matrimony</h1>
                                    <p>Already a member? <a href="login">Login</a></p>
                                </div>
                                <div class="form-login">
                                    <form id="signupForm" class="needs-validation" novalidate>
                                        <div class="form-group">
                                            <label class="lb">Name:</label>
                                            <input type="text" class="form-control" placeholder="Enter your full name" name="name" id="name" required>
                                            <div class="invalid-feedback">
                                                Name is required.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                                           
                                            <div class="invalid-feedback">
                                                Please provide a valid email address.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn-secondary btn1" id="sendOtp">Send OTP</button>
                                            <div id="otpMessage" class="message"></div> <!-- For OTP messages and status -->
                                            <div id="otpTimer" class="message"></div> <!-- For OTP timer -->
                                        </div>

                                        <div class="form-group">
                                            <label class="lb">OTP:</label>
                                            <input type="text" class="form-control" id="otp" placeholder="Enter OTP" name="otp" required>
                                            <div class="invalid-feedback">
                                                OTP is required.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Phone:</label>
                                            <input type="tel" class="form-control" id="phone" placeholder="Enter phone number" name="phone" pattern="[0-9]{10}" required>
                                            <div class="invalid-feedback">
                                                Phone number must be 10 digits.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Password:</label>
                                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                                            <div class="invalid-feedback">
                                                Password must be at least 6 characters long, with at least one uppercase letter and one special character.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Confirm Password:</label>
                                            <input type="password" class="form-control" id="confirmPwd" placeholder="Confirm password" name="confirmPswd" required>
                                            <div class="invalid-feedback">
                                                Passwords must match.
                                            </div>
                                        </div>
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="agree" id="agree" required>
                                            <label class="form-check-label" for="agree">
                                                Creating an account means you’re okay with our <a href="#!">Terms of Service</a>, Privacy Policy, and our default Notification Settings.
                                            </label>
                                            <div class="invalid-feedback">
                                                You must agree to the terms.
                                            </div>
                                        </div> -->
                                        <div id="emailMessage" class="message"></div>
                                        <div id="regMessage" class="message"></div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Create Account</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select-opt.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/sign-up.js"></script>
</body>

</html>