<?



function countryConv($country){

//Check for Content Image
	$query 				= mysql_query("SELECT geocode.country FROM geocode WHERE geocode.countrycode = '$country'") or die('Error: Query Failed');
	$num					=	mysql_num_rows($query);
	$countryname	=	mysql_result($query,0,"geocode.country");
	
	if($num == 0){
		$countryname = 'Far Far Away';
	}
	
	return ucwords($countryname);
}



/*

// ############ COUNTRY CONVERTER
function countryConvd($country){

//1
	if($country=='PH'){
		$countryname='Phillipines';
//2
	}elseif($country=='US'){
		$countryname='United States';
//3
	}elseif($country=='CA'){
		$countryname='Canada';
//4
	}elseif($country=='UK'){
		$countryname='England';
//5
	}elseif($country=='AU'){
		$countryname='Australia';
//5
	}elseif($country=='DK'){
		$countryname='Denmark';
//5
	}elseif($country=='IL'){
		$countryname='Israel';
//5
	}elseif($country=='IN'){
		$countryname='India';
//5
	}elseif($country=='GH'){
		$countryname='Ghana';
//5
	}elseif($country=='GM'){
		$countryname='Gambia';
//5
	}elseif($country=='AT'){
		$countryname='Austria';
//5
	}elseif($country=='FI'){
		$countryname='Finland';
//5
	}elseif($country=='NZ'){
		$countryname='New Zealand';
//5
	}elseif($country=='RU'){
		$countryname='Russia';
//5
	}elseif($country=='IE'){
		$countryname='Ireland';
//5
	}elseif($country=='ES'){
		$countryname='Spain';
//5
	}elseif($country=='ZA'){
		$countryname='South Africa';
//5
	}elseif($country=='NL'){
		$countryname='Netherlands';
//5
	}elseif($country=='CI'){
		$countryname='Cote DIvoire';
//5
	}elseif($country=='SI'){
		$countryname='Slovenia';
//5
	}elseif($country=='ER'){
		$countryname='Eritrea';
//5
	}elseif($country=='LK'){
		$countryname='Sri Lanka';
//5
	}elseif($country=='UG'){
		$countryname='Uganda';
//5
	}elseif($country=='ZW'){
		$countryname='Zimbabwe';
//5
	}elseif($country=='TT'){
		$countryname='Trinidad Tobago';
//5
	}elseif($country=='CN'){
		$countryname='China';
//5
	}elseif($country=='JM'){
		$countryname='Jamaica';

	}elseif($country=='SA'){
		$countryname='Saudi Arabia';

	}elseif($country=='PK'){
		$countryname='Pakistan';

	}elseif($country=='DE'){
		$countryname='Germany';

	}elseif($country=='ID'){
		$countryname='Indonesia';

	}elseif($country=='SE'){
		$countryname='Sweden';

	}elseif($country=='CH'){
		$countryname='Switzerland';

	}elseif($country=='PT'){
		$countryname='Portugal';		

	}elseif($country=='IT'){
		$countryname='Italy';

	}elseif($country=='MX'){
		$countryname='Mexico';		

	}elseif($country=='UZ'){
		$countryname='Uzbekistan';		

	}elseif($country=='NG'){
		$countryname='Nigeria';		

	}elseif($country=='EE'){
		$countryname='Estonia';		

	}elseif($country=='BE'){
		$countryname='Belgium';		

	}elseif($country=='HU'){
		$countryname='Hungary';

	}elseif($country=='HK'){
		$countryname='Hong Kong';

	}elseif($country=='FR'){
		$countryname='France';

	}elseif($country=='AE'){
		$countryname='United Arab Emir';

	}elseif($country=='BR'){
		$countryname='Brazil';


	}else{
		$countryname='undefined';
	}
	return $countryname;
}

*/
?>