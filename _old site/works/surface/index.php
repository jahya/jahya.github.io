<?
	require("../../includes/constants.php");
	$active = SECTION_ARTWORKS;
	$title = "Surface";
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
						Presented at: Jaaga Creative Common Ground<br />
						Bangalore, 2010
					</p>
				</div>
				<?=renderVimeo("54201963", 530)?>
				<div id="description">
					<p>
						<span class="title">Surface</span> is an installation which can be recreated
						in any location with nine assorted pieces of wood - as long as they are between
						2' and 8' in height. The pieces are distributed in a darkened space, and a 
						light and sound pattern is generated to 're-surface' them.
					</p>
					<p>
						The installation is a response to the reconfigurability of the Jaaga space in
						central Bangalore, where <span class="title">Surface</span> was first presented.
						Jaaga is based on a lightweight building design which can be deconstructed and
						rebuilt to suit the characteristics of any outdoor location.
					</p>
					<p>
						<span class="title">Surface</span> considers our relationship to 
						space and materials, and how that relationship changes in differing contexts. 
					</p>
				</div>
			</div>
		</div>
<?
	require("../../includes/common/footer.php");
?>