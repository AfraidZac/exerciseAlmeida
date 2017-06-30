<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 22/06/2017
 * Time: 12:10
 */
include(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(TEMPLATES_PATH . "/header.php");

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "user_info";
//Connection with the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "
<html>

<head>

    <title>Register</title>
    <center>
        <h1>Registration Form</h1>
    </center>

</head>

<body>
    <form class=\"form-horizontal\" name='form' method='post' onsubmit='return requiredfields()'>
        <fieldset>
            <legend>Registration form</legend>

            <div class=\"container-fluid well\">
"; ?><?php
if (isset($_POST['isolated'])) {
    require 'submit.php';
}
echo "
                <div class=\"form-group \">
                    <label class='control-label col-sm-2 ' for=\"email\">Email*</label>
                    <div class=\"col-sm-3\">
                        <input class=\"form-control \" oncopy=\"return false\" oncut=\"return false\" onpaste=\"return false\" required type='email' name='email' id='email' placeholder='joe@example.com' onkeyup='validateemail(),returnonkyup()'>
                    </div>
                    <div class=\"col-sm-3\">
                        <label id=\"validate\"></label>
                    </div>
                </div>


                <div class=\"form-group\">
                    <label class='control-label col-sm-2' for=\"emailcheck\">Email Confirmation*</label>
                    <div class=\"col-sm-3\">
                        <input class=\"form-control\" oncopy=\"return false\" oncut=\"return false\" onpaste=\"return false\" required type='text' name='emailcheck' id='emailcheck' onkeyup='emailequ()' />
                    </div>
                    <div class=\"col-sm-3\">
                        <label id='emailcheckequ' />
                    </div>
                </div>



                <div class=\"form-group\">


                    <label class='control-label col-sm-2' for=\"password\">Password *</label>
                    <div class=\"col-sm-3\">
                        <input class=\"form-control\" oncopy=\"return false\" oncut=\"return false\" onpaste=\"return false\" required type='password' name='password' id='password' onkeyup='passtest(),returnonkyup()' ;>
                    </div>
                    <div class=\"col-sm-3\">
                        <div class=\"progress \" height: 10px>
                            <div class=\"progress-bar progress-bar-danger\" id=\"password-progress-bar\" role=\"progressbar\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 0\"></div>
                            <span id='showmsg'> </span>
                        </div>
                    </div>
                    <div class='col-sm-2'>
                        <label id='weaklabel'></label>
                    </div>

                </div>

                <div class=\"form-group\">


                    <label class='control-label col-sm-2' for=\"passwordcheck\">Password Confirmation*</label>
                    <div class=\"col-sm-3\">
                        <input class=\"form-control\" required oncopy=\"return false\" oncut=\"return false\" onpaste=\"return false\" type='password' name='passwordcheck' id='passwordcheck' onkeyup='passwordequ()' />
                    </div>
                    <div class=\"col-sm-2\">
                        <label id='passwordcheckequ'></label>
                    </div>
                    <div class=\"col-sm-2\">
                        <label id='pe'></label>
                    </div>


                </div>
                <div class=\"form-group \">
                    <label class='control-label col-sm-2' for=\"firstname\">Name *</label>
                    <div class=\"col-sm-3\">
                        <input class=\"form-control\" required type='text' name='firstname' id='firstname' placeholder='First name' onkeyup='returnonkyup()' />
                    </div>
                    <div class=\"col-sm-3\">
                        <input class=\"form-control\" required type='text' name='lastname' id='lastname' placeholder='Last name' onkeyup='returnonkyup()' />
                    </div>

                </div>


                <div class=\"form-group\">

                    <label class='control-label col-sm-2' for=\"address\">Address</label>
                    <div class=\"col-sm-6\">
                        <input class=\"form-control\" type='text' name='address' id='address' />
                    </div>

                </div>
                <div class=\"form-group\">

                    <label class='control-label col-sm-2' for='postal' id='labelpostal'>Postal</label>
                    <div class=\"col-sm-2\">
                        <input class=\"form-control\" type='text' name='postal' id='postal' placeholder='xxxx-xxx' onkeyup=' return zipcheck(),returnonkyup()' pattern='\d{4}-\d{3}' />
                    </div>
                    <div class=\"col-sm-1\">
                        <label class='control-label col-sm-1' for='locality' id='labellocality'>Locality</label>
                    </div>
                    <div class=\"col-sm-3\">
                        <input class=\"form-control\" type='text' name='locality' id='locality' placeholder='Mafra' />
                    </div>
                </div>
        ";
?>
<?php
include '/wamp64/www/GitHub/exerciseAlmeida/Project/resources/country.php';
echo "         <div class=\"form-group\">

                    <label class='control-label col-sm-2' id='TINlabel'>TIN</label>
                    <div class=\"col-sm-2\">
                        <input class=\"form-control\" type='text' pattern='^\d*$' minlength='9' maxlength='9' name='TIN' id='TIN' title='Only integer numbers' onkeyup='validatetaxes(),returnonkyup()'>
                    </div>
                    <label id='valTIN'></label>

                </div>
                <div class=\"form-group\">
                    <p id='listphone'>
                        <label class='control-label col-sm-2' for='phone' id='labelphone'>Phone</label>
                        <div class=\"col-sm-2\">
                            <input class=\"form-control\" type='tel' maxlength='9' pattern='^\d+$' name='phone' id='phone' title='Only portuguese numbers' onkeyup='returnonkyup()' />
                        </div>
                        <div class ='col-sm-4'>
                            <label fot='phone' class='control-label col-sm-3' id='phonelabel'></label>
                        </div>



                </div>
                <div class='form-group'>
                    <div class=\"col-sm-2\"></div>
                    <h5>* Required fields</h5>
                </div>

                <button type='submit' name='isolated' class=\"btn btn-success\" disabled hidden>Complete</button>




            </div>
        </fieldset>
    </form>
</body>

</html>
";

?>

