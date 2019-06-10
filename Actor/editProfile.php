<?php session_start();
require_once("../ConnData/connectDB.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <div class="container" style="margin-bottom: 50px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 col-xs-12"><br>
                <h4 class="header">Edit Profile</h4>
                <hr class="border-line" style="margin-top: 0px;">
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-1"></div>
            <div class="col-lg-4 col-xs-10">
                <?php
                $sql = "SELECT * FROM member WHERE m_id='" . $_SESSION['m_id'] . "' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { // Open IF
                    $row = $result->fetch_assoc();
                    ?>
                    <form action="../ConnData/EditProfile.php" method="post" enctype="multipart/form-data"  id="form1" runat="server">
                        <center>
                        <?php if($_SESSION['m_imageprofile']==''){ ?>
                            <img id="blah" class="pf-img" src="../img/pageicon/aboutme.png" class="about-img">
                        <?php }else{ ?>
                            <img id="blah" class="pf-img" src="../Image/image_profile/<?php echo $row["m_imageprofile"]; ?>" >
                        <?php } ?>
                        </center>
                        <br>
                        <label>Profile :</label>
                        <input type="file" id="image" name="imageprofile[]"> <br><br>

                        <label>First Name</label>
                        <input class="form-control" type="text" name="firstname" value="<?php echo $row["m_firstname"]; ?>" maxlength="25" required>

                        <label>Last Name</label>
                        <input class="form-control" type="text" name="lastname" value="<?php echo $row["m_lastname"]; ?>" maxlength="25" required>

                        <label>E-mail</label>
                        <input class="form-control" type="email" name="email" value="<?php echo $row["m_email"]; ?>" required>

                        <label>Phone</label>
                        <input class="form-control" type='text' name='phone' value="<?php echo $row["m_phone"]; ?>" OnKeyPress="return chkNumber(this)" required="" maxlength="10">

                        <label>User Name</label>
                        <input class="form-control" type="text" name="username" value="<?php echo $row["m_username"]; ?>" maxlength="10" required>

                        <label>Your Password</label>
                        <input class="form-control" type="text" name="password" value="<?php echo $row["m_password"]; ?>" maxlength="10" disabled="disabled">

                        <label>New Password</label>
                        <input class="form-control" type="text" name="password" value="<?php echo $row["m_password"]; ?>"  maxlength="10" >
                        <br>

                        <button class="form-control btn-primary" type="submit" name="save">Save</button>
                        <br>
                        <a class="btn btn-danger float-right" href="../Posts/post_list_person.php" style="width:100%;">Back</a>

                    </form>
                </div>
                <div class="col-lg-4 col-xs-1"></div>
                <footer >

                </footer>
            <?php // Close IF
        }
        $conn->close();
        ?>
        </div>
    </div>
    <script language="JavaScript">
        function chkNumber(ele) {
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
            ele.onKeyPress = vchar;
        }
    </script>
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function() {
            readURL(this);
        });
    </script>
</body>

</html>