<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Auto Complete| TextBox</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  </head>
  <body>
    <br /><br />
      <div class="container" style="width:600px;">
      <h2 align="center">Autocomplete | Typeahead with Ajax PHP</h2>
      <br /><br />
      <label>Search Amphur in Thailand : </label>
      <input type="text" name="country" id="country" class="form-control input-lg" autocomplete="off" placeholder="Amphur Name" />
      </div>
  </body>
      <script>
              $(document).ready(function(){
                    $('#country').typeahead({
                          source:function(query,result){
                              $.ajax({
                                    url:"fetch.php",
                                    method:"post",
                                    data:{query:query},
                                    dataType:"JSON",
                                    success:function(data){
                                        result($.map(data,function(item){
                                              return item;
                                        }));
                                    }
                              });
                          }
                    });
              });
      </script>
</html>
