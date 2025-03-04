<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $allStudents = 
    [
     ["ali",21,"karachi","ali@gmail.com","123"],
     ["sana",24,"karachi","sana@gmail.com"],
     ["aqsa",21,"karachi","aqsa@gmail.com"]
    ];
    ?>
    <table class="table">
        <thead>
       <tr>
         <th>Name</th>
         <th>Age</th>
         <th>City</th>
         <th>Email</th>
         <th>Password</th>
       </tr>
        </thead>
    <tbody>
    <?php 
    foreach($allStudents as $key => $student){
    ?>
    <tr>
    <?php 
      foreach ($student as $data){
    ?>
    <td><?php echo $data?></td>
    <?php }?>
    </tr>
    <?php } ?>
    </tbody>
</body>
</html>