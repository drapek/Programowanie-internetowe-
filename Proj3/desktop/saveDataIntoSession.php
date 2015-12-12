<?php
/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 05.12.15
 * Time: 10:29
 */
session_start();
$_SESSION['formDataSavedIntoSession'] = true;

$_SESSION['form_name'] = $_POST['name'];
$_SESSION['form_surname'] = $_POST['surname'];
$_SESSION['form_BirthDate'] = $_POST['BirthDate'];
$_SESSION['form_pesel'] = $_POST['pesel'];
$_SESSION['form_sex'] = $_POST['sex'];
$_SESSION['form_stud_field'] = $_POST['stud_field'];
$_SESSION['form_pic'] = $_POST['pic'];
$_SESSION['form_comment'] = $_POST['comment'];
$_SESSION['form_personal_data'] = $_POST['personal_data'];
?>