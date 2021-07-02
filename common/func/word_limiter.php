<?php



function word_limiter($str, $n, $end_char = '…'){

  if(strlen($str) < $n){
		return $str;
	}

  $words = explode(' ', preg_replace("/\s+/", ' ', preg_replace("/(\r\n|\r|\n)/", " ", $str)));   
     
  if(count($words) <= $n){   
		return $str;
  }

  $str = '';   
  for ($i = 0; $i < $n; $i++){   
		$str .= $words[$i].' ';   
  }

 return trim($str).$end_char;
}






function word_limiter_clean($str, $n, $end_char = ''){   
  if (strlen($str) < $n){
		return $str;
	}

  $words = explode(' ', preg_replace("/\s+/", ' ', preg_replace("/(\r\n|\r|\n)/", " ", $str)));   
     
  if (count($words) <= $n){   
		return $str;
  }

  $str = '';   
  for ($i = 0; $i < $n; $i++){   
		$str .= $words[$i].' ';   
  }
 return trim($str).$end_char;   
}

?>