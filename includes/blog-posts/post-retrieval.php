<?
//Initialise
set_include_path($_SERVER["DOCUMENT_ROOT"]);
require_once "Zend/Loader.php";
Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_Query');
//Uses:
// http://framework.zend.com/apidoc/1.7/
// Zend_Gdata_Feed
// Zend_Gdata_Entry --> see http://framework.zend.com/apidoc/1.7/Zend_Gdata/Gdata/Zend_Gdata_Entry.html
$gdClient = new Zend_Gdata();

//The access functions getPosts(), getLatestPost(),
//simply package and format calls to this function:
function getPostsWithParams($queryParams)
{
	global $gdClient;
	$query = new Zend_Gdata_Query('http://www.blogger.com/feeds/' . BLOGID . '/posts/default/' . $queryParams);
	//echo 'http://www.blogger.com/feeds/' . BLOGID . '/posts/default/' . $queryParams;
	
	$result = false;
	
	for($i = 0; $i < RETRIEVE_POST_MAX_RETRIES; $i++)
	{
		try
		{
			$result = $gdClient->getFeed($query);
			break;
		}
		catch (Zend_Exception $e)
		{
			$result = false;
		}
	}
	
	return $result;
}

//Access functions
function getPosts($category=null)
{
	if(isset($category))
	{
		return getPostsWithParams('-/' . $category . '?max-results=100000');
	}
	else
	{
		return getPostsWithParams('?max-results=100000');
	}
}

function getLatestPost($category)
{
	$feed = getPostsWithParams('-/' . $category . '?max-results=1');
	return $feed->entries[0];
}

//Select a post from a feed
function selectPost($postId, $posts)
{
	$result = null;
	
	if(strlen($postId) == 0)
	{
		//If no postId provided, just get latest post
		$result = $posts->entries[0];
	}
	else
	{
		//If postId is provided, get it or return null if not found
		foreach ($posts->entries as $post)
		{
			$postUrl = $post->getLink("alternate")->href;
			$localUrl = createLocalUrl($postUrl);
			
			if($localUrl == $postId)
			{
				$result = $post;
				break;
			}
		}
	}
	
	return $result;
}

function selectNextPost($postId, $posts)
{
	$result = null;
	$found = false;
	
	if(strlen($postId) > 0)
	{
		foreach ($posts->entries as $post)
		{
			if($found)
			{
				$result = $post;
				break;
			}
			
			$postUrl = $post->getLink("alternate")->href;
			$localUrl = createLocalUrl($postUrl);
			
			if($localUrl == $postId)
			{
				$found = true;
			}
		}
	}
	
	return $result;
}

function selectPreviousPost($postId, $posts)
{
	$result = null;
	
	if(strlen($postId) > 0)
	{
		foreach ($posts->entries as $post)
		{
			$postUrl = $post->getLink("alternate")->href;
			$localUrl = createLocalUrl($postUrl);
			
			if($localUrl == $postId)
			{
				return $result;
			}
			
			$result = $post;
		}
	}
	
	return null;
}
?>