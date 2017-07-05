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


$config = array(
    "urls" => array(
        "baseUrl" => "localhost:8080"
    ),
    "paths" => array(
        "resources" => "/path/to/resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/images/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/images/layout"
        )
    )
);
defined("LIBRARY_PATH")
or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));
defined("TEMPLATES_PATH")
or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
ini_set("error_reporting", "true");
error_reporting(E_ALL | E_STRCT);
?>
