<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Wedding Matrimony</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="assets/images/fav.ico" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
      <![endif]-->
</head>

<body>
    <?php
    include_once("includes/header.php");
    ?>
    <?php
    include_once("includes/mainMenu.php");
    ?>

    <!-- LOGIN -->
    <section>
        <div class="db">
            <div class="container">
                <div class="row">

                    <?php
                    include_once("includes/profile-sidebar.php");
                    ?>

                    <div class="col-md-7 col-lg-8">
                        <div class="row">
                            <div class="col-md-12 db-sec-com">
                                <h2 class="db-tit">Interest request</h2>
                                <div class="db-pro-stat">
                                    <div class="db-inte-main">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="new-requests-tab" data-bs-toggle="tab" href="#home">New requests</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="accepted-requests-tab" data-bs-toggle="tab" href="#menu1">Accept request</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="denied-requests-tab" data-bs-toggle="tab" href="#menu2">Deny request</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                              <!-- New Requests -->
                                              <div id="home" class="container tab-pane active"><br>
                                                  <div class="db-inte-prof-list" id="new-requests-content"></div>
                                              </div>
                                              <!-- Accepted Requests -->
                                              <div id="menu1" class="container tab-pane fade"><br>
                                                  <div class="db-inte-prof-list" id="accepted-requests-content"></div>
                                              </div>
                                              <!-- Denied Requests -->
                                              <div id="menu2" class="container tab-pane fade"><br>
                                                  <div class="db-inte-prof-list" id="declined-requests-content"></div>
                                              </div>
                                          </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END -->


    <?php
    include_once("includes/footer.php");
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select-opt.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/slick.js"></script>
    <script>
$(document).ready(function() {
    // Load new requests by default
    loadTabContent('new');

    // Event listeners for tab clicks
    $('#new-requests-tab').on('click', function() {
        loadTabContent('new');
    });

    $('#accepted-requests-tab').on('click', function() {
        loadTabContent('accepted');
    });

    $('#denied-requests-tab').on('click', function() {
        loadTabContent('declined');
    });

    // Polling function to check for new requests every 10 seconds
    setInterval(function() {
        loadTabContent('new'); // Automatically load new requests
    }, 10000); // Poll every 10 seconds (10000 milliseconds)

    function loadTabContent(tabType) {
        let action;
        switch (tabType) {
            case 'new':
                action = 'fetch_new_requests';
                break;
            case 'accepted':
                action = 'fetch_accepted_requests';
                break;
            case 'declined':
                action = 'fetch_denied_requests';
                break;
        }

        $.ajax({
            url: 'controllers/vivahController.php',
            method: 'GET',
            data: { action: action },
            dataType: 'json',
            success: function(response) {
                let html = '';
                if (response.status === 'success' && response.data.length > 0) {
                    response.data.forEach(request => {
                        let badgeClass = 'user-pla-free'; // Default badge class
                        if (request.user_badge === 'Platinum') badgeClass = 'user-pla-pat';
                        else if (request.user_badge === 'Gold') badgeClass = 'user-pla-gold';

                        let imgSrc = request.imgSrc ? `assets/images/profiles/'${request.sender_email}'/${request.imgSrc}` : 'assets/images/profiles/Default_profile.jpg'; // Default image
                        let requestDate = request.sent_at ? request.sent_at : 'Not available';
                        let respondedDate = request.responded_at ? request.responded_at : 'Not available';

                        html += `
                            <li>
                                <div class="db-int-pro-1">
                                    <img src="${imgSrc}" alt="">
                                    <span class="badge bg-primary ${badgeClass}">${request.user_badge || 'NA'}</span>
                                </div>
                                <div class="db-int-pro-2">
                                    <h5>${request.sender_name || 'NA'}</h5>
                                    <ol class="poi">
                                        <li>City: <strong>${request.city || 'NA'}</strong></li>
                                        <li>Age: <strong>${request.age || 'NA'}</strong></li>
                                        <li>Height: <strong>${request.height || 'NA'}</strong></li>
                                        <li>Job: <strong>${request.profession || 'NA'}</strong></li>
                                    </ol>
                                    <ol class="poi poi-date">
                                        <li>Request on: ${requestDate || 'NA'}</li>
                                        ${tabType === 'accepted' ? `<li>Accepted on: ${respondedDate || 'NA'}</li>` : ''}
                                        ${tabType === 'declined' ? `<li>Declined on: ${respondedDate || 'NA'}</li>` : ''}
                                    </ol>
                                    <a href="profile-details?user_id=${request.sender_id}" class="cta-5" target="_blank">View full profile</a>
                                </div>
                                <div class="db-int-pro-3">
                                    ${tabType === 'new' ? `
                                        <button type="button" class="btn btn-success btn-sm accept-btn" data-id="${request.sender_id}">Accept</button>
                                        <button type="button" class="btn btn-outline-danger btn-sm deny-btn" data-id="${request.sender_id}">Deny</button>
                                    ` : ''}
                                    ${tabType === 'accepted' ? `
                                        <button type="button" class="btn btn-outline-danger btn-sm deny-btn" data-id="${request.sender_id}">Deny</button>
                                    ` : ''}
                                    ${tabType === 'declined' ? `
                                        <button type="button" class="btn btn-success btn-sm accept-btn" data-id="${request.sender_id}">Accept</button>
                                    ` : ''}
                                </div>
                            </li>`;
                    });
                } else {
                    html = 'No requests.';
                }
                $(`#${tabType}-requests-content`).html(html);

                // Bind event listeners to dynamically created buttons
                $('.accept-btn').on('click', function() {
                    handleRequestStatusChange($(this).data('id'), 'accept');
                });

                $('.deny-btn').on('click', function() {
                    handleRequestStatusChange($(this).data('id'), 'deny');
                });
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }

    function handleRequestStatusChange(requestId, action) {
        $.ajax({
            url: 'controllers/vivahController',
            method: 'POST',
            contentType: 'application/json', // Ensure correct content type
            data: JSON.stringify({
                action: 'update_request_status',
                request_id: requestId,
                action_type: action
            }),
            success: function(response) {
                try {
                    const parsedResponse = JSON.parse(response);
                    if (parsedResponse.status === 'success') {
                        // Reload current tab content after status update
                        const activeTab = $('.nav-tabs .active').attr('id').replace('-requests-tab', '');
                        loadTabContent(activeTab);
                    } else {
                        console.error('Status update failed:', parsedResponse.message);
                    }
                } catch (e) {
                    console.error('Failed to parse JSON response:', e);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }
});

</script>



</body>

</html>