<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["language"]))
{
 $query = "
  INSERT INTO like_table (language) VALUES('".$_POST["language"]."')
 ";
 mysqli_query($connect, $query) or die(mysql_error());
 $sub_query = "
 SELECT language, count(*) as number FROM like_table
 GROUP BY language
 ORDER BY id ASC";
 $result = mysqli_query($connect, $sub_query);
 $data = array();
 while($row = mysqli_fetch_array($result))
  {
     $data[] = array(
     'label'  => $row["language"],
     'value'  => $row["number"]
     );
   }
 }
 $data = json_encode($data);
 echo $data;
?>
