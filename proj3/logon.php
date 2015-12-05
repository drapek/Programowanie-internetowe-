<?php
/**
 * Created by PhpStorm.
 * User: drapek
 * Date: 04.12.15
 * Time: 17:19
 */?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <title>Programowanie Internetowe - projekt 2</title>
    <meta name="keywords" content="Nauka JS, programowanie, Politechnika Warszawska" />
    <meta name="description" content="Strona z wykonanym projektem zaliczeniowym przedmiotu Programowanie Internetowe" />
    <meta name="author" content="Paweł Drapiewski">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,200,500,600,700,800,300" rel="stylesheet" />
    <link href="logon.css" rel="stylesheet" type="text/css" media="all" />

    <!--[if IE 6]>
    <link href="default_ie6.css" rel="stylesheet" type="text/css" />
    <![endif]-->
</head>

<body>
<div id="menu-wrapper">
    <div id="menu" class="container">
        <ul>
            <li class="current_page_item"><a href="desktop/index.php">Projekt numer 3</a></li>
            <li><a href="http://volt.iem.pw.edu.pl/~drapiewp/">Strona główna mojego profilu </a></li>

        </ul>
    </div>
    <!-- end #menu -->
</div>

<div id="wrapper">
    <div id="page" class="container">
        <div id="logon_frame">
            <p id="Logon_title">Zaloguj się aby uzyskać dostęp</p>

            <form  action="authorize.php" method="post">
                <table>
                    <tr>
                        <td class="table_label">
                            <label for="username_input"> Nazwa użytkownika: </label>
                        </td>
                        <td>
                            <input type="text" name="username" id="username_input" />
                        </td>
                    </tr>
                    <tr>
                        <td class="table-label">
                            <label for="passwd_input"> Hasło: </label>
                        </td>
                        <td>
                            <input type="password" name="passwd" id="passwd_input" />
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            <button type="submit">Zaloguj</button>
                        </td>
                    </tr>

                </table>
            </form>
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
                <li>
                    <a href="http://esprima.org/demo/validate.html">
                        <img alt="Validator Java Scriptu!" src="http://www.plastyk.com.au/assets/Uploads/logo-javascript.png" style="border:0;width:88px;height:31px"/>
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
                <li><a href="view-source:default.css">PHP autoryzacji</a></li>
            </ul>
        </div>
        <div id="box3">
            <div class="title">
                <h2>Polecane strony</h2>
            </div>
            <ul class="style1">
                <li><a href="http://volt.iem.pw.edu.pl/~drapiewp/" class="Maplink"><span>Strona glowna Serwera</span></a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
