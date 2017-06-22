<?php
// load up your config file
include(realpath(dirname(__FILE__) . "/../resources/config.php"));

require_once(TEMPLATES_PATH . "/header.php");
?>
    <div id="container">
        <div id="content">
            <!-- content -->
        </div>
        <?php
        require_once(TEMPLATES_PATH . "/rightPanel.php");
        ?>
    </div>


<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
