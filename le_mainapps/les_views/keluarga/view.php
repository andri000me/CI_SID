<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-header">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"
			data-title="<?= $this->session->flashdata('title'); ?>"></div>
		<div class="input-group-prepend">
			<button type="button" class="btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
				Tambah KK Baru
			</button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="<?php echo base_url(); ?>Keluarga/tambah_penduduk_kk_baru"><i class="fa fa-plus"></i> Tambah Penduduk Baru</a>
				<a class="dropdown-item" data-toggle="modal" data-target="#modal-lg"
					data-backdrop="static" data-keyboard="false">
					<i class="fa fa-plus"></i> Dari Penduduk Yang sudah Ada
				</a>
			</div>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="modal fade" id="modal-lg">
			<div class="modal-dialog modal-lg ">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Tambah Kartu Keluarga Baru</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<form class="form-horizontal ui-front"
									action="<?php echo base_url(); ?>Keluarga/simpanKKPendudukYangSudahAda" method="POST">
									<div class="form-group row">
										<label>No KK Baru</label>
										<input type="text" class="form-control" name="no_kk"
											value="" placeholder="Masukan No KK" required>
									</div>
									<div class="form-group row">
										<label>Pilih Nama Penduduk (dari penduduk yang tidak memiliki No.
											KK)</label>
										<input type="hidden" class="form-control" name="id" id="id" value="">
										<input type="text" class="form-control title" name="nama" id="nama"
											value="" placeholder="Pilih Penduduk" required>
										<input type="text" class="form-control" name="id_cluster" id="id_cluster"
											value="">
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
	<div class="card-body">
		<table id="example1" class="table table-responsive table-bordered table-striped nowrap" style="width:100%">
			<thead class="bg-primary">
				<tr>
					<th>No</th>
					<th>No KK</th>
					<th>Kepala Keluarga</th>
					<th>NIK</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Dusun</th>
					<th>RT</th>
					<th>RW</th>
					<th>Tanggal Daftar</th>
					<th>Tanggal Cetak KK</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; foreach($keluarga->result() as $keluarga) : ?>
				<tr>
					<td style=" text-align:center"><?= $i++; ?></td>
					<td style=" text-align:center"><?= $keluarga->no_kk; ?></td>
					<td style=" text-align:center"><?= $keluarga->nama; ?></td>
					<td style=" text-align:center"><?= $keluarga->nik; ?></td>
					<td style=" text-align:center">
						<?php if ($keluarga->sex== '1') { ?>
						LAKI - LAKI
						<?php } else if ($keluarga->sex== '2') {?>
						PEREMPUAN
						<?php } ?>
					</td>
					<td style=" text-align:center"><?= $keluarga->alamat; ?></td>
					<td style=" text-align:center"></td>
					<td style=" text-align:center"></td>
					<td style=" text-align:center"></td>
					<td style=" text-align:center"><?=date("Y-m-d", strtotime($keluarga->tgl_daftar))?></td>
					<td style=" text-align:center">
						<?php if ($keluarga->tgl_cetak_kk== '') { ?>
						-
						<?php } else  {?>
						<?=date("Y-m-d", strtotime($keluarga->tgl_cetak_kk))?>
						<?php } ?>
					</td>
					<td style="text-align:center">
						<center>
							<a href="<?php echo base_url(); ?>Keluarga/detail/<?= $keluarga->id_kk; ?>/<?= $keluarga->id_cluster; ?>"
								class="btn-sm btn-primary" title="Detail Keluarga"><i class="fa fa-eye"></i></a>
							<a href=""
								class="btn-sm btn-warning" title="Perbarui Data"><i class="fa fa-edit"></i></a>
							<a href="<?php echo base_url(); ?>Keluarga/hapus/<?= $keluarga->id_kk; ?>"
								class="btn-sm btn-danger tombol-hapus" title="Hapus Data"><i class="fa fa-trash"></i></a>
						</center>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>
