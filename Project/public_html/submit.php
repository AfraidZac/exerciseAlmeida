<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 22/06/2017
     * Time: 14:13
     */
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

    $login = "insert into login_info(email,pass) VALUES ('$email','$pass') ";
    $loginreturn = $conn->query($login);
        if($loginreturn){
            $getloginid = "SELECT id FROM login_info WHERE email ='$email'";

            $getloginidreturn=$conn->query($getloginid);

            $row=mysqli_fetch_row($getloginidreturn);

            $userid=$row[0];

            $register = "insert into info(id_login,first_name,last_name,address,postal,locality,taxes_id,phone,country) VALUES ($userid,'$firstname','$lastname','$address','$postal','$locality','$TIN','$phone','$country')";

            $registerreturn=$conn->query($register);

                if($registerreturn){
                    echo"succesfully registed";
                }else{
                    echo "error";
                }
        }else{
            echo"email is not unique";
        }

?>