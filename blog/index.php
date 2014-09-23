<?
	/* Generate dynamic content */
	require_once '../includes/constants.php';
	require_once '../includes/blog-posts/post-retrieval.php';
	require_once '../includes/blog-posts/post-renderer.php';
	require_once '../includes/blog-posts/post-formatter.php';

	//Initialise
	$queryString = urldecode($_SERVER["QUERY_STRING"]);
	$notFound = false;
	$posts = getPosts();
	
	//Populate render variables for display
	if($posts == false) $notFound = true;
	else
	{
		//LANDING PAGE MODE
		if(strlen($queryString) == 0 || substr($queryString, 0, 5) == "page:")
		{
			//Populate page & lastpage variable
			$page = 1;
			if(substr($queryString, 0, 5) == "page:")
			{
				$page = intval(substr($queryString, 5));
			}
			$lastpage = workOutLastPageNumber($posts);
			$pagingHtml = renderPagingHtmlForPagingMode($page, $lastpage);
			
			//Generate html
			$postHtml = renderPostsHtmlByPage($posts, $page);
			if(strlen($postHtml) == 0) $notFound = true;
			else
			{
				initialiseCategories($posts);
				$linksHtml = renderLinksHtml($posts);
				$tagCloudHtml = renderTagCloudHtml();
			}
		}
		//CATEGORY / TAG MODE
		elseif(substr($queryString, 0, 4) == "tag:")
		{
			$category = substr($queryString, 4);
			$category = str_replace("_", " ", $category);
			
			//Generate html
			$postHtml = renderPostsHtmlByCategory($posts, $category);
			if(strlen($postHtml) == 0) $notFound = true;
			else
			{
				initialiseCategories($posts);
				$linksHtml = renderLinksHtml($posts);
				$tagCloudHtml = renderTagCloudHtml($category);
				$title = renderTitleFromCategory($category);
				$pagingHtml = "";
			}
		}
		//SINGLE POST MODE
		else
		{
			$postId = $_SERVER["QUERY_STRING"];
			$post = selectPost($postId, $posts);

			//If post found
			if($post == false) $notFound = true;
			else
			{			
				//If postId not provided from URL, generate it from selected post URL
				if(strlen($postId) == 0)
				{
					$postUrl = $post->getLink("alternate")->href;
					$postId = createLocalUrl($postUrl);
				}
				
				//Generate html variables
				initialiseCategories($posts);
				$postHtml = renderPostHtml($post);
				$linksHtml = renderLinksHtml($posts, $postId);
				$tagCloudHtml = renderTagCloudHtml();
				$title = renderTitleFromPost($post);
				$pagingHtml = renderPagingHtmlForSinglePostMode($postId, $posts);
			}
		}
	}
	
	/* Include static content */
	$active = SECTION_BLOG;
	require("../includes/common/header.php");
?>

		<div id="main_container">
<?
	require("../includes/common/menu.php");
?>

			<div class="page blog_page">
<?
	if($notFound) require("../includes/404/404.php");
	else
	{
?>
				<div id="main">
					<div id="subscribe_section">
						<a href="/rss">
							Subscribe&nbsp;<img src="/img/rss2.png" alt="Subscribe via RSS" />
						</a>
					</div><?
	echo $postHtml;
	echo $pagingHtml;
?>

				</div>
				<div id="side">
					<div id="tagcloud_section">
						<a href="#" id="tags-up">
							<img src="/img/point-up.png" alt="Scroll tags up" height="8" width="7" />
						</a>
						<div class="clear" id="tagcloud"><?
	echo $tagCloudHtml;
?>

						</div>
						<a href="#" id="tags-down">
							<img src="/img/point-down.png" alt="Scroll tags down" height="8" width="7" />
						</a>
					</div>
					<div id="list_section">
						<h2>All posts</h2><?
	echo $linksHtml;
?>

					</div>
				</div>
				<div class="clear" /><?
	}
?>

			</div>
		</div>
		<script type="text/javascript" src="/includes/client-side-script/widgets.js"></script>
<?
	require("../includes/common/footer.php");
?>