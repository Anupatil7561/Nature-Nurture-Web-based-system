<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password']))
         {
            echo "Login Successfully..,<a href='index.html'>Go</a>";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that username.";
    }
}

$conn->close();
?>
