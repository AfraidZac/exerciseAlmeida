<?php
// load up your config file
include(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(TEMPLATES_PATH . "/header.php");
?>
    <div id="container">
        <div id="content">
            <!-- content -->

            <li><a href="?link=1" name="Register">link 1</a></li>
            <li><a href="?link=2" name="Login">link 2</a></li>

            <?php



            $link = (isset($_GET['link']))? $_GET['link']: 'home';
            if ($link == 0){

            }
            if ($link == '1'){
                include 'form.php';
            }
            if ($link == '2'){
                include 'submit.php';
            }

            ?>
        </div>
        <?php
        require_once(TEMPLATES_PATH . "/rightPanel.php");
        ?>
    </div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
