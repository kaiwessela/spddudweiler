<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include 'components/head.php'; ?>
		<title><?= $site->title ?></title>
	</head>
	<body>
		<?php include 'components/header.php'; ?>
		<main class="feature">
			<header class="image" style="--image: url('<?= $server->url ?>/resources/images/Dudweiler-von-oben.jpg');">
				<h1>Willkommen bei der SPD Dudweiler</h1>
			</header>
			<section>
				<h2>Aktuelles</h2>
				<?php if(!$Column->posts?->empty()){
					$Column?->posts?->each(function($post) use ($server){ include 'components/preview-post.php'; });
				} else { ?>
				<p>Noch keine Neuigkeiten.</p>
				<?php } ?>
				<a class="button" href="<?= $server->url . '/aktuelles' ?>">Weitere Neuigkeiten</a>
			</section>
			<section class="events image" style="--bg: url('<?= $server->url ?>/resources/images/Kalender.jpg');">
				<h2>Termine</h2>
				<?php if(!$Event?->empty()){
					$Event->each(function($event) use ($server){ include 'components/event.php'; });
				} else { ?>
				<p>Keine aktuellen Termine.</p>
				<?php } ?>
			</section>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
