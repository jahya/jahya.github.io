<?
session_start();
if($_SESSION['noanalytics']){
	echo "Analytics is off.";
}else{
	echo "Analytics is on.";
}
?>
<br/>
<pre><?=print_r($_SESSION)?></pre>