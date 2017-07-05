<?php
include(realpath(dirname(__FILE__) . "/../resources/config.php"));

$email= $_POST['email'];
if(isset($_POST['email'])){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {



        $getloginid = "SELECT id FROM login_info WHERE email ='$email'";
        $getloginidreturn = $conn->query($getloginid);
        $row = mysqli_fetch_row($getloginidreturn);
        $userid = $row[0];

        if($userid > 0) {
          echo "<span style=\"color:darkred;\">✗ Email is not valid!</span>";
        }else{
            echo "<span style=\"color:green;\">✔ Email is valid!</span>";

        }
    }


}
?>




