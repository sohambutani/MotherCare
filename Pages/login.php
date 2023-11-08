<?php

require_once "config.php";
require_once "userdataload.php";

$statusMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $emailId = trim($_POST['EmailId']);
    $password = trim($_POST['Password']);

    // validate if email is empty
    if (empty($emailId)) {
        $statusMsg = "Please enter email.";
    }

    // validate if password is empty
    if (empty($password)) {
        $statusMsg = "Please enter your password.";
    }

    if (empty($statusMsg)) {
        if ($query = $db->prepare("SELECT * FROM tblUserLogin WHERE EmailId = ?  LIMIT 1")) {
            $query->bind_param('s', $emailId);
            $query->execute();
            $result = $query->get_result();
            $resultset = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($resultset as $row) {//get first record and break
                break;
            }

            if ($resultset && count($resultset) > 0) {
                if (password_verify($password, $row['Password'])) {
                    session_start();

                    $_SESSION["userid"] = $row['UserLoginId'];
                    $_SESSION["userfirstname"] = $row['FirstName'];
                    $_SESSION["user"] = $row;

                    // Redirect the user to welcome page
                    header("location: index.php");
                    exit;
                } else {
                    $statusMsg = "The password is not valid.";
                }
            } else {
                $statusMsg = "No User exist with that email address.";
            }
        }
        $query->close();
    }
    // Close connection
    mysqli_close($db);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Content/CSS/common.css">
    <link rel="stylesheet" href="../Content/CSS/login.css">
    <link rel="stylesheet" href="../Content/CSS/bootstrap.min.css">
    <script src="../Content/Scripts/jquery_3.2.1_jquery.min.js"></script>
    <script src="../Content/Scripts/bootstrap.bundle.min.js"></script>
    <script src="../Content/Scripts/common.js"></script>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</head>

<body>
    <div class="headerSection">
        <div class="headerLeft">
            <img src="../Content/Images/Common/company-logo.png" alt="hospital_logo" style="width: 100%; height: 100%;">
        </div>
        <div class="headerRight">
            <div class="companyDiv">
                Mother care
            </div>
            <div class="userDiv">
                <?php echo $greetingUser; ?>
            </div>
            <div class="navDiv">
                <div><button class="glow-on-hover" type="button" id="btnHome">Home</button></div>
                <div><button class="glow-on-hover" type="button" id="btnAboutUs">About
                        Us</button></div>
                <div><button class="glow-on-hover" type="button" id="btnDoctors">Doctors</button></div>
                <div><button class="glow-on-hover" type="button" id="btnAppointment">Appointment</button></div>
                <div><button class="glow-on-hover" type="button" id="btnLogin" <?php echo $visibleLoginButton; ?>>Login</button></div>
                <div><button class="glow-on-hover" type="button" id="btnLogout" <?php echo $visibleLogoutButton; ?>>Logout</button></div>
            </div>
        </div>
    </div>
    <div class="bodySection">
        <div class="form-body">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <?php if ($statusMsg != "") {
                            ?>
                                <p class="text-center mt-5 mb-0 text-danger"><?php echo $statusMsg ?></p>
                            <?php
                            }
                            ?>
                            <h3 class="text-center my-3">Login</h3>
                            <form action="" method="POST" class="needs-validation" novalidate>
                                <div class="mb-3">
                                    <label for="EmailId">Email</label>
                                    <input class="form-control" type="email" name="EmailId" id="EmailId" placeholder="E-mail Address" value="<?php if (isset($_POST['EmailId'])) echo $_POST['EmailId']; ?>" required>
                                    <div class="invalid-feedback">Email is required.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="Password">Password</label>
                                    <input class="form-control" type="password" name="Password" id="Password" placeholder="Password" value="<?php if (isset($_POST['Password'])) echo $_POST['Password']; ?>" required>
                                    <div class="invalid-feedback">Password is required.</div>
                                </div>
                                <div class="form-button mt-3">
                                    <button id="submit" type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <p class="text-center text-muted mt-5 mb-0">If you are not already registered?
                                    <a href="signup.php" class="fw-bold text-body"><u>Signup here</u></a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="float: left; width: 100%;height: 22px;"></div>
    <div class="footerSection">
        <div class="footerleft">
            <div style="width: 75%;">
                <img src="../Content/Images/Common/company-logo.png" alt="hospital_logo" style="width: 100%; height: 100%;">
                Mother Care Children Hospital
            </div>
        </div>
        <div class="footermiddle">
            <p><b style="line-height: 1.8;">Address</b><br>
                Mother Care, SVS Rd, Mahim West, Shivaji Park,<br> Mumbai, Maharashtra 400016
            </p>

            <p><b style="line-height: 1.8;">E-mail</b><br>
                mothercarehospital@gmail.com</p>

            <p><b style="line-height: 1.8;">Contact us</b><br>
                +91 90909 09090</p>
        </div>
        <div class="footerright">
            <b style="line-height: 3.8;">Social Profile</b><br>
            <a href="#"><img src="../Content/Images/Common/facebook.png" alt="facebook"></a>
            <a href="#"><img src="../Content/Images/Common/twitter.png" alt="twitter"></a>
            <a href="#"><img src="../Content/Images/Common/instagram.png" alt="instagram"></a>
            <a href="#"><img src="../Content/Images/Common/whatsapp.png" alt="whatsapp"></a>
        </div>
    </div>
</body>

</html>