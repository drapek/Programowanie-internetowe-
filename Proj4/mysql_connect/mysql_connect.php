<?php
	require_once('search_in_db.php');

	//by nie wyświetlało tabeli z wynikami jeśli ktoś przyszedł z tej strony nie poprzez button "wyszukaj"
	$pokaz_wynik_wyszukiwania = false;

	if( isset($_POST['login_pattern'])) {
		$pokaz_wynik_wyszukiwania = true;
		$loginSearchResult = findPersonByLoginPattern($_POST['login_pattern']);
	}


?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Drapek - Projekt 4 - łączenie się z bazą danych</title>
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
		<link rel="stylesheet" href="CSS/mysql_connect.css"/><![endif]-->
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
								<li ><a href="../AJAX/ajax.php">AJAX</a></li>
								<li class="current"><a href="mysql_connect.php">Bazy danych</a></li>
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
							<h2>Pobieranie danych z bazy MySQL</h2>
							<p>Poniżej umieszczony został przykład wyszukiwania i pobierania danych z bazy MySQL. Przykład polega na wyszukaniu użytkownika o zadanym fragmencie
							podanym na stronie.</p>
						</header>
					</div>
				</section>

			<!-- Highlights -->
			<section class="wrapper style1">
				<div class="container">
					<h1>Wyszukiwarka loginów:</h1>
					<form action="mysql_connect.php#tab_loginow" method="post">
						<input name="login_pattern" type="text" placeholder="wzór loginu"/>
						<input id="butt_wyszukaj" type="submit" value="wyszukaj">
						<!-- ukryte inputy -->
						<input name="Imie" type="hidden">
						<input name="Nazwisko" type="hidden">
					</form>

				</div>
			</section>

<?php

			if( $pokaz_wynik_wyszukiwania ) {

				echo "<section class=\"wrapper style1\">
				<div class=\"container\">
					<a name=\"tab_loginow\"></a>
					<h1>Znalezione loginy:</h1> ";
					if( count($loginSearchResult) < 1) {
						echo "brak loginów o pdanym wzorze!";
					}
					else {
						//wypisz wszystkie loginy
						echo "<table id='login_list_tab'>
								<tr>
									<th>
									  lp.
									</th>
									<th>
									  Login
									</th>
									<th>
									  Imię
									</th>
									<th>
									  Nazwisko
									</th>
								</tr>";
						$i = 1;
						foreach( $loginSearchResult as $oneRow) {
							echo "<tr class='login_list_row " . ($i % 2 == 0 ? "odd" : "") . " '>
									<td>
									 $i
									</td>
								    <td>
									 " .$oneRow['login'] . "
									</td>
									<td>
									 " .$oneRow['name'] . "
									</td>
									<td>
									 " .$oneRow['surname'] . "
									</td>
								  </tr>";
							$i++;
						}
						echo "</table>";
					}

				echo "</div>
				</section>";
			}
?>



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

	</body>
</html>