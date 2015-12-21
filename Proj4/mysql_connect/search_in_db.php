<?php
/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 14.12.15
 * Time: 09:28
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'drapiewp');
define('DB_PSSWD', '');
define('DB_DATABASE', 'test');

function findPersonByLoginPattern($loginPattern) {
    $table_name = "Proj4_users";
    $login_col_name = "login";
    $db = new mysqli(DB_HOST, DB_USER, DB_PSSWD, DB_DATABASE);

    if ($db == null)
        return null;

    $querry =  "SELECT * FROM " . $table_name . " WHERE " . $login_col_name . " LIKE '%" . $loginPattern ."%';" ;
    $reqest_result = $db->query($querry);

    $result_array = null;
    $row_increment = 0;

    while ($one_row_array = $reqest_result->fetch_assoc()) {
        $result_array[$row_increment] = $one_row_array;
        $row_increment++;
    }

    $db->close();
    return $result_array;


}