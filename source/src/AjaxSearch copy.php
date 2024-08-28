<?php

class AjaxSearch
{
	public function __construct()
	{
		add_action('wp_ajax_nopriv_ajax_search', [$this, 'ajax_search']);
		add_action('wp_ajax_ajax_search', [$this, 'ajax_search']);
	}

	function ajax_search()
	{
		$args = array(
			'post_type'      => ['page'], // Тип записи: post, page, кастомный тип записи
			'post_status'    => 'publish',
			'order'          => 'DESC',
			'orderby'        => 'relevance',
			's'              => $_POST['term'],
			'posts_per_page' => 5
		);
		$query = new WP_Query($args);
		if ($query->have_posts()) {
			$also_output = false;
			while ($query->have_posts()) : $query->the_post();
				$titleRelevance = strpos(strtolower($query->post->post_title), strtolower($_POST['term']));
				if ($titleRelevance !== false) {
					get_template_part('parts/blocks/loop-search-item');
				}
				if ($titleRelevance === false) {
					if (!$also_output) {
						echo '<strong>Also</strong>';
						$also_output = true;
					}
?>
					<li class="ajax-search__item">
						<a class="ajax-search__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</li>
<?php
				}
			// get_template_part('parts/blocks/loop-search-item');
			endwhile;
			echo '<li class="ajax-search__item"><input class="ajax-search__submit" type="submit" value="View more results..." aria-label="Search button"></li>';
		} else {
			echo '<p class="ajax-search__null">Nichts gefunden</p>';
		}
		exit;
	}
}
new AjaxSearch;
