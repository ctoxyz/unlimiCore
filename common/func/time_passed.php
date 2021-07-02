<?

function time_passed_long($time){  
	$time = time()-$time;  
	$weeks = $time/604800;  
	$days = ($time%604800)/86400;  
	$hours = (($time%604800)%86400)/3600;  
	$minutes = ((($time%604800)%86400)%3600)/60;  
	$seconds = (((($time%604800)%86400)%3600)%60);  

	if(round($weeks)) $timestring = round($weeks)." Week ";  
	if(round($days)) $timestring .= round($days)." Day ";  
	if(round($hours)) $timestring .= round($hours)." Hour ";  
	if(round($minutes)) $timestring .= round($minutes)." Min ";  
	if(!round($minutes)&&!round($hours)&&!round($days)) $timestring .= round($seconds)." Sec ";  

return $timestring;  
}  



function time_passed($time){  
	$time = time()-$time;  
	$weeks = $time/604800;  
	$days = ($time%604800)/86400;  
	$hours = (($time%604800)%86400)/3600;  
	$minutes = ((($time%604800)%86400)%3600)/60;  
	$seconds = (((($time%604800)%86400)%3600)%60);  

	if(round($hours)) $timestring = round($hours)." Hour ";  
	if(round($minutes)) $timestring = round($minutes)." Min ";  
	if(!round($minutes)&&!round($hours)&&!round($days)) $timestring .= round($seconds)." Sec ";  

return $timestring;  
}  



function numdays($time){  
	$time = time()-$time;
	$days = $time/86400;  
	if(round($days)) $timestring = round($days)." Day".($days > 1 ? 's':'');  
return $timestring;  
} 



function ProductExpiration($time){
	$time = $time - time();
	$days = $time/86400;  
	if(round($days)) $timestring .= round($days)." Day".($days > 1 ? 's':'');  
return $timestring;  
} 


function GetAge($TS){
  $ageTime = $TS;
  $t = time();
  $age = ($ageTime < 0) ? ( $t + ($ageTime * -1) ) : $t - $ageTime;
  $year = 60 * 60 * 24 * 365;
  $ageYears = floor($age / $year);
  return $ageYears;
}


function thirty_day_check($time){



	$time 		= time() - $time;  
	$weeks 		= $time/604800;  
	$days 		= $time/86400;  
	$hours 		= (($time%604800)%86400)/3600;  
	$minutes 	= ((($time%604800)%86400)%3600)/60;  
	$seconds 	= (((($time%604800)%86400)%3600)%60);  




	if(round($days) > 30){
		$timestring	= 'Over 30 Days';
	}

	if( (round($days) < 30) && (round($days) > 1)){
		$timestring = round($days)." Days";
	}



	if(round($days) <= 1){

 		if(round($hours) > 1){
 			$timestring = round($hours)." Hours ";
 		}elseif(round($hours) == 1){
			$timestring = round($hours)." Hour ";
		}else{

   		if(round($minutes) > 1 && round($minutes) != 0){
   			$timestring .= round($minutes)." Minutes";
   		}elseif(round($minutes) == 1){
  			$timestring .= round($minutes)." Minute";
  		}
  
   		if(round($minutes) < 1){
   			$timestring .= round($seconds)." Seconds";
   		}
		}
	}


	// if(round($hours)) $timestring = round($hours)." Hour ";  
	// if(round($minutes)) $timestring = round($minutes)." Min ";  
	// if(!round($minutes)&&!round($hours)&&!round($days)) $timestring = round($seconds)." Sec ";  

/*

	$one_day  = 86400;
	$now			= time();

	$numdays	= $time / $one_day;

	if($numdays > ($now - 86400 / $one_day)){
		$timestring = 'Today';

	}elseif($numdays > ($now - 86400 / $one_day)){
  $timestring = 'Yesterday';

  }else{
  $timestring = $time / $one_day.' Days ago';
	}

*/

	$_return = $timestring.' Ago';

return $_return;
}




function three_way($time){

	$time 		= time() - $time;  
	$weeks 		= $time/604800;  
	$days 		= $time/86400;  
	$hours 		= (($time%604800)%86400)/3600;  
	$minutes 	= ((($time%604800)%86400)%3600)/60;  
	$seconds 	= (((($time%604800)%86400)%3600)%60);  


	if( (round($days) > 0) ){
		$timestring = round($days)." Days";
	}


  if( (round($days) < 1) && (round($hours) > 0) ){
  		
   		if( round($hours) > 1 ){
   			$timestring = round($hours)." Hours ";
   		}elseif( round($hours) == 1){
  			$timestring = round($hours)." Hour ";
  		}
	}


  if( (round($days) < 1) && (round($hours) < 1) && (round($minutes) > 0) ){

   	if( round($minutes) > 1 ){
   			$timestring = round($minutes)." Minutes";
   		}elseif( round($minutes) == 1){
  			$timestring = round($minutes)." Minute";
  		}
	}

	if(!$timestring){
		$timestring = 'Seconds';
	}
return $timestring.' Ago';
}



function three_way_reduced($time){

	$time 		= time() - $time;  
	$weeks 		= $time/604800;  
	$days 		= $time/86400;  
	$hours 		= (($time%604800)%86400)/3600;  
	$minutes 	= ((($time%604800)%86400)%3600)/60;  
	$seconds 	= (((($time%604800)%86400)%3600)%60);  


	if( (round($days) > 0) ){
		$timestring = round($days)." Days";
	}


  if( (round($days) < 1) && (round($hours) > 0) ){
  		
   		if( round($hours) > 1 ){
   			$timestring = round($hours)." Hours ";
   		}elseif( round($hours) == 1){
  			$timestring = round($hours)." Hour ";
  		}
	}


  if( (round($days) < 1) && (round($hours) < 1) && (round($minutes) > 0) ){

   	if( round($minutes) > 1 ){
   			$timestring = round($minutes)." Mins";
   		}elseif( round($minutes) == 1){
  			$timestring = round($minutes)." Min";
  		}
	}

	if(!$timestring){
		$_return = 'Right Now';
	}else{
		$_return = $timestring.' Ago';
	}
	

return $_return;
}



function ts2month($timestamp){
	
	$_return	=	null;
	
	$_return	=	date('j', $timestamp);
	
	return $_return;
}


?>