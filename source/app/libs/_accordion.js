export function accordion() {
	const accordionItems = document.querySelectorAll('.accordion__item');

	if (accordionItems.length > 0) {
		// Открываем первый элемент аккордеона
		accordionItems[0].classList.add('--active');

		accordionItems.forEach(item => {
			item.addEventListener('click', () => {
				// Добавляем класс "active" к выбранному элементу
				item.classList.add('--active');
				// Удаляем класс "active" у остальных элементов
				accordionItems.forEach(otherItem => {
					if (otherItem !== item) {
						otherItem.classList.remove('--active');
					}
				});
			});
		});
	}

	const faqItems = document.querySelectorAll('.faq__item')

	if (faqItems.length > 0) {
		faqItems[0].classList.add('--active');
		faqItems.forEach(item => {
			item.addEventListener('click', () => {
				// Добавляем класс "active" к выбранному элементу
				item.classList.add('--active');
				// Удаляем класс "active" у остальных элементов
				faqItems.forEach(otherItem => {
					if (otherItem !== item) {
						otherItem.classList.remove('--active');
					}
				});
			});
		});
	}

	const mainFaqItems = document.querySelectorAll('.main-faq__item')

	if (mainFaqItems.length > 0) {
		mainFaqItems[0].classList.add('--active');
		mainFaqItems.forEach(item => {
			item.addEventListener('click', () => {
				// Добавляем класс "active" к выбранному элементу
				item.classList.toggle('--active');
				// Удаляем класс "active" у остальных элементов
				mainFaqItems.forEach(otherItem => {
					if (otherItem !== item) {
						otherItem.classList.remove('--active');
					}
				});
			});
		});
	}

}