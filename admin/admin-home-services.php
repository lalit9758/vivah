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
                <h1>Home page services tail</h1>
              </div>
            </div>
            <div class="col-md-8">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Appriance</li>
                  <li class="breadcrumb-item active" aria-current="page">Home page Services</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box-com box-qui box-lig box-tab">
                <div class="tit">
                  <h3>All users</h3>
                  <p>All user profiles</p>
                </div>
                <table class="display" id="serviceTable"> <!-- Changed class to "display" for DataTables -->
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Created_at</th>
                      <th>Updated_at</th>
                      <th>More</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Rows will be dynamically inserted here -->
                  </tbody>
                </table>
              </div>
            </div>
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
          <p>Copyright © <span id="cry">2017-2020</span> <a href="#!" target="_blank">Company.com</a> All
            rights reserved.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- END -->
  <!-- Optional JavaScript -->

  <!-- The Modal -->
  <div class="modal fade" id="homservi">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit home page services</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-inp">
            <form id="serviceForm" enctype="multipart/form-data">
              <!--PROFILE BIO-->
              <div class="edit-pro-parti">
                <input type="hidden" id="service_id" name="service_id">
                <div class="form-group">
                  <label class="lb">Service name:</label>
                  <input type="text" id="service_name" name="service_name" class="form-control" placeholder="All Services*" required>
                </div>
                <div class="form-group">
                  <label class="lb">Sub title:</label>
                  <input type="text" id="sub_title" name="sub_title" class="form-control" placeholder="Sub title*" required>
                </div>
                <div class="form-group">
                  <label class="lb">Link:</label>
                  <input type="text" id="link" name="link" class="form-control" placeholder="Enter URL" required>

                </div>
              </div>
            </form>

          </div>
        </div>

        <!-- Modal footer -->
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="cta-full cta-colr" id="submitBtn">Submit</button>
        </div>


      </div>
    </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/select-opt.js"></script>
  <script src="assets/js/admin-custom.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  <script src="assets/js/admin-home-service.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#usersTable').DataTable(); // Initialize DataTables
    });
  </script>
  <script>
    $(function() {
      $('.chosen-select').chosen({
        placeholder_text_single: "Select Project/Initiative...",
        no_results_text: "Oops, nothing found!"
      });
    });
  </script>

</body>

</html>