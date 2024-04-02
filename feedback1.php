

 <?php
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "tourism";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$message = mysqli_real_escape_string($conn, $message);

$sql = "INSERT INTO feedback (Yourname, Youremail, Phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if (mysqli_query($conn, $sql)) {
  header("Location:feedback.html");
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>


