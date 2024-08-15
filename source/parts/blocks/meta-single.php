<div class="meta-single">
	<div class="meta-single__item meta-single__cat">
		<?php the_category(', '); ?>
	</div>
	<div class="meta-single__item meta-single__date">
		Veröffentlicht: <?php echo get_the_date('d.m.Y'); ?>
	</div>
	<div class="meta-single__item meta-single__modif">
		Erneut: <?php the_modified_date('d.m.Y'); ?>
	</div>
</div>