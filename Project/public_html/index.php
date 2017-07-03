<?php
// load up your config file
include(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(TEMPLATES_PATH . "/header.php");
?>
<div id="container">
    <div id="content" class="btn-group btn-group-justified">
        <!-- content -->

        <ul>
            <nav class="nav nav-pills">
                <li role="presentation"><a href="?link=1" name="Register">Register</a></li>
                <li role="presentation"><a href="?link=2" name="Index">Home</a></li>
                <li role="presentation"><a href="?link=3" name="Login">Login</a></li>
            </nav>
        </ul>

        <?php

        $link = (isset($_GET['link'])) ? $_GET['link'] : 'home';
        if ($link == 0) {

        }
        if ($link == '1') {
            include 'form.php';
        }
        if ($link == '2') {
            include 'home.php';
        }
        if($link=='3'){
            include 'login.php';
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


