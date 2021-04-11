<article class="event<?php if($event->cancelled){ ?> cancelled<?php } ?>" data-organisation="<?= $event->organisation ?>">
	<time datetime="<?= $event->timestamp->iso() ?>">
		<span class="day"><?= $event->timestamp->format('day') ?>.</span>
		<span class="month"><?= $event->timestamp->format('monthname') ?></span>
		<span class="time"><?= $event->timestamp->format('time') ?></span>
	</time>
	<div>
		<h3 class="title"><?= $event->title ?></h4>
		<p class="organisation"><?= $event->organisation ?></p>
		<p class="location">Ort: <?= $event->location ?></p>
		<p class="description">
			<?= $event->description?->parse() ?>
		</p>
	</div>
</article>
