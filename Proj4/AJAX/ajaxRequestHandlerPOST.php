<?php
/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 21.12.15
 * Time: 15:16
 */
session_start();
$row_nmb = 0;

if( $_POST['type'] == "synch") {

    if(!isset($_SESSION['synchroniousPOST'])) {
        $_SESSION['synchroniousPOST'] = 0;
    }

    $row_nmb = $_SESSION['synchroniousPOST']++;

} else {

    if(!isset($_SESSION['asynchroniousPOST'])) {
        $_SESSION['asynchroniousPOST'] = 0;
    }
    $row_nmb = $_SESSION['asynchroniousPOST']++;
}


$min = $_POST['minVal'];
$max = $_POST['maxVal'];

$randNmb = rand($min, $max);

//aby pokazać różnicę między połączeniem synchronicnzym a asynchronicznym na stronie klienta
if( isset($_POST['sleep_time'])) {
    $time_to_sleep = $_POST['sleep_time'] / 1000;

    //ograniczenie aby nie dawać więcej niż 10s, bo wtedy blokowany jest cały skrypt dla wszystkich klinetów a nie tylko dla konkretnego
    if( $time_to_sleep > 10 )
        $time_to_sleep = 10;

    sleep($time_to_sleep);
}

echo "<tr><td>$row_nmb</td><td>$randNmb</td></tr>";
