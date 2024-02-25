<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include 'components/head.php'; ?>
		<title><?= $Motion->title ?> – <?= $site->title ?></title>
		<script src="<?= $server->url ?>/resources/js/chart.min.js"></script>
	</head>
	<body>
		<?php include 'components/header.php'; ?>
		<main class="motion">
			<header class="highlighted">
				<p class="opener">Antrag der SPD-Fraktion an den Bezirksrat</p>
				<h1 class="title"><?= $Motion->title ?></h1>
				<p class="status" data-status="<?= $Motion->status ?>">
					<?= match($Motion->status){ 'draft' => 'Entwurf zur Abstimmung', 'accepted' => 'Angenommen', 'rejected' => 'Abgelehnt' } ?>
					· Bezirksratssitzung am
					<time datetime="<?= $Motion->timestamp?->format('iso') ?>">
						<?= $Motion->timestamp?->format('date') ?>
					</time>
				</p>
			</header>
			<section>
				<h2>Beschreibung</h2>
				<?= $Motion->description?->parse() ?>
			</section>

			<?php if(!empty($Motion->document)){ ?>
			<section>
				<a class="file" href="<?= $Motion->document->src() ?>">
					<img src="<?= $server->url ?>/resources/images/pdficon.svg" alt="PDF-Icon">
					<h2 class="title"><?= $Motion->document->title ?></h2>
					<p class="download">Zum Download</p>
				</a>
			</section>
			<?php } ?>

			<section>
				<h2>Abstimmungsergebnis</h2>
				<div class="result">
					<div>
						<h3>Gesamt</h3>
						<canvas id="result-general" height="300" width="400"></canvas>
					</div>
					<div>
						<h3>Nach Fraktionen</h3>
						<canvas id="result-fractions" height="300" width="400"></canvas>
					</div>
				</div>
			</section>
			<?php
				$data_general = [
					'yes' => 0,
					'no' => 0,
					'neutral' => 0
				];

				foreach($Motion->votes as $vote){
					if($vote['vote'] === 'yes'){
						$data_general['yes'] = $data_general['yes'] + $vote['amount'];
					} else if($vote['vote'] === 'no'){
						$data_general['no'] = $data_general['no'] + $vote['amount'];
					} else {
						$data_general['neutral'] = $data_general['neutral'] + $vote['amount'];
					}
				}

				$labels_fractions = [];
				$yes = [];
				$no = [];
				$neutral = [];
				$data_fractions = [];

				foreach($Motion->votes as $vote){
					if(!in_array($vote['party'], $labels_fractions)){
						$labels_fractions[] = $vote['party'];
						$yes[$vote['party']] = 0;
						$no[$vote['party']] = 0;
						$neutral[$vote['party']] = 0;
						$data_fractions[$vote['party']][0] = 0;
						$data_fractions[$vote['party']][1] = 0;
						$data_fractions[$vote['party']][2] = 0;
					}

					if($vote['vote'] === 'yes'){
						$yes[$vote['party']] = $vote['amount'];
						$data_fractions[$vote['party']][0] = $vote['amount'];
					} else if($vote['vote'] === 'no'){
						$no[$vote['party']] = $vote['amount'];
						$data_fractions[$vote['party']][1] = $vote['amount'];
					} else {
						$neutral[$vote['party']] = $vote['amount'];
						$data_fractions[$vote['party']][2] = $vote['amount'];
					}
				}
			?>
			<script>
				var general = new Chart('result-general', {
					type: 'doughnut',
					data: {
						labels: ['Ja', 'Nein', 'Enthaltung'],
						datasets: [{
							label: 'Anzahl an Stimmen',
							data: [<?= implode(', ', $data_general) ?>],
							backgroundColor: ['#4fa64e', '#d93033', '#cccccc']
						}]
					},
					options: {
						responsive: true,
						circumference: Math.PI,
						rotation: -1 * Math.PI,
						layout: {
							padding: '1rem'
						}
					}
				});
			</script>
			<script>
				var fractions = new Chart('result-fractions', {
					type: 'horizontalBar',
					data: {
						labels: ['Ja', 'Nein', 'Enthaltung'],
						datasets: [
						<?php foreach($data_fractions as $name => $fracd){ ?>
							{
								label: '<?= $name ?>',
								data: [<?= implode(', ', $fracd) ?>],
								backgroundColor: '<?= match($name){
									'SPD' => '#e3000f88',
									'CDU' => '#00000088',
									'Die Linke' => '#be307588',
									'B90/Die Grünen' => '#19a32988',
									'FDP' => '#ffff0088'
								} ?>',
								borderColor: '<?= match($name){
									'SPD' => '#e3000f',
									'CDU' => '#000000',
									'Die Linke' => '#be3075',
									'B90/Die Grünen' => '#19a329',
									'FDP' => '#ffff00'
								} ?>',
								borderWidth: 2,
								borderSkipped: false
							},
						<?php } ?>
						]
					},
					options: {
						responsive: true,
						scales: {
							xAxes: [{ stacked: true }],
							yAxes: [{ stacked: true }]
						},
						layout: {
							padding: 20
						}
					}
				});
			</script>
		</main>
		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
