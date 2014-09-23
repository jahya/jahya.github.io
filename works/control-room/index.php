<?
	require("../../includes/constants.php");
	$active = SECTION_ARTWORKS;
	$title = "Control Room";
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
						Presented at: Domestic Disturbance<br />
						London, 2010
					</p>
				</div>
				<?=renderVimeo("9737297", 528)?>
				<div id="description">
					<p>
						<span class="title">Control Room</span> is a response to the 2004 documentary of
						the same name by Magnolia Films.
					</p>
					<p>
						In the original film, members of the Al Jazeera media outlet in Qatar
						debate American military personnel on issues of free speech and media
						bias in the context of war. The <span class="title">Control Room</span>
						installation both channels and fragments this conversation using the source 
						media, positioned mirrors, and manipulations of space from which
						observation can take place.
					</p>
					<p>
						The installation questions the nature of memory in relation to real, described,
						or imagined events, and considers the role of 24-hour news in our construction 
						of a continuous cultural narrative.
					</p>
				</div>
			</div>
		</div>
<?
	require("../../includes/common/footer.php");
?>