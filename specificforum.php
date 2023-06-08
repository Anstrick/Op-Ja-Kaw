<!DOCTYPE html>

<?php

session_start();

include("connection.php");
include("functions.php");

$username = $_SESSION['user_name'];

$forum_id = $_GET['forum_id'];

    $sql = "SELECT * FROM forum WHERE forum_id = $forum_id";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();

    $poster_username = $row["user_name"];
    $post_title = $row["forum_title"];
    $post_content = $row["forum_content"];
    $post_date = $row["date"];
                            

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Study Forum</title>
        <link rel="stylesheet" type="text/css" href="forumStyle.css">
        <link rel="icon" type="image/png" href="favicon_io/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
        <script src="headerJava.js"></script>
    </head>
    <body id="specificforumpage">
        <header>  
            <a href="Home.html" id = "logoContainer">
              <img src="Images/op-logo.gif" alt="Animated Logo" id="animatedLogo">
              <img src="Images/Ops-logo-png.png" alt="Static Logo" id="staticLogo">
          </a>
          </header>
          <div class="verticalNavBar">
              <ul id="navList">
                <li><a id="verSRlanding" href="srlanding.php"><img src="Images/studyroom icon.png" alt="study room icon" id="sricon">Study Rooms</a></li>
                <li><a id="verSFlanding" class="navigation2" href="sflanding.html"><img src="Images/forumicon.png" alt="forum icon" id="forumicon">Study Forums</a></li>
                <li><a id="up" href="personalprofile.php"><img src="Images/usericon.png" alt="User icon" id="usericon">User<br>Profile</a></li>
                <li><a id="logout" href="Home.php"><img src="Images/logouticon.png" alt="Log out icon" id="logouticon">Log out</a></li>
              </ul>
          </div>
        <div class="user-main">
          <img src="https://via.placeholder.com/60" alt="Profile Picture" id="userMenu">
          <div class="profile-button" id="profileBtn">
              <div class="sub-profile">
                  <div class="user-info">
                      <img src="https://via.placeholder.com/60" alt="Profile Picture">
                      <h3 id="user-name">User Name</h3>
                  </div>
                  <ul>
                      <li><a href="personalprofile.html">Profile</a></li>
                      <li><a href="#">Settings</a></li>
                      <li><a href="Home.html">Logout</a></li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="specificForum">
        <div class="forum-proper">
            <!-- back button -->
            <input type="button" id="back-button" onclick="window.location.href='Home.html';" value="Back"> 
           
            <div class="forum-details">
                <p id="main-forumtitle"><?php echo $post_title?></p> <!-- Forum Title -->
                <div class="forum-question"> <!-- forum question -->
                    <div class="main-info">
                        <img id="main-profilepicture" src="Images/usericon.png">
                        <p id="main-name"><?php echo $poster_username?></p>
                        <p id="main-relativepostdate"><?php echo $post_date?></p>
                    </div>
                    <p id="main-question"><?php echo $post_content?>
                    </p>
                </div>   
            </div>

            <div class="reply-proper">
                <img id="user-profilepicture" src="Images/usericon.png"> <!-- user profile picture -->
                <textarea id="user-reply" placeholder="Post your reply to the forum.."></textarea><!-- reply field -->
                <input type="button" id="reply-button" value="Post reply"> <!-- reply button -->
            </div>
            
            <div class="past-replies">
                <p id="past-replieslabel">Other Replies</p>
                <div class="past-reply">
                    <div class="reply-info">
                        <img id="reply-profilepicture" src="Images/usericon.png">
                        <p id="reply-name">Placeholder</p>
                        <p id="reply-relativepostdate">N days ago </p>
                    </div> 
                    <p id="reply-text"> Hello betch</p>
                </div>

                <hr>
            </div>
        </div>
        <div class="other-forums">
            <p id="other-forumslabel">Other forums</p>
            <div class="other-forum">
                <img id="other-profilepicture" src="Images/usericon.png">
                <p id="other-question">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
      </div>
    </body>
</html>
