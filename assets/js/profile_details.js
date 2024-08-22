$(document).ready(function () {
  function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
  }

  const user_id = getQueryParam("user_id");
  const sender_id = "<?php echo $_SESSION['user_id']; ?>"; // Fetch sender ID from PHP session

  if (user_id) {
    $.ajax({
      url: "controllers/vivahController",
      method: "GET",
      data: {
        action: "get_profile_details",
        user_id: user_id,
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "error") {
          $("#profile-details").html("<p>" + response.message + "</p>");
        } else {
          var user = response.data[0];
          var profilelscContent = `
            <div class="pg-pro-big-im">
              <div class="s1">
                <img src="${user.profile_picture
                  ? `assets/images/profiles/${user.email}/${user.profile_picture}`
                  : "assets/images/profiles/Default_profile.jpg"}" class="pro" alt="">
              </div>
              <div class="s3">
                <a href="#!" class="cta fol cta-chat" data-user-id="${user.id}">Chat now</a>
                <span class="cta cta-sendint" data-toggle="modal" data-target="#sendInter">Send interest</span>
              </div>
            </div>
          `;
          $("#profile").html(profilelscContent);

          var profileHtml = `
                        <div class="pro-pg-intro">
                            <h1>${user.name || "Not available"}</h1>
                           
                            <ul>
                                <li>
                                    <div>
                                        <img src="assets/images/icon/pro-city.png" loading="lazy" alt="">
                                        <span>City: <strong>${
                                          user.city || "Not available"
                                        }</strong></span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="assets/images/icon/pro-age.png" loading="lazy" alt="">
                                        <span>Age: <strong>${
                                          user.age || "Not available"
                                        }</strong></span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="assets/images/icon/pro-city.png" loading="lazy" alt="">
                                        <span>Height: <strong>${
                                          user.height || "Not available"
                                        }</strong></span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="assets/images/icon/pro-city.png" loading="lazy" alt="">
                                        <span>Job: <strong>${
                                          user.job_type || "Not available"
                                        }</strong></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="pr-bio-c pr-bio-abo">
                            <h3>About</h3>
                            <p>${user.about || "Not available"}</p>
                        </div>
                        <div class="pr-bio-c pr-bio-gal" id="gallery">
                            <h3>Photo gallery</h3>
                            <div id="image-gallery">`;

          profileHtml += `
                            </div>
                        </div>
                        <div class="pr-bio-c pr-bio-conta">
                            <h3>Contact info</h3>
                            <ul>
                                <li><span><i class="fa fa-mobile" aria-hidden="true"></i><b>Phone:</b>${
                                  user.phone || "Not available"
                                }</span></li>
                                <li><span><i class="fa fa-envelope-o" aria-hidden="true"></i><b>Email:</b>${
                                  user.email || "Not available"
                                }</span></li>
                                <li><span><i class="fa fa fa-map-marker" aria-hidden="true"></i><b>Address: </b>${
                                  user.address || "Not available"
                                }</span></li>
                            </ul>
                        </div>
                        <div class="pr-bio-c pr-bio-info">
                            <h3>Personal information</h3>
                            <ul>
                                <li><b>Name:</b> ${
                                  user.name || "Not available"
                                }</li>
                                <li><b>Gender:</b> ${
                                  user.gender || "Not available"
                                }</li>
                                <li><b>Father's name:</b> ${
                                  user.father_name || "Not available"
                                }</li>
                                <li><b>Age:</b> ${
                                  user.age || "Not available"
                                }</li>
                                <li><b>Date of birth:</b>${
                                  user.dob || "Not available"
                                }</li>
                                <li><b>Height:</b>${
                                  user.height || "Not available"
                                }</li>
                                <li><b>Weight:</b>${
                                  user.weight || "Not available"
                                }</li>
                                <li><b>Degree:</b>${
                                  user.degree || "Not available"
                                }</li>
                                <li><b>Religion:</b>${
                                  user.religion || "Not available"
                                }</li>
                                <li><b>Profession:</b>${
                                  user.profession || "Not available"
                                }</li>
                                <li><b>Company:</b>${
                                  user.company || "Not available"
                                }</li>
                                <li><b>Position:</b>${
                                  user.position || "Not available"
                                }</li>
                                <li><b>Salary:</b>${
                                  user.salary || "Not available"
                                }</li>
                                <li><b>Marital status:</b>${
                                  user.marital_status || "Not available"
                                }</li>
                                <li><b>Children:</b>${
                                  user.children || "Not available"
                                }</li>
                            </ul>
                        </div>
                        <div class="pr-bio-c pr-bio-hob">
                            <h3>Hobbies</h3>
                            <ul>
                                <li><span>${
                                  user.hobbies || "Not available"
                                }</span></li>
                            </ul>
                        </div>
                        <div class="pr-bio-c menu-pop-soci pr-bio-soc">
                            <h3>Social media</h3>
                            <ul>
                                <li><a href="${
                                  user.facebook || "#"
                                }"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="${
                                  user.twitter || "#"
                                }"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="${
                                  user.whatsapp || "#"
                                }"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                <li><a href="${
                                  user.linkedin || "#"
                                }"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="${
                                  user.youtube || "#"
                                }"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                <li><a href="${
                                  user.instagram || "#"
                                }"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    `;

          $("#profile-details").html(profileHtml);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error: " + textStatus, errorThrown);
        $("#profile-details").html("<p>An error occurred while loading the profile.</p>");
        $("#profile-details").append("<p>" + jqXHR.responseText + "</p>");
      },
    });
  } else {
    $("#profile-details").html("<p>No user ID provided.</p>");
  }

  // Use event delegation to handle clicks on dynamic elements
  $(document).ready(function () {
    function openChatbox(user_id) {
        $.ajax({
            url: "controllers/vivahController",
            method: "GET",
            data: {
                action: "get_profile_details",
                user_id: user_id,
            },
            dataType: "json",
            success: function (response) {
                if (response.status === "error") {
                    $("#profile-details").html("<p>" + response.message + "</p>");
                } else {
                    var user = response.data[0];
                    var photos = response.photos;
                    
                    // Update chatbox content
                    $("#chat_partner_photo").attr("src", user.profile_picture
                        ? `assets/images/profiles/${user.email}/${user.profile_picture}`
                        : "assets/images/profiles/Default_profile.jpg");
                    $("#chat_partner_name").text(user.name || "Not available");
                    $("#chat_partner_status").text(user.status || "Not available");

                    $(".chatbox").addClass("open"); // Show chatbox
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
                $("#profile-details").html("<p>An error occurred while loading the profile.</p>");
                $("#profile-details").append("<p>" + jqXHR.responseText + "</p>");
            },
        });
    }

    // Open chatbox on clicking 'Chat now' button
    $(document).on('click', '.cta-chat', function () {
        var user_id = getQueryParam("user_id"); // Assuming user_id is passed in query parameters
        if (user_id) {
            openChatbox(user_id);
        }
    });

    // Close chatbox
    $(document).on('click', '.comm-msg-pop-clo', function () {
        $(".chatbox").removeClass("open"); // Hide chatbox
    });

    // Send message
    $(document).on('submit', '#new_chat_form', function (e) {
        e.preventDefault();

        var message = $("#chat_message").val();
        var receiver_id = getQueryParam("user_id"); // Assuming receiver_id is passed in query parameters

        if (message.trim() !== "") {
            $.ajax({
                url: "controllers/vivahController",
                method: "POST",
                data: {
                    action: "sendMessage",
                    receiver_id: receiver_id,
                    message: message,
                },
                success: function (response) {
                  const res = JSON.parse(response);
                    if (res.status === "success") {
                      window.location.href='user-chat';
                        $("#chatContent").append(`
                            <div class="chat-lhs">${message}</div>
                        `);
                        $("#chat_message").val(''); // Clear input field
                    } else {
                        alert(res.message); // Handle error message
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("Error: " + textStatus, errorThrown);
                },
            });
        }
    });

    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }
});

function sendRequest(receiver_id) {
  // Show a SweetAlert to indicate that the request is being processed
  Swal.fire({
      icon: 'info',
      title: 'Sending Request...',
      text: 'Please wait a few moments while we process your request.',
      showConfirmButton: false,
      //timer: 2000 // Optional: automatically close the alert after 2 seconds
  });

  $.ajax({
      url: 'controllers/vivahController',
      method: 'GET',
      data: {
          action: 'send_request',
          receiver_id: receiver_id,
          status: 'Pending' // or whatever status you want to set
      },
      success: function (response) {
          const res = JSON.parse(response);
          console.log(res.status);

          if (res.status === 'success') {
              // Success message with automatic redirection after 2 seconds
              Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Request sent successfully.',
                  timer: 3000, // Show success message for 2 seconds
                  timerProgressBar: true,
                  // willClose: () => {
                  //     // Redirect after the success message is closed
                  //     window.location.href = 'all-profiles';
                  // }
              });
          } else {
              // Error message if request fails
              Swal.fire({
                  icon: 'error',
                  title: 'Error!',
                  text: 'Error sending request: ' + res.message,
              });
          }
      },
      error: function (jqXHR, textStatus, errorThrown) {
          console.error('Error: ' + textStatus, errorThrown);
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'An error occurred while sending the request.',
          });
      }
  });
}

// Handle "Send request" button click
$(document).on('click', '.cta-sendint', function () {
  const receiver_id = getQueryParam('user_id'); // Fetch receiver_id from URL

  if (receiver_id) {
      sendRequest(receiver_id);
  } else {
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Unable to determine user IDs.',
      });
  }
});



});
