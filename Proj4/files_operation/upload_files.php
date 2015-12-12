<?php
/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 12.12.15
 * Time: 13:22
 */
require_once('db_operations.php');

/* error printing */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$client_ip_address = $_SERVER['REMOTE_ADDR'];

$db_operat = new db_operations(realpath("./DATABASE")."/DATABASE_UPLOADED_FILES.csv");

$file_nmb = 1; //pozwla przejść po każdym row tabeli przesyłanych plików
//przegląda listę wszystkich przesłanych plików

while( isset($_FILES[('file_'.$file_nmb)]) ) {
    //sprawdzenie czy plik do danego rzędu został załączony plik
    $givenFile = $_FILES['file_'.$file_nmb];
    if( $givenFile['name'] != "") {
        $filePathOnServer = moveFileToDownloadFolder($givenFile);
        $dataToSent = array($givenFile['name'], $givenFile['type'], $givenFile['size'],
                            $_POST['comment_'.$file_nmb], $filePathOnServer, $client_ip_address, date("Y-m-d h:i:sa"));


        $db_operat->saveRowToFile($dataToSent);


    }
    $file_nmb++;
}

//przejdź na stronę z listą przesłanych plików
header("Location:uploaded_files_list.php");

function moveFileToDownloadFolder($whichFile) {
    $destFolderPath = realpath('./DOWNLOADS');
    $destFilePath = $destFolderPath . "/" . $_SERVER['REQUEST_TIME'] . "_"  . basename($whichFile["name"]) ;

    if(move_uploaded_file($whichFile["tmp_name"], $destFilePath)) {
        return $destFilePath;
    } else {
        die( "Nie mogłem przesłać pliku na serwer! Spróbuj ponownie za jakiś czas!");
    }
}

