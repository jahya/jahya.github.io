<?
	require("../../includes/constants.php");
	$active = SECTION_ARTWORKS;
	$title = "Gravity";
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
					<p class="what">Light/Sound Triptych</p>
					<p class="where">
						Presented at: Jaaga Creative Common Ground<br />
						Bangalore, 2011
					</p>
				</div>
				<?=renderVimeo("93316309", 530)?>
				<div id="description">
					<p>
						<span class="title">Gravity</span> is a triptych of 8' x 3' canvass panels,
						phenomenologically transformed by the projection of evolving light and sound.
						<span class="title">Gravity</span> deals with issues of division, in the context
						of temporality and impermanence.
					</p>
					<p>
						This work was created as part of the Jaaga Residency Program. You can
						<a href="/blog/?tag:Gravity">see blog posts</a> related to the creation of 
						the work, and  
						<a href="/blog/?tag:Jaaga_Residency">read more</a> about the time spent on the
						Jaaga Residency Program.
					</p>
					<p>
						You can also <a href="/blog/?2011-06-jaaga-journal-features">watch a short
						feature</a> on the creation of this piece by the documentarians at Jaaga 
						Journals.
					</p>
				</div>
			</div>
		</div>
<?
	require("../../includes/common/footer.php");
?>