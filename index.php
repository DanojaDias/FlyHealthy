<?php
include_once ('includes.php');
include_once('api/flyhealthy.php');

include ('header.php');


?><div class="container">
  <div class="jumbotron">
    <table width="1072"><tr><td width="128"><h1><img src="Logo-copy.jpg" width="125" height="100"  alt=""/></h1></td><td width="932" align ="left" valign="middle"><h1>Fly Healthy</h1></td></tr></table>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      
      <form id="form1" name="form1" method="post" action="page2.php">
         <table width="511" border="0">
          <tr>
            <td width="101"><label for="select"><h4>From:</h4></label></td>
            <td width="400" align="left">
			<select name="depatureAp" id="depatureAp">;
			<?php
			$sql="SELECT * FROM airport_info";
			$query = $pdo->prepare($sql);
			$query->execute();
			$airportData = $query->fetchAll();
			foreach ($airportData as $row){
				echo '<option value="'.$row['airport_id'].'">'. $row['name'] . '</option>';
			}
			?>
            </select></td> <td width="101"><label for="select"><h4>To:</h4></label></td>
            <td width="400" align="left"><select name="arrivalAp" id="arrivalAp">;
			<?php
			foreach ($airportData as $row){
				echo '<option value="'.$row['airport_id'].'">'. $row['name'] .'</option>';
			}
			?>
            </select></td><td> <button type="submit" class="btn btn-success" on>Go</button></td>
          </tr>
          
        </table>
		
		</form>
<br><table><tr><img src="120726054329-jfk-airport-terminal-horizontal-large-gallery.jpg" width="980" height="552"  alt=""/></tr></table>      
    </div>
  </div>
</div>
<?php
	 $flyhealthy=new flyhealthy();
	  $s="1";
	  $d="19";  
	 list($response) = $flyhealthy->getPossiblePaths($s,$d);
	 foreach($response as $row){
	 echo $row['start'];
	 }

	
	  

include ('footer.php');
?>