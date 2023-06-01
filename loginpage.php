<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password) && !is_numeric($email))
		{

			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: Home.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>
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
                  <div class="login-message">
                    <h2>Good to See You Again!</h2>
                    <p> Log in to connect with fellow learners, share knowledge, 
                        and engage in meaningful discussions to enhance your understanding. </p>
                </div>
            </div>
            <div class="contentBx">
                <div class="loginBox">
                    <h2>Log In to Your Account</h2>
                    <form method="post">
                        <div class="inputBx">
                            <span>Email</span>
                            <input type="email" name="" placeholder="Email">
                        </div>
                        <div class="inputBx">
                            <span>Password</span>
                            <input type="text" name="" placeholder="Password">
                        </div>
                        <div class="inputBx">
                            <input type="submit" value="Log In" name="">
                        </div>
                    </form>
                    <div class="forgotPassword">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <div class="newAcct">
                        <p id="newAcct">Doesn't have an account yet? <a href="signuppage.php" id="newLog">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
