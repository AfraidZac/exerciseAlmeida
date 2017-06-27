
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
                <center><h1>Register Form</h1></center>
                
            </head>
            <body>
            <form name='form' method='post' onsubmit='return requiredfields()' >
                <fieldset>
                    <legend>Registation form</legend>
                    <li>Email *<input type='email' name='email' id='email'placeholder='joe@example.com'/></li><br>
                    <li>Email confirmation *<input type='text' name='emailcheck' id='emailcheck'/></li><br>
                    <li>Password *<input type='password' name='password' id='password' onkeyup='return passtest()'/>
                    <table id=\"show\"></table></li><br>
                    <li>Password confirmation *<input type='password' name='passwordcheck' id='passwordcheck'/></li><br>
                    <li>Name *<input type='text' name='firstname' id='firstname' placeholder='First name'/><input type='text' name='lastname' id='lastname' placeholder='Last name'/></li><br>
                    <li>Address <input type='text' name='address' id='address'/></li><br>
                    <li>Postal <input type='text' name='postal' id='postal' placeholder='xxxx-xxx'onkeyup=' return zipcheck()' pattern='\d{4}-\d{3}'/> <input type='text' name='locality' id='locality' placeholder='Mafra' /></li><br>
        "?>
<?php
        include '/wamp64/www/GitHub/exerciseAlmeida/Project/resources/country.php';
        echo"
                    <li>TIN <input type='text' pattern='^\d+$' maxlength='9' name='TIN' id='TIN' required title = 'Only intiger numbers'/></li><br>
                    <li>Phone <input type='tel' maxlength='9' pattern='^\d+$' name='phone' id='phone' required title='Only portuguese numbers' /></li><br>
                    <button type='submit' name='isolated'>Complete</button><br><br><br><br>
                    <h5>* Required fields</h5>
                </fieldset> 
            </form>
            
            </body>
        </html>
        
        ";
    if(isset($_POST['isolated'])){
        require 'submit.php';
    }
?>