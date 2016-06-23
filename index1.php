<?php
include_once ('includes.php');
include_once('api/flyhealthy.php');

	$flyhealthy=new flyhealthy();
	$destination=$flyhealthy->getdest();
	
	
	echo (print_r($destination,true));
	$name='Sydney';
	$dest=$flyhealthy->destid($name);
	echo (print_r($dest,true));
	$start='c';
	$s=$flyhealthy->getPossibleFirstStops($start);	
	echo (print_r($s,true));
	$last='a';
	//$d=$flyhealthy->getPossiblelastStops($last);		
	//echo (print_r($d,true));
	
   
   $row=$flyhealthy->getrows();
   echo $row;
    $name1=$flyhealthy->getpaths($start,$last);
	
	$all=$flyhealthy->riskall();
	$id='1';
	$all1=$flyhealthy->risk($id);
	