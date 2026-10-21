(function () {
	var button = document.querySelector('.nav-toggle');
	var nav = document.getElementById('site-navigation');
	if (!button || !nav) {
		return;
	}

	button.addEventListener('click', function () {
		var open = button.getAttribute('aria-expanded') === 'true';
		button.setAttribute('aria-expanded', open ? 'false' : 'true');
		button.textContent = open ? 'Menu' : 'Close';
		nav.classList.toggle('is-open', !open);
	});
})();
