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
    
	public function index() {
        $dataSession=array('id_cluster','id_kepala');
		$this->session->unset_userdata($dataSession);
		//$this->load->view('welcome_message');
		$data['page'] 			= "BAAKU";
		$data['judul'] 			= "Data Keluarga";
		// $data['deskripsi'] 		= "";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
              <li class='breadcrumb-item active'>Data Keluarga</";
        $data['keluarga']=$this->M_keluarga->getKepalaKeluarga();
        $data['hubungan']=$this->M_keluarga->getHubungan_keluarga();
		$this->template->views('keluarga/view', $data);
    }

    public function detail() {
        //$this->load->view('welcome_message');
        $data['page'] 			= "BAAKU";
        $data['judul'] 			= "Data detail Keluarga";
        // $data['deskripsi'] 		= "";
        $data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
            <li class='breadcrumb-item active'>Data detail Keluarga</";

        $data['keluarga']=$this->M_informasi->getKeluarga();
        $data['k_level']=$this->M_informasi->getKeluargaSejahtera();
        $data['rtm_hubungan']=$this->M_informasi->getRtmHubungan();
        $data['rtm_level']=$this->M_informasi->getHubungan();
        $data['hubungan']=$this->M_keluarga->getHubungan();
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

        $id_kepala=$this->uri->segment(3);
        $id_cluster=$this->uri->segment(4);
        $dataSession= array (
            'id_kepala'=> $id_kepala,
            'id_cluster'=> $id_cluster
        );
		$this->session->set_userdata($dataSession);
        $informasi = $this->M_keluarga->getKepalaKeluarga($id_kepala);
		foreach ($informasi->result() as $key) {
            $data['no_kk']=$key->no_kk;
            $data['kepala_keluarga']=$key->nama;
            $data['alamat']=$key->alamat;
            $data['id_kk']=$key->id_kk;
        }
        $data['anggota_keluarga']=$this->M_keluarga->get_penduduk_list($id_kepala);
        $data['perbarui_hubungan']=$this->M_keluarga->get_penduduk_list($id_kepala);
        $data['modal_hubungan']=$this->M_keluarga->get_penduduk_list($id_kepala);
        $this->template->views('keluarga/detail', $data);
    }
    
    public function simpan_anggota() {
        $id_cluster=$this->session->userdata('id_cluster');
        $id_kepala=$this->session->userdata('id_kepala');
        $query = $this->M_penduduk->getDetail($this->input->post('id'));
        foreach ($query->result() as $row){
            if($row->id_cluster == 0) {
                $this->M_keluarga->simpanKeluarga_new();
            }
            else {
                $this->M_keluarga->simpanKeluarga();
                
            }
        }
        $this->session->set_flashdata('title', 'Data Keluarga');
        $this->session->set_flashdata('flash', 'Ditambah');
        redirect(base_url("keluarga/detail/$id_kepala/$id_cluster"));
    }

    public function pecah_anggota($id, $nik){
        $id_cluster=$this->session->userdata('id_cluster');
        $id_kepala=$this->session->userdata('id_kepala');
        $this->M_keluarga->pecahAnggotaKeluarga($id, $nik);
        $this->session->set_flashdata('title', 'Data Keluarga');
        $this->session->set_flashdata('flash', 'Dipecah');
        redirect(base_url("keluarga/detail/$id_kepala/$id_cluster"));
    }

    public function edit($id) {
        $data['page'] 			= "BAAKU";
		$data['judul'] 			= "Perbarui data penduduk";
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

        $data['detail']=$this->M_penduduk->getDetail($id);
        $this->template->views('keluarga/perbarui', $data);
    }

    public function perbarui() {
        $id_cluster=$this->session->userdata('id_cluster');
        $id_kepala=$this->session->userdata('id_kepala');
        $this->M_keluarga->perbaruiAnggotaKeluarga();
        $this->session->set_flashdata('title', 'Data Anggota Keluarga');
        $this->session->set_flashdata('flash', 'Diperbarui');
        redirect(base_url("keluarga/detail/$id_kepala/$id_cluster"));
    }

    public function perbarui_hubungan() {
        $id_cluster=$this->session->userdata('id_cluster');
        $id_kepala=$this->session->userdata('id_kepala');
        $this->M_keluarga->perbaruiHubunganAnggotaKeluarga();
        $this->session->set_flashdata('title', 'Data Anggota Keluarga');
        $this->session->set_flashdata('flash', 'Diperbarui');
        redirect(base_url("keluarga/detail/$id_kepala/$id_cluster"));
    }

    public function kartu_keluarga(){
		$data['page'] 			= "BAAKU";
		$data['judul'] 			= "Detail Kartu Keluarga";
		// $data['deskripsi'] 		= "";
		$data['menu1']= "<li class='breadcrumb-item'><a href='#'> Home</a></li>
			  <li class='breadcrumb-item active'>Detail Kartu Keluaga</";
		$data['keluarga']=$this->M_informasi->getKeluarga();
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

		$id_kk=$this->uri->segment(3);
		$data['anggota_keluarga'] = $this->M_penduduk->get_penduduk_list($id_kk);
        $data['informasi_keluarga'] = $this->M_penduduk->get_penduduk_list($id_kk);
		$informasi= $this->M_penduduk->get_kepala_keluarga($id_kk);
		foreach ($informasi->result() as $key) {
            $data['kepala_keluarga']=$key->nama;
            $data['no_kk']=$key->no_kk;
            $data['id_kk']=$key->id_kk;
            $data['id_cluster']=$key->id_cluster;
		}
		$data['jumlah_keluarga'] = $this->M_penduduk->getJumlahkeluarga($id_kk);
		$data['detail']=$this->M_penduduk->getDetailKartuKeluarga($id_kk);
		
        $this->template->views('keluarga/kartu_keluarga', $data);
	}

    public function hapus($id_kk){
        $this->M_keluarga->hapusKeluarga($id_kk);
        $this->M_keluarga->hapusDataKeluarga($id_kk);
        $this->session->set_flashdata('title', 'Data Keluarga');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Keluarga');
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_keluarga->search_penduduk($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
					'label' => $row->nik .' - '. $row->nama,
                    'id' =>$row->id,
                    'id_cluster' =>$row->id_cluster,
                );
                echo json_encode($arr_result);
			}
		}
    }
    
    function getPendudukBelumMemilikiKeluarga(){
        if (isset($_GET['term'])) {
            $result = $this->M_keluarga->search_penduduk($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
					'label' =>  $row->nik .' - '. $row->nama,
                    'id' =>$row->id,
                );
                echo json_encode($arr_result);
			}
		}
    }

    public function tambah_penduduk_kk_baru() {
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
		
        $this->template->views('keluarga/tambah_penduduk_kk', $data);
    }

    public function simpan_kk_baru(){
        if($_POST['id_cluster'] == 0) {
            $max = $this->M_keluarga->getCountId_Cluster();
            $id_cluster_new = $max + 1 ;
            $id = $this->M_keluarga->insert_last_penduduk($id_cluster_new);
            $id_kk = $this->M_keluarga->simpan_kk_dari_penduduk($id_cluster_new, $id);
            $this->M_keluarga->update_kk_penduduk($id , $id_kk);
            redirect('Keluarga');
        }
    }

    public function simpanKKPendudukYangSudahAda(){
        if($_POST['id_cluster'] == 0) {
            $max = $this->M_keluarga->getCountId_Cluster();
            $id_cluster_new = $max + 1 ;
            $this->M_keluarga->update_last_penduduk($id_cluster_new);
            $id_kk = $this->M_keluarga->insert_last_kk_new($id_cluster_new);
            $this->M_keluarga->update_kk_penduduk_new($id_kk);
            $this->session->set_flashdata('title', 'Data Kartu Keluarga');
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('Keluarga');
        } 
        else {
            $id_cluster_new = $_POST['id_cluster'];
            $id_kk = $this->M_keluarga->insert_last_kk_new($id_cluster_new);
            $this->M_keluarga->update_kk_penduduk_old($id_kk);
            $this->session->set_flashdata('title', 'Data Kartu Keluarga');
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('Keluarga');
        }
    }
}
