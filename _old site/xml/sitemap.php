<?
require '../includes/constants.php';
require '../includes/blog-posts/post-retrieval.php';
require '../includes/blog-posts/post-formatter.php';

require 'XMLparser_php4.php';

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

//Homepage
echo "\t<url>\n";
echo "\t\t<loc>http://" . LOCAL_URL . "/</loc>\n";
echo "\t\t<priority>1</priority>\n";
echo "\t</url>\n";

//Biog
echo "\t<url>\n";
echo "\t\t<loc>http://" . LOCAL_URL . "/about/</loc>\n";
echo "\t\t<priority>0.8</priority>\n";
echo "\t</url>\n";

//Resume
echo "\t<url>\n";
echo "\t\t<loc>http://" . LOCAL_URL . "/resume/</loc>\n";
echo "\t\t<priority>0.7</priority>\n";
echo "\t</url>\n";

//Art
echo "\t<url>\n";
echo "\t\t<loc>http://" . LOCAL_URL . "/works/</loc>\n";
echo "\t\t<priority>0.7</priority>\n";
echo "\t</url>\n";

$xml = file_get_contents('http://' . LOCAL_URL . '/xml/current-' . TYPE_ARTWORKS .'.xml');
$parser = new XMLParser($xml);
$parser->Parse();

foreach($parser->document->project as $project)
{
	echo "\t<url>\n";
	echo "\t\t<loc>http://" . LOCAL_URL . "/works/".$project->url[0]->tagData."/</loc>\n";
	echo "\t\t<priority>1</priority>\n";
	echo "\t</url>\n";
}

//Blog posts
$posts = getPosts();

if($posts == false) $notFound = true;
else
{
	foreach ($posts->entries as $post)
	{
		$postUrl = $post->getLink("alternate")->href;
		$localUrl = createLocalUrl($postUrl);

		echo "\t<url>\n";
		echo "\t\t<loc>http://" . LOCAL_URL . "/blog/?".$localUrl."</loc>\n";
		echo "\t\t<priority>1</priority>\n";
		echo "\t</url>\n";
	}
}

echo "</urlset>";

?>