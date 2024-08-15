export function ajaxSearch() {
	const searchInput = document.querySelector('.search-form__input')
	const searchResults = document.querySelector('.ajax-search')

	searchInput.addEventListener('keyup', function () {
		let searchValue = this.value

		if (searchValue.length > 2) {
			// кол-во символов
			fetch('/wp-admin/admin-ajax.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded;',
				},
				body: `action=ajax_search&term=${encodeURIComponent(searchValue)}`,
			})
				.then(response => response.text())
				.then(results => {
					searchResults.style.display = 'block'
					searchResults.innerHTML = results
					setTimeout(() => {
						searchResults.style.opacity = 1
					}, 200) // Fade in effect
				})
		} else {
			searchResults.style.opacity = 0
			setTimeout(() => {
				searchResults.style.display = 'none'
			}, 200) // Fade out effect
		}
	})

	// Закрытие поиска при клике вне его
	document.addEventListener('click', function (event) {
		if (
			!event.target.closest('.ajax-search') &&
			!event.target.closest('.search-form__input')
		) {
			searchResults.style.opacity = 0
			setTimeout(() => {
				searchResults.style.display = 'none'
			}, 200) // Fade out effect
		}
	})
}
