<?php
session_start();

function unsetSession() {
    unset($_SESSION['year']);
    unset($_SESSION['month']);
}

function processFormData() {
    if (isset($_POST['submit'])) {
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['month'] = $_POST['month'];
        header('Location: index.php#blog');
        exit();
    }
}

if ((!isset($_POST['submit'])) && (isset($_POST['reset']))) {
    unsetSession();
    echo "Form not submitted";
    header('Location: index.php#blog');
} else {
    processFormData();
}

?>