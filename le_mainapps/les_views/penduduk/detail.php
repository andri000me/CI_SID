<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<?php foreach($penduduk as $penduduk) :?>
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">
					<h3 class="box-title">Biodata Penduduk (NIK : <?= $penduduk->nik; ?>)</h3></h3>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="float-right my-2">
							<a href="<?php echo base_url(); ?>Penduduk/edit/<?= $penduduk->id; ?>" class="btn-sm btn-warning mx-1 my-1" title="Ubah Biodata"><i
									class="fa fa-edit"></i>
								Ubah Biodata</a>
							<a href="<?php echo base_url(); ?>Penduduk/cetak/<?= $penduduk->id; ?>" class="btn-sm bg-purple mx-1 my-1" title="Cetak Biodata" target="_blank"><i
									class="fa fa-print"></i>Cetak
								Biodata</a>
							<a type="button" onclick="window.history.go(-1)" class="btn-sm btn-info mr-2" > <i class="fa fa-arrow-circle-left "></i> Kembali</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 mx-1 my-1">
						<div class="row">
							<div class="col-sm-12 ">
								<p class="m-0">
									Terdaftar sebelum:
									<i class="fa fa-clock-o"></i><?= $penduduk->created_at; ?> </p>
								<p class="m-0">
									Terakhir diubah:
									<i class="fa fa-clock-o"></i><?= $penduduk->updated_at; ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle"
									src="<?php echo base_url(); ?>l_asséts/foto/no_photo.jpg"
									alt="User profile picture">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
						</div>
						<div class="table-responsive">
							<table class="table-bordered table-striped table-hover" style="width:100%;">
								<tbody>
									<tr>
										<td>Status Dasar</td>
										<td>:</td>
										<td>
											<span class="">
												<strong>
													<?php foreach ($status_dasar as $row): ?>
													<?php if ($row->id == $penduduk->status_dasar): ?>
													<?= $row->nama; ?>
													<?php endif; ?>
													<?php endforeach; ?>
												</strong>
											</span>
										</td>
									</tr>
									<tr>
										<td width="300">Nama</td>
										<td width="1">:</td>
										<td><?= $penduduk->nama; ?></td>
									</tr>
									<tr>
										<td>Status Kepemilikan KTP</td>
										<td>:</td>
										<td>
											<table id='ektp' class="table table-bordered" style="width:100%">
												<tr>
													<th>Wajib KTP</th>
													<th>KTP-EL</th>
													<th>Status Rekam</th>
													<th>Tag ID Card</th>
												</tr>
												<tr>
													<td>WAJIB</td>
													<td>
														<?php foreach ($ktp_el as $row): ?>
														<?php if ($row->id == $penduduk->ktp_el): ?>
														<?= $row->nama; ?>
														<?php endif; ?>
														<?php endforeach; ?>
													</td>
													<td>
														<?php foreach ($status_rekam as $row): ?>
														<?php if ($row->id == $penduduk->status_rekam): ?>
														<?= $row->nama; ?>
														<?php endif; ?>
														<?php endforeach; ?>
													</td>
													<td><?= $penduduk->tag_id_card; ?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>Nomor Kartu Keluarga</td>
										<td>:</td>
										<td>
											<?php foreach ($keluarga as $row): ?>
											<?php if ($row->id == $penduduk->id_kk): ?>
											<?= $row->no_kk; ?>
											<?php endif; ?>
											<?php endforeach; ?>
											<?php if ($penduduk->id_kk == '0') { ?>
											Belum ada KK
											<?php } ?>
										</td>
									</tr>
									<tr>
										<td>Nomor KK Sebelumnya</td>
										<td>:</td>
										<td><?= $penduduk->no_kk_sebelumnya; ?></td>
									</tr>
									<tr>
										<td>Hubungan Dalam Keluarga</td>
										<td>:</td>
										<td>
											<?php foreach ($rtm_level as $row): ?>
											<?php if ($row->id == $penduduk->rtm_level): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Jenis Kelamin</td>
										<td>:</td>
										<td><?php if ($penduduk->sex== '1') { ?>
											LAKI - LAKI
											<?php } else if ($penduduk->sex== '2') {?>
											PEREMPUAN
											<?php } ?>
										</td>
									</tr>
									<tr>
										<td>Agama</td>
										<td>:</td>
										<td>
											<?php foreach ($agama as $row): ?>
											<?php if ($row->id == $penduduk->agama_id): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Status Penduduk</td>
										<td>:</td>
										<td><?php foreach ($status as $row): ?>
											<?php if ($row->id == $penduduk->status): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?></td>
									</tr>
									<tr>
										<th colspan="3" class="subtitle_head"><strong>DATA
												KELAHIRAN</strong></th>
									</tr>
									<tr>
										<td>Akta Kelahiran</td>
										<td>:</td>
										<td><?= $penduduk->akta_lahir; ?></td>
									</tr>
									<tr>
										<td>Tempat / Tanggal Lahir</td>
										<td>:</td>
										<td><?= $penduduk->tempatlahir; ?> / <?= $penduduk->tanggallahir; ?></td>
									</tr>
									<tr>
										<td>Tempat Dilahirkan</td>
										<td>:</td>
										<td><?php foreach ($tempat_dilahirkan as $row): ?>
											<?php if ($row->id == $penduduk->tempat_dilahirkan): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Jenis Kelahiran</td>
										<td>:</td>
										<td><?php foreach ($jenis_kelahiran as $row): ?>
											<?php if ($row->id == $penduduk->jenis_kelahiran): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Kelahiran Anak Ke</td>
										<td>:</td>
										<td><?= $penduduk->kelahiran_anak_ke; ?></td>
									</tr>
									<tr>
										<td>Penolong Kelahiran</td>
										<td>:</td>
										<td><?php foreach ($penolong_kelahiran as $row): ?>
											<?php if ($row->id == $penduduk->penolong_kelahiran): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Berat Lahir</td>
										<td>:</td>
										<td><?= $penduduk->berat_lahir; ?> Gram</td>
									</tr>
									<tr>
										<td>Panjang Lahir</td>
										<td>:</td>
										<td><?= $penduduk->panjang_lahir; ?> cm</td>
									</tr>
									<tr>
										<th colspan="3" class="subtitle_head"><strong>PENDIDIKAN DAN
												PEKERJAAN</strong></th>
									</tr>
									<tr>
										<td>Pendidikan dalam KK</td>
										<td>:</td>
										<td><?php foreach ($pendidikan_kk as $row): ?>
											<?php if ($row->id == $penduduk->pendidikan_kk_id): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Pendidikan sedang ditempuh</td>
										<td>:</td>
										<td><?php foreach ($pendidikan as $row): ?>
											<?php if ($row->id == $penduduk->pendidikan_sedang_id): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Pekerjaan</td>
										<td>:</td>
										<td><?php foreach ($pekerjaan as $row): ?>
											<?php if ($row->id == $penduduk->pekerjaan_id): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<th colspan="3" class="subtitle_head"><strong>DATA
												KEWARGANEGARAAN</strong>
										</th>
									</tr>
									<tr>
										<td>Warga Negara</td>
										<td>:</td>
										<td><?php foreach ($warganegara as $row): ?>
											<?php if ($row->id == $penduduk->warganegara_id): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Nomor Paspor</td>
										<td>:</td>
										<td><?= $penduduk->dokumen_pasport; ?></td>
									</tr>
									<tr>
										<td>Tanggal Berakhir Paspor</td>
										<td>:</td>
										<td><?= $penduduk->tanggal_akhir_paspor; ?></td>
									</tr>
									<tr>
										<td>Nomor KITAS/KITAP</td>
										<td>:</td>
										<td><?= $penduduk->dokumen_kitas; ?></td>
									</tr>
									<tr>
										<th colspan="3" class="subtitle_head"><strong>ORANG
												TUA</strong></th>
									</tr>
									<tr>
										<td>NIK Ayah</td>
										<td>:</td>
										<td><?= $penduduk->ayah_nik; ?></td>
									</tr>
									<tr>
										<td>Nama Ayah</td>
										<td>:</td>
										<td><?= $penduduk->nama_ayah; ?></td>
									</tr>
									<tr>
										<td>NIK Ibu</td>
										<td>:</td>
										<td><?= $penduduk->ibu_nik; ?></td>
									</tr>
									<tr>
										<td>Nama Ibu</td>
										<td>:</td>
										<td><?= $penduduk->nama_ibu; ?></td>
									</tr>
									<tr>
										<th colspan="3" class="subtitle_head">
											<strong>ALAMAT</strong></th>
									</tr>
									<tr>
										<td>Nomor Telepon</td>
										<td>:</td>
										<td><?= $penduduk->telepon; ?></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td><?= $penduduk->alamat_sekarang; ?></td>
									</tr>
									<!-- <tr>
										<td>Dusun</td>
										<td>:</td>
										<td>MANGSIT</td>
									</tr>
									<tr>
										<td>RT/ RW</td>
										<td>:</td>
										<td>004 / -</td>
									</tr> -->
									<tr>
										<td>Alamat Sebelumnya</td>
										<td>:</td>
										<td><?= $penduduk->alamat_sebelumnya; ?></td>
									</tr>
									<tr>
										<th colspan="3" class="subtitle_head"><strong>STATUS
												KAWIN</strong></th>
									</tr>
									<tr>
										<td>Status Kawin</td>
										<td>:</td>
										<td><?php foreach ($kawin as $row): ?>
											<?php if ($row->id == $penduduk->status_kawin): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<th colspan="3" class="subtitle_head"><strong>DATA
												KESEHATAN</strong></th>
									</tr>
									<tr>
										<td>Golongan Darah</td>
										<td>:</td>
										<td><?php foreach ($golongan_darah as $row): ?>
											<?php if ($row->id == $penduduk->golongan_darah_id): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Cacat</td>
										<td>:</td>
										<td><?php foreach ($cacat as $row): ?>
											<?php if ($row->id == $penduduk->cacat_id): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Sakit Menahun</td>
										<td>:</td>
										<td><?php foreach ($sakit_menahun as $row): ?>
											<?php if ($row->id == $penduduk->sakit_menahun_id): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<td>Nama Asuransi</td>
										<td>:</td>
										<td><?php foreach ($id_asuransi as $row): ?>
											<?php if ($row->id == $penduduk->id_asuransi): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
