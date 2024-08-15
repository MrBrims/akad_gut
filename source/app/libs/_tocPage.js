export function tocPage() {
	let h2Elements = document.querySelectorAll('.inner h2')
	let toc = document.querySelector('.section-toc__nav')
	let ol = document.createElement('ol')

	if (h2Elements && toc) {
		h2Elements.forEach((h2, index) => {
			let id = 'akad-title-' + (index + 1)
			h2.id = id

			let li = document.createElement('li')
			let link = document.createElement('a')
			link.href = '#' + id
			link.textContent = h2.textContent

			li.appendChild(link)
			ol.appendChild(li)
		})

		toc.appendChild(ol)
	}
}
