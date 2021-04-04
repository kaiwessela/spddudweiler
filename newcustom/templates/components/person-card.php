<article class="person static">
	<div>
		<picture>
		<?php if($person->image){ ?>

		<img
			src="<?= $person->image->src() ?>"
			srcset="<?= $person->image->srcset() ?>"
			sizes="18rem"
			alt="<?= $person->image->description ?>"
			>

		<?php } else { // TODO update sizes ?>

		<img src="<?= $server->url ?>/resources/images/platzhalter.svg">

		<?php } ?>
		</picture>

		<p class="name"><?= $person->name ?></p>
		<div class="line"></div>
		<p class="function"><?= $person->role ?></p>
	</div>
</article>
