

--installation:
sudo mysql_secure_installation
sudo apt install php libapache2-mod-php php-mysql



--crear BD en mysql


CREATE DATABASE ctf_db; USE ctf_db; CREATE TABLE users ( user VARCHAR(50), password VARCHAR(255) ); 

INSERT INTO users (user, password) VALUES ('user1', MD5('password1'));
INSERT INTO users (user, password) VALUES ('user2', MD5('password12'));
INSERT INTO users (user, password) VALUES ('user3', MD5('password123'));
INSERT INTO users (user, password) VALUES ('user4', MD5('password1234'));



CREATE USER 'nuevo_usuario'@'localhost' IDENTIFIED BY 'contraseña';
GRANT ALL PRIVILEGES ON * . * TO 'nuevo_usuario'@'localhost';
FLUSH PRIVILEGES;




------
PHP file
```sh fold:"php insecure file"
<?php 
$servername = "localhost"; 
$username = "root"; 
$password = "tu_contraseña"; 
$dbname = "ctf_db"; 
$conn = new mysqli($servername, $username, $password, $dbname); if ($conn->connect_error) 
	{ 
	die("Connection failed: " . $conn->connect_error);
	} 
$user = $_POST['user']; $pass = $_POST['pass']; $sql = "SELECT * FROM users WHERE user='$user' AND password=MD5('$pass')"; 
$result = $conn->query($sql); if ($result->num_rows > 0)
{ 
	echo "Login successful!"; 
	} 
	else { echo "Login failed!"; 
} 
$conn->close(); ?>
```

```sh fold:"php vulknerabilidad"
<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    include("uploads/$file");
}
?>
```



```sh fold:"php formulario LFI"
<?php 
if ($_FILES)
	{ 
	$file = $_FILES['file']; 
	$filename = basename($file['name']);
	$uploadfile = "uploads/$filename";
	if (move_uploaded_file($file['tmp_name'], $uploadfile)) 
	{ 
		echo "File is valid, and was successfully uploaded.\n";
	} 
	else 
	{ 
	echo "Possible file upload attack!\n";
	 } 
} 
?> 
<form enctype="multipart/form-data" action="upload.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="30000" /> Choose a file to upload: <input name="file" type="file" />
<input type="submit" value="Upload File" />
</form>

```
-----------------------
Version 2 en PHP
login.php


```sh fold:"php login"
<?php
session_start();

$servername = "localhost";
$username = "ctf_user";
$password = "password";
$dbname = "ctf_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Vulnerable SQL query
    $sql = "SELECT * FROM users WHERE user='$user' AND password=MD5('$pass')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        header("Location: upload.php");
        exit();
    } else {
        echo "Login failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="login.php">
        Username: <input type="text" name="user"><br>
        Password: <input type="password" name="pass"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

```

```sh fold:"upload.php"
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
    $fileType = mime_content_type($file['tmp_name']);

    // Check if the file is an image
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.<br>";
        } else {
            echo "Possible file upload attack!<br>";
        }
    } else {
        echo "Only image files (JPEG, PNG, GIF) are allowed!<br>";
    }
}

$files = array_diff(scandir($uploadDir), array('.', '..'));
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
        foreach ($files as $file) {
            echo "<li><a href='$uploadDir$file' target='_blank'>$file</a></li>";
        }
        ?>
    </ul>

    <h2>Upload a File</h2>
    <form enctype="multipart/form-data" action="upload.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        Choose a file to upload: <input name="file" type="file" /><br>
        <input type="submit" value="Upload File" />
    </form>
</body>
</html>


```

//agregar reverse shell a un fichero imagen:
