<? 
session_start();
$_SESSION['noanalytics'] = true;

if($_SESSION['noanalytics']){
	echo "Analytics turned off for this session.";
}else{
	echo "Something went wrong.";
}
?>
<br />
<pre><?=print_r($_SESSION)?></pre>