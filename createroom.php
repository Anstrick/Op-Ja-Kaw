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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Study Rooms</title>
        <link rel="icon" type="image/png" href="favicon_io/favicon.ico">
        <link rel="stylesheet" type="text/css" href="createRoomStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
        <script src="tagJS.js"></script>
    </head>
    <body>
        <header>
            <a href="Home.html" id = "logoContainer">
                <img src="Images/op-logo.gif" alt="Animated Logo" id="animatedLogo">
                <img src="Images/Ops-logo-png.png" alt="Static Logo" id="staticLogo">
            </a>
            <ul class="navBar" id="navLinks">
                <li><a href="srlanding.html">Study Rooms</a></li>
                <li><a href="sflanding.html" class="sfButton">Study Forums</a></li>
                <li><a href="about.html">About Us</a></li>
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
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
	    <div class="navBar">
		    <a class="navigation" href="srlanding.html">Study Rooms</a>
		    <a class="navigation" href="sflanding.html">Study Forums</a>
		    <a class="navigation" href="about.html">About</a>
	    </div>
        <div class="profile-button">
            <div class="profile-btn">
                <img src="https://via.placeholder.com/60" alt="Profile Picture">
                <div class="dd-container">
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="personalprofile.html">Profile</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="crPage">
            <div class="createBx">
                <a id = "cr-close-btn" href="srlanding.html">X</button></a>
                <form class="create-room-form">
                    <h2 id="crlabel">Create Room</h2>
                    <div class="crform-container">
                        <label for="room-name" id="rn">Room Name:</label>
                        <input type="text" id="room-name" name="room-name" required>
                    </div>
                    <div class="crform-container">
                        <label for="num-participants" id="np">Number of Participants:</label>
                        <input type="number" id="num-participants" name="num-participants" required>
                    </div>
                    <div class="crform-container">
                        <label for="room-description" id="rd">Room Description:</label>
                        <textarea id="room-description" name="room-description" required></textarea>
                    </div>
                    <div class="crform-container">
                        <label for="tags" id="tags">Tags:</label>
                        <input type="text" id="tagsInput" name="tags" placeholder="Type a tag and press Enter" >
                        <div id="tagsContainer"></div>
                    </div>
                    <input type="submit" value="Create Room" class="cr-submit">
	            </form>
            </div>
        </div>
    </body>
</html>
