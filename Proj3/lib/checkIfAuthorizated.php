<?php
session_start();
$is_autorizated = false;

if( isset($_SESSION['autorizated']) ) {
    $is_autorizated = $_SESSION['autorizated'];
}

if( !$is_autorizated) {
    header("Location:../logon.php");
}

?>