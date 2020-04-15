<?php 

class M_penduduk extends CI_model {
    
    public function getPenduduk()
    {
        $this->db->from('data_penduduk');
        $this->db->order_by('created_at', 'DESC');
		return $this->db->get();
    }

    public function getDetail($id) {
        $this->db->from('data_penduduk');
        $this->db->where('id', $id);
		return $this->db->get();
    }

    //table
	function getDetailPenduduk($nik) {
		$this->db->from('data_penduduk');
		$this->db->where('nik', $nik);
		return $this->db->get();
    }

     //table
	function getDetailKeluarga($id_cluster, $nik) {
        $this->db->from('data_penduduk');
        $this->db->where('nik !=', $nik);
		$this->db->where('id_cluster', $id_cluster);
		return $this->db->get();
    }
    
    public function simpanPenduduk () {
        $data = [
            "status_dasar" => $this->input->post('status_dasar', true),
            "nik" => $this->input->post('nik', true),
            "kk_level" => $this->input->post('kk_level', true),
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
            "dokumen_kitas" => $this->input->post('dokument_kitas', true),
            "tanggal_akhir_paspor" => $this->input->post('sex', true),
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
            "id_cluster" => 0,
        ];

        $this->db->insert('data_penduduk', $data);
    }

    public function perbaruiPenduduk(){
        $data = [
            "status_dasar" => $this->input->post('status_dasar', true),
            "nik" => $this->input->post('nik', true),
            "kk_level" => $this->input->post('kk_level', true),
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
            "dokumen_kitas" => $this->input->post('dokument_kitas', true),
            "tanggal_akhir_paspor" => $this->input->post('sex', true),
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
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_penduduk', $data);
    }

    public function hapusPenduduk($id){
        $this->db->delete('data_penduduk', ['id' => $id]);
    }
}