<?php

// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ Q1 - Q4 2008
// Owner:		eGenerations Network, Inc. | syntheticMagic Advanced Business Services
// Client:	SM
// Class:		session
// Version:	Release 2.1
// Method:	example()
// Purpose:	Create mySQL Database Connection
// Usage:		

//					Instantiate ----------------------------------------------------------------------
//         	

//					Execute example() Method with $x (array) parameter (Examples @ base of file)
//					
//					
//					
//					
// --------------------------------------------------------------------------------------------------------------------------------



// INTERFACE ===========================================================================================================

interface dbInterface {
	
	//public function Connect();
	public function Connect($db_operation = 0, $Property_or_DatabaseName = null);

}






// START OF CLASS ======================================================================================================

//class db implements dbInterface {
class db {


// PROPERTIES ----------------------------------------------------------------------------


	// external communication ==========================================

	public	$db_name				= null;
	public	$db_host				= null;
	public	$db_username		= null;
	public	$db_password		= null;

	// internal operations =============================================
	private	$db_connection	= null;
	private	$db_selected		= null;

	
	










// METHODS -------------------------------------------------------------------------------


	// CONSTRUCTOR =====================================================
	public function __construct(){

		$this->db_name				= null;
		$this->db_host				= null;
		$this->db_username		= null;
		$this->db_password		= null;

		$this->db_connection	= null;
		$this->db_selected		= null;

	}
	// =================================================================


	// DESTRUCTOR ======================================================
	public function __destruct(){

		unset($this->db_name);
		unset($this->db_host);
		unset($this->db_username);
		unset($this->db_password);

		unset($this->db_connection);
		unset($this->db_selected);

	}
	// =================================================================






	// pMETHOD :: _fDatabase_Connection_Create =========================
  private function _fDatabase_Connection_Create(){
		$this->db_connection	= mysql_connect($this->db_host, $this->db_username, $this->db_password) or die ('Error: DB CONNECTION');
  }
	// =================================================================





	// pMETHOD :: _fDatabase_Selection =================================
  private function _fDatabase_Selection(){

		$this->db_selected		= mysql_select_db($this->db_name, $this->db_connection) or die ('Error: DB NOT SELECTED');

  }
	// =================================================================





	// METHOD :: Close =================================================
  public function Close(){

		@mysql_close($this->db_connection);
		$this->__destruct();

  }
	// =================================================================




/*
DEP.09.10.09.n8

	// METHOD :: fNameHere =============================================
	public function Connect($db_operation = 0, $Property = null){
		// 0 = Write Operation
		// 1 = Read Operation

  	$confXML				= '/var/www/vhosts/dbconf/db.conf';
 		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** BASE XML File Not Loaded  **");


		// per property database resource data ---------
		if($Property != null){

    	//Parse XML ----------------------------------
    	foreach($_baseXMLConn as $resource){
     		if($resource->Name == $Property){
       		$this->db_host 			= $resource->Location;
       		$this->db_name 			= $resource->SpecificName;
       		$this->db_username  = $resource->Login;
       		$this->db_password	= $resource->Pass;
       	}
    	}
  		// -------------------------------------------
			
		}else{

    	//Parse XML ----------------------------------
    	foreach($_baseXMLConn as $resource){
    		if($resource->Name == $_SERVER[HTTP_HOST]){
       		$this->db_host 			= $resource->Location;
       		$this->db_name 			= $resource->SpecificName;
       		$this->db_username  = $resource->Login;
       		$this->db_password	= $resource->Pass;
    		}
    	}
  		// -------------------------------------------
			
		}
		// -------------------------------------------



		$this->_fDatabase_Connection_Create();
		$this->_fDatabase_Selection();

	}
	// =================================================================
*/








	// METHOD :: fNameHere =============================================
	public function Connect($db_operation = 0, $Property_or_DatabaseName = null){
		// 0 = Write Operation
		// 1 = Read Operation



		// www subdomain fix -------------------------
    $r = explode('.', $_SERVER[HTTP_HOST]);
    if(count($r) > 2){
    	$_SERVER[HTTP_HOST] = $r[1].'.'.$r[2];
    }
    // -------------------------------------------




  	$confXML				= '/var/www/vhosts/dbconf/db.conf';
 		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** BASE XML File Not Loaded  **");


		// per property database resource data ---------
		if($Property_or_DatabaseName != null){

    	//Parse XML ----------------------------------
    	foreach($_baseXMLConn as $resource){
     		if($resource->Name == $Property_or_DatabaseName){
       		$this->db_host 			= $resource->Location;
       		
       		// specific database connection ------------------
       		if($Database != null){
       			$this->db_name 			= $Database;
       		}else{
       			$this->db_name 			= $resource->SpecificName;	
       		}
       		// -----------------------------------------------

       		$this->db_username  = $resource->Login;
       		$this->db_password	= $resource->Pass;
       	}
    	}
  		// -------------------------------------------
			
		}else{

    	//Parse XML ----------------------------------
    	foreach($_baseXMLConn as $resource){
    		if($resource->Name == $_SERVER[HTTP_HOST]){
       		$this->db_host 			= $resource->Location;

       		// specific database connection ------------------
       		if($Database != null){
       			$this->db_name 			= $Database;
       		}else{
       			$this->db_name 			= $resource->SpecificName;	
       		}
       		// -----------------------------------------------

       		$this->db_username  = $resource->Login;
       		$this->db_password	= $resource->Pass;
    		}
    	}
  		// -------------------------------------------
			
		}
		// -------------------------------------------



		$this->_fDatabase_Connection_Create();
		$this->_fDatabase_Selection();

	}
	// =================================================================








  // METHOD :: Sanitize Input ----------------------------------------
  public function sanitize($request){

    $unclean 	= strtolower($request);
    $clean 		= mysql_real_escape_string(strip_tags($unclean));
  	$blklist	= array('%','!','@','#','$','^','*','(',')','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','~','`','=');
  	$clean 		= str_replace($blklist, '', $clean);
  
  	// report ----------------------------
    if($clean == $unclean){
      return $request;
    }else{
      return false;
    }
  	// end report ------------------------

  }
  // -----------------------------------------------------------------









	// METHOD :: Select R2 ---------------------------------------------
	public function select_($str){
		$qry = mysql_query($str);	
		$result = '';
		$i = 0;
		if($qry != '')
		while($row = mysql_fetch_object($qry)) {
			foreach($row as $x=>$y){
				$result[$i][$x] = "$y";
			}
			$i++;
		}
		return $result;
	}
	// -----------------------------------------------------------------
	
	
	
	
	
	
	
	
	
	
	
	// METHOD :: fNameHere =============================================
	public function select($_query){

		$sql_query			= mysql_query($_query);
		$sql_obj_result	=	mysql_fetch_object($sql_query);

	
		return $sql_obj_result;
	}


// END OF METHODS ------------------------------------------------------------------------


}
// END OF CLASS ========================================================================================================






















// Example Arrays for Testing Usage ====================================================================================


/*



*/

?>