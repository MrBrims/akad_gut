<?php
class PageNavigation
{
	public static function wp_page_nav()
	{
		global $wp_query;
		$total = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
		$a['total'] = $total;
		$a['mid_size'] = 2;
		$a['end_size'] = 1;
		$a['prev_text'] = '';
		$a['next_text'] = '';

		if ($total > 1) echo '<nav class="pagination">';
		echo paginate_links($a);
		if ($total > 1) echo '</nav>';
	}
}

new PageNavigation();
