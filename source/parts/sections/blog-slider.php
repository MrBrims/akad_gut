<section class="section blog-slider">
    <div class="container">
        <h2 class="title blog-slider__title">
            Blog
        </h2>
        <div class="blog-slider__body swiper">
            <div class="blog-slider__wrapper swiper-wrapper">
                <?php
                $query_args = array(
                    // 'cat' => '17',
                    'posts_per_page' => 5,
                )
                ?>
                <?php $query = new WP_Query($query_args); ?>
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="blog-slider__slide swiper-slide">
                            <div class="blog-slider__slide-inner">
                                <a class="blog-slider__slide-link" href="<?php echo esc_url(get_permalink()); ?>">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>
                                <div class="blog-slider__content">
                                    <div class="blog-slider__slide-meta">
                                        <span class="blog-slider__slide-category"><?php the_category(', '); ?></span>
                                        <span class="blog-slider__slide-date"><?php the_time('d.m.Y'); ?></span>
                                    </div>
                                    <h3 class="blog-slider__slide-title">
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="blog-slider__nav"></div>
    </div>
</section>