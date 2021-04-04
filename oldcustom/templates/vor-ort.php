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
			<section>
				<?= $Page->content?->parse() ?>
			</section>
			<section>
				<h2>Anträge unserer Bezirksratsfraktion</h2>
				<?php $Motion?->each(function($prop) use ($server){
					?>

					<article class="proposal preview">
						<a href="<?= $server->url ?>/bezirksrat/antraege/<?= $prop->longid ?>">
							<h3 class="title"><?= $prop->title ?></h3>
							<p class="status" data-status="<?= $prop->status ?>">
								<?= match($prop->status){ 'draft' => 'Entwurf zur Abstimmung', 'accepted' => 'Angenommen', 'rejected' => 'Abgelehnt' } ?>
								· Sitzung am <?= $prop->timestamp?->format('date') ?>
							</p>
							<div class="details">Antrag und Abstimmungsergebnis »</div>
						</a>
					</article>

					<?php
				}); ?>
			</section>
			<section>
				<h2>Neuigkeiten aus dem Bezirksrat</h2>
				<?php $Column?->posts?->each(function($post) use ($server){ include 'components/preview-post.php'; }); ?>
				<a href="<?= $server->url ?>/bezirksrat/neuigkeiten">Weitere Neuigkeiten aus dem Bezirksrat</a>
			</section>
			<section>
				<h2>Unsere Stadtratsmitglieder</h2>
				<div class="people-grid">
					<?php $Stadtrat?->persons?->each(function($person) use ($server){ include 'components/person-card.php'; }); ?>
				</div>
			</section>
			<section>
				<h2>Die SPD-Bezirksratsfraktion</h2>
				<div class="people-grid">
					<?php $Bezirksrat?->persons?->each(function($person) use ($server){ include 'components/person-card.php'; }); ?>
				</div>
			</section>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
