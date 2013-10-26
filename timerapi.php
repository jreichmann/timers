<?php
	/*
	TimerAPI PHP backend. Queries the SQLite Database and pushes all
	results via JSON.

	  DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
						Version 2, December 2004 

	 Copyright (C) 2004 Sam Hocevar <sam@hocevar.net> 

	 Everyone is permitted to copy and distribute verbatim or modified 
	 copies of this license document, and changing it is allowed as long 
	 as the name is changed. 

				DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
	   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION 

	  0. You just DO WHAT THE FUCK YOU WANT TO.

	*/

	$db=new PDO("sqlite:/var/www/jsontimers/timers.db3");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
	
	$retVal["status"]="ok";
	
	$STMT=$db->query("SELECT * FROM active WHERE 1");
	if($STMT!==FALSE){
		$retVal["timers"]=$STMT->fetchAll(PDO::FETCH_ASSOC);
		$STMT->closeCursor();
	}
	else{
		$retVal["status"]="Failed to create statement";
	}
	
	header("Content-type: application/json");
	print(json_encode($retVal));
?>