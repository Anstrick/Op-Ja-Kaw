<?php

session_start();

include("connection.php");
include("functions.php");

$username = $_SESSION['user_name'];

$sql = "SELECT * FROM users WHERE user_name = '$username'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();

    $user_pp = $row["profile_picture"];
    echo $user_pp;
?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="ojkstyle.css">
        <link rel="icon" type="image/png" href="favicon_io/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
        <script src="studyroomJS.js"></script>
        <script>
            function scrollToSection() {
                // Scroll to the target element
                const element = document.getElementById('scroll-target');
                element.scrollIntoView({ behavior: 'smooth' });
            }
        </script>
    </head>
    <body>
    <header>
            <a href="Home.php" id = "logoContainer">
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
                <img src=<?php echo $user_pp ?> alt="Profile Picture" id="userMenu">
                <div class="profile-button" id="profileBtn">
                    <div class="sub-profile">
                        <div class="user-info">
                            <img src= <?php echo $user_pp ?> alt="Profile Picture">
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
        <div class="mainLand">
            <p id="welcome">Get your brain in gear.</p>
            <p id="intro">With our virtual study rooms, you can stay focused, 
                motivated and connected with your peers. Join OP, JA KAW? now and take your 
                studying to the next level </p>
            <!-- <a id ="getstart" href="signuppage.php">Get Started</a> -->
            <button onclick="scrollToSection()" id="getstart">Get Started</button>
        </div>

    <!--Description of Features-->
        <div class="introduction"  id="scroll-target">
            <div class="intro-trigger">
                <h2 class="introduce">Introducing <strong>OP, JA KAW?</strong></h2>
            </div>
            <div class="intro-container">
                <div class="createSR">
                    <a href="createroom.php"><img src="Images/intro-cr.png" alt="intro-cr" id="intro-cr"></a>
                    <div class="intro-content">
                        <a id ="srf" href ="createroom.php">Create Study Rooms</a>
                        <p id = "createIntro">Design and Personalize Your Ideal Learning Space!</p>
                    </div>
                </div>
                <div class="joinSR">
                    <a href="srlanding.php"><img src="Images/intro-jg.png" alt="intro-jg" id="intro-jg"></a>
                    <div class="intro-content">
                        <a id ="jsr" href ="srlanding.php">Join Study Spaces</a>
                        <p id ="joinIntro">Collaborate and Connect with Like-minded Learners in Dynamic Study Environments!</p>
                    </div>
                </div>

                <div class="postFR">
                    <a href="sflanding.php"><img src="Images/intro-pf.png" alt="intro-pf" id="intro-pf"></a>
                    <div class="intro-content">
                        <a id ="sff" href ="sflanding.php">Post Forums</a>
                        <p id = "forumIntro">Spark Intellectual Conversations in our Forum Communities!</p>
                    </div>
                </div>
            </div>
            <!-- <a id ="tryNow" href="Home.php">Try it out!</a> -->
        </div>
    
        <!--Benefits-->
        <div class="benefits">
            <div class="benTitle">
                <h2 class ="benefitsTitle">Amplify your learning potential!</h2>
                <p class="benefitsSub">Unlock the benefits of collaborative learning excellence!</p>
            </div> 
            <div class="benefit-container"> 
                <div class="bnft1">
                    <img src="Images/bnft1.jpg" alt="bnft1" id="bnft1">
                    <div class="bnftIntro">
                        <h3 id="benTitle">Ignite Your Learning Mojo</h3>
                        <p id= "benDesc">Our online study rooms are the ultimate hotspot for focused learning. With customizable backgrounds 
                        and an array of features, you'll harness the power of concentration and skyrocket your productivity to new heights. </p>
                    </div>
                </div>
                <div class="bnft2">
                    <img src="Images/bnft2.jpg" alt="bnft2" id="bnft2">
                    <div class="bnftIntro">
                        <h3 id="benTitle">Forum Fiesta</h3>
                        <p id= "benDesc">Step into the vibrant realm of study forums and unlock a plethora of learning benefits. Join forces 
                        with fellow knowledge seekers, ignite engaging discussions, and harness the power of a supportive online community. </p>
                    </div>
                </div>
                <div class="bnft3">
                    <img src="Images/bnft3.jpg" alt="bnft3" id="bnft3">
                    <div class="bnftIntro">
                        <h3 id="benTitle">Study Squad Unite</h3>
                        <p id= "benDesc">Say goodbye to studying solo and hello to collaborative greatness! 
                        In our online study rooms, you can seamlessly connect with friends, creating a vibrant community of support.
                        Share resources and tackle challenging topics together.</p>
                    </div>
                </div>
            </div>  
        </div>

        <!--Join Now!-->
        <div class="joinNow">
            <h3 id="join"> Don't Wait, Join Now and Ignite Your Learning Journey!</h3>
            <a id ="joinUS" href="srlanding.php">Join Now</a>
        </div>

        <footer>
            <img src="Images/Ops-logo-png.png" alt="Footer Logo" id="footerLogo">
            <p>Copyright. All Rights Reserved</p>
        </footer>
    </body>
</html>
