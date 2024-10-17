<?php
 define('DB_HOST', 'localhost');
 define('DB_USER', 'aleksei');
 define('DB_PASSWORD', '123456');
 define('DB_NAME', 'portfolio_db');

function deleteCommentFromPost() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        if (isset($_POST['deletePost'])){
            $postID = $_POST['postID'];
            $commentID = $_POST['commentID'];
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $stmt = $conn->prepare("DELETE FROM COMMENTS WHERE postID = ? AND id = ?");
                $stmt->bind_param("ii", $postID, $commentID);

                if ($stmt->execute() === TRUE) {
                    header('Location: index.php#blog');
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
                $conn->close();
            }
        }
    }
}
deleteCommentFromPost();
?>