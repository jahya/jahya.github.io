<?
	require("../../includes/constants.php");
	$active = SECTION_ARTWORKS;
	$title = "Existential";
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
					<p class="what">Depth Video</p>
					<p class="where">
						Exhibited at: CultureHub<br />
						New York, 2013
					</p>
				</div>
				<?=renderVimeo("73437198", 530)?>
				<div id="description">
					<p>
						<span class="title">Existential</span> is an exploration into our 
						relationship with our daily surroundings in built-up urban environments.
						How is it that the waves of human activity around us so often lead to a 
						sense of greater isolation? How do we react to this paradox, consciously
						and unconsciously, as we navigate public space?
					</p>
					<p>	
						This piece was created using the experimental cinematic technique of DepthKit -
						an approach in which recorded depth information is mixed with color and sound. However,
						for this piece a new color layer was applied in post-processing, to dislocate the
						swarms of pixels from each other despite their theoretical close proximity.
					</p>
					<p>
						There are a <a href="/blog/?tag:RGBDToolkit">series of articles and tutorials</a>
						in the blog regarding this technique and this video. This piece was made with the
						support of 
						<a href="http://eyebeam.org">Eyebeam</a>, the 
						<a href="http://nyc.volumetric.org">Volumetric Society</a> and 
						<a href="http://www.culturehub.org/">CultureHub New York</a>.
					</p>
				</div>
			</div>
		</div>
<?
	require("../../includes/common/footer.php");
?>