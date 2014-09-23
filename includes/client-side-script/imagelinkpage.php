		<script type="text/javascript">	
			function makeImageAreaClickable(){
				$('#img a').click(function() {
					window.open($(this).attr('href'));
					return false;
				});
				$('#img img').click(function() {
					window.open($('#img a').attr('href'));
				});
				$('#img img').hover(function() {
					$('#img a').css('text-decoration','none');
				}, function() {
					$('#img a').css('text-decoration','underline');
				});
				$('#img a').hover(function() {
					$('#img a').css('text-decoration','none');
				}, function() {
					$('#img a').css('text-decoration','underline');
				});
				$('#img img').addClass('clickable');
			}
			
			$(document).ready(function(){
				makeImageAreaClickable();
			});
		</script>