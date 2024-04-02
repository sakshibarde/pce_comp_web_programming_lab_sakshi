<?php
$name=$_POST["name"];
$contact_no=$_POST["no"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$gender=$_POST["mygender"];
$mode=$_POST["mo"];
$destination=$_POST["loc"];

$servername = "localhost";
$username = "root";
$password = "";
$database ="tourism";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// $sql = "insert into booknow(name,contact_no,email,dob,gender,mode,destination) values('$name','$contact_no','$email','$dob','$gender','$mode','$destination') ";
// $sql = "INSERT INTO booknow (name, contact_no, email, dob, gender, mode, destination) VALUES ('$name', '$contact_no', '$email', '$dob', '$gender', '$mode', '$destination')";
$sql = "INSERT INTO booknow (name, contact_no, email, dob, gender, mode, destination) VALUES ('$name', '$contact_no', '$email', '$dob', '$gender', '$mode', '$destination')";



if (mysqli_query($conn, $sql)) {
  // echo "Record Inserted successfully";
  echo '<script>alert("Booked successful!");</script>';
} else {
  echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="booking.css">
    <script src="booking.js"></script>
</head>

<body>
    <h1>Make Your Reservation</h1>
    <div class="box">
        <form method="post" action="booking.php" name="booking" onsubmit="return formValidation()">
          <!-- <form method="post" action="session.php" name="booking"></form> -->
            <div class="group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name">
            </div>
            <div class="group">
                <label for="no">Contact no:</label>
                <input type="number" id="no" name="no">
            </div>
            <div class="group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="group">
                <label for="dob">DOB</label>
                <input type="date" id="dob" name="dob">
            </div>
            <div class="group">
                <label>Gender:</label>
                <label for="male">Male</label>
                <input type="radio" id="male" name="mygender">
                <label for="female">Female</label>
                <input type="radio" id="female" name="mygender">
            </div>
            <div class="group">
                <label for="mode">Mode Of Transport</label>
                <select name="mo" id="mode">
                    <option value=""></option>
                    <option value="Road">Road</option>
                    <option value="Railway">Railway</option>
                    <option value="Airway">Airway</option>
                </select>
            </div>
            <div class="group">
                <label for="location">Destination</label>
                <select name="loc" id="location">
                    <option value=""></option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Kerela">Kerela</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Assam">Assam</option>
                    <option value="Odish">Odish</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                </select>
            </div>
            <input type="submit">
        </form>
    </div>
</body>

</html>

