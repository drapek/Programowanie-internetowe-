<?php
require_once("../lib/checkIfAuthorizated.php");
require_once("../lib/checkIfMobile.php");
require_once("saveDataIntoSession.php");
?>

<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <title>Programowanie Internetowe - projekt 3</title>
    <meta name="keywords" content="Nauka JS, programowanie, Politechnika Warszawska" />
    <meta name="description" content="Strona z wykonanym projektem zaliczeniowym przedmiotu Programowanie Internetowe" />
    <meta name="author" content="Paweł Drapiewski">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,200,500,600,700,800,300" rel="stylesheet" />
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="formProccessorStyle.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
    <!--[if IE 6]>
    <link href="default_ie6.css" rel="stylesheet" type="text/css" />
    <![endif]-->
</head>

<body>
<div id="wrapper">
    <div id="menu-wrapper">
        <div id="menu" class="container">
            <ul>
                <li class="current_page_item"><a href="./index.php">Strona główna projektu</a></li>
                <li><a href="http://volt.iem.pw.edu.pl/~drapiewp/">Strona główna mojego profilu </a></li>

            </ul>
        </div>
        <!-- end #menu -->
        <div id="header-wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <h1><a href="#">Programowanie Internetowe projekt 3</a></h1>
                </div>
            </div>
        </div>
    </div>
    <div id="banner"><img class="image" src="images/js-LOGO.jpg" alt="js-LOGO"/> </div>
    <div id="page" class="container">
        <div id="content">
            <div class="title">
                <h2>Dane wysłane prawidłowo</h2>

            </div>

            <p id="form_result">Następujące dane zostały do nas wysłane:</p>

            <div class="dataAsTable">
                <div class="data_row data_odd">
                    <div class="data_cell data_title">
                        <span class="sended_form_label">Imię: </span>
                    </div>
                    <div class="data_cell data_title">
                        <span class="sended_form_value"> <?=$_POST['name']?></span>
                    </div>
                </div>
                <div class="data_row">
                    <div class="data_cell">
                        <span class="sended_form_label">Nazwisko: </span>
                    </div>
                    <div class="data_cell">
                        <span class="sended_form_value"><?= $_POST['surname']?></span>
                    </div>
                </div>
                <div class="data_row data_odd">
                    <div class="data_cell">
                        <span class="sended_form_label">Data urodzenia: </span>
                    </div>
                    <div class="data_cell">
                        <span class="sended_form_value"> <?= $_POST['BirthDate']?></span>
                    </div>
                </div>
                <div class="data_row">
                    <div class="data_cell">
                        <span class="sended_form_label">Pesel: </span>
                    </div>
                    <div class="data_cell">
                        <span class="sended_form_value"><?= $_POST['pesel']?></span>
                    </div>
                </div>
                <div class="data_row data_odd">
                    <div class="data_cell">
                        <span class="sended_form_label">Płeć: </span>
                    </div>
                    <div class="data_cell">
                        <span class="sended_form_value"><?= $_POST['sex']?></span>
                    </div>
                </div>
                <div class="data_row">
                    <div class="data_cell">
                        <span class="sended_form_label">Wydział: </span>
                    </div>
                    <div class="data_cell">
                        <span class="sended_form_value"><?= $_POST['stud_field']?></span>
                    </div>
                </div>
                <div class="data_row data_odd">
                    <div class="data_cell">
                        <span class="sended_form_label">Zdjęcie: </span>
                    </div>
                    <div class="data_cell">
                        <span class="sended_form_value"><?= $_POST['pic']?></span>
                    </div>
                </div>
                <div class="data_row">
                    <div class="data_cell">
                        <span class="sended_form_label">Komentarz: </span>
                    </div>
                    <div class="data_cell">
                        <span class="sended_form_value"><?= $_POST['comment']?></span>
                    </div>
                </div>
                <div class="data_row data_odd">
                    <div class="data_cell">
                        <span class="sended_form_label">Zgoda na przetwarzanie danych: </span>
                    </div>
                    <div class="data_cell">
                        <span class="sended_form_value"><?= $_POST['personal_data']?></span>
                    </div>
                </div>
                <div class="data_row">
                    <div class="data_cell_pure">

                    </div>
                    <div class="data_cell_pure">
                        <a class="go_back" href="index.php">Powrót</a>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>


<div id="footer-wrapper">
    <div id="footer" class="container">
        <div id="box1">
            <div class="title">
                <h2>validatory</h2>
            </div>
            <ul class="style1">
                <li>
                    <a href="http://validator.w3.org/check?uri=referer">
                        <img src="http://dev.bowdenweb.com/a/i/dev/webcomm/badge-w3c-valid-html5.png" alt="Valid HTML5" height="31" width="88"/>
                    </a>
                </li>
                <li>
                    <a href="http://jigsaw.w3.org/css-validator/check/referer">
                        <img alt="Validator CSS" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" style="border:0;width:88px;height:31px"/>
                    </a>
                </li>

            </ul>
        </div>
        <div id="box2">
            <div class="title">
                <h2>Pliki źródłowe</h2>
            </div>
            <ul class="style1">
                <li><a href="view-source:index.html">HTML tej strony</a></li>
                <li><a href="view-source:default.css">CSS tej strony</a></li>
                <li><a href="view-source:tableGenerator.js">PHP autoryzacji</a></li>
                <li><a href="view-source:tableGenerator.js">PHP mobile checkera</a></li>
                <li><a href="view-source:tableGenerator.js">PHP zapisywacza sesji</a></li>
            </ul>
        </div>
        <div id="box3">
            <div class="title">
                <h2>Polecane strony</h2>
            </div>
            <ul class="style1">
                <li><a href="http://volt.iem.pw.edu.pl/~drapiewp/" class="Maplink"><span>Strona glowna Serwera</span></a></li>
                <li><a href="../mobile/index.php" class="Maplink"><span>Mobilna wersja strony</span></a></li>
            </ul>
        </div>
    </div>
</div>
<div id="copyright" class="container">
    <p>&copy; Untitled. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> | Build by <a href="https://github.com/drapek" >Drapek</a></p>
</div>
</body>
</html>

