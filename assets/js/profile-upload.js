$(document).ready(function() {
    // Trigger file input click when edit button is clicked
    $(document).on('click', '.upload_photo', function(event) {
        event.preventDefault();
        $('#fileUpload').click();
    });

    // Handle file selection and upload
    $('#fileUpload').on('change', function() {
        var formData = new FormData();
        var file = $(this)[0].files[0];

        if (file) {
            formData.append('file', file);
            formData.append('action', 'upload_profile_image');

            $.ajax({
                url: 'controllers/vivahController',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log('Upload response:', response); // Debugging
                    response = JSON.parse(response);
                    if (response.status === 'success') {
                        window.location.href="user-profile";
                        // Update profile image src
                        $('#profile img').attr('src', 'assets/images/profiles/' + response.imagePath);
                    } else {
                        console.log('Image upload failed: ' + response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('An error occurred while uploading the image.');
                    console.log(textStatus, errorThrown);
                }
            });
        }
    });

    // Fetch profile image initially
    function fetchProfileImage() {
        $.ajax({
            url: 'controllers/vivahController',
            type: 'POST',
            data: { action: 'fetch_profile_upload' },
            dataType: 'json',
            success: function(response) {
                console.log('Fetch response:', response); // Debugging
                if (response.status === 'success') {
                    let imagePath = response.imagePath;
                    let email = response.email;
                    $('#profile').html(`
                        <div class="img">
                            <img src="${
                                imagePath 
                        ? `assets/images/profiles/${email}/${imagePath }`
                        : "assets/images/profiles/Default_profile.jpg"
                    }" loading="lazy" alt="" class="pt-2">
                        </div>
                    `);
                } else {
                    console.log('<p>No data available</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching profile: " + status + " " + error);
                console.log("An error occurred while fetching profile data. See console for details.");
            }
        });
    }

    // Call fetchProfileImage on document ready
    fetchProfileImage();

    $('#deleteAccountLink').on('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
    
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone. Do you really want to delete your account?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'controllers/vivahController', // Update with your actual PHP file
                    method: 'POST',
                    contentType: 'application/json; charset=utf-8',
                    data: JSON.stringify({
                        action: 'delete_account'
                    }),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire(
                                'Deleted!',
                                'Your account has been deleted.',
                                'success'
                            ).then(() => {
                                window.location.href = 'login'; // Redirect after deletion
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'Error: ' + response.message,
                                'error'
                            );
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error: " + textStatus, errorThrown);
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the account.',
                            'error'
                        );
                    }
                });
            }
        });
    });
    
});
