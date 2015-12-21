/**
 * Created by drapek on 14.12.15.
 */

function fillUserPatternInput($user_login, $user_name, $user_surname) {
    console.log("Wywołano funkcje fillUserPatternInput z parametrami: " + $user_login + $user_name + $user_surname);

    $user_input_login_pattern = document.getElementById("login_pattern");
    $user_input_name = document.getElementById("Imie");
    $user_input_surname = document.getElementById("Nazwisko");

    $user_input_login_pattern.value = $user_login;
    $user_input_name.value = $user_name;
    $user_input_surname.value = $user_surname;

}
