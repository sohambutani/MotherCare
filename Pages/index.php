<?php
require_once "userdataload.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Content/CSS/common.css">
    <link rel="stylesheet" href="../Content/CSS/home.css">
    <script src="../Content/Scripts/jquery_3.2.1_jquery.min.js"></script>
    <script src="../Content/Scripts/common.js"></script>
    <script>
        $(function() {
            //value for animation  
            var width = 1460;
            var animationSpeed = 1000;
            var pause = 3000;
            var currentSlide = 1;
            //Dom element.   
            var $slider = $('#slider');
            var $sliderAnimation = $slider.find('.slides');
            var $slides = $sliderAnimation.find('.slide');

            setInterval(function() {
                $sliderAnimation.animate({
                    'margin-left': '-=' + width
                }, animationSpeed, function() {
                    currentSlide++;
                    if (currentSlide === $slides.length) {
                        $sliderAnimation.css('margin-left', 0);
                        currentSlide = 1;
                    }
                });
            }, pause);
        });
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
        <div class="bodyHome">
            <div id="slider">
                <ul class="slides">
                    <li class="slide"><img src="../Content/Images/Slider/homeSliderImage1.jpg" /></li>
                    <li class="slide"><img src="../Content/Images/Slider/homeSliderImage2.jpg" /></li>
                    <li class="slide"><img src="../Content/Images/Slider/homeSliderImage3.jpg" /></li>
                    <li class="slide"><img src="../Content/Images/Slider/homeSliderImage6.jpg" /></li>
                    <li class="slide"><img src="../Content/Images/Slider/homeSliderImage4.jpg" /></li>

                </ul>
            </div>

            <div class="detailsSection" style="float: left;">
                <p style="padding-right: 10px;">At Mother Care, we are dedicated to providing exceptional healthcare for
                    children of all
                    ages. As a leading pediatric medical center, we understand the unique needs of young patients and
                    their
                    families. Our commitment is to deliver compassionate care, innovative treatments, and comprehensive
                    support, ensuring that every child receives the highest quality medical services. We offer a wide
                    range
                    of medical services, covering various specialties such as cardiology, oncology, neurology,
                    orthopedics,
                    gastroenterology, pulmonology, and many more. Our specialists have extensive experience in
                    diagnosing
                    and treating pediatric conditions, ensuring the best possible outcomes for our young patients.</p>
            </div>
            <div class="imageSection" style="float: right;">
                <img src="../Content/Images/Common/building.jpg" alt="hospital_building" style="width: 100%; height: 100%;">
            </div>
            <div class="imageSection" style="float: left;">
                <img src="../Content/Images/Common/hospital_staf.jpg" alt="hospital_staf" style="width: 100%; height: 100%;">
            </div>
            <div class="detailsSection" style="float: right;">
                <p style="padding-left: 10px;">Our hospital is staffed by a team of highly skilled and experienced
                    pediatric
                    specialists, including
                    physicians, nurses, therapists, and other healthcare professionals. We pride ourselves on
                    maintaining a
                    warm and welcoming environment where children and their families feel comfortable and supported
                    throughout their medical journey.Our hospital is equipped with advanced medical technology and
                    state-of-the-art facilities, allowing us to deliver cutting-edge treatments and procedures. We
                    continuously invest in the latest advancements to ensure accurate diagnoses, minimally invasive
                    surgeries, and effective therapies.</p>
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