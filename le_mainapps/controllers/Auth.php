<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
			//$this->session->sess_destroy(); 
		$this->load->model('M_auth');
	}
	
	public function index() {
		$session = $this->session->userdata('logged_in');
        
		if ($session) {
			if ($this->session->userdata('level') =='admin'){
				redirect('Administrateur');
			}else if ($this->session->userdata('level') =='baaku'){
				redirect('Baaku');
			}else if ($this->session->userdata('level') =='keuangan'){
				redirect('Keuangan');
			}else if ($this->session->userdata('level') =='kepegawaian'){
				redirect('Kepegawaian');
			}else if ($this->session->userdata('level') =='kerumahtanggaan'){
				redirect('Kerumahtanggaan');
			}else if ($this->session->userdata('level') =='userportal'){
				redirect('Userportal');
			} else {
				redirect('Auth/logout');
			}
		} else {
			$path = './assets/captcha/';
			$files = glob( $path . '*', GLOB_MARK );
		    foreach( $files as $file ) unlink( $file );	  

		    //hapus folder tiap pembuatan captcha baru
		    if (is_dir($path)) rmdir( $path );

			//membuat folder apabila folder captcha tidak ada
			if ( !file_exists($path) )
			{
				$create = mkdir($path, 0777);
				if ( !$create)
				return;
			}

			//Menampilkan huruf acak untuk dijadikan captcha
			$word1 = rand(0,9);
			$word2 = rand(0,9);
			$str  = $word1 .' + '.$word2;

			//Menyimpan huruf acak tersebut kedalam session
			$data_ses = array('captcha_str1' => $word1, 'captcha_str2' => $word2 	);				
			$this->session->set_userdata($data_ses);

			//array untuk menampilkan gambar captcha
			$vals = array(
			    'word'	=> $str, //huruf acak yang telah dibuat diatas
			    'img_path'	=> $path, //path untuk menyimpan gambar captcha
			    'img_url'	=> base_url().'assets/captcha/', //url untuk menampilkan gambar captcha
			    'img_width'	=> '120', //lebar gambar captcha
			    'img_height' => 32, //tinggi gambar captcha
			    'expiration' => 7200 //expired time per captcha
			);

			$cap = create_captcha($vals);
			$data['captcha_image'] = $cap['image']; //variable array untuk menampilkan captcha pada view						
			$this->load->view('login',$data);
		}
	}

	public function login() {
	
	
		$this->form_validation->set_rules('user', 'Username', 'required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			
			$jml= intval($this->session->userdata('captcha_str1')) +  intval($this->session->userdata('captcha_str2'));
			//echo $this->input->post('captcha_code')  ; exit();
				
			if($this->input->post('captcha_code') != $jml){
				$this->session->set_flashdata('error_msg', 'Penjumlahan Angka Captcha Salah !');
			   redirect('Auth');
			}
			$this->load->model('M_auth');
            $verify = $this->M_auth->verify();
         
		 
            if($verify){  
			 // echo "Agus"; exit();
					if ($this->session->userdata('level') =='admin'){
						redirect('Administrateur');
					}else if ($this->session->userdata('level') =='baaku'){
						
						$iduser=$this->session->userdata('userid');
						$prodiakses=$this->M_auth->hakakses_prodi($iduser);
  						foreach ($prodiakses as $prodi) {
  							echo $prodi->id_prodi."<br/>";
  						}
						//print_r ($this->M_auth->hakakses_prodi($iduser)); exit();
						redirect('Baaku');
					}else if ($this->session->userdata('level') =='keuangan'){
						redirect('Keuangan');
					}else if ($this->session->userdata('level') =='kepegawaian'){
						redirect('Kepegawaian');
					}else if ($this->session->userdata('level') =='kerumahtanggaan'){
						redirect('Kerumahtanggaan');
					}else if ($this->session->userdata('level') =='userportal'){
						redirect('Userportal');
					} else
						redirect('Auth/logout');

			   
            }else{
               $this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
			   redirect('Auth/logout');
            }                 
			
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			header('location:'.base_url('Auth/logout')); //redirect('Auth/logout');
		}
	}
	
	
	
	public function logout() {
		//echo "logout";  exit();
		$this->session->sess_destroy(); 
		redirect('Auth');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */