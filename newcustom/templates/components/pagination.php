<div class="pagination">
	<?php

/*
prev    first … #(-10) … # # # cur # # # … #(+10) … last    next
*/

	if($p->page_exists($p->current_page - 1)){
		$item = $p->items[$p->current_page - 1];

		?><a href="<?= $item->href() ?>" class="item prev" title="Eine Seite zurück">Zurück</a><?php
	} else {
		?><div class="item blind prev"></div><?php
	}

	?><div><?php

	if(!$p->items[$p->first_page()]->is_current()){
		$item = $p->items[$p->first_page()];

		?><a href="<?= $item->href() ?>" class="item first" title="Erste Seite">Erste</a><?php
	} else {
		?><div class="item blind first"></div><?php
	}

	foreach([-10, -3, -2, -1, 0, 1, 2, 3, 10] as $l){
		if(abs($l) == 10){
			$class = 'bigjump';
		} else if(abs($l) == 0){
			$class = 'current';
		} else {
			$class = '';
		}

		if($p->page_exists($p->current_page + $l)){
			$item = $p->items[$p->current_page + $l];

			?><a href="<?= $item->href() ?>" class="item <?= $class ?>" title="Seite <?= $item->number ?>"><?= $item->number ?></a><?php
		} else {
			?><div class="item blind <?= $class ?>"></div><?php
		}
	}

	if(!$p->items[$p->last_page()]->is_current()){
		$item = $p->items[$p->last_page()];

		?><a href="<?= $item->href() ?>" class="item last" title="Letzte Seite">Letzte</a><?php
	} else {
		?><div class="item blind last"></div><?php
	}

	?></div><?php

	if($p->page_exists($p->current_page + 1)){
		$item = $p->items[$p->current_page + 1];

		?><a href="<?= $item->href() ?>" class="item next" title="Eine Seite weiter">Weiter</a><?php
	} else {
		?><div class="item blind next"></div><?php
	}



	?>
</div>
