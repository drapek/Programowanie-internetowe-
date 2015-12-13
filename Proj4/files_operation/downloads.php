<?php
/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 13.12.15
 * Time: 12:47
 */


if( isset($_GET['p']) ) {
    $file = $_GET['p'];
    $info_from_db = findTmpName($file);
    $tmpFile_name = $info_from_db['tmp_name'];
    $file_type = $info_from_db['type'];

    if($tmpFile_name == null)
        die("Nie odnalazłem danego pliku!");

    $file_path = realpath('./DOWNLOADS') . "/" . $tmpFile_name;


    if (file_exists($file_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: '. $file_type);
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        exit;
    }

}

//na serwerze pliki są zapisywane z unikalną nazwą, wiec musimy sięgnąć po nią do bazy danych
function findTmpName($serach_file_name) {
    $path_to_db = realpath('./DATABASE') . "/DATABASE_UPLOADED_FILES.csv";
    $db_search = fopen($path_to_db, "r")
        or die("Nie odnalazłem pliku bazy danych!");

    while(($data = fgetcsv($db_search, 2000, ";", '"' )) != FALSE) {
        if($data[2] == $serach_file_name) {
            $ret = array(  'tmp_name' => basename($data[6]),
                            'type' => $data[3]);
        fclose($db_search);
            return $ret;
        }

    }
    fclose($db_search);
    return null;
}

?>
