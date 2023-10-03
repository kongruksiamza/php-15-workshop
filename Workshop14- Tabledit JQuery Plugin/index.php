<!DOCTYPE html>
<?php
  $connect=mysqli_connect("localhost","root","","testing");
  $query="select * from tbl_student";
  $result=mysqli_query($connect,$query);
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Tabledit-JQuery PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="jquery.tabledit.js"></script>
  </head>
  <body>
    <br/><br/>
      <div class="container">
        <h2 align="center">Student Database</h2>
        <table id="edit_table" class="table table-bordered">
              <thead>
                <tr>
                  <th width="20%">Id</th>
                  <th width="40%">Name</th>
                  <th width="40%">Phone</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($row=mysqli_fetch_array($result)) {
                    echo '<tr>
                              <td>'.$row['student_id'].'</td>
                              <td>'.$row['student_name'].'</td>
                              <td>'.$row['student_phone'].'</td>
                          </tr>';
                  }
                ?>
              </tbody>
        </table>
  </div>

  <script type="text/javascript">
        $(document).ready(function(){
            $('#edit_table').Tabledit({
                  url:'action.php',
                  columns:{
                    identifier:[0,"student_id"],
                    editable:[[1,'student_name'],[2,'student_phone']]
                  },
                  onSuccess:function(data,textStatus,jqXHR){
                    if(data.action=='delete'){
                      $('#'+data.student_id).remove();
                    }
                  }
                });
          });
  </script>
  </body>
</html>
