<?php
session_start();

if (isset($_SESSION['user_logged_in'])) {
    header("location: dashboard.php");
    exit;
}

// MySQL server
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login_table WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['user_logged_in'] = true;
        //cookies
        setcookie('username', $username, time() + (86400 * 30), "/");
        setcookie('password', $password, time() + (86400 * 30), "/");

        header("location: dashboard.php");
        exit;
    } else
        echo "<script>alert('Your Login Name or Password is invalid');</script>";
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login form</title>

</head>

<body>

    <div class="background"></div>

    <div class="home">
        <a class="hme" href="index.php">Home</a>
    </div>

    <div class="container">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <div class="form-item">
                <span class="material-icons-outlined">
                    account_circle
                </span>
                <input type="text" name="username" placeholder="Email or Username" required>
            </div>

            <div class="form-item">
                <span class="material-icons-outlined">
                    lock
                </span>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit">LOGIN</button>
            <p>New User ? <a href="register.php"> Create an Account</a></p>
        </form>
    </div>
</body>

</html>