<!DOCTYPE html>
<html lang="de">
	<head>
		<?php include 'components/head.php'; ?>
		<title><?= $Motion->title ?> – <?= $site->title ?></title>
	</head>
	<body>
		<?php include 'components/header.php'; ?>
		<main>
			<article class="motion">
				<header>
					<p class="opener">Antrag der SPD-Fraktion an den Bezirksrat</p>
					<h1 class="title"><?= $Motion->title ?></h1>
					<p class="status" data-status="<?= $Motion->status ?>">
						<?= match($Motion->status){
							'draft' => 'Entwurf zur Abstimmung',
							'accepted' => 'Angenommen',
							'rejected' => 'Abgelehnt'
						} ?>
						· Bezirksratssitzung am
						<time datetime="<?= $Motion->timestamp?->iso() ?>">
							<?= $Motion->timestamp?->format('date') ?>
						</time>
					</p>
				</header>
				<section>
					<h2>Beschreibung</h2>
					<?= $Motion->description?->parse() ?>

					<?php if(!empty($Motion->document)){ ?>
					<a class="file" href="<?= $Motion->document->src() ?>">
						<h3 class="title"><?= $Motion->document->title ?></h3>
						<p class="download">Download der PDF-Datei</p>
					</a>
					<?php } ?>
				</section>

				<?php if(!empty($Motion->votes)){ ?>
				<section>
					<h2>Abstimmungsergebnis</h2>
					<div class="result">
						<div>
							<h3 class="title">Gesamt</h3>
							<canvas id="result-general" height="300" width="500"></canvas>
						</div>
						<div>
							<h3 class="title">Nach Fraktionen</h3>
							<canvas id="result-fractions" height="300" width="500"></canvas>
						</div>
					</div>
				</section>
				<?php } ?>

			</article>
		</main>

<?php
if(!empty($Motion->votes)){
	$general = [
		'yes' => 0,
		'abstention' => 0,
		'no' => 0
	];

	$fractions = [
		'CDU' 				=> [	0,	0,	0	],
		'SPD'				=> [	0,	0,	0	],
		'Die Linke'			=> [	0,	0,	0	],
		'B90/Die Grünen'	=> [	0,	0,	0	],
		'FDP'				=> [	0,	0,	0	]
	];

	foreach($Motion->votes as $v){
		$vote = $v['vote']; # yes | no | abstention
		$general[$vote] += $v['amount'];

		$number = match($vote){ 'yes' => 0, 'no' => 1, 'abstention' => 2 };
		$fractions[$v['party']][$number] += $v['amount'];
	}

		?>
		<script src="<?= $server->url ?>/resources/js/chart.js"></script>
		<script>
			Chart.defaults.font.size = 16;

			var general = new Chart('result-general', {
				type: 'doughnut',
				data: {
					labels: ['Ja', 'Enthaltung', 'Nein'],
					datasets: [{
						label: 'Anzahl an Stimmen',
						data: [<?= implode(', ', $general) ?>],
						backgroundColor: ['#4fa64edd', '#ccccccdd', '#d93033dd'],
						borderColor: ['#4fa64e', '#cccccc', '#d93033']
					}]
				},
				options: {
					responsive: false,
					circumference: 180,
					rotation: -90
				}
			});

			var fractions = new Chart('result-fractions', {
				type: 'bar',
				data: {
					labels: ['Ja', 'Nein', 'Enthaltung'],
					datasets: [
					<?php foreach($fractions as $name => $data){ ?>
						{
							label: '<?= $name ?>',
							data: [<?= implode(', ', $data) ?>],
							backgroundColor: '<?= match($name){
								'SPD' => '#e3000faa',
								'CDU' => '#000000aa',
								'Die Linke' => '#be3075aa',
								'B90/Die Grünen' => '#19a329aa',
								'FDP' => '#ffff00aa'
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
						x: {
							stacked: true
						},
						y: {
							stacked: true
						}
					},
					indexAxis: 'y',
				}
			});
		</script>

		<?php
}
?>

		<?php include 'components/footer.php'; ?>
		<?php include 'components/scripts.php'; ?>
	</body>
</html>
