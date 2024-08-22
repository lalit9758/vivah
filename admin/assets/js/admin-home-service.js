$(document).ready(function() {
    $.ajax({
        url: 'controllers/adminController.php?action=fetch_services',
        method: 'GET',
        success: function(response) {
            var data = JSON.parse(response); // Parse JSON response
            if (data.status === 'success') {
                // Destroy any existing DataTable instance
                if ($.fn.DataTable.isDataTable('#serviceTable')) {
                    $('#serviceTable').DataTable().clear().destroy();
                }

                // Create an array to hold the table data
                var tableData = data.data.map(function(user, index) {
                    return [
                        index + 1,
                        `
                        <div class="prof-table-thum">
                          <div class="pro-info">
                            <h4>${user.title}</h4>
                          </div>
                        </div>
                        `,
                        user.description || 'Not specified',
                        user.created_at,
                        user.updated_at,
                        `
                        <div class="dropdown">
                          <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu">
                          <li><a class="dropdown-item delete-user" href="#" data-id="${user.id}">Delete</a></li>
                           <li><a class="dropdown-item edit-user" href="#" data-id="${user.id}" data-title="${user.title}" data-description="${user.description}" data-link="${user.link}" data-bs-toggle="modal" data-bs-target="#homservi">Edit</a></li>
                        </ul>
                        </div>
                        `
                    ];
                });

                // Reinitialize DataTables with the processed data
                $('#serviceTable').DataTable({
                    data: tableData,
                    columns: [
                        { title: "No" },
                        { title: "Title" },
                        { title: "Description" },
                        { title: "Created_at Time" },
                        { title: "Updated_at Time" },
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
    // Handle Edit button click
    $(document).ready(function() {
        // Fill the form with the data when the edit button is clicked
        $(document).on('click', '.edit-user', function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');
            var link = $(this).data('link');
    
            $('#service_id').val(id);
            $('#service_name').val(title);
            $('#sub_title').val(description);
            $('#link').val(link);
        });
    
        // Handle form submission for updating the service
        $('#submitBtn').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission
    
            var formData = new FormData($('#serviceForm')[0]);
            formData.append('action', 'update_service');
    
            $.ajax({
                url: 'controllers/adminController.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status === 'success') {
                        window.location.href="admin-home-services.php";
                        $('#serviceForm')[0].reset(); // Clear form fields
                        $('#homservi').modal('hide'); // Hide modal
                        // Optionally, refresh DataTable or other UI elements
                    } else {
                        alert('Failed to update service: ' + data.message);
                    }
                },
                error: function() {
                    alert('An error occurred while updating the service.');
                }
            });
        });
    });
    
});
