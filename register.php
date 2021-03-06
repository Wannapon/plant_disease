<?php session_start(); ?>
<?php
if (isset($_SESSION["m_status"])) {
    if ($_SESSION["m_status"] == "admin") {
        header("location:Actor/Admin/AdminPage.php");
    } else if ($_SESSION["m_status"] == "expert") {
        header("location:Actor/Expert/ExpertPage.php");
    } else if ($_SESSION["m_status"] == "user") {
        header("location:Actor/User/UserPage.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plant Disease</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="shortcut icon" href="img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Prompt|Sriracha&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">

        <!-- user register -->
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4"></div>
            <div id="user" class="box col-xs-4 col-sm-4 col-md-4">

                <h1>User Register</h1>
                <p>กรุณากรอกข้อมูลใน * ให้ครบถ้วน</p>
                <br>
                <form action="ConnData/InsertRegister.php" method="post">

                    <p>First Name *</p>
                    <input class="form-control" type="text" name="firstname" placeholder="first name" maxlength="25" required>

                    <p>Last Name *</p>
                    <input class="form-control" type="text" name="lastname" placeholder="last name" maxlength="25" required>

                    <p>Career</p>
                    <select name="career" id="">
                        <option selected="true" disabled="disabled" value="">-- Choose --</option>
                            <option value="เกษตรกร">Farmer (เกษตรกร)</option>
                            <option value="ผู้เชี่ยวชาญด้านการเกษตร">Agricultural experts (ผู้เชี่ยวชาญด้านการเกษตร)</option>
                            <option value="นักวิจัย">Researchers (นักวิจัย)</option>
                            <option value="อาจารย์">Professor (อาจารย์)</option>
                            <option value="ธุรกิจส่วนตัว">Private business (ธุรกิจส่วนตัว)</option>
                            <option value="ข้าราชการ">Public servant (ข้าราชการ)</option>
                            <option value="นักเรียน/นักศึกษา">Student (นักเรียน/นักศึกษา)</option>
                            <option value="อื่นๆ">Other (อื่นๆ)</option>
                    </select>
                            
                    <style>
                        select {
                            text-align: center;
                            text-align-last: center;
                        }
                        
                    </style>


                    <p>Username *</p>
                    <input class="form-control" type="text" name="username" placeholder="username" maxlength="20" required>

                    <p>Password *</p>
                    <input class="form-control" type="password" name="password" placeholder="password" maxlength="20" required>

                    <p>Phone *</p>
                    <input class="form-control" name='phone' type='text' placeholder="number 0-9" value="" OnKeyPress="return chkNumber(this)" required="" maxlength="10">

                    <p>E-mail</p>
                    <input class="form-control" type="email" name="email" placeholder="example@plant.com">

                    <input type="hidden" name="status" value="user">
                    <button type="submit" name="save">Save</button>
                    <br>
                    <a href="index.php">Back</a> |
                    <a href="login.php">Login</a>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4"></div>
        </div>
        </form>
    </div>
    <script language="JavaScript">
        function chkNumber(ele) {
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
            ele.onKeyPress = vchar;
        }
    </script>
</body>

</html>