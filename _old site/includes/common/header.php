<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
		<meta http-equiv="Description" content="Work and project portfolio of Andrew McWilliams, London, UK." />
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css' />
		<title><? 
	
	if(isset($title)){
		echo $title . " | ";
	}
		
	if($active==SECTION_ARTWORKS || $active==SECTION_HOMEPAGE || $active==""){
		echo "Portfolio | ";
	}elseif($active==SECTION_RESUME){
		echo "Resume | ";
	}elseif($active==SECTION_BIOG){
		echo "About | ";
	}elseif($active==SECTION_BLOG){
		echo "Blog | ";
	}
		
		?>Andrew McWilliams</title> 
		<link href="/css/style.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script><?
	if($active == SECTION_HOMEPAGE){
?>

		<script type="text/javascript" src="/includes/client-side-script/jquery.jshowoff.min.js"></script>
		<script type="text/javascript" src="/includes/client-side-script/homepage.js"></script><?
	}
?>

	</head> 
	<body> 