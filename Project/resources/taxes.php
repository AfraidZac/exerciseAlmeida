<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 27/06/2017
 * Time: 11:24
 */
$postal = $_POST['TIN'];

    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "user_info";
    //Connection with the database
    $conn= new mysqli($servername,$username,$password,$dbname);
if ($postal>0){
    $checktin = "SELECT taxes_id FROM info WHERE taxes_id = '$postal'";
    $resulttin = mysqli_query($conn, $checktin);
if(strlen($postal)==9){
    if ($resulttin->num_rows > 0) {
        while ($row = $resulttin->fetch_assoc()) {
            echo "<span style='color:red'>TIN in use, try another valid TIN.</span>";
        }
        }else{
        echo "<span style='color:darkgreen'>TIN is valid</span>";
    }}}
?>