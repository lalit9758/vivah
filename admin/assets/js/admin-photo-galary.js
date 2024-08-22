$(document).ready(function () {
    $.ajax({
      url: "controllers/adminController.php?action=fetch_photo_galary",
      method: "GET",
      success: function (response) {
        var data = JSON.parse(response); // Parse JSON response
        if (data.status === "success") {
          // Destroy any existing DataTable instance
          if ($.fn.DataTable.isDataTable("#geleryPhotoTable")) {
            $("#geleryPhotoTable").DataTable().clear().destroy();
          }
  
          // Create an array to hold the table data
          var tableData = data.data.map(function (user, index) {
            return [
              index + 1,
              `
                <div class="prof-table-thum">
                  <div class="pro">
                    <img src="${
                      user.image_name
                        ? `../assets/images/gallery/${user.image_name}`
                        : "../assets/images/profiles/Default_profile.jpg"
                    }" alt="">
                  </div>
                </div>
              `,
              user.category,
              user.description || "Not specified",
              `
                 <div class="dropdown">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item delete-user" href="#" data-id="${user.id}">Delete</a></li>
                         <li>
                                        <a class="dropdown-item edit-photo"
                                           href="#"
                                           data-bs-toggle="modal"
                                           data-bs-target="#editmember"
                                           data-id="${user.id}"
                                           data-category="${user.category}"
                                           data-description="${user.description || ''}"
                                           data-image="${user.image_name || ''}">
                                           Edit
                                        </a>
                                    </li>
                    </ul>
                </div>
              `,
            ];
          });
  
          // Reinitialize DataTables with the processed data
          $("#geleryPhotoTable").DataTable({
            data: tableData,
            columns: [
              { title: "No" },
              { title: "Photo" },
              { title: "Tag line 1" },
              { title: "Tag line 2" },
              { title: "More" },
            ],
          });
        } else {
          console.log("No data available.");
        }
      },
      error: function () {
        console.log("An error occurred while fetching user data.");
      },
    });
    $(document).on('click', '.delete-user', function(e) {
      e.preventDefault();
      var userId = $(this).data('id');
      console.log(userId);
      
      if (confirm('Are you sure you want to delete this user?')) {
          $.ajax({
              url: 'controllers/adminController.php',
              method: 'POST',
              data: JSON.stringify({ action: 'delete_gallery_photo', id: userId}),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
              success: function(response) {
                  if (response.status === 'success') {
                      window.location.href='admin-photo-gallery.php';
                      
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

  $('#galleryForm').on('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this); // Create a new FormData object
    formData.append('action', 'add_gallery_photo');

    $.ajax({
        url: 'controllers/adminController.php', // The URL to your backend script
        type: 'POST',
        data: formData,
        contentType: false, // Do not set content-type header
        processData: false, // Do not process the data
        success: function(response) {
          var jsonResponse = JSON.parse(response)
            if (jsonResponse.status === 'success') {
                window.location.href='admin-photo-gallery.php';
                $('#galleryForm')[0].reset();
            } else {
                alert('Failed to submit form: ' + jsonResponse.message);
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
});

// Handle Edit Button Click
$(document).on('click', '.edit-photo', function() {
  var id = $(this).data('id');
  var category = $(this).data('category');
  var description = $(this).data('description');
  var image = $(this).data('image'); // Assuming you need to display or handle image

  // Set the values in the modal
  $('#edit_photo_id').val(id);
  $('#edit_category').val(category);
  $('#edit_description').val(description);

  // Optionally set image preview if needed
  if (image) {
      $('#edit_image_preview').html(`<img src="../assets/images/gallery/${image}" alt="Gallery Image" style="width:100px;">`);
  } else {
      $('#edit_image_preview').html('<p>No image available</p>');
  }
});

// Handle form submission for editing the gallery photo
$('#editgalleryForm').on('submit', function(event) {
  event.preventDefault(); // Prevent default form submission

  var formData = new FormData(this);
  formData.append('action', 'update_gallery_photo'); // Add action parameter

  $.ajax({
      url: 'controllers/adminController.php', // Update with your actual controller URL
      type: 'POST',
      data: formData,
      contentType: false, // Prevent jQuery from overriding content type
      processData: false, // Prevent jQuery from processing the data
      success: function(response) {
        var data = JSON.parse(response);
          if (data.status === 'success') {
              window.location.href='admin-photo-gallery.php';
              $('#editgalleryForm')[0].reset(); // Reset the form
          } else {
              alert('Failed to update photo: ' + data.message);
          }
      },
      error: function(xhr, status, error) {
          alert('An error occurred: ' + error);
      }
  });
});

  });
  