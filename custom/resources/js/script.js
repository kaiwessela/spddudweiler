document.addEventListener('DOMContentLoaded', function() {
	document.querySelector('body > header > button.openbtn').addEventListener('click', function() {
		document.querySelector('body > header').classList.toggle('open');
	});

	document.querySelector('body > header').classList.remove('open');
	window.setTimeout(function() {
		document.querySelector('body > header').classList.remove('notransition');
	}, 500);

});

window.onload = function() {
	var pagination = document.querySelector('.pagination');
	if(pagination){
		pagination.scrollTo((pagination.scrollWidth - pagination.offsetWidth) / 2, 0);
	}

	var people = document.querySelectorAll('.person');
	people.forEach(function(person){
		person.classList.remove('static');

		person.addEventListener('mousemove', function(event){
			var rect = event.currentTarget.getBoundingClientRect();
			var width = rect.width;
			var height = rect.height;
			var mouseX = event.clientX - rect.x;
			var mouseY = event.clientY - rect.y;

			var mousePercentX = (mouseX / width) * 100 - 50;
			var mousePercentY = (mouseY / height) * 100 - 50;

			event.currentTarget.querySelector('article > div').style.transform = 'rotateY(' + mousePercentX / 4 + 'deg) rotateX(' + mousePercentY / -4 + 'deg) scale(1.05)';
			event.currentTarget.querySelector('.name').style.transform = 'translateX(' + mousePercentX / 60 + 'rem) translateY(' + mousePercentY / 60 + 'rem)';
			event.currentTarget.querySelector('.line').style.transform = 'translateX(' + mousePercentX / 40 + 'rem) translateY(' + mousePercentY / 40 + 'rem)';
			event.currentTarget.querySelector('.function').style.transform = 'translateX(' + mousePercentX / 80 + 'rem) translateY(' + mousePercentY / 80 + 'rem)';
		});

		person.addEventListener('mouseleave', function(event){
			event.currentTarget.querySelector('article > div').style.transform = null;
			event.currentTarget.querySelector('.name').style.transform = null;
			event.currentTarget.querySelector('.line').style.transform = null;
			event.currentTarget.querySelector('.function').style.transform = null;
		});
	});
}
