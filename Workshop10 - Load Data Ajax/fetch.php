<?php
if(isset($_POST['limit'],$_POST['start'])){
    $connect=mysqli_connect("localhost","root","","testing");
    $query="select * from posttable limit ".$_POST['start'].",".$_POST["limit"]."";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result)) {
      echo '<h3>'.$row['title'].'<h3><img src='.$row['img'].' width="350px" height="250px"/><p>'.$row['description'].'</p><hr>';
    }
}
?>
