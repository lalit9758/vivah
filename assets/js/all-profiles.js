$(document).ready(function () {
  // Initialize chosen-select
  $(".chosen-select").chosen({ width: "100%" });

  function fetchProfiles() {
    var gender = $("#gender-filter").val();
    var age = $("#age-filter").val();
    var religion = $("#religion-filter").val();
    var location = $("#location-filter").val();
    var availability = $('input[name="availability"]:checked').val();

    $.ajax({
      url: "controllers/vivahController",
      method: "GET",
      data: {
        action: "fetch_all-profiles",
        gender: gender,
        age: age,
        religion: religion,
        location: location,
        availability: availability,
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          var profiles = response.data;
          var loggedIn = response.loggedIn;
          var profileHtml = "";
          profiles.forEach(function (profile) {
            var profileLink = loggedIn
              ? `profile-details?user_id=${profile.id}`
              : "login"; // Redirect to login page if not logged in

            profileHtml += `
              <li>
                <div class="all-pro-box ${
                  profile.status === "Available" ? "user-avil-onli" : ""
                }" data-useravil="${
                  profile.status === "Available" ? "avilyes" : "avilno"
                }" data-aviltxt="${
                  profile.status === "Available" ? "Available online" : "Offline"
                }">
                  <div class="pro-img">
                    <a href="${profileLink}">
                      <img 
                        src="${
                          profile.profile_picture
                            ? `assets/images/profiles/${profile.email}/${profile.profile_picture}`
                            : "assets/images/profiles/Default_profile.jpg"
                        }" 
                        loading="lazy" 
                        class="pro" 
                        alt=""
                      />
                    </a>
                    <div class="pro-ave" title="User currently available">
                      ${
                        profile.status === "Available"
                          ? '<span class="pro-ave-yes"></span>'
                          : ""
                      }
                    </div>
                    <div class="pro-avl-status">
                      <h5>${
                        profile.status === "Available"
                          ? "Available Online"
                          : "Offline"
                      }</h5>
                    </div>
                  </div>
                  <div class="pro-detail">
                    <h4><a href="${profileLink}">${
                      profile.name || "Not available"
                    }</a></h4>
                    <div class="pro-bio">
                      <span>Gender: ${
                        profile.gender || "Not available"
                      }</span>
                      <span>Age: ${
                        profile.age || profile.age === 0
                          ? profile.age + " Years old"
                          : "Age not available"
                      }</span>
                      <span>Height: ${
                        profile.religion || "not available"
                      }</span>
                      <span>Location: ${
                        profile.location || "Not available"
                      }</span>
                    </div>
                    <div class="links">
                      <span class="cta-chat">Chat now</span>
                      <a href="#!">WhatsApp</a>
                      <a href="javascript:void(0);" class="cta cta-sendint ${
                        loggedIn ? "send-interest" : "disabled"
                      }" data-bs-toggle="modal" data-bs-target="#sendInter">Send interest</a>
                      <a href="${profileLink}">More details</a>
                    </div>
                  </div>
                  <span class="enq-sav" data-toggle="tooltip" title="Click to save this profile.">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                  </span>
                </div>
              </li>
            `;
          });

          $(".all-list-sh ul").html(profileHtml);

          // Add event listener for Send Interest link
          $(".cta-sendint").on("click", function (event) {
            if (!loggedIn) {
              event.preventDefault();
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You must be logged in to send interest.',
              });
            }
          });
        } else {
          $(".all-list-sh ul").html("<li>No profiles found.</li>");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error: " + textStatus, errorThrown);
        $(".all-list-sh ul").html(
          "<li>An error occurred while loading profiles.</li>"
        );
      },
    });
  }

  // Call fetchProfiles() when filters are changed
  $('.chosen-select, input[name="availability"]').change(function () {
    fetchProfiles();
  });

  // Initial load
  fetchProfiles();

  function getQueryParams() {
    var params = {};
    window.location.search
      .substring(1)
      .split("&")
      .forEach(function (pair) {
        var [key, value] = pair.split("=");
        params[decodeURIComponent(key)] = decodeURIComponent(value);
      });
    return params;
  }

  function fetchProfilesFilter(filters) {
    $.ajax({
      url: "controllers/vivahController",
      method: "GET",
      data: {
        action: "fetch_all-profiles",
        gender: filters.gender,
        age: filters.age,
        religion: filters.religion,
        location: filters.location,
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          var profiles = response.data;
          var loggedIn = response.loggedIn;
          var profileHtml = "";
          profiles.forEach(function (profile) {
            var profileLink = loggedIn
              ? `profile-details?user_id=${profile.id}`
              : "login"; // Redirect to login page if not logged in

            profileHtml += `
              <li>
                <div class="all-pro-box ${
                  profile.status === "Available" ? "user-avil-onli" : ""
                }" data-useravil="${
                  profile.status === "Available" ? "avilyes" : "avilno"
                }" data-aviltxt="${
                  profile.status === "Available" ? "Available online" : "Offline"
                }">
                  <div class="pro-img">
                    <a href="${profileLink}">
                      <img 
                        src="${
                          profile.profile_picture
                            ? `assets/images/profiles/${profile.email}/${profile.profile_picture}`
                            : "assets/images/profiles/Default_profile.jpg"
                        }" 
                        loading="lazy" 
                        class="pro" 
                        alt=""
                      />
                    </a>
                    <div class="pro-ave" title="User currently available">
                      ${
                        profile.status === "Available"
                          ? '<span class="pro-ave-yes"></span>'
                          : ""
                      }
                    </div>
                    <div class="pro-avl-status">
                      <h5>${
                        profile.status === "Available"
                          ? "Available Online"
                          : "Offline"
                      }</h5>
                    </div>
                  </div>
                  <div class="pro-detail">
                    <h4><a href="${profileLink}">${
                      profile.name || "Not available"
                    }</a></h4>
                    <div class="pro-bio">
                      <span>Gender: ${
                        profile.gender || "Not available"
                      }</span>
                      <span>Age: ${
                        profile.age || profile.age === 0
                          ? profile.age + " Years old"
                          : "Age not available"
                      }</span>
                      <span>Height: ${
                        profile.religion || "not available"
                      }</span>
                      <span>Location: ${
                        profile.location || "Not available"
                      }</span>
                    </div>
                    <div class="links">
                      <span class="cta-chat">Chat now</span>
                      <a href="#!">WhatsApp</a>
                      <a href="javascript:void(0);" class="cta cta-sendint ${
                        loggedIn ? "send-interest" : "disabled"
                      }" data-bs-toggle="modal" data-bs-target="#sendInter">Send interest</a>
                      <a href="${profileLink}">More details</a>
                    </div>
                  </div>
                  <span class="enq-sav" data-toggle="tooltip" title="Click to save this profile.">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                  </span>
                </div>
              </li>
            `;
          });

          $(".all-list-sh ul").html(profileHtml);

          // Add event listener for Send Interest link
          $(".cta-sendint").on("click", function (event) {
            if (!loggedIn) {
              event.preventDefault();
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You must be logged in to send interest.',
              });
            }
          });
        } else {
          $(".all-list-sh ul").html("<li>No profiles found.</li>");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error: " + textStatus, errorThrown);
        $(".all-list-sh ul").html(
          "<li>An error occurred while loading profiles.</li>"
        );
      },
    });
  }

  // Get query parameters and fetch profiles
  var filters = getQueryParams();
  fetchProfilesFilter(filters);
});
