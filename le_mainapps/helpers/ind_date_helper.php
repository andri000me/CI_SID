<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tgl_indo'))
{
	function tgl_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun;
	}
}

if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

if ( ! function_exists('nama_hari'))
{
	function nama_hari($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}
}

if ( ! function_exists('smartdate'))
{
	function smartdate($wkt)
	{
		$waktu=array(	365*24*60*60	=> "tahun",
						30*24*60*60		=> "bulan",
						7*24*60*60		=> "minggu",
						24*60*60		=> "hari",
						60*60			=> "jam",
						60				=> "menit",
						1				=> "detik");

		$hitung = (strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt)-60*60;
		$hasil = array();
		//echo $hitung.'-----';
		if($hitung<5)
		{
			return 'kurang dari 5 detik yang lalu';
		}
		else
		{
			$stop = 0;$i=0;
			foreach($waktu as $periode => $satuan)
			{
				if($stop>=6 || ($stop>0 && $periode<60)) break;
				$bagi = floor($hitung/$periode);
				if($bagi > 0)
				{
					$hasil[$i]['periode'] = $bagi;
					$hasil[$i]['satuan'] = $satuan;
					$hitung -= $bagi*$periode;
					$stop++;$i++;
				}
				else if($stop>0) $stop++;
			}
			//$hasil=implode(' ',$hasil).' yang lalu';
			
			//$tes = count($hasil);
			//if($tes == 2) $hasil = $hasil[0];
			//else $hasil=implode(' ',$hasil);
			
			foreach($hasil as $key){
				//echo $key['periode'].$key['satuan'].' ';
				if($key['satuan']=='tahun'){
					return $key['periode'].' '.$key['satuan'].' yang lalu';
				}
				else if($key['satuan']=='bulan'){
					return $key['periode'].' '.$key['satuan'].' yang lalu';
				}
				else if($key['satuan']=='minggu'){
					return $key['periode'].' '.$key['satuan'].' yang lalu';
				}
				else if($key['satuan']=='hari'){
					return $key['periode'].' '.$key['satuan'].' yang lalu';
				}
				else if($key['satuan']=='jam'){
					return $key['periode'].' '.$key['satuan'].' yang lalu';
				}
				else if($key['satuan']=='menit'){
					return $key['periode'].' '.$key['satuan'].' yang lalu';
				}
				else if($key['satuan']=='detik'){
					return $key['periode'].' '.$key['satuan'].' yang lalu';
				}
			}
		}
		//return $hasil.' yang lalu';
	}
}
