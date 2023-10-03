<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Friend System JQuery Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <br /><br />
      <div class="container" style="width:900px;">
      <h2 align="center">Facebook Friend Search using Ajax JQuery</h2>
      <h3 align="center">Friend Data</h3>
      <br /><br />
      <div align="center">
      <input type="text" name="search" id="search" placeholder="Search Friend Details" class="form-control" />
      </div>
      <ul class="list-group" id="result"></ul>
    <br />
  </div>
  <script type="text/javascript">
          $(document).ready(function(){
            //set event keyup
              $('#search').keyup(function(){
                    $('#result').html('');
                    var txt=$(this).val();
                    var expression=new RegExp(txt,"i");
                    $.getJSON("friend.json",function(data){
                          $.each(data,function(key,value){
                                if(value.name.search(expression)!=-1 || value.location.search(expression)!=-1 ){
                                  $('#result').append('<li class="list-group-item link-class"><img src="'+value.image+'" height="40" width="40" class="img-thumbnail" /> '+value.name+' | <span class="text-muted">'+value.location+'</span></li>');
                                }
                          });
                    });
              });
              $('#result').on('click', 'li', function() {
                var clicktxt = $(this).text().split('|');
                $('#search').val($.trim(clicktxt[0]));
                $("#result").html('');
              });
          });
  </script>
  </body>
</html>
