<?php
$connect=mysqli_connect("localhost","root","","testing");
$input = filter_input_array(INPUT_POST);
$name=mysqli_real_escape_string($connect,$input['student_name']);
$phone=mysqli_real_escape_string($connect,$input['student_phone']);
if($input["action"]=='edit'){
  $query="update tbl_student set student_name='".$name."' , student_phone='".$phone."' where student_id='".$input['student_id']."'";
  mysqli_query($connect,$query);
}
if($input["action"]=='delete'){
  $query="delete from tbl_student where student_id='".$input['student_id']."'";
  mysqli_query($connect,$query);
}
echo json_encode($input);
?>
