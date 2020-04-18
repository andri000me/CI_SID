<?php 

class M_keluarga extends CI_model {

    // public function getKepalaKeluarga($nik_kepala){
    //     $this->db->from('data_penduduk');
    //     $this->db->where('id', $nik_kepala);
    //     return $this->db->get(); 
    // }

    public function getKepalaKeluarga() {
        $this->db->select('penduduk.*, keluarga.no_kk, keluarga.nik_kepala, keluarga.tgl_daftar,keluarga.kelas_sosial,keluarga.tgl_cetak_kk, keluarga.alamat, keluarga.id_cluster');
        $this->db->from('data_keluarga keluarga');
        $this->db->join('data_penduduk penduduk', 'penduduk.id_kk = keluarga.id');
        $this->db->where('penduduk.rtm_level' , '1');
        return $this->db->get();
    }

    public function getKeluarga() {
        $this->db->from('data_keluarga');
        $this->db->order_by('tgl_daftar', 'DESC');
		return $this->db->get();
    }

    public function get_penduduk_list($id_kk) {
        $this->db->select('penduduk.*, keluarga.no_kk');
        $this->db->from('data_penduduk penduduk');
        $this->db->join('data_keluarga keluarga', 'keluarga.id = penduduk.id_kk');
        $this->db->join('m_penduduk_hubungan rtm_level', 'rtm_level.id = penduduk.rtm_level');
        $this->db->where('penduduk.id_kk', $id_kk);
        $this->db->order_by("rtm_level.id", "ASC");
        return $this->db->get()->result();
    }

    public function getDetail($id) {
        $this->db->from('data_penduduk');
        $this->db->where('id', $id);
		return $this->db->get();
    }

    //table
	function getDetailKeluarga($id_cluster, $nik_kepala) {
        $this->db->from('data_penduduk');
        $this->db->where('id_cluster', $id_cluster);
        $this->db->where_not_in('id' ,['select * from data_keluarga where nik_kepala', $nik_kepala]);
		return $this->db->get();
    }

    public function simpanKeluarga() {

        $data = [
            "id_kk" => $this->session->userdata('id_kepala'),
            "rtm_level" => $this->input->post('rtm_level', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_penduduk', $data);
    }

    public function simpanKeluarga_new() {
        
        $data = [
            "id_kk" => $this->session->userdata('id_kepala'),
            "rtm_level" => $this->input->post('rtm_level', true),
            "id_cluster" => $this->session->userdata('id_cluster')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_penduduk', $data);
    }

    public function pecahAnggotaKeluarga($id, $nik){
        $data = [
            "id_kk" => '0',
            "no_kk_sebelumnya" => $nik
        ];
        $this->db->where('id', $id);
        $this->db->update('data_penduduk', $data);
    }

    public function perbaruiHubunganAnggotaKeluarga(){
        $data = [
            "rtm_level" => $this->input->post('rtm_level', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_penduduk', $data);
    }

    public function perbaruiAnggotaKeluarga(){
        $data = [
            "status_dasar" => $this->input->post('status_dasar', true),
            "nik" => $this->input->post('nik', true),
            // "kk_level" => $this->input->post('kk_level', true),
            "nama" => $this->input->post('nama', true),
            "id_rtm" => $this->input->post('id_rtm', true),
            "rtm_level" => $this->input->post('rtm_level', true),
            "tempatlahir" => $this->input->post('tempatlahir', true),
            "tanggallahir" => $this->input->post('tanggallahir', true),
            "agama_id" => $this->input->post('agama_id', true),
            "status_kawin" => $this->input->post('status_kawin', true),
            "sex" => $this->input->post('sex', true),
            "telepon" => $this->input->post('telepon', true),
            // "foto" => $this->input->post('foto', true),
            "golongan_darah_id" => $this->input->post('golongan_darah_id', true),
            "pendidikan_kk_id" => $this->input->post('pendidikan_kk_id', true),
            "pendidikan_sedang_id" => $this->input->post('pendidikan_sedang_id', true),
            "pekerjaan_id" => $this->input->post('pekerjaan_id', true),
            "warganegara_id" => $this->input->post('warganegara_id', true),
            "status" => $this->input->post('status', true),
            "alamat_sebelumnya" => $this->input->post('alamat_sebelumnya', true),
            "alamat_sekarang" => $this->input->post('alamat_sekarang', true),
            "cacat_id" => $this->input->post('cacat_id', true),
            "sakit_menahun_id" => $this->input->post('sakit_menahun_id', true),
            "akta_perkawinan" => $this->input->post('akta_perkawinan', true),
            "tanggalperkawinan" => $this->input->post('tanggalperkawinan', true),
            "akta_perceraian" => $this->input->post('akta_perceraian', true),
            "cara_kb_id" => $this->input->post('cara_kb_id', true),
            "no_kk_sebelumnya" => $this->input->post('no_kk_sebelumnya', true),
            "ktp_el" => $this->input->post('ktp_el', true),
            "status_rekam" => $this->input->post('status_rekam', true),
            "dokumen_pasport" => $this->input->post('dokumen_pasport', true),
            "dokumen_kitas" => $this->input->post('dokumen_kitas', true),
            "tanggal_akhir_paspor" => $this->input->post('tanggal_akhir_paspor', true),
            "ayah_nik" => $this->input->post('ayah_nik', true),
            "nama_ayah" => $this->input->post('nama_ayah', true),
            "ibu_nik" => $this->input->post('ibu_nik', true),
            "nama_ibu" => $this->input->post('nama_ibu', true),
            "akta_lahir" => $this->input->post('akta_lahir', true),
            "waktu_lahir" => $this->input->post('waktu_lahir', true),
            "tempat_dilahirkan" => $this->input->post('tempat_dilahirkan', true),
            "jenis_kelahiran" => $this->input->post('jenis_lahiran', true),
            "kelahiran_anak_ke" => $this->input->post('kelahiran_anak_ke', true),
            "penolong_kelahiran" => $this->input->post('penolong_kelahiran', true),
            "berat_lahir" => $this->input->post('berat_lahir', true),
            "panjang_lahir" => $this->input->post('panjang_lahir', true),
            "ktp_el" => $this->input->post('ktp_el', true),
            "status_rekam" => $this->input->post('status_rekam', true),
            "tempat_dilahirkan" => $this->input->post('tempat_dilahirkan', true),
            "jenis_kelahiran" => $this->input->post('jenis_kelahiran', true),
            "penolong_kelahiran" => $this->input->post('penolong_kelahiran', true),
            "id_asuransi" => $this->input->post('id_asuransi', true),
            "tag_id_card" => $this->input->post('tag_id_card', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_penduduk', $data);
    }

    public function hapusKeluarga($id_kk){
        $data = [
            "id_kk" => '0',
            "id_cluster" => '0',
        ];

        $this->db->where('id_kk', $id_kk);
        $this->db->update('data_penduduk', $data);
    }

    public function hapusDataKeluarga($id_kk){
        $this->db->delete('data_keluarga', ['id' => $id_kk]);
    }

    // looping penduduk ajax search
	function search_penduduk($nama_penduduk){
        $this->db->like('nama', $nama_penduduk, 'both');
        $this->db->where('id_kk','0');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('data_penduduk')->result();
    }


    public function getHubungan(){
        $this->db->where('nama !=','KEPALA KELUARGA');
        return $this->db->get('m_penduduk_hubungan')->result();
    }

    public function getHubungan_keluarga(){
        $this->db->where('nama','KEPALA KELUARGA');
        return $this->db->get('m_penduduk_hubungan')->result();
    }
    
    public function getCountId_Cluster(){
        $this->db->select_max('id_cluster');
        $this->db->from('data_keluarga');
        $query = $this->db->get();
        if($query->num_rows() > 0){
           return $query->row('id_cluster');        
        }else{
           return 1;
        }
    }
    /// Untuk Form Tambah Keluarga Baru
    function insert_last_penduduk($id_cluster_new) {

        $data = [
            // "status_dasar" => $this->input->post('status_dasar', true),
            "nik" => $this->input->post('nik', true),
            // "kk_level" => $this->input->post('kk_level', true),
            "nama" => $this->input->post('nama', true),
            "id_rtm" => $this->input->post('id_rtm', true),
            "rtm_level" => $this->input->post('rtm_level', true),
            "tempatlahir" => $this->input->post('tempatlahir', true),
            "tanggallahir" => $this->input->post('tanggallahir', true),
            "agama_id" => $this->input->post('agama_id', true),
            "status_kawin" => $this->input->post('status_kawin', true),
            "sex" => $this->input->post('sex', true),
            "telepon" => $this->input->post('telepon', true),
            // "foto" => $this->input->post('foto', true),
            "golongan_darah_id" => $this->input->post('golongan_darah_id', true),
            "pendidikan_kk_id" => $this->input->post('pendidikan_kk_id', true),
            "pendidikan_sedang_id" => $this->input->post('pendidikan_sedang_id', true),
            "pekerjaan_id" => $this->input->post('pekerjaan_id', true),
            "warganegara_id" => $this->input->post('warganegara_id', true),
            "status" => $this->input->post('status', true),
            "alamat_sebelumnya" => $this->input->post('alamat_sebelumnya', true),
            "alamat_sekarang" => $this->input->post('alamat_sekarang', true),
            "cacat_id" => $this->input->post('cacat_id', true),
            "sakit_menahun_id" => $this->input->post('sakit_menahun_id', true),
            "akta_perkawinan" => $this->input->post('akta_perkawinan', true),
            "tanggalperkawinan" => $this->input->post('tanggalperkawinan', true),
            "akta_perceraian" => $this->input->post('akta_perceraian', true),
            "cara_kb_id" => $this->input->post('cara_kb_id', true),
            "no_kk_sebelumnya" => $this->input->post('no_kk_sebelumnya', true),
            "ktp_el" => $this->input->post('ktp_el', true),
            "status_rekam" => $this->input->post('status_rekam', true),
            "dokumen_pasport" => $this->input->post('dokumen_pasport', true),
            "dokumen_kitas" => $this->input->post('dokumen_kitas', true),
            "tanggal_akhir_paspor" => $this->input->post('tanggal_akhir_paspor', true),
            "ayah_nik" => $this->input->post('ayah_nik', true),
            "nama_ayah" => $this->input->post('nama_ayah', true),
            "ibu_nik" => $this->input->post('ibu_nik', true),
            "nama_ibu" => $this->input->post('nama_ibu', true),
            "akta_lahir" => $this->input->post('akta_lahir', true),
            "waktu_lahir" => $this->input->post('waktu_lahir', true),
            "tempat_dilahirkan" => $this->input->post('tempat_dilahirkan', true),
            "jenis_kelahiran" => $this->input->post('jenis_lahiran', true),
            "kelahiran_anak_ke" => $this->input->post('kelahiran_anak_ke', true),
            "penolong_kelahiran" => $this->input->post('penolong_kelahiran', true),
            "berat_lahir" => $this->input->post('berat_lahir', true),
            "panjang_lahir" => $this->input->post('panjang_lahir', true),

            "ktp_el" => $this->input->post('ktp_el', true),
            "status_rekam" => $this->input->post('status_rekam', true),
            "tempat_dilahirkan" => $this->input->post('tempat_dilahirkan', true),
            "jenis_kelahiran" => $this->input->post('jenis_kelahiran', true),
            "penolong_kelahiran" => $this->input->post('penolong_kelahiran', true),
            "id_asuransi" => $this->input->post('id_asuransi', true),
            "tag_id_card" => $this->input->post('tag_id_card', true),
            "id_cluster" => $id_cluster_new,
        ];

		$this->db->insert('data_penduduk', $data);

		return $this->db->insert_id();
	}

    function simpan_kk_dari_penduduk($id_cluster_new, $id) {

        $data = [
            "no_kk" => $this->input->post('no_kk', true),
            "nik_kepala" => $id,
            "id_cluster" => $id_cluster_new
        ];

        $this->db->insert('data_keluarga', $data);

		return $this->db->insert_id();
    }

    function update_kk_penduduk($id, $id_kk) {
        $data = [
            "id_kk" => $id_kk,
        ];

        $this->db->where('id', $id);
        $this->db->update('data_penduduk', $data);
    }
    ////Untuk Modal Tambah Keluarga Baru
    function update_last_penduduk($id_cluster_new) {

        $data = [
            "rtm_level" => $this->input->post('rtm_level', true),
            "id_cluster" => $id_cluster_new,
        ];
		$this->db->where('id', $this->input->post('id'));
        $this->db->update('data_penduduk', $data);
    }
    
    function insert_last_kk_new($id_cluster_new) {

        $data = [
            "no_kk" => $this->input->post('no_kk', true),
            "nik_kepala" => $this->input->post('id'),
            "id_cluster" => $id_cluster_new
        ];

        $this->db->insert('data_keluarga', $data);

		return $this->db->insert_id();
    }

    function update_kk_penduduk_new($id_kk) {
        $data = [
            "id_kk" => $id_kk,
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_penduduk', $data);
    }

    function update_kk_penduduk_old($id_kk) {
        $data = [
            "id_kk" => $id_kk,
            "rtm_level" => $this->input->post('rtm_level', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_penduduk', $data);
    }
}