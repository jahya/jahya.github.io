<?
	require("../includes/constants.php");
	$active = SECTION_ARTWORKS;
	require("../includes/common/header.php");
?>

		<div id="main_container">
<?
	require("../includes/common/menu.php");
?>

			<div class="portfolio">
<?
	$type = TYPE_ARTWORKS;
	require("../xml/render.php");
?>
				<div class="clear" />
			</div>
		</div> 
<?
	require("../includes/common/footer.php");
?>