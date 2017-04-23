<?php if (!defined('CREXO')) exit('No Trespassing!');

class Encrypt {

	public function lock($value){
		if(!$value) return false;
		$text = $value;
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, PARAM_KEY, $text, MCRYPT_MODE_ECB, $iv);
		return trim(base64_encode($crypttext));
	}

	public function unlock($value){
		if(!$value) return false;
		$value = str_replace(' ','+',$value);
		$crypttext = base64_decode($value);
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, PARAM_KEY, $crypttext, MCRYPT_MODE_ECB, $iv);
		return trim($decrypttext);
	}

}