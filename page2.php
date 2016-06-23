<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fly Healthy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <table width="1072"><tr><td width="128"><h1><img src="Logo-copy.jpg" width="125" height="100"  alt=""/></h1></td><td width="932" align ="left" valign="middle"><h1>Fly Healthy</h1></td></tr></table>
  </div>
  <div class="row">
    <div class="col-sm-4">
  <?php    
  //echo (print_r($_POST,true));
  
  include_once ('includes.php');
  include_once('api/flyhealthy.php');      

  $flyhealthy= new flyhealthy();
  global $pdo;
  
  $start=$_POST['depatureAp'];
  $end=$_POST['arrivalAp'];
  $s='17';
  $d='3';
  //$sql=$pdo->prepare('')
  $t=$flyhealthy->getpaths($start,$end);
  
  
  
 ?>       
    </div>
  </div>
</div>

</body>
</html>

