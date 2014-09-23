<?
	require("../../includes/constants.php");
	$active = SECTION_ARTWORKS;
	$title = "Sound Chamber";
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
					<p class="what">Light/Sound Environment</p>
					<p class="where">
						Exhibited at: ThoughtWorks<br />
						New York, 2013
					</p>
				</div>
				<?=renderYoutube("78NCrNWdUdM", 530)?>
				<div id="description">
					<p>
						<span class="title">Sound Chamber</span> turns the idea of a 'tech demo' away from
						the traditional utopian dream sales pitch. Instead, it showcases full-body interaction
						in the context of failing video and disjointed sound.
					</p>
					<p>	
						The installation is a collaboration with sound technologist 
						<a href="http://alex.hornbake.com/">Alex Hornbake</a>, which grew out of the 
						<a href="http://hardwarehacklab.tumblr.com/">Hardware Hack Lab</a>.
					</p>
					<p>
						You can find out 
						<a href="http://www.thoughtworks.com/insights/blog/creative-culture-hardware-hack">more about the lab</a>
						in this article for ThoughtWorks, who supported the creation of this project.
					</p>
				</div>
			</div>
		</div>
<?
	require("../../includes/common/footer.php");
?>