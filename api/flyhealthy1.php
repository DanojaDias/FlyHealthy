<?php

class flyhealthy{

	
	public function getdest(){
		   global $pdo;
		   $query=$pdo->query('SELECT * from airport_info');
		   $query->execute();
		   $destination=$query->fetchAll();
		   return $destination;
		   		  
	}
	
	public function destid($name){
		   global $pdo;
		   $query=$pdo->prepare('SELECT airport_id from airport_info WHERE name= ?');
		   $query->bindValue(1,$name);
		   $query->execute();
		   $destination=$query->fetch();
		   return $destination['airport_id'];
		   		  
	}
	
	public function getrows(){
		   global $pdo;
		   $sql = "SELECT count(*) FROM distance"; 
		   $result = $pdo->prepare($sql); 
		   $result->execute(); 
		   $number_of_rows = $result->fetchColumn(); 
		   return $number_of_rows;
		   
	}
	
	public function getPossibleFirstStops($startId){
		   
		   global $pdo;
		   $query=$pdo->prepare('SELECT * from distance where source_airport_id = ?');
		   $query->bindValue(1,$startId);
		   $query->execute();
		   $firstStops=$query->fetchAll();
		   return $firstStops;
	
	}
	
		public function getPossiblePrevStops($destinationId){
		   
		   global $pdo;
		   $query=$pdo->prepare('SELECT * from distance where destination_airport_id = ?');
		   $query->bindValue(1,$destinationId);
		   $query->execute();
		   $prevStops=$query->fetchAll();
		   return $prevStops;
	
	}
	
	public function getPossiblePaths($start, $destinationId){
	
	$response = new array();
	
	$firstStops = $this->getPossibleFirstStops($start);
	$prevStops = this->getPossiblePrevStops($destinationId);
	
	foreach($firstStops as $val){
		if( $val['destination_airport_id'] == $destinationId){
			$path = new array();
			$response = new array();
			$path['start'] = $start;
			$path['end'] = $destinationId;
			$path['distance'] = $val['distance'];
			
			$response[] = $path;
			
			return $response;
		}
		
		foreach($prevStops as $val2){
			
			if($val['destination_airport_id'] == $val2['source_airport_id']){
				$path = new array();
			$path['start'] = $start;
			$path['transit'] = $val2['source_airport_id'];
			$path['end'] = $destinationId;
			$path['distance'] = $val['distance']+$val2['distance'];
			
			$response[] = $path;
			}
			
		}
		
		return $response;
	}
		   
	
	}
	
	public function getpaths($start,$end) {
			 global $pdo;
    		 $sql = 'SELECT source_airport_id, destination_airport_id, distance FROM distance';
    		 	  foreach ($pdo->query($sql) as $row) {
					  echo "<br>";
					  if($start==$row['source_airport_id'] && $end==$row['destination_airport_id']){
						print $row['source_airport_id'] . "\t";
						print $row['destination_airport_id'] . "\t";
						print $row['distance'];
						}
					
					
					else if($start==$row['source_airport_id']){
						  foreach ($pdo->query($sql) as $row1) {
							if($row1['destination_airport_id']==$end && $row['destination_airport_id']==$row1['source_airport_id']){
								 print $row['source_airport_id']."\t";
								 print $row1['source_airport_id']."\t";
								 print $row1['destination_airport_id']."\t";
								 print $row1['distance']+$row['distance']."\n";
							}
						  }			 
        	 
					}			
			}
	}
	
	public function riskall(){
			global $pdo;
			$allpatient=0;
    		 $sql = "SELECT no_of_patient FROM disease";
			 foreach($pdo->query($sql) as $row){
				 $allpatient+=$row['no_of_patient'];
			 }
			 print $allpatient;
			return $allpatient;			
	}
	
	public function risk($airport){
			global $pdo;
			$patient=0;
    		 $sql = "SELECT no_of_patient,airport_id FROM disease";
			 
			 foreach($pdo->query($sql) as $row){
				 if($row['airport_id']==$airport){
					 $patient+=$row['no_of_patient'];
				 }
			 }
			 $all=$this->riskall();
			 print ($patient/$risk)*100;
	}
}