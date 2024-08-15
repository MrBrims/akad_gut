import NiceSelect from 'nice-select2/dist/js/nice-select2.js'

export function niceSelectVanilla() {
	'use strict'

	const select = document.querySelectorAll('.ajax-select')

	select.forEach(elem => {
		let nice = NiceSelect.bind(elem, { searchable: true })

		const selectNice = elem.nextElementSibling

		selectNice.addEventListener('click', loadOptions)

		function loadOptions() {
			// Проверяем, были ли уже загружены опции, чтобы избежать повторной загрузки
			if (elem.querySelectorAll('option').length > 2) {
				return
			}

			// Проверяем, какой у нас селкт и на основе этого указываем путь до JSON файла
			let pathJson

			if (elem.classList.contains('type-select')) {
				pathJson = '/wp-json/my-namespace/v2/type'
			} else if (elem.classList.contains('fach-select')) {
				pathJson = '/wp-json/my-namespace/v2/spec'
			}

			// Создаем из JSON наш селект
			try {
				fetch(window.location.origin + pathJson)
					.then(response => response.json())
					.then(data => {
						data.forEach(value => {
							const option = document.createElement('option')
							option.value = value
							option.textContent = value
							elem.appendChild(option)
						})
						nice.update()
					})
			} catch (error) {
				console.log(error.message)
			}
		}
	})

	// Инициализируем Nice Select для остальных селектов
	const simpleSelect = document.querySelectorAll('.simple-select')
	const searchSelect = document.querySelectorAll('.search-select')

	simpleSelect.forEach(elem => {
		NiceSelect.bind(elem)
	})

	searchSelect.forEach(elem => {
		NiceSelect.bind(elem, { searchable: true })
	})
}
