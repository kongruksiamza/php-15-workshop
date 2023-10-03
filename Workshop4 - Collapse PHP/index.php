<!DOCTYPE html>
<?php
$connect=mysqli_connect("localhost","root","","testing");
$query="select * from posttable";
$result=mysqli_query($connect,$query);
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Collapse PHP : Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <br/>
      <div class="container">
          <h3>Collapse PHP</h3>
          <div class="panel-group" id="post">
                <?php
                    while ($row=mysqli_fetch_array($result)) {
                ?>
                <div class="panel panel-default">
                      <div class="panel panel-heading">
                          <h4><a href="#<?php echo $row['id']?>" data-toggle="collapse" data-parent="#post"><?php echo $row['title'];?></a></h4>
                      </div>
                      <div class="panel-collapse collapse" id="<?php echo $row["id"]?>">
                      <div class="panel panel-body">
                            <?php echo $row["description"];?>
                      </div>
                    </div>
                </div>
                <?php
                    }
                ?>
          </div>
      </div>
  </body>
</html>
