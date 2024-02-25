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

				<?php $Motion?->each(function($m) use ($server){ ?>

				<article class="motion">
					<a href="<?= $server->url ?>/bezirksrat/antraege/<?= $m->longid ?>">
						<h3 class="title"><?= $m->title ?></h3>
						<div class="infoline">
							<span class="status" data-status="<?= $m->status ?>">
								<?= match($m->status){ 'draft' => 'Entwurf zur Abstimmung', 'accepted' => 'Angenommen', 'rejected' => 'Abgelehnt' } ?>
								· Sitzung am <?= $m->timestamp?->format('date') ?>
							</span>
							<span class="details">
								<?= match($m->status){ 'draft' => 'Details', default => 'Details und Ergebnis' } ?>
							</span>
						</div>
					</a>
				</article>

				<?php }); ?>

			</section>
			<section>
				<h2>Direkt aus der Fraktion</h2>
				<?php $Column?->posts?->each(function($post) use ($server){ include 'components/preview-post.php'; }); ?>
				<a class="button" href="<?= $server->url ?>/bezirksrat/neuigkeiten">Weitere Neuigkeiten aus dem Bezirksrat</a>
			</section>
			<section>
				<h2>Für Sie im Stadtrat</h2>

				<div class="person-grid"><!-- TEMP -->

				<?php $Stadtrat?->persons?->each(function($person) use ($server){ ?>

					<?php include 'components/person-card.php'; // TEMP ?>

				<!-- <article class="person">
					<?php if(!empty($person->image)){ ?>

					<img src="<?= $person->image->src() ?>"
						srcset="<?= $person->image->srcset() ?>"
						sizes="18rem"
						alt="<?= $person->image->alternative ?>">

					<?php } else { ?>

					<img src="<?= $server->url ?>/resources/images/platzhalter.svg"
						sizes="18rem"
						alt="">

					<?php } ?>

					<div>
						<h3 class="name"><?= $person->name ?></h3>
						<p class="role"><?= $person->role ?></p>
					</div>
				</article> -->
				<?php }); ?>

				</div>

			</section>
			<section>
				<h2>Für Sie im Bezirksrat</h2>
				<div class="person-grid">
					<?php $Bezirksrat?->persons?->each(function($person) use ($server){ include 'components/person-card.php'; }); ?>
				</div>
			</section>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
