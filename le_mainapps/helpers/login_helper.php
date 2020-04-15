<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('is_logged_in'))
{		
	function is_logged_in(){
		$CI =& get_instance();
		if($CI->session->userdata("is_logged_in")==false){
			redirect('login');
		}
	}
}



if ( ! function_exists('anyone_there'))
{		
	function anyone_there(){
		$CI =& get_instance();
		if($CI->session->userdata("sesicmbsii_status")==false){
			//redirect(base_url().'log.asp','refresh');
			$data['def_con'] = "admin/";
			$data['title'] = 'Login | Mobile Combase v2';
			//$data['content'] = 'admin/lock_v';
			
			$CI->load->view('admin/lock_v',$data); 
            
		}
	}
}

if ( ! function_exists('is_access'))
{		
	function is_access($menu){
		$CI =& get_instance();
		$temp = $CI->user_m->get_user_profil();$akses = false;
        if($temp->num_rows()==1){
            $konfig = decode_config($temp->row()->akses);
			if($konfig[$menu])$akses = true; 
		}
		if(!$akses){
			echo "<script>alert('Akses Ditolak!!!')</script>";
			redirect(base_url().'log/out.asp','refresh');
		}
	}
}

if ( ! function_exists('inc_msgconfig'))
{		
	function inc_msgconfig(){
		$CI =& get_instance();
		$temp_d1 = $CI->user_m->get_user_profil();
		if($temp_d1->num_rows()==1){
			$konfig = decode_config($temp_d1->row()->konfig);
			if($konfig['msg_autonew'][0]){
				$notif = '';if($konfig['msg_autonew'][1])$notif = 'showNotif(msg);';
				$ring = '';if($konfig['msg_autonew'][2])$ring = 'ringNotif();';
				echo "<script>
				$(document).ready(function(){
						//showAlert('Auto cek SMS baru aktiv!','Peringatan!','w','tl',true);
						cek_new();
				});
				function cek_new(){
					$.ajax({
						//type: 'POST',
						url: url+con+'gateway/cek_new_ibx',
						cache: false,
						success: function(msg){
							var buffer = msg.split('|');
							if(buffer[4]==0){
								".$notif.$ring."
								if(buffer[3]){
									//auto(buffer[3]);
									upNotif(buffer[3]);
								}
							}
							$('.ibx_newmsg').html(buffer[6]);
						}
						,error: function(xhr, status, error) {alert('Any one there?');location.reload();}
					});
					var timeup = setTimeout('cek_new()',1000);
				}
				</script>";
			}
		}
	}
}

if ( ! function_exists('log_getdetailusr'))
{		
	function log_getdetailusr($mod,$usr,$lev){
		$def_con = false;$oklog = 0;$prodi = false;$tool = false;$nm_user=false;
		$img = 'def_user_picture.jpg';$jbt = 'Mahasiswa';
		$CI =& get_instance();
		if($mod == 'usr'){
			$def_con = 'admin/';
			$d1 = $CI->user_m->get_User($usr);
			if($d1->num_rows()){
				$oklog = 1;
				$r1 = $d1->row();
				$nm_user = $r1->nama;
				$prodi = $r1->prodi;
				if($r1->foto)$img = $r1->foto;
				if($r1->jabatan)$jbt = $r1->jabatan;
			}
			if($lev=='SU'){$tool = true;$prodi = false;};
			if($lev=='KU'){$prodi = false;};
		}else {
			$d1 = $CI->mhs_m->get_Mhs($usr);
			if($d1->num_rows()){
				$oklog = 1;
				$r1 = $d1->row();
				$prodi = $r1->jurusan_skt;
				$nm_user = $r1->nama;
				if($r1->foto)$img = $r1->foto;
			}	
		}
		
		return array($def_con,$tool,$oklog,$nm_user,$img,$jbt,$prodi);
	}
}

if ( ! function_exists('captcha_creator'))
{
	function captcha_creator(){
		$CI =& get_instance();
		$CI->load->helper('captcha');	
		$vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'captcha/',
			'img_width'	 => 150,
			'img_height' => 30,
			'border' => 0, 
			'expiration' => 7200
		);
		$captcha = create_captcha($vals);
		$CI->session->set_userdata('cmbsii_set_captcha',$captcha['word']);
		//echo $captcha['image'];
		return $captcha['image'];
	}
}