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
		<a href="<?php echo base_url(); ?>Surat/TambahSuratNikah" class="btn btn-success btn-sm my-2">Tambah
			Surat</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"
			data-title="<?= $this->session->flashdata('title'); ?>"></div>
		<table id="example2" class="table-bordered table-striped table-hover nowrap" width="100%">
			<thead class="bg-primary">
				<tr>
					<th style=" text-align:center">No</th>
                    <th style=" text-align:center">No Surat</th>
					<th style=" text-align:center">Pasangan</th>
					<th style=" text-align:center">Tanggal Nikah</th>
					<th style=" text-align:center">Opsi</th>
				</tr>
			</thead>
			<tbody>
                    <th style=" text-align:center">1</th>
                    <th style=" text-align:center">No surat</th>
					<th style=" text-align:center"> A dan B</th>
					<th style=" text-align:center"> 2020-04-19</th>
					<th style=" text-align:center">
                    <a href="<?php echo base_url(); ?>Surat/CetakSuratNikah" class="btn btn-success btn-sm my-2"><i
                    class="fa fa-print"></i></a>
                    </th>
			</tbody>

		</table>
	</div>
	<!-- /.card-body -->
</div>
