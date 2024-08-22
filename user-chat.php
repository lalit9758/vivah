<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Chat Application</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="assets/images/fav.ico" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
                    <div id="chat-list" class="col-md-7 col-lg-8">
                        <div class="row">
                            <div class="col-md-12 db-sec-com">
                                <h2 class="db-tit">Chat list</h2>
                                <div class="db-pro-stat">
                                    <div class="db-chat">
                                        <ul id="chat-items">
                                             <!-- Chat items will be dynamically loaded here -->
                                            
                                        </ul>
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

    <!-- CHAT CONVERSATION BOX START -->
    <div class="chatbox">
        <span class="comm-msg-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
        <div class="inn">
            <form id="new_chat_form" method="post">
                <div class="s1">
                    <img src="assets/images/user/2.jpg" class="intephoto2" alt="">
                    <h4><b class="intename2">Julia</b>,</h4>
                    <!-- <span class="avlsta avilyes">Available online</span> -->
                </div>
                <div class="s2 chat-box-messages">
                    <!-- <span class="chat-wel">Start a new chat!!! now</span> -->
                    <div class="chat-con" id="chatContent">
                        <!-- Chat messages will be dynamically loaded here -->
                    </div>
                </div>
                <div class="s3">
                    <input type="text" id="chat_message" name="chat_message" placeholder="Type a message here.." required="">
                    <button id="chat_send1" name="chat_send" type="submit">Send <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- END -->

    <!-- Optional JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/user_chat.js"></script>
  
</body>

</html>




<!-- <div class="db-chat-info">
    <div class="time ${chat.unreadCount > 0 ? 'new' : ''}">
        <span class="timer">${chat.time}</span>
        ${chat.unreadCount > 0 ? `<span class="cont">${chat.unreadCount}</span>` : ''}
    </div>
</div> -->