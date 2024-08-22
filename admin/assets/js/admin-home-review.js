$(document).ready(function() {
    $.ajax({
        url: 'controllers/adminController.php?action=fetch_review',
        method: 'GET',
        success: function(response) {
            var data = JSON.parse(response); // Parse JSON response
            if (data.status === 'success') {
                // Destroy any existing DataTable instance
                if ($.fn.DataTable.isDataTable('#reviewTable')) {
                    $('#reviewTable').DataTable().clear().destroy();
                }

                // Create an array to hold the table data
                var tableData = data.data.map(function(user, index) {
                    return [
                        index + 1,
                        `
                        <div class="prof-table-thum">
                          <div class="pro-info">
                            <h4>${user.name}</h4>
                          </div>
                        </div>
                        `,
                        user.location || 'Not specified',
                        user.review_text,
                        `
                        <div class="dropdown">
                          <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                          </button>
                         <ul class="dropdown-menu">
                         <li><a class="dropdown-item delete-user" href="#" data-id="${user.id}">Delete</a></li>
                          <li>
                              <a class="dropdown-item edit-review" href="#" 
                                 data-id="${user.id}" 
                                 data-name="${user.name}" 
                                 data-city="${user.location}" 
                                 data-image="${user.image_name}" 
                                 data-comments="${user.review_text}" 
                                 data-user_id="${user.user_id}"
                                 data-bs-toggle="modal" 
                                 data-bs-target="#homreviews">
                                 Edit
                              </a>
                          </li>

                        </ul>
                        </div>
                        `
                    ];
                });

                // Reinitialize DataTables with the processed data
                $('#reviewTable').DataTable({
                    data: tableData,
                    columns: [
                        { title: "No" },
                        { title: "Reviewer" },
                        { title: "City" },
                        { title: "	Review comments" },
                        { title: "More" }
                    ]
                });
            } else {
                console.log('No data available.');
            }
        },
        error: function() {
            console.log('An error occurred while fetching user data.');
        }
    });
    $(document).on('click', '.delete-user', function(e) {
        e.preventDefault();
        var userId = $(this).data('id');
        console.log(userId);
        
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: 'controllers/adminController.php',
                method: 'POST',
                data: JSON.stringify({ action: 'delete_reviews', id: userId}),
              contentType: 'application/json; charset=utf-8',
              dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        window.location.href='admin-home-reviews.php';
                        
                    } else {
                        alert('Failed to delete user.');
                    }
                },
                error: function() {
                    alert('An error occurred while deleting the user.');
                }
            });
        }
    });


    $('#reviewForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
    
        var formData = new FormData(this); // Create a FormData object from the form
        formData.append('action', 'add_review'); // Add the action parameter
    
        $.ajax({
            url: 'controllers/adminController.php', // Update with the actual path to your PHP script
            type: 'POST',
            data: formData,
            contentType: false, // Required for file uploads
            processData: false, // Prevent jQuery from processing the data
            success: function(response) {
                try {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.status == 'success') {
                        window.location.href='admin-home-reviews.php'; // Update with the actual path to your success page
                        $('#reviewForm')[0].reset(); // Optionally clear the form
                    } else {
                        alert('Failed to submit review: ' + jsonResponse.message);
                    }
                } catch (e) {
                    alert('Invalid response from server.');
                }
            },
            error: function() {
                alert('An error occurred while submitting the review.');
            }
        });
    });
    
   // Handle click event on the Edit button
   $(document).on('click', '.edit-review', function() {
    var id = $(this).data('id');
    var user_id = $(this).data('user_id');
    var name = $(this).data('name');
    var city = $(this).data('city');
    var comments = $(this).data('comments');

    // Set the values in the modal
    $('#edit_review_id').val(id);
    $('#edit_user_id').val(user_id);
    $('#edit_reviewer_name').val(name);
    $('#edit_reviewer_city').val(city);
    $('#edit_review_comments').val(comments);

    // Optionally set image preview if needed
    // If you need to show the image preview, you could add an <img> element in your modal and set its src attribute here
    // $('#edit_image_preview').attr('src', image);
});

// Handle form submission for editing the review
$('#editSubmitBtn').on('click', function(e) {
    e.preventDefault(); // Prevent the default form submission

    var formData = new FormData($('#editReviewForm')[0]); // Create FormData object from the form
    formData.append('action', 'update_review'); // Add action parameter

    $.ajax({
        url: 'controllers/adminController.php', // Update with the actual path to your PHP script
        type: 'POST',
        data: formData,
        contentType: false, // Required for file uploads
        processData: false, // Prevent jQuery from processing the data
        success: function(response) {
            try {
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.status === 'success') {
                    alert('Review updated successfully!');
                    $('#editReviewForm')[0].reset(); // Optionally clear the form
                    $('#homreviews').modal('hide'); // Hide the modal
                    location.reload(); // Refresh the page or DataTable
                } else {
                    alert('Failed to update review: ' + jsonResponse.message);
                }
            } catch (e) {
                alert('Invalid response from server.');
            }
        },
        error: function() {
            alert('An error occurred while updating the review.');
        }
    });
});
});
