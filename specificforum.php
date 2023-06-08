<!DOCTYPE html>

<?php

session_start();

include("connection.php");
include("functions.php");

$username = $_SESSION['user_name'];

$forum_id = $_GET['forum_id'];

    $sql = "SELECT * 
            FROM forum 
            RIGHT JOIN users 
            ON forum.user_name = users.user_name 
            WHERE forum_id = $forum_id";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();

    $poster_username = $row["user_name"];
    $post_title = $row["forum_title"];
    $post_content = $row["forum_content"];
    $post_date = $row["date"];
    $post_picture = $row["profile_picture"];

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_SESSION['user_name'];
		$forum_reply = $_POST['forum_reply'];
		//if(!empty($forum_reply))
		//{

			//save to database
			$query = "INSERT INTO replies (forum_id, user_name, reply_content) 
                    VALUES ('$forum_id','$username','$forum_reply')";
            $conn -> query($query);

			header("Location: specificforum.php?forum_id=".$forum_id);
			die;
		//}else
		//{
		//	echo "Please enter some valid information!";
		//}
	}

$selectQuery = "SELECT profile_picture FROM users WHERE user_name = '$username'";
$selectResult = mysqli_query($conn, $selectQuery);

if ($selectResult && mysqli_num_rows($selectResult) > 0) {
    // Fetch the row and retrieve the profile_picture value
    $row = mysqli_fetch_assoc($selectResult);
    $profilePicture = $row['profile_picture'];
}
    
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
          <img src="<?php echo $profilePicture?>" alt="Profile Picture" id="userMenu">
          <div class="profile-button" id="profileBtn">
              <div class="sub-profile">
                  <div class="user-info">
                      <img src="<?php echo $profilePicture?>" alt="Profile Picture">
                      <h3 id="user-name">User Name</h3>
                  </div>
                  <ul>
                      <li><a href="personalprofile.php">Profile</a></li>
                      <li><a href="Home.php">Logout</a></li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="specificForum">
        <div class="forum-proper">
            <!-- back button -->
            <input type="button" id="back-button" onclick="window.location.href='Home.php';" value="Back"> 
           
            <div class="forum-details">
                <p id="main-forumtitle"><?php echo $post_title?></p> <!-- Forum Title -->
                <div class="forum-question"> <!-- forum question -->
                    <div class="main-info">
                        <img id="main-profilepicture" src="<?php echo $post_picture?>">
                        <p id="main-name"><?php echo $poster_username?></p>
                        <p id="main-relativepostdate" class="post-date"><?php echo $post_date?></p>
                    </div>
                    <p id="main-question"><?php echo $post_content?>
                    </p>
                </div>   
            </div>

            <form class="reply-proper" method="post">
                <img id="user-profilepicture" src="<?php echo $profilePicture?>"> <!-- user profile picture -->
                <input type="text" id="user-reply" name="forum_reply" placeholder="Post your reply to the forum.." required><!-- reply field -->
                <input type="submit" id="reply-button" value="Post reply"> <!-- reply button -->
            </form>
            
            <div class="past-replies">
                <p id="past-replieslabel">Other Replies</p>
                
                <?php
                $sql = "SELECT * 
                        FROM replies 
                        RIGHT JOIN users 
                        ON replies.user_name = users.user_name 
                        WHERE replies.forum_id = $forum_id"; // Exclude the current forum

                $result = $conn->query($sql);
                // Display each reply
                while ($row = $result->fetch_assoc()) {
                    $reply_username = $row["user_name"];
                    $reply_content = $row["reply_content"];
                    $reply_date = $row["date"];
                    $reply_picture = $row["profile_picture"];
                ?>
                
                <div class="past-reply">
                    <div class="reply-info">
                        <img id="reply-profilepicture" src="<?php echo $reply_picture?>">
                        <p id="reply-name"><?php echo $reply_username; ?></p>
                        <p id="reply-relativepostdate"><?php echo $reply_date; ?></p>
                    </div> 
                    <p id="reply-text"><?php echo $reply_content; ?></p>
                </div>
                s
                <?php
                }
                ?>

                <hr>
            </div>
        </div>
        <div class="other-forums">
            <p id="other-forumslabel">Other forums</p>
            <?php
            // Retrieve other forum data from the database
            $sql = "SELECT * FROM forum
                    INNER JOIN users
                    ON forum.user_name = users.user_name WHERE forum_id <> $forum_id"; // Exclude the current forum
            $result = $conn->query($sql);

            // Display each forum as a separate div
            while ($row = $result->fetch_assoc()) {
                $other_forum_title = $row["forum_title"];
                //$other_forum_content = $row["forum_content"];
                $other_forum_poster = $row["user_name"];
                $other_forum_date = $row["date"];
                $other_forum_id = $row["forum_id"];
                $other_profile_picture = $row["profile_picture"];
            ?>
            <a href="specificforum.php?forum_id=<?php echo $other_forum_id; ?>">
                <div class="other-forum"> <!-- Start of individual forum -->
                    <img id="other-profilepicture" src="<?php echo $other_profile_picture?>">
                    <div class="other-forum-info">
                        <p id="other-question"><?php echo $other_forum_title; ?></p>
                        <p id="other-post-info">Posted by <?php echo $other_forum_poster; ?> on <?php echo $other_forum_date; ?></p>
                    </div>
                </div> <!-- End of individual forum -->
            </a>
            <?php
            }
            ?>
        </div>
      </div>
    </body>
</html>
