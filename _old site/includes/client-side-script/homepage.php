		<script type="text/javascript">
			function rotatePromoImage() {
				var $activeImage = $('#promo_img img.active');
				if ($activeImage.length == 0) $activeImage = $('#slideshow img:last');
				var $nextImage = $activeImage.next().length ? $activeImage.next() : $('#promo_img img:first');
				$activeImage.addClass('last-active');
				$nextImage.css({opacity: 0.0})
					.addClass('active')
					.animate({opacity: 1.0}, 5000, function() {
						$activeImage.removeClass('active last-active');
					});
			}

			$(document).ready(function(){
				setInterval('rotatePromoImage()', 8000);
			});
		</script>