<?
	require("../../includes/constants.php");
	$active = SECTION_ARTWORKS;
	$title = "Measure";
	require("../../includes/common/header.php");
	require("../../includes/common/renderer.php");
?>

		<div id="main_container">
<?
	require("../../includes/common/menu.php");
?>

			<div class="detail">
				<div id="info">
					<h1><?=$title?></h1>
					<p class="what">Installation</p>
					<p class="where">
						Presented at: Alpha-Ville (Festival of Post-Digital Culture)<br />
						London, 2011
					</p>
				</div>
				<?=renderVimeo("31937746", 534)?>
				<div id="description">
					<p>
						<span class="title">Measure</span> explores the role of the moment in our 
						continuous perception of time. Each audible strike in a traditional clockwork 
						metronome sets into action a response in a continuously generated audio/visual
						field.
					<p>
					<p>
						<span class="title">Measure</span> was created in association with the 
						Young Poets Network and V4W for Alpha-Ville Festival of Post-Digital Culture.
						It was the winning entry in the Patch Slam competition at Alpha-Ville
						2011. <!--You can see a recorded 
						<a href="http://www.ustream.tv/recorded/17505893">live stream of the 
						event</a>.-->
					</p>
					<p>
						You can <a href="/blog/?tag:Measure">read more</a> about the creation of this 
						work, and <a href="http://www.youtube.com/watch?v=dEqOoUEt8Mo">see video</a>
						of Molly Pearson reciting her poem, <span class="title">Picture This</span>,
						in front of the work at Alpha-Ville.
					</p>
				</div>
			</div>
		</div>
<?
	require("../../includes/common/footer.php");
?>