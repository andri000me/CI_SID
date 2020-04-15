<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('encode_url'))
{
	function encode_url($string)
	{
		$key = 'UniversitéTeknokratIndonésie';
		$CI =& get_instance();
		$temp = $CI->encrypt->encode($string,$key);
		return str_replace(array('+'), array('-'), $temp);

	}
}

if ( ! function_exists('decode_url'))
{
	function decode_url($string)
	{
		$key = 'UniversitéTeknokratIndonésie';
		$CI =& get_instance();
		$temp =str_replace(array('-'), array('+'), $string);
		return $CI->encrypt->decode($temp, $key);
	}
}

if ( ! function_exists('encode_config'))
{
	function encode_config($config)
	{
		return base64_encode(serialize($config));
		
	}
}

if ( ! function_exists('decode_config'))
{
	function decode_config($config)
	{
		return unserialize(base64_decode($config));
		
	}
}


    
if ( ! function_exists('encrypt_url'))
{
     function encrypt_url($str) {
		$kunci = 'UniversitéTeknokratIndonésie2oi7';		
		$hasil = '';
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)+ord($kuncikarakter));
			$hasil .= $karakter;
			
		}
		return urlencode(base64_encode($hasil));
	}


}

if ( ! function_exists('decrypt_url'))
{

    function decrypt_url($str) {

		$str = base64_decode(urldecode($str));
		$hasil = '';
		$kunci = 'UniversitéTeknokratIndonésie2oi7';
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)-ord($kuncikarakter));
			$hasil .= $karakter;
			
		}
    return $hasil;
	}
}

function encrypt( $s ) {
    $cryptKey  = 'UniversitéTeknokratIndonésie';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $s, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}
 
function decrypt($s) {
    $cryptKey  = 'UniversitéTeknokratIndonésie';
    $qDecoded  = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $s ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
