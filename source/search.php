<?php

get_header();

if (have_posts()) :

	echo '<article class="search-page">';
	echo '<div class="container">';
	echo '<h2 class="search-page__title title">Suchergebnisse</h2>';
	echo '<div class="search-page__head">';
	get_template_part('parts/blocks/searchform-page');
	echo '<p class="search-page__head-result">';
	printf(esc_html__('Die Suchanfrage "%s" ergab %d Treffer', 'akademily'), get_search_query(), $wp_query->found_posts);
	echo '</p>';
	echo '</div>';
	while (have_posts()) :
		the_post();
		the_title(sprintf('<h3 class="search-page__result-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');
		$maxchar = 300;
		$text = strip_tags(get_the_content());
		$text = strip_shortcodes($text);
		echo '<p class="search-page__excerpt">' . mb_substr($text, 0, $maxchar) . '</p>';
	endwhile;
	PageNavigation::wp_page_nav();
	echo '</div>';
	echo '</article>';


else :
	echo '<article class="search-page search-nan">';
	echo '<div class="container">';
	echo '<h2 class="search-page__title title">Suchergebnisse</h2>';
	echo '<div class="search-page__head">';
	get_template_part('parts/blocks/searchform-page');
	echo '<p class="search-page__head-result">';
	printf(esc_html__('Die Suchanfrage "%s" ergab %d Treffer', 'akademily'), get_search_query(), $wp_query->found_posts);
	echo '</p>';
	echo '</div>';
	echo '<div class="search-page__null">';
	echo '<div class="search-page__null-item">';
	echo '<p class="search-page__null-title">Leider ist nichts gefunden :(</p>';
	echo '</div>';
	echo '<div class="search-page__null-item">';
	echo '<img src="' . get_template_directory_uri() . '/resources/images/search-nan.svg">';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</article>';
endif;

get_footer();
