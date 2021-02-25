<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include COMPONENT_PATH . 'head.php'; ?>
		<title><?= $site->title ?></title>
	</head>
	<body>
		<?php include COMPONENT_PATH . 'header.php'; ?>
		<main>
			<section class="landscape" style="min-height: 30vh; background-image: url('<?= $server->url ?>/resources/images/static/Dudweiler-von-oben.jpg');">
				<h1>Willkommen bei der SPD Dudweiler</h1>
			</section>
			<section class="landscape">
				<h2>Aktuelles</h2>
				<?php if(!empty($Column->posts)){
					$Column?->posts?->each(function($post) use ($server){ include COMPONENT_PATH . 'preview-post.php'; });
				} else { ?>
				<p>Noch keine Neuigkeiten.</p>
				<?php } ?>
				<a href="<?= $server->url . '/aktuelles' ?>">Weitere Neuigkeiten</a>
			</section>
			<section class="landscape events image" style="--bg: url('<?= $server->url ?>/resources/images/static/Kalender.jpg');">
				<h2>Termine</h2>
				<?php if(!$EventController->empty()){
					$Event->each(function($event) use ($server){ include COMPONENT_PATH . 'event.php'; });
				} else { ?>
				<p>Keine aktuellen Termine.</p>
				<?php } ?>
			</section>
		</main>
		<?php include COMPONENT_PATH . 'footer.php'; ?>
		<?php include COMPONENT_PATH . 'scripts.php'; ?>
	</body>
</html>
