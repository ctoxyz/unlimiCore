<?
function id2sn($input_id){
	// get Screen Name From ID
	$sql_ownerid2sn	= mysql_query("SELECT users.username FROM users WHERE users.userid='$input_id'") or die (mysql_error());
	return $sn			=	mysql_result($sql_ownerid2sn,0,"users.username");
}
?>