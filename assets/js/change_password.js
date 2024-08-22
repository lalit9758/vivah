// $(document).ready(function() {
//     // Function to validate the form before submission
//     function validateForm() {
//         let isValid = true;

//         // Reset validation states
//         $('.form-control').removeClass('is-invalid is-valid');
//         $('.invalid-feedback').text('');

//         // Validate password
//         const password = $('#pwd').val();
//         const pwdPattern = /^(?=.*[A-Z])(?=.*\W).{6,}$/;
//         if (!pwdPattern.test(password)) {
//             $('#pwd').addClass('is-invalid');
//             $('#pwd').next('.invalid-feedback').text('Password must be at least 6 characters long, with at least one uppercase letter and one special character.');
//             isValid = false;
//         }

//         // Validate confirm password
//         const confirmPassword = $('#confirmPwd').val();
//         if (password !== confirmPassword) {
//             $('#confirmPwd').addClass('is-invalid');
//             $('#confirmPwd').next('.invalid-feedback').text('Passwords must match.');
//             isValid = false;
//         }

//         return isValid;
//     }

//     // Function for real-time validation
//     function setupRealTimeValidation() {
//         $('.form-control').on('input', function() {
//             if (this.checkValidity()) {
//                 $(this).removeClass('is-invalid').addClass('is-valid');
//             } else {
//                 $(this).removeClass('is-valid').addClass('is-invalid');
//             }
//         });

//         $('#pwd, #confirmPwd').on('input', function() {
//             if ($('#pwd').val() === $('#confirmPwd').val()) {
//                 $('#confirmPwd').removeClass('is-invalid').addClass('is-valid');
//             } else {
//                 $('#confirmPwd').removeClass('is-valid').addClass('is-invalid');
//             }
//         });
//     }

//     // Setup real-time validation
//     setupRealTimeValidation();

//     // Form submission with AJAX
//     $('#changePassword').on('submit', function(event) {
//         event.preventDefault(); // Prevent the default form submission

//         // Validate the form
//         if (validateForm()) {
//             // Prepare the data for the AJAX request
//             const password = $('#pwd').val();

//             $.ajax({
//                 url: 'controllers/vivahController.php', // Update this URL with the correct endpoint
//                 method: 'POST',
//                 contentType: 'application/json; charset=utf-8',
//                 data: {
//                     action: 'change_password',
//                     password: password
//                 },
//                 dataType: 'json',
//                 success: function(response) {
//                     console.log(response.status);
//                     if (response.status === 'success') {
//                         alert('Password changed successfully!');
//                         // window.location.href = 'login.php';
//                     } else {
//                         alert('Error: ' + response.message);
//                     }
//                 },
//                 error: function(jqXHR, textStatus, errorThrown) {
//                     console.error("Error: " + textStatus, errorThrown);
//                     alert('An error occurred while changing the password.');
//                 }
//             });
//         }
//     });
// });
