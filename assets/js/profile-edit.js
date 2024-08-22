$(document).ready(function () {
    function fetchProfileInfo() {
      $.ajax({
        url: "controllers/vivahController?action=get_profile_info",
        method: "GET",
        dataType: "json",
        success: function (response) {
          if (response.status === "success" && response.data.length > 0) {
            const data = response.data[0]; // Access the first item in the array
            
            // Populate the form fields with the fetched data
            $("#name").val(data.name || '');
            $("#email").val(data.email || '');
            $("#phone").val(data.phone || '');
            $("#gender").val(data.gender || ''); // Note: Gender field not present in the response
            $("#city").val(data.city || '');
            $("#dob").val(data.dob || '');
            $("#age").val(data.age || '');
            $("#height").val(data.height || '');
            $("#weight").val(data.weight || '');
            $("#degree").val(data.degree || '');
            $("#religion").val(data.religion || '');
            $("#profession").val(data.profession || '');
            $("#company").val(data.company || '');
            $("#position").val(data.position || '');
            $("#salary").val(data.salary || '');
            $("#marital_status").val(data.marital_status || '');
            $("#children").val(data.children || '');
            $("#address").val(data.address || '');
            $("#about").val(data.about || '');
            $("#facebook").val(data.facebook || '');
            $("#twitter").val(data.twitter || '');
            $("#whatsapp").val(data.whatsapp || '');
            $("#linkedin").val(data.linkedin || '');
            $("#youtube").val(data.youtube || '');
            $("#instagram").val(data.instagram || '');
            $("#job_type").val(data.job_type || '');
            $("#hobbies").val(data.hobbies || '');
          } else {
            console.log("No profile data found.");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error("AJAX Error:", textStatus, errorThrown);
          console.log("An error occurred while fetching profile information.");
        },
      });
    }
  
    fetchProfileInfo();
  
    $("#updateProfileForm").on("submit", function (e) {
        e.preventDefault();
    
        // Serialize the form data
        var formData = $(this).serialize();
        $.ajax({
            url: "controllers/vivahController",
            method: "POST",
            data: formData + "&action=update_profile", // Append action parameter
            dataType: "json",
            success: function (response) {
                console.log("Response status:", response.status);
                if (response.status === "success") {
                  window.location.href='user-profile';
                  console.log("Profile updated successfully.");
                } else {
                  console.log("Error: " + response.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
                console.log("An error occurred while updating profile.");
            },
        });
    });
    
  });
  