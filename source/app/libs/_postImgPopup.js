export function postImgPopup() {
	const postImg = document.querySelectorAll('.wp-block-image a')

	if (postImg.length > 0) {
		postImg.forEach(e => {
			e.setAttribute('data-fancybox', '')
		})
	}
}
