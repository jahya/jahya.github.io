<?
require('XMLparser_php4.php');
$xml = file_get_contents('http://'.LOCAL_URL.'/xml/current-'.$type.'.xml');
$parser = new XMLParser($xml);
$parser->Parse();
$i = 0;

foreach($parser->document->project as $project)
{
	$url = "/works/".$project->url[0]->tagData."/";
	$oddeven = (++$i % 2 == 0) ? "even" : "odd";
	
	echo "\t\t\t\t\t<a class=\"thumb ".$oddeven."\" href=\"".$url."\">\n";
	echo "\t\t\t\t\t\t<img src=\"/img/".$project->img[0]->tagData."\" alt=\"Thumbnail for ".$project->title[0]->tagData."\" />\n";
    echo "\t\t\t\t\t\t<p class=\"title\">".$project->title[0]->tagData."<span class=\"details\">, ".$project->medium[0]->tagData."</span></p>\n";
	echo "\t\t\t\t\t\t<p class=\"details\">".$project->location[0]->tagData.", ".$project->year[0]->tagData."</p>\n";
	echo "\t\t\t\t\t</a>\n";
}
?>