<!DOCTYPE html>


<?php

session_start();

include("connection.php");
include("functions.php");

$username = $_SESSION['user_name'];

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_SESSION['user_name'];
		$forum_title = $_POST['forum-name'];
		$forum_content = $_POST['forum-description'];

		if(!empty($forum_title) && !empty($forum_content))
		{

			//save to database
			$query = "insert into forum (user_name, forum_title, forum_content) values ('$username','$forum_title','$forum_content')";
            
            // $forum_id = mysqli_insert_id($conn);
            if ($conn -> query($query) === TRUE) {
                $last_id = $conn -> insert_id;
                echo "Last inserted id: " . $last_id;
            }

                //$sql = "SELECT * FROM forum where forum_title = $forum_title";
                
                //$result = $conn->query($sql);
                //$row = $result->fetch_assoc();
                //$forum_id = $row['forum_id'];

			header("Location: specificforum.php?forum_id=".$last_id);
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}

?>

<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Forum</title>
        <link rel="icon" type="image/png" href="favicon_io/favicon.ico">
        <link rel="stylesheet" type="text/css" href="createForumStyle.css">
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

                <img src="https://via.placeholder.com/60" alt="Profile Picture"> <!--needs to access database-->

                <div class="dd-container">
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="personalprofile.html">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<div class="createForum-page">
			<div class="createForumBx">
				<a id = "cf-close-btn" href="sflanding.php">X</button></a>
				<form class="create-forum-form" method="post">
					<h2 id="cflabel">Start Discussing</h2>
					<div class ="cfform-container">
						<label for="forum-name" id="fn">Forum Title:</label>
						<input type="text" id="forum-name" name="forum-name" placeholder="Add discussion title here..."required><br><br>
					</div>
					<div class ="cfform-container">
						<label for="forum-description" id="fd">Content:</label>
						<textarea id="forum-description" name="forum-description" placeholder="Write your content here..." required></textarea>
					</div>
					<input type="submit" value="Post to Forum" class="cf-submit">
				</form>
			</div>
		</div>
    </body>
</html>