<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'aleksei');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'portfolio_db');

function addEntryToDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected successfully";
        if (isset($_POST['submit'])){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $date = DATE('Y-m-d');
            $time = DATE('H:i:s');
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $stmt = $conn->prepare("INSERT INTO POSTS (title, content, date, time) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $title, $content, $date, $time);

                if ($stmt->execute() === TRUE) {
                    echo "<br> New record added successfully";
                    header('Location: index.php');
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
                $conn->close();
            }
        }
    }
}
addEntryToDB();
?>

<a href="addEntry.html">Back</a>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<!-- 
CREATE TABLE POSTS (
    ID int NOT NULL AUTO_INCREMENT,
    title varchar(255),
    content TEXT,
    date Date,
    time Time,
    PRIMARY KEY (ID)
); -->