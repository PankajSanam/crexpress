<?php if (!defined('CREXO')) exit('No Trespassing!');

class Sms {

	public function dakshinfosoft($mobiles,$message,$user ='git01',$password='123456',$senderid='gitinf'){

		if(!is_array($mobiles))
			$mobiles = $mobiles;
		else
			$mobiles = implode(",",$mobiles);

		$mobiles = preg_replace('/\s+/', '', $mobiles);

		$url = "http://www.dakshinfosoft.com/sendhttp.php?user=".urlencode($user)."&password=".urlencode($password)."&mobiles=".urlencode($mobiles)."&message=".urlencode($message)."&sender=".urlencode($senderid)."&route=template";
		//$url = "http://www.dakshinfosoft.com/sendhttp.php?user=".urlencode('104')."&password=".urlencode('password')."&mobiles=".urlencode('9999999999,919999999999')."&message=".urlencode('message')."&sender=".urlencode('senderid')."&route=template";

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page = curl_exec($ch);
		curl_close($ch);
		return $curl_scraped_page;
	}

}