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
        $file = $_FILES["profile_picture"];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{
                if (isset($_FILES["profile_picture"])) {
                    $file = $_FILES["profile_picture"];

                    // Retrieve file details
                    $fileName = $file["name"];
                    $fileTmp = $file["tmp_name"];
                    $fileSize = $file["size"];
                    $fileError = $file["error"];

                    // Determine the file extension
                    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                    // Valid file extensions
                    $allowedExtensions = ["jpg", "jpeg", "png"];

                    // Check if the file has a valid extension
                    if (in_array($fileExt, $allowedExtensions)) {
                        // Generate a unique filename to prevent collisions
                        $newFileName = uniqid('', true) . "." . $fileExt;

                        // Set the destination path to store the uploaded image
                        $destination = "Images/" . $newFileName;

                        // Move the uploaded file to the destination path
                        if (move_uploaded_file($fileTmp, $destination)) {
                            // File upload successful
                            // Save the image path in the database
                            // Perform your database query to insert the user data, including the image path, into the appropriate table and columns
                            // For example:
                            // $sql = "INSERT INTO users (profile_picture) VALUES ('$destination')";
                            // $conn -> query($sql);
                            $user_id = random_num(20);
                            $query = "INSERT INTO users (user_name,password,email,first_name,last_name, profile_picture) 
                                    VALUES ('$username','$password','$email','$first_name','$last_name', '$destination')";

                            mysqli_query($conn, $query);

                            // Display a success message to the user
                            echo "Signup successful!";
                        } else {
                            // Error occurred while moving the file
                            echo "Error uploading the profile picture.";
                        }
                    } else {
                        // Invalid file extension
                        echo "Invalid file extension. Only JPG, JPEG, and PNG files are allowed.";
                    }
                } else {
                    // No profile picture was uploaded
                    echo "Please select a profile picture.";
                }
            }


			//save to database
			// $user_id = random_num(20);
			// $query = "INSERT INTO users (user_id,user_name,password,email,first_name,last_name) 
            //         VALUES ('$user_id','$username','$password','$email','$first_name','$last_name')";

			// mysqli_query($conn, $query);

			header("Location: loginpage.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
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
        <a href="start.php" id="logoContainer">
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

                    <form method="post" enctype="multipart/form-data" action="signuppage.php">
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
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="inputBx">
                            <span>Confirm Password</span>
                            <input type="password" name="" placeholder="Confirm Password">
                        </div>
                        <div class="inputBx">
                            <label for="profile_pic">Choose Profile Photo</label>
                            <input type="file" name="profile_picture">
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
