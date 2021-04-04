<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include 'components/head.php'; ?>
		<title>Seite nicht gefunden – SPD Dudweiler</title>
	</head>
	<body>
		<?php include 'components/header.php'; ?>
		<main>
			<header>
				<h1>Fehler 404 – Seite nicht gefunden</h1>
			</header>
			<p>Leider ist die Seite, die Sie angefragt haben, nicht vorhanden.</p>
			<p>
				Kontaktieren Sie uns bitte, wenn Sie den Verdacht haben, dass ein technischer
				Fehler vorliegt.
			</p>
			<a href="<?= $server->url ?>">Zurück zur Startseite</a>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
