<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
	table.table {
		font-size: 15px;
	}

</style>
<div class="card">
	<div class="card-header">
		<a href="<?php echo base_url(); ?>Penduduk/tambah" class="btn btn-success btn-sm my-2 float-right">Tambah
			Penduduk</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"
			data-title="<?= $this->session->flashdata('title'); ?>"></div>
		<table id="data_penduduk" class="table table-bordered table-striped table-hover nowrap" width="0">
			<thead>
				<tr>
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>No.KK</th>
					<th>Jenis Kelamin</th>
					<th>Nama Ayah</th>
					<th>Nama Ibu</th>
					<th>Alamat</th>
					<th>Umur</th>
					<th>Pekerjaan</th>
					<th>Kawin</th>
					<th>Tanggal Daftar</th>
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
					<td style=" text-align:center"><?= $penduduk->nik; ?></td>
					<td style=" text-align:center">
						<a href="<?php echo base_url(); ?>penduduk/detail/<?= $penduduk->nik; ?>">
							<?= $penduduk->nama; ?>
						</a>
					</td>
					<td style=" text-align:center">
						<?php foreach ($keluarga as $row): ?>
							<?php if ($row->id == $penduduk->id_kk): ?>
								<?= $row->no_kk; ?>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php if ($penduduk->id_kk == '0') { ?>
								Belum ada KK
						<?php } ?>
					</td>
					<td style=" text-align:center">
						<?php if ($penduduk->sex== '1') { ?>
						Pria
						<?php } else if ($penduduk->sex== '2') {?>
						Wanita
						<?php } ?>
					</td>
					<td style=" text-align:center"><?= $penduduk->nama_ayah; ?></td>
					<td style=" text-align:center"><?= $penduduk->nama_ibu; ?></td>
					<td style=" text-align:center"><?= $penduduk->alamat_sekarang; ?></td>
					<td></td>
					<td>
						<?php foreach ($kawin as $row): ?>
						<?php if ($row->id == $penduduk->status_kawin): ?>
						<?= $row->nama; ?>
						<?php endif; ?>
						<?php endforeach; ?>
					</td>
					<td>
						<?php foreach ($pekerjaan as $row): ?>
							<?php if ($row->id == $penduduk->pekerjaan_id): ?>
							<?= $row->nama; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</td>
					<td style=" text-align:center"><?=date("Y-m-d", strtotime($penduduk->created_at))?></td>
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
