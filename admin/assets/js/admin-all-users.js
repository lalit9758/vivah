$(document).ready(function() {
  // Fetch and populate the table
  $.ajax({
      url: 'controllers/adminController.php?action=fetch_all_profile',
      method: 'GET',
      success: function(response) {
          var data = JSON.parse(response); // Parse JSON response
          if (data.status === 'success') {
              // Destroy any existing DataTable instance
              if ($.fn.DataTable.isDataTable('#usersTable')) {
                  $('#usersTable').DataTable().clear().destroy();
              }

              // Create an array to hold the table data
              var tableData = data.data.map(function(user, index) {
                  return [
                      index + 1,
                      `
                      <div class="prof-table-thum">
                        <div class="pro">
                          <img src="${
                              user.profile_picture
                              ? `../assets/images/profiles/'${user.email}'/${user.profile_picture}`
                              : "../assets/images/profiles/Default_profile.jpg"
                            }" alt="">
                        </div>
                        <div class="pro-info">
                          <h5><a href="../profile-details.php?user_id=${user.id}">${user.name}</a></h5>
                          <p>${user.email}</p>
                        </div>
                      </div>
                      `,
                      user.gender || 'Not specified',
                      user.phone,
                      user.created_at,
                      user.updated_at,
                      `
                      <div class="dropdown">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                          <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item delete-user" href="#" data-id="${user.id}">Delete</a></li>
                          <li><a class="dropdown-item" href="../profile-details.php?user_id=${user.id}">View profile</a></li>
                        </ul>
                      </div>
                      `
                  ];
              });

              // Reinitialize DataTables with the processed data
              $('#usersTable').DataTable({
                  data: tableData,
                  columns: [
                      { title: "No" },
                      { title: "Profile" },
                      { title: "Gender" },
                      { title: "Phone Number" },
                      { title: "Created_at Time" },
                      { title: "Updated_at Time" },
                      { title: "More" }
                  ]
              });
               // Generate HTML for new registrants
               var newRegistrantsHtml = `
               <h2>All Registrants</h2>
               <span class="bnum">${data.data.length}</span>
               <div class="users-cir-thum-hori">
               ${data.data.map(user => `
                   <span>
                     <img src="${
                         user.profile_picture
                         ? `../assets/images/profiles/'${user.email}'/${user.profile_picture}`
                         : "../assets/images/profiles/Default_profile.jpg"
                       }" data-bs-toggle="tooltip" title="${user.name}">
                   </span>
               `).join('')}
               </div>
               `;

               // Update the new registrants section
               $('#alluser').html(newRegistrantsHtml);

               // Initialize tooltips if using Bootstrap
               $('[data-bs-toggle="tooltip"]').tooltip();
          } else {
              console.log('No data available.');
          }
      },
      error: function() {
          console.log('An error occurred while fetching user data.');
      }
  });

  // Handle the delete button click event
  $(document).on('click', '.delete-user', function(e) {
      e.preventDefault();
      var userId = $(this).data('id');
      console.log(userId);
      
      if (confirm('Are you sure you want to delete this user?')) {
          $.ajax({
              url: 'controllers/adminController.php',
              method: 'POST',
              data: JSON.stringify({ action: 'delete_users', id: userId}),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
              success: function(response) {
                  if (response.status === 'success') {
                      window.location.href='admin-all-users.php';
                      
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
});
