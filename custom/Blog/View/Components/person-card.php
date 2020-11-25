<article class="person static">
	<div>
		<?php if(!empty($person->image)){
			$picture = $person->image;
			include COMPONENT_PATH . 'picture.php';
		} ?>
		<p class="name"><?= $person->name ?></p>
		<div class="line"></div>
		<p class="function"><?= $person->role ?></p>
	</div>
</article>
