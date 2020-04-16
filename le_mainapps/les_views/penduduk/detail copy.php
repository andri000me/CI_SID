<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- /.card -->
<div class="container-fluid">
	<div class="row justify-content-center">
		<!-- <div class="col-md-3">
			<div class="card card-primary card-outline">
				<div class="card-body box-profile">
					<div class="text-center">
						<img class="profile-user-img img-fluid img-circle"
							src="<?php echo base_url(); ?>l_asséts/dist/img/user4-128x128.jpg"
							alt="User profile picture">
					</div>
					<h3 class="profile-username text-center"></h3>
					<p class="text-muted text-center"></p>
				</div>
			</div>
		</div> -->
		<!-- /.col -->
		<div class="col-md-12">
			<div class="card">
				<div class="card-header p-2">
					<ul class="nav nav-pills">
						<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Identitas Lengkap</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Keluarga</a></li>
					</ul>
				</div><!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content">
						<div class="active tab-pane" id="activity">
                             <?php
                            $i = 1;
                            foreach($penduduk->result() as $penduduk) :
                            ?>
							<form class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Dasar</label>
									<div class="col-sm-4">
                                        <?php foreach ($status_dasar as $row): ?>
                                            <?php if ($row->id == $penduduk->status_dasar): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">NIK</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  value="<?= $penduduk->nik; ?>" disabled>
									</div>
								</div>
                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">KK Level</label>
									<div class="col-sm-10">
                                        <?php foreach ($k_level as $row): ?>
                                            <?php if ($row->id == $penduduk->kk_level): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
								</div>
                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Nama</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  value="<?= $penduduk->nama; ?>" disabled>
									</div>
								</div>
                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Tampat Lahir</label>
									<div class="col-sm-4">
										<input type="text" class="form-control"  value="<?= $penduduk->tempatlahir; ?>" disabled>
									</div>
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
									<div class="col-sm-4">
										<input type="text" class="form-control"  value="<?= $penduduk->tanggallahir; ?>" disabled>
									</div>
								</div>
                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Agama</label>
									<div class="col-sm-10">
                                         <?php foreach ($agama as $row): ?>
                                            <?php if ($row->id == $penduduk->agama_id): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
								</div>
                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
									<div class="col-sm-10">
                                    <?php if ($penduduk->sex== '1') { ?>
                                        <input type="text" class="form-control"  value="Pria" disabled>
                                    <?php } else if ($penduduk->sex== '2') {?>
                                        <input type="text" class="form-control"  value="Wanita" disabled>
						            <?php } ?>
										
									</div>
								</div>
                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Pendidikan KK</label>
									<div class="col-sm-4">
                                        <?php foreach ($pendidikan_kk as $row): ?>
                                            <?php if ($row->id == $penduduk->pendidikan_kk_id): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
                                    <label class="col-sm-2 col-form-label">Pendidikan</label>
									<div class="col-sm-4">
                                        <?php foreach ($pendidikan as $row): ?>
                                            <?php if ($row->id == $penduduk->pendidikan_sedang_id): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                       
									</div>
								</div>
                                 <!-- <select class="form-control" disabled>
                                 <?php foreach ($pendidikan as $row): ?>
                                            <option value="<?php echo $row->id; ?>"
                                                <?php if ($row->id == $penduduk->pendidikan_sedang_id): ?>
                                                selected="selected" <?php endif; ?>>
                                                <?php echo $row->nama; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select> -->

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Pekerjaan</label>
									<div class="col-sm-10">
                                        <?php foreach ($pekerjaan as $row): ?>
                                            <?php if ($row->id == $penduduk->pekerjaan_id): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Status Kawin</label>
									<div class="col-sm-10">
                                        <?php foreach ($kawin as $row): ?>
                                            <?php if ($row->id == $penduduk->status_kawin): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Kewarganegara</label>
									<div class="col-sm-10">
                                        <?php foreach ($warganegara as $row): ?>
                                            <?php if ($row->id == $penduduk->warganegara_id): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Dokumen Pasport</label>
									<div class="col-sm-4">
                                        <input type="text" class="form-control"  value="<?= $penduduk->dokumen_pasport; ?>" disabled>
									</div>
                                    <label class="col-sm-2 col-form-label">Dokumen Kitas</label>
									<div class="col-sm-4">
                                        <input type="text" class="form-control"  value="<?= $penduduk->dokumen_kitas; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Tanggal Akhir Pasport</label>
									<div class="col-sm-4">
                                        <input type="text" class="form-control"  value="<?= $penduduk->tanggal_akhir_paspor; ?>" disabled>
									</div>
								</div>


                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Ayah</label>
									<div class="col-sm-4">
                                        <input type="text" class="form-control"  value="<?= $penduduk->nama_ayah; ?>" disabled>
									</div>
                                    <label class="col-sm-2 col-form-label">Ibu</label>
									<div class="col-sm-4">
                                        <input type="text" class="form-control"  value="<?= $penduduk->nama_ibu; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Golongan Darah</label>
									<div class="col-sm-10">
                                        <?php foreach ($golongan_darah as $row): ?>
                                            <?php if ($row->id == $penduduk->golongan_darah_id): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Status</label>
									<div class="col-sm-4">
                                        <?php foreach ($status as $row): ?>
                                            <?php if ($row->id == $penduduk->status): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Alamat Sebelumnya</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->alamat_sebelumnya; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Alamat Sekarang</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->alamat_sekarang; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Cacat</label>
									<div class="col-sm-4">
                                        <?php foreach ($cacat as $row): ?>
                                            <?php if ($row->id == $penduduk->cacat_id): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>

                                    <label class="col-sm-2 col-form-label">Sakit Menahun</label>
									<div class="col-sm-4">
                                        <?php foreach ($sakit_menahun as $row): ?>
                                            <?php if ($row->id == $penduduk->sakit_menahun_id): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Akta Lahir</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->akta_lahir; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Akta Perkawinan</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->akta_perkawinan; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Tanggal Perkawinan</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->tanggalperkawinan; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Akta Perceraian</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->akta_perceraian; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Tanggal Perceraian</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->tanggalperceraian; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Cara KB</label>
									<div class="col-sm-4">
                                        <?php foreach ($cara_kb as $row): ?>
                                            <?php if ($row->id == $penduduk->cara_kb_id): ?>
                                                <input type="text" class="form-control"  value="<?= $row->nama; ?>" disabled>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Telepon</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->telepon; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">No KK Sebelumnya</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->no_kk_sebelumnya; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Ktp El</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->ktp_el; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Status Rekam</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->status_rekam; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Waktu Lahir</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->waktu_lahir; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Tempat Lahiran</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->tempat_dilahirkan; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Jenis Lahiran</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->jenis_kelahiran; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Kelahiran Anak ke</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->kelahiran_anak_ke; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Penolong Kelahiran</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->penolong_kelahiran; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Berat Lahir</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->berat_lahir; ?>" disabled>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-sm-2 col-form-label">Panjang Lahir</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control"  value="<?= $penduduk->panjang_lahir; ?>" disabled>
									</div>
								</div>
							</form>
                            <?php endforeach; ?>
						</div>

						<div class="tab-pane" id="settings">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIK</th>
										<th>Jenis Kelamin</th>
										<th>Tempat, Tanggal Lahir</th>
										<th>Status</th>
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
                                        <a href="<?php echo base_url(); ?>penduduk/detail/<?= $keluarga->nik; ?>"><?= $keluarga->nama; ?></a></td>
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
                                            <?php if ($row->id == $penduduk->status_dasar): ?>
                                                <?= $row->nama; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
								</tbody>

							</table>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div><!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</div><!-- /.container-fluid -->
