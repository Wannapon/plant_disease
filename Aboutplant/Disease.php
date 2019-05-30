<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Disease in Mango</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

</head>

<body>
    <?php session_start(); ?>
    <div style="text-align:right" class="usertop">
        Username :
        <?php echo $_SESSION["m_username"]; ?>
        | Status :
        <?php echo $_SESSION["m_status"]; ?>

    </div>
    <!-- slide text -->
    <div class="row">
        <p class="item-1 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION [item-1]</p>
        <p class="item-2 ">Some Text for [item-2]</p>
        <p class="item-3 ">Some Text for [item-3]</p>
    </div>
    <!-- end slide text -->

    <div class="container" style="margin-top: 50px;">
        <!-- home button -->
        <div class="col-xs-4 col-md-4">

            <a href="../index.php">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../img/home.png" class="imgabout">
                    <p class="text-img-detail">Home</p>
                </button></a>
        </div>
        <!-- symptoms button -->
        <div class="col-xs-4 col-md-4">

            <a href="Symptoms.php">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../img/symptom.png" class="imgabout">
                    <p class="text-img-detail">Symptoms</p>
                </button></a>
        </div>

    </div>
    
    <div class="container" style="margin-top: 10px;">
        <p class="textabout">Disease in Mango</p>

    <?php require("../ConnData/connectDB.php");?>
    <?php 
        $sql = "SELECT * FROM disease WHERE d_name != 'normal'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>
            
                <div class="row box-disease">
                    <div class="col-xs-12 col-md-4"><br>
                        <img src="../Image/image_disease/<?php echo $row['d_image']; ?>" width="100%" alt="">
                        <br><br>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <h2 class="detail-header">
                            <?php echo $row['d_name']; ?>
                        </h2>
                        <p class="detail">
                            <?php echo $row['d_detail']; ?>
                        </p>
                    </div>
                </div><br>
            
            <?php
            }
        }else{

        }
    ?>
    </div>

    <footer style="margin: 30px;">
        
    </footer>

</body>

</html>