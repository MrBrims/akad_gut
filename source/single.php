<?php
get_header();
while (have_posts()) {
	the_post();
}
echo '<main class="main">';
get_template_part('parts/sections/hero-single');
echo '<div class="rich-text container">';
echo	'<div class="single-breadcrumb">';
yoast_breadcrumb('<div class="single-breadcrumb__list">', '</div>');
echo '</div>';
the_post_thumbnail();
get_template_part('parts/blocks/meta-single');
the_content();
get_template_part('parts/blocks/page-author');
get_template_part('parts/sections/message-post');
get_template_part('parts/sections/blog-slider');
get_template_part('parts/sections/contact');
echo '</div>';
echo '</main>';
get_footer();
