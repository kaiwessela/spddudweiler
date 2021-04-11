<article class="person-card">
	<figure>
		<?php if(!empty($person->image)){ ?>

		<img src="<?= $person->image->src() ?>"
			srcset="<?= $person->image->srcset() ?>"
			sizes="15rem"
			alt="<?= $person->image->alternative ?>">

		<?php } else { ?>

		<img src="<?= $server->url ?>/resources/images/platzhalter.svg"
			sizes="18rem" alt="">

		<?php } ?>

		<figcaption>
			<h3 class="name"><?= $person->name ?></h3>
			<p class="role"><?= $person->role ?></h3>
		</figcaption>
	</figure>
</article>
