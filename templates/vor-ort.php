<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include 'components/head.php'; ?>
		<title><?= $Page->title ?> – SPD Dudweiler</title>
	</head>
	<body>
		<?php include 'components/header.php'; ?>
		<main class="feature">
			<header>
				<h1><?= $Page->title ?></h1>
			</header>
			<section>
				<?= $Page->content?->parse() ?>
			</section>
			<section>
				<h2>Anträge an den Bezirksrat</h2>
				<?php $Motion?->each(function($motion) use ($server){ include 'components/preview-motion.php'; }); ?>
				<a class="button" href="<?= $server->url ?>/bezirksrat/antraege">Weitere Anträge an den Bezirksrat</a>
			</section>
			<section>
				<h2>Direkt aus der Fraktion</h2>
				<?php $Column?->each(function($post) use ($server){ include 'components/preview-post.php'; }); ?>
				<a class="button" href="<?= $server->url ?>/bezirksrat/neuigkeiten">Weitere Neuigkeiten aus dem Bezirksrat</a>
			</section>
			<section>
				<h2>Für Sie im Stadtrat</h2>

				<div class="person-grid"><!-- TEMP -->

				<?php $Stadtrat?->each(function($person) use ($server){ ?>

					<?php include 'components/person-card.php'; // TEMP ?>

				<?php }); ?>

				</div>

			</section>
			<section>
				<h2>Für Sie im Bezirksrat</h2>
				<div class="person-grid">
					<?php $Bezirksrat?->each(function($person) use ($server){ include 'components/person-card.php'; }); ?>
				</div>
			</section>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
