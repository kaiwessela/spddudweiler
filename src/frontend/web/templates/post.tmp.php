<?php
use \Blog\Config\Config;
use \Blog\Frontend\Web\SiteConfig;
use \Blog\Frontend\Web\Modules\TimeFormat;
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include COMPONENT_PATH . 'head.comp.php'; ?>
		<title><?= $post->headline ?> – <?= SiteConfig::TITLE ?></title>
		<link rel="canonical" href="<?= Config::SERVER_URL ?>/posts/<?= $post->longid ?>">
		<meta name="author" content="<?= $post->author ?>">
		<meta name="description" content="<?= $post->teaser ?>">
		<meta name="date" content="<?= TimeFormat::html_time($post->timestamp) ?>">
	</head>
	<body>
		<?php include COMPONENT_PATH . 'header.comp.php'; ?>
		<main>
			<article class="post">
				<header>

					<?php if($post->overline){ ?>
					<p class="overline"><?= $post->overline ?></p>
					<?php } ?>

					<h1><span><?= $post->headline ?></span></h1>

					<?php if($post->subline){ ?>
					<p class="subline"><?= $post->subline ?></p>
					<?php } ?>

					<p class="author-and-date">
						<!-- IDEA use address element? -->
						Von <?= $post->author ?>, <wbr>veröffentlicht am
						<time datetime="<?= TimeFormat::html_time($post->timestamp) ?>">
							<?= TimeFormat::date($post->timestamp) ?>
						</time>
					</p>
				</header>

				<?php
				if($controller->show_picture){
					$picture = $post->picture;
					include COMPONENT_PATH . 'picture.comp.php';
				}
				?>

				<?= $controller->content ?>
			</article>
		</main>
		<?php include COMPONENT_PATH . 'footer.comp.php'; ?>
		<?php include COMPONENT_PATH . 'scripts.comp.php'; ?>
	</body>
</html>
