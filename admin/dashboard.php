<!doctype html>
<html lang="en">
  <head>
    <title>Wedding Matrimony</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="robots" content="noindex">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="https://rn53themes.net/themes/matrimo/images/fav.ico" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php
    include_once("includes/admin-head.php");
    ?>
    <!-- COPYRIGHTS -->
    <section>
      <div class="main">
        <div class="incon" <div class="row">
        <?php
    include_once("includes/admin-sidebar.php");
    ?>
          <div class="pan-rhs">
            <div class="row main-head">
              <div class="col-md-4">
                <div class="tit">
                  <h1>Admin Dashboard</h1>
                </div>
              </div>
              <div class="col-md-8">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="#">Library</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="box-com box-qui box-drk grn-box" id="newuser">
                  
                </div>
                <!-- <div class="box-com box-qui box-lig ali-cen">
                  <h3>
                    <span>All</span> Members
                  </h3>
                  <span class="bnum">6900</span>
                  <canvas id="Chart_users"></canvas>
                  <a href="admin-new-user-requests.php" class="fclick"></a>
                </div> -->
                <!-- <div class="box-com box-qui live-box">
                  <h4>Live visitos</h4>
                  <h2>Currently Active Users</h2>
                  <span class="bnum">3600</span>
                  <p>Currently <span>3600</span> visitos survey in your website </p>
                  <div class="live">
                    <span class="move"></span>
                  </div>
                </div> -->
              </div>
              <div class="col-md-6">
                <div class="box-com box-qui box-lig box-new-user" id="alluser">
                  
                  
                </div>
                <!-- <div class="box-com box-qui box-lig ali-cen">
                  <h3>
                    <span>Total</span> Earnings
                  </h3>
                  <span class="bnum">
                    <sub>$</sub>10,069 </span>
                  <canvas id="Chart_earni"></canvas>
                </div> -->
            
              <!-- <div class="col-md-6">
                <div class="box-com box-qui box-lig ali-cen">
                  <h3>
                    <span>Monthly</span> Earnings
                  </h3>
                  <span class="bnum">
                    <sub>$</sub>10,069 </span>
                  <canvas id="Chart_earni_rece"></canvas>
                </div>
                <div class="box-com box-qui box-drk box-them-info">
                  <h4>Template update status</h4>
                  <ul>
                    <li>Current version you installed: <strong>3.6</strong>
                    </li>
                    <li>Latest version: <strong>4.2</strong>
                    </li>
                    <li>Template Activation: <strong>Yes</strong>
                    </li>
                  </ul>
                  <a href="#" class="btn-com btn-red">Update</a>
                  <a href="#" class="btn-com btn-gre">Licance key</a>
                  <a href="#" class="btn-com btn-line btn-whi">More details</a>
                </div>
              </div> -->
            </div>
            <!-- <div class="col-md-3">
            <div class="box-com box-qui box-drk box-lead-thum">
                  <h2>Leads & Enquiry</h2>
                  <span class="bnum">28</span>
                  <div class="lead-cir-thum-hori">
                    <span data-bs-toggle="tooltip" title="Anna">A</span>
                    <span data-bs-toggle="tooltip" title="John">j</span>
                    <span data-bs-toggle="tooltip" title="Bailey">b</span>
                    <span data-bs-toggle="tooltip" title="Erick">e</span>
                    <span data-bs-toggle="tooltip" title="Boby">b</span>
                    <span data-bs-toggle="tooltip" title="Uma">u</span>
                    <span data-bs-toggle="tooltip" title="Maria">m</span>
                  </div>
                  <a href="admin-enquiry.php" class="fclick"></a>
                </div>
              </div> -->
            </div>
            
            
            <div class="row">
              <div class="col-md-12">
              <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                      <h3>Recent users</h3>
                      <p>Recent user profiles</p>
                    </div>
                    <table class="display" id="recentTable"> <!-- Changed class to "display" for DataTables -->
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Profile</th>
                          <th>Gender</th>
                          <th>Phone Number</th>
                          <th>Created_at Time</th>
                          <th>Updated_at Time</th>
                          <th>More</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Rows will be dynamically inserted here -->
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- <div class="col-md-6">
                <div class="box-com box-qui box-lig box-tab">
                  <div class="tit">
                    <h3>Renewal Reminder</h3>
                    <p>Below listed profils going to expairy soon.</p>
                    <div class="dropdown">
                      <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <li>
                          <a class="dropdown-item" href="#">View all profile</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Profile</th>
                        <th>Phone</th>
                        <th>Expairy date</th>
                        <th>Plan type</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>
                          <div class="prof-table-thum">
                            <div class="pro">
                              <img src="../assets/images/profiles/men3.jpg" alt="">
                            </div>
                            <div class="pro-info">
                              <h5>Ashley emyy</h5>
                              <p>ashleyipsum@gmail.com</p>
                            </div>
                          </div>
                        </td>
                        <td>01 321-998-91</td>
                        <td>
                          <span class="hig-red">22, Feb 2024</span>
                        </td>
                        <td>
                          <span class="hig-grn">Premium</span>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a class="dropdown-item" href="#">More details</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#">View profile</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>
                          <div class="prof-table-thum">
                            <div class="pro">
                              <img src="../assets/images/profiles/9.jpg" alt="">
                            </div>
                            <div class="pro-info">
                              <h5>Elizabeth Taylor</h5>
                              <p>ashleyipsum@gmail.com</p>
                            </div>
                          </div>
                        </td>
                        <td>01 321-998-91</td>
                        <td>
                          <span class="hig-red">22, Feb 2024</span>
                        </td>
                        <td>
                          <span class="hig-grn">Premium</span>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a class="dropdown-item" href="#">More details</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#">View profile</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>
                          <div class="prof-table-thum">
                            <div class="pro">
                              <img src="../assets/images/profiles/men1.jpg" alt="">
                            </div>
                            <div class="pro-info">
                              <h5>Angelina Jolie</h5>
                              <p>ashleyipsum@gmail.com</p>
                            </div>
                          </div>
                        </td>
                        <td>01 321-998-91</td>
                        <td>
                          <span class="hig-red">22, Feb 2024</span>
                        </td>
                        <td>
                          <span class="hig-grn">Premium</span>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a class="dropdown-item" href="#">More details</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#">View profile</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>
                          <div class="prof-table-thum">
                            <div class="pro">
                              <img src="../assets/images/profiles/men2.jpg" alt="">
                            </div>
                            <div class="pro-info">
                              <h5>Olivia mia</h5>
                              <p>ashleyipsum@gmail.com</p>
                            </div>
                          </div>
                        </td>
                        <td>01 321-998-91</td>
                        <td>
                          <span class="hig-red">22, Feb 2024</span>
                        </td>
                        <td>
                          <span class="hig-grn">Premium</span>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a class="dropdown-item" href="#">More details</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#">View profile</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>
                          <div class="prof-table-thum">
                            <div class="pro">
                              <img src="../assets/images/profiles/6.jpg" alt="">
                            </div>
                            <div class="pro-info">
                              <h5>Jennifer</h5>
                              <p>ashleyipsum@gmail.com</p>
                            </div>
                          </div>
                        </td>
                        <td>01 321-998-91</td>
                        <td>
                          <span class="hig-red">22, Feb 2024</span>
                        </td>
                        <td>
                          <span class="hig-grn">Premium</span>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a class="dropdown-item" href="#">More details</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#">View profile</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>
                          <div class="prof-table-thum">
                            <div class="pro">
                              <img src="../assets/images/profiles/7.jpg" alt="">
                            </div>
                            <div class="pro-info">
                              <h5>Emmy jack</h5>
                              <p>ashleyipsum@gmail.com</p>
                            </div>
                          </div>
                        </td>
                        <td>01 321-998-91</td>
                        <td>
                          <span class="hig-red">22, Feb 2024</span>
                        </td>
                        <td>
                          <span class="hig-grn">Premium</span>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a class="dropdown-item" href="#">More details</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#">View profile</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <!-- END -->
    <!-- COPYRIGHTS -->
    <section>
      <div class="cr">
        <div class="container">
          <div class="row">
            <p>Copyright © <span id="cry">2017-2020</span>
              <a href="#!" target="_blank">Company.com</a> All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/select-opt.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/admin-custom.js"></script>
    <script src="assets/js/admin-all-users.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/admin-dashboard.js"></script>
    <script>
      //ARNING CHART
      var earningCanvas = document.getElementById("Chart_earni");
      Chart.defaults.global.defaultFontSize = 14;
      var earningsData = {
        labels: ["Premium Plus", "Premium"],
        datasets: [{
          data: [50, 60],
          backgroundColor: ["#8463FF", "#6384FF"]
        }]
      };
      var pieChart = new Chart(earningCanvas, {
        type: 'pie',
        data: earningsData
      });
      //USER CHART
      var usersCanvas = document.getElementById("Chart_users");
      var usersData = {
        labels: ["Premium Plus", "Premium", "Free"],
        datasets: [{
          data: [40, 30, 30],
          backgroundColor: ["#198754", "#ffc107", "#6c757d"]
        }]
      };
      var pieChart = new Chart(usersCanvas, {
        type: 'pie',
        data: usersData
      });
      //USER CHART
      var ctx = document.getElementById("Chart_earni_rece").getContext('2d');
      var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: 'data-1',
            data: [4000, 5000, 4550, 6005, 8550, 9008, 3220, 4880, 6550, 2500],
            backgroundColor: "rgba(255,99,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            borderWidth: 2,
            hoverBackgroundColor: "rgba(255,99,132,0.4)",
            hoverBorderColor: "rgba(255,99,132,1)",
          }]
        }
      });
    </script>
     <script type="text/javascript">
      $(document).ready(function() {
          $('#usersTable').DataTable(); // Initialize DataTables
      });
    </script>
  </body>
</html>