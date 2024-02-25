<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include 'components/head.php'; ?>
		<title><?= $Page->title ?> – <?= $site->title ?></title>
	</head>
	<body>
		<?php include 'components/header.php'; ?>
		<main>
			<header class="highlighted">
				<h1><?= $Page->title ?></h1>
			</header>
			<?= $Page->content?->parse() ?>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
