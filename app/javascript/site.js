$(document).ready(function() {
	redirectDeceasedURLs();
	enableMenuButton();
	enableSocialLinks();
});

function redirectDeceasedURLs() {
	var blogQuerystring = getBlogQuerystring();
	if(blogQuerystring != "") {
		$('main').html('<article><header><h1>Redirecting...</h1></header></article>');
		window.location.replace("/blog/" + blogQuerystring);
	}
}

function enableMenuButton() {
	var menuOverlaid = false;

	$('#menu-button').click(function() {
		if(menuOverlaid){
			$('body>header>nav').removeClass('popout');
		} else {
			$('body>header>nav').addClass('popout');
		}
		menuOverlaid = !menuOverlaid;
	});
}

function enableSocialLinks() {
	$('.social a').click(function(event) {
		var width =  575,
		    height = 400,
			left =   ($(window).width()	- width) / 2,
			top	 =   ($(window).height() - height) / 2,
			url	=    this.href,
			opts =   'status=1' +
					 ',width='	+ width	+
					 ',height=' + height +
					 ',top='	+ top +
					 ',left='	+ left;

		window.open(url, 'social-share', opts);
		event.preventDefault();
	});
}

function getBlogQuerystring() {
	if(window.location.pathname == "/blog/" && window.location.search != "" && window.location.search.substring(0, 5) != "?tag:") {
		return window.location.search.slice(9);
	} else return "";
}