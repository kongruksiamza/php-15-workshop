<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shake Effect</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <style media="screen">
        #box{
          width:100%;
          max-width: 500px;
          border: 1px solid #ccc;
          border-radius: 5px;
          margin:0 auto;
          padding: 20px;
          box-sizing: border-box;
          height: 250px;
        }
    </style>
  </head>
  <body>
    <br><br>
    <div id="box">
    <form method="post">
        <div class="form-group">
            <label>UserName</label>
            <input class="form-control" type="text" name="username" value="">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" value="">
        </div>
        <div class="form-group">
            <input type="button" class="btn btn-success" id="login" value="Login" name="login" value="">
        </div>
        </form>
      </div>
  </body>
    <script type="text/javascript">
      $(document).ready(function(){
            $('#login').click(function(){
                var options={
                  distance:'40',
                  direction:'left',
                }
                $('#box').effect("shake",options,800);
            });
        });
    </script>
</html>
