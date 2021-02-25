<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include COMPONENT_PATH . 'head.php'; ?>
		<title><?= $Proposal->title ?> – <?= $site->title ?></title>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	</head>
	<body>
		<?php include COMPONENT_PATH . 'header.php'; ?>
		<main>
			<header class="highlighted">
				<p>Antrag an den Bezirksrat zum Thema:</p>
				<h1><?= $Proposal->title ?></h1>
				<p>
					Sitzung am
					<time datetime="<?= $Proposal->timestamp?->format('iso') ?>">
						<?= $Proposal->timestamp?->format('date') ?>
					</time>
				</p>
				<p class="status" data-status="<?= $Proposal->status ?>">
					<?= match($Proposal->status){ 'draft' => 'Entwurf zur Abstimmung', 'accepted' => 'Angenommen', 'rejected' => 'Abgelehnt' } ?>
				</p>
			</header>
			<section>
				<h2>Beschreibung</h2>
				<?= $Proposal->description?->parse() ?>
			</section>
			<section>
				<h2>Abstimmungsergebnis</h2>
				<h3>Gesamt</h3>
				<canvas id="result-general" height="400" width="400"></canvas>
				<h3>Nach Fraktionen</h3>
				<canvas id="result-fractions" height="400" width="400"></canvas>
			</section>
			<?php
				$data_general = [
					'yes' => 0,
					'no' => 0,
					'neutral' => 0
				];

				foreach($Proposal->votes as $vote){
					if($vote['vote'] === true){
						$data_general['yes'] = $data_general['yes'] + $vote['amount'];
					} else if($vote['vote'] === false){
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

				foreach($Proposal->votes as $vote){
					if(!in_array($vote['party'], $labels_fractions)){
						$labels_fractions[] = $vote['party'];
						$yes[$vote['party']] = 0;
						$no[$vote['party']] = 0;
						$neutral[$vote['party']] = 0;
						$data_fractions[$vote['party']][0] = 0;
						$data_fractions[$vote['party']][1] = 0;
						$data_fractions[$vote['party']][2] = 0;
					}

					if($vote['vote'] === true){
						$yes[$vote['party']] = $vote['amount'];
						$data_fractions[$vote['party']][0] = $vote['amount'];
					} else if($vote['vote'] === false){
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
							backgroundColor: ['#54e84a', '#c42a25', '#cccccc']
						}]
					},
					options: {
						responsive: false,
						circumference: Math.PI,
						rotation: -1 * Math.PI
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
									'SPD' => '#e3000f44',
									'CDU' => '#00000044',
									'Die Linke' => '#be307544',
									'B90/Die Grünen' => '#19a32944',
									'FDP' => '#ffff0044'
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
						responsive: false,
						scales: {
							xAxes: [{ stacked: true }],
							yAxes: [{ stacked: true }]
						}
					}
				});


				/*var fractions = new Chart('result-fractions', {
					type: 'bar',
					data: {
						labels: ["<?= implode('", "', $labels_fractions) ?>"],
						datasets: [
							{
								label: 'Ja',
								data: [<?= implode(', ', $yes) ?>],
								barPercentage: 0.5,
								borderWidth: 2,
								borderSkipped: '',
								borderColor: '#54e84a'
							},
							{
								label: 'Nein',
								data: [<?= implode(', ', $no) ?>],
								barPercentage: 0.5,
								borderWidth: 2,
								borderSkipped: '',
								borderColor: '#c42a25'
							},
							{
								label: 'Enthaltung',
								data: [<?= implode(', ', $neutral) ?>],
								barPercentage: 0.5,
								borderWidth: 2,
								borderSkipped: '',
								borderColor: '#cccccc'
							}
						]
					},
					options: {
						responsive: false,
						scales: {
							xAxes: [{ stacked: true }],
							yAxes: [{ stacked: true }]
						}
					}
				});*/
			</script>
		</main>
		<?php include COMPONENT_PATH . 'footer.php'; ?>
		<?php include COMPONENT_PATH . 'scripts.php'; ?>
	</body>
</html>
