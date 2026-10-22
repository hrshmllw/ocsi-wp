(function () {
	var root = document.querySelector('[data-hero]');
	if (!root) {
		return;
	}

	var slides = Array.prototype.slice.call(root.querySelectorAll('[data-slide]'));
	var tabs = Array.prototype.slice.call(root.querySelectorAll('[role="tab"]'));
	var place = root.querySelector('[data-place]');
	var pauseButton = root.querySelector('[data-pause]');
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var index = 0;
	var timer = null;
	var paused = reduceMotion;

	slides.forEach(function (slide, i) {
		if (slide.classList.contains('is-active')) {
			index = i;
		}
	});

	function show(next) {
		index = (next + slides.length) % slides.length;
		slides.forEach(function (slide, i) {
			var active = i === index;
			slide.classList.toggle('is-active', active);
			slide.setAttribute('aria-hidden', active ? 'false' : 'true');
		});
		tabs.forEach(function (tab, i) {
			var active = i === index;
			tab.setAttribute('aria-selected', active ? 'true' : 'false');
			tab.tabIndex = active ? 0 : -1;
		});
		if (place && slides[index]) {
			place.textContent = slides[index].getAttribute('data-label') || '';
		}
	}

	function stop() {
		if (timer) {
			window.clearInterval(timer);
			timer = null;
		}
	}

	function start() {
		stop();
		if (paused || slides.length < 2) {
			return;
		}
		timer = window.setInterval(function () {
			show(index + 1);
		}, 6000);
	}

	function setPaused(next) {
		paused = next;
		if (!pauseButton) {
			return;
		}
		pauseButton.setAttribute('aria-pressed', paused ? 'true' : 'false');
		pauseButton.textContent = paused ? 'Play' : 'Pause';
	}

	tabs.forEach(function (tab, i) {
		tab.addEventListener('click', function () {
			show(i);
			start();
		});
		tab.addEventListener('keydown', function (event) {
			var next = null;
			if (event.key === 'ArrowRight' || event.key === 'ArrowDown') {
				next = i + 1;
			} else if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') {
				next = i - 1;
			} else if (event.key === 'Home') {
				next = 0;
			} else if (event.key === 'End') {
				next = tabs.length - 1;
			}
			if (next === null) {
				return;
			}
			event.preventDefault();
			show(next);
			tabs[index].focus();
			start();
		});
	});

	if (pauseButton) {
		pauseButton.addEventListener('click', function () {
			setPaused(!paused);
			if (paused) {
				stop();
			} else {
				start();
			}
		});
	}

	show(index);
	if (reduceMotion) {
		setPaused(true);
	} else {
		start();
	}
})();
