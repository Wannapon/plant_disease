<?php session_start(); ?>
<?php
require("../ConnData/connectDB.php");
$sql = "UPDATE classification SET cl_status_confirm = ''
    WHERE cl_linkmember= '" . $_SESSION["m_id"] . "' AND cl_id='" . $_GET["getCl_id"] . "' ";
if ($conn->query($sql) === TRUE) { } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <script src="../bootstrap/js/zoom_img.js"></script>
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>

    <!-- user id top -->
    <div style="text-align:right;" class="usertop">
        Username :
        <?php echo $_SESSION["m_username"]; ?>
        | Status :
        <?php echo $_SESSION["m_status"]; ?>
    </div>
    <!--end user id top -->

    <!-- slide text -->
    <div class="row">
        <p class="item-1 ">ยินดีต้อนรับ คุณ <?php echo $_SESSION["m_username"]; ?></p>
        <p class="item-2 ">เข้าสู่ระบบคัดแยกโรคพืชของมะม่วง</p>
        <p class="item-3 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION</p>
    </div>
    <!-- end slide text -->

    <div class="container" style="margin-top: 50px;">
        <div class="col-md-4 col-xs-4">
            <!-- home button -->
            <a href="../index.php">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../img/home.png" class="imgabout">
                    <p class="text-img-detail">Home</p>
                </button></a>
        </div>
        <div class="col-md-4 col-xs-4">
            <!-- home button -->
            <a href="#" onclick="window.history.go(-1); return false;">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../img/back.svg" class="imgabout">
                    <p class="text-img-detail">Back</p>
                </button></a>
        </div>
    </div>

    <div class="container box-list">
        <div class="row">
            <div class="col-lg-12 col-xs-12"><br>
                <center>
                    <h4 class="header">Classification ID : <?php echo $_GET["getCl_id"]; ?> </h4>
                </center>
                <hr class="border-line">
            </div>
        </div>
        <div class="row">
            <?php require("../ConnData/connectDB.php"); ?>
            <?php
            $sql = "SELECT * FROM classification WHERE cl_id = '" . $_GET["getCl_id"] . "' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>



                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="row" style="margin-left:auto; margin-right: auto;">

                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <img style="width: 100%" class="myImages" id="myImg" alt="Font Leaf" src="../Image/image_for_checkdisease/<?php echo $row["cl_image"]; ?>">
                                <center>Front Leaf</center>
                            </div>

                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <img style="width: 100%" class="myImages" id="myImg" alt="Back Leaf" src="../Image/image_for_checkdisease/<?php echo $row["cl_image2"]; ?>">
                                <center>Back Leaf</center>
                            </div>

                            <!-- zoom img click -->
                            <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                            </div>

                        </div> <!-- end row -->


                        <br><br>
                        <b>The Disease you detected :</b>
                        <?php echo $row["cl_disease"]; ?><br><br>
                        <b>Expert Confirm Disease :</b>
                        <?php
                        if ($row["cl_confirm"] != '') {
                            echo $row["cl_confirm"];
                        } else {
                            '<div style="color: yellow;">';
                            echo 'Waiting to be confirmed';
                            '</div>';
                        }
                        ?><br><br>
                    </div>

                    <div class="col-lg-12 col-xs-12">
                        <hr class="border-line">
                        <h2>My Classification results</h2>
                        S1 : Leaf become a lesion [ <?php if ($row['cl_S1'] == 1) {
                                                        echo '&#x2713';
                                                    } else {
                                                        echo '&#x2717';
                                                    }   ?> ] <br>
                        S2 : check on lesion area [ <?php if ($row['cl_S2'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    }   ?> ] <br>
                        S3 : Blight on leaf [ <?php if ($row['cl_S3'] == 1) {
                                                    echo '&#x2713 ';
                                                } else {
                                                    echo '&#x2717';
                                                }   ?> ] <br>
                        S4 : Mature lesion are explanded and become dark-brown [ <?php if ($row['cl_S4'] == 1) {
                                                                                        echo '&#x2713 ';
                                                                                    } else {
                                                                                        echo '&#x2717';
                                                                                    } ?> ] <br>
                        S5 : Lesion occur at leaf margin [ <?php if ($row['cl_S5'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            }   ?> ] <br>
                        S6 : Tiny and irregular spot appear on leaf [ <?php if ($row['cl_S6'] == 1) {
                                                                            echo '&#x2713 ';
                                                                        } else {
                                                                            echo '&#x2717';
                                                                        }  ?> ]<br>
                        S7 : Rust-colored or orange spot on leaf [ <?php if ($row['cl_S7'] == 1) {
                                                                        echo '&#x2713 ';
                                                                    } else {
                                                                        echo '&#x2717';
                                                                    } ?> ]<br>
                        S8 : White spot on leaf [ <?php if ($row['cl_S8'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    } ?> ]<br>
                        S9 : Greenish-gray spot on leaf [ <?php if ($row['cl_S9'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            } ?> ]<br>
                        S10 : Brown spot on leaf [ <?php if ($row['cl_S10'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    } ?> ]<br>
                        S11 : Black spot on leaf [ <?php if ($row['cl_S11'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    } ?> ]<br>
                        S12 : Brown or orange powdery appear on the underside of leaf [ <?php if ($row['cl_S12'] == 1) {
                                                                                            echo '&#x2713 ';
                                                                                        } else {
                                                                                            echo '&#x2717';
                                                                                        } ?> ]<br>
                        S13 : Wither on the tip of leaf [ <?php if ($row['cl_S13'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            } ?> ]<br>
                        S14 : Watery around lesion area [ <?php if ($row['cl_S14'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            } ?> ]<br>
                        S13 : Yellow margin around a lesion [ <?php if ($row['cl_S15'] == 1) {
                                                                    echo '&#x2713 ';
                                                                } else {
                                                                    echo '&#x2717';
                                                                } ?> ]<br>
                        S16 : Leaf is irregular shape [ <?php if ($row['cl_S16'] == 1) {
                                                            echo '&#x2713 ';
                                                        } else {
                                                            echo '&#x2717';
                                                        } ?> ]<br>


                    <?php
                }
            }

            ?>
                <a class="btn btn-danger float-right" onclick="window.history.go(-1); return false;" style="color: white; width:80px; margin: 10px;">Back</a>
            </div>

        </div>
    </div> <!-- end container -->

    <footer style="margin-bottom: 50px;">

    </footer>

</body>

<script>
    // create references to the modal...
    var modal = document.getElementById('myModal');
    // to all images -- note I'm using a class!
    var images = document.getElementsByClassName('myImages');
    // the image in the modal
    var modalImg = document.getElementById("img01");
    // and the caption in the modal
    var captionText = document.getElementById("caption");

    // Go through all of the images with our custom class
    for (var i = 0; i < images.length; i++) {
        var img = images[i];
        // and attach our click listener for this image.
        img.onclick = function(evt) {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
    }

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }
</script>

</html>