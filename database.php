<?php

 function getDatabaseConnection(){
 				define("HOST", "localhost");
 				define("USERNAME", "root");
 				define("PASSWORD", "");
 				define("DATABASENAME", "angulardatabase");

 		$connectQuery = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASENAME);
 		
 		return $connectQuery;
 	}  
?>



