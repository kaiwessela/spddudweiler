<article class="event<?php if($event->cancelled){ ?> cancelled<?php } ?>" data-organisation="<?= $event->organisation ?>">
	<div class="timestamp">
		<span class="day"><?= $event->timestamp?->format('day') ?></span>
		<span class="month"><?= $event->timestamp?->format('monthname') ?></span>
		<span class="year"><?= $event->timestamp?->format('year') ?></span>
		<span class="time"><?= $event->timestamp?->format('time') ?></span>
	</div>
	<p class="organisation"><?= $event->organisation ?></p>
	<h4 class="title"><?= $event->title ?></h4>
	<p class="location">Ort: <?= $event->location ?></p>
	<p class="description">
		<?php if($event->cancelled){ ?>
		<span class="cancelmsg">ABGESAGT – </span>
		<?php } ?>
		<?= $event->description ?>
	</p>
</article>
