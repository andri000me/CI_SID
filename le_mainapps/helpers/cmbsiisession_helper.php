<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('set_defidk'))
{		
	function set_defidk($id){
		$CI =& get_instance();
		$CI->session->set_userdata(array('cmbsii_set_idk'=>$id));
	}
}

if ( ! function_exists('set_defnpm'))
{		
	function set_defnpm($pm){
		$CI =& get_instance();
		$CI->session->set_userdata(array('cmbsii_set_npm'=>$pm));
	}
}

if ( ! function_exists('get_defnpm'))
{		
	function get_defnpm(){
		$CI =& get_instance();
		return $CI->session->userdata("cmbsii_set_npm");
	}
}

if ( ! function_exists('set_defujk'))
{		
	function set_defujk($ujk){
		$CI =& get_instance();
		$CI->session->set_userdata(array('cmbsii_set_ujk'=>$ujk));
	}
}

if ( ! function_exists('get_defujk'))
{		
	function get_defujk(){
		$CI =& get_instance();
		return $CI->session->userdata("cmbsii_set_ujk");
	}
}

if ( ! function_exists('set_kduj'))
{		
	function set_kduj($id){
		$CI =& get_instance();
		$CI->session->set_userdata(array('cmbsii_set_kduj'=>$id));
	}
}

if ( ! function_exists('get_kduj'))
{		
	function get_kduj(){
		$CI =& get_instance();
		return $CI->session->userdata("cmbsii_set_kduj");
	}
}

if ( ! function_exists('set_mu'))
{		
	function set_mu($id){
		$CI =& get_instance();
		$CI->session->set_userdata(array('cmbsii_set_mu'=>$id));
	}
}

if ( ! function_exists('get_mu'))
{		
	function get_mu(){
		$CI =& get_instance();
		return $CI->session->userdata("cmbsii_set_mu");
	}
}

if ( ! function_exists('get_fak'))
{		
	function get_fak(){
		$CI =& get_instance();
		return $CI->session->userdata('cmbsii_set_fak');
	}
}

if ( ! function_exists('get_kdprodi'))
{		
	function get_kdprodi(){
		$CI =& get_instance();
		return $CI->session->userdata('cmbsii_set_kdprodi');
	}
}

if ( ! function_exists('set_error'))
{		
	function set_error($error){
		$CI =& get_instance();
		$CI->session->set_flashdata('error', $error);
	}
}

if ( ! function_exists('get_error'))
{		
	function get_error(){
		$CI =& get_instance();
		return $CI->session->flashdata('error');
	}
}

if ( ! function_exists('get_logusr'))
{
	function get_logusr(){
		$CI =& get_instance();
		$usr = $CI->user_m->get_UserLog();
		return $usr->row();
	}
}