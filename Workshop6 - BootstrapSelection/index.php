<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Multiple Selection</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  </head>
  <body>
        <div class="container">
            <br />
            <h2>Bootstrap Multiple Selection | Bootstrap Selection</h2>
            <br />
            <div class="col-md-4" style="margin-left:200px;">
            <form method="post" name="form" id="form">
                <select name="framework" id="framework" class="form-control selectpicker" multiple>
                    <option value="Laravel">Laravel</option>
                    <option value="Symfony">Symfony</option>
                    <option value="Codeigniter">Codeigniter</option>
                    <option value="CakePHP">CakePHP</option>
                    <option value="Zend">Zend</option>
                    <option value="Yii">Yii</option>
                    <option value="Slim">Slim</option>
                </select>
            <br /><br />
            <input type="submit" name="submit" class="btn btn-info" value="Submit" />
            </form>
            <br />
          </div>
      </div>
      <script type="text/javascript">
          $(document).ready(function(){
                $('#form').on('submit',function(){
                      var data=$(this).serialize();
                      alert(data);
                });
          });
      </script>
  </body>
</html>
