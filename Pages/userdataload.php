<?php
// start the session
$visibleLoginButton = '';
$visibleLogoutButton = 'hidden';
$greetingUser = '';

if(session_id() == '') {
    session_start();
 }
 
if (isset($_SESSION["userid"]) == true) {
    $visibleLoginButton = 'hidden';
    $visibleLogoutButton = '';
    $greetingUser = '<img src="../Content/Images/Common/userLogo.png" alt="userLogo" style="padding-top: 10px;" ><br>'.
    'Hi , '.$_SESSION["userfirstname"].'!';
}

?>