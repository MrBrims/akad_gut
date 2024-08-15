export function footerLinks() {
	// Находим ссылку с атрибутом data-content "Ghostwriting"
	const mainLink = document.querySelector('a[data-content="Ghostwriting"]')

	// Проверяем, что ссылка найдена
	if (mainLink) {
		// Проверяем, что следующий соседний элемент после ссылки - элемент с классом sub-menu
		const subMenu = mainLink.nextElementSibling
		if (subMenu.classList.contains('sub-menu')) {
			// Находим блок с классом footer__middle-links
			const footerLinks = document.querySelector('.footer__middle-links')

			// Получаем все ссылки из ul
			const links = subMenu.querySelectorAll('a')

			// Создаем фрагмент, чтобы избежать многократного перерисовывания DOM
			const fragment = document.createDocumentFragment()

			// Копируем ссылки в фрагмент
			links.forEach(link => {
				const clonedLink = link.cloneNode(true)
				fragment.appendChild(clonedLink)
			})

			// Вставляем скопированные ссылки в блок footer__middle-links
			footerLinks.appendChild(fragment)
		}
	}
}
