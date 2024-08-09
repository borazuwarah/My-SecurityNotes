<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

$uploadDir = "uploads/";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $filename = basename($file['name']);
    $uploadfile = $uploadDir . $filename;

    // Debugging messages
    echo "<pre>";
    echo "File information:\n";
    print_r($file);
    echo "</pre>";

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "Error during file upload: " . $file['error'] . "<br>";
    } elseif (!is_uploaded_file($file['tmp_name'])) {
        echo "File upload failed. The file is not a valid uploaded file.<br>";
    } elseif (empty($file['tmp_name'])) {
        echo "No file was uploaded.<br>";
    } else {
        $fileType = mime_content_type($file['tmp_name']);

        // Check if the file is an image
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($fileType, $allowedTypes)) {
            echo "File is of a valid type: $fileType<br>";
            echo "Attempting to move file to $uploadfile<br>";
            if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                echo "File is valid, and was successfully uploaded.<br>";
            } else {
                echo "Possible file upload attack!<br>";
                echo "Check permissions of the directory: " . realpath($uploadDir) . "<br>";
                echo "File upload directory writable: " . (is_writable($uploadDir) ? "Yes" : "No") . "<br>";
            }
        } else {
            echo "Only image files (JPEG, PNG, GIF) are allowed!<br>";
        }
    }
}

// Ensure that the directory exists and is readable
if (is_dir($uploadDir) && is_readable($uploadDir)) {
    $files = scandir($uploadDir);
    if ($files !== false) {
        $files = array_diff($files, array('.', '..'));
    } else {
        $files = [];
    }
} else {
    $files = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload and View Files</title>
</head>
<body>
    <h2>Uploaded Files</h2>
    <ul>
        <?php
        if (isset($files)) {
            foreach ($files as $file) {
                echo "<li><a href='$uploadDir$file' target='_blank'>$file</a></li>";
            }
        }
        ?>
    </ul>

    <h2>Upload a File</h2>
    <form enctype="multipart/form-data" action="upload.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" /> <!-- 5 MB -->
        Choose a file to upload: <input name="file" type="file" accept="image/*" /><br><br>
        <input type="submit" value="Upload File" />
    </form>
</body>
</html>