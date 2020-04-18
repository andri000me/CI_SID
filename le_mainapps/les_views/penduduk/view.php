<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
	table.table-bordered {
		font-size: 15px;
	}

</style>
<div class="card">
	<div class="card-header">
		<a href="<?php echo base_url(); ?>Penduduk/tambah" class="btn btn-success btn-sm my-2">Tambah
			Penduduk</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"
			data-title="<?= $this->session->flashdata('title'); ?>"></div>
		<table id="data_penduduk" class="table table-bordered table-striped table-hover nowrap" width="0">
			<thead class="bg-primary">
				<tr>
					<th style=" text-align:center">No</th>
					<th style=" text-align:center">NIK</th>
					<th style=" text-align:center">Nama</th>
					<th style=" text-align:center">No.KK</th>
					<th style=" text-align:center">Jenis Kelamin</th>
					<th style=" text-align:center">Nama Ayah</th>
					<th style=" text-align:center">Nama Ibu</th>
					<th style=" text-align:center">Alamat</th>
					<th style=" text-align:center">Kawin</th>
					<th style=" text-align:center">Pekerjaan</th>
					<th style=" text-align:center">Tanggal Daftar</th>
					<th style=" text-align:center">Opsi</th>
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
							<?= $penduduk->nik; ?>
						</a>
					</td>
					<td style=" text-align:center"><?= $penduduk->nama; ?></td>
					<td style=" text-align:center">
						<?php foreach ($keluarga as $row): ?>
							<?php if ($row->id == $penduduk->id_kk): ?>
								
								<a href="<?php echo base_url(); ?>penduduk/detail_kk/<?= $penduduk->id_kk; ?>/<?= $penduduk->nik; ?>">
									<?= $row->no_kk; ?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php if ($penduduk->id_kk == '0') { ?>
								Belum ada KK
						<?php } ?>
					</td>
					<td style=" text-align:center">
						<?php if ($penduduk->sex== '1') { ?>
							LAKI - LAKI
						<?php } else if ($penduduk->sex== '2') {?>
							PEREMPUAN
						<?php } ?>
					</td>
					<td style=" text-align:center"><?= $penduduk->nama_ayah; ?></td>
					<td style=" text-align:center"><?= $penduduk->nama_ibu; ?></td>
					<td style=" text-align:center"><?= $penduduk->alamat_sekarang; ?></td>
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
							class="btn btn-warning btn-xs" title="Perbarui"><i class="fa fa-edit"></i></a>
						<a href="<?php echo base_url(); ?>Penduduk/hapus/<?= $penduduk->id; ?>"
							class="btn btn-danger btn-xs tombol-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>
	<!-- /.card-body -->
</div>
