<?php 

require "../../functions.php";

$id = $_GET["id"];

hapusPet($id);
header("location: ../index.php");


?>