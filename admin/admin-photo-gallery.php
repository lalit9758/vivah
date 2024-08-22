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
                                <h1>Photo gallery - Home page</h1>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Appriance</li>
                                    <li class="breadcrumb-item active" aria-current="page">Photo gallery</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-com box-qui box-lig box-tab">
                                <div class="tit">
                                    <h3>Photo gallery</h3>
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
                                                    data-bs-target="#teamadd">Add new photo</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" target="_blank" href="../index.php#photos">View photos in home page</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" target="_blank" href="https://rn53themes.net/themes/matrimo/photo-gallery.php">View photos in gallery page</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="display" id="geleryPhotoTable"> <!-- Changed class to "display" for DataTables -->
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Photo</th>
                                            <th>Tag line 1</th>
                                            <th>Tag line 2</th>
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
    <div class="modal fade" id="editmember">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Photo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-inp">
                    <form id="editgalleryForm" enctype="multipart/form-data">
                        <!-- PROFILE BIO -->
                        <div class="edit-pro-parti">
                            <input type="hidden" id="edit_photo_id" name="photo_id">
                            <div class="form-group">
                                <label class="lb">Tag line 1:</label>
                                <input type="text" class="form-control" id="edit_category" name="category" placeholder="Enter tag line 1" required>
                            </div>
                            <div class="form-group">
                                <label class="lb">Tag line 2:</label>
                                <input type="text" class="form-control" id="edit_description" name="description" placeholder="Enter tag line 2" required>
                            </div>

                            <div class="form-group">
                                <label class="lb">Gallery Photo:</label>
                                <div class="fil-img-uplo">
                                    <span class="dumfil">Upload new image (if any)</span>
                                    <input
                                        type="file"
                                        name="gallery_image"
                                        accept="image/*,.jpg,.jpeg,.png"
                                        id="fileInput">
                                </div>
                                <div id="edit_image_preview"></div>
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

    <!-- The Modal -->
    <div class="modal fade" id="teamadd">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add photos</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-inp">
                        <form id="galleryForm" enctype="multipart/form-data">
                            <!-- PROFILE BIO -->
                            <div class="edit-pro-parti">
                                <div class="form-group">
                                    <label class="lb">Tag line 1:</label>
                                    <input type="text" class="form-control" name="couples_name" placeholder="Enter tag line 1" required>
                                </div>
                                <div class="form-group">
                                    <label class="lb">Tag line 2:</label>
                                    <input type="text" class="form-control" name="couples_city" placeholder="Enter tag line 2" required>
                                </div>
                                <div class="form-group">
                                    <label class="lb">Gallery photo:</label>
                                    <div class="fil-img-uplo">
                                        <span class="dumfil">Upload image</span>
                                        <input type="file" name="gallery_image" accept="image/*,.jpg,.jpeg,.png" id="fileInput" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="lb">Photo Gallery</label>
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

    <script src="assets/js/admin-photo-galary.js"></script>

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