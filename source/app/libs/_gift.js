export function gift() {
	const giftPopup = document.querySelector('.gift')
	const giftClose = document.querySelector('.gift__close')
	const giftBtn = document.querySelector('.gift__btn')
	const giftMobile = document.querySelector('.gift-mobile')
	const giftMobileBtn = document.querySelector('.gift-mobile__btn')
	let giftPopupVisible = false
	let giftMobileVisible = false
	let promoExecuted = false

	function remainUsersPromo() {
		let rem = document.querySelector('.gift-users')
		if (!rem) return
		const currentDate = new Date()
		const nextMonth = new Date(
			currentDate.getFullYear(),
			currentDate.getMonth() + 1,
			1
		)
		const daysInMonth = new Date(nextMonth - 1).getDate()
		const hoursInDay = 24
		const remainingHours = hoursInDay - currentDate.getHours()
		const remainingDays =
			daysInMonth - currentDate.getDate() + remainingHours / hoursInDay
		const number = Math.floor((60 / daysInMonth) * remainingDays)
		let currentValue = 0
		const interval = setInterval(() => {
			if (currentValue < number) {
				currentValue++
				rem.textContent = currentValue
			} else {
				clearInterval(interval)
			}
		}, 30) // Обновление каждый секунду
		return true
	}

	if (giftPopup && giftClose && giftBtn && giftMobile && giftMobileBtn) {
		giftClose.addEventListener('click', () => {
			giftPopup.classList.remove('--visible')
		})

		giftBtn.addEventListener('click', () => {
			giftPopup.classList.remove('--visible')
		})

		window.addEventListener('scroll', function () {
			let scrollPosition = window.scrollY
			if (scrollPosition >= 100 && !giftPopupVisible) {
				giftPopup.classList.add('--visible')
				giftPopupVisible = true
			}
			if (!promoExecuted) {
				promoExecuted = remainUsersPromo()
			}
		})
	}

	if (giftMobile) {
		window.addEventListener('scroll', function () {
			let scrollPosition = window.scrollY

			if (scrollPosition >= 100 && !giftMobileVisible) {
				giftMobileBtn.classList.add('rotate-scale-up')
				giftMobileVisible = true
			}
		})
	}
}
