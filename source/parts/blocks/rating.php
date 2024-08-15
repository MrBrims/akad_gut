<div class="rating">
    <a href="https://www.google.com/search?q=akademily+reviews&oq=akademily+reviews" target="_blank" class="rating__inner">
        <img class="rating__logo" src="<?php echo get_template_directory_uri() ?>/resources/images/rating_logo/goo.webp" alt="google logo">
        <div class="rating__box">
            <?php
            $rating = floatval(carbon_get_theme_option('rating_google')) * 2;
            $stars = intdiv($rating, 2);

            for ($i = 0; $i < $stars; $i++) {
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
            }

            if ($rating % 2 != 0) {
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
            }

            echo '<span class="rating__num">', $rating / 2, ' / 5 </span>';

            ?>
        </div>
    </a>
    <a href="https://www.provenexpert.com/academily-de/" target="_blank" class="rating__inner">
        <img class="rating__logo" src="<?php echo get_template_directory_uri() ?>/resources/images/rating_logo/pro.webp" alt="provent logo">
        <div class="rating__box">
            <?php
            $rating = floatval(carbon_get_theme_option('rating_provent')) * 2;
            $stars = intdiv($rating, 2);

            for ($i = 0; $i < $stars; $i++) {
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
            }

            if ($rating % 2 != 0) {
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
            }

            echo '<span class="rating__num">', $rating / 2, ' / 5 </span>';

            ?>
        </div>
    </a>
    <div href="https://kundennote.com/app/profil/academily-de" target="_blank" class="rating__inner">
        <img class="rating__logo" src="<?php echo get_template_directory_uri() ?>/resources/images/rating_logo/kundenot.webp" alt="Kundennote rating logo">
        <div class="rating__box">
            <?php
            $rating = floatval(carbon_get_theme_option('rating_akademily')) * 2;
            $stars = intdiv($rating, 2);

            for ($i = 0; $i < $stars; $i++) {
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
            }

            if ($rating % 2 != 0) {
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
            }

            echo '<span class="rating__num">', $rating / 2, ' / 5 </span>';

            ?>
        </div>
    </div>
</div>