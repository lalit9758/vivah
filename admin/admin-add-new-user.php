<!doctype html>
<html lang="en">

<head>
    <title>Wedding Matrimony</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="https://rn53themes.net/themes/matrimo/images/fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include_once("includes/admin-head.php"); ?>

    <section>
        <div class="main">
            <div class="row">
                <?php include_once("includes/admin-sidebar.php"); ?>
                <div class="pan-rhs">
                    <div class="row main-head">
                        <div class="col-md-4">
                            <div class="tit">
                                <h1>Add new user</h1>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add new users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-com box-qui box-lig box-form">
                                <div class="form-inp">
                                    <form id="adminUpdateProfileForm" novalidate>
                                        <div class="edit-pro-parti">
                                            <div class="form-tit">
                                                <h4>Basic info</h4>
                                                <h1>Create New profile</h1>
                                            </div>
                                            <div class="form-group">
                                                <label class="lb">Name:</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                                <div class="invalid-feedback">Please enter a valid name.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="lb">Email:</label>
                                                <input type="email" class="form-control" id="email" name="email">
                                                <div class="invalid-feedback">Please enter a valid email address.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="lb">Phone:</label>
                                                <input type="tel" class="form-control" id="phone" name="phone">
                                                <div class="invalid-feedback">Please enter a valid phone number (10 digits).</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="lb">Password:</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                                <div class="invalid-feedback">Please enter a password with at least 6 characters.</div>
                                            </div>
                                            <div id="formFeedback" class="alert" style="display: none;"></div>
                                        </div>
                                            <!-- More fields as per your original code -->
                                            <!-- I omitted these fields here for brevity, but they should be included in your final form -->

                                            <!-- Submit Button -->
                                            <button type="submit" class="cta-full cta-colr">Create User</button>
                                            </form>
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

    <!-- JavaScript -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/select-opt.js"></script>
    <script src="assets/js/admin-custom.js"></script>
    <script src="assets/js/admin-add-new-user.js"></script>
   </body>

</html>
