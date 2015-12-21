<?php

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Drapek - Projekt 4 - technologie AJAX</title>
		<link rel="shortcut icon" href="../images/projekt_icon.ico">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]>
		<script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]>
		<link rel="stylesheet" href="../assets/css/ie8.css"/><![endif]-->
		<!--[if lte IE 9]>
		<link rel="stylesheet" href="../assets/css/ie9.css"/><![endif]-->
		<!-- styles for only this site eg. for table apperanece -->
		<link rel="stylesheet" href="CSS/ajax.css"/><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li>
									<a href="../../">Strona główna serwera</a>
									<ul>
										<li><a href="../../Proj1">Projekt 1</a></li>
										<li><a href="../../Proj2">Projetk 2</a></li>
										<li><a href="../../Proj3/logon.php">Projetk 3</a></li>
										<li><a href="../">Projetk 4</a></li>
									</ul>
								</li>
								<li ><a href="../index.html">Strona główna projektu</a></li>
								<li>
									<a href="">Obsługa plików</a>
									<ul>
										<li><a href="../files_operation/file_upload.html">Prześlij plik</a></li>
										<li><a href="../files_operation/uploaded_files_list.php">Obejrzyj przesłane pliki</a></li>
									</ul>
								</li>
								<li ><a href="../serialization/serialization.php">Obsługa Klas</a></li>
								<li class="current"><a href="ajax.php">AJAX</a></li>
								<li ><a href="../mysql_connect/mysql_connect.php">Bazy danych</a></li>
							</ul>
						</nav>

				</div>

			<!-- Banner -->
				<section id="banner">
					<header>
						<h2>Projekt 4 : <em>zaawansowana obsługa PHP</em></h2>
					</header>
				</section>



			<!-- Gigantic Heading -->
				<section class="wrapper style2">
					<div class="container">
						<header class="major">
							<h2>Zestaw technologi AJAX</h2>
							<p>Technologia AJAX to technika tworzenia aplikacji internetowych, w której interakcja użytkownika z serwerem odbywa się bez przeładowywania całego dokumentu, w sposób asynchroniczny. </p>
						</header>
					</div>
				</section>

			<!-- Highlights -->
			<section class="wrapper style1">
				<div class="container">
					<h2>Ramka pływająca JS</h2>
					<p>Poniższa ramka ma jedynie pokazać w jaki sposób wpływają zapytania AJAX na działanie pozostałego kodu Java Script.</p>
					<div id="floatBounds">
						<div id="floatingRectangle">
						</div>
					</div>


				</div>
			</section>
			<!-- Highlights -->
			<section class="wrapper style1">
				<div class="container">
					<div class="ajaxDefinitionBlock">
						<h2>Zapytania AJAX</h2>

							Wybierz zakres losowanej liczby przez skrypt php, a następnie metodę którą zostanie ona wywołana.


						<form action="" type="GET">
							<label for="minVal">Minimum</label>
							<input type="number" placeholder="min" name="minVal" value="10" id="minVal"/>

							<label for="maxVal">Maximum</label>
							<input type="number" placeholder="max" name="maxVal" value="500" id="maxVal" />

							<label for="maxVal">Sztuczne opóźnienie serwera w ms</label>
							<input type="number" placeholder="max" name="maxVal" value="500" id="sleep_time" />
						</form>
					</div>

					<div class="ajaxButtonsBlock">
						<button type="button" onclick="ajaxGet(0)">Get Synchroniczne</button>
						<button type="button" onclick="ajaxGet()">Get Asynchroniczne</button>
						<button type="button" onclick="ajaxPost(0)">Post Synchroniczne</button>
						<button type="button" onclick="ajaxPost()">Post Asynchroniczne</button>
					</div>

					<h3>Tabela wynikowa dla zapytań Get Synchronicznych</h3>
					<table class="ajaxTable" id="tableGetSynch">
						<tr class="header">
							<th>
								Lp.
							</th>
							<th>
								Wylosowana liczba
							</th>
						</tr>
					</table>

					<h3>Tabela wynikowa dla zapytań Get Asynchronicznych</h3>
					<table class="ajaxTable" id="tableGetAsynch">
						<tr class="header">
							<th>
								Lp.
							</th>
							<th>
								Wylosowana liczba
							</th>
						</tr>
					</table>

					<h3>Tabela wynikowa dla zapytań Post Synchronicznych</h3>
					<table class="ajaxTable" id="tablePostSynch">
						<tr class="header">
							<th>
								Lp.
							</th>
							<th>
								Wylosowana liczba
							</th>
						</tr>
					</table>

					<h3>Tabela wynikowa dla zapytań Post Asynchronicznych</h3>
					<table class="ajaxTable" id="tablePostAsynch">
						<tr class="header">
							<th>
								Lp.
							</th>
							<th>
								Wylosowana liczba
							</th>
						</tr>
					</table>


				</div>
			</section>


			<!-- Footer -->
				<div id="footer">


					<!-- Icons code sources-->
					<ul class="icons">
						<li><a title="kod źródłowy tej strony" href="#" class="icon "><img class="footer-logo" src="../images/logos/html5_logo.png" alt="page_source"></a></li>
						<li><a title="kod źródłowy main.css" href="#" class="icon "><img class="footer-logo" src="../images/logos/css3_logo.png" alt="main_css"></a></li>
						<li><a title="kod źródłowy drawFrame.js" href="#" class="icon "><img class="footer-logo" src="../images/logos/js_logo.png" alt="_js"></a></li>
					</ul>

					<!-- Validators Icons -->
					<ul class="icons">
						<li><a title="walidator html5 dla tej storny" href="http://validator.w3.org/check?uri=referer" class="icon "><img class="footer-validator" src="../images/logos/html5_val.png" alt="html_validator"></a></li>
						<li><a title="walidator css3 dla tej storny" href="http://jigsaw.w3.org/css-validator/check/referer" class="icon "><img class="footer-validator" src="../images/logos/css_val.gif" alt="css_validator"></a></li>
						<li><a title="walidator java script dla tej storny" href="http://esprima.org/demo/validate.html" class="icon "><img class="footer-validator" src="../images/logos/js_val.png" alt="js validator"></a></li>
					</ul>

					<!-- Copyright -->
						<div class="copyright">
							<ul class="menu">
								<li>Produced By: Drapek</li><li>Design by: HTML5 UP</li>
							</ul>
						</div>

				</div>

		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]>
			<script src="../assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
			<script src="JS/moveRectangle.js"></script>
			<script src="JS/ajaxRequests.js"></script>

	</body>
</html>