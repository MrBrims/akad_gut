<footer class="footer">
	<div class="container">
		<?php
		get_template_part('parts/sections/footer/footer-top');
		get_template_part('parts/sections/footer/footer-two');
		// get_template_part('parts/sections/footer/footer-middle');
		// get_template_part('parts/sections/footer/footer-three');
		get_template_part('parts/sections/footer/footer-bottom');
		?>
	</div>
</footer>

<?php
get_template_part('parts/blocks/popup-form');
get_template_part('parts/blocks/popup-thank');
get_template_part('parts/blocks/buttons');
?>

<?php wp_footer(); ?>
</div>
</body>

</html>