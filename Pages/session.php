<?php
// start the session
if(session_id() == '') {
   session_start();
}

if (isset($_SESSION["userid"]) == false) {
   header("location: login.php");
   exit;
}
?>