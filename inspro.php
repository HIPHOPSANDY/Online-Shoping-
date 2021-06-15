<?php
if(isset($_POST['ins']))
{
    $host ="localhost";
    $user = "root";
    $password = "";
    $dbname = "sbdb";
    
      
    $con = mysqli_connect($host,$user,$password,$dbname);
    $pname=$_POST['pname'];
    $weight= $_POST['weg'];
    $price = $_POST['price'];
    $img = $_FILES['imge']['name'];
    $dir="product/";
    $dir.=$img;
    $id=$_POST['adid'];
    $cname=$_POST['cname'];
    
    $sql="insert into product(userId,companyName,productName,image,price,wight) values('".$id."','".$cname."','".$pname."','".$dir."','".$price."','".$weight."')";
    $res=mysqli_query($con,$sql);
    if($res)
    {
        if(move_uploaded_file($_FILES['imge']['tmp_name'],$dir)){
        echo "<script> alert('file inserted successfully'); window.location.href='insertpro.php'; </script>";
        }
        else 
            echo "<script>alert('fail image'); window.location.href='insertpro.php'; </script>";
    }
    else
    {
        echo "<script>alert('fail'); </script>";
    }
    
    
}
?>