<?php
use \Blog\Config\Config;
use \Blog\Frontend\Web\SiteConfig;
?>
<header class="open notransition">
	<nav>
		<ul>
			<a href="<?= Config::SERVER_URL ?>/"><li>Startseite</li></a>
			<a href="<?= Config::SERVER_URL ?>/aktuelles/"><li>Aktuelles</li></a>
			<a href="<?= Config::SERVER_URL ?>/ueber-uns/"><li>Über uns</li></a>
			<a href="<?= Config::SERVER_URL ?>/vor-ort/"><li>Wir vor Ort</li></a>
			<a href="<?= Config::SERVER_URL ?>/mitmachen/"><li>Mitmachen</li></a>
		</ul>
	</nav>
	<img class="logo" role="banner" src="<?= Config::SERVER_URL ?>/resources/images/static/Logo_SPD_Dudweiler_rot.svg" alt="Logo der SPD Dudweiler">
	<div class="opener">
		<button title="Navigation anzeigen oder ausblenden">
			<div class="top"></div>
			<div class="middle"></div>
			<div class="bottom"></div>
		</button>
	</div>
</header>
