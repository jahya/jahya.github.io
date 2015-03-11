<?
	require("../../includes/constants.php");
	require("../../includes/common/header.php");
?>

		<div id="main_container">
<?
	$active = SECTION_ARTWORKS;
	require("../../includes/common/menu.php");
?>

			<ul id="breadcrumb">
				<li>
					<a href="/">Home</a> &nbsp;&gt;
				</li>
				<li>
					<a href="/artworks/">Artworks</a> &nbsp;&gt;
				</li>
				<li>
					<a href="/artworks/oh-box/">The Oh Box</a>
				</li>
			</ul>
			<div id="page">
				<div id="standard_page">
					<div id="focus">
						<div id="vid">
							<script type="text/javascript">
								<!--
									document.write('<object width="480" height="270"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=21311262&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=21311262&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="480" height="270"><\/embed><\/object>');
								//-->
							</script>
							<noscript>
								<p><strong>Sorry!</strong><br />You will have to enable Javascript to view this video.</p>
							</noscript>
						</div>
						<h1>The Oh Box</h1>
						<span class="location">@ Domestic Disturbance</span>
						<p>This sound installation responds to human movement by going through phases of interest.</p>
						<p>As a human approaches, voices from inside the box feign interest. The closer the human gets,
						the more curiosity is shown. When the human gets too close, the voices express a torrent of
						annoyance at the human presence.</p>
						<p>The piece is a simple, direct interaction between a human being and artwork.
						It is playful and responds in a way which makes sense to the human, without them having to 
						'learn an interface'. It uses ultrasonic rangefinders and
						interaction software to try to respond in an expressive way.</p>
						<a href="/artworks/" class="back">&lt;&lt; Back to listing page</a>
					</div>
				</div>
			</div>
		</div>
<?
	require("../../includes/common/footer.php");
?>