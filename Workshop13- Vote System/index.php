<!DOCTYPE html>
<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
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
$data = json_encode($data);
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Vote System</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
  </head>
  <body>
    <br/><br/>
    <div class="container">
      <form class="form-group" id="like_form" method="post">
          <div class="form-group">
              <label>Vote Programming Language</label>
               <div class="radio">
                <label><input type="radio" name="language" value="C#" />C#</label>
               </div>
               <div class="radio">
                <label><input type="radio" name="language" value="JAVA" />JAVA</label>
               </div>
               <div class="radio">
                <label><input type="radio" name="language" value="PHP" />PHP</label>
               </div>
               <div class="radio">
                <label><input type="radio" name="language" value="GO" />GO</label>
               </div>
               <div class="radio">
                <label><input type="radio" name="language" value="JavaScript" /> JavaScript</label>
               </div>
              <div class="form-group">
               <input type="submit" name="like" class="btn btn-info" value="Vote" />
              </div>
              <div id="chart"></div>
          </div>
      </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
          var donut=Morris.Donut({
                element:'chart',
                data:<?php echo $data; ?>
          });
          $('#like_form').on('submit',function(event){
                  event.preventDefault();
                  var checked = $('input[name=language]:checked','#like_form').val();
                  if(checked == undefined){
                     alert("Please Like any Language");
                     return false;
                  }else{
                     var form_data = $(this).serialize();
                     $.ajax({
                        url:"action.php",
                        method:"POST",
                        data:form_data,
                        dataType:"json",
                        success:function(data){
                         $('#like_form')[0].reset();
  			                  console.log(data);
                          donut.setData(data);
                        }
                     });
                  }
              });
        });
    </script>
  </body>
</html>
