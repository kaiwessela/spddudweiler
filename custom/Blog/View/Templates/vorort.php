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
				<?= $Page->content->parsed ?>
			</section>
			<section>
				<h2>Neuigkeiten aus dem Bezirksrat</h2>
				<?php
				if(!empty($Column->posts)){
					foreach($Column->posts as $post){
						include COMPONENT_PATH . 'preview-post.php';
					}
				}
				?>
				<a href="<?= $server->url ?>/bezirksrat/neuigkeiten">Weitere Neuigkeiten aus dem Bezirksrat</a>
			</section>
			<section>
				<h2>Unsere Stadtratsmitglieder</h2>
				<div class="people-grid">
					<?php foreach($Stadtrat->persons as $person){ include COMPONENT_PATH . 'person-card.php'; } ?>
				</div>
			</section>
			<section>
				<h2>Die SPD-Bezirksratsfraktion</h2>
				<div class="people-grid">
					<?php foreach($Bezirksrat->persons as $person){ include COMPONENT_PATH . 'person-card.php'; } ?>
				</div>
			</section>
		</main>
		<?php include COMPONENT_PATH . 'footer.php'; ?>
		<?php include COMPONENT_PATH . 'scripts.php'; ?>
	</body>
</html>