<?php

include('connection.php');
if (isset($_POST['signup'])) {

    $un = $_POST['un'];
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $quert1 = "select * from login where username='$un'";
    $result = mysqli_query($con, $quert1);
    if (mysqli_num_rows($result) > 0) {
        $error[] = "username already exists";
    } else {
        $query = "insert into login values( '','$un','$mail','$pwd')";
        $res = mysqli_query($con, $query);
        if ($res) {
            $error[] = "user created successfully";
            header('location:index.php');
        } else {
            $error[] = "there was an error creating user";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            text-decoration: none;
            box-sizing: border-box;

        }

        body {
            background-color: #ece5f0;
        }

        .logo {
            display: flex;
            align-items: center;
            /* justify-content: center; */
        }

        .logo h2 {
            color: #ece5f0;

        }




        nav {
            background-color: #1e1e11;
            height: 80px;
            width: 100%;
            font-family: 'Times New Roman', Times, serif;

        }

        .logo img {
            width: 65px;
            height: 65px;
            line-height: 70px;
            padding: 6px 5px;
            margin-top: 5px;
            margin-left: 5px;
            border-radius: 50%;
        }

        nav ul {
            float: right;
            margin-right: 20px;
            margin-top: -72px
        }

        nav ul li {
            display: inline-block;
            line-height: 80px;
            margin: 5px;
            font-size: 25px;
            margin-top: -1px;
            margin-left: 5px;
            color: rgb(47, 79, 79);
            padding: 5px;
        }

        nav ul li a {
            color: white;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .form {
            margin-top: 130px;
            margin-left: 550px;
            height: 450px;
            width: 400px;
            background-color: rgba(17, 24, 39, 1);
            color: white;
        }

        .submit {
            margin-left: 150px;
            height: 60px;
            width: 100px;
            border-radius: 30px;
            color: white;
            background-color: rgba(167, 139, 250, 1);
            border-style: 2px solid black;
        }

        .input-group {
            margin-top: 0.25rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .input-group label {
            display: block;
            color: rgba(156, 163, 175, 1);
            margin-bottom: 4px;
        }

        .input-group input {
            width: 350px;
            border-radius: 0.375rem;
            border: 1px solid rgba(55, 65, 81, 1);
            outline: 0;
            background-color: rgba(17, 24, 39, 1);
            padding: 0.75rem 0rem;
            color: rgba(243, 244, 246, 1);
            margin-left: 18px;
        }

        .input-group input:focus {
            border-color: rgba(167, 139, 250);
        }

        span {
            margin-left: 10px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 20px;
        }

        button:hover {
            transform: translate(-0.05em, -0.05em);
            box-shadow: 0.15em 0.15em;
        }

        button:active {
            transform: translate(0.05em, 0.05em);
            box-shadow: 0.05em 0.05em;
        }

        .contact {
            z-index: 1;
            background: #5cbdfd;
            font-family: inherit;
            padding: 0.6em 1.3em;
            font-weight: 900;
            font-size: 18px;
            border: 3px solid black;
            border-radius: 0.4em;
            box-shadow: 0.1em 0.1em;
            margin-left: 130px;
            margin-top: 30px;
            font-size: 25px;
        }
    </style>
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
    <div class="register">
        <div class="form-container">
            <form class="form" method="post" action="">
                <h1 style="margin-left:140px;">Signup</h1>
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<center><span class="error-msg">' . $error . '</span></center>';
                    };
                };
                ?>
                <br>
                <hr>
                <br>
                <div class="input-group">
                    <label for="username">
                        <span>Enter Username</span>
                    </label>
                    <input type="text" placeholder="" name="un">
                </div>
                <br>
                <div class="input-group">
                    <label for="password">
                        <span>Enter Email-id</span>
                    </label>
                    <input type="email" placeholder="" name="mail">
                </div>
                <br>
                <div class="input-group">
                    <label for="password">
                        <span>Create Password</span>
                    </label>
                    <input type="password" placeholder="" name="pwd">
                    <button class="contact" type="submit" name="signup" value="1">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>