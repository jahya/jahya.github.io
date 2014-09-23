<?
	require("../../includes/constants.php");
	$active = SECTION_ARTWORKS;
	$title = "Long";
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
						Created at: Contemporary Artist Center Woodside<br />
						New York, 2012
					</p>
				</div>
				<?=renderVimeo("52138049", 530)?>
				<div id="description">
					<p>
						<span class="title">Long</span> is an experimental work exploring the
						process of cognition as a creative process. Rocks, coated with light and 
						sound, are allowed to live and breathe via subtle augmentations.
					</p>
					<p>	
						<span class="title">Long</span> is the result of a series of experiments into
						spatial and perceptual resurfacing. The work was created with the support of 
						the I-Park Foundation, Connecticut, and the Contemporary Artist Center (CAC)
						Woodside, New York.
					</p>
					<p>
						You can see blog posts <a href="/blog/?tag:Long">related to the creation</a> of 
						the work, and read more about the time spent working at
						<a href="/blog/?tag:CAC_Residency">CAC Studios</a> and at
						<a href="/blog/?tag:I-Park_Residency">I-Park</a>.
					</p>
				</div>
			</div>
		</div>
<?
	require("../../includes/common/footer.php");
?>