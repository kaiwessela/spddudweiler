<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include COMPONENT_PATH . 'head.php'; ?>
		<title><?= $Page->title ?> – <?= $site->title ?></title>
	</head>
	<body>
		<?php include COMPONENT_PATH . 'header.php'; ?>
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
					<?php $Vorstand?->persons?->each(function($person) use ($server){ include COMPONENT_PATH . 'person-card.php'; }); ?>
				</div>
			</section>
			<section>
				<h2>Unsere Jusos</h2>
				<div class="people-grid">
					<?php $Jusos?->persons?->each(function($person) use ($server){ include COMPONENT_PATH . 'person-card.php'; }); ?>
				</div>
			</section>
		</main>
		<?php include COMPONENT_PATH . 'footer.php'; ?>
		<?php include COMPONENT_PATH . 'scripts.php'; ?>
	</body>
</html>
