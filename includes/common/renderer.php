<?
function renderVimeo($vimeoId, $height=540){
	$result = <<<EOD
<script type="text/javascript">
					<!--
						document.write('<iframe src="http://player.vimeo.com/video/$vimeoId?title=0&amp;byline=0&amp;portrait=0&amp;color=15a6ab&amp;hd_off=0" width="948" height="$height" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');
					//-->
				</script>
				<noscript>
					<p><strong>Javascript not detected</strong><br />You will have to enable Javascript to view this video</p>
				</noscript>

EOD;
	return $result;
}

function renderYoutube($youtubeId, $height=532){
	$result = <<<EOD
<script type="text/javascript">
					<!--
						document.write('<iframe width="948" height="532" src="//www.youtube.com/embed/$youtubeId" frameborder="0" allowfullscreen></iframe>');
					//-->
				</script>
				<noscript>
					<p><strong>Javascript not detected</strong><br />You will have to enable Javascript to view this video</p>
				</noscript>

EOD;
	return $result;
}
?>