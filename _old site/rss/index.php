<?
//Initialise
set_include_path($_SERVER["DOCUMENT_ROOT"]);
require_once "Zend/Loader.php";
require_once "includes/constants.php";
require_once "includes/blog-posts/post-renderer.php";
require_once "includes/blog-posts/post-formatter.php";
Zend_Loader::loadClass("Zend_Feed_Rss");
//http://framework.zend.com/manual/en/zend.feed.consuming-rss.html
$channel = new Zend_Feed_Rss("http://" . BLOGGER_URL . "/feeds/posts/default?alt=rss&max-results=25");

$channel->title = NAME . " // " . LOCAL_URL_SHORT;
$channel->link = "http://" . LOCAL_URL;
$channel->managingEditor = EMAIL . " (" . NAME . ")";

foreach ($channel as $item) {
    renderPostHtmlForRss($item);
}

$channel->send();

?>