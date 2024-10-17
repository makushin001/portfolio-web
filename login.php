<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'aleksei');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'portfolio_db');
session_start();


function check_user_against_db() {

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        echo "Connected successfully";
        if (isset($_POST['submit'])){
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            //echo $email . " " . $password;

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $sql = "SELECT * FROM USERS WHERE email='$email' AND password='$password'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $conn->close();
                    $row = $result->fetch_assoc();
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $isAdmin = $row['isAdmin'];
                    $_SESSION['fname'] = $fname;
                    $_SESSION['lname'] = $lname;
                    $_SESSION['email'] = $email;
                    $_SESSION['isAdmin'] = $isAdmin;
                    return true;
                } else {
                    $conn->close();
                    return false;
                }
            }
        }
    }
}

if (check_user_against_db() == true) {
    header("Location: index.php");
} else {
    header("Location: login.html");
}

?>

<a href="login.html">login</a>





<!-- 
    CREATE TABLE USERS (
    id INT NOT NULL AUTO_INCREMENT,
    fname VARCHAR(255),
    lname VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    isAdmin TINYINT(1),
    PRIMARY KEY (id)
);

-->