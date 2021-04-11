<header class="open notransition">
	<nav>
		<ul>
			<li><a href="<?= $server->url ?>/" <?php if($server->path == ''){ ?>class="current" <?php } ?>>Startseite</a></li>
			<li><a href="<?= $server->url ?>/aktuelles/" <?php if($server->path == 'aktuelles'){ ?>class="current" <?php } ?>>Aktuelles</a></li>
			<li><a href="<?= $server->url ?>/ueber-uns/" <?php if($server->path == 'ueber-uns'){ ?>class="current" <?php } ?>>Über uns</a></li>
			<li><a href="<?= $server->url ?>/wir-vor-ort/" <?php if($server->path == 'wir-vor-ort'){ ?>class="current" <?php } ?>>Wir vor Ort</a></li>
			<li><a href="<?= $server->url ?>/mitmachen/" <?php if($server->path == 'mitmachen'){ ?>class="current" <?php } ?>>Mitmachen</a></li>
		</ul>
	</nav>
	<img class="logo" role="banner" src="<?= $server->url ?>/resources/images/Logo_SPD_Dudweiler_weiss.svg" alt="Logo der SPD Dudweiler">
	<button class="openbtn" title="Navigation anzeigen oder ausblenden">
		<div class="top"></div>
		<div class="mid"></div>
		<div class="bot"></div>
	</button>
</header>
