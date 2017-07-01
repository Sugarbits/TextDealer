<?php
if(!isset($_POST['func'])){
;	
}else{
	include_once("TextDealer.php");
	$load = TextDealer($func,$savePath,$data);
}
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  textPath<br>
  
  <input type="text" name="save_path" value="test.txt" readonly>
  <br>
  send text<br>
  <textarea rows="4"  name="data"  cols="50"><?php echo $load;?></textarea>
  
  <br><br>
  <input type="submit" name='func' value="write#over">
  <input type="submit" name='func' value="load">
</form> 

