<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_FILES["image"])) {
    $file = $_FILES["image"];

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
        // Perform your database query to insert the image path into the appropriate table and column
        // For example:
        $sql = "INSERT INTO user_data (profile_pic) VALUES ('$destination')";
        $result = $conn->query($sql);

        // Display a success message to the user
        echo "Image uploaded successfully!";
      } else {
        // Error occurred while moving the file
        echo "Error uploading the file.";
      }
    } else {
      // Invalid file extension
      echo "Invalid file extension. Only JPG, JPEG, and PNG files are allowed.";
    }
  } else {
    // No file was uploaded
    echo "Please select a file to upload.";
  }
}
?>
