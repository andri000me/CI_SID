<div class="card">
	<div class="card-header bg-primary">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"
			data-title="<?= $this->session->flashdata('title'); ?>"></div>
		<h5>Data Keluarga</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table-bordered table-striped table-hover" style="width:100%">
				<tbody>
					<tr>
						<td nowrap style="width:40%">Nomor Kartu Keluarga
							(KK)</td>
						<td nowrap style="width:60%"> : <?php echo $no_kk ?></td>
					</tr>
					<tr>
						<td nowrap style="width:40%">Kepala Keluarga</td>
						<td nowrap style="width:60%"> : <?php echo $kepala_keluarga ?> </td>
					</tr>
					<tr>
						<td nowrap style="width:40%"> Alamat </td>
						<td nowrap style="width:60%"> : <?php echo $alamat ?> RT - / RW - DUSUN </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="col-12">
				<a type="button" class="btn-sm btn-success my-2" data-toggle="modal" data-target="#modal-lg"
					data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i>
					Tambah Anggota Keluarga
				</a>
				<a href="<?php echo base_url(); ?>Keluarga/kartu_keluarga/<?php echo $id_kk ?>"
					class="btn-sm btn-warning my-2" title="Kartu Keluarga"><i class="fa fa-id-card "></i> Kartu Keluarga</a>
				<a href="<?php echo base_url(); ?>Keluarga" class="btn-sm btn-info my-2" title="Kembali Ke Halaman
						Keluarga"><i class="fa fa-arrow-circle-left "></i> Kembali Ke Halaman
					Keluarga</a>

			</div>
		</div>
		<div class="modal fade" id="modal-lg">
			<div class="modal-dialog modal-lg ">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Tambah Anggota Keluarga</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
							<table id="example" class="table table-bordered table-striped" style="width:100%">
								<thead class="bg-primary">
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">NIK</th>
										<th class="text-center">Nama Lengkap</th>
										<th class="text-center">Hubungan</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach($anggota_keluarga as $keluarga) :?>
									<tr>
										<td class="text-center"><?= $i++; ?></td>
										<td><?= $keluarga->nik; ?></td>
										<td><?= $keluarga->nama; ?></td>
										<td>
											<?php foreach ($rtm_level as $row): ?>
											<?php if ($row->id ==  $keluarga->rtm_level): ?>
											<?= $row->nama; ?>
											<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<form class="form-horizontal ui-front"
									action="<?php echo base_url(); ?>Keluarga/simpan_anggota" method="POST">
									<div class="form-group row">
										<label>Pilih Nama Penduduk (dari penduduk yang tidak memiliki No.
											KK)</label>
										<input type="hidden" class="form-control" name="id" id="id" value="">
										<input type="text" class="form-control tambah_anggota" name="nama" id="nama"
											value="" placeholder="Pilih Penduduk" required>
									</div>
									<div class="form-group row">
										<label>Hubungan Keluarga</label>
										<select class="form-control" name="rtm_level" required>
											<option value="">Pilih Hubungan Dalam Keluarga</option>
											<?php foreach ($hubungan as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah
										Data</button>
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<div class="table-responsive">
			<table id="example2" class="table table-bordered table-striped nowrap" style="width:100%">
				<thead class="bg-primary">
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama Lengkap</th>
						<th class="text-center">NIK</th>
						<th class="text-center">Tanggal Lahir</th>
						<th class="text-center">Jenis Kelamin</th>
						<th class="text-center">Hubungan</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach($anggota_keluarga as $anggota_keluarga) :?>
					<tr>
						<td class="text-center"><?= $i++; ?></td>
						<td><?= $anggota_keluarga->nama; ?></td>
						<td><?= $anggota_keluarga->nik; ?></td>
						<td><?= $anggota_keluarga->tanggallahir; ?></td>
						<td><?php if ($anggota_keluarga->sex== '1') { ?>
							LAKI - LAKI
							<?php } else if ($anggota_keluarga->sex== '2') {?>
							PEREMPUAN
							<?php } ?>
						</td>
						<td>
							<?php foreach ($rtm_level as $row): ?>
							<?php if ($row->id ==  $anggota_keluarga->rtm_level): ?>
							<?= $row->nama; ?>
							<?php endif; ?>
							<?php endforeach; ?>
						</td>
						<td>
							<center>
								<a href="<?php echo base_url(); ?>Keluarga/edit/<?= $anggota_keluarga->id; ?>"
									class="btn-sm btn-warning" title="Perbarui Data Penduduk"><i class="fa fa-edit"></i></a>
								<a href="<?php echo base_url(); ?>Keluarga/pecah_anggota/<?= $anggota_keluarga->id; ?>/<?= $anggota_keluarga->no_kk; ?>"
									class="btn-sm btn-primary" title="Pecah Keluarga"><i class="fa fa-cut"></i></a>
								<button type="button" class="btn-sm bg-dark" data-toggle="modal"
									data-target="#modal-lg-update<?= $anggota_keluarga->id; ?>" data-backdrop="static"
									data-keyboard="false" title="Perbarui Hubungan Keluarga">
									<i class="fa fa-bars"></i>
								</button>
							</center>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php $i = 1; foreach($modal_hubungan as $modal_perbarui) :?>
	<div class="modal fade" id="modal-lg-update<?= $modal_perbarui->id; ?>">
		<div class="modal-dialog modal-lg ">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h4 class="modal-title">Perbarui hubungan Anggota Keluarga</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table id="example2" class="table-bordered table-striped" style="width:100%">
							<thead class="bg-primary">
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">NIK</th>
									<th class="text-center">Nama Lengkap</th>
									<th class="text-center">Hubungan</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; foreach($perbarui_hubungan as $hubungan_keluarga) :?>
								<tr>
									<td class="text-center"><?= $i++; ?></td>
									<td><?= $hubungan_keluarga->nik; ?></td>
									<td><?= $hubungan_keluarga->nama; ?></td>
									<td>
										<?php foreach ($rtm_level as $row): ?>
										<?php if ($row->id ==  $hubungan_keluarga->rtm_level): ?>
										<?= $row->nama; ?>
										<?php endif; ?>
										<?php endforeach; ?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<form class="form-horizontal ui-front"
								action="<?php echo base_url(); ?>Keluarga/perbarui_hubungan" method="POST">
								<div class="form-group row">
									<label>Pilih Nama Penduduk (dari penduduk yang tidak memiliki No.
										KK)</label>
									<input type="hidden" class="form-control" name="id" id="id"
										value="<?= $modal_perbarui->id; ?>">
									<input type="text" class="form-control" name="nama" id="nama"
										value="<?= $modal_perbarui->nama; ?>" placeholder="Pilih Penduduk" disabled>
								</div>
								<div class="form-group row">
									<label>Hubungan Keluarga</label>
									<select class="form-control" name="rtm_level" required>
										<option value="">Pilih RT Level</option>
										<?php foreach ($hubungan as $row): ?>
										<option value="<?php echo $row->id; ?>"
											<?php if ($row->id == $modal_perbarui->rtm_level): ?> selected="selected"
											<?php endif; ?>>
											<?php echo $row->nama; ?>
										</option>
										<?php endforeach; ?>
									</select>
								</div>
								<button type="submit" name="tambah" class="btn btn-primary float-right">Perbarui
									Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<?php endforeach; ?>
	<!-- /.card-body -->
</div>
