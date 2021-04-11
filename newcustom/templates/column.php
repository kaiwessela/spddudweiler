<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include 'components/head.php'; ?>
		<title><?= $Column->name ?> – SPD Dudweiler</title>

		<?php
		$p = $ColumnController->pagination;

		if(!$p->is_empty() && $p->current_item()?->is_first() === false){
			?>
			<link rel="prev" href="<?= $p->items[$p->current_page - 1]?->href() ?>">
			<?php
		}

		if(!$p->is_empty() && $p->current_item()?->is_last() === false){
			?>
			<link rel="next" href="<?= $p->items[$p->current_page + 1]?->href() ?>">
			<?php
		}
		?>
	</head>
	<body>
		<?php include 'components/header.php'; ?>
		<main class="feature">
			<header>
				<h1><?= $Column->name ?></h1>
			</header>
			<section>
				<?php

				if($Column->posts?->empty()){

				?>
				<p>Es sind noch keine Artikel vorhanden.</p>
				<?php

				} else if(!$p->page_exists($p->current_page)){
					?>
					<p>
						Diese Seite existiert nicht.
						<a href="<?= $p->items[1]?->href() ?>">Zurück zur ersten Seite</a>
					</p>
					<?php
				} else {
					?>
					<div>
						<b>Seite <?= $p->current_page ?> von <?= $p->last_page() ?></b>
						– Angezeigt werden Artikel <?= $p->current_item()?->first_object_number() ?>
						bis <?= $p->current_item()?->last_object_number() ?> von insgesamt
						<?= $p->total_objects ?> Artikeln.
					</div>
					<?php

					include 'components/pagination.php';

					$Column->posts?->each(function($post) use ($server){
						include 'components/preview-post.php';
					});

					include 'components/pagination.php';
				}
				?>

				<!-- TODO skip pagination link -->

			</section>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
