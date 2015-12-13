<?php

/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 12.12.15
 * Time: 13:26
 */
class db_operations
{
    private $fileHandler;
    private $last_id_file_stored_in_db = 0;
    private $last_id_package_stored_in_db = 0;

    function db_operations($path_to_db) {

        $this->findLastIds($path_to_db);

        $this->fileHandler = fopen($path_to_db, "a");
        $this->last_id_package_stored_in_db++; //bo musimy dać kolejne id dla nowego pakietu

    }

    //szuka ostatniego id pliku i id pakietu w pliku CSV
    private function findLastIds($path_to_db) {
        $tmpFileHndl = null;
        if(($tmpFileHndl = fopen($path_to_db, "r")) == FALSE) {
            //gdy nie istnieje to go tworzy i wychodzi
            $tmpFileHndl = fopen($path_to_db, "w")
            or die("Nie mogę utworzyć nowego pliku bazy danych! Sprawdź uprawnenia!");
            return;
        }


        while(($data = fgetcsv($tmpFileHndl, 2000, ";", '"' )) != FALSE) {
            $this->last_id_file_stored_in_db = intval($data[0]);
            $this->last_id_package_stored_in_db = intval($data[1]);
        }

        fclose($tmpFileHndl);
    }

    function saveRowToFile($dataArray) {
        $this->last_id_file_stored_in_db++;
        $headerArray = array( $this->last_id_file_stored_in_db, $this->last_id_package_stored_in_db);

        $joinedArrays = array_merge($headerArray, $dataArray);
        fputcsv($this->fileHandler, $joinedArrays, ";", '"');
    }


}