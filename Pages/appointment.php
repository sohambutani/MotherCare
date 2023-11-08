<?php

require_once "config.php";
require_once "session.php";
require_once "userdataload.php";

// Get all the doctors from table
$sql = "SELECT * FROM `tblDoctor`";
$all_doctors = mysqli_query($db, $sql);

$doctorSelected = 0;    
$statusMsg = "";
$statusFlag = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = trim($_POST['FirstName']);
    $lastName = trim($_POST['LastName']);
    $fatherName = trim($_POST['FatherName']);
    $montherName = trim($_POST['MontherName']);
    $gender = (int)trim($_POST["Gender"]);
    $birthdate = date('Y-m-d', strtotime(trim($_POST["Birthdate"])));
    $mobileNumber = (int)trim($_POST['MobileNumber']);
    $address = trim($_POST['Address']);
    $doctor = (int)trim($_POST['Doctor']);
    $doctorSelected = $doctor;
    $appointmentSchedule = date('Y-m-d H:i:s', strtotime(trim($_POST['AppointmentSchedule'])));

    $insertQuery = "INSERT INTO tblAppointment (FirstName, LastName, FatherName, MotherName, Gender, Birthdate, MobileNumber, Address, DoctorId, AppointmentSchedule)
    VALUES
    ('$firstName', '$lastName', '$fatherName', '$montherName', $gender, '$birthdate', $mobileNumber, '$address', $doctor, '$appointmentSchedule')";

    if ($db->query($insertQuery) === TRUE) {
        $statusMsg = "Your appointment schedule successful!";
        $statusFlag = 1;
    } else {
        //echo "Error: " . $insertQuery . "<br>" . $db->error;
        $statusMsg = "Something went wrong!";
    }
    // Close DB connection
    mysqli_close($db);
}
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
                            <?php
                            if ($statusFlag == 1) {
                            ?>
                                <p class="text-center mt-5 mb-0 text-success"><?php echo $statusMsg ?> <a href="appointment.php" class="fw-bold text-body .text-primary"><u>Book New Appointment here</u></a></p>
                                <?php
                            } else {
                                if ($statusMsg != "") {
                                ?>
                                    <p class="text-center mt-5 mb-0 text-danger"><?php echo $statusMsg ?></p>
                                <?php
                                }
                                ?>
                                <h3 class="text-center my-3">Appointment Form</h3>
                                <!-- <a href="appointmenthistory.php" class="fw-bold text-body .text-primary"><u>Appointment History</u></a> -->
                                <form action="" method="POST" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="FirstName">First name</label>
                                            <input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="" value="<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>" required>
                                            <div class="invalid-feedback">
                                                First name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="LastName">Last name</label>
                                            <input type="text" class="form-control" name="LastName" id="LastName" placeholder="" value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>" required>
                                            <div class="invalid-feedback">
                                                Last name is required.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="FatherName">Father Name</label>
                                        <input type="text" class="form-control" name="FatherName" id="FatherName" placeholder="" value="<?php if (isset($_POST['FatherName'])) echo $_POST['FatherName']; ?>" required>
                                        <div class="invalid-feedback">
                                            Father name is required.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="MontherName">Mother Name<span class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control" name="MontherName" id="MontherName" placeholder="" value="<?php if (isset($_POST['MontherName'])) echo $_POST['MontherName']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-3 mr-1" for="Gender">Gender: </label>
                                        <input type="radio" class="btn-check" name="Gender" id="male" autocomplete="off" value="1" <?php if (isset($_POST['Gender']) && $_POST['Gender'] == "1") echo "checked"; ?> required>
                                        <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>
                                        <input type="radio" class="btn-check" name="Gender" id="female" autocomplete="off" value="2" <?php if (isset($_POST['Gender']) && $_POST['Gender'] == "2") echo "checked"; ?> required>
                                        <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>
                                        <input type="radio" class="btn-check" name="Gender" id="other" autocomplete="off" value="3" <?php if (isset($_POST['Gender']) && $_POST['Gender'] == "3") echo "checked"; ?> required>
                                        <label class="btn btn-sm btn-outline-secondary" for="other">other</label>
                                        <div class="invalid-feedback mv-up">Please select a gender!</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Birthdate">Birthdate</label>
                                        <input type="date" class="form-control" name="Birthdate" id="Birthdate" placeholder="" value="<?php if (isset($_POST['Birthdate'])) echo $_POST['Birthdate']; ?>" required>
                                        <div class="invalid-feedback">
                                            Birthdate is required.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="MobileNumber">Mobile Number</label>
                                        <input type="number" class=" form-control" name="MobileNumber" id="MobileNumber" placeholder="" value="<?php if (isset($_POST['MobileNumber'])) echo $_POST['MobileNumber']; ?>" min="10" max="9999999999" required />
                                        <div class="invalid-feedback">
                                            Valid mobile number is required.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Address">Address<span class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control" name="Address" id="Address" placeholder="" value="<?php if (isset($_POST['Address'])) echo $_POST['Address']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Doctor">Doctor</label>
                                        <select class="form-select mt-3" name="Doctor" id="Doctor" required>
                                            <option disabled value="0" <?php if ($doctorSelected == 0) echo "selected" ?>>Select</option>
                                            <?php
                                            // use a while loop to fetch data
                                            // from the $all_doctors variable
                                            // and individually display as an option
                                            while ($doctor = mysqli_fetch_array(
                                                $all_doctors,
                                                MYSQLI_ASSOC
                                            )) :;
                                            ?>
                                                <option value="<?php echo $doctor["DoctorId"];
                                                                // The value we usually set is the primary key
                                                                ?>" <?php if ($doctorSelected == $doctor["DoctorId"]) echo "selected" ?>>
                                                    <?php echo $doctor["Title"] . " " . $doctor["FirstName"] . " " . $doctor["LastName"];
                                                    // To show the doctor name to the user
                                                    ?>
                                                </option>
                                            <?php
                                            endwhile;
                                            // While loop must be terminated
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">Please select a doctor!</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="AppointmentSchedule">Appointment Schedule</label>
                                        <input type="datetime-local" class="form-control" name="AppointmentSchedule" id="AppointmentSchedule" placeholder="" value="<?php if (isset($_POST['AppointmentSchedule'])) echo $_POST['AppointmentSchedule']; ?>" required>
                                        <div class="invalid-feedback">
                                            Appointment schedule is required.
                                        </div>
                                    </div>
                                    <div class="form-button mt-3">
                                        <button id="submit" type="submit" class="btn btn-primary">Book Appointment</button>
                                    </div>
                                </form>
                            <?php
                            } ?>
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