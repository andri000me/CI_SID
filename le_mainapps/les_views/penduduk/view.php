<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-header">
		<a href="<?php echo base_url(); ?>Penduduk/tambah" class="btn btn-success btn-sm my-2 float-right">Tambah
			Penduduk</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"
			data-title="<?= $this->session->flashdata('title'); ?>"></div>
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>NIK</th>
					<th>Jenis Kelamin</th>
					<th>Tempat, Tanggal Lahir</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $i = 1;
                foreach($penduduk->result() as $penduduk) :
                ?>
				<tr>
					<td style=" text-align:center"><?= $i++; ?></td>
					<td style=" text-align:center">
						<a href="<?php echo base_url(); ?>penduduk/detail/<?= $penduduk->nik; ?>">
							<?= $penduduk->nama; ?>
						</a>
					</td>
					<td style=" text-align:center"><?= $penduduk->nik; ?></td>
					<td style=" text-align:center">
						<?php if ($penduduk->sex== '1') { ?>
						Pria
						<?php } else if ($penduduk->sex== '2') {?>
						Wanita
						<?php } ?>
					</td>
					<td style=" text-align:center"><?= $penduduk->tempatlahir; ?>, <?= $penduduk->tanggallahir; ?></td>
					<td style="text-align:center">

						<a href="<?php echo base_url(); ?>Penduduk/edit/<?= $penduduk->id; ?>"
							class="btn btn-warning btn-sm" title="Perbarui">Perbarui</a>
						<a href="<?php echo base_url(); ?>Penduduk/hapus/<?= $penduduk->id; ?>"
							class="btn btn-danger btn-sm tombol-hapus" title="Hapus">Hapus</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>
	<!-- /.card-body -->
</div>
