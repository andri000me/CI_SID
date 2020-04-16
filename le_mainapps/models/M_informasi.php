<?php 

class M_informasi extends CI_model {
    public function getKeluargaSejahtera()
    {
        return $this->db->get('m_keluarga_sejahtera')->result();
    }

    public function getAgama()
    {
        return $this->db->get('m_penduduk_agama')->result();
    }

    public function getAsurasi()
    {
        return $this->db->get('m_penduduk_asuransi')->result();
    }

    public function getHubungan()
    {
        return $this->db->get('m_penduduk_hubungan')->result();
    }

    public function getKawin()
    {
        return $this->db->get('m_penduduk_kawin')->result();
    }

    public function getPekerjaan()
    {
        return $this->db->get('m_penduduk_pekerjaan')->result();
    }

    public function getPendidikan()
    {
        return $this->db->get('m_penduduk_pendidikan')->result();
    }

    public function getPendidikanKK()
    {
        return $this->db->get('m_penduduk_pendidikan_kk')->result();
    }

    public function getStatus()
    {
        return $this->db->get('m_penduduk_status')->result();
    }

    public function getUmur()
    {
        return $this->db->get('m_penduduk_umur')->result();
    }
    public function getWargaNegara()
    {
        return $this->db->get('m_penduduk_warganegara')->result();
    }
    public function getRtmHubungan()
    {
        return $this->db->get('m_rtm_hubungan')->result();
    }

    public function getSakitMenahun()
    {
        return $this->db->get('m_sakit_menahun')->result();
    }

    public function getStatusDasar()
    {
        return $this->db->get('m_status_dasar')->result();
    }

    public function getGolonganDarah()
    {
        return $this->db->get('m_golongan_darah')->result();
    }

    public function getCarakb()
    {
        return $this->db->get('m_cara_kb')->result();
    }
    public function getcacat()
    {
        return $this->db->get('m_cacat')->result();
    }

    public function getKeluarga()
    {
        return $this->db->get('data_keluarga')->result();
    }

    public function getKtpel()
    {
        return $this->db->get('m_penduduk_ktp')->result();
    }

    public function getStatusrekam()
    {
        return $this->db->get('m_penduduk_status_rekam')->result();
    }

    public function getJenisKelahiran()
    {
        return $this->db->get('m_penduduk_jenis_kelahiran')->result();
    }

    public function gettempatdilahirkan()
    {
        return $this->db->get('m_penduduk_tempat_dilahirkan')->result();
    }
    public function getPenolongkelahiran()
    {
        return $this->db->get('m_penduduk_penolong_dilahirkan')->result();
    }
    
}