<?php
	// class UtilFunctions {
	// 	public static function random_min_max($min,$max){
	// 		return rand($min,$max);
	// 	}
	// 	public static function range_min_max($min,$max,$n){
	// 		$result = array();
	// 		$i = 0 ;
	// 		for($i ; $i < $n ; $i++){
	// 			$result[$i] = rand($min,$max);
	// 		}
	// 		return $result;
	// 	}
	// 	public static function get_client_ip() {
	// 		$ipaddress = '';
	// 		if (isset($_SERVER['HTTP_CLIENT_IP']))
	// 			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	// 		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	// 			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	// 		else if(isset($_SERVER['HTTP_X_FORWARDED']))
	// 			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	// 		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	// 			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	// 		else if(isset($_SERVER['HTTP_FORWARDED']))
	// 			$ipaddress = $_SERVER['HTTP_FORWARDED'];
	// 		else if(isset($_SERVER['REMOTE_ADDR']))
	// 			$ipaddress = $_SERVER['REMOTE_ADDR'];
	// 		else
	// 			$ipaddress = 'UNKNOWN';

	// 		return $ipaddress;
	// 	}
	// }
	function random_min_max($min,$max){
		return rand($min,$max);
	}
	function range_min_max($min,$max,$n){
		$result = array();
		$i = 0 ;
		for($i ; $i < $n ; $i++){
			$result[$i] = rand($min,$max);
		}
		return $result;
	}
	function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';

		return $ipaddress;
	}
?>