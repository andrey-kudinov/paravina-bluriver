function checkCookies(){
	let cookieDate = localStorage.getItem('cookieDate');
	let cookieNotification = document.getElementById('cookie_notification');
	let cookieBtn = cookieNotification.querySelector('.cookie_accept');

	// Если записи про кукисы нет или она просрочена на 1 год, то показываем информацию про кукисы
	if( !cookieDate || (+cookieDate + 31536000000) < Date.now() ){
		cookieNotification.classList.add('show');
	}

	// При клике на кнопку, в локальное хранилище записывается текущая дата в системе UNIX
	cookieBtn.addEventListener('click', function(){
		localStorage.setItem( 'cookieDate', Date.now() );
		cookieNotification.classList.remove('show');
	})
}
checkCookies();

const handleSubmit = (event) => {
	event.preventDefault();

	const myForm = event.target;
	const formData = new FormData(myForm);

	console.log('work')

	fetch("/", {
		method: "POST",
		headers: { "Content-Type": "application/x-www-form-urlencoded" },
		body: new URLSearchParams(formData).toString(),
	})
		.then(() => console.log("Form successfully submitted"))
		.catch((error) => alert(error));
};

document
	.querySelector(".contact-us-form")
	.addEventListener("submit", handleSubmit);
