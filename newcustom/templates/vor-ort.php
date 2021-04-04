<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include 'components/head.php'; ?>
		<title><?= $Page->title ?> – SPD Dudweiler</title>
	</head>
	<body>
		<?php include 'components/header.php'; ?>
		<main>
			<header>
				<h1><?= $Page->title ?></h1>
			</header>
			<section>
				<?= $Page->content?->parse() ?>
			</section>
			<section>
				<h2>Anträge an den Bezirksrat</h2>

				<?php $Motion?->each(function($m){ ?>

				<article class="motion">
					<h3><?= $m->title ?></h3>
					<p class="status" data-status="<?= $m->status ?>">
						<?= match($m->status){
							'draft' => 'Entwurf zur Abstimmung',
							'accepted' => 'Angenommen',
							'rejected' => 'Abgelehnt'
						} ?>
					</p>
				</article>

				<?php }); ?>

			</section>
			<section>
				<h2>Direkt aus der Fraktion</h2>
				<?php $Column?->posts?->each(function($post) use ($server){ include 'components/preview-post.php'; }); ?>
				<a href="<?= $server->url ?>/bezirksrat/neuigkeiten">Weitere Neuigkeiten aus dem Bezirksrat</a>
			</section>
			<section>
				<h2>Für Sie im Stadtrat</h2>
				<?php $Stadtrat?->persons?->each(function($person){ include 'components/person-card.php'; }); ?>
			</section>
			<section>
				<h2>Für Sie im Bezirksrat</h2>
				<?php $Bezirksrat?->persons?->each(function($person){ include 'components/person-card.php'; }); ?>
			</section>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
