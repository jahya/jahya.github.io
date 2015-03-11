<?
session_start();

/**** Live or dev? ****/
define("LIVE_SITE", true);

//If we're on the live site...
if(LIVE_SITE){
	//And the session variable has been set at some point...
	if($_SESSION['noanalytics']){
		define("ANALYTICS", false);
	}else{
		//Or if the querystring has been set on this occasion...
		if(isset($_GET["noanal"])){
			$_SESSION['noanalytics'] = true;
			define("ANALYTICS", false);
		}else{
			define("ANALYTICS", true);
		}
	}
}else{
	define("ANALYTICS", false);
}

/**** Personal Info ****/
define("NAME", "Andrew McWilliams");
define("EMAIL", "andy@jahya.net");

/**** Local URL ****/
define("LOCAL_URL","www.jahya.net");
define("LOCAL_URL_SHORT","jahya.net");

/**** Blogger / retrieval ****/
define("BLOGID","1775524623396551680");
//1869206115847547095 -- test blog ID
define("BLOGGER_URL","jahyawords.blogspot.com");
define("BLOGGER_UK_URL","jahyawords.blogspot.co.uk");
define("RETRIEVE_POST_MAX_RETRIES", 20); //attempts


/**** Enum categories ****/
define("CATEGORY_FEATURE","Feature");

/**** Enum types ****/
define("TYPE_ARTWORKS","artworks");

/**** Enum sections ****/
define("SECTION_HOMEPAGE", 0);
define("SECTION_BIOG", 1);
define("SECTION_RESUME", 2);
define("SECTION_ARTWORKS", 3);
define("SECTION_BLOG", 4);

/**** Layout / formatting ****/
define("HOMEPAGE_SHORT_TEASER_TITLE_LENGTH", 20); //chars
define("HOMEPAGE_SHORT_TEASER_LENGTH", 46); //chars
define("HOMEPAGE_LONG_TEASER_TITLE_LENGTH", 400); //chars
define("HOMEPAGE_LONG_TEASER_LENGTH", 245); //chars
define("HOMEPAGE_LONGER_TEASER_LENGTH", 255); //chars
define("VIDEO_WIDTH", 500); //px

define("POSTS_PER_PAGE", 7);
?>