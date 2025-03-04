<?php 
$student = [
   "id"=>1,
   "name"=>"ali",
   "email"=>"aligmail.com"
];
echo $student['name'] . " " . $student['email'];
?>
<h1>foreach loop</h1>
<ul>
 <?php 
 foreach($student as $key=> $value){
 ?>
<li>
    <?php echo $key." : ". $value ?>
</li>
<?php }?>
</ul>
<h1>
    nested
</h1>
<?php
$student = [
    ["id"=>1, "name"=>"ali","email"=>"ali@gmail.com"],
    ["id"=>2, "name"=>"sana","email"=>"sana@gmail.com"],
    ["id"=>3, "name"=>"aqsa","email"=>"aqsa@gmail.com"]
];
$allstudents = [
   "std1456"=>
];