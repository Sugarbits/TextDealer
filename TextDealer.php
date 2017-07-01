<?php
#POST is better for sending data's method cuz when using binary data,the size goes bigger

$func = $_POST['func'];
$data = $_POST['data'];
$savePath = $_POST['save_path'];
//$savePath Ex:"foldername/filename.txt"

#next version will do 
#1:array varvar check
#2:json content deal(for tri_pad2/set->text marquee)
/*
$data2 =json_decode($data);
foreach($data2 as $val){
		$text .= "\r\n" .$val;
}
var_dump($data2);
*/

//assume data always be text
$text = $data;

switch($func){
	case 'load':
		$myfile = fopen($savePath, "r") or die("Unable to open file!");
		echo $myfile;
		break;
	case 'write#add':
		$myfile = fopen($savePath, "a+") or die("Unable to open file!");
		fwrite($myfile, $text);
		break;
	case 'write#over':
		$myfile = fopen($savePath, "w+") or die("Unable to open file!");
		fwrite($myfile, $text);
		break;
}
	fclose($myfile);
?>