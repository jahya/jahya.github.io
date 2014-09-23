		<script type="text/javascript">
			function makeThumbsClickable(){
				$('.thumb, .thumb *').addClass('clickable');
				$('.thumb').hover(function() {
					$(this).children('a').css('text-decoration','none');
					$(this).css('background-color','#e5e5e5');
				}, function() {
					$(this).children('a').css('text-decoration','underline');
					$(this).css('background-color','#f2f2f2');
				});
				$('.thumb').click(function() {
					window.location = $(this).children('a').attr('href');
				});
				$('.thumb a').click(function() {
					window.location = $(this).attr('href');
					return false;
				});
			}

			$(document).ready(function(){
				makeThumbsClickable();
			});
		</script>