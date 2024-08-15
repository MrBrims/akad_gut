import { accordion } from '~/app/libs/_accordion.js'
import { burgerMenu } from '~/app/libs/_burgerMenu.js'
import { popup } from '~/app/libs/_popup.js'
import { tabs } from '~/app/libs/_tabs.js'
// import { accordionNoClose } from '~/app/libs/_accordionNoClose.js'
import { inputDateCustom } from '~/app/libs/_inputDateCustom.js'
import { inputNumberCastom } from '~/app/libs/_inputNumberCastom.js'
// import { inputPhoneCustom } from '~/app/libs/_inputPhoneCustom.js'
import { niceSelectVanilla } from '~/app/libs/_niceSelecModule.js'
import { showMore } from '~/app/libs/_showMore.js'
import { swiperMudules } from '~/app/libs/_swiperMudules.js'
import { tippyJs } from '~/app/libs/_tippyJs.js'
import { tocPage } from '~/app/libs/_tocPage.js'
import { formCalc } from '~/app/libs/_formCalc.js'
// import { selectCustom } from '~/app/libs/_selectCustom.js'
import { lazyLoad } from '~/app/libs/_lazyLoad.js'
// import { adminIndentWp } from '~/app/libs/_adminIndentWp.js'
import { mailerForm } from '~/app/libs/_mailerForm.js'
// import { bakalavr } from '~/app/libs/_bakalavr.js'
// import { footerLinks } from '~/app/libs/_footerLinks.js'
import { fileLabel } from '~/app/libs/_fileLabel.js'
import { gift } from '~/app/libs/_gift.js'
import { revLoad } from '~/app/libs/_revLoad.js'
import { scrollVisible } from '~/app/libs/_toTop.js'
import Fancybox from '@fancyapps/ui'
import { handleLinkClickAndSendWapp } from '~/app/libs/_whatsappToTG.js'
import { postImgPopup } from '~/app/libs/_postImgPopup.js'
import { ajaxSearch } from '~/app/libs/_ajaxSearch.js'

document.addEventListener('DOMContentLoaded', () => {
	// Lazy load map
	lazyLoad()

	// Menu burger and smoth scroll
	burgerMenu()

	// Popups
	popup()

	// Toc
	tocPage()

	// Отступ если есть wpadminbar
	// adminIndentWp();

	// Tabs
	tabs()

	// Simplew accordion
	accordion()

	// Accordion no close
	// accordionNoClose();

	// Custom input numper
	inputNumberCastom()

	// Custom datepicker
	inputDateCustom()

	// Custom file label
	fileLabel()

	// Custom phone input
	// inputPhoneCustom()

	// Custom Select
	niceSelectVanilla()

	// Show Less content
	showMore()

	// Tolltip
	tippyJs()

	// Swiper Slider
	swiperMudules()

	//Добавление подчеркивания к списку бакалавр
	// bakalavr();

	// Загрузка отзывов
	revLoad()

	// Form Submit
	mailerForm()

	// Visible to top
	scrollVisible()

	// WhatsApp Info to Telegram
	handleLinkClickAndSendWapp()

	//gift
	gift()

	// Форма калькулятор
	formCalc()

	// Попапы для картинок в записях
	postImgPopup()

	// Аякс поиск
	ajaxSearch()
})
