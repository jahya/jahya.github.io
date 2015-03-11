<?
$categories = array();

function initialiseCategories($posts)
{
	global $categories;

	//Initialise categories array from top-level category list
	foreach ($posts->category as $category)
	{
		$term = $category->term;
		if($term != "Feature")
		{
			$categories[$term] = 0;
		}
	}
}

function registerCategories($post)
{
	global $categories;
	
	//For each usage in each post, add 1 to the indexed item in the array
	foreach ($post->category as $category)
	{
		$term = $category->term;
		if($term != "Feature")
		{
			$categories[$term]++;
		}
	}
}

function renderTitleFromPost($post)
{
	return htmlspecialchars($post->title->text);
}

function renderTitleFromCategory($category)
{
	return "Tag: $category";
}

//Homepage
function renderBlogCtaHtml($post, $anchorId, $titleLength, $textLength)
{
	$url = createLocalUrl($post->getLink("alternate")->href);
	$title = generateTeaser(htmlspecialchars($post->title->text), $titleLength);
	$date = convertToBlogPostDate($post->getPublished()->getText());
	
	return <<<EOD
				<a id="$anchorId" href="/blog/?$url">$title</a> - $date
EOD;
}

//Detail page i.e. /blog/?$blogId
function renderPostHtml($post)
{
	$postUrl = $post->getLink("alternate")->href;
	$localUrl = createLocalUrl($postUrl);
	
	$result = "\n\t\t\t\t\t<span class=\"blogdate\">Posted ".convertToBlogPostDate($post->getPublished()->getText())."</span>";
	$result .= "\n\t\t\t\t\t<h1><a href=\"/blog/?";
	$result .= $localUrl;
	$result .= "\">".htmlspecialchars($post->title->text)."</a></h1>";
	$html = $post->content->text;
	$html = prepareVimeoWidgets($html);
	$html = localizeUrls($html);
	if(!ANALYTICS) $html = removeGoogleTracker($html);
	$result .= "\n\n\t\t\t\t\t<!-- Beginning blogger HTML dump -->";
	$result .= "\n\t\t\t\t\t".$html;
	$result .= "\n\t\t\t\t\t<!-- Ending blogger HTML dump -->\n";
	$result .= renderCategories($post);
	$result .= "\n\t\t\t\t\t<hr />";
	return $result;
}

//RSS Feed
function renderPostHtmlForRss($item)
{
	$localUrl = createLocalUrl($item->link);
	$item->link = "http://" . LOCAL_URL . "/blog/?" . $localUrl;
	$item->author = EMAIL . " (" . NAME . ")";
	
	$content = $item->description;
	$content = localizeUrls($content, true);
	if(!ANALYTICS) $content = removeGoogleTracker($content);
	$item->description = $content;
	/*echo $item->link;
	echo "<br />";
	echo "<br />";
	echo $item->description;
	echo "<br />";
	echo "<br />";*/
}

//Detail pages i.e. /blog/?tag:feature
function renderPostsHtmlByCategory($posts, $filterCategory)
{
	$result = "";
	
	foreach ($posts->entries as $post)
	{
		$postHasCategory = false;
		foreach ($post->category as $postCategory)
		{
			if($postCategory->term == $filterCategory)
			{
				$postHasCategory = true;
			}
		}
		
		if($postHasCategory)
		{
			$result .= renderPostHtml($post);
		}
	}
	
	if(strlen($result) > 0)
	{
		$href = str_replace(" ", "_", $filterCategory);
		$feedback = "";
		$feedback .= "\t\t\t\t\t\t<p class=\"info\">Showing posts tagged with: ";
		$feedback .= "<a href=\"/blog/?tag:$href\" class=\"category selected\">$filterCategory</a> &nbsp;";
		$feedback .= "<a href=\"/blog/\" class=\"remove\">Show all posts</a></p>";
		$feedback .= "\n\t\t\t\t\t\t<hr class=\"nomargin\" />\n";
		$result = $feedback.$result;
	}
	
	return $result;
}

//Blog home page i.e. /blog/?page:7
function renderPostsHtmlByPage($posts, $page)
{
	if((!is_int($page)) || $page < 1) return "";
	else
	{
		$result = "";
		$stopAfterPostNumber = POSTS_PER_PAGE * $page;
		$startOnPostNumber = $stopAfterPostNumber - POSTS_PER_PAGE + 1;
		$currentPostNumber = 0;
		
		foreach ($posts->entries as $post)
		{
			$currentPostNumber++;
			if($currentPostNumber >= $startOnPostNumber && $currentPostNumber <= $stopAfterPostNumber)
			{
				$result .= renderPostHtml($post);
			}
		}
		
		return $result;
	}
}

function workOutLastPageNumber($posts)
{
	return ceil(sizeof($posts) / POSTS_PER_PAGE);
}

function renderCategories($post)
{
	if(sizeof($post->category) == 0) return "";
	else
	{
		$result = "";
		$result .= "\n\t\t\t\t\t<ul class=\"categories\">";
		$result .= "\n\t\t\t\t\t\t<li><span>Tags: </span></li>";
		foreach ($post->category as $category)
		{
			$result .= "\n\t\t\t\t\t\t<li>";
			$result .= renderTagLink($category->term);
			$result .= "</li>";
		}
		$result = rtrim($result, ", ");
		$result .= "\n\t\t\t\t\t</ul><br />";
		return $result;
	}
}

function renderTagLink($unescapedCategory, $numberOfUsages=null, $currentTag="")
{
	//Work out if it's the current tag
	$isCurrent = ($currentTag == $unescapedCategory);
	
	//Prepare
	$result = "";
	
	//Open
	$result .= "<a href=\"/blog/?tag:";
	$result .= str_replace(" ", "_", $unescapedCategory);
	$result .= "\"";
	if($isCurrent){
		$result .= " class=\"selected\"";
	}
	$result .= ">";
	
	//Tag name & number usages
	$result .= str_replace(" ", "&nbsp;", $unescapedCategory);
	if(isset($numberOfUsages))
	{
		$result .= "&nbsp;($numberOfUsages)";
	}
	
	//Close
	$result .= "</a>";
	
	return $result;
}

function renderTagCloudHtml($currentTag="")
{
	global $categories;
	arsort($categories);
	
	$result = "";
	$result .= "\n\t\t\t\t\t\t\t<ul class=\"categories\">";
	
	foreach ($categories as $category=>$usages)
	{
		if($usages > 1)
		{
			$result .= "\n\t\t\t\t\t\t\t\t<li>";
			$result .= renderTagLink($category, $usages, $currentTag);
			$result .= "</li>";
		}
	}
	
	$result .= "\n\t\t\t\t\t\t\t</ul>";
	
	return $result;
}

function renderLinksHtml($posts, $currentPageUrl="")
{
	$date = null;
	$ulOpen = false;
	$result = "";
	
	foreach ($posts->entries as $post)
	{
		registerCategories($post);
	
		$postUrl = $post->getLink("alternate")->href;
		$localUrl = createLocalUrl($postUrl);
		
		$nextDate = getDateFromUrl($localUrl);
		if($nextDate != $date)
		{
			if($ulOpen) $result .= "\n\t\t\t\t\t\t</ul>";
			$result .= "\n\t\t\t\t\t\t<p>".$nextDate."</p>\n\t\t\t\t\t\t<ul>";
			$date = $nextDate;
			$ulOpen = true;
		}
		
		$title = htmlspecialchars($post->title->text);
		
		if($localUrl == $currentPageUrl)
		{
			$result .= "\n\t\t\t\t\t\t\t<li class=\"current\">$title</li>";
		}
		else
		{
			$result .= "\n\t\t\t\t\t\t\t<li><a href=\"/blog/?$localUrl\">$title</a></li>";	
		}
	}
	
	$result .= "\n\t\t\t\t\t\t</ul>";
	
	return $result;
}

function renderPagingHtmlForPagingMode($page, $lastpage)
{
	$result = "";
	$result .= "\n\t\t\t\t\t<div id=\"paging\">";
	
	if($page > 1){
		$result .= "\n\t\t\t\t\t\t<a href=\"/blog/?page:".($page-1)."\">&lt;&lt; Newer posts</a>";
	}
	if($page > 1 && $page < $lastpage){
		$result .= "\n\t\t\t\t\t\t<span class=\"faded\"> | </span>";
	}	
	if($page < $lastpage){
		$result .= "\n\t\t\t\t\t\t<a href=\"/blog/?page:".($page+1)."\">Older posts &gt;&gt;</a>";
	}
	
	$result .= "\n\t\t\t\t\t</div>";
	return $result;
}

function renderPagingHtmlForSinglePostMode($postId, $posts)
{
	$nextPost = selectNextPost($postId, $posts);
	$previousPost = selectPreviousPost($postId, $posts);
	
	if(isset($nextPost)){
		$nextPostId = createLocalUrl($nextPost->getLink("alternate")->href);
	}
	if(isset($previousPost)){
		$previousPostId = createLocalUrl($previousPost->getLink("alternate")->href);
	}

	$result = "";
	$result .= "\n\t\t\t\t\t<div id=\"paging\">";

	if(isset($previousPostId)){
		$result .= "\n\t\t\t\t\t\t<a href=\"/blog/?$previousPostId\">&lt;&lt; Newer post</a>";
	}		
	if(isset($previousPostId) && isset($nextPostId)){
		$result .= "\n\t\t\t\t\t\t<span class=\"faded\"> | </span>";
	}
	if(isset($nextPostId)){
		$result .= "\n\t\t\t\t\t\t<a href=\"/blog/?$nextPostId\">Older post &gt;&gt;</a>";
	}
					
	$result .= "\n\t\t\t\t\t</div>";
	return $result;
}

function getDateFromUrl($feedUrl)
{
	$dateStr = substr($feedUrl, 0, 7);
	$time = strtotime($dateStr);
	$date = date('F Y', $time );
	return $date;
}
?>