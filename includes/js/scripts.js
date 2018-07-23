// Scripts
// Add intuitive lightbox iframe support
(function() {
	var lightboxIframes = document.getElementsByClassName('lightbox-iframe');
	for (var i = 0; i < lightboxIframes.length; i++) {
		if (lightboxIframes[i].hasAttribute('href')) {
			var lightboxHREF = lightboxIframes[i].href;
		} else {
			var lightboxLink = lightboxIframes[i].getElementsByTagName('a')[0];
			var lightboxHREF = lighboxLink.href + '&iframe=true';
		}
		lightboxLink.href = lightboxHREF;
	}
})();