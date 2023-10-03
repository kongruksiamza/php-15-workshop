<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Load Data Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
      <div class="container">
          <h2 align="center">Load Data : AJAX</h2>
          <div id="load_data"></div>
          <div id="load_message"></div>
      </div>
      <script type="text/javascript">
            var limit=3;
            var start=0;
            var action="inactive";
            function load_data(limit,start){
                $.ajax({
                    url:"fetch.php",
                    method:"post",
                    data:{limit:limit,start:start},
                    success:function(data){
                      $('#load_data').append(data);
                        if(data==''){
                            $('#load_message').html("<button class='btn btn-danger'>No Data</button>");
                            action="active";
                        }else{
                          $('#load_message').html("<button class='btn btn-success'>Please Wait...</button>");
                            action="inactive";
                        }
                    }
                });
            }
            if(action=="inactive"){
                action="active";
                load_data(limit,start);
            }
            $(window).scroll(function(){
                if($(window).scrollTop()+$(window).height()>$("#load_data").height() && action=="inactive"){
                      action="active";
                      start=start+limit;
                      setTimeout(function(){
                          load_data(limit,start);
                      },1000);
                }
            });
      </script>
  </body>
</html>
