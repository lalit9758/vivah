  // Define handleLogin outside of $(document).ready
  function handleLogin(event) {
    // Prevent default form submission
    event.preventDefault();

    var form = document.getElementById('loginForm');
    if (!form.checkValidity()) {
        // Add validation classes to show feedback
        form.classList.add('was-validated');
        return; // Stop if the form is invalid
    }

    var formData = {
        action: 'login',
        email: $('#email').val(),
        pswd: $('#pwd').val()
    };

    $.ajax({
        url: 'controllers/adminController.php',
        type: 'POST',
        data: JSON.stringify(formData),
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                window.location.href = "dashboard.php";
                $('#loginForm')[0].reset();
            } else {
                $('#login-error').text(response.message);
            }
        },
        error: function(xhr, status, error) {
            $('#login-error').text("An error occurred. Please try again.");
        }
    });
}

$(document).ready(function() {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('was-validated');
                } else {
                    handleLogin(event);
                }
            }, false);
        });
});

// Toggle between login and forgot password forms
$('.ll-1').on('click', function () {
    $('.log-1').slideDown();
    $('.log-2').slideUp();
});
$('.ll-2').on('click', function () {
    $('.log-2').slideDown();
    $('.log-1').slideUp();
});
