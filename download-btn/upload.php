<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['myFile'];

    // File properties
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    // Define where to save the file
    $uploadDirectory = "uploads/";
    $destPath = $uploadDirectory . basename($fileName);

    // Check for errors and move the file
    if ($fileError === 0) {
        if (move_uploaded_file($fileTmpName, $destPath)) {
            echo "<h2>Upload Successful!</h2>";
            echo "<p>Your file is ready for download:</p>";
            
            // Generate the download link for the "other page"
            echo "<a href='$destPath' download>Download " . htmlspecialchars($fileName) . "</a>";
            
            echo "<br><br><a href='index.php'>Upload another file</a>";
        } else {
            echo "There was an error moving the uploaded file.";
        }
    } else {
        echo "Error uploading file. Code: " . $fileError;
    }
}
?>