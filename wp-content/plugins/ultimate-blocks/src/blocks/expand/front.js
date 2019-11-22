if (!Element.prototype.matches) {
	Element.prototype.matches =
		Element.prototype.msMatchesSelector ||
		Element.prototype.webkitMatchesSelector;
}

if (!Element.prototype.closest) {
	Element.prototype.closest = function(s) {
		let el = this;

		do {
			if (el.matches(s)) return el;
			el = el.parentElement || el.parentNode;
		} while (el !== null && el.nodeType === 1);
		return null;
	};
}

function ub_getSiblings(element, criteria) {
	const children = Array.prototype.slice
		.call(element.parentNode.children)
		.filter(child => child !== element);
	return criteria ? children.filter(criteria) : children;
}

Array.prototype.slice
	.call(document.getElementsByClassName('ub-expand-toggle-button'))
	.forEach(instance => {
		instance.addEventListener('click', () => {
			const blockRoot = instance.closest('.ub-expand');
			blockRoot
				.querySelector('.ub-expand-partial .ub-expand-toggle-button')
				.classList.toggle('ub-hide');
			blockRoot
				.querySelector('.ub-expand-full')
				.classList.toggle('ub-hide');
		});
	});
