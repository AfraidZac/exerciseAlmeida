<?php
    echo"<br><br><br>";
    include(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(TEMPLATES_PATH . "/header.php");
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "user_info";
    //Ligaçao com a Base de Dados
    $conn= new mysqli($servername,$username,$password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $firstname =$_POST['firstname'];
    $lastname =$_POST['lastname'];
    $pass =$_POST['password'];
    $email =$_POST['email'];
    $postal =$_POST['postal'];
    $TIN =$_POST['TIN'];
    $locality =$_POST['locality'];
    $address =$_POST['address'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    echo"<fieldset><legend>feedback</legend>";
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo"$email is a valid email address <br>";
    } else {

        echo("$email is not a valid email address <br>");
        return false;

    }

    $checkphone = "SELECT phone FROM info WHERE phone= '$phone'";
    $resultphone = mysqli_query($conn, $checkphone);

    $checktin = "SELECT taxes_id FROM info WHERE taxes_id = '$TIN'";
    $resulttin = mysqli_query($conn, $checktin);


    $login = "insert into login_info(email,pass) VALUES ('$email','$pass') ";
    $loginreturn = $conn->query($login);
    if ($resultphone->num_rows > 0||$resulttin->num_rows > 0) {
        if ($resultphone->num_rows > 0) {
            while ($row = $resultphone->fetch_assoc()) {
                echo "Phone Number in use, try another valid number. <br>";
            }
        }
        if ($resulttin->num_rows > 0) {
            while ($row = $resulttin->fetch_assoc()) {
                echo "TIN in use, try another valid TIN.<br>";

            }
        }

    }else{

        if ($loginreturn) {
            $getloginid = "SELECT id FROM login_info WHERE email ='$email'";
            $getloginidreturn = $conn->query($getloginid);
            $row = mysqli_fetch_row($getloginidreturn);
            $userid = $row[0];


            $register = "insert into info(id_login,first_name,last_name,address,postal,locality,taxes_id,phone,country) VALUES ($userid,'$firstname','$lastname','$address','$postal','$locality','$TIN','$phone','$country')";
            $registerreturn = $conn->query($register);
            if ($registerreturn) {
                echo "succesfully registered";
            } else {
                echo "error: information is not unique please check TIN or PHONE";
            }

        }else {

            echo "email already in use";
        }
    }
    echo"</fieldset>";
?>
