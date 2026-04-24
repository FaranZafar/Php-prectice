<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="myFile" required>
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>