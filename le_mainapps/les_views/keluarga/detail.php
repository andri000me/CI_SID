<div class="card">
	<div class="card-header">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"
	data-title="<?= $this->session->flashdata('title'); ?>"></div>
		<h5>Kepala Keluarga</h5>
		<table id="example2" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>NIK</th>
					<th>Jenis Kelamin</th>
					<th>Tempat, Tanggal Lahir</th>
					<th>Status</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				foreach($kepala->result() as $kk) :
				?>
				<tr>
					<td style=" text-align:center"><?= $i++; ?></td>
					<td style=" text-align:center">
						<a href="<?php echo base_url(); ?>penduduk/detail/<?= $kk->nik; ?>"><?= $kk->nama; ?></a>
					</td>
					<td style=" text-align:center"><?= $kk->nik; ?></td>
					<td style=" text-align:center">
						<?php if ($kk->sex== '1') { ?>
						Pria
						<?php } else if ($kk->sex== '2') {?>
						Wanita
						<?php } ?>
					</td>
					<td style=" text-align:center"><?= $kk->tempatlahir; ?>, <?= $kk->tanggallahir; ?></td>
					<td style=" text-align:center">
						<?php foreach ($status_dasar as $row): ?>
						<?php if ($row->id == $kk->status_dasar): ?>
						<?= $row->nama; ?>
						<?php endif; ?>
						<?php endforeach; ?>
					</td>
					<td style=" text-align:center">
						<a href="<?php echo base_url(); ?>keluarga/edit/<?= $kk->id; ?>"
							class="btn btn-warning btn-sm" title="Perbarui">Perbarui</a>
						<a href="<?php echo base_url(); ?>keluarga/hapus/<?= $kk->id; ?>" class="btn btn-danger btn-sm tombol-hapus"
							title="Hapus">Hapus</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<h5>Anggota Keluarga</h5>
			<a href="<?php echo base_url(); ?>Keluarga/tambah" class="btn btn-success btn-sm my-2 float-right">Tambah
				Anggota Keluarga</a>
		<table id="example2" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>NIK</th>
					<th>Jenis Kelamin</th>
					<th>Tempat, Tanggal Lahir</th>
					<th>Status</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				foreach($keluarga->result() as $keluarga) :
				?>
				<tr>
					<td style=" text-align:center"><?= $i++; ?></td>
					<td style=" text-align:center">
						<a
							href="<?php echo base_url(); ?>penduduk/detail/<?= $keluarga->nik; ?>"><?= $keluarga->nama; ?></a>
					</td>
					<td style=" text-align:center"><?= $keluarga->nik; ?></td>
					<td style=" text-align:center">
						<?php if ($keluarga->sex== '1') { ?>
						Pria
						<?php } else if ($keluarga->sex== '2') {?>
						Wanita
						<?php } ?>
					</td>
					<td style=" text-align:center"><?= $keluarga->tempatlahir; ?>, <?= $keluarga->tanggallahir; ?></td>
					<td style=" text-align:center">
						<?php foreach ($status_dasar as $row): ?>
						<?php if ($row->id == $keluarga->status_dasar): ?>
						<?= $row->nama; ?>
						<?php endif; ?>
						<?php endforeach; ?>
					</td>
					<td style=" text-align:center">
						<a href="<?php echo base_url(); ?>keluarga/edit/<?= $keluarga->id; ?>"
							class="btn btn-warning btn-sm" title="Perbarui">Perbarui</a>
						<a href="<?php echo base_url(); ?>keluarga/hapus/<?= $keluarga->id; ?>" class="btn btn-danger btn-sm tombol-hapus"
							title="Hapus">Hapus</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>
	<!-- /.card-body -->
</div>
