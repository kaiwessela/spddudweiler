<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include COMPONENT_PATH . 'head.php'; ?>
		<title><?= $site->title ?></title>
	</head>
	<body>
		<?php include COMPONENT_PATH . 'header.php'; ?>
		<main>
			<section class="highlighted image" style="background-image: url('<?= $server->url ?>/resources/images/static/Dudweiler-von-oben.jpg');">
				<h1>Willkommen bei der SPD Dudweiler</h1>
			</section>
			<section>
				<h2>Aktuelles</h2>
				<?php if(!$Post->empty()){
					foreach($Post->objects as $post){
						include COMPONENT_PATH . 'preview-post.php';
					}
				} else { ?>
				<p>Noch keine Neuigkeiten.</p>
				<?php } ?>
				<a href="<?= $server->url . '/aktuelles' ?>">Weitere Neuigkeiten</a>
			</section>
			<section class="events image" style="--bg: url('<?= $server->url ?>/resources/images/static/Kalender.jpg');">
				<h2>Termine</h2>
				<?php if(!$Event->empty()){
					foreach($Event->objects as $event){
						include COMPONENT_PATH . 'event.php';
					}
				} else { ?>
				<p>Keine aktuellen Termine.</p>
				<?php } ?>
			</section>
		</main>
		<?php include COMPONENT_PATH . 'footer.php'; ?>
		<?php include COMPONENT_PATH . 'scripts.php'; ?>
	</body>
</html>
