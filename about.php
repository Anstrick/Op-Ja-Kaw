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
        <title>AboutUs </title>
        <link rel="stylesheet" type="text/css" href="ojkstyle.css">
        <link rel="icon" type="image/png" href="favicon_io/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
        <script src="studyroomJS.js"></script>


    </head>
    <body>
        <header>
            <a href="start.php" id = "logoContainer">
                <img src="Images/op-logo.gif" alt="Animated Logo" id="animatedLogo">
                <img src="Images/Ops-logo-png.png" alt="Static Logo" id="staticLogo">
            </a>
            <ul class="navBar" id="navLinks">
                <li><a href="srlanding.php">Study Rooms</a></li>
                <li><a href="sflanding.php" class="sfButton">Study Forums</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
    
            <div class="main">
                <div class="bx bx-menu" id="menu-icon"></div>
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
                            <li><a href="Logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="about-container">
            <div class="about">
              <h2 id="about-title">About Us</h2>
              <p id="about-desc">This website provides a collaborative and supportive platform for students to share knowledge, resources, and study strategies.</p>
            </div>
            <div class="gallery-container">
              <div class="gallery">
                <div class="gallery-item">
                    <img src="Images/about_img1.jpg" alt="Image 1">
                </div>
                <div class="gallery-item">
                    <img src="Images/about_img2.jpg" alt="Image 2">
                </div>
                <div class="gallery-item">
                    <img src="Images/about_img3.jpg" alt="Image 3">
                </div>
                <div class="gallery-item">
                    <img src="Images/about_img4.jpg" alt="Image 4">
                </div>
              <a class="gallery-ctrl-left" href="#" onclick="showPreviousItem(); return false;">&larr;</a>
              <a class="gallery-ctrl-right" href="#" onclick="showNextItem(); return false;">&rarr;</a>
              <div class="gallery-dots">
                <span class="gallery-dot active"></span>
                <span class="gallery-dot"></span>
                <span class="gallery-dot"></span>
                <span class="gallery-dot"></span>
              </div>
            </div>
        </div>
        <hr>
        <div class="team">
            <h2 id="team_label">Our Team</h2>
            <div class="member-container">
                <div class="dax">
                    <p class="devName">Gabriel Dax Agura</p>
                    <p class="devEmail">gpagura@up.edu.ph</p>
                    <p class="teamdesc">Scrum Master</p>
                </div>
                <div class="benz">
                    <p class="devName">Benz Vrianne Beleber</p>
                    <p class="devEmail">bpbeleber@up.edu.ph</p>
                    <p class="teamdesc">Member</p>
                </div>
                <div class="perse">
                    <p class="devName">Perserose Catalan</p>
                    <p class="devEmail">ppcatalan@up.edu.ph</p>
                    <p class="teamdesc">Member</p>
                </div>
                <div class="gab">
                    <p class="devName">Gabriel Joshua Carreon</p>
                    <p class="devEmail">gmcarreon@up.edu.ph</p>
                    <p class="teamdesc">Member</p>
                 </div>
            </div>
        </div>
    </body>
<script src="aboutGallery.js"></script>
</html>