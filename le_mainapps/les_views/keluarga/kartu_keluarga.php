<style>
	table,
	label,
	p {
		font-size: 12px;
	}
	.keterangan label, .keterangan p {
		margin: 0;
	}
</style>
<script language="JavaScript">
	var tanggallengkap = new String();
	var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
	namahari = namahari.split(" ");
	var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
	namabulan = namabulan.split(" ");
	var tgl = new Date();
	var hari = tgl.getDay();
	var tanggal = tgl.getDate();
	var bulan = tgl.getMonth();
	var tahun = tgl.getFullYear();
	tanggallengkap = tanggal + " " + namabulan[bulan] + " " + tahun;
</script>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<form action="" method="post">
						<div class="row">
							<div class="col-md-12">
								<div class="box box-info">
									<div class="box-header with-border">
										<a href="" class="btn-sm bg-purple" target="_blank"><i class="fa fa-print "></i>
											Cetak</a>
										<a href="" class="btn-sm bg-dark" target="_blank"><i class="fa fa-download"></i>
											Unduh</a>
										<a href="<?php echo base_url(); ?>Keluarga/detail/<?= $id_kk; ?>/<?= $id_cluster; ?>" class="btn-sm btn-info" title="Kembali Ke Daftar Anggota Keluarga">
											<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Keluarga
										</a>
									</div>

									<div class="box-header mt-5">
										<h3 class="text-center"><strong>SALINAN KARTU KELUARGA</strong></h3>
										<h5 class="text-center">
											<strong>No. <?= $no_kk; ?>
											</strong>
										</h5>

									</div>
									<div class="box-body">
										<div class="row keterangan">
											<div class="col-sm-8">
												<div class="form-group">
													<label class="col-sm-3 control-label">ALAMAT</label>
													<div class="col-sm-8">
														<p class="text-muted">:
															<?php foreach ($keluarga as $row): ?>
															<?php if ($row->id == $this->session->userdata('id_kk')): ?>
															<?= $row->alamat; ?>
															<?php endif; ?>
															<?php endforeach; ?>
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">RT/RW</label>
													<div class="col-sm-9">
														<p class="text-muted">: </p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">DESA / KELURAHAN</label>
													<div class="col-sm-9">
														<p class="text-muted">: </p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">KECAMATAN</label>
													<div class="col-sm-9">
														<p class="text-muted">: </p>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-sm-5 control-label">KABUPATEN</label>
													<div class="col-sm-7">
														<p class="text-muted">: </p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-5 control-label">KODE POS</label>
													<div class="col-sm-7">
														<p class="text-muted">: </p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-5 control-label">PROVINSI</label>
													<div class="col-sm-7">
														<p class="text-muted">: </p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-5 control-label">JUMLAH ANGGOTA</label>
													<div class="col-sm-7">
														<p class="text-muted">:
															<?php echo $jumlah_keluarga ?>
														</p>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table-bordered table-hover" style="width:100%;">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th class="text-center">No</th>
																<th class="text-center">Nama Lengkap</th>
																<th class="text-center">NIK</th>
																<th class="text-center">Jenis Kelamin</th>
																<th class="text-center">Tempat Lahir</th>
																<th class="text-center">Tanggal Lahir</th>
																<th class="text-center">Agama</th>
																<th class="text-center">Pendidikan</th>
																<th class="text-center">Jenis Pekerjaan</th>
																<th class="text-center">Golongan Darah</th>
															</tr>
														</thead>
														<tbody>
															<?php $i = 1; foreach($anggota_keluarga as $anggota_keluarga) :?>
															<tr>
																<td class="text-center"><?= $i++; ?></td>
																<td><?= $anggota_keluarga->nama; ?></td>
																<td><?= $anggota_keluarga->nik; ?></td>
																<td><?php if ($anggota_keluarga->sex== '1') { ?>
																	LAKI - LAKI
																	<?php } else if ($anggota_keluarga->sex== '2') {?>
																	PEREMPUAN
																	<?php } ?>
																</td>
																<td><?= $anggota_keluarga->tempatlahir; ?></td>
																<td><?= $anggota_keluarga->tanggallahir; ?></td>
																<td>
																	<?php foreach ($agama as $row): ?>
																	<?php if ($row->id ==  $anggota_keluarga->agama_id): ?>
																	<?= $row->nama; ?>
																	<?php endif; ?>
																	<?php endforeach; ?>
																</td>
																<td>
																	<?php foreach ($pendidikan_kk as $row): ?>
																	<?php if ($row->id ==  $anggota_keluarga->pendidikan_kk_id): ?>
																	<?= $row->nama; ?>
																	<?php endif; ?>
																	<?php endforeach; ?>
																</td>
																<td>
																	<?php foreach ($pekerjaan as $row): ?>
																	<?php if ($row->id ==  $anggota_keluarga->pekerjaan_id): ?>
																	<?= $row->nama; ?>
																	<?php endif; ?>
																	<?php endforeach; ?>
																</td>
																<td>
																	<?php foreach ($golongan_darah as $row): ?>
																	<?php if ($row->id ==  $anggota_keluarga->golongan_darah_id): ?>
																	<?= $row->nama; ?>
																	<?php endif; ?>
																	<?php endforeach; ?>
																</td>
															</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table-bordered table-hover" style="width:100%;">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th class="text-center">No</th>
																<th class="text-center">Status Perkawinan</th>
																<th class="text-center">Tanggal Perkawinan</th>
																<th class="text-center">Status Hubungan Dalam Keluarga
																</th>
																<th class="text-center">Kewarganegaraan</th>
																<th class="text-center">No. Paspor</th>
																<th class="text-center">No. KITAS / KITAP</th>
																<th class="text-center">Nama Ayah</th>
																<th class="text-center">Nama Ibu</th>
															</tr>
														</thead>
														<tbody>
															<?php $i = 1; foreach($informasi_keluarga as $informasi_keluarga) :?>
															<tr>
																<td class="text-center">1</td>
																<td>
																	<?php foreach ($kawin as $row): ?>
																	<?php if ($row->id ==  $informasi_keluarga->status_kawin): ?>
																	<?= $row->nama; ?>
																	<?php endif; ?>
																	<?php endforeach; ?>
																</td>
																<td class="text-center">
																	<?php if ($informasi_keluarga->tanggalperkawinan == '0000-00-00') { ?>
																	-
																	<?php } else {?>
																	<?= $informasi_keluarga->tanggalperkawinan; ?>
																	<?php } ?>
																</td>
																<td>
																	<?php foreach ($rtm_level as $row): ?>
																	<?php if ($row->id ==  $informasi_keluarga->rtm_level): ?>
																	<?= $row->nama; ?>
																	<?php endif; ?>
																	<?php endforeach; ?>
																</td>
																<td>WNI</td>
																<td class="text-center">
																	<?php if ($informasi_keluarga->dokumen_pasport == '') { ?>
																	-
																	<?php } else {?>
																	<?= $informasi_keluarga->dokumen_pasport; ?>
																	<?php } ?>
																</td>
																<td class="text-center">
																	<?php if ($informasi_keluarga->dokumen_kitas == '0') { ?>
																	-
																	<?php } else {?>
																	<?= $informasi_keluarga->dokumen_kitas; ?>
																	<?php } ?></td>
																<td><?= $informasi_keluarga->nama_ayah; ?></td>
																<td><?= $informasi_keluarga->nama_ibu; ?></td>
															</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
												<div class="table-responsive">
													<table class="no-border" style="width:100%;">
														<tbody>
															<tr>
																<td width="25%">&nbsp;</td>
																<td width="50%">&nbsp;</td>
																<td class="text-center" width="25%">Senggig1 , <script
																		language='JavaScript'>
																		document.write(tanggallengkap);
																	</script>
																</td>
															</tr>
															<tr>
																<td class="text-center">KEPALA KELUARGA</td>
																<td>&nbsp;</td>
																<td class="text-center">KEPALA DESA SENGGIG1 </td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
															</tr>
															<tr>
																<td class="text-center"><?= $kepala_keluarga; ?></td>
																<td width="50%">&nbsp;</td>
																<td class="text-center">MUHAMMAD ILHAM </td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
