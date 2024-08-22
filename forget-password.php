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
    <style>
        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group .form-control {
            flex: 1;
            margin-right: 0.5rem;
        }

        .input-group .btn {
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
        }

        .form-control {
            width: 100%;
        }

        .hidden {
            display: none !important;
        }

        #otpTimer {
            font-size: 0.875rem;
            color: green;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>

    <!-- LOGIN -->
    <section>
        <div class="login">
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Find <br> your life partner</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="assets/images/login-couple.png" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <h1>Forget Password</h1>
                                    <p>Not a member? <a href="sign-up">Sign up now</a></p>
                                </div>
                                <div class="form-login">
                                    <form class="row g-3 needs-validation" id="loginForm" novalidate>
                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Email:</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid email address.
                                                </div>
                                                <button type="button" class="btn btn-secondary" id="sendOtp">Send OTP</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 hidden" id="otpSection">
                                            <label for="otp" class="form-label">OTP:</label>
                                            <input type="text" class="form-control" id="otp" placeholder="Enter OTP" required>
                                            <div class="invalid-feedback">
                                                OTP is required.
                                            </div>
                                        </div>
                                        <div class="col-12 hidden" id="otpTimer"></div>
                                        <div class="col-12 hidden" id="otpMessage"></div>
                                        <div class="col-12 hidden" id="submitButton">
                                            <div id="login-error" class="text-danger"></div>
                                  
                                            <button class="btn btn-primary" type="submit">Submit</button>
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
    <script src="assets/js/gallery.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/forget_password.js"></script>
</body>

</html>
