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
                                    <h1>Site settings</h1>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                                      <li class="breadcrumb-item active" aria-current="page">Site settings</li>
                                    </ol>
                                  </nav>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-com box-qui box-lig box-form">
                                    <div class="form-inp">
                                        <form>
                                            <!--PROFILE BIO-->
                                            <div class="edit-pro-parti">
                                                <div class="form-tit">
                                                    <h4>Admin access</h4>
                                                    <h1>Login details</h1>
                                                </div>
                                                <div class="form-group">
                                                    <label class="lb">Admin user name:</label>
                                                    <input type="text" class="form-control" placeholder="User name" value="admin">
                                                </div>
                                                <div class="form-group">
                                                    <label class="lb">Admin password:</label>
                                                    <input type="password" class="form-control" placeholder="Enter password" value="password@123">
                                                    <span class="pass-view"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="lb">Admin Email [Mailing]:</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Enter email" value="rn53themes@gmail.com" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="lb">Recovery Email [For Password reset]:</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Enter email" value="support@rn53themes.net" name="email">
                                                </div>
                                            </div>
                                            <!--END PROFILE BIO-->
                                            <!--PROFILE BIO-->
                                            <div class="edit-pro-parti">
                                                <div class="form-tit">
                                                    <h4>Currency symbol</h4>
                                                    <h1>Currency</h1>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Currency Symbol:</label>
                                                    <input type="text" class="form-control" value="$">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Currency Symbol Position</label>
                                                        <select class="form-select chosen-select" data-placeholder="Select your Hobbies">
                                                            <option>Before cost</option>
                                                            <option>After amount</option>
                                                          </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--END PROFILE BIO-->
                                            <!--PROFILE BIO-->
                                            <div class="edit-pro-parti">
                                                <div class="form-tit">
                                                    <h4>Media</h4>
                                                    <h1>Social media</h1>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">WhatsApp:</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Facebook:</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Instagram:</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">X:</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Youtube:</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Linkedin:</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--END PROFILE BIO-->
                                            
                                            <button type="submit" class="cta-full cta-colr">Submit</button>
                                        </form>
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/select-opt.js"></script>
    <script src="assets/js/admin-custom.js"></script>
    <script>
    $(".pass-view").click(function(){
        $(this).siblings("input").attr("type","text");
        setTimeout(function(){
            $(".pass-view").siblings("input").attr("type","password");
        }, 1000)
    })
    $(function () {
            $('.chosen-select').chosen({
                placeholder_text_single: "Select Project/Initiative...",
                no_results_text: "Oops, nothing found!"
            });
        });
    </script>
</body>

</html>