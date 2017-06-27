<?php
$email= $_POST['email'];
if(isset($_POST['email'])){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "user_info";
        //Connection with the database
        $conn= new mysqli($servername,$username,$password,$dbname);


        $getloginid = "SELECT id FROM login_info WHERE email ='$email'";
        $getloginidreturn = $conn->query($getloginid);
        $row = mysqli_fetch_row($getloginidreturn);
        $userid = $row[0];

        if($userid > 0) {
            echo "Email allready in use";
        }else{
            echo "Email is not in use";
        }
    }


}
?>




