<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
	function verify(){
		$password = hash("sha512", md5($this->db->escape_str($this->input->post('password',TRUE))));
		$cond = array(
					'username' =>$this->db->escape_str(trim($this->input->post('user',TRUE))),
					'password'=> $password,
					'blokir' => 'N'
				);
	
		$this->db->select("*");
		$this->db->from("b_users");
		$this->db->where($cond);
		$query = $this->db->get();

		// Cek Ada atau tidak 
		if($query->num_rows() ==1){
            foreach($query->result() as $row){
                $user_id = $row->id_user;   
                $user_akses = $row->level;				   
                $username = $row->username;
			    $password=$row->password;
                $blokir=$row->blokir;
                $foto=$row->foto;                
                $nama=$row->nama_lengkap;              
                $sesi=$row->id_session;
                $email=$row->email;                
                $telp=$row->no_telp;
                $tgldaftar=$row->tgl_daftar;
            }
            //echo  $tgldaftar; exit();

            	
			$data = array(
				'userid' => $user_id,
				'level' => $user_akses,
				'user_name' => $username,
				'logged_in' => true,
				'tgl_daftar'=>$tgldaftar,
				'blokir'=>$blokir,
				'foto'=>$foto,               
				'name'=>$nama,
				'e_mail'=>$email,
				'sesi_b_user'=>$sesi,               
				'no_telp'=>$telp,
				'mod_depasse'=>$password,
				'url_portal'=>"http://localhost/SILAK_front/"
			);  
           $this->session->set_userdata($data);    
		   $this->session->set_userdata('file_manager',true);        	
           return true;      
		}else{return false;}
	}
	
	public function hakakses_prodi($iduser) {
		$sql = "SELECT * FROM  b_users_aksesprodi WHERE  id_user='{$iduser}'";
		$data = $this->db->query($sql);
		return $data->result();
	}


	
	
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */