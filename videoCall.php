<?php
session_start();

include("connection.php");
include("functions.php");

$username = $_SESSION['user_name'];

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $room_name = $POST["room-name"];
// }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Op Ja Kaw?</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='videoCall.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css">
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

    <button id="join-btn">Join Stream</button>

    <div id="stream-wrapper">
        <div id="room-title"></div> 
        <div id="video-streams"></div>
        <div class="username" id="username"><?php echo $username?></div>

        <div id="stream-controls">
          <button id="leave-btn">
            <div class="icon-wrapper"><i class="bx bx-log-out"></i></div>
            <div class="button-text">Leave Stream</div>
          </button>
          <button id="mic-btn">
            <div class="icon-wrapper"><i class="bx bx-microphone"></i></div>
            <div class="button-text">Microphone</div>
          </button>
          <button id="camera-btn">
            <div class="icon-wrapper"><i class="bx bx-video"></i></div>
            <div class="button-text">Camera</div>
          </button>
        </div>
    </div>
    
</body>
<script src="AgoraRTC_N-4.7.3.js"></script>
<script src='videoCall.js'></script>
</html>