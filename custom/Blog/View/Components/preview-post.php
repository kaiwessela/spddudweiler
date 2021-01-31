<article class="post preview">
	<a href="<?= $server->url ?>/aktuelles/<?= $post->longid ?>">

<?php
if(!empty($post->image)){
	$picture = $post->image;
	include COMPONENT_PATH . 'picture.php';
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
			<time datetime="<?= $post->timestamp?->format('iso') ?>">
				<?= $post->timestamp?->format('date') ?>
			</time>
		</p>
	</a>
</article>
