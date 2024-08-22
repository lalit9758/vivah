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
                                    <h1>Change Password</h1>
                                </div>
                                <div class="form-login">
                                    <form id="changePassword" class="needs-validation" novalidate method="POST">
                                        <div class="form-group">
                                            <label class="lb">Old Password:</label>
                                            <input type="password" class="form-control" id="oldPwd" placeholder="Enter old password" name="oldPswd" required>
                                            <div class="invalid-feedback">
                                              Please enter your old password.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">New Password:</label>
                                            <input type="password" class="form-control" id="newPwd" placeholder="Enter new password" name="newPswd" required>
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
                                        <div id="responseMessage"></div>
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
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');

                const oldPassword = $('#oldPwd').val();
                const newPassword = $('#newPwd').val();
                const confirmPassword = $('#confirmPwd').val();
                const pwdPattern = /^(?=.*[A-Z])(?=.*\W).{6,}$/;

                if (oldPassword === '') {
                    $('#oldPwd').addClass('is-invalid');
                    $('#oldPwd').next('.invalid-feedback').text('Please enter your old password.');
                    isValid = false;
                }

                if (!pwdPattern.test(newPassword)) {
                    $('#newPwd').addClass('is-invalid');
                    $('#newPwd').next('.invalid-feedback').text('Password must be at least 6 characters long, with at least one uppercase letter and one special character.');
                    isValid = false;
                }

                if (newPassword === oldPassword) {
                    $('#newPwd').addClass('is-invalid');
                    $('#newPwd').next('.invalid-feedback').text('New password must be different from the old password.');
                    isValid = false;
                }

                if (newPassword !== confirmPassword) {
                    $('#confirmPwd').addClass('is-invalid');
                    $('#confirmPwd').next('.invalid-feedback').text('Passwords must match.');
                    isValid = false;
                }

                return isValid;
            }

            // Clear error messages when text field is clicked
            $('.form-control').on('focus', function() {
                $(this).removeClass('is-invalid');
                $(this).next('.invalid-feedback').text('');
                $('#responseMessage').text(''); // Clear response message
            });

            $('#changePassword').on('submit', function(event) {
                event.preventDefault();

                if (validateForm()) {
                    const oldPassword = $('#oldPwd').val();
                    const newPassword = $('#newPwd').val();

                    $.ajax({
                        url: 'controllers/vivahController',
                        method: 'POST',
                        contentType: 'application/json; charset=utf-8',
                        data: JSON.stringify({
                            action: 'change_password_login',
                            oldPassword: oldPassword,
                            newPassword: newPassword
                        }),
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                $('#responseMessage').html('<div class="alert alert-success">Password changed successfully!</div>');
                                // Optionally, redirect to login page
                                setTimeout(function() {
                                    window.location.href = 'login';
                                }, 2000); // Redirect after 2 seconds
                            } else {
                                $('#responseMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            $('#responseMessage').html('<div class="alert alert-danger">An error occurred while changing the password. Please try again later.</div>');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
