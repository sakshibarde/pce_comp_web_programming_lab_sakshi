<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
        // Database connection details (replace with your actual credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tourism";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Escape user input to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $_POST['uname']);
        $password = mysqli_real_escape_string($conn, $_POST['pass']);
        
        // Fetch user data based on username
        $sql = "SELECT * FROM register WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();  // Get user data as an associative array

            // Verify password using password_verify (requires password_hash in registration)
            if (password_verify($password, $user['password'])){
                
                session_start();  // Start session if not already started
                $_SESSION['username'] = $user['username'];  // Store user ID in session
                header("Location: home.html");  // Redirect to home page
                exit; // Exit to prevent further execution
            } else {
                $errors[] = "Invalid username or password.";
            }
        } else {
            $errors[] = "Invalid username or password.";
        }

        $conn->close();
  
}







