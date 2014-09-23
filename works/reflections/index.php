<?
	require("../../includes/constants.php");
	$active = SECTION_ARTWORKS;
	$title = "Reflections";
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
					<p class="what">Sound Environment</p>
					<p class="where">
						Presented at: Jaaga Creative Common Ground<br />
						Bangalore, 2011
					</p>
				</div>
				<?=renderVimeo("24964151", 528)?>
				<div id="description">
					<p>
						<span class="title">Reflections</span> is a site-specific sound work created 
						and installed at the Jaaga structure in Bangalore, India.
					</p>
					<p>
						In the final week before being deconstructed, and in collaboration with Clemence 
						Barret, a series of interviews were conducted with core Jaaga members. The 
						thoughts and perspectives of the community were fed into a custom-designed 
						software and loudspeaker system, and allowed to 'float freely' within the 
						Jaaga walls.
					</p>
					<p>
						This work was created as part of the Jaaga Residency Program. You can
						<a href="/blog/?tag:Reflections">see blog posts</a> related to the creation of 
						the work, and  
						<a href="/blog/?tag:Jaaga_Residency">read more</a> about the time spent on the
						Jaaga Residency Program.
					</p>
				</div>
			</div>
		</div>
<?
	require("../../includes/common/footer.php");
?>