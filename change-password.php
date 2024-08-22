<!doctype html>
<html lang="en">
<head>
    <title>Wedding Matrimony</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="assets/images/fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                    <h1>Create New Password</h1>
                                    <p>Already a member? <a href="login">Login</a></p>
                                </div>
                                <div class="form-login">
                                    <form id="changePassword" class="needs-validation" novalidate method="POST">
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
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select-opt.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            function validateForm() {
                let isValid = true;
                $('.form-control').removeClass('is-invalid is-valid');
                $('.invalid-feedback').text('');

                const password = $('#pwd').val();
                const confirmPassword = $('#confirmPwd').val();
                const pwdPattern = /^(?=.*[A-Z])(?=.*\W).{6,}$/;

                if (!pwdPattern.test(password)) {
                    $('#pwd').addClass('is-invalid');
                    $('#pwd').next('.invalid-feedback').text('Password must be at least 6 characters long, with at least one uppercase letter and one special character.');
                    isValid = false;
                }

                if (password !== confirmPassword) {
                    $('#confirmPwd').addClass('is-invalid');
                    $('#confirmPwd').next('.invalid-feedback').text('Passwords must match.');
                    isValid = false;
                }

                return isValid;
            }

            $('#changePassword').on('submit', function(event) {
                event.preventDefault();

                $('.form-control').removeClass('is-invalid').removeClass('is-valid');
                $('.invalid-feedback').text('');

                if (validateForm()) {
                    const password = $('#pwd').val();

                    $.ajax({
                        url: 'controllers/vivahController',
                        method: 'POST',
                        contentType: 'application/json; charset=utf-8',
                        data: JSON.stringify({
                            action: 'change_password',
                            password: password
                        }),
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                console.log('Password changed successfully!');
                                // Optionally, redirect to login page
                                window.location.href = 'login';
                            } else {
                                console.log('Error: ' + response.message);
                                // Display error from server
                                $('#pwd').addClass('is-invalid');
                                $('#pwd').next('.invalid-feedback').text(response.message);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("Error: " + textStatus, errorThrown);
                            console.log('An error occurred while changing the password.');
                        }
                    });
                }
            });

            // Clear errors when input field is focused
            $('.form-control').on('focus', function() {
                $(this).removeClass('is-invalid').removeClass('is-valid');
                $(this).next('.invalid-feedback').text('');
            });
        });
    </script>
</body>
</html>
