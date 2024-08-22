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
        <div class="row">
        <?php
            include_once("includes/admin-sidebar.php");
            ?>
                   <div class="pan-rhs">
                        <div class="row main-head">
                            <div class="col-md-6">
                                <div class="tit">
                                    <h1>Customer reviews - Home page</h1>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                                      <li class="breadcrumb-item active" aria-current="page">Appriance</li>
                                      <li class="breadcrumb-item active" aria-current="page">Customer reviews</li>
                                    </ol>
                                  </nav>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                      <h3>Reviews</h3>
                      <div class="dropdown">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addhomreviews">New user review</a></li>
                                              <li><a class="dropdown-item" href="../index.php#hom-cus-revi">View user reviews</a></li>
                                            </ul>
                                        </div>
                    </div>
                    <table class="display" id="reviewTable"> <!-- Changed class to "display" for DataTables -->
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Reviewer</th>
                          <th>City</th>
                          <th>Review comments</th>
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
<!-- Edit Review Modal -->
<div class="modal fade" id="homreviews" tabindex="-1" aria-labelledby="homreviewsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Review</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editReviewForm" enctype="multipart/form-data">
                    <input type="hidden" id="edit_review_id" name="review_id">
                    <div class="form-group">
                        <label class="lb">user Id:</label>
                        <input type="text" id="edit_user_id" name="user_id" class="form-control" placeholder="Enter reviewer user_id" required>
                    </div>
                    <div class="form-group">
                        <label class="lb">Reviewer name:</label>
                        <input type="text" id="edit_reviewer_name" name="reviewer_name" class="form-control" placeholder="Enter reviewer name" required>
                    </div>
                    <div class="form-group">
                        <label class="lb">Reviewer city:</label>
                        <input type="text" id="edit_reviewer_city" name="reviewer_city" class="form-control" placeholder="Enter reviewer city*" required>
                    </div>
                    <div class="form-group">
                        <label class="lb">Reviewer photo:</label>
                        <div class="fil-img-uplo">
                            <span class="dumfil">Upload image</span>
                            <input type="file" name="reviewer_image" id="edit_fileInput" accept="image/*,.jpg,.jpeg,.png">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="lb">Review comments:</label>
                        <textarea id="edit_review_comments" name="review_comments" class="form-control" cols="20" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="cta-full cta-colr" id="editSubmitBtn">Submit</button>
            </div>
        </div>
    </div>
</div>


   <!-- The Modal -->
<div class="modal fade" id="addhomreviews">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit reviews</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-inp">
            <form id="reviewForm" enctype="multipart/form-data">
    <!--PROFILE BIO-->
                   <div class="edit-pro-parti">
                       <div class="form-group">
                           <label class="lb">User Id:</label>
                           <input type="text" class="form-control" name="user_id" placeholder="Enter reviewer ID" required>
                       </div>
                       <div class="form-group">
                           <label class="lb">Reviewer name:</label>
                           <input type="text" class="form-control" name="reviewer_name" placeholder="Enter reviewer name" required>
                       </div>
                       <div class="form-group">
                           <label class="lb">Reviewer city:</label>
                           <input type="text" class="form-control" name="reviewer_city" placeholder="Enter reviewer city" required>
                       </div>
                       <div class="form-group">
                           <label class="lb">Reviewer photo:</label>
                           <div class="fil-img-uplo">
                               <span class="dumfil">Upload image</span>
                               <input type="file" name="image_name" accept="image/*,.jpg,.jpeg,.png" id="fileInput" required>
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="lb">Review comments:</label>
                           <textarea name="review_text" class="form-control" cols="30" rows="10" required></textarea>
                       </div>
                       <!-- Modal footer -->
                       <div class="modal-footer">
                           <button type="submit" class="cta-full cta-colr">Submit</button>
                       </div>
                   </div>
               </form>

            </div>
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

<script src="assets/js/admin-home-review.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
      $('#usersTable').DataTable(); // Initialize DataTables
  });
</script>

    <script>
        $(function () {
                $('.chosen-select').chosen({
                    placeholder_text_single: "Select Project/Initiative...",
                    no_results_text: "Oops, nothing found!"
                });
            });
        </script>
</body>

</html>