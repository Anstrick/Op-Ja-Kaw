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
    <title>Specific Study Room Page</title>
    <link rel="stylesheet" type="text/css" href="roomStyle.css">
  </head>
  <body>
    <div class="vertical-nav-bar">
      <ul id="navList">
        <li><a id="verHomelanding" href="Home.php"><img src="Images/opslogo.png" alt="Logo" id="ssrplogo"></a></li>
        <li><a id="verSRlanding" href="srlanding.php"><img src="Images/studyroom icon.png" alt="study room icon" id="sricon">Study Rooms</a></li>
        <li><a id="verSFlanding" class="navigation2" href="sflanding.php"><img src="Images/forumicon.png" alt="forum icon" id="forumicon">Study Forums</a></li>
        <li><a id="up" href="personalprofile.php"><img src="Images/usericon.png" alt="User icon" id="usericon">User<br>Profile</a></li>
        <li><a id="logout" href="Home.php"><img src="Images/logouticon.png" alt="Log out icon" id="logouticon">Log out</a></li>
      </ul>
    </div>

    <div class="container">
      <div class="ssrpheader">
        <div class="online-count">
          <p>331 people online</p>
        </div>
        <div class="room-info">
          <p id="room-name">Room Name</p>
          <button id="favorite-button"><img src="Images/favorite.png"></button>
        </div>
        <div class="invite">
          <a href="usersearch.php" id="invite">Invite</a>
        </div>
      </div>

      <div class="participants">
        <div id="participant1" class="participant-box">
          <img src="Images/participant.jpg" alt="Participant 1">
          <p><span>Participant 1</span></p>
        </div>
        <div id="participant2" class="participant-box">
          <img src="Images/participant.jpg" alt="Participant 2">
          <p><span>Participant 2</span></p>
        </div>
        <div id="participant3" class="participant-box">
          <img src="Images/participant.jpg" alt="Participant 3">
          <p><span>Participant 3</span></p>
        </div>
      </div>
      <div class="participants2">
        <div id="participant4" class="participant-box">
          <img src="Images/participant.jpg" alt="Participant 4">
          <p><span>Participant 4</span></p>
        </div>
        <div id="participant5" class="participant-box">
          <img src="Images/participant.jpg" alt="Participant 5">
          <p><span>Participant 5</span></p>
        </div>
        <div id="participant6" class="participant-box">
          <img src="Images/participant.jpg" alt="Participant 6">
          <p><span>Participant 6</span></p>
        </div>
      </div>

      <img class="arrowleft" src="Images/arrowleft.png">
      <img class="arrowright" src="Images/arrowright.png">
      <div class="btn-group">
      <div class="btn-group">

  <div class="btn-group-item">
    <button class="btn button-btn">
      <img class="btn-group-img" src="Images/Camera.png" alt="Camera">
    </button>
    <p class="btn-label">Camera</p>
  </div>

  <div class="btn-group-item">
    <button class="btn button-btn">
      <img class="btn-group-img" src="Images/microphone.png" alt="Microphone">
    </button>
    <p class="btn-label">Microphone</p>
  </div>

  <div class="btn-group-item">
    <button class="btn button-btn">
      <img class="btn-group-img" src="Images/participantlogo.png" alt="Participants">
    </button>
    <p class="btn-label">Participants</p>
  </div>

  <div class="btn-group-item">
    <button class="btn button-btn">
      <img class="btn-group-img" src="Images/chat.png" alt="Chat">
    </button>
    <p class="btn-label">Chat</p>
  </div>

  <div class="btn-group-item">
    <button class="btn button-btn">
      <a href="Home.html">
        <img class="btn-group-img" src="Images/leaveroom.png" alt="Leave Room">
      </a>
    </button>
    <p class="btn-label" id="leaveroom">Leave Room</p>
  </div>
</div>

     </div>
    </div>
  </body>
</html>
