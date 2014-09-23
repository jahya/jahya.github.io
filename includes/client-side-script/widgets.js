//Preload images
var imgPointUp = '/img/point-up.png';
var imgPointDown = '/img/point-down.png';
	
function preloadImages(){
	$([imgPointUp, imgPointDown]).preload();
}

$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}

var animatingClick = false;
var heightClosed = $('#tagcloud').height();

function animateTagCloudOnHover(){
	var divHeight = $('#tagcloud').prop('scrollHeight');
	
	$('#tags-down').hover(function(){
		if(!animatingClick){
			$('#tagcloud').animate({
				'scrollTop': divHeight
			},{
				duration: 10 * (divHeight - $('#tagcloud').prop('scrollTop')),
				easing: 'linear'
			});
		}
	},function(){
		if(!animatingClick){
			$('#tagcloud').stop();
		}
	});

	$('#tags-up').hover(function(){
		if(!animatingClick){
			$('#tagcloud').animate({
				'scrollTop': 0
			},{
				duration: 10 * (0 + $('#tagcloud').prop('scrollTop')),
				easing: 'linear'
			});
		}
	},function(){
		if(!animatingClick){
			$('#tagcloud').stop();
		}
	});
}

function animateTagCloudOnClick(){
	
	$('#tags-up, #tags-down').click(function(){
		if(!animatingClick){
			animatingClick = true;
			$('#tagcloud').stop();
			if($('#tags-down img').attr('src') == imgPointDown){
				$('#tagcloud').animate({
					"height": $('#tagcloud').prop('scrollHeight')
				},{
					duration: 1000,
					easing: 'swing',
					queue: false,
					complete: function(){
						animatingClick = false;
						$('#tags-down img').attr('src', imgPointUp);
					}
				});
			}else{
				$('#tagcloud').animate({
					"height": heightClosed
				},{
					duration: 1000,
					easing: 'swing',
					queue: false,
					complete: function(){
						animatingClick = false;
						$('#tags-down img').attr('src', imgPointDown);
					}
				});
			}
		}
		return false;
	});
}

$(document).ready(function(){

	preloadImages();
	animateTagCloudOnHover();
	animateTagCloudOnClick();
});