<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>" style="margin-top: 0px !important;">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="ahrefs-site-verification" content="6b9c0c683d94d02847a03035e120f7761fb17cb6e7ade600f7319a99f4c3bd90">

	<?php if (is_single()) get_template_part('parts/shema/microdata-single') ?>
	<?php if (is_page()) get_template_part('parts/shema/microdata-page') ?>

	<style>
		.popup {
			opacity: 0;
			visibility: hidden;
		}
	</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<div class="wrapper">

		<header class="header">
			<div class="header__top">
				<div class="container">
					<div class="header__top-inner">
						<div class="header__top-time">
							<?php echo carbon_get_theme_option('global_time'); ?>
						</div>
						<?php
						wp_nav_menu([
							'theme_location' => 'topheader-menu',
							'container' => 'nav',
							'container_class' => 'top-header-nav',
							'container_id' => 'top-header-nav',
							'menu_class' => 'top-header-nav__list',
							'menu_id' => 'top-header-menu',
						]);
						?>
						<a class="header__top-phone" href="tel:+<?php echo preg_replace("/[^,.0-9]/", '', carbon_get_theme_option('global_phone')); ?>">
							<?php echo carbon_get_theme_option('global_phone'); ?>
						</a>
						<a class="header__top-mail" href="mailto:<?php echo carbon_get_theme_option('global_email'); ?>">
							<?php echo carbon_get_theme_option('global_email'); ?>
						</a>
					</div>
				</div>
			</div>
			<div class="header__bottom">
				<div class="container">
					<div class="header__bottom-inner">
						<a class="header__logo-link" href="<?php echo get_option('home'); ?>">
							<img class="header__logo-img" src="<?php echo get_template_directory_uri(); ?>/resources/images/logo.svg" alt="logo">
						</a>
						<div class="header__menu-wrapper">
							<div class="menu-box">
								<a class="menu-box__logo-link" href="<?php echo get_option('home'); ?>">
									<img class="menu-box__logo-img" src="<?php echo get_template_directory_uri(); ?>/resources/images/logo.svg" alt="logo">
								</a>
								<?php
								wp_nav_menu([
									'theme_location' => 'top-menu',
									'container' => 'nav',
									'container_class' => 'top-nav',
									'container_id' => 'top-nav',
									'menu_class' => 'top-menu',
									'menu_id' => 'top-menu',
									'add_li_class'  => 'top-menu__items',
								]);
								?>
								<div class="menu-box__inner">
									<div class="menu-box__adress">
										<?php echo carbon_get_theme_option('global__adress'); ?>
									</div>
									<div class="menu-box__time">
										<?php echo carbon_get_theme_option('global_time'); ?>
									</div>
									<a class="menu-box__phone" href="tel:+<?php echo preg_replace("/[^,.0-9]/", '', carbon_get_theme_option('global_phone')); ?>">
										<?php echo carbon_get_theme_option('global_phone'); ?>
									</a>
									<a class="menu-box__mail" href="mailto:<?php echo carbon_get_theme_option('global_email'); ?>">
										<?php echo carbon_get_theme_option('global_email'); ?>
									</a>
								</div>
							</div>
							<a class="btn header__btn-popup popup-link" href="#popup-form" title="ein Formular für eine optionale Anfrage öffnen"></a>
							<div class="header__btn-wrappper">
								<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
									<circle class="header__btn-circle" cx="50" cy="50" r="30" />
									<path class="line--1" d="M0 40h62c13 0 6 28-4 18L35 35" />
									<path class="line--2" d="M0 50h70" />
									<path class="line--3" d="M0 60h62c13 0 6-28-4-18L35 65" />
								</svg>
							</div>
							<div class="header__btn-search">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff">
									<path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"></path>
								</svg>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="header__search">
				<div class="container">
					<?php get_template_part('parts/blocks/searchform'); ?>
				</div>
			</div>
		</header>