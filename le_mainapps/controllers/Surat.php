<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		//$this->load->view('welcome_message');
		$data['page'] 			= "BAAKU";
		$data['judul'] 			= "Utama";
		// $data['deskripsi'] 		= "Dashborad Sistem Informasi Desa";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
              <li class='breadcrumb-item active'>Dashboard</";
		$this->template->views('welcome_message', $data);
	}

	public function SuratNikah() {
		//$this->load->view('welcome_message');
		$data['page'] 			= "BAAKU";
		$data['judul'] 			= "Surat keterangan Nikah";
		// $data['deskripsi'] 		= "Dashborad Sistem Informasi Desa";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
			  <li class='breadcrumb-item active'>Surat Keterangan Nikah</";
		
		$this->template->views('surat/surat_nikah/view', $data);
	}

	public function TambahSuratNikah() {
		//$this->load->view('welcome_message');
		$data['page'] 			= "BAAKU";
		$data['judul'] 			= "Surat keterangan Nikah";
		// $data['deskripsi'] 		= "Dashborad Sistem Informasi Desa";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
			  <li class='breadcrumb-item active'>Surat Keterangan Nikah</";
		
		$this->template->views('surat/surat_nikah/surat_ket_nikah', $data);
	}

	public function CetakSuratNikah() {
		$data['judul'] 			= "Surat keterangan Nikah";
		$this->load->view('surat/surat_nikah/cetak_surat_nikah');
	}
}
