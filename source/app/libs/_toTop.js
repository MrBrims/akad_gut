export function scrollVisible() {

	// Добавление класса при скролле
	let scrollpos = window.scrollY

	const btnTop = document.querySelector(".floating-top")
	const scrollChangeBtn = 450

	const add_class_on_scrollBtn = () => btnTop.classList.add("--visible")
	const remove_class_on_scrollBtn = () => btnTop.classList.remove("--visible")


	window.addEventListener('scroll', function () {
		scrollpos = window.scrollY;

		if (scrollpos >= scrollChangeBtn) { add_class_on_scrollBtn() }
		else { remove_class_on_scrollBtn() }

	})

	// Плавная прокрутка и отключение поведения ссылки
	const toTopLinks = document.querySelectorAll('.go-to[data-goto]');
	if (toTopLinks.length > 0) {
		toTopLinks.forEach(menuLink => {
			menuLink.addEventListener("click", onMenuLinkClick);
		});

		function onMenuLinkClick(e) {
			const toTopLink = e.target;
			if (toTopLink.dataset.goto && document.querySelector(toTopLink.dataset.goto)) {
				const gotoBlock = document.querySelector(toTopLink.dataset.goto);
				const gotoBlockValue = gotoBlock.getBoundingClientRect().top + pageYOffset - document.querySelector('header').offsetHeight;

				window.scrollTo({
					top: gotoBlockValue,
					behavior: "smooth"
				});
				e.preventDefault();
			}
		}
	}
}


