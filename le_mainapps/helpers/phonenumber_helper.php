<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('PlusToZero'))
{
	function PlusToZero($no){
		$getplus = substr($no,0,1);
		if($getplus == '+'){
			if(strlen($no)>5){
				$decode = '0'.substr($no,3,12);
				$no = $decode;
			}else $no = substr($no,1,12);
		}
		return $no;
	}
}

if ( ! function_exists('phonenumber_getnameandimg'))
{
	function phonenumber_getnameandimg($no){
		$CI =& get_instance();
		$condmhs['notlp like'] = '%'.$no.'%';
		$d1 = $CI->mhs_m->get_mhs_by($condmhs);
		$condusr['telp like'] = '%'.$no.'%';
		$d2 = $CI->user_m->get_user_by($condusr);
		$condpbk['number like'] = '%'.$no.'%';
		$d3 = $CI->pbk_m->get_pbk_by($condpbk);
		
		$data = array('nama' => false,'img' => 'def_user_picture.jpg','uname' => false);
		if($d1->num_rows()==1){
			$nama = $d1->row()->nama;
			$img = $d1->row()->foto;
			if(!empty($nama))$data['nama'] = $nama;
			if(!empty($img))$data['img'] = $img;
			$data['uname'] = $d1->row()->npm;
		}else
		if($d2->num_rows()==1){
			$nama = $d2->row()->nama;
			$img = $d2->row()->foto;
			if(!empty($nama))$data['nama'] = $nama;
			if(!empty($img))$data['img'] = $img;
			$data['uname'] = $d2->row()->username;
		}else
		if($d3->num_rows()==1){
			$nama = $d3->row()->Name;
			if(!empty($nama))$data['nama'] = $nama;
		}
		
		return $data;
	}
}

