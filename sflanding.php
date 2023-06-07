<?php

session_start();

include("connection.php");
include("functions.php");

$username = $_SESSION['user_name'];

?>

<!DOCTYPE html>
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
      </head>
    <body>
        <header>  
          <a href="Home.php" id = "logoContainer">
            <img src="Images/op-logo.gif" alt="Animated Logo" id="animatedLogo">
            <img src="Images/Ops-logo-png.png" alt="Static Logo" id="staticLogo">
        </a>
        </header>
	    <div class="verticalNavBar">
            <ul id="navList">
              <li><a id="verSRlanding" href="srlanding.php"><img src="Images/studyroom icon.png" alt="study room icon" id="sricon">Study Rooms</a></li>
              <li><a id="verSFlanding" class="navigation2" href="sflanding.php"><img src="Images/forumicon.png" alt="forum icon" id="forumicon">Study Forums</a></li>
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
                    <h3 id="user-name"><?php echo $username?></h3>
                </div>
                <ul>
                    <li><a href="personalprofile.php">Profile</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="forumLanding">
      <div class="forumIntro">
        <div class="frm-intro">
          <h2 id="frm-intro-title">Study Forums</h2>
          <p id="frm-intro-desc">Welcome to our vibrant forum community! Join us as we connect individuals from all 
            walks of life, fostering engaging discussions on a wide range of topics.</p>
        </div>
        <div class="frmBtns">
          <div class ="forum-searchbar">
            <label for="search-forum">Search Forum:</label>
            <input type="text" id="search-forum" name="search-forum" placeholder="Search a Topic">
            <button id="search-forum-btn">Search</button>  
          </div>  
          <div id="addforum-button">
            <a href="createforum.php"><button id="add-forum-btn">Add Forum</button></a>
          </div>
        </div>
      </div>

        <!--Display Forums-->
        <div id="random-forums">
          <div class="forum-box">
            <img src="Images/forum cv.jpg" alt="Forum Cover Image">
            <h2 class="forum-title">Forum Title 1</h2>
            <p class="forum-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed ex maximus, sed vestibulum libero dignissim.</p>
            <div class="forum-info">
              <div class="forum-tags">
                <button class="tag-button">Tag1</button>
                <button class="tag-button">Tag2</button>
                <button class="tag-button">Tag3</button>
              </div>
              <div class="author-info">
                <img src="https://via.placeholder.com/50" alt="Author Profile Image">
                <p class="author-name">Author Name</p>
              </div>
              <p class="forum-date">3 weeks ago</p>
            </div>
            <button class="reply-button">Reply</button>
          </div>
    </body>
</html>
