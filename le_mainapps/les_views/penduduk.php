<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-header">
	</div>
	<!-- /.card-header -->
	<div class="card-body">
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
					<td style=" text-align:center"><?= $penduduk->nama; ?></td>
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
						<center>
							<a href="" class="btn btn-primary" title="Detail"><i class="fa fa-eye"></i></a>
						</center>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
