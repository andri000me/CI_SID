<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {

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

    public function __construct() {
		parent::__construct();
		$this->load->model(array('M_penduduk', 'M_informasi'));
	}
	public function index()
	{
		//$this->load->view('welcome_message');
		$data['page'] 			= "BAAKU";
		$data['judul'] 			= "Data Penduduk";
		// $data['deskripsi'] 		= "";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
			  <li class='breadcrumb-item active'>Data Penduduk</";
			  
		$data['k_level']=$this->M_informasi->getKeluargaSejahtera();
		$data['rtm_hubungan']=$this->M_informasi->getRtmHubungan();
		$data['rtm_level']=$this->M_informasi->getHubungan();
		$data['agama']=$this->M_informasi->getAgama();
		$data['pendidikan_kk']=$this->M_informasi->getPendidikanKK();
		$data['pendidikan']=$this->M_informasi->getPendidikan();
		$data['pekerjaan']=$this->M_informasi->getPekerjaan();
		$data['kawin']=$this->M_informasi->getKawin();
		$data['warganegara']=$this->M_informasi->getWargaNegara();
		$data['golongan_darah']=$this->M_informasi->getGolonganDarah();
		$data['status']=$this->M_informasi->getStatus();
		$data['status_dasar']=$this->M_informasi->getStatusDasar();
		$data['cacat']=$this->M_informasi->getcacat();
		$data['sakit_menahun']=$this->M_informasi->getSakitMenahun();
		$data['cara_kb']=$this->M_informasi->getCarakb();
		$data['keluarga']=$this->M_informasi->getKeluarga();
		 
		$data['penduduk'] = $this->M_penduduk->getPenduduk();
		$this->template->views('penduduk/view', $data);
	}
	

    public function detail() {
        //$this->load->view('welcome_message');
		$data['page'] 			= "BAAKU";
		$data['judul'] 			= "Detail Penduduk";
		// $data['deskripsi'] 		= "";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
              <li class='breadcrumb-item active'>Data Penduduk</";
		
		$data['k_level']=$this->M_informasi->getKeluargaSejahtera();
		$data['rtm_hubungan']=$this->M_informasi->getRtmHubungan();
		$data['rtm_level']=$this->M_informasi->getHubungan();
		$data['agama']=$this->M_informasi->getAgama();
		$data['pendidikan_kk']=$this->M_informasi->getPendidikanKK();
		$data['pendidikan']=$this->M_informasi->getPendidikan();
		$data['pekerjaan']=$this->M_informasi->getPekerjaan();
		$data['kawin']=$this->M_informasi->getKawin();
		$data['warganegara']=$this->M_informasi->getWargaNegara();
		$data['golongan_darah']=$this->M_informasi->getGolonganDarah();
		$data['status']=$this->M_informasi->getStatus();
		$data['status_dasar']=$this->M_informasi->getStatusDasar();
		$data['cacat']=$this->M_informasi->getcacat();
		$data['sakit_menahun']=$this->M_informasi->getSakitMenahun();
		$data['cara_kb']=$this->M_informasi->getCarakb();

        $nik=$this->uri->segment(3);
        $data['penduduk']=$this->M_penduduk->getDetailPenduduk($nik);

		// $cek=$this->M_penduduk->getDetailPenduduk($nik);

		// foreach ($cek->result() as $row)
		// {
		// 	$id = $row->id_cluster;
		// }
		// $data['keluarga']=$this->M_penduduk->getDetailKeluarga($id, $nik);
		$this->template->views('penduduk/detail', $data);
	}

	public function tambah() {
		$data['page'] 			= "BAAKU";
		$data['judul'] 			= "Tambah data penduduk";
		// $data['deskripsi'] 		= "";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
              <li class='breadcrumb-item active'>Tambah data Penduduk</";
        $data['k_level']=$this->M_informasi->getKeluargaSejahtera();
        $data['rtm_hubungan']=$this->M_informasi->getRtmHubungan();
        $data['rtm_level']=$this->M_informasi->getHubungan();
        $data['agama']=$this->M_informasi->getAgama();
        $data['pendidikan_kk']=$this->M_informasi->getPendidikanKK();
        $data['pendidikan']=$this->M_informasi->getPendidikan();
        $data['pekerjaan']=$this->M_informasi->getPekerjaan();
        $data['kawin']=$this->M_informasi->getKawin();
        $data['warganegara']=$this->M_informasi->getWargaNegara();
        $data['golongan_darah']=$this->M_informasi->getGolonganDarah();
        $data['status']=$this->M_informasi->getStatus();
        $data['status_dasar']=$this->M_informasi->getStatusDasar();
        $data['cacat']=$this->M_informasi->getcacat();
        $data['sakit_menahun']=$this->M_informasi->getSakitMenahun();
		$data['cara_kb']=$this->M_informasi->getCarakb();
		$data['id_asuransi']=$this->M_informasi->getAsurasi();
		$data['ktp_el']=$this->M_informasi->getKtpel();
		$data['status_rekam']=$this->M_informasi->getStatusrekam();
		$data['tempat_dilahirkan']=$this->M_informasi->gettempatdilahirkan();
		$data['jenis_kelahiran']=$this->M_informasi->getJenisKelahiran();
		$data['penolong_kelahiran']=$this->M_informasi->getPenolongkelahiran();
		
		
		$this->template->views('penduduk/tambah', $data);
	}

	public function simpan() {
        $this->M_penduduk->simpanPenduduk();
        $this->session->set_flashdata('title', 'Data Penduduk');
        $this->session->set_flashdata('flash', 'Ditambah');
        redirect('penduduk');
	}
	
	public function edit($id) {
        $data['k_level']=$this->M_informasi->getKeluargaSejahtera();
        $data['rtm_hubungan']=$this->M_informasi->getRtmHubungan();
        $data['rtm_level']=$this->M_informasi->getHubungan();
        $data['agama']=$this->M_informasi->getAgama();
        $data['pendidikan_kk']=$this->M_informasi->getPendidikanKK();
        $data['pendidikan']=$this->M_informasi->getPendidikan();
        $data['pekerjaan']=$this->M_informasi->getPekerjaan();
        $data['kawin']=$this->M_informasi->getKawin();
        $data['warganegara']=$this->M_informasi->getWargaNegara();
        $data['golongan_darah']=$this->M_informasi->getGolonganDarah();
        $data['status']=$this->M_informasi->getStatus();
        $data['status_dasar']=$this->M_informasi->getStatusDasar();
        $data['cacat']=$this->M_informasi->getcacat();
        $data['sakit_menahun']=$this->M_informasi->getSakitMenahun();
		$data['cara_kb']=$this->M_informasi->getCarakb();
		$data['id_asuransi']=$this->M_informasi->getAsurasi();
		$data['ktp_el']=$this->M_informasi->getKtpel();
		$data['status_rekam']=$this->M_informasi->getStatusrekam();
		$data['tempat_dilahirkan']=$this->M_informasi->gettempatdilahirkan();
		$data['jenis_kelahiran']=$this->M_informasi->getJenisKelahiran();
		$data['penolong_kelahiran']=$this->M_informasi->getPenolongkelahiran();
		

        $data['detail']=$this->M_penduduk->getDetail($id);
        $this->template->views('penduduk/perbarui', $data);
	}
	
	public function perbarui() {
        $this->M_penduduk->perbaruiPenduduk();
        $this->session->set_flashdata('title', 'Data Penduduk');
        $this->session->set_flashdata('flash', 'Diperbarui');
        redirect('Penduduk');
    }

    public function hapus($id){
        $this->M_penduduk->hapusPenduduk($id);
        $this->session->set_flashdata('title', 'Data Penduduk');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Penduduk');
    }
}
