<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include COMPONENT_PATH . 'head.php'; ?>
		<title><?= $Post->headline ?> – <?= $site->title ?></title>
		<link rel="canonical" href="<?= $server->url ?>/aktuelles/<?= $Post->longid ?>">
		<meta name="author" content="<?= $Post->author ?>">
		<meta name="description" content="<?= $Post->teaser ?>">
		<meta name="date" content="<?= $Post->timestamp?->format('iso') ?>">

		<?php if(!empty($Post->image)){ ?>
			<meta name="twitter:card" content="summary_large_image">
			<meta property="og:image" content="<?= $Post->image?->src() ?>">
		<?php } else { ?>
			<meta name="twitter:card" content="summary">
			<meta property="og:image" content="<?= $server->url ?>/resources/images/static/Logo_SPD_Dudweiler_share.png">
		<?php } ?>

		<meta name="twitter:site" content="<?= $site->twitter ?>">

		<meta property="og:type" content="article">
		<meta property="og:url" content="<?= $server->url ?>/aktuelles/<?= $Post->longid ?>">
		<meta property="og:title" content="<?= $Post->headline ?>">
		<meta property="og:description" content="<?= $Post->teaser ?>">
	</head>
	<body>
		<?php include COMPONENT_PATH . 'header.php'; ?>
		<main>
			<article class="post">
				<header>

					<?php if($Post->overline){ ?>
					<p class="overline"><?= $Post->overline ?></p>
					<?php } ?>

					<h1><span><?= $Post->headline ?></span></h1>

					<?php if($Post->subline){ ?>
					<p class="subline"><?= $Post->subline ?></p>
					<?php } ?>

					<p class="author-and-date">
						<!-- IDEA use address element? -->
						Von <?= $Post->author ?>, <wbr>veröffentlicht am
						<time datetime="<?= $Post->timestamp?->format('iso') ?>">
							<?= $Post->timestamp?->format('date') ?>
						</time>
					</p>
				</header>

				<?php
				if(!empty($Post->image)){
					?>
					<figure>
						<?php
						$picture = $Post->image;
						include COMPONENT_PATH . 'picture.php';
						?>
						<figcaption><small><?= $picture->copyright ?></small></figcaption>
					</figure>
					<?php
				}
				?>

				<?= $Post->content?->parse() ?>
			</article>
		</main>
		<?php include COMPONENT_PATH . 'footer.php'; ?>
		<?php include COMPONENT_PATH . 'scripts.php'; ?>
	</body>
</html>
