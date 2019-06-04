<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All_Member </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/main.css">
    <link rel="shortcut icon" href="img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
</head>

<body>
    <?php session_start(); ?>
    <!-- user id top -->
    <div style="text-align:right;" class="usertop">
        Username :
        <?php echo $_SESSION["m_username"]; ?>
        | Status :
        <?php echo $_SESSION["m_status"]; ?>
    </div>
    <!--end user id top -->
    <?php
    if ($_POST["checkUp"] == 'success') {
        ?>
        <script>
            swal({
                title: "Up status User to Expert Success",
                type: "success",
                confirmButtonText: 'OK',
                confirmButtonColor: '',
            }, function() {
                <?php $_POST["checkUp"] = 0 ?>
            });
        </script>
    <?php
}
?>

    <!-- slide text -->
    <div class="row">
        <p class="item-1 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION [item-1]</p>
        <p class="item-2 ">Some Text for [item-2]</p>
        <p class="item-3 ">Some Text for [item-3]</p>
    </div>
    <!-- end slide text -->

    <div class="container" style="margin-top: 50px;">
        <!-- home button -->
        <div class="col-md-4 col-xs4">
            <a href="index.php">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="img/home.png" class="imgabout">
                    <p class="text-img-detail">Home</p>
                </button></a>
        </div>
    </div>
    <div class="container box-list"> <br>

        <!-- Row 1 -->
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                <h1 style="text-align:center;"> All Member .</h1>
            </div>
            <div class="col-lg-4 col-xs-12">
                <label>Search By Status : <?php if ($_GET['changStatus'] == '') {
                                                echo 'All';
                                            } else {
                                                echo $_GET['changStatus'];
                                            } ?></label>
                <form action="" method="GET">
                    <select class="form-control col-lg-12 col-xs-12" id="selectBox" name="changStatus" onchange="this.form.submit()">
                        <option value="" selected>Choose</option>
                        <option value="user">User</option>
                        <option value="expert">Expert</option>
                        <option value="admin">Admin</option>
                        <option value="">All</option>
                    </select>
            </div>
        </div>
        <br>
        <!-- Row 2 -->
        <div class="row" style="margin:10px; overflow-x:auto;">

            <?php require("ConnData/connectDB.php"); ?>
            <?php
            if ($_GET['changStatus'] == '') {
                $sql = "SELECT * FROM member ";
            } else if ($_GET['changStatus'] != '') {
                $sql = "SELECT * FROM member WHERE m_status= '" . $_GET['changStatus'] . "' ";
            }
            ?>
            <?php
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                ?> <table style='width:100%'>
                    <tr>
                        <th style='width: 5%'>ID</th>
                        <th style='width:18%'>Firstname</th>
                        <th style='width:17%'>Lastname</th>
                        <th style='width:15%'>E-mail</th>
                        <th style='width:10%'>Phone</th>
                        <th style='width:10%'>Username</th>
                        <th style='width:10%'>Status</th>
                        <?php if ($_GET['changStatus'] == 'user') { ?>
                            <th style='width:15%'>Update Status</th>
                        <?php } ?>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?> <tr>
                            <td><?php echo $row["m_id"]; ?></td>
                            <td><?php echo $row["m_firstname"]; ?></td>
                            <td><?php echo $row["m_lastname"]; ?></td>
                            <td><?php echo $row["m_email"]; ?></td>
                            <td><?php echo $row["m_phone"]; ?></td>
                            <td><?php echo $row["m_username"]; ?></td>
                            <td><?php echo $row["m_status"]; ?></td>
                            <?php if ($_GET['changStatus'] == 'user') { ?>
                                <td onclick="UpStatus(<?php echo $row["m_id"]; ?>,<?php echo "'" . $row["m_username"] . "'"; ?>)">
                                    <a href="#">UP to Expert</a></td>
                            <?php } ?>


                        </tr>
                    <?php
                }
                ?>
                </table> <?php
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    // session_start(); // test session
                    // echo $_SESSION["m_firstname"];    

                    ?>
        </div> <!-- end row table -->
        <br>
    </div> <!-- end container -->

</body>
<script>
    function UpStatus(m_id, m_username) {
        swal({
            title: "Are you sure?",
            text: "You Want Up Status for ID " + m_id + " Username " + m_username + ' to Expert',
            type: "warning",
            confirmButtonText: 'OK',
            confirmButtonColor: '#DD6B55',

            showCancelButton: true,
        }, function() {
            // swal("Log Out!", " ", "success");
            //     setTimeout(function(){
            window.location.href = 'ConnData/UpdateStatus.php?getID=' + m_id;
            //     },4000);
        });
    }
</script>
<style>
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 2px solid #ddd;
    }

    th,
    td {
        border: 2px solid #ddd;
        border-collapse: collapse;
        text-align: left;
        text-indent: 5px;
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

</html>