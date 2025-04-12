<?php 
include("dbcon.php");
session_start();
$categoryName = $categoryDes = $categoryImageName = "" ;
$categoryNameErr = $categoryDesErr = $categoryImageNameErr = "" ;
if(isset($_POST['addCategory'])){
    $categoryName = $_POST['cName'];
    $categoryDes = $_POST['cDes'];
    $categoryImageName = strtolower($_FILES['cImage']['name']);
    $categoryImageTmpName =  $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION);
    $destination = "images/".$categoryImageName ;
    if(empty($categoryName)){
        $categoryNameErr = "Category Name is Required";
    }
    if(empty($categoryDes)){
        $categoryDesErr = "Category Description is Required";
    }
    if(empty($categoryImageName)){
            $categoryImageNameErr = "Image is Requried";
    }
    else{
        $format = [ "jpg" , "png" , "jpeg" , "webp" , "svg"];
        if(!in_array($extension,$format)){
            $categoryImageNameErr = "Invalid Extension";
        }
    }
    if(empty($categoryNameErr) && empty($categoryDesErr) && empty($categoryImageNameErr)){
        if(move_uploaded_file($categoryImageTmpName,$destination)){
            $query = $pdo->prepare("insert into categories (name , image, description) values (:name , :image , :des)");
            $query->bindParam('name',$categoryName);
            $query->bindParam('des',$categoryDes);
            $query->bindParam('image',$categoryImageName);
            $query->execute();
            echo "<script>alert('category added');</script>";
        }
// update category

if(isset($_POST['updateCategory'])){
    $categoryId = $_GET['cId'];
    $categoryName = $_POST['cName'];
    $categoryDes = $_POST['cDes'];
    $query = $pdo->prepare("update categories set name = :cName, description = :cDes where id = :cId");
    if(!empty($_FILES['cImage']['name'])){
        $categoryImageName = $_FILES['cImage']['name'];
        $categoryImageTmpName = $_FILES['cImage']['tmp-name'];
        $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION);
        $destination = "images/".$categoryImageName ;
        $format = ["jpg","png","jpeg","webp","svg"];
        if(in_array($extension,$format)){
            if(move_uploaded_file($categoryImageTmpName,$destination))
            {
                $query = $pdo->prepare("update categories set name = :cName, description = :cDes where id = :cId");
                $query->bindparam('cImage',$categoryImageName);
            }
        }
        else{
            echo"<script>alert('invalid extension')</script>";
        }
    }
    $query->bindparam('cName',$categoryName);
    $query->bindparam('cDes',$categoryDes);
    $query->bindparam('cId',$categoryId);
    $query->execute();
    echo"<script>alert('category updated');location.assign('viewCategory.php')</script>";
}

    }
    // remove
    if(isset($_GET['categoryId'])){
        $categoryId = $_GET['CategoryId'];
        $query = $pdo->prepare("delete * from categories where id = :cI0d");
        $query->bindparam('cId',$categoryId);
        $query->execute();
        echo"<script>alert('category deleted');location.assign('viewCategory.php')</script>";
    }
}


$userName= $userEmail= $userPassword= $userConfirmPassword="";
$userNameErr= $userEmailErr= $userPasswordErr= $userConfirmPasswordErr="";
if(isset($_POST['registerUser'])){
    $userName=$_POST['uName'];
    $userEmail=$_POST['uEmail'];
    if(empty($userName)){
        $userNameErr="name is required";
    }
    if(empty($userEmail)){
        $userEmailErr = "Email is required" ;
    }
    else{
        $query = $pdo->prepare("select * from users where email = :uEmail");
        $query->bindParam('uEmail', $userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user){
            $userEmailErr = "Email is already exist";
        }
    }
    if(empty($userPassword)){
        $userPasswordErr = "Password is required" ;
    }
    if(empty($userConfirmPassword)){
        $userconfirmPasswordErr = "confirom password is required" ;
    }
   else{
    if($userConfirmPassword != $userPassword){
        $userConfirmPasswordErr = "password not match" ;
    }
  }

  if(empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userconfirmPasswordErr)){

  $query = $pdo->prepare("insert into users(name ,email,password)values (:uName , uEmail , uPassword)");
  $query->bindparam('uName',$userName);
  $query->bindparam('uEmail',$userEmail);
  $query->bindparam('uPassword',$userPassword);
  $query->execute();
  echo "<script>alert('user added');location.assign('register.php')</sccript>";
  
}

}
// user login
if(isset($_POST['userLogin'])){
    $userEmail=$_POST['uEmail'];
    $userPassword=$_POST['uPassword'];
    if(empty($userEmail)){
        $userEmailErr="Email is required";

    }
    else{
        $query = $pdo->prepare("select * from users where email= :uEmail");
        $query->bindparam('uEmail',$userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user){
            if($user['password']==$userPassword){
                if($user['role_id']==1){
                    $_SESSION['adminId'] = $user['id'];
                    $_SESSION['adminEmail'] = $user['email'];
                    $_SESSION['adminName'] = $user['name'];
                    $_SESSION['adminrole'] = $user['role_id'];
                    echo "<script>location.assign('login.php?success=login successfully user')</script>";
                }
                else if($user['role_id']==2){
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['userEmail'] = $user['email'];
                    $_SESSION['userName'] = $user['name'];
                    $_SESSION['userrole'] = $user['role_id'];

                    echo "<script>location.assign('login.php?success=login successfully user')</script>";
                }
            }
            else{
                $userPasswordErr = "password does not matched";
            }
        }
        else{
            $userEmailErr = "user not found";
        }
    }
    if(empty($userPassword)){
        $userPasswordErr = "password is required";
    }

}
$productName = $productprice = $productDes = $productQuantity = $productImageName = $catergoryId = "" ;
$productNameErr = $productpriceErr = $productDesErr = $productQuantityErr = $productImageNameErr = $catergoryIdErr = "" ;

if(isset($_POST['addproduct'])){
    
}
if(isset($_POST['addproduct'])){
    $productName=$_POST['pName'];
    $productPrice=$_POST['pPrice'];
    $productQuantity=$_POST['pQuantity'];
    $prdoductDes=$_POST['pDes'];
    $catergoryId=$_POST['cId'];
    $productImageName=$_FILES['pImage'];
    $productImageTmpName=$_FILES['pImage']['tmp_name'];
    $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
    $destination = "images/".$productImageName;

    if(empty($productName)){
        $productNameErr="name is required";
    }
    if(empty($productPrice)){
        $prdoductpriceErr = "price is required" ;
    }
    
    if(empty($productDes)){
        $productDesErr = "description is required" ;
    }
    if(empty($productQuantity)){
        $productQuantityErr = "Quantity is required" ;
    }
    if(empty($catergoryId)){
        $catergoryIdErr = "ID is required" ;
    }
    if(empty($productImageName)){
        $productaImageNameErr = "Image Name is required" ;
    }
    else{
        $format = ["jpg","png","jpeg","webp"];
        if(!in_array($extension,$format)){
            $productNameErr = "Invalid Extension";
        }
    }

    if(empty($productNameErr) && empty($productpriceErr) && empty($productDesErr) && empty($productQuantityErr && empty($catergoryIdErr) &&  empty($productImageNameErr) )){
        if(move_uploaded_file($prdoductImageTmpName,$destination)){
            $query = $pdo->prepare("insert into products(name,price,qty,description,image,c_id) values (:name, :price, :qty, :description, :image :c_id)");
        }
        $query->bindparam('name',$productName);
        $query->bindparam('price',$prdoductPrice);
        $query->bindparam('description',$productDes);
        $query->bindparam('qty',$productQuantity);
        $query->bindparam('c_id',$catergoryId);
        $query->bindparam('image',$productaImageName);
        $query->execute();
        echo "<script>alert('product added');location.assign('viewproducts.php')</script>";
        
    } 
    
}
    
?>