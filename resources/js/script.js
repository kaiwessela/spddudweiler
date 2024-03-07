document.addEventListener('DOMContentLoaded', function() {
	document.querySelector('body > header > button.openbtn').addEventListener('click', function() {
		document.querySelector('body > header').classList.toggle('open');
	});

	document.querySelector('body > header').classList.remove('open');
	window.setTimeout(function() {
		document.querySelector('body > header').classList.remove('notransition');
	}, 500);

});

window.onload = centerPaginations;
window.onresize = centerPaginations;

function centerPaginations() {
	var paginations = document.querySelectorAll('.pagination > div:not(.item)');
	paginations.forEach((pagination) => {
		pagination.scrollTo((pagination.scrollWidth - pagination.offsetWidth) / 2, 0);
	});
}
