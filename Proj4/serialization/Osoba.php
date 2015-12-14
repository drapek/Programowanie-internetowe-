<?php

/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 13.12.15
 * Time: 17:03
 */
class Osoba
{
    private $name;
    private $surname;
    private $PESEL;

    function __construct($name, $surname, $PESEL)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->PESEL = $PESEL;
    }

    function __destruct()
    {
        echo 'Destroying: Object Osoba;', PHP_EOL;
    }

    function printObject() {
        echo "Imie: " . $this->name . "<br/>";
        echo "Nazwisko: " . $this->surname . "<br/>";
        echo "PESEL: " . $this->PESEL . "<br/>";
    }

}