<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {

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
		$this->load->model(array('M_keluarga', 'M_penduduk', 'M_informasi'));
	}
	public function index()
	{
        $dataSession=array('id_cluster','id_kepala');
		$this->session->unset_userdata($dataSession);
		//$this->load->view('welcome_message');
		$data['page'] 			= "BAAKU";
		$data['judul'] 			= "Data Keluarga";
		// $data['deskripsi'] 		= "";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
              <li class='breadcrumb-item active'>Data Keluarga</";
        $data['kepala']=$this->M_penduduk->getPenduduk();
        $data['keluarga']=$this->M_keluarga->getKeluarga();
		$this->template->views('keluarga/view', $data);
    }

    public function detail() {
        //$this->load->view('welcome_message');
        $data['page'] 			= "BAAKU";
        $data['judul'] 			= "Data detail Keluarga";
        // $data['deskripsi'] 		= "";
        $data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
            <li class='breadcrumb-item active'>Data detail Keluarga</";
        $data['status_dasar']=$this->M_informasi->getStatusDasar();
        $id_cluster=$this->uri->segment(3);
        $id_kepala=$this->uri->segment(4);
        $dataSession=array (
            'id_cluster'=> $id_cluster,
            'id_kepala'=> $id_kepala,
        );
		$this->session->set_userdata($dataSession);
        $data['keluarga']=$this->M_keluarga->getDetailKeluarga($id_cluster, $id_kepala);
        $data['kepala']=$this->M_keluarga->getKepalaKeluarga($id_kepala);
        $this->template->views('keluarga/detail', $data);
    }

    public function tambah() {
        $data['page'] 			= "BAAKU";
		$data['judul'] 			= "Tambah data Keluarga";
		// $data['deskripsi'] 		= "";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
              <li class='breadcrumb-item active'>Tambah data Keluarga</";
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
		$this->template->views('keluarga/tambah', $data);
    }

    public function simpan() {
        $id_cluster=$this->session->userdata('id_cluster');
        $id_kepala=$this->session->userdata('id_kepala');
        $this->M_keluarga->simpanKeluarga();
        $this->session->set_flashdata('title', 'Data Keluarga');
        $this->session->set_flashdata('flash', 'Ditambah');
        redirect(base_url("keluarga/detail/$id_cluster/$id_kepala"));
    }

    public function edit() {
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
        $id=$this->uri->segment(3);
        $data['detail']=$this->M_keluarga->getDetail($id);
        $this->template->views('keluarga/perbarui', $data);
    }

    public function perbarui() {
        $id_cluster=$this->session->userdata('id_cluster');
        $id_kepala=$this->session->userdata('id_kepala');
        $this->M_keluarga->perbaruiKeluarga();
        $this->session->set_flashdata('title', 'Data Keluarga');
        $this->session->set_flashdata('flash', 'Diperbarui');
        redirect(base_url("keluarga/detail/$id_cluster/$id_kepala"));
    }

    public function hapus($id){
        $id_cluster=$this->session->userdata('id_cluster');
        $id_kepala=$this->session->userdata('id_kepala');
        $this->M_keluarga->hapusKeluarga($id);
        $this->session->set_flashdata('title', 'Data Keluarga');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url("keluarga/detail/$id_cluster/$id_kepala"));
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_keluarga->search_penduduk($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
					'label' => $row->nama,
                    'id' =>$row->id,
                    'alamat_sekarang' =>$row->alamat_sekarang,
                    'id_cluster' =>$row->id_cluster,
                );
                echo json_encode($arr_result);
			}
		}
	}


    public function tambah_kk() {
        $data['page'] 			= "BAAKU";
		$data['judul'] 			= "Tambah Data KK Baru";
		// $data['deskripsi'] 		= "";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
              <li class='breadcrumb-item active'>Tambah data KK baru</";
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


		$this->template->views('keluarga/tambah_kk', $data);
    }
}
