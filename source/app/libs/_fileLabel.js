export function fileLabel() {
	document.querySelectorAll('.form__file-custom').forEach(function (label) {
		label.querySelector('input[type="file"]').addEventListener('change', function () {
			const fileName = this.files[0].name;
			const extension = fileName.split('.').pop();
			const nameWithoutExtension = fileName.substring(0, fileName.length - extension.length - 1);
			const shortenedFileName = (nameWithoutExtension.length > 28) ? nameWithoutExtension.substr(0, 28) + '...' + extension : fileName;
			label.querySelector('span').textContent = shortenedFileName;
			label.classList.add('loaded');
		});
	});
}