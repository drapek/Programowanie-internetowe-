<?php

/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 13.12.15
 * Time: 17:03
 */
class Student extends Osoba
{
    private $avg_mark;

    function __construct($name, $surname, $PESEL, $mark)
    {
        parent::__construct($name, $surname, $PESEL);
        $this->avg_mark = $mark;
    }

    function __destruct()
    {
        echo 'Destroying: Object Student;', PHP_EOL;
    }

    function printObject() {
        parent::printObject();

        echo "Ocena: " . $this->avg_mark . "<br/>";

    }
}