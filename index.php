<?php
session_start();
session_destroy();
session_start();
$con = mysqli_connect('localhost', 'root', '', 'feastify');
if (isset($_POST['Login'])) {
    print_r($_POST);
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $select = "select * from login where username='$username' && password='$pass'";
    $result = mysqli_query($con, $select);
    if (mysqli_num_rows($result) > 0) {
        print_r($_POST);
        $_SESSION['suid'] = $username;
        header('location:dashboard.php');
    } else {
        $error[] = "Incorrect ID or Password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feastify</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <nav>
        <lable class="logo">
            <img class="navlogo" src="recipes_/navlogo.jpeg" alt="">
            <p style="margin: 10px; font-size: 25px; align-items: center;">
            <h2 class="heading">FEASTIFY</h2>
            </p>
    
        </lable>

        <ul>
            <li><a href="contact.html">
                    <h3>Contact Us</h3>
                </a></li>
            <li><a href="about.html">
                    <h3>About Us</h3>
                </a></li>
            <li><a href="services.html">
                    <h3>Services</h3>
                </a></li>
        </ul>
    </nav>
    <div class="container">

        <div class="container">
            <span>W</span>
            <span>E</span>
            <span>L</span>
            <span>C</span>
            <span>O</span>
            <span>M</span>
            <span>E</span>
        </div>

    </div>
    <div class="intropic">
        <img class="bigphoto" src="recipes_/mainimg.jpeg">

        <h1 class="center">We bring to You Feastify</h1>

        <h1 class="center">Login and open the world of Feastify</h1>
    </div>

    <div class="form-container">
        <p class="title">Login</p>
        <?php
        if (isset($error)) {
            foreach ($error as $error) {
                echo '<center><span class="error-msg">' . $error . '</span></center>';
            };
        };
        ?><br>
        <form class="form" action="" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="">
            </div>
            <br>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="">
            </div>
            <br>
            <br>

            <button class="sign" name="Login" value="1">Sign in</button>
            <br>
            <br>
        </form>
        <button class="sign" onclick="window.location.href='signup.php'"> Sign up</button>
    </div>
</body>

</html>