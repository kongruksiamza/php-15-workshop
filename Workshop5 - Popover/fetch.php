<?php
$output='';
$id=$_POST["id"];
$connect = mysqli_connect("localhost", "root", "", "testing");
$query = "SELECT * FROM product where product_id=$id";
$result = mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($result)){
    $output = '<p><img src="img/'.$row["product_image"].'" class="img-responsive img-thumbnail" /></p>
                <p><label>Name : '.$row['product_name'].'</label></p>
                <p><label>Price : </label>'.$row['product_price'].'</p>
              ';
  }
echo $output;
?>
