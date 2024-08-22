$(document).ready(function () {
  $.ajax({
    url: "controllers/vivahController",
    data: {
      action: "get_profile_info",
    },
    method: "GET",
    dataType: "json",
    success: function (response) {
      if (response.status === "error") {
        $("#profile-container").html("<p>" + response.message + "</p>");
      } else {
        console.log(response.data);
        var user = response.data[0]; // Access the first item of the data array
        var photos = response.photos;
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

        // Check if photos array has data
        if (photos.length > 0) {
          photos.forEach((photo) => {
            profileHtml += `
                            <div class="pro-gal-imag">
                                <div class="img-wrapper">
                                    <a href="#!"><img src="${
                                      user.profile_picture
                                        ? `assets/images/profiles/'${user.email}'/${user.profile_picture}`
                                        : "assets/images/profiles/Default_profile.jpg"
                                    }" class="img-responsive" alt=""></a>
                                    <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i></div>
                                </div>
                            </div>`;
          });
        } else {
          profileHtml += "<p>No photos available.</p>";
        }

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
                            <li><b>Age:</b> ${user.age || "Not available"}</li>
                            <li><b>Date of birth:</b>${
                              user.dob === null
                                ? "Not available"
                                : user.dob || "Not available"
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
                              user.salary === null
                                ? "Not available"
                                : user.salary || "Not available"
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
        var profilelogo = `
              
                    <img src="${
                      user.profile_picture
                        ? `assets/images/profiles/'${user.email}'/${user.profile_picture}`
                        : "assets/images/profiles/Default_profile.jpg"
                    }" alt="" loading="lazy">
                    <b>${user.email || "Not available"}</b><br>
                    <h4>${user.name || "Not available"}</h4>
                    <span class="fclick"></span>
                `;

        $("#profile-logo").html(profilelogo);
        $("#profile-container").html(profileHtml);
      }
    },
    error: function () {
      $("#profile-container").html(
        "<p>An error occurred while loading the profile.</p>"
      );
    },
  });
});

/* <div class="pr-bio-c pr-bio-hob">
<h3>Hobbies</h3>
<ul>
${user.hobbies && user.hobbies.length > 0
    ? user.hobbies.map(hobby => `<li><span>${hobby || "Not available"}</span></li>`).join('')
    : '<li>No hobbies listed.</li>'}
</ul>
</div> 


<div class="pro-info-status">
   <h2 class="db-tit">Profiles status</h2>
                            <span class="stat-2"><b>${user.status || "Not available"}</b> online</span>
                        </div>

*/
