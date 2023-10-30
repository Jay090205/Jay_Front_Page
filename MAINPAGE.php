<?php
include('connection.php');
$id = $_GET['id'];
$query = "select * from recipe where id='$id'";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            text-decoration: none;
            box-sizing: border-box;

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
            margin-top: -72px;
        }

        nav ul li {
            display: inline-block;
            line-height: 80px;
            margin: 5px;
            font-size: 25px;
            margin-top: 2px;
            margin-left: 5px;
            color: rgb(47, 79, 79);
            padding: 5px;
        }

        nav ul li a {
            color: white;
        }

        .Name {
            margin: 5px;
        }

        .BTN {
            border: 3px solid;
            border-radius: 5px;
            background-color: #5cbdfd;
            width: 200px;
            /* margin-left: 200px;
            margin-bottom: -30px; */
        }

        .Name h2 {
            margin: 15px;
            color: black;
        }



        .Center {
            text-align: center;
            color: black;
        }

        #img1 {
            width: 500px;
            height: 400px;
            margin-left: 62.5px;
            margin-top: 45px;
            border: 4px solid black;
            border-radius: 20px;
        }

        #img2 {
            width: 200px;
            height: 150px;
            margin-left: 62.5px;
            margin-top: 21px;
            border: 4px solid black;
            border-radius: 15px;
        }

        #img3 {
            width: 200px;
            height: 150px;
            margin-left: 95px;
            margin-top: 21px;
            border: 4px solid black;
            border-radius: 15px;
        }

        /* .Line {
            border: 3px solid #003B36;
            border-radius: 5px;
            width: 0px;
            height: 850px;
            margin-left: 600px;
            margin-top: -828px
        } */

        .Horizontal {
            width: 500px;
            height: 0px;
            margin-left: 62.5px;
            border: 3px solid #003B36;
            border-radius: 5px;
            margin-top: 10px;
        }

        .Title {
            margin-left: 65px;
            margin-top: 10px;
            font-size: 50px;
        }

        .List ul {
            margin-left: 200px;
            margin-top: -30px;
            font-size: 30px;
        }

        .List1 ul {
            margin-top: 10px;
            font-size: 30px;
            text-align: left;
            margin-left: 800px;
        }

        .Center {
            margin-left: -100px;
            margin-top: -834px;
        }
    </style>
</head>

<body style="background-color : #FCF7F8; ">
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
    <div class="Name">
        <button class="BTN">
            <h2><?php
                $res1 = mysqli_query($con, $query);
                $data = mysqli_fetch_assoc($res1);
                echo $data['name'];
                $recipe = $data['recipe'];
                ?></h2>
        </button>
    </div>
    <div class="Main">
        <img src="recipes_/<?php echo $id ?>.jpg" alt="" id="img1">
        <div>
            <img src="recipes_/<?php echo $id ?>_1.jpg" alt="" id="img2">
            <img src="recipes_/<?php echo $id ?>_2.jpg" alt="" id="img3">
            <div class="Horizontal"></div>
            <div>
                <h2 class="Title"> Ingredients : </h2>
                <br>
                <br>
                <div class="List">
                    <ul>
                        <?php
                        $query2 = "select  * from r_i where rid='$id'";
                        $res2 = mysqli_query($con, $query2);
                        while ($data = mysqli_fetch_assoc($res2)) {
                            $iid = $data['iid'];
                            $queryI = "select * from ingredients where id='$iid'";
                            $res3 = mysqli_query($con, $queryI);
                            $data1 = mysqli_fetch_assoc($res3);

                        ?>
                            <li>
                            <?php
                            echo $data1['name'];
                        }
                            ?>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="Line"></div> -->
        <div class="Center">
            <h1>Recipe : </h1>
            <br>
            <div class="List1">
                <ul>
                    <?php
                    // $recipe = $data['recipe'];

                    $row = explode(".", $recipe);
                    for ($i = 0; $i < sizeof($row)-1; $i++) {

                        echo $i+1 . ")" .  $row[$i] . "<br>";
                    }
                    ?>
                </ul>
            </div>



        </div>
    </div>
</body>

</html>