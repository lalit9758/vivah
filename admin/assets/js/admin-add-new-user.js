$(document).ready(function () {
    function validateField(field, condition, message) {
        var $field = $(field);
        if (condition) {
            $field.removeClass('is-invalid').addClass('is-valid');
            $field.siblings('.invalid-feedback').text(''); // Clear error message
        } else {
            $field.removeClass('is-valid').addClass('is-invalid');
            $field.siblings('.invalid-feedback').text(message); // Set error message
        }
    }

    function showFeedback(message, type) {
        var $feedback = $('#formFeedback');
        $feedback.text(message).removeClass('alert-success alert-danger').addClass('alert-' + type).show();
    }

    $("#adminUpdateProfileForm").on("submit", function (e) {
        e.preventDefault();

        // Collect form data
        var formData = {
            name: $("#name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            password: $("#password").val(),
            action: 'add_new_user'
        };

        console.log(formData);

        // Client-side validation
        var isValid = true;

        // Validate name
        validateField("#name", !!formData.name, 'Please enter a valid name.');
        if (!formData.name) {
            isValid = false;
        }

        // Validate email
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        validateField("#email", emailPattern.test(formData.email), 'Please enter a valid email address.');
        if (!emailPattern.test(formData.email)) {
            isValid = false;
        }

        // Validate phone (10 digits)
        var phonePattern = /^\d{10}$/;
        validateField("#phone", phonePattern.test(formData.phone), 'Please enter a valid phone number (10 digits).');
        if (!phonePattern.test(formData.phone)) {
            isValid = false;
        }

        // Validate password
        var passwordPattern = /^(?=.*[A-Z])(?=.*\W).{6,}$/;
        validateField("#password", passwordPattern.test(formData.password), 'Password must be at least 6 characters long and include at least one uppercase letter and one special character.');
        if (!passwordPattern.test(formData.password)) {
            isValid = false;
        }

        if (!isValid) {
            showFeedback('Please correct the errors in the form.', 'danger');
            return; // Stop form submission if validation fails
        }

        // AJAX submission
        $.ajax({
            url: "controllers/adminController.php",
            method: "POST",
            data: JSON.stringify(formData),
            contentType: 'application/json; charset=utf-8',
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    showFeedback('User added successfully.', 'success');
                    window.location.href = 'admin-all-users.php';
                } else {
                    showFeedback("Error: " + response.message, 'danger');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
                showFeedback("An error occurred while updating the profile.", 'danger');
            }
        });
    });

    // Clear all error messages when clicking on any input field
    $("#adminUpdateProfileForm input, #adminUpdateProfileForm textarea").on("focus", function () {
        $(".is-invalid").removeClass("is-invalid");
        $('#formFeedback').hide(); // Hide feedback message on input focus
    });
});
