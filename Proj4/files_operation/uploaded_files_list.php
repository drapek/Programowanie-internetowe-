<!DOCTYPE HTML>
<html>
	<head>
		<title>Drapek - Projekt 4 - lista przesłanych plików</title>
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
		<link rel="stylesheet" href="CSS/files_operation.css" />
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
								<li class="current">
									<a href="">Obsługa plików</a>
									<ul>
										<li><a href="file_upload.html">Prześlij plik</a></li>
										<li><a href="uploaded_files_list.php">Obejrzyj przesłane pliki</a></li>
									</ul>
								</li>
								<li><a href="../serialization/serialization.php">Obsługa Klas</a></li>
								<li><a href="../AJAX/ajax.php">AJAX</a></li>
								<li><a href="../mysql_connect/mysql_connect.php">Bazy danych</a></li>
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
							<h2>Lista przesłanych plików</h2>
							<p>Poniżej znajdziesz listę przesłanych plików, jeżeli chcesz to naciskając jego nazwę możesz pobrać ten plik na swój komputer.</p>
						</header>
					</div>
				</section>

			<!-- Highlights -->
			<section class="wrapper style1">
				<div class="container">
					<h2>Pliki znajdujące się na serwerze:</h2>
					<p>
						Kliknij na nazwę pliku by go pobrać.
					</p>

				</div>
			</section>

			<!-- Posts -->
				<section class="wrapper style1" style="padding: 0 0 2em">
					<div class="container">
						<table id="file_list" >
							<tr>
								<th>
									lp.
								</th>
								<th>
									nazwa
								</th>
								<th>
									rozmiar
								</th>
								<th>
									komentarz
								</th>
							</tr>
<?php
/*********************************************/
/*generator tabeli z listą przesłanych plików*/
/*********************************************/
$path_to_db = realpath('./DATABASE') . "/DATABASE_UPLOADED_FILES.csv";

$print_empty_table = false;

$db_file = fopen($path_to_db, "r");

//gdy plik nie istnieje lub jest pusty
if($db_file == null || filesize($path_to_db) == 0) {
	$print_empty_table = true;
}

if(!$print_empty_table) {
	$licznik = 1;
	//wyświetl normalną tablę
	while (($data = fgetcsv($db_file, 2000, ";", '"' )) != FALSE) {
		echo "
		<tr "; echo $licznik % 2 == 0 ? "class=\"odd\"": ""; echo ">
			<td class=\"table_file_lp\">
				$licznik
			</td>
			<td class=\"table_file_name\">
				<a href=\"./downloads.php?p=$data[2]\" > $data[2] </a>
			</td>
			<td class=\"table_file_size\">
				" . formatBytes($data[4]) ."
			</td>
			<td class=\"table_file_comment\"> ";
				echo $data[5] == "" ? "-" : $data[5];
		echo "</td>
		</tr>
		";
		$licznik++;
	}
} else {
	//wyświetl pustą
	echo "
		<tr>
			<td>
				-
			</td>
			<td>
				-
			</td>
			<td>
				-
			</td>
			<td>
				-
			</td>
		</tr>
	";
}

//funkcja to ładnego zformatowania rozmiaru plików
function formatBytes($bytes, $precision = 2) {
	$units = array('B', 'KB', 'MB', 'GB', 'TB');

	$bytes = max($bytes, 0);
	$pow = floor(($bytes ? log($bytes) : 0) / log(1024));
	$pow = min($pow, count($units) - 1);

	// Uncomment one of the following alternatives
	// $bytes /= pow(1024, $pow);
	$bytes /= (1 << (10 * $pow));

	return round($bytes, $precision) . ' ' . $units[$pow];
}
?>

						</table>


						<a href="./file_upload.html" ><button id="send_files">Prześlij pliki</button></a>

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

	</body>
</html>