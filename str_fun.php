<?php
$str = "Hello tHIS is Ali. he is intelligent , Ali is excellent";
echo strlen($str). "<br>";
echo str_word_count($str). "<br>";
echo ucwords($str). "<br>";
echo strtolower($str). "<br>";
echo strtoupper($str). "<br>";
echo "<br>";
echo $str. "<br>";
echo str_replace("Ali","Huzaifa",$str). "<br>";
$str2 ="Hello this is Ali";
print_r(explode(' ',$str2)). "<br>";
$url = "http/PR2-202405C/str_fun.php";
$urlarry = explode('/',$url);
echo "<br>";
echo $urlarry[count($urlarry)-1];
echo "<br>";
$fileName = "index.html";
print_r(explode('.',$fileName));
echo "<br>";
$fileNameArray = explode('.',$fileName);
echo $fileNameArray[count($fileNameArray)-1]. "<br>";

$Name = "Sualeh Shah";
echo strrev($Name). "<br>";
$empName = "Ali";
echo strcmp ('ali',$empName);
?>