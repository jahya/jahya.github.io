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
					<a href="/artworks/top-of-the-pops/">Top of the Pops</a>
				</li>
			</ul>
			<div id="page">
				<div id="standard_page">
					<div id="focus">
						<div id="vid">
							<script type="text/javascript">
								<!--
									document.write('<object width="480" height="270"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=9654366&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=9654366&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="480" height="270"><\/embed><\/object>');
								//-->
							</script>
							<noscript>
								<p><strong>Sorry!</strong><br />You will have to enable Javascript to view this video.</p>
							</noscript>
						</div>
						<h1>Top of the Pops</h1>
						<span class="location">@ Elevator Gallery</span>
						<p>'Top of the Pops' is a responsive video wall created for a themed party at the
						Elevator Gallery in London. As people pass by and trigger the sensors, clips from old
						episodes of Top of the Pops are played.</p>
						<p>There is a twist in the way the piece is constructed. The TV's don't actually work - 
						all the video is projected from the opposite wall, giving the illusion of TVs with perfectly
						synced content and colour. </p> 
						<p> The interaction is simple and direct, and designed to enhance the entrance-way to the
						party. It is also a meeting of analog and digital, and a rehashing of archive material
						for a fun purpose.</p>
						<a href="/artworks/" class="back">&lt;&lt; Back to listing page</a>
					</div>
				</div>
			</div>
		</div>
<?
	require("../../includes/common/footer.php");
?>