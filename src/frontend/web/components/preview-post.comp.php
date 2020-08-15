<?php
use \Blog\Config\Config;
use \Blog\Frontend\Web\Modules\TimeFormat;
?>
<article class="preview">
	<a href="<?= Config::SERVER_URL ?>/posts/<?= $post->longid ?>">

<?php
if($post->show_picture){
	$picture = $post->picture;
	include COMPONENT_PATH . 'picture.comp.php';
}
?>

		<p class="overline"><?= $post->overline ?></p>
		<h3><span><?= $post->headline ?></span></h3>
		<p class="subline"><?= $post->subline ?></p>
		<p class="teaser">
			<?= $post->teaser ?>
		</p>
		<p class="author-and-date">
			Von <?= $post->author ?> &middot;
			<time datetime="<?= TimeFormat::html_time($post->timestamp) ?>">
				<?= TimeFormat::date($post->timestamp) ?>
			</time>
		</p>
	</a>
</article>
