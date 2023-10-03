<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM amphur WHERE AMPHUR_NAME_ENG LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["AMPHUR_NAME_ENG"];
 }
 echo json_encode($data);
}
?>
