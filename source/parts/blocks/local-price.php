<div class="tab tab-price">
    <div class="tab__nav-inner tab-price__nav-inner">
        <?php foreach ((carbon_get_post_meta(get_the_ID(), 'local_price_tab_nav')) as $key) : ?>
            <div class="tab__nav tab-price__nav">
                <?php echo $key['local_price_tab_name']; ?>
                <span class="tab-price__tippy " data-tippy-content="<?php echo $key['local_price_tab_note']; ?>"></span>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="tab__content-inner">
        <?php foreach ((carbon_get_post_meta(get_the_ID(), 'local_price_tab_content')) as $key) : ?>
            <div class="tab__content tab-price__content">
                <div class="tab-price__items">
                    <div class="tab-price__item">
                        <p class="tab-price__note">
                            <?php echo $key['local_price_tab_note']; ?>
                        </p>
                        <div class="tab-price__num">
                            <?php echo $key['local_price_tab_num_pref']; ?>
                            <span class="tab-price__num-accent">
                                <?php echo $key['local_price_tab_num']; ?>
                                <?php echo $key['local_price_tab_num_currency']; ?>
                            </span>
                            <?php echo $key['local_price_tab_num_after']; ?>
                        </div>
                        <a class="tab-price__btn popup-link" href="#popup-form">
                            <?php echo $key['local_price_tab_btn']; ?>
                        </a>
                    </div>
                    <div class="tab-price__item">
                        <?php echo apply_filters('the_content',  $key['local_price_tab_list']); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>