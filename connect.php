

<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$number = $_POST['number'];
$hearAbout = $_POST['hearAbout'];
$satisfaction = $_POST['satisfaction'];
$recommendation = $_POST['recommendation'];
$travelWebsite = $_POST['travelWebsite'];
$favoriteDestination = $_POST['favoriteDestination'];

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
// $name = mysqli_real_escape_string($conn, $name);
// $email = mysqli_real_escape_string($conn, $email);
// $phone = mysqli_real_escape_string($conn, $phone);
// $message = mysqli_real_escape_string($conn, $message);

$sql = "INSERT INTO survey (first,last,gender, email,number, hearAbout,satisfaction, recommendation,Website,fav) VALUES ('$firstName', '$lastName', '$gender', '$email',$number,'$hearAbout','$satisfaction','$recommendation','$travelWebsite','$favoriteDestination')";

if (mysqli_query($conn, $sql)) {
  // echo "Record inserted successfully";
  echo '<script>alert("Record inserted successful!");</script>';
  header("Location: survey.html");

} else {
  echo "Error: " . mysqli_error($conn);

}

mysqli_close($conn);
?>

