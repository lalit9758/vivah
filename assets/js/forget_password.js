$(document).ready(function () {
    'use strict';

    // Form validation
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('was-validated');
                } else {
                    forgetPassword(event); // Call the forgetPassword function
                }
            }, false);
        });

    $('#email').on('input', function() {
        if ($(this).hasClass('is-invalid')) {
            $(this).removeClass('is-invalid');
        }
    });

    $('#sendOtp').click(function () {
        var email = $('#email').val();
        if (!email) {
            $('#email').addClass('is-invalid');
            $('#email').next('.invalid-feedback').text('Please enter your email address first.');
            return;
        }

        $.ajax({
            url: 'controllers/vivahController',
            type: 'POST',
            data: JSON.stringify({ action: 'send_otp_forget', email: email }),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    console.log("OTP sent successfully:", response.message);
                    $('#sendOtp').addClass('hidden');
                    $('#otpSection').removeClass('hidden');
                    $('#submitButton').removeClass('hidden');
                    $('#otpMessage').removeClass('hidden').removeClass('error').addClass('success').text('OTP sent! Valid for 5 minutes.');
                    $('#otpTimer').removeClass('hidden'); // Show the OTP timer
                    startOtpTimer();
                } else {
                    $('#otpMessage').removeClass('hidden').removeClass('success').addClass('error').text(response.message);
                    console.log("Error sending OTP:", response.message);
                }
            },
            error: function(xhr, status, error) {
                $('#otpMessage').removeClass('hidden').removeClass('success').addClass('error').text('Error during OTP request.');
                console.error("Error during OTP request:", status, error);
            }
        });
    });

    var otpExpiryTime = 5 * 60 * 1000; // 5 minutes in milliseconds
    var timerInterval;

    function startOtpTimer() {
        var endTime = Date.now() + otpExpiryTime;

        timerInterval = setInterval(function() {
            var remainingTime = endTime - Date.now();
            if (remainingTime <= 0) {
                clearInterval(timerInterval);
                $('#otpTimer').text('OTP expired').removeClass('success').addClass('error');
                // $('#sendOtp').removeClass('hidden').prop('disabled', false); 
            } else {
                var minutes = Math.floor(remainingTime / 60000);
                var seconds = Math.floor((remainingTime % 60000) / 1000);
                $('#otpTimer').text('Time left: ' + minutes + 'm ' + seconds + 's').removeClass('error').addClass('success');
            }
        }, 1000);
    }

    function forgetPassword(event) {
        event.preventDefault();
        var formData = {
            action: 'forget_password_otp_check',
            email: $('#email').val(),
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
                    console.log("OTP validation successful:", response.message);
                    $('#otpMessage').removeClass('error').addClass('success').text('OTP validated successfully. Redirecting...');
                    setTimeout(function() {
                        window.location.href = "change-password"; // Redirect to a new page or perform another action
                    }, 2000); // Redirect after 2 seconds
                } else {
                    $('#otpMessage').removeClass('success').addClass('error').text(response.message);
                    console.log("Error validating OTP:", response.message);
                }
            },
            error: function(xhr, status, error) {
                $('#otpMessage').removeClass('success').addClass('error').text('Error during OTP validation: ' + status + ' ' + error);
                console.error("Error during OTP validation:", status, error);
            }
        });
    }
});
