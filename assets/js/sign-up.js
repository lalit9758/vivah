$(document).ready(function() {
    var otpExpiryTime = 5 * 60 * 1000; // 5 minutes in milliseconds
    var timerInterval;

    $('#signupForm').submit(function(event) {
        event.preventDefault();

        if (!validateForm()) {
            return;
        }

        var formData = {
            action: 'register',
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            pswd: $('#pwd').val(),
            otp: $('#otp').val()
        };

        $.ajax({
            url: 'controllers/vivahController',
            type: 'POST',
            data: JSON.stringify(formData),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    console.log("Registration successful:", response.message);
                    $('#regMessage').removeClass('error').addClass('success').text('Registration successful. Redirecting...');
                    $('#signupForm')[0].reset();
                    setTimeout(function() {
                        window.location.href = "login";
                    }, 2000); // Redirect after 2 seconds
                } else {
                    $('#emailMessage').removeClass('success').addClass('error').text(response.message);
                    console.log("Registration error:", response.message);
                }
            },
            error: function(xhr, status, error) {
                $('#otpMessage').removeClass('success').addClass('error').text('Error during registration: ' + status + ' ' + error);
                console.error("Error during registration:", status, error);
            }
        });
    });

    $('#sendOtp').click(function() {
        var email = $('#email').val();
        if (!email) {
            $('#email').addClass('is-invalid');
            $('#email').next('.invalid-feedback').text('Please enter your email address first.');
            return;
        }

        $.ajax({
            url: 'controllers/vivahController',
            type: 'POST',
            data: JSON.stringify({ action: 'send_otp', email: email }),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    console.log("OTP sent successfully:", response.message);
                    $('#otpMessage').removeClass('error').addClass('success').text('OTP sent! Valid for 5 minutes.');
                    $('#otpTimer').show(); // Show the OTP timer
                    startOtpTimer();
                } else {
                    $('#otpMessage').removeClass('success').addClass('error').text('Error sending OTP: ' + response.message);
                    console.log("Error sending OTP:", response.message);
                }
            },
            error: function(xhr, status, error) {
                $('#otpMessage').removeClass('success').addClass('error').text('Error during OTP request.');
                console.error("Error during OTP request:", status, error);
            }
        });
    });

    function startOtpTimer() {
        var endTime = Date.now() + otpExpiryTime;
        $('#sendOtp').prop('disabled', true); // Disable the send OTP button

        timerInterval = setInterval(function() {
            var remainingTime = endTime - Date.now();
            if (remainingTime <= 0) {
                clearInterval(timerInterval);
                $('#otpTimer').text('OTP expired').removeClass('success').addClass('error');
                $('#sendOtp').prop('disabled', false); // Re-enable the send OTP button
            } else {
                var minutes = Math.floor(remainingTime / 60000);
                var seconds = Math.floor((remainingTime % 60000) / 1000);
                $('#otpTimer').text('Time left: ' + minutes + 'm ' + seconds + 's').removeClass('error').addClass('success');
            }
        }, 1000);
    }

    function validateForm() {
        let isValid = true;

        $('.form-control').removeClass('is-invalid is-valid');
        $('.invalid-feedback').text('');

        const name = $('#name').val();
        if (name === '') {
            $('#name').addClass('is-invalid');
            $('#name').next('.invalid-feedback').text('Name is required.');
            isValid = false;
        }

        const email = $('#email').val();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            $('#email').addClass('is-invalid');
            $('#email').next('.invalid-feedback').text('Email is required.');
            isValid = false;
        } else if (!emailPattern.test(email)) {
            $('#email').addClass('is-invalid');
            $('#email').next('.invalid-feedback').text('Please enter a valid email address.');
            isValid = false;
        }

        const otp = $('#otp').val();
        if (otp === '') {
            $('#otp').addClass('is-invalid');
            $('#otp').next('.invalid-feedback').text('OTP is required.');
            isValid = false;
        }

        const phone = $('#phone').val();
        const phonePattern = /^[0-9]{10}$/;
        if (!phonePattern.test(phone)) {
            $('#phone').addClass('is-invalid');
            $('#phone').next('.invalid-feedback').text('Phone number must be 10 digits.');
            isValid = false;
        }

        const password = $('#pwd').val();
        const pwdPattern = /^(?=.*[A-Z])(?=.*\W).{6,}$/;
        if (!pwdPattern.test(password)) {
            $('#pwd').addClass('is-invalid');
            $('#pwd').next('.invalid-feedback').text('Password must be at least 6 characters long, with at least one uppercase letter and one special character.');
            isValid = false;
        }

        const confirmPassword = $('#confirmPwd').val();
        if (password !== confirmPassword) {
            $('#confirmPwd').addClass('is-invalid');
            $('#confirmPwd').next('.invalid-feedback').text('Passwords must match.');
            isValid = false;
        }
        return isValid;
    }

    // Clear error message when the user starts typing
    $('.form-control').on('focus', function() {
        $(this).removeClass('is-invalid');
        $(this).next('.invalid-feedback').text('');
    });
});
