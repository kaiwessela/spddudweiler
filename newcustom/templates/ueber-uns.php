<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include 'components/head.php'; ?>
		<title><?= $Page->title ?> – SPD Dudweiler</title>
	</head>
	<body>
		<?php include 'components/header.php'; ?>
		<main>
			<header class="highlighted">
				<h1><?= $Page->title ?></h1>
			</header>
			<section>
				<?= $Page->content?->parse() ?>
			</section>
			<section>
				<h2>Unser Vorstand</h2>
				<div class="people-grid">
					<?php $Vorstand?->persons?->each(function($person) use ($server){ include 'components/person-card.php'; }); ?>
				</div>
			</section>
			<section>
				<h2>Unsere Jusos</h2>
				<div class="people-grid">
					<?php $Jusos?->persons?->each(function($person) use ($server){ include 'components/person-card.php'; }); ?>
				</div>
			</section>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
