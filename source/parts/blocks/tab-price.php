<div class="tab tab-price">
	<div class="tab__nav-inner tab-price__nav-inner">
		<?php foreach ((carbon_get_post_meta(get_the_ID(), 'price_tab_main')) as $key) : ?>
			<div class="tab__nav tab-price__nav">
				<?php echo $key['price_tab_name']; ?>
				<span class="tab-price__tippy " data-tippy-content="<?php echo $key['price_tab_note']; ?>"></span>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="tab__content-inner">
		<?php foreach ((carbon_get_post_meta(get_the_ID(), 'price_tab_main')) as $key) : ?>
			<div class="tab__content tab-price__content">
				<div class="tab-price__items">
					<div class="tab-price__item">
						<p class="tab-price__note">
							<?php echo $key['price_tab_note']; ?>
						</p>
						<div class="tab-price__num">
							ab
							<span class="tab-price__num-accent">
								<?php echo $key['price_tab_num']; ?>
								euro
							</span>
							pro Seite
						</div>
						<a class="tab-price__btn popup-link" href="#popup-form">
							anfragen
						</a>
					</div>
					<div class="tab-price__item">
						<ul>
							<li>Verfassen Ihrer Arbeit nach Ihren Wünschen und Anforderungen</li>
							<li>Möglichkeit des anonymen direkten Kontakts mit dem Autor</li>
							<li>Verfassen sowohl der ganzen Arbeit als auch einzelner Teile</li>
							<li>Unbefristete Garantie für die Korrektur der Arbeit*</li>
							<li>Inhaltsverzeichnis, Literaturverzeichnis, Abbildungsverzeichnis <strong>KOSTENLOS</strong></li>
							<li>Plagiatsprüfung <strong>KOSTENLOS</strong></li>
							<li>Überprüfung Ihrer Arbeit von einem unabhängigen Korrekturleser</li>
							<li>Überprüfung Ihrer Arbeit in der Qualitätskontrolleabteilung <strong>KOSTENLOS</strong></li>
							<li>Rechtzeitige Teillieferungen der Arbeit</li>
							<li>Möglichkeit der Teilzahlung ohne Zusatzkosten</li>
						</ul>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>