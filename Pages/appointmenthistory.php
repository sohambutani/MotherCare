<?php

require_once "config.php";
require_once "session.php";
require_once "userdataload.php";

// Get all the appointment from table
$sql = "SELECT * FROM `tblAppointment`";
$all_appointments = mysqli_query($db, $sql);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Content/CSS/common.css">
    <link rel="stylesheet" href="../Content/CSS/appointment.css">
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
                            <h3 class="text-center my-3">Appointment History</h3>
                            <?php
                            // use a while loop to fetch data
                            // from the $all_appointments variable
                            // and individually display as an option
                            while ($appointment = mysqli_fetch_array(
                                $all_appointments,
                                MYSQLI_ASSOC
                            )) :;
                            ?>
                            <div class="row">
                                <div class="col-md-1"><?php echo $appointment["FirstName"]; ?></div>
                                <div class="col-md-1"><?php echo $appointment["LastName"]; ?></div>
                                <div class="col-md-1"><?php echo $appointment["FatherName"]; ?></div>
                                <div class="col-md-1"><?php echo $appointment["MontherName"]; ?></div>
                                <div class="col-md-1"><?php echo $appointment["Gender"]; ?></div>
                                <div class="col-md-1"><?php echo $appointment["Birthdate"]; ?></div>
                                <div class="col-md-1"><?php echo $appointment["MobileNumber"]; ?></div>
                                <div class="col-md-1"><?php echo $appointment["Address"]; ?></div>
                                <div class="col-md-1"><?php echo $appointment["Doctor"]; ?></div>
                                <div class="col-md-1"><?php echo $appointment["AppointmentSchedule"]; ?></div>
                            </div>
                            <?php
                            endwhile;
                            // While loop must be terminated
                            ?>
                            
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