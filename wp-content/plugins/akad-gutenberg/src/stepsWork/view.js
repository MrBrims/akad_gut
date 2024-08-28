const stepWorkNum = document.querySelectorAll(".steps__num span");

stepWorkNum.forEach((span, index) => {
	span.textContent = index + 1;
});
