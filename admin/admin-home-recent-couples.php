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
                                <h1>Recent couples - Home page</h1>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Appriance</li>
                                    <li class="breadcrumb-item active" aria-current="page">Recent couples</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-com box-qui box-lig box-tab">
                                <div class="tit">
                                    <h3>Recent couples</h3>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#couplesadd">New user couple</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="../index.php#couples">View couples</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="display" id="recentCouplesTable"> <!-- Changed class to "display" for DataTables -->
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Couples name</th>
                                            <th>City</th>
                                            <th>Link</th>
                                            <th>Edit</th>
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
                    <p>Copyright ©
                        <span id="cry">2017-2020</span>
                        <a href="#!" target="_blank">Company.com</a>
                        All
                        rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    <!-- Optional JavaScript -->
    <!-- The Modal -->
    <!-- Edit Couples Modal -->
<div class="modal fade" id="couplesedit" tabindex="-1" aria-labelledby="coupleseditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="coupleseditLabel">Edit Couples</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editcouplesForm" enctype="multipart/form-data">
                    <div class="edit-pro-parti">
                        <input type="hidden" id="edit_couple_id" name="couple_id">
                        <div class="form-group">
                            <label class="lb">Couples name:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="couples_name" 
                                id="edit_couples_name"
                                placeholder="Enter couples name"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="lb">Couples city:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="couples_city" 
                                id="edit_couples_city"
                                placeholder="Enter couples city*"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="lb">Couples photo:</label>
                            <div class="fil-img-uplo">
                                <span class="dumfil">Upload image</span>
                                <input
                                    type="file"
                                    name="gallery_image[]" 
                                    id="edit_fileInput"
                                    accept="image/*,.jpg,.jpeg,.png">
                            </div>
                            <!-- Optional: Add an image preview element -->
                            <div id="edit_image_preview">
                                <!-- Preview image will be set here -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="lb">Page link:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="page_link" 
                                id="edit_page_link"
                                placeholder="link"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="cta-full cta-colr" id="editSubmitBtn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

    <!-- The Modal -->
    <div class="modal fade" id="couplesadd">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Couples add</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-inp">
                        <form id="couplesForm" enctype="multipart/form-data">
                            <!-- PROFILE BIO -->
                            <div class="edit-pro-parti">
                                <div class="form-group">
                                    <label class="lb">Couples name:</label>
                                    <input type="text" class="form-control" name="couples_name" placeholder="Enter couples name" required>
                                </div>
                                <div class="form-group">
                                    <label class="lb">Couples city:</label>
                                    <input type="text" class="form-control" name="couples_city" placeholder="Enter couples city*" required>
                                </div>
                                <div class="form-group">
                                    <label class="lb">Couples photo:</label>
                                    <div class="fil-img-uplo">
                                        <span class="dumfil">Upload image</span>
                                        <input type="file" name="gallery_image" accept="image/*,.jpg,.jpeg,.png" id="fileInput" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="lb">Page link:</label>
                                    <input type="text" class="form-control" name="page_link" placeholder="Enter page link">
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

    <script src="assets/js/admin-home-recent-couples.js"></script>

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