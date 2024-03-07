<article class="motion">
	<a href="<?= $server->url ?>/bezirksrat/antraege/<?= $motion->longid ?>">
		<h3 class="title"><?= $motion->title ?></h3>
		<div class="infoline">
			<span class="status" data-status="<?= $motion->status->value ?>">
				<?= match($motion->status->value){ 'draft' => 'Entwurf zur Abstimmung', 'accepted' => 'Angenommen', 'rejected' => 'Abgelehnt' } ?>
				· Sitzung am <?= $motion->timestamp?->format('d. MMMM Y') ?>
			</span>
			<span class="details">
				<?= match($motion->status->value){ 'draft' => 'Details', default => 'Details und Ergebnis' } ?>
			</span>
		</div>
	</a>
</article>
