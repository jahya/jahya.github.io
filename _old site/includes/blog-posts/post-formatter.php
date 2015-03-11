<?
//Look up blogger URLs and replace with local URLs
//so that links point to local version rather than
//leading to blogspot.com
function localizeUrls($html, $includeDomain=false)
{
	$result = $html;
	$result = localizeUrl($result, $includeDomain, "http://".BLOGGER_URL);
	$result = localizeUrl($result, $includeDomain, "http://".BLOGGER_UK_URL);
	return $result;
}

function localizeUrl($html, $includeDomain, $url)
{
	$urlStart = strpos($html, $url);
	
	while($urlStart)
	{
		//Work out the length
		$urlEnd = strpos($html, ".html", $urlStart) + 5;
		$length = $urlEnd - $urlStart;
		
		//Extract the URL, edit it, and mark it as <i_done>
		$url = substr($html, $urlStart, $length);
		$domain = "";
		if($includeDomain){
			$domain = "http://".LOCAL_URL;
		}
		$url = $domain . "/blog/?" . createLocalUrl($url);
		
		//Return it to the html mix and check for another occurence
		$html = substr($html, 0, $urlStart) . $url . substr($html, $urlEnd);
		$urlStart = strpos($html, "http://".BLOGGER_URL, $urlStart);
	}
	
	return $html;
}

function createLocalUrl($bloggerUrl)
{
	$result = str_replace("http://", "", $bloggerUrl);
	$result = str_replace(".html", "", $result);
	$result = strstr($result, "/");
	$result = substr($result, 1);
	$result = str_replace("/", "-", $result);
	return $result;
}

//Homepage teaser from blog post html
function generateTeaser($postHtml, $teaserLength=HOMEPAGE_TEASER_LENGTH)
{
	$result = $postHtml;

	//Strip <table> tags including their contents (blogger
	//uses them as to demarcate images & image captions in html)
	$result = preg_replace("/<table(.*?)<\/table>/s", " ", $result);
	
	//Strip all other tags, preserving content (leaving only text behind)
	$result = str_replace("</p>", " </p>", $result);
	$result = str_replace(":", ".", $result);
	$result = strip_tags($result);
	
	if(strlen($result) > $teaserLength)
	{
		//Get substring (prevent truncation mid-word)
		$result = substr($result, 0, $teaserLength);
		$result = substr($result, 0, strrpos($result, " "));
		
		//Remove nasty non-alpha last chasrs
		$lastchar = substr($result, strlen($result) - 1);
		while($lastchar == " " || $lastchar == "," || $lastchar == "." || $lastchar == ";")
		{
			$result = substr($result, 0, strlen($result) - 1);
			$lastchar = substr($result, strlen($result) - 1);
		}
			
		//If the last 2 chars are " -" remove them
		$last2chars = substr($result, 0, strlen($result) - 2);
		if($last2chars == " -")
		{
			$result = substr($result, 0, strlen($result) - 2);
		}
		
		$result .= "...";
	}
	
	return $result;
}

//Strip the tracking code google adds to the bottom of each feed entry
function removeGoogleTracker($html)
{
	$trackerStart = strpos($html, "<div class=\"blogger-post-footer\">");
	if($trackerStart)
	{
		$html = substr($html, 0, $trackerStart);	
	}
	return $html;
}

//Resize vimeo widgets - by looking up thier width & height
//attributes and replacing the values... and wrap the tag in
//'document.write' so it validates as xhtml
function prepareVimeoWidgets($html)
{
	//Find first occurence of <iframe
	$iframeTagStart = strpos($html, "<iframe");
	while($iframeTagStart)
	{
		//Work out the length
		$iframeTagEnd = strpos($html, "</iframe>", $iframeTagStart) + 9;
		$length = $iframeTagEnd - $iframeTagStart;
		
		//Extract the iframe, edit it, and mark it as <i_done>
		$iframe = substr($html, $iframeTagStart, $length);
		$iframe = constrainToWidth($iframe, VIDEO_WIDTH);
		$iframe = str_replace("iframe", "i_done", $iframe);
		
		//Format the iframe tag to suit the javascript style we're using below
		$iframe = str_replace("'", "\"", $iframe);
		
		//Return it to the html mix and check for another occurence
		$html = substr($html, 0, $iframeTagStart) . $iframe . substr($html, $iframeTagEnd);		
		$iframeTagStart = strpos($html, "<iframe", $iframeTagStart);
	}
	
	$newStart = "\n\t\t\t\t\t\t<script type=\"text/javascript\">\n\t\t\t\t\t\t\t<!--\n\t\t\t\t\t\t\t\tdocument.write('<iframe";
	$newEnd = "<\/iframe>');\n\t\t\t\t\t\t\t//-->\n\t\t\t\t\t\t</script>\n\t\t\t\t\t\t<noscript>\n\t\t\t\t\t\t\t<p><strong>Sorry!</strong><br />You will have to enable Javascript to view this video.</p>\n\t\t\t\t\t\t</noscript>\n\t\t\t\t\t\t";
	
	//When all are <i_done, rename back to <iframe
	$html = str_replace("<i_done", $newStart, $html);
	$html = str_replace("</i_done>", $newEnd, $html);
	
	return $html;
}
function constrainToWidth($htmltag, $newWidth)
{
	$oldWidth = getAttributeValue("width", $htmltag);
	$oldHeight = getAttributeValue("height", $htmltag);
	$newHeight = getNewHeight($oldWidth, $oldHeight, $newWidth);
	
	$result = $htmltag;
	$result = replaceAttributeValue("width", $newWidth, $result);
	$result = replaceAttributeValue("height", $newHeight, $result);
	return $result;
}

function getNewHeight($oldWidth, $oldHeight, $newWidth)
{
	$ratio = $newWidth / $oldWidth;
	return round($oldHeight * $ratio);
}

function getAttributeValue($attrName, $htmltag)
{
	$start = strpos($htmltag, "$attrName=\"") + (strlen($attrName) + 2);
	$end = strpos($htmltag, "\"", $start);
	$length = $end - $start;
	return substr($htmltag, $start, $length);
}

function replaceAttributeValue($attrName, $newValue, $htmltag)
{
	return preg_replace("[$attrName=\"[^\"\r\n]*\"]", "$attrName=\"$newValue\"", $htmltag);
}

function convertToBlogPostDate($dateString)
{
	$dateString = str_replace("T", " ", $dateString);
	$time = strtotime($dateString);
	return date('l, j F Y', $time);
}
?>