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
        <title>Study Rooms</title>
        <link rel="stylesheet" type="text/css" href="studyroomStyle.css">
        <link rel="icon" type="image/png" href="favicon_io/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
        <script src="studyroomJS.js"></script>
    </head>
    <body>
        <header>
            <a href="Home.html" id = "logoContainer">
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
                            <li><a href="personalprofile.html">Profile</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="Home.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="srLanding">
            <div class="srIntro">
                <h2>Study Rooms</h2>
                <p>Online study rooms are virtual spaces where students
                    can study, collaborate with peers, access resources, and stay focused,
                    often with features like video chat, note-sharing, and task management.
                </p>
            </div>
            <div class="studyOption">
                <div class="createRoom">
                    <img src="Images/createroomicon.png" alt = "createroomicon" id="cricon">
                    <div class="createIntro">
                        <h2 id="crTitle" > Create your own</h2>
                        <p id="createcapt">Create your own virtual space where you can study
                            alone or collaborate with others online</p>
                    </div>
                    <a id="cro" href = "createroom.html">Create now!</a>
                </div>
                <div class="searchRoom">
                    <img src="Images/searchroomicon.png" alt = "searchroomicon" id="sricon">
                    <div class="searchIntro">
                        <h2 id="srTitle">Search for Rooms</h2>
                        <p id="searchcapt">Find study rooms that fits your taste</p>
                    </div>
                    <a id ="sro" href = "searchstudyroom.html">Search!</a>
                </div>
            </div>
        </div>
    </body>
</html>