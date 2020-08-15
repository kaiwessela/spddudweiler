<?php
use \Blog\Config\Config;
use \Blog\Frontend\Web\SiteConfig;
?>
<footer>
	<div class="content">
		<div>
			<h2>Navigation</h2>
			<ul class="link-list">
				<li><a href="<?= Config::SERVER_URL ?>/">Startseite</a></li>
				<li><a href="<?= Config::SERVER_URL ?>/posts/">Alle Blogartikel</a></li>
			</ul>
		</div>
		<div>
			<h2>Kontakt</h2>
			<ul class="link-list">
				<li><a href="https://twitter.com/kaiwessela">Twitter (@kaiwessela)</a></li>
				<li><a href="">Mastodon</a></li>
				<li><a href="https://github.com">GitHub</a></li>
				<li><a href="mailto:hi@kaiwessela.de">E-Mail (PGP)</a></li>
				<li><a href="">Impressum</a></li>
				<li><a href="">Datenschutzerklärung</a></li>
			</ul>
			<p>Website erstellt mit kaiwessela/blog, <br>selbstverständlich open source</p>
			<p>Alle Inhalte unter Creative Commons, <br>sofern nicht anders angegeben</p>
		</div>
	</div>
	<img class="logo" src="<?= Config::SERVER_URL ?>/resources/images/static/Logo_SPD_Dudweiler_rot.svg" alt="">
</footer>
