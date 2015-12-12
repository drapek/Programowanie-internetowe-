<?php
/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 04.12.15
 * Time: 22:03
 */
    session_start();
    $error_information = "";

    if( isset($_POST['username']) && isset($_POST['passwd']) ) {
        if( $_POST['username'] == "student" &&
            $_POST['passwd'] == "zet") {

            $_SESSION['autorizated'] = true;
            //idź do strony głównej tego projektu
            header("Location:desktop/index.php ");
        }
        else {
            $_SESSION['autorizated'] = false;
            header("Location:logon.php ");

        }
    } else {
        $error_information = "Nie odnalazłem w przesłanych danych pół username i passwd";
    }

    if( !($error_information == "")) {
        echo "Wystąpił problem wewnętrzny serwera!";
    }