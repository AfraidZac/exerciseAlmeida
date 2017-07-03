<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "user_info";
//Ligaçao com a Base de Dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
if (!isset($_POST['buttonload'])) {
    a:
    echo " 

<html lang='EN'>
<head>
<script src='js/scripts.js'></script>
</head>
<body><title>Login</title>
<form class='form - horizontal' name='form' method='post'>
    <fieldset class>
        <legend>Login</legend>

        <div class='container - fluid well'>

            <div class='form - group '>
                <label class='control-label col-sm-2 ' for='email'>Email</label>
                <div class='col - sm - 3'>
                    <input class='form - control ' required type='email' href=' ? email' name='email' id='email'
                           placeholder='samantha@example.com'>
                </div>
                <div class='col - sm - 3'>
                    <label id='validate'></label>
                </div>
            </div>

            <div class='form - group'>


                <label class='control-label col-sm-2' for='password'>Password</label>
                <div class='col - sm - 3'>
                    <input class='form - control' required type='password' href=' ? email' name='password'
                           id='password'>
                </div>

            </div>
            <button type='submit' name='buttonload' class='btn btn-info' value='login'>Login</button>
        </div>
    </fieldset>
    ";
} else if (isset($_POST['buttonload']) && $_POST['buttonload'] === 'passwordcheck') {
    echo " 
<form method='post' class='form-horizontal' name='form3'>
    <fieldset>
        <legend>ChangePassword</legend>

        <div class='container - fluid well'>

            <div class='form - group '>
                <label class='control-label col-sm-2 ' for='password'>Old Password</label>
                <div class='col - sm - 3'>
                    <input class='form - control ' required type='password' href=' ? passwordchange' name='passwordchange' id='passwordchange' placeholder='Old Password'>
                </div>
                <div class='col - sm - 3'>
                    <label id='validate'></label>
                </div>
            </div>

            <div class='form - group'>


                <label class='control-label col-sm-2' for='password'>New Password</label>
                <div class='col - sm - 3'>
                    <input class='form - control' required type='password' href=' ? passwordcheckconfirmation' name='passwordcheckconfirmation'id='passwordcheckconfirmation' placeholder='New Password'>
                </div>

            </div>
            <button type='submit' name='buttonload' class='btn btn-info' value='change'>Change Password</button>
        </div>
    </fieldset>
 </form>
    ";


} else if (isset($_POST['buttonload']) && $_POST['buttonload'] === 'change') {
    $old = (isset($_POST['passwordchange'])) ? $_POST['passwordchange'] : 'passwordchange';
    $new = (isset($_POST['passwordcheckconfirmation'])) ? $_POST['passwordcheckconfirmation'] : 'passwordcheckconfirmation';
    $email = $_SESSION['email'];
    $pass = $_SESSION['password'];

    $change = "SELECT `id` FROM `login_info` WHERE `email` LIKE '$email'";
    $changereturn = $conn->query($change);
    if ($changereturn->num_rows > 0) {
        $rowid = mysqli_fetch_row($changereturn);
        $id = $rowid[0];
        if ($pass == $old) {
            $updatepass = "UPDATE `login_info` SET `pass` = '$new' WHERE `login_info`.`id` =$id;";
            $updatepassreturn = $conn->query($updatepass);
            if ($updatepassreturn) {
                echo "<div class=\"alert alert-success\" role=\"alert\">Password succesfully changed</div> ";
                goto a;
            } else {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Password is incorrect</div> ";
            }
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Old password does not match</div> ";
            goto a;
        }
    }

} else if (isset($_POST['buttonload']) && $_POST['buttonload'] === 'delete') {
    $email = $_SESSION['email'];
    $selectdelete = "SELECT `id` FROM `login_info` WHERE `login_info`.`email`= '$email'";
    $selectdeletereturn = $conn->query($selectdelete);
    if ($selectdeletereturn->num_rows > 0) {
        $rowiddelete = mysqli_fetch_row($selectdeletereturn);
        $iddelete = $rowiddelete[0];
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Account was not deleted</div> ";
    }
    $deletelogin = "DELETE  FROM `login_info` WHERE `login_info`.`id` = '$iddelete'";
    $deleteloginreturn = $conn->query($deletelogin);

    $deleteregister = "DELETE  FROM `info` WHERE `info`.`id_login` = '$iddelete'";
    $deleteregisterreturn = $conn->query($deleteregister);
    if ($deleteloginreturn) {
        if ($deleteregisterreturn) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Account succesfully deleted</div> ";
        }
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Account was not deleted</div> ";
    }


} else if (isset($_POST['buttonload']) && $_POST['buttonload'] === 'datachange') {
    $addressup = $_POST['address'];
    $countryup = $_POST['country'];
    $zipup = $_POST['postal'];
    $localityup = $_POST['locality'];
    $phoneup = $_POST['phone'];
    $email = $_SESSION['email'];
    $pho = strlen($phoneup);
    $zipi = strlen($zipup);
    $local = strlen($localityup);
    $countryupi = strlen($countryup);
    $add = strlen($addressup);
    if ($pho == 0 || $zipi == 0 || $add == 0 || $countryupi == 0 || $local == 0) {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Account has not been updated, if you want to update fill in all the fields</div> ";
        return false;
    } else {

        $selectdata = "SELECT `id` FROM `login_info` WHERE `login_info`.`email`= '$email'";
        $selectdatareturn = $conn->query($selectdata);
        if ($selectdatareturn->num_rows > 0) {
            $rowidchanges = mysqli_fetch_row($selectdatareturn);
            $idchanges = intval($rowidchanges[0]);
        }

        $updatedata = "UPDATE `info` SET `country` = '$countryup',`address` = '$addressup',`locality` = '$localityup',`phone`='$phoneup',`postal`='$zipup'  WHERE `info`.`id_login` =$idchanges;";
        var_dump($idchanges);
        $udr = $conn->query($updatedata);
        if ($udr) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Account as been updated</div> ";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Account has not been updated</div> ";
        }
        var_dump($udr);
        var_dump($updatedata);

    }
}
?>
<?php
include(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(TEMPLATES_PATH . "/header.php");
if (isset($_POST['buttonload']) && $_POST['buttonload'] === 'login') {

    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 30/06/2017
     * Time: 14:47
     */


    $email = (isset($_POST['email'])) ? $_POST['email'] : 'email';
    $_SESSION['email'] = $email;
    $pass = (isset($_POST['password'])) ? $_POST['password'] : 'password';
    $_SESSION['password'] = $pass;
    $login = "SELECT * FROM `login_info` WHERE `email` LIKE '$email' AND `pass` LIKE '$pass'";
    $loginreturn = $conn->query($login);
    if ($loginreturn->num_rows > 0) {
        echo "<div class=\"alert alert-success\" role=\"alert\">Sucefully logged in</div> ";
        $getdata = "select id from `login_info` where `email` LIKE '$email'";
        $getdatareturn = $conn->query($getdata);
        $rowid = mysqli_fetch_row($getdatareturn);
        $id = $rowid[0];
        $frominfo = "SELECT * from `info` where `id_login` like'$id'";
        $frominforeturn = $conn->query($frominfo);
        if ($frominforeturn->num_rows > 0) {
            $rowdata = mysqli_fetch_row($frominforeturn);
            $firstname = $rowdata[1];
            $lastname = $rowdata[2];
            $address = $rowdata[3];
            $zipcode = $rowdata[4];
            $locality = $rowdata[5];
            $country = $rowdata[6];
            $TIN = $rowdata[7];
            $phone = $rowdata[8];
            echo "<fieldset></fieldset><legend>User Info</legend>
                        <div class=\"container - fluid well\">
                            <div class=\"form - group \">
                                <strong><legend style='color:dodgerblue'>Name</legend></strong>
                                <label class='control-label col-sm-2 ' >$firstname</label>
                                <label class='control-label col-sm-2 ' >$lastname</label>
                            </div>
                            <div class=\"form - group \">
                                <strong><legend style='color:dodgerblue'>Address</legend></strong>
                                <label class='control-label col-sm-2 ' >$address</label>
                            </div>
                              <div class=\"form - group \">
                                <strong><legend style='color:dodgerblue'>Zipcode/Postal</legend></strong>
                                <label class='control-label col-sm-2 ' >$zipcode</label>
                            </div>
                              <div class=\"form - group \">
                                <strong><legend style='color:dodgerblue'>Locality</legend></strong>
                                <label class='control-label col-sm-2 ' >$locality</label>
                            </div>
                              <div class=\"form - group \">
                                <strong><legend style='color:dodgerblue'>Country</legend></strong>
                                <label class='control-label col-sm-2 ' >$country</label>
                            </div>
                              <div class=\"form - group \">
                               <strong><legend style='color:dodgerblue'>TIN</legend></strong>
                                <label class='control-label col-sm-2 ' >$TIN</label>
                            </div>
                              <div class=\"form - group \">
                                <strong><legend style='color:dodgerblue'>Phone number</legend></strong>
                                <label class='control-label col-sm-2 ' >$phone</label>
                            </div>
                         </div>      
                        <form method='post' class='form-horizontal' name='form2'>
    
                         <div class='form-group'>
                             <ul>
                                <label class='control-label col-sm-2'><button type='submit' name='buttonload' value='passwordcheck' class='btn btn-info'>Change Password</label>
                             </ul>
                         </div>
                        </form>
                        
                        
                        <form method='post' class='form-horizontal' name='form3' onsubmit='changes()'>                        
                         <div class=\"form-group\">
<!--data changes-->
                    <label class='control-label col-sm-2' for=\"address\">Address</label>
                    <div class=\"col-sm-6\">
                        <input class=\"form-control\" type='text' name='address' id='address' />
                    </div>

                </div>
                <div class=\"form-group\">

                    <label class='control-label col-sm-2' for='postal' id='labelpostal'>Postal</label>
                    <div class=\"col-sm-2\">
                        <input class=\"form-control\" type='text' name='postal' id='postal' placeholder='xxxx-xxx' maxlength='8' pattern='\d{4}-\d{3}' />
                    </div>
                    <div class=\"col-sm-1\">
                        <label class='control-label col-sm-1' for='locality' id='labellocality'>Locality</label>
                    </div>
                    <div class=\"col-sm-3\">
                        <input class=\"form-control\" type='text' name='locality' id='locality' placeholder='Mafra' />
                    </div>
                </div>
                ";
            include '/wamp64/www/GitHub/exerciseAlmeida/Project/resources/country.php';
            echo "
                 
                <div class=\"form-group\">
                    <p id='listphone'>
                        <label class='control-label col-sm-2' for='phone' id='labelphone'>Phone</label>
                        <div class=\"col-sm-2\">
                            <input class=\"form-control\" type='tel' maxlength='9' pattern='^\d+$' name='phone' id='phone' title='Only portuguese numbers'  />
                        </div>
                        <div class ='col-sm-4'>
                            <label for='phone' class='control-label col-sm-3' id='phonelabel'></label>
                        </div>
                        
                         <div class='form-group'>
                             <ul>
                                <label class='control-label col-sm-2'><button type='submit' name='buttonload' value='datachange' class='btn btn-warning'>Update Data</label>
                             </ul>
                         </div>
 </form>
 <form method='post' class='form-horizontal' name='deleteform'>
    
                         <div class='form-group'>
                             <ul>
                                <label class='control-label col-sm-2'><button type='submit' name='buttonload' value='delete' class='btn btn-danger' disabled>Delete Account</label>
                             </ul>
                              <div class=\"col-sm-6\">
                              <label class='label-control col-sm-6' style='color:darkred'> INSERT DELETE TO DELETE THE ACCOUNT</label>
                            <input class=\"form-control\" type='text' maxlength='6' name='deacc' id='deacc' onkeyup='deleteacc()'/>
                            </div>
                         </div>
                        </form> 
                ";
        }

    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Wrong email or password</div> ";
    }


}


?>

</form>
</body>

</html>

