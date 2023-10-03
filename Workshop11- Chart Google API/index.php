<!DOCTYPE html>
<?php
 $connect = mysqli_connect("localhost", "root", "", "testing");
 $query = "SELECT language, count(*) as number FROM like_table GROUP BY language";
 $result = mysqli_query($connect, $query);
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pie Chart Google API</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
           function drawChart()
           {
                var data = google.visualization.arrayToDataTable([
                          ['language', 'number'],
                        <?php
                         while($row = mysqli_fetch_array($result))
                         {
                              echo "['".$row["language"]."', ".$row["number"]."],";
                         }
                         ?>
                ]);

                var options = {
                      title: 'Poll Programming Language',
                      is3D:false,
                      pieHole: 0.5
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
           }
 </script>
  </head>
  <body>
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
        <div id="piechart" style="width:800px;height:450px"></div>
  </body>
  <script type="text/javascript">
      $(document).ready(function(){
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
                       var options = {
                             title: 'Poll Programming Language',
                             is3D:false,
                             pieHole: 0.5
                       };
                       var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                       chart.draw(data, options);
                      }
                   });
                }
            });
      });
  </script>
</html>
