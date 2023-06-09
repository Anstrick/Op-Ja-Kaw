<?php

session_start();

include("connection.php");
include("functions.php");

$username = $_SESSION['user_name'];

if(isset($_GET['friendName'])){
    $friend_username = $_GET['friendName'];
    
    echo "Friend Name: " . $friend_username;
} else {
    // Handle the case when the friendName parameter is not provided
    echo "Friend Name not found.";
}


$sql = "SELECT * 
        FROM forum
        WHERE user_name = '$friend_username'";
$result = $conn->query($sql);

$sqli = "SELECT * 
        FROM users
        WHERE user_name <> '$username' 
        AND user_name <> '$friend_username'";
$friends = $conn->query($sqli);

$sqlie = "SELECT first_name 
        FROM users
        WHERE user_name = '$friend_username'";

$selectQuery = "SELECT profile_picture FROM users WHERE user_name = '$username'";
$selectResult = mysqli_query($conn, $selectQuery);

if ($selectResult && mysqli_num_rows($selectResult) > 0) {
    // Fetch the row and retrieve the profile_picture value
    $row = mysqli_fetch_assoc($selectResult);
    $profilePicture = $row['profile_picture'];
}

$user_data = mysqli_query($conn, $sqlie);
$first_name = mysqli_fetch_assoc($user_data);



?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>General User Profile </title>
        <link rel="stylesheet" type="text/css" href="forumStyle.css">
        <link rel="icon" type="image/png" href="favicon_io/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
        <script src="userButtons.js"></script>
        <script src="headerJava.js"></script>
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
                <li><a id="logout" href="logout.php"><img src="Images/logouticon.png" alt="Log out icon" id="logouticon">Log out</a></li>
              </ul>
          </div>
        <div class="user-main">
          <img src="<?php echo $profilePicture?>" alt="Profile Picture" id="userMenu">
          <div class="profile-button" id="profileBtn">
              <div class="sub-profile">
                  <div class="user-info">
                      <img src="<?php echo $profilePicture?>" alt="Profile Picture">
                      <h3 id="user-name">User Name</h3>
                  </div>
                  <ul>
                      <li><a href="personalprofile.php">Profile</a></li>
                      <li><a href="logout.php">Logout</a></li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="general-user">
            <div class="profile-section">
                <h2 id="prof-header">Profile</h2>
                <div class="profile-container">
                <!-- Profile header -->
                <div class="profile-header">
                    <div class="cover-photo">
                    <img src="https://example.com/cover-photo.jpg" alt="Cover Photo">
                    </div>
                    <div class="profile-info">
                    <div class="profile-picture">
                        <img src="<?php echo $profilePicture?>" alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <h2 id="userName"><?php echo $friend_username?></h2>
                        <p id="userBio"><?php echo $first_name['first_name']?></p>
                    </div>
                    </div>
                </div>
                </div>
                <div class="profile-content">
                <div class="section-container">
                    <div class="forum-posts-section">
                    <button class="section-button active" data-section="forum-posts">Forum Posts</button>
                    </div>
                    <hr id="line">

                    <div class="section-content" id="forum-posts">
                        <?php
                        // Check if there are any forum posts by the user
                        if ($result->num_rows > 0) {
                            // Loop through each forum post and display them
                            while ($row = $result->fetch_assoc()) {
                                $forum_title = $row["forum_title"];
                                $forum_content = $row["forum_content"];
                                $forum_time = $row["date"];
                                $forum_id = $row["forum_id"];
                                // $forum_picture = $row["picture_url"];
                        ?>
                        <?php echo '<a href="specificforum.php?forum_id='.$forum_id.'">';?>
                        <div class="userforum">
                            <div class="forum-user-picture">
                                <p class="forum-time"><?php echo $forum_time; ?></p>
                                <img src="<?php echo $profilePicture?>" alt="Profile Picture">
                            </div>
                            <div class="forum-content">
                                <p class="forum-title"><?php echo $forum_title; ?></p>
                                <p class="forum-text"><?php echo $forum_content; ?></p>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                            echo "<p id='no-user'> No forum posts found.</p>";
                        }
                        ?>
                    </div>
                    </div>
                    </div>
            </div>
            <div class="friend-options">
               <div class="socialize-container">
                
            </div>
               <!-- Friends section -->
               <div class="profile-friends">
                    <h3 id="friends-title">Friends</h3>
                <div class="friends-container">
                    <?php
                    // Check if there are any registered users
                    if ($friends->num_rows > 0) {
                        // Loop through each user and display their information
                        while ($row = $friends->fetch_assoc()) {
                            $friendName = $row["user_name"];
                            $friendPicture = $row["profile_picture"];
                    ?>
                    <div class="friend-info">
                        <div class="friend-picture">
                            <img src="<?php echo $friendPicture; ?>" alt="Profile Picture">
                        </div>
                        <a href="genprofile.php?friendName=<?php echo $friendName; ?>"><?php echo $friendName; ?></a>
                    </div>
                    <?php
                        }
                    } else {
                        // Display a message if there are no registered users
                        echo "<p>No registered users found.</p>";
                    }
                    ?>
                </div>
    </body>
</html>