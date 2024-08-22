$(document).ready(function () {
  function randomizeArray(array) {
    // Fisher-Yates shuffle algorithm
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  }

  function fetchQuickAccess() {
    $.ajax({
      url: "controllers/vivahController?action=quick_access",
      type: "GET",
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          let items = response.data;
          items = randomizeArray(items); // Randomize items

          let htmlContent = `
                        <div class="str home-acces-main">
                            <div class="container">
                                <div class="row">
                                    <div class="wedd-shap">
                                        <span class="abo-shap-1"></span>
                                        <span class="abo-shap-4"></span>
                                    </div>
                                    <div class="home-tit">
                                        <p>Quick Access</p>
                                        <h2><span>Our Services</span></h2>
                                        <span class="leaf1"></span>
                                        <span class="tit-ani-"></span>
                                    </div>
                                    <div class="home-acces">
                                        <ul class="hom-qui-acc-sli slider">`;

          items.forEach((item) => {
            htmlContent += `
                            <li>
                                <div class="wow fadeInUp hacc hacc${item.id}" data-wow-delay="${item.data_wow_delay}">
                                    <div class="con">
                                        <img src="assets/images/icon/${item.image_name}" alt="" loading="lazy">
                                        <h4>${item.title}</h4>
                                        <p>${item.description}</p>
                                        <a href="${item.link}">View more</a>
                                    </div>
                                </div>
                            </li>`;
          });

          htmlContent += `
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>`;

          $("#quick-access-section").html(htmlContent);

          // Initialize Slick slider for Quick Access
          $(".home-acces .slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            arrows: true,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                },
              },
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                },
              },
            ],
          });
        } else {
          $("#quick-access-section").html("<p>No data available</p>");
        }
      },
      error: function (xhr, status, error) {
        console.error(
          "Error fetching quick access data: " + status + " " + error
        );
        console.log(
          "An error occurred while fetching quick access data. See console for details."
        );
      },
    });
  }

  function fetchReviews() {
    $.ajax({
      url: "controllers/vivahController?action=fetch_reviews",
      type: "GET",
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          let items = response.data;

          items = randomizeArray(items); // Randomize items

          let htmlContent = `
                        <div class="hom-cus-revi">
                            <div class="container">
                                <div class="row">
                                    <div class="home-tit">
                                        <p>trusted brand</p>
                                        <h2><span>Trust by <b class="num">1500</b>+ Couples</span></h2>
                                        <span class="leaf1"></span>
                                        <span class="tit-ani-"></span>
                                    </div>
                                    <div class="slid-inn cus-revi">
                                        <ul class="slider3">`;

          items.forEach((item) => {
            htmlContent += `
                            <li>
                                <div class="cus-revi-box">
                                    <div class="revi-im">
                                        <a href="profile-details?user_id=${
                                          item.user_id
                                        }">
                                       
                                        <img src="${
                                          item.image_name
                                            ? `assets/images/user/${item.image_name}`
                                            : "assets/images/profiles/Default_profile.jpg"
                                        }" alt="" loading="lazy"></a>
                                        <i class="cir-com cir-1"></i>
                                        <i class="cir-com cir-2"></i>
                                        <i class="cir-com cir-3"></i>
                                    </div>
                                    <p>${item.review_text}</p>
                                    <h5>${item.name}</h5>
                                    <span>${item.location}</span>
                                </div>
                            </li>`;
          });

          htmlContent += `
                                        </ul>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>`;

          $("#customer-reviews-section").html(htmlContent);

          // Initialize Slick slider for Customer Reviews
          $(".slider3").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                },
              },
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                },
              },
            ],
          });
        } else {
          $("#customer-reviews-section").html("<p>No reviews available</p>");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching reviews: " + status + " " + error);
        console.log(
          "An error occurred while fetching reviews. See console for details."
        );
      },
    });
  }
  //     <div class="cta-full-wid">
  //     <a href="#!" class="cta-dark">More customer reviews</a>
  // </div>

  function fetchStats() {
    $.ajax({
      url: "controllers/vivahController?action=fetch_stats",
      type: "GET",
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          let htmlContent = "";

          response.data.forEach((item) => {
            // Map 'type' to appropriate FontAwesome icon class
            let icon_class = "";
            switch (item.type) {
              case "couples":
                icon_class = "fa-heart-o";
                break;
              case "registrants":
                icon_class = "fa-users";
                break;
              case "men":
                icon_class = "fa-male";
                break;
              case "women":
                icon_class = "fa-female";
                break;
            }

            htmlContent += `
                            <li>
                                <div class="ab-cont-po">
                                    <i class="fa ${icon_class}" aria-hidden="true"></i>
                                    <div>
                                        <h4>${item.count}</h4>
                                        <span>${item.label}</span>
                                    </div>
                                </div>
                            </li>`;
          });

          $("#stats-list").html(htmlContent);
        } else {
          $("#stats-list").html("<p>No data available</p>");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching stats data: " + status + " " + error);
        console.log(
          "An error occurred while fetching stats data. See console for details."
        );
      },
    });
  }
  function fetchCouples() {
    $.ajax({
      url: "controllers/vivahController?action=fetch_couples",
      method: "GET",
      dataType: "json",
      success: function (data) {
        if (data.status === "success") {
          let recentcouple = data.data;
          recentcouple = randomizeArray(recentcouple); // Shuffle the array
          const $list = $(".couple-sli");
          $list.empty(); // Clear any existing items
          $.each(recentcouple, function (index, couple) {
            const $li = $("<li></li>");
            $li.html(`
                            <div class="hom-coup-box">
                                <span class="leaf"></span>
                                <img src="assets/images/couples/${couple.image}" alt="" loading="lazy">
                                <div class="bx">
                                    <h4>${couple.name} <span>${couple.location}</span></h4>
                                </div>
                            </div>
                        `);
            $list.append($li);
          });

          // Initialize or refresh the slider here
          initializeSlider();
        } else {
          console.error("Error fetching couples data:", data.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching data:", error);
      },
    });
  }
  // <a href="${couple.link}" class="sml-cta cta-dark">View more</a>

  function initializeSlider() {
    // Check if the slider is already initialized
    if ($(".couple-sli").hasClass("slick-initialized")) {
      $(".couple-sli").slick("unslick"); // Destroy previous instance
    }
    $(".couple-sli").slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  function fetchGallerly() {
    $.ajax({
      url: "controllers/vivahController?action=fetch_photo_gallery",
      type: "GET",
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          let galleryContent = "";
          let gallery = response.data;
          gallery = randomizeArray(gallery);
          gallery.forEach((item) => {
            galleryContent += `
                            <div class="col-sm-6 col-md-2">
                                <div class="gal-im animate animate__animated animate__slow" data-ani="animate__flipInX">
                                    <img src="assets/images/gallery/${item.image_name}" class="${item.size}" alt="" loading="lazy">
                                    <div class="txt">
                                        <span>${item.category}</span>
                                        <h4>${item.description}</h4>
                                    </div>
                                </div>
                            </div>
                        `;
          });

          $("#galary-list").html(galleryContent);
        } else {
          $("#galary-list").html("<p>No data available</p>");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching gallery data: " + status + " " + error);
        console.log(
          "An error occurred while fetching gallery data. See console for details."
        );
      },
    });
  }
  function fetchGallerlypageData() {
    $.ajax({
      url: "controllers/vivahController?action=fetch_photo_galleryPage",
      type: "GET",
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          let galleryContent = "";
          let gallery = response.data;
          gallery = randomizeArray(gallery);
          gallery.forEach((item) => {
            galleryContent += `
                            <div class="col-sm-6 col-md-2">
                                <div class="gal-im animate animate__animated animate__slow" data-ani="animate__flipInX">
                                    <img src="assets/images/gallery/${item.image_name}" class="${item.size}" alt="" loading="lazy">
                                    <div class="txt">
                                        <span>${item.category}</span>
                                        <h4>${item.description}</h4>
                                    </div>
                                </div>
                            </div>
                        `;
          });

          $("#galary-list2").html(galleryContent);
        } else {
          $("#galary-list2").html("<p>No data available</p>");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching gallery data: " + status + " " + error);
        console.log(
          "An error occurred while fetching gallery data. See console for details."
        );
      },
    });
  }
  $("#searchForm").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission

    var gender = $("#gender-filter").val();
    var age = $("#age-filter").val();
    var religion = $("#religion-filter").val();
    var location = $("#location-filter").val();

    var queryParams = $.param({
      gender: gender,
      age: age,
      religion: religion,
      location: location,
    });

    window.location.href = "all-profiles?" + queryParams;
  });
  // Call all functions on page load
  fetchStats();
  fetchQuickAccess();
  fetchReviews();
  fetchCouples();
  fetchGallerly();
  fetchGallerlypageData();
});
