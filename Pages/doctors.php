<?php
require_once "userdataload.php";
?>
<html lang="en">

<head>
    <link rel="stylesheet" href="home_page.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Content/CSS/common.css">
    <link rel="stylesheet" href="../Content/CSS/doctors.css">
    <script src="../Content/Scripts/jquery_3.2.1_jquery.min.js"></script>
    <script src="../Content/Scripts/common.js"></script>
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
        <div class="doctorsForm">
            <div>
                <div><img src="../Content/Images/Doctors/MD.jpg" alt="MD logo"
                    style="width: 100%; height: 100%;"></div>
                <div><b> <span style="font-size: 23px;"> Dr. Jason Diamond</span></b><br><span>M.D. Pediatrics</span></div>
            </div>
            <div>
                <div><img src="../Content/Images/Doctors/doctor1.jpg" alt="MD logo"
                    style="width: 100%; height: 100%;"></div>
                <div><b> <span style="font-size: 23px;"> Dr. Vartika Jain</span></b><br><span>M.D. Pediatrics</span></div>
            </div>
            <div>
                <div><img src="../Content/Images/Doctors/doctor2.jpg" alt="MD logo"
                    style="width: 100%; height: 100%;"></div>
                <div><b> <span style="font-size: 23px;"> Dr. Shivam Gupta</span></b><br><span>DCH Pediatrics</span></div>
            </div>
            <div>
                <div><img src="../Content/Images/Doctors/doctor3.jpg" alt="MD logo"
                    style="width: 100%; height: 100%;"></div>
                <div><b> <span style="font-size: 23px;"> Dr. Anubhav Sharma</span></b><br><span>M.D. Pediatrics</span></div>
            </div>
            <div>
                <div><img src="../Content/Images/Doctors/doctor7.jpg" alt="MD logo"
                    style="width: 100%; height: 100%;"></div>
                <div><b> <span style="font-size: 23px;"> Dr. Tanya Sale</span></b><br><span>MBBS,DNB Pediatrics</span></div>
            </div>
            <div>
                <div><img src="../Content/Images/Doctors/doctor5.jpg" alt="MD logo"
                    style="width: 100%; height: 100%;"></div>
                <div><b> <span style="font-size: 23px;"> Dr. John Barrasso</span></b><br><span>M.D. Pediatrics</span></div>
            </div>
        </div>
    </div>
    <div style="float: left; width: 100%;height: 22px;"></div>
    <div class="footerSection">
        <div class="footerleft">
            <div style="width: 75%;">
                <img src="../Content/Images/Common/company-logo.png" alt="hospital_logo"
                    style="width: 100%; height: 100%;">
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