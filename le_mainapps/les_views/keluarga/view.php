<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-header">
		<a href="<?php echo base_url(); ?>keluarga/tambah_kk" class="btn btn-success btn-sm my-2 float-right">Tambah KK Baru</a>
	</div>
	<!-- /.card-header -->
	
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>No KK</th>
					<th>Nama Kepala Kelurga</th>
					<th>Anggota Keluarga</th>
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
					<td style=" text-align:center"><?= $keluarga->no_kk; ?></td>
					<td style=" text-align:center">
                        <?php foreach ($kepala->result() as $row): ?>
                            <?php if ($row->id == $keluarga->nik_kepala): ?>
                                <?= $row->nama; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
					<td style=" text-align:center">
                        
                    </td>
					<td style="text-align:center">
						<center>
							<a href="<?php echo base_url(); ?>keluarga/detail/<?= $keluarga->id_cluster; ?>/<?= $keluarga->nik_kepala; ?>" class="btn btn-primary" title="Detail">Lihat Detail</a>
						</center>

					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>
