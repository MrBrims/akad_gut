<?php
get_header();
while (have_posts()) {
	the_post();
}
echo '<main class="main">';
get_template_part('parts/sections/hero');
echo '<div class="rich-text container">';
the_content();
echo '</div>';
echo '</main>';
get_footer();
