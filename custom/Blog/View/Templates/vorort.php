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
				<h2>Anträge</h2>
				<?php $Proposal?->each(function($prop){
					?>

					<article class="proposal">
						<h3><?= $prop->title ?></h3>
						<p class="status" data-status="<?= $prop->status ?>">
							<?= match($prop->status){ 'draft' => 'Entwurf zur Abstimmung', 'accepted' => 'Angenommen', 'rejected' => 'Abgelehnt' } ?>
						</p>
						<p><?= $prop->description ?></p>
					</article>

					<?php
				}); ?>
			</section>
			<section>
				<h2>Neuigkeiten aus dem Bezirksrat</h2>
				<?php $Column?->posts?->each(function($post) use ($server){ include COMPONENT_PATH . 'preview-post.php'; }); ?>
				<a href="<?= $server->url ?>/bezirksrat/neuigkeiten">Weitere Neuigkeiten aus dem Bezirksrat</a>
			</section>
			<section>
				<h2>Unsere Stadtratsmitglieder</h2>
				<div class="people-grid">
					<?php $Stadtrat?->persons?->each(function($person){ include COMPONENT_PATH . 'person-card.php'; }); ?>
				</div>
			</section>
			<section>
				<h2>Die SPD-Bezirksratsfraktion</h2>
				<div class="people-grid">
					<?php $Bezirksrat?->persons?->each(function($person){ include COMPONENT_PATH . 'person-card.php'; }); ?>
				</div>
			</section>
		</main>
		<?php include COMPONENT_PATH . 'footer.php'; ?>
		<?php include COMPONENT_PATH . 'scripts.php'; ?>
	</body>
</html>
