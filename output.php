<?php


echo (print_r($_POST, true));

if(!isset($_POST['depatureAp']) || !isset($_POST['arrivalAp'])){
	header('Location: http://localhost/flyhealthy?errormsg=1');
	
}else if(empty($_POST['depatureAp']) || empty($_POST['arrivalAp'])){
	header('Location: http://localhost/flyhealthy?errormsg=1');

	}else if($_POST['depatureAp'] == $_POST['arrivalAp']){
	header('Location: http://localhost/flyhealthy?errormsg=2');
}
include_once ('includes.php');


include ('header.php');
include ('api/flyhealthy.php');

$flyHealthy = new flyhealthy();

$possiblePaths = $flyHealthy->getPossiblePaths($_POST['depatureAp'],$_POST['arrivalAp'] );

echo (print_r($possiblePaths,true));

?>




<?php
include ('footer.php');
?>