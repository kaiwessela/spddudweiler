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
				<li><a href="<?= Config::SERVER_URL ?>/aktuelles">Aktuelles</a></li>
				<li><a href="<?= Config::SERVER_URL ?>/ueber-uns">Über uns</a></li>
				<li><a href="<?= Config::SERVER_URL ?>/vor-ort">Wir vor Ort</a></li>
				<li><a href="<?= Config::SERVER_URL ?>/mitmachen">Mitmachen</a></li>
			</ul>
			<br>
			<ul class="link-list">
				<li><a href="<?= Config::SERVER_URL ?>/impressum">Impressum</a></li>
				<li><a href="<?= Config::SERVER_URL ?>/datenschutz">Datenschutzerklärung</a></li>
			</ul>
		</div>
		<div>
			<h2>Kontakt</h2>
			<p>
				Sozialdemokratische Partei Deutschlands<br>
				Ortsverein Dudweiler<br>
			</p>
			<p>
				Vorsitzender: Rudolf Altmeyer<br>
				Robert-Koch-Straße 18<br>
				66125 Saarbrücken
			</p>
			<br>
			<ul class="link-list">
				<li><a href="mailto:info@spd-dudweiler.de">E-Mail: info@spd-dudweiler.de</a></li>
				<li><a href="tel:+496897764333">Telefon: 06897 / 764333</a></li>
				<li><a href="https://facebook.com/SPDDudweiler">Facebook (SPDDudweiler)</a></li>
				<li><a href="https://twitter.com/SPD_Dudweiler">Twitter (@SPD_Dudweiler)</a></li>
				<li><a href="https://instagram.com/spddudweiler">Instagram (@spddudweiler)</a></li>
			</ul>
			<!-- TODO cc-Hinweise -->
		</div>
	</div>
	<img class="logo" src="<?= Config::SERVER_URL ?>/resources/images/static/Logo_SPD_Dudweiler_rot.svg" alt="">
</footer>
