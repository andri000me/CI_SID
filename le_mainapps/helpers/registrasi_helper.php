<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_regkode'))
{
	function get_regkode($length=32){
		$final_rand='';
		for($i=0;$i< $length;$i++)
		{
			$final_rand .= rand(0,9);
	 
		}
		return $final_rand;
	}
}

