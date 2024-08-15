export function formCalc() {
	// Выбираем поля
	var lektoratCalc = document.querySelector('.lektorat-calc')
	var korrektCalc = document.querySelector('.korrekt-calc')
	var wortenCalc = document.querySelector('.form-calc__worten')
	var seitenCalc = document.querySelector('.form-calc__seiten')
	var numberInput = document.querySelector('.form-calc__number')
	var resultSpan = document.querySelector('.form-calc__num')

	if (lektoratCalc) {
		// Функция для вычесления результата
		function calculateAndUpdateResult() {
			var inputValue = numberInput.value
			var result = 0

			if (lektoratCalc.checked && wortenCalc.checked) {
				result = inputValue * 0.127
			} else if (lektoratCalc.checked && seitenCalc.checked) {
				result = inputValue * 38
			} else if (korrektCalc.checked && wortenCalc.checked) {
				result = inputValue * 0.06
			} else if (korrektCalc.checked && seitenCalc.checked) {
				result = inputValue * 18
			}

			resultSpan.textContent = result.toFixed(2) // Округляем
		}

		// Добавляем слушатель
		lektoratCalc.addEventListener('change', calculateAndUpdateResult)
		korrektCalc.addEventListener('change', calculateAndUpdateResult)
		wortenCalc.addEventListener('change', calculateAndUpdateResult)
		seitenCalc.addEventListener('change', calculateAndUpdateResult)
		numberInput.addEventListener('input', calculateAndUpdateResult)
	}
}
