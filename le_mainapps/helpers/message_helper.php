<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('chatting_getchatdata'))
{
	function chatting_getchatdata($numb){
		$CI =& get_instance();
		//define variable
		$temp_array = array();$i = 0;$numb_gue = 'Anda';
		
		//input isi tabel inbox ke variabel $temp_array
		$condibx['SenderNumber like'] = '%'.$numb.'%';
		$d1 = $CI->msg_m->get_inbox_by($condibx);
		if($d1->num_rows()>0){
			foreach($d1->result() as $r1){
				$msg = $r1->TextDecoded;
				if(empty($msg)||$msg==' ')$msg = '<kosong>';
				$temp_img = false;$temp_nama = "<span class='direct-chat-name pull-left' style='cursor:default'>".$r1->SenderNumber."</span>";
				$d2 = $CI->mhs_m->get_mhs_byno(PlusToZero($r1->SenderNumber));
				if($d2->num_rows()==1){
					$r2 = $d2->row();
					$temp_img = $r2->foto;
					$temp_nama = "<span class='direct-chat-name pull-left' style='cursor:default' title='Kontak : ".$r1->SenderNumber."'>".$r2->nama."</span>";
				}
				$ibx_tipe = NULL;
				if($r1->tipe)$ibx_tipe = "<code>$r1->tipe</code>";
				$temp_array[$i]['img'] = $temp_img;
				$temp_array[$i]['ID'] = $r1->ID;
				$temp_array[$i]['no_pengirim'] = $temp_nama;
				$temp_array[$i]['no_penerima'] = '';
				$temp_array[$i]['isi_pesan'] = htmlspecialchars($msg);
				$temp_array[$i]['waktu'] = $r1->ReceivingDateTime;
				$temp_array[$i]['tipe'] = $ibx_tipe;
				$i++;
			}
		}
		
		//input isi tabel inbox ke variabel $temp_array
		$condsbx['DestinationNumber like'] = '%'.$numb.'%';
		$d2 = $CI->msg_m->get_sendbox_by($condsbx);
		if($d2->num_rows()>0){
			foreach($d2->result() as $r2){
				$msg = $r2->TextDecoded;
				if(empty($msg)||$msg==' ')$msg = '<kosong>';
				$temp_array[$i]['img'] = false;
				$temp_array[$i]['ID'] = $r2->ID;
				$temp_array[$i]['no_pengirim'] = '';
				$temp_array[$i]['no_penerima'] = $numb_gue;
				$temp_array[$i]['isi_pesan'] = htmlspecialchars($msg);
				$temp_array[$i]['tipe'] = $ibx_tipe;
				$temp_array[$i]['waktu'] = $r2->SendingDateTime;
				$i++;
			}
		}
		
		//sorting variabel $temp_array by date then return
		return array_chunk(sorting_chatdata_bydatetime($temp_array,'waktu', 'desc'), 5);
		
	}
	
}

if ( ! function_exists('sorting_chatdata_bydatetime'))
{
	function sorting_chatdata_bydatetime($array,$keysort_datetime, $order){
		$CI =& get_instance();
		$a = array();$b = array();
		usort($array, function ($a, $b) use(&$keysort_datetime,&$order){
			if($order == 'asc') return strtotime($a[$keysort_datetime]) - strtotime($b[$keysort_datetime]);
			else return strtotime($b[$keysort_datetime]) - strtotime($a[$keysort_datetime]);
		});
		unset($a);unset($b);
		
		return $array;
	}
}

if ( ! function_exists('chatting_contact'))
{
	function chatting_contact(){
		$CI =& get_instance();
		$temp_array = array();$i=0;
		$d1 = $CI->msg_m->get_inbox_groupbyno();
		if($d1->num_rows()>0){
			foreach($d1->result() as $r1){
				$temp_img = false;$temp_nama = $r1->SenderNumber;
				$d2 = $CI->mhs_m->get_mhs_byno(PlusToZero($r1->SenderNumber));
				if($d2->num_rows()==1){
					$r2 = $d2->row();
					$temp_img = $r2->foto;
					$temp_nama = "<span title='".$r1->SenderNumber."'>".$r2->nama."</span>";
				}
				
				$enc_numb = encode_url(PlusToZero($r1->SenderNumber), 'cmbsii_msgchatting');

				$temp_array[$i]['img'] = $temp_img;
				$temp_array[$i]['pengirim'] = $temp_nama;
				$temp_array[$i]['nomor'] = $enc_numb;
				$temp_array[$i]['isi_pesan'] = htmlspecialchars(shortmsg($r1->TextDecoded,50));
				$temp_array[$i]['waktu'] = $r1->ReceivingDateTime;
				$i++;
			}
		}
		return $temp_array;
	}
}

//======================================================================================================
if ( ! function_exists('generate_pesanlayanan'))
{
	function generate_pesanlayanan($id){
		$CI =& get_instance();
		$i = 0;$pesan = array();
		$data = $CI->msg_m->get_inbox_pesanlayanan($id);
		foreach($data->result() as $chat){$i++;
		//if(in_array($chat->id_user,$user_allow)){
			$def_usrimg = 'def_user_picture.jpg';
			
			//=============== ambil data user ==================
			$usr_foto = NULL;$usr_nama = NULL;
			$usr = $CI->user_m->get_UserById($chat->id_user_pengirim);
			if($usr->num_rows()==1){
				$usr = $usr->row();
				$usr_foto = $usr->foto;$usr_nama = $usr->nama;
			}
			//=============== end ==================
			
			if($usr_foto)$def_usrimg = $usr_foto;
			$isipesan = '&nbsp;';
			if($chat->TextDecoded)$isipesan = htmlspecialchars($chat->TextDecoded);
			if($chat->id_user_pengirim == $id){
				$pesan[] = "<div id='pesan".$i."' class='col-sm-offset-0 direct-chat-msg right'>
						<div class='direct-chat-info clearfix'> <span class='direct-chat-name pull-right'>Anda</span> <span class='direct-chat-timestamp pull-left' style='cursor:default;margin-left:0px' title='".tgl_indo(date('Y-m-d',strtotime($chat->UpdatedInDB))).' pukul '.date('H:i',strtotime($chat->UpdatedInDB))."'>".smartdate(strtotime($chat->UpdatedInDB))."</span> </div>
						<img class='direct-chat-img' src='".base_url('asset/dist/img/usr/thumb/thumb_'.$def_usrimg)."' alt='message user image' />
						<div class='direct-chat-text'>".$isipesan." </div>
					  </div>";
			}else{
				$pesan[] = "<div id='pesan".$i."' class='direct-chat-msg'>
						<div class='row'>
						<div class='col-sm-12'>
							<div class='direct-chat-info clearfix'><strong>".$usr_nama."</strong><span class='direct-chat-timestamp pull-right' style='cursor:default;margin-right:0px' title='".tgl_indo(date('Y-m-d',strtotime($chat->UpdatedInDB))).' pukul '.date('H:i',strtotime($chat->UpdatedInDB))."'>".smartdate(strtotime($chat->UpdatedInDB))."</span> </div>
							<img class='direct-chat-img' src='".base_url('asset/dist/img/usr/thumb/thumb_'.$def_usrimg)."' alt='message user image' />
							<div class='direct-chat-text'>".$isipesan."</div>
							
						</div>
						</div>
					  </div>";
			}
		//}
		}
		//$pesan[] = implode('|',$user_allow);
		
		return implode('',$pesan);
	}
}


if ( ! function_exists('kirim_pesan'))
{
	function kirim_pesan($no,$msg,$flash=-1,$ibx=NULL,$send='T',$msg_suc=NULL,$msg_fail=NULL,$kir=NULL,$idu=NULL){
		$CI =& get_instance();$alert = array();
		if(in_array('W',$kir)){
			$dataibx = array(
				'Text' => 0,
				'UDH' => 0,
				'RecipientID' => 0,
				'ntf' => 1,
				'tipe' => 'web',
				'status' => 'r',
				'TextDecoded' => $msg,
				'id_user_pengirim' => get_logusr()->id_user,
				'id_user_penerima' => $idu,
				'ReceivingDateTime' => date('Y-m-d H:i:s'),
				'SenderNumber' => get_logusr()->telp
			);
			$datasbx = array(
				'Text' => 0,
				'UDH' => 0,
				'SenderID' => 0,
				'ID' => rdmnbr(5),
				'tipe' => 'web',
				'TextDecoded' => $msg,
				'SendingDateTime' => date('Y-m-d H:i:s'),
				'InsertIntoDB' => date('Y-m-d H:i:s'),
				'DestinationNumber' => $no
			);
			$CI->msg_m->insert_inbox($dataibx);
			$CI->msg_m->insert_sendbox($datasbx);
			return "Info!|s|Pesan Web dikirim!";
		}
		if(in_array('S',$kir)){
			//return "INFO!|s|".var_dump($kir);
			if($no!=''&&$send=='Y'){
				// buat id pesan balasan dari pesan terkirim
				$d1 = $CI->msg_m->get_outbox_tblstt();
				if($d1->num_rows>0){
					$r1 = $d1->row();
					$sentID = $r1->Auto_increment;
				}
				$d2 = $CI->msg_m->get_inbox_byid($ibx);
				if($d2->num_rows>0){
					$r2 = $d2->row();
					$dtinbox = array(
						'recipientid' => $r2->RecipientID.'|'.$sentID
					);
					$condinbox = array(
						'id' => $ibx
					);
					//menandai pengirim dan penerima pesan
					$CI->msg_m->update_inbox($condinbox,$dtinbox);
				}
				// hitung berapa jumlah sms dengan membaginya dengan 160
				$jumsms = ceil(strlen($msg)/160);
				//echo $jumsms;
				// process jika jumlah sms hanya 1
				if($jumsms<=1){
					$dtoutbox = array(
						'InsertIntoDB' => date('Y-m-d H:i:s'),
						'SendingDateTime' => date('Y-m-d H:i:s'),
						'DestinationNumber' => $no,
						'TextDecoded' => $msg,
						'SendingTimeOut' => date('Y-m-d H:i:s'),
						'DeliveryReport' => 'yes',
						'CreatorID' => 'system',
						'Class' => $flash
					);
					if($CI->msg_m->insert_outbox($dtoutbox)){
						return $msg_fail;
					}else{
						return $msg_suc;
					}
				}else
				// process jika jumlah sms lebih dari 1
				if($jumsms>1){
					// menghitung jumlah pecahan
					$hitpecah = ceil(strlen($msg)/153);
					// memecah pesan asli
					$pecah = str_split($msg, 153);
					// membuat nilai ID untuk di insert di outbox
					$d3 = $CI->msg_m->get_outbox_tblstt();
					$r3 = $d3->row();
					$newID = ($r3->Auto_increment)+1;
					$temp = rdmudh(2);
					// proses penyimpanan ke tabel outbox dan outbox_multipart untuk setiap pecahan
					for ($i=1; $i<=$jumsms; $i++){
						$dtoutbox = array();
						// membuat UDH untuk setiap pecahan, sesuai urutannya
						$udh = "050003".strtoupper($temp).sprintf("%02s", $hitpecah).sprintf("%02s", $i);
						// membaca text setiap pecahan
						$msg = $pecah[$i-1];
						echo "<br>".$i.' '.$msg;
						if ($i == 1){
							$dtoutbox = array(
								'ID' => $newID,
								'UDH' => $udh,
								'MultiPart' => 'true',
								'InsertIntoDB' => date('Y-m-d H:i:s'),
								'SendingDateTime' => date('Y-m-d H:i:s'),
								'DestinationNumber' => $no,
								'TextDecoded' => $msg,
								'SendingTimeOut' => date('Y-m-d H:i:s'),
								'DeliveryReport' => 'yes',
								'CreatorID' => 'system',
								'Class' => $flash
							);
							// jika merupakan pecahan pertama, maka masukkan ke tabel OUTBOX
							if($CI->msg_m->insert_outbox($dtoutbox)){
								return $msg_fail;
							}else{
								return $msg_suc;
							}
						}else{
							$dtoutbox = array(
								'ID' => $newID,
								'UDH' => $udh,
								'SequencePosition' => $i,
								'TextDecoded' => $msg
							);
							// jika bukan merupakan pecahan pertama, simpan ke tabel OUTBOX_MULTIPART
							$CI->msg_m->insert_outbox_multipart($dtoutbox);
						}				
					}
				}
			}else return "Maaf!|e|Nomor tujuan pengiriman tidak diketahui..!!";	
		}
	}
}

if ( ! function_exists('get_userInbox'))
{
	function get_userInbox(){
		$CI =& get_instance();$i = 0;$datainbox = array();
		$color = array('aqua','green','teal','purple','maroon','red','yellow');
		$ibx = $CI->msg_m->get_inbox_pesanmhs(get_logusr()->id_user);
		//return var_dump($ibx->result());
		$def_con = $CI->session->userdata("cmbsiidefault_controller");
		if($ibx->num_rows()>0){
			foreach($ibx->result() as $ibx){
				if($ibx->SenderNumber!=get_logusr()->telp){$i++;
					$ibx_link = encode_url(PlusToZero($ibx->SenderNumber)."|".$ibx->id_user_pengirim, 'cmbsii_msgchatting');
					$temp = phonenumber_getnameandimg(PlusToZero($ibx->SenderNumber));
					$ibx_img = "<img width='35px' height='35px' class='img-circle' src='".base_url("asset/dist/img/usr/thumb/thumb_$temp[img]")."'></img>";
					$ibx_no = PlusToZero($ibx->SenderNumber);
					$ceknew = $CI->msg_m->count_newInbox_byno(substr(PlusToZero($ibx->SenderNumber),1,15));
					$new = NULL;
					if($ceknew>0){
						$new = '<span class="badge bg-'.$color[mt_rand(0, count($color) - 1)].'">'.$ceknew.'</span>';
					}
					$ibx_pengirim = "<span title='Kontak : $ibx->SenderNumber\nNPM : $temp[uname]'>$temp[nama] $new</span><br>";
					$ibx_isipesan = htmlspecialchars(shortmsg($ibx->TextDecoded,15));
					$ibx_waktu = '<span title="'.tgl_indo(date('Y-m-d',strtotime($ibx->ReceivingDateTime))).' pukul '.date('H:i',strtotime($ibx->ReceivingDateTime)).'">'.str_replace("yang lalu","",smartdate(strtotime($ibx->ReceivingDateTime))).'</span>';
					$datainbox[] = "<li><a href='".base_url("$def_con/msg/inbox.asp?nmB=$ibx_link")."'>
										<div class='pull-left'>$ibx_img</div>
										
											$ibx_pengirim
											<small class='pull-right'><i class='fa fa-clock-o'></i> $ibx_waktu</small>
										
										<p>$ibx_isipesan</p>
									  </a></li>";
				}
			}
			return implode('',$datainbox);
		}
	}
}


