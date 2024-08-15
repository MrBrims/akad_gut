export function burgerMenu() {
	// Добавление класса для тех пунктов меню в которых есть суб-меню
	const topMenuItems = document.querySelectorAll('.top-menu__items')

	topMenuItems.forEach(item => {
		const subMenu = item.querySelector('.sub-menu')
		if (subMenu) {
			item.classList.add('--sub')
		}
	})

	// Добавление класса при прокрутке
	window.addEventListener('scroll', function () {
		const header = document.querySelector('header')
		if (window.scrollY > 20) {
			header.classList.add('--scrolled')
		} else {
			header.classList.remove('--scrolled')
		}
	})

	// Добавление класса при клике по кнопке в шапке
	const headerBtnWrapper = document.querySelector('.header__btn-wrappper')

	headerBtnWrapper.addEventListener('click', () => {
		headerBtnWrapper.classList.toggle('--active')
		document.querySelector('.menu-box ').classList.toggle('--active')
	})

	// Добавление класса при клике по пункту меню
	const menuItems = document.querySelectorAll('.top-menu__items')

	menuItems.forEach(item => {
		item.addEventListener('click', () => {
			item.classList.toggle('--active')
		})
	})

	// Добавление атрибута с текстом ссылки
	const links = document.querySelectorAll('.top-menu > li > a')
	links.forEach(link => {
		link.setAttribute('data-content', link.textContent)
	})

	const searchBtn = document.querySelector('.header__btn-search')
	const headerSearch = document.querySelector('.header__search')

	searchBtn.addEventListener('click', () => {
		headerSearch.classList.toggle('_active')
		searchBtn.classList.toggle('_active')
	})
}
