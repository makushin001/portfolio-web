<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'aleksei');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'portfolio_db');
session_start();




function register_user() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (isset($_POST['submit'])){
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $isAdmin = 0;
        echo $email . " " . $password. " ". $fname . " " . $lname;
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO USERS (fname, lname, email, password, isAdmin) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $fname, $lname, $email, $password, $isAdmin);
            if ($stmt->execute()) {
                echo "User registered successfully";
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['email'] = $email;
                $_SESSION['isAdmin'] = 0;
                return true;
            } else {
                echo "Error: " . $stmt->error;
                return false;
            }
            $stmt->close();
            $conn->close();
        }
    }else{
        echo "No submit";
    }
}


if (register_user() == true) {
    header("Location: index.php");
} else {
    header("Location: register.html");
}
?>