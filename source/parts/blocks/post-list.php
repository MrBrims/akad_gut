<div class="post-list" id="blog-id-<?php echo get_the_ID(); ?>">
    <div class="post-list__thumb-box">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
    </div>
    <div class="post-list__content">
        <h3 class="post-list__title">
            <a href="<?php echo get_the_permalink(); ?>">
                <?php echo get_the_title(); ?>
            </a>
        </h3>
        <div class="post-list__meta">
            <div class="post-list__cat">
                <?php
                $cat = get_the_category(get_the_ID());
                echo $cat[0]->name;
                ?>
            </div>
            <div class="post-list__date">
                <span><?php echo get_the_date('d.m.Y'); ?></span>
            </div>
        </div>
        <a class="post-list__btn" href="<?php echo get_the_permalink(); ?>">ARTIKEL LESEN</a>
    </div>
</div>