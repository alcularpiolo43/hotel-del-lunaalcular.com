<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["video"]) && $_images/HOTEL DEL LUNA (2019) - TRAILER.mp4["video"]["error"] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_images/HOTEL DEL LUNA (2019) - TRAILER.mp4["video"]["name"]);
        $uploadOk = 1;
        $videoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size (adjust limit as per your requirement)
        if ($_FILES["video"]["size"] > 100000000) { // 100MB
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats (you can add more formats if needed)
        if ($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov" && $videoFileType != "mpeg") {
            echo "Sorry, only MP4, AVI, MOV, and MPEG files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // If everything is ok, try to upload file
            if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetFile)) {
                echo "The file " . basename($_FILES["video"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file uploaded or an error occurred during upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Upload</title>
</head>
<body>
    <h2>Upload a Video</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="video" id="video">
        <input type="submit" value="Upload Video" name="submit">
    </form>
</body>
</html>
