<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_query = "SELECT * FROM `login_table` WHERE username='$username' AND password='$password'";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        $insert_query = "INSERT INTO `login_table` (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($connection, $insert_query)) {
            echo "<script>alert('User registered successfully'); window.location.href='login.php';</script>";
            exit;
        } else
            echo "<script>alert('User registered successfully'); window.location.href='register.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="background"></div>

    <div class="home">
        <a class="hme" href="index.php">Home</a>
    </div>

    <div class="container">
        <h2>Register</h2>
        <form action="" method="POST">
            <div class="form-item">
                <span class="material-icons-outlined">account_circle</span>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="form-item">
                <span class="material-icons-outlined">lock</span>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit">REGISTER</button>
        </form>
    </div>
</body>

</html>