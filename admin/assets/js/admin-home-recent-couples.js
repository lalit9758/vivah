$(document).ready(function () {
  $.ajax({
    url: "controllers/adminController.php?action=fetch_recent_couples",
    method: "GET",
    success: function (response) {
      var data = JSON.parse(response); // Parse JSON response
      if (data.status === "success") {
        // Destroy any existing DataTable instance
        if ($.fn.DataTable.isDataTable("#recentCouplesTable")) {
          $("#recentCouplesTable").DataTable().clear().destroy();
        }

        // Create an array to hold the table data
        var tableData = data.data.map(function (user, index) {
          return [
            index + 1,
            `
                        <div class="prof-table-thum">
                          <div class="pro">
                            <img src="${
                              user.image
                                ? `../assets/images/couples/${user.image}`
                                : "../assets/images/profiles/Default_profile.jpg"
                            }" alt="">
                          </div>
                          <div class="pro-info">
                            <h5><a href="index.php?#couples">${
                              user.name
                            }</a></h5>
                          </div>
                        </div>
                        `,
            user.location || "Not specified",
            user.link,
            `
                        <div class="dropdown">
                          <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu">
                          <li><a class="dropdown-item delete-user" href="#" data-id="${user.id}">Delete</a></li>
                             <li>
                                        <a
                                            class="dropdown-item edit-couple"
                                            href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target="#couplesedit"
                                            data-id="${user.id}"
                                            data-name="${user.name}"
                                            data-city="${user.location || 'Not specified'}"
                                            data-image="${user.image || ''}"
                                            data-link="${user.link}"
                                        >Edit</a>
                                    </li>
                         </ul>
                        </div>
                        `,
          ];
        });

        // Reinitialize DataTables with the processed data
        $("#recentCouplesTable").DataTable({
          data: tableData,
          columns: [
            { title: "No" },
            { title: "Couples name" },
            { title: "City" },
            { title: "Link" },
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
            data: JSON.stringify({ action: 'delete_recent_couple', id: userId}),
          contentType: 'application/json; charset=utf-8',
          dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    window.location.href='admin-home-recent-couples.php';
                    
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
$('#couplesForm').on('submit', function(event) {
  event.preventDefault(); // Prevent default form submission

  // Create a FormData object to hold the form data
  var formData = new FormData(this);

  // Append the action to the formData
  formData.append('action', 'add_couple');

  $.ajax({
      url: 'controllers/adminController.php', // Update with your actual controller URL
      type: 'POST',
      data: formData,
      contentType: false, // Prevent jQuery from overriding content type
      processData: false, // Prevent jQuery from processing the data
      dataType: 'json',
      success: function(response) {
          if (response.status === 'success') {
              window.location.href='admin-home-recent-couples.php';
              $('#couplesForm')[0].reset(); // Reset the form
          } else {
              alert('Error: ' + response.message);
          }
      },
      error: function(xhr, status, error) {
          alert('An error occurred. Please try again.');
      }
  });
});

// Handle Edit Button Click
$(document).on('click', '.edit-couple', function() {
  var id = $(this).data('id');
  var name = $(this).data('name');
  var city = $(this).data('city');
  var image = $(this).data('image'); // Assuming you need to display or handle image
  var link = $(this).data('link');

  // Set values in the modal
  $('#edit_couple_id').val(id);
  $('#edit_couples_name').val(name);
  $('#edit_couples_city').val(city);
  $('#edit_page_link').val(link);

  // Optional: Set image preview if needed
  if (image) {
      $('#edit_image_preview').html(`<img src="../assets/images/couples/${image}" alt="Couple Image" style="width:100px;">`);
  } else {
      $('#edit_image_preview').html('<p>No image available</p>');
  }
});

// Handle form submission for editing the couple
$('#editcouplesForm').on('submit', function(event) {
  event.preventDefault(); // Prevent default form submission

  var formData = new FormData(this);
  formData.append('action', 'update_couple'); // Add action parameter

  $.ajax({
      url: 'controllers/adminController.php', // Update with your actual controller URL
      type: 'POST',
      data: formData,
      contentType: false, // Prevent jQuery from overriding content type
      processData: false, // Prevent jQuery from processing the data
      dataType: 'json',
      success: function(response) {
          if (response.status === 'success') {
              window.location.href='admin-home-recent-couples.php';
              $('#editcouplesForm')[0].reset(); // Reset the form
              $('#couplesedit').modal('hide'); // Hide the modal
              location.reload(); // Refresh the page or DataTable
          } else {
              alert('Error: ' + response.message);
          }
      },
      error: function(xhr, status, error) {
          alert('An error occurred. Please try again.');
      }
  });
});

});
