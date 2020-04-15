<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('format_rp'))
{
	function format_rp($angka)
	{
		$rupiah=number_format($angka,0,',','.').",-";
  		return $rupiah;
	}
}
