<?php

// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ Q1 - Q4 2008
// Owner:		eGenerations Network, Inc. | syntheticMagic Advanced Business Services
// Client:	SM
// Class:		session
// Version:	Release 1.1
// Method:	example()
// Purpose:	Create Session for Users
// Usage:		

//					Instantiate ----------------------------------------------------------------------
//         	

//					Execute example() Method with $x (array) parameter (Examples @ base of file)
//					
//					
//					
//					
// --------------------------------------------------------------------------------------------------------------------------------


class baseCrypto {



	// properties ---------------------------------------------------------
	protected	$salt;
	protected $iv;
	protected $iv_size;

	private		$_action;
	private		$_cipherTextCopy;
	private		$_hex2BinInput;
	
	public		$cypherType;
	public		$cypherMode;

	public 		$passPhrase;
	public		$key;
	public		$plainText;
	public		$cipherText;
	public		$decryptedText;
	public		$DecryptIt;
	



	// constructor method -------------------------------------------------
	public function __construct(){
		$this->salt='abcdefghjkmnpqrstuvwxyz0123456789';
	}
	// --------------------------------------------------------------------

	// destructor method --------------------------------------------------
	public function __destruct(){
		unset($this->salt);
	}
	// --------------------------------------------------------------------


	// hex2bin func -------------------------------------------------------
	private function hex2bin($input){

		$this->_hex2BinInput = $input;
		$len = strlen($input); 

  	return @pack("H" . $len, $this->_hex2BinInput);
	}
	// --------------------------------------------------------------------


	// cipher type method -------------------------------------------------
	public function cipherType($cipherTypeInput){
		
		$this->cipherType = $cipherTypeInput;
		
		if($this->cipherType == 1){
			$this->cipherType = MCRYPT_TWOFISH;

		}elseif($this->cipherType == 2){
			$this->cipherType = MCRYPT_RIJNDAEL_256;
			
		}elseif($this->cipherType == 3){
			$this->cipherType = MCRYPT_3DES;
		}

	}
	// --------------------------------------------------------------------


	// cipher mode method -------------------------------------------------
	public function cipherMode($cipherModeInput){
		
		$this->cipherMode = $cipherModeInput;
		
		if($this->cipherMode == 1){
			$this->cipherMode = MCRYPT_MODE_ECB;

		}elseif($this->cipherMode == 2){
			$this->cipherMode = MCRYPT_MODE_CBC;

		}elseif($this->cipherMode == 3){
			$this->cipherMode = MCRYPT_MODE_CFB;
		}


	}
	// --------------------------------------------------------------------


	// IV config method ---------------------------------------------------
	private function ivConfig(){
		
   	// IV config --------------------------------------------------------
		$this->iv_size 	= mcrypt_get_iv_size($this->cipherType, $this->cipherMode);
		$this->iv 			= mcrypt_create_iv($this->iv_size, MCRYPT_RAND);

	}
	// --------------------------------------------------------------------


	// action method ------------------------------------------------------
	private function action($actionInput){
		
		$this->_action = $actionInput;
		
		if($this->_action == 1){
			//encrypt ---------------------------------------------------------
			$this->cipherText = mcrypt_encrypt($this->cipherType, $this->key, $this->plainText, $this->cipherMode, $this->iv);



		}elseif($this->_action == 2){
			//decrypt ---------------------------------------------------------
			$this->decryptedText = mcrypt_decrypt($this->cipherType, $this->key, $this->hex2bin($this->DecryptIt), $this->cipherMode, $this->iv);
		}

	}
	// --------------------------------------------------------------------



	// encrypt method------------------------------------------------------
	protected function encrypt(){
		$this->cipherType($this->cipherType);
		$this->cipherMode($this->cipherMode);
		$this->ivConfig();
		$this->action(1);
	}
	// --------------------------------------------------------------------


	// decrypt method------------------------------------------------------
	protected function decrypt(){
		$this->cipherType($this->cipherType);
		$this->cipherMode($this->cipherMode);
		$this->ivConfig();
		$this->action(2);
	}
	// --------------------------------------------------------------------


	// display cipherText method-------------------------------------------
	public function DisplayCipherText(){
		$this->encrypt();
		echo $this->cipherText;
	}
	// --------------------------------------------------------------------


	// display HEX cipherText method---------------------------------------
	public function DisplayHexCipherText(){
		$this->encrypt();
		echo bin2hex($this->cipherText);
	}
	// --------------------------------------------------------------------


	// return HEX cipherText method---------------------------------------
	public function ReturnHexCipherText(){
		$this->encrypt();
		return bin2hex($this->cipherText);
	}
	// --------------------------------------------------------------------


	// display decrypted text method---------------------------------------
	public function DisplayDecryptedText(){
		$this->decrypt();
		
		return trim($this->decryptedText);
	}
	// --------------------------------------------------------------------


	// return decrypted text method---------------------------------------
	public function ReturnDecryptedText(){
		$this->decrypt();

		return trim($this->decryptedText);
	}
	// --------------------------------------------------------------------



}





// .................................................... CORE PARTITION ..........................................







// ===========================================================================================
/*
$encryptObj	=	new baseCrypto;
//$sObj				=	serialize($encryptObj);
//$sObj				=	unserialize($sObj);

$encryptObj->cipherType = 2;			//	1 = TwoFish	2 = Rijndael	3 = DES
$encryptObj->cipherMode = 1;			//	1 = ECB	    2 = CBC				3 = CFB
$encryptObj->passPhrase = 'this is the passphrase';
$encryptObj->key 				= 'abc123';
$encryptObj->plainText 	= 'the secret message';

  // Encryption Segment -------------------------------------------------------
  //$encryptObj->DisplayCipherText();
  $encryptObj->DisplayHexCipherText();
  
  // Decryption Segment -------------------------------------------------------
  //$encryptObj->DecryptIt	=	'f64a7b7e1d3743488464e417f504b36dc58ed78762eb15707445aa4bf55d1205'; // TwoFish 1	|	ECB 1
  $encryptObj->DecryptIt	=	'e1ae7f98207d4e784bd1dde3e8bc71df6256e9770975287ede378a6e20cdfdb5'; // Rijndael 2	|	ECB 1
  //$encryptObj->DecryptIt	=	'99774fafbe2a7e91263d5c74e1e33ef60b0b3ac5c911e9d5'; 								// DES 3			|	ECB 1
	$encryptObj->DisplayDecryptedText()
// ===========================================================================================

*/

?>