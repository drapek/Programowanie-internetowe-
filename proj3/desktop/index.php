<?php
    require_once("../lib/checkIfAuthorizated.php");
    require_once("../lib/checkIfMobile.php");

    session_start(); //potrzebne by z sesji uzupełnić pola formularza
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
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
    <!--[if IE 6]>
    <link href="default_ie6.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript" src="validate.js"></script>
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
				<h2>Validacja formularza w JS</h2>
				<span class="byline">Dodaj przykladowe dane by przetestowac dzialanie Java Scriptowego validatora </span>
            </div>

			<form id="testForm" action="formProccesor.php#form_result" method="post" >

                <table id="testValidateInputs">
                    <tr class="FormField">
                        <td class="formLabel">
                            Imie<span class="reqiredField">*</span>
                        </td>
                        <td class="formValue">
                            <input name="name" id="name" value="<?= $_SESSION['form_name']?>"/>
                        </td>
                        <td>
                            <img id="name_res" alt="val_res" src="images/blank.png"/>
                        </td>
                    </tr>
                    <tr class="FormField">
                        <td class="formLabel">
                            Nazwisko<span class="reqiredField">*</span>
                        </td>
                        <td class="formValue">
                            <input name="surname" id="surname" value="<?= $_SESSION['form_surname']?>"/>
                        </td>
                        <td>
                            <img id="surname_res" alt="val_res" src="images/blank.png"/>
                        </td>
                    </tr>
                    <tr class="FormField">
                        <td class="formLabel">
                            Data urodzenia<span class="reqiredField">*</span>
                        </td>
                        <td class="formValue">
                            <input onchange="calculateAge()" onkeyup="calculateAge()" type="date" name="BirthDate" id="BirthDate" value="<?= $_SESSION['form_BirthDate']?>" />
                        </td>
                        <td>
                            <img id="BirthDate_res" alt="val_res" src="images/blank.png"/>
                        </td>
                    </tr>
                    <tr class="FormField">
                        <td class="formLabel">
                            Pesel<span class="reqiredField">*</span>
                        </td>
                        <td class="formValue">
                            <input id="pesel" name="pesel" value="<?= $_SESSION['form_pesel']?>"/>
                        </td>
                        <td>
                            <img id="pesel_res" alt="val_res" src="images/blank.png"/>
                        </td>
                    </tr>
                    <tr class="FormField">
                        <td class="formLabel">
                            Wiek
                        </td>
                        <td class="formValue">
                            <p id="age">(generowany automatycznie)</p>
                        </td>
                        <td>
                            <img id="age_res" alt="val_res" src="images/blank.png"/>
                        </td>
                    </tr>
                    <tr class="FormField">
                        <td class="formLabel">
                            Płeć
                        </td>
                        <td class="formValue">
                            <select name="sex">
                                <option value="male">Mężczyzna</option>
                                <option value="female">Kobieta</option>
                            </select>
                        </td>
                        <td>
                            <img id="sex_res" alt="val_res" src="images/blank.png"/>
                        </td>
                    </tr>
                    <tr class="FormField">
                        <td class="formLabel">
                            Kierunek studiów
                        </td>
                        <td class="formValue">
                            <input type="radio" name="stud_field" value="Elektryczny" <?php if(!isset($_SESSION['form_stud_field'])) { echo "checked"; } else if($_SESSION['form_stud_field'] == "Elektryczny") echo "checked=\"checked\""; ?>/> Elektryczny <br/>
                            <input type="radio" name="stud_field" value="Weiti" <?php if($_SESSION['form_stud_field'] == "Weiti") echo "checked=\"checked\""; ?>/> WEITI <br/>
                            <input type="radio" name="stud_field" value="Mini" <?php if($_SESSION['form_stud_field'] == "Mini") echo "checked=\"checked\""; ?>/> MINI <br/>
                        </td>
                        <td>
                            <img id="stud_field_res" alt="val_res" src="images/blank.png"/>
                        </td>
                    </tr>
                    <tr class="FormField">
                        <td class="formLabel">
                            Wybierz zdjęcie do wysłania (jpg, png lub tif)
                        </td>
                        <td class="formValue">
                            <input id="fileForm" type="file" name="pic" accept="image/*" />
                        </td>
                        <td>
                            <img id="file_res" alt="val_res" src="images/blank.png"/>
                        </td>
                    </tr>
                    <tr class="FormField">
                        <td class="formLabel">
                            Komentarz
                        </td>
                        <td class="formValue">
                            <textarea id="commentField" onkeyup="renewCommentFieldCounter()" name="comment" rows="5" cols="50" ><?= $_SESSION['form_comment']?></textarea>

                            <div id="commnetCounterHandler">
                                <p id="comentCounterTittle">
                                    Aktualnie wpisałeś znaków:
                                </p>
                                <p id="commentCounter">
                                    0
                                </p>
                            </div>
                        </td>
                        <td>
                            <img id="comment_res" alt="val_res" src="images/blank.png"/>
                        </td>
                    </tr>
                    <tr class="FormField">
                        <td class="formLabel">
                            Zgadzam się na przetwarzanie danych osobowych<span class="reqiredField">*</span>
                        </td>
                        <td class="formValue">
                            <input id="personal_data" type="checkbox" name="personal_data" <?php if(isset($_SESSION['form_personal_data'])) echo "checked"; ?>/>
                        </td>
                        <td>
                            <img id="personal_data_res" alt="val_res" src="images/blank.png"/>
                        </td>
                    </tr>
                </table>
			</form>
            <button id="submitTestForm" onclick="validateTestForm()" style="float: right; width: 80%;">Wyślij</button>
            <br/>
            <br/>
            <p class="fromInfo"> Elementy oznaczone <span class="reqiredField">*</span> są obowiazkowe. </p>


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
                <li><a href="view-source:tableGenerator.js">JS validatora</a></li>
                <li><a href="view-source:tableGenerator.js">PHP autoryzacji</a></li>
                <li><a href="view-source:tableGenerator.js">PHP mobile checkera</a></li>


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
