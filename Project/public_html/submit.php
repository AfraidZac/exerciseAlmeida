<?php
include(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(TEMPLATES_PATH . "/header.php");
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "user_info";
//Ligaçao com a Base de Dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$pass = $_POST['password'];
$email = $_POST['email'];
$postal = $_POST['postal'];
$TIN = intval($_POST['TIN']);
$locality = $_POST['locality'];
$address = $_POST['address'];
$phone = intval($_POST['phone']);
$country = $_POST['country'];


if ($TIN > 0) {
    $checktin = "SELECT taxes_id FROM info WHERE taxes_id = '$TIN'";
    $resulttin = mysqli_query($conn, $checktin);

    if ($resulttin->num_rows > 0) {
        while ($row = $resulttin->fetch_assoc()) {
            echo "<div class=\"alert alert-danger\" role=\"alert\">TIN is allready in use</div>";
            echo "</fieldset></div></ul>";
            return false;
        }

    }
}
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<div class=\"alert alert-success\" role=\"alert\">$email is a valid address</div> ";
    $login = "insert into login_info(email,pass) VALUES ('$email','$pass') ";
    $loginreturn = $conn->query($login);

    if ($loginreturn) {

        $getloginid = "SELECT id FROM login_info WHERE email ='$email'";
        $getloginidreturn = $conn->query($getloginid);
        $row = mysqli_fetch_row($getloginidreturn);
        $userid = $row[0];


        $register = "insert into info(id_login,first_name,last_name,address,postal,locality,taxes_id,phone,country) VALUES ($userid,'$firstname','$lastname','$address','$postal','$locality','$TIN','$phone','$country')";
        $registerreturn = $conn->query($register);
        if ($registerreturn) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Succesfully registered</div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">error: information is not unique please check TIN or PHONE</div>";
        }

    } else {

        echo "<div class=\"alert alert-danger\" role=\"alert\">$email allready in use</div>";
    }
} else {

    echo("<div class=\"alert alert-danger\" role=\"alert\">$email is not a valid address</div>");
    return false;

}


?>