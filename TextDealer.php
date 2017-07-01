<?php
#POST is better for sending data's method cuz when using binary data,the size goes bigger
error_reporting(E_ALL);
ini_set('display_errors','1');

$func = $_POST['func'];
$data = $_POST['data'];
$savePath = $_POST['save_path'];
$call = (isset($_POST['call'])) ? true : false;
//print_r($_POST);
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

function TextDealer($func,$savePath,$data){
//assume data always be text
$text = $data;
$str='';
switch($func){
	case 'load':
		$myfile = fopen($savePath, "r") or die("Unable to open file!");
		
		while(!feof($myfile)) {
		$str.=fgetc($myfile);
		}
		//echo $str;
		fclose($myfile);
		break;
	case 'write#add':
		$myfile = fopen($savePath, "a+") or die("Unable to open file!");
		fwrite($myfile, $text);
		fclose($myfile);
		$str="add OK";
		break;
	case 'write#over':
		$myfile = fopen($savePath, "w+") or die("Unable to open file!");
		fwrite($myfile, $text);
		fclose($myfile);
		$str="overwrite with:「".$text."」 OK";
		break;
}
return $str;
}
if($call == false){//positive call fuction
	echo TextDealer($func,$savePath,$data);
}

?>