<?php
$stdName = "Ali";
echo'My name is' .$stdName;
echo "<h1>".$stdName . "</h1>"
?>
<h1><?php echo $stdName?></h1>

<?php 
$num = 10;

function output(){
$number = 20;
global $num;
return 'global variable'. $num. "local scope variable number" . $number ."<br>";
}
echo output();

function add($n1 = 20, $n2 =30 ){
    return $n1 = $n2;

}
echo add();

function staticscope(){
static $x = 1;
echo $x ;
$x++;

}
echo "<br>";
staticscope();
echo "<br>";
staticscope();
echo "<br";
staticscope();
echo "<br>";

$empName = "hassan";
$empAge = 21;
echo"<h1>$empName, $empAge</h1>";
echo'<h1>$empAge</h1>';
echo '<h1>'. $empAge , $empName .'</h1>';
echo "<h1>". $empAge , $empName ."</h1>";
echo "yahan se print start hai";

?>