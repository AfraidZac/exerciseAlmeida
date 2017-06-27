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
$conn= new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "
           <html> 
            <head>
    
                <title>Register</title>
                <center><h1>Registration Form</h1></center>
                
            </head>
            <body>
                <form name='form' method='post' onsubmit='return requiredfields()' >
                    <fieldset>
                        <legend>Registration form</legend>
                        <ul class='nav-justified'>
                        <div class=\"input-group well\">
                            <div class=\"form-group\">
                            
                                <p> <label for=\"email\">Email *</label><input required type='email' name='email' id='email'placeholder='joe@example.com' onkeyup='validateemail(),emailequ()'/><label id=\"validate\"></label></p><br>
                                
                            </div>  
                            <div class=\"form-group\">
                            
                                <p><label for=\"emailcheck\">Email Confirmation*</label><input required type='text' name='emailcheck' id='emailcheck'onkeyup='emailequ()'/><label id='emailcheckequ'/></p><br>
                                
                            </div>  
                            <div class=\"form-group\">
                               
                                <p><label for=\"password\">Password *</label><input required type='password' name='password' id='password' onkeyup='return passtest()'onkeyup='passwordequ()'/></p>
                                
                               </div>
                            <table id=\"show\"></table></p><br>
                            <div class=\"form-group\">
                            
                                <p><label for=\"passwordcheck\">Password Confirmation*</label><input required type='password' name='passwordcheck' id='passwordcheck' onkeyup='passwordequ()'/><label id='passwordcheckequ'></label></p><br>
                                
                            </div>
                            <div class=\"form-group\">
                            
                                <p> <label for=\"firstname\">Name *</label><input required type='text' name='firstname' id='firstname' placeholder='First name'/><input required type='text' name='lastname' id='lastname' placeholder='Last name'/></p><br>
                                
                            </div>
                            <div class=\"form-group\">
                            
                                <p> <label for=\"address\">Address</label><input type='text' name='address' id='address'/></p><br>
                                
                            </div>
                            <div class=\"form-group\">
                            
                                <p><label for='postal' id='labelpostal'>Postal</label><input type='text' name='postal' id='postal' placeholder='xxxx-xxx'onkeyup=' return zipcheck()' pattern='\d{4}-\d{3}'/>  Locality<input type='text' name='locality' id='locality' placeholder='Mafra' /></p><br>
                                
                            </div>
        "?>
<?php
include '/wamp64/www/GitHub/exerciseAlmeida/Project/resources/country.php';
echo"                       <div class=\"form-group\">
                                <p><label id='TINlabel'>TIN</label> <input type='text' pattern='^\d*$' minlength='9' maxlength='9' name='TIN' id='TIN' title = 'Only integer numbers' onsubmit='validatetaxes()'/></p>
                                <label id='valTIN'></label><br>
                            </div>
                            <div class=\"form-group\">
                                <p id='listphone'><label for='phone' id='labelphone'>Phone</label> <input type='tel' maxlength='9' pattern='^\d+$' name='phone' id='phone' title='Only portuguese numbers' /></p><br>
                                
                            </div>
                            </ul>
                            <button type='submit' name='isolated' class=\"btn btn-success\" disabled hidden>Complete</button><br><br><br><br>
                            <h5>* Required fields</h5>
                            </div>
                    </fieldset> 
                </form> 
            </body>
        </html>
        
        ";
if(isset($_POST['isolated'])){
    require 'submit.php';
}
?>


