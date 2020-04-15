<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('rdmstr'))
{
	function rdmstr($length=16){
		$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
		$final_rand='';
		for($i=0;$i<$length; $i++)
		{
			$final_rand .= $chars[ rand(0,strlen($chars)-1)];
	 
		}
		return $final_rand;
	}
}

if ( ! function_exists('rdmudh'))
{
	function rdmudh($length=15){
		$chars ="ABCDEF123456789";
		$final_rand='';
		for($i=0;$i<$length; $i++)
		{
			$final_rand .= $chars[ rand(0,strlen($chars)-1)];
	 
		}
		return $final_rand;
	}
}

if ( ! function_exists('rdmnbr'))
{
	function rdmnbr($length=32){
		$final_rand='';
		for($i=0;$i< $length;$i++)
		{
			$final_rand .= rand(0,9);
	 
		}
		return $final_rand;
	}
}

if ( ! function_exists('gr_encrypt'))
{
	function gr_encrypt($str){
		$temp = false;
		for($i=0; $i<strlen($str); $i++){
		  $temp .= rdmstr(2).$str[$i];
		}
		return $temp;
	}
}

if ( ! function_exists('gr_decrypt'))
{
	function gr_decrypt($str){
		$temp = false;
		for($i=0; $i<strlen($str); $i++){
		  for($j=1;$j<=2;$j++)$i++;
		  $temp .= $str[$i];
		}
		return $temp;
	}
}



