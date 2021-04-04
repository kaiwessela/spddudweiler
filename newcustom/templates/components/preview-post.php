<article class="post">
	<a href="<?= $server->url ?>/aktuelles/<?= $post->longid ?>">

		<?php if($post->image){ ?>
		<img src="<?= $post->image->src() ?>" srcset="<?= $post->image->srcset() ?>" sizes="18rem" alt="<?= $post->image->description ?>">
		<?php } ?>

		<p class="overline"><?= $post->overline ?></p>
		<h3 class="headline"><?= $post->headline ?></h3>
		<p class="teaser"><?= $post->teaser ?></p>
		<div class="author-and-date">
			Von <?= $post->author ?> &middot;
			<time datetime="<?= $post->timestamp?->format('iso') ?>">
				<?= $post->timestamp?->format('date') ?>
			</time>
		</div>
	</a>
</article>
