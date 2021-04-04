<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include 'components/head.php'; ?>
		<title><?= $Column->name ?> – SPD Dudweiler</title>
	</head>
	<body>
		<?php include 'components/header.php'; ?>
		<main>
			<section>
				<header class="highlighted">
					<h1><?= $Column->name ?></h1>
				</header>

				<?php if($Column->posts?->empty()){ ?>

				<p>Es sind noch keine Artikel vorhanden.</p>

				<?php } else { ?>

				<?php $p = $ColumnController->pagination; ?>
				<div>
					<b>Seite <?= $p->current_page ?> von <?= $p->last_page() ?></b>
					– Angezeigt werden Artikel <?= $p->current_item()?->first_object_number() ?>
					bis <?= $p->current_item()?->last_object_number() ?> von insgesamt
					<?= $p->total_objects ?> Artikeln.
				</div>

				<?php include 'components/pagination.php'; ?>

				<?php $Column->posts?->each(function($post) use ($server){
					include 'components/preview-post.php';
				}); ?>

				<?php } ?>
			</section>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
