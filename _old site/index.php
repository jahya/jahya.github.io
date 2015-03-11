<?
	/* Generate dynamic content */
	require_once './includes/constants.php';
	$active = SECTION_HOMEPAGE;
	
	/* Include static content */
	require("includes/common/header.php");
?>

		<div id="main_container">
<?
	require("includes/common/menu.php");
?>

			<div class="homepage">
				<div id="promo_img">
					<div>
						<a href="/works/long">
							<img src="/img/homepage/long2.png" alt="Long, 2012" />
						</a>
						<p class="title">Long</p>
						<p class="details">
							Contemporary Artist Center Woodside<br />
							New York, 2012
						</p>
					</div>
					<div>
						<a href="/works/measure">
							<img src="/img/homepage/measure1.png" alt="Measure, 2011" />
						</a>
						<p class="title">Measure</p>
						<p class="details">
							Alpha-Ville (Festival of Post-Digital Culture)<br />
							London, 2011
						</p>
					</div>
					<div>
						<a href="/works/gravity">
							<img src="/img/homepage/gravity1.png" alt="Gravity, 2011" />
						</a>
						<p class="title">Gravity</p>
						<p class="details">
							Jaaga Creative Common Ground<br />
							Bangalore, 2011
						</p>
					</div>
				</div>
			</div>
		</div>
<?
	require("includes/common/footer.php");
?>