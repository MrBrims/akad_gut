export function handleLinkClickAndSendWapp() {
	// Находим ссылки на странице
	let links = document.querySelectorAll(".js-wapp");
	// let link = document.getElementById("ppwapp"); // Замените 'yourLinkId' на id вашей ссылки

	// Вешаем обработчик клика на ссылки
	links.forEach((link) => {
		link.addEventListener("click", function (event) {
			// Предотвращаем выполнение действия по умолчанию (переход по ссылке)
			event.preventDefault();
	
			// Формируем запрос на /wordpress/wp-admin/admin-ajax.php
			fetch("/wp-admin/admin-ajax.php", {
				method: "POST",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
				},
				body: "action=sendWapp",
			})
				.then((response) => {
					// После отправки запроса выполняется переход по ссылке
					// console.log(response);
					window.location.href = link.href;
				})
				.catch((error) => {
					console.error("Ошибка:", error);
				});
		});
	})
}
