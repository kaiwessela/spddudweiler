<?php
use \Blog\Config\Config;
use \Blog\Frontend\Web\SiteConfig;
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include COMPONENT_PATH . 'head.comp.php'; ?>
		<title><?= SiteConfig::TITLE ?></title>
	</head>
	<body>
		<?php include COMPONENT_PATH . 'header.comp.php'; ?>
		<main>
			<!-- /*Config::SERVER_URL . Config::DYNAMIC_IMAGE_PATH . SiteConfig::INDEX_IMAGE*/ ?>-->
			<section class="highlighted image" style="background-image: url('https://spd-dudweiler.de/resources/img.php?uid=8f7e5030');">
				<h1>Willkommen bei der SPD Dudweiler</h1>
			</section>
			<section>
				<h2>Aktuelles</h2>
				<?php if($PostListController->posts){
					foreach($PostListController->posts as $post){
						include COMPONENT_PATH . 'preview-post.comp.php';
					}
				} else { ?>
				<p>Noch keine Neuigkeiten.</p>
				<?php } ?>
				<a href="<?= Config::SERVER_URL . '/aktuelles' ?>">Weitere Neuigkeiten</a>
			</section>
			<section class="events image" style="--bg: url('https://demo.spd-dudweiler.de/resources/images/static/Kalender.jpg');">
				<h2>Termine</h2>
				<?php if($EventListController->events){
					foreach($EventListController->events as $event){
						include COMPONENT_PATH . 'event.comp.php';
					}
				} else { ?>
				<p>Keine aktuellen Termine.</p>
				<?php } ?>
			</section>
		</main>
		<?php include COMPONENT_PATH . 'footer.comp.php'; ?>
		<?php include COMPONENT_PATH . 'scripts.comp.php'; ?>
	</body>
</html>
