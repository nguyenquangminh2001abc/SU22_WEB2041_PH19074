<?php
session_start();
session_destroy();
$id = $_GET['id_hh'];
header("location: index.php?id_hh=$id");
die;
?>