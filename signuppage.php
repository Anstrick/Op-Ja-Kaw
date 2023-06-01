<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,email,first_name,last_name) values ('$user_id','$username','$password','$email','$first_name','$last_name')";

			mysqli_query($con, $query);

			header("Location: loginpage.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="loginstyle.css">
        <link rel="icon" type="image/png" href="favicon_io/favicon.ico">
        <script src="headerJava.js"></script>
    </head>
    <body>
        <a href="Home.html" id="logoContainer">
            <img src="Images/Ops-logo-png.png" alt="Static Logo" id="staticLogo">
         </a>
        <section>
            <div class="imgBx">
                <img src="Images/mainGif.gif">
                  <div class="signup-message">
                    <h2>Welcome to OP, JA KAW?</h2>
                    <p>Join our thriving online study groups and forums to
                        unlock a world of limitless possibilities</p>
                </div>
            </div>

            <div class="contentBx">
                <div class="signupBox">
                    <h2>Create Account</h2>
                    <form method="post">
                        <div class="inputBx nameBx">
                            <div class="name-container">
                                <span>First Name</span>
                                <input type="text" name="first_name" placeholder="First Name">
                            </div>
                            <div class="name-container-right">
                                <span>Last Name</span>
                                <input type="text" name="last_name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="inputBx">
                            <span>Username</span>
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="inputBx">
                            <span>Email</span>
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="inputBx">
                            <span>Password</span>
                            <input type="text" name="password" placeholder="Password">
                        </div>
                        <div class="inputBx">
                            <span>Confirm Password</span>
                            <input type="text" name="" placeholder="Confirm Password">
                        </div>
                        <div class="inputBx">
                            <input type="submit" value="Sign Up" name="">
                        </div>
                    </form>
                    <div class="haveAcct">
                        <p id="haveAcct">Already have an account? <a href="loginpage.php" id="haveLog">Log In</a></p>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
