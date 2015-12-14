<?php
	require_once('Osoba.php');
	require_once('Student.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Drapek - Projekt 4 - serializacja danych</title>
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
		<link rel="stylesheet" href="CSS/serialization.css"/><![endif]-->
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
								<li class="current"><a href="serialization.php">Obsługa Klas</a></li>
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
							<h2>Serializacja obiektów w PHP</h2>
							<p>Poniżej umieszczony został przykład serializacji obiektu Student. Ukazujący czym tak naprawdę owa serializacja jest.</p>
						</header>
					</div>
				</section>

			<!-- Highlights -->
			<section class="wrapper style1">
				<div class="container">
					<h2>1. Obiekty przed serializacją: </h2>

						<?php
							echo "<em class=\"object_name\"> Obiekt student: </em><br/>";
							$stud1 = new Student('Adam', 'Miłczyk', 92122544523, 4.22);
							echo "<div class=\"object_data\"> ";
							$stud1->printObject();
							echo "<br/> var_dump tego obiektu: <br/> <pre class=\"source_code\">";
							var_dump($stud1);
							echo "</pre></div><br/>";

							echo "<em class=\"object_name\">Obiekt osoba: <br/></em>";
							$osob1 = new Osoba('Grześ', 'Bralczyk', 820223110654);
							echo "<div class=\"object_data\"> ";
							$osob1->printObject();
							echo "<br/> var_dump tego obiektu: <br/> <pre class=\"source_code\">";
							var_dump($osob1);
							echo "</pre></div><br/>";
						?>

					<h2>2. Obiekty po serializacji: </h2>

					<?php
						echo "<em class=\"object_name\"> Obiekt student: </em><br/>";
						$serializedStud1 = serialize($stud1);
						echo "<div class=\"object_data\"> ";
						echo "wywołanie metody obiektu zserializowanego jest niemożliwe";
						//$serializedStud1->printObject();
						echo "<br/> var_dump tego obiektu: <br/> <pre class=\"source_code\">";
						var_dump($serializedStud1);
						echo "</pre></div><br/>";

						echo "<em class=\"object_name\">Obiekt osoba: <br/></em>";
						$serializedOsob1 = serialize($osob1);
						echo "<div class=\"object_data\"> ";
						echo "wywołanie metody obiektu zserializowanego jest niemożliwe";
						echo "<br/> var_dump tego obiektu: <br/> <pre class=\"source_code\">";
						var_dump($serializedOsob1);
						echo "</pre></div><br/>";
					?>

					<h2>3. Obiekty po unserializacji: </h2>

					<?php
						echo "<em class=\"object_name\"> Obiekt student: </em><br/>";
						$deserializedStud1 = unserialize($serializedStud1);
						echo "<div class=\"object_data\"> ";
						$deserializedStud1->printObject();
						echo "<br/> var_dump tego obiektu: <br/> <pre class=\"source_code\">";
						var_dump($deserializedStud1);
						echo "</pre></div><br/>";

						echo "<em class=\"object_name\">Obiekt osoba: <br/></em>";
						$deserializedOsob1 = unserialize($serializedOsob1);
						echo "<div class=\"object_data\"> ";
						$deserializedOsob1->printObject();
						echo "<br/> var_dump tego obiektu: <br/> <pre class=\"source_code\">";
						var_dump($deserializedOsob1);
						echo "</pre></div><br/>";
					?>


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