<!DOCTYPE html>
<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
$query = "SELECT * FROM product order by product_id asc";
$result = mysqli_query($connect, $query);
?>

<html>
     <head>
          <title>Bootstrap Popover</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     </head>
     <body>
          <div class="container" style="width:800px;">
                <h2 align="center">Preview Image | Bootstrap PopOver</h2>
                <h3 align="center">Product Data</h3>
                <br><br>
                <table class="table table-bordered">
                      <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                      </tr>

                      <?php
                        while ($row=mysqli_fetch_array($result)){
                      ?>
                      <tr>
                        <td><?php echo $row["product_id"] ?></td>
                        <td><a href="#" id=<?php echo $row["product_id"] ?> class="hover"><?php echo $row["product_name"] ?></a></td>
                        <td><?php echo $row["product_price"] ?></td>
                      </tr>
                      <?php
                        }
                      ?>
                </table>
          </div>
     </body>
     <script>
          $(document).ready(function(){
                $('.hover').popover({
                      title:fetchData,
                      html:true,
                      placement:'right'
                });
                function fetchData(){
                    var fetch_data='';
                    var element=$(this);
                    var id=element.attr("id");
                    $.ajax({
                          url:"fetch.php",
                          method:"POST",
                          data:{id:id},
                          async:false,
                          success:function(data){
                            fetch_data=data;
                          }
                    });
                    return fetch_data;
                }
          });
     </script>
</html>
