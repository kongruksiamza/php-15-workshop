<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Report Morris-Chart</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
  </head>
  <body>
        <div class="container">
          <h3>สถิติการขายสินค้า</h3>
          <div id="chart1"></div>
          <div id="chart2"></div>
          <div id="chart3"></div>
        </div>

        <?php
          $connect=mysqli_connect("localhost","root","","testing");
          $query="select * from account";
          $result=mysqli_query($connect,$query);
          $chart_data='';
          while ($row=mysqli_fetch_array($result)) {
            $chart_data.="{
                year:'".$row['year']."',
                profit:'".$row['profit']."',
                purchase:'".$row['purchase']."',
                sale:'".$row['sale']."'
            },";
          }
        ?>
  </body>
  <script type="text/javascript">
      Morris.Line({
        element:'chart1',
        data:[<?php echo $chart_data; ?>],
        xkey:'year',
        ykeys:['profit','purchase','sale'],
        labels:['กำไร','การซื้อ','การขาย'],
      });
      Morris.Bar({
        element:'chart2',
        data:[<?php echo $chart_data; ?>],
        xkey:'year',
        ykeys:['profit','purchase','sale'],
        labels:['กำไร','การซื้อ','การขาย'],
    });
    Morris.Area({
      element:'chart3',
      data:[<?php echo $chart_data; ?>],
      xkey:'year',
      ykeys:['profit','purchase','sale'],
      labels:['กำไร','การซื้อ','การขาย'],
  });
  </script>
</html>
