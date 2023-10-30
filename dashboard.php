<?php
include('connection.php');
$select = "SELECT * FROM recipe ORDER BY RAND () LIMIT 6 ";
$result = mysqli_query($con, $select);
if (isset($_POST['search'])) {
    $ser = $_POST['key'];
    $select = "select * from recipe where name like '%$ser%'";
    $result = mysqli_query($con, $select);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="Timepass.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav>
        <lable class="logo">
            <img class="navlogo" src="recipes_/navlogo.jpeg" alt="">
            <p style="margin: 10px; font-size: 25px; align-items: center;">
            <h2 class="heading">FEASTIFY</h2>
            </p>
            <form action="" method="post">
                <input name="key" class="Search" type="text" placeholder="    Search for the recipe you want to cook today">
                <button name="search" value="1" style="display:none;">
                    search
                </button>
            </form>
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
    <div class="row">
        <?php
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['id'];
        ?>
            <div class="col-md-4 d-flex">
                <div class="card">
                    <div class="card__content" height="750px">
                        <h1 class="center" height="10%"><?php echo $data['name']; ?></h1>
                        <img src="recipes_/<?php echo $id; ?>.jpg" alt="" height="20%">
                        <div class="ing1 colorr"height= "40%">
                            <h2> Ingredients : </h2>
                            <br>
                            <br>
                            <ul>
                                <?php
                                $query2 = "select  * from r_i where rid='$id'";
                                $res2 = mysqli_query($con, $query2);
                                for($i=0;$i<5;$i++){
                                if($data2 = mysqli_fetch_assoc($res2)) {
                                    $iid = $data2['iid'];
                                    $queryI = "select * from ingredients where id='$iid'";
                                    $res3 = mysqli_query($con, $queryI);
                                    $data1 = mysqli_fetch_assoc($res3);

                                ?>
                                    <li>
                                    <?php
                                    echo $data1['name'];
                                }
                                else
                                {
                                    echo "    "."<br>";
                                }
                            }
                                    ?>
                                    </li>
                            </ul>
                        </div>
                        <div height="40%">
                        <button class="recipek" onclick="window.location.href='mainpage.php?id=<?php echo $id; ?>'"> Recipe
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>