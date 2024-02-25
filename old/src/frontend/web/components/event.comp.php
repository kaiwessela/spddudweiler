<?php
use \Blog\Frontend\Web\Modules\TimeFormat;
?>
<article class="event<?php if($event->cancelled){ ?> cancelled<?php } ?>" data-organisation="<?= str_replace(' ', '', $event->organisation) ?>">
	<div class="timestamp">
		<span class="day"><?= date('d.', $event->timestamp) ?></span>
		<span class="month"><?= strftime('%B', $event->timestamp) ?></span>
		<span class="year"><?= date('Y', $event->timestamp) ?></span>
		<span class="time"><?= date('H:i', $event->timestamp) ?> Uhr</span>
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
