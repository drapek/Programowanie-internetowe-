<?php
/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 21.12.15
 * Time: 15:16
 */
session_start();
$row_nmb = 0;

if( $_GET['type'] == "synch") {

    if(!isset($_SESSION['synchroniousGET'])) {
        $_SESSION['synchroniousGET'] = 0;
    }

    $row_nmb = $_SESSION['synchroniousGET']++;

} else {

    if(!isset($_SESSION['asynchroniousGET'])) {
        $_SESSION['asynchroniousGET'] = 0;
    }
    $row_nmb = $_SESSION['asynchroniousGET']++;
}


$min = $_GET['minVal'];
$max = $_GET['maxVal'];

$randNmb = rand($min, $max);


echo "<tr><td>$row_nmb</td><td>$randNmb</td></tr>";
