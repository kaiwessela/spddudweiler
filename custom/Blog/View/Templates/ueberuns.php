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
				<?= $Page->content->parsed ?>
			</section>
			<section>
				<h2>Unser Vorstand</h2>
				<div class="people-grid">
					<?php foreach($Vorstand->persons as $person){ include COMPONENT_PATH . 'person-card.php'; } ?>
				</div>
			</section>
			<section>
				<h2>Unsere Jusos</h2>
				<div class="people-grid">
					<?php foreach($Jusos->persons as $person){ include COMPONENT_PATH . 'person-card.php'; } ?>
				</div>
			</section>
		</main>
		<?php include COMPONENT_PATH . 'footer.php'; ?>
		<?php include COMPONENT_PATH . 'scripts.php'; ?>
	</body>
</html>
