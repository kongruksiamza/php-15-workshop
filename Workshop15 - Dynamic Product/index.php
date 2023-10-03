<!DOCTYPE html>
<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
$tab_query = "SELECT * FROM brandproduct ORDER BY brand_id ASC";
$tab_result = mysqli_query($connect, $tab_query);
$tab_menu = '';
$tab_content = '';
$i = 0;
while($row = mysqli_fetch_array($tab_result))
{
 if($i == 0)
 {
  $tab_menu .= '
   <li class="active"><a href="#'.$row["brand_id"].'" data-toggle="tab">'.$row["brand_name"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["brand_id"].'" class="tab-pane fade in active">
  ';
 }else{
  $tab_menu .= '
   <li><a href="#'.$row["brand_id"].'" data-toggle="tab">'.$row["brand_name"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["brand_id"].'" class="tab-pane fade">
  ';
 }
 $product_query = "SELECT * FROM product WHERE brand_id = '".$row["brand_id"]."'";
 $product_result = mysqli_query($connect, $product_query);
 while($sub_row = mysqli_fetch_array($product_result))
 {
  $tab_content .= '
  <div class="col-md-4">
   <img src="img/'.$sub_row["product_image"].'" width="300px" height="250px" class="img-responsive img-thumbnail" />
   <h4>'.$sub_row["product_name"].'</h4>
  </div>
  ';
 }
 $tab_content .= '<div style="clear:both"></div></div>';
 $i++;
}

?>
<html>
 <head>
  <title>Dynamic Product</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">
       <h2 align="center">Dynamic Tab - Dynamic Product</a></h2>
       <br />
       <ul class="nav nav-tabs">
         <?php  echo $tab_menu; ?>
       </ul>
       <div class="tab-content">
       <br />
       <?php  echo $tab_content; ?>
       </div>
      </div>
 </body>
</html>
