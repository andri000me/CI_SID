<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- /.card -->
<div class="container-fluid">
	<div class="row">
		<!-- /.col -->
		<div class="col-md-12">
			<div class="card">
				<div class="card-header p-2">
				</div><!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Status Dasar</label>
							<div class="col-sm-4">
								<select class="form-control" name="status_dasar">
									<option value="">Pilih Status</option>
									<?php foreach ($status_dasar as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
								
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">NIK</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="nik" placeholder="Masukan NIK"
									required>
							</div>
							<label class="col-sm-2 col-form-label">Pilih KK Level</label>
							<div class="col-sm-4">
								<select class="form-control" name="kk_level" required>
									<option value="">KK Level</option>
									<?php foreach ($k_level as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="" name="nama" placeholder="Masukan Nama"
									required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">RT Hubungan</label>
							<div class="col-sm-4">
								<select class="form-control" name="id_rtm" required>
									<option value="">Pilih RT Hubungan</option>
									<?php foreach ($rtm_hubungan as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<label class="col-sm-2 col-form-label">RT Level</label>
							<div class="col-sm-4">
								<select class="form-control" name="rtm_level" required>
									<option value="">Pilih RT Level</option>
									<?php foreach ($rtm_level as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Tampat Lahir</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" placeholder="Masukan Tempat Lahir"
									name="tempatlahir" placeholder="Masukan Tempat Lahir" required>
							</div>
							<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" value="" name="tanggallahir"
									placeholder="Masukan Tanggal Lahir" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Agama</label>
							<div class="col-sm-4">
								<select class="form-control" name="agama_id" required>
									<option value="">Pilih Agama</option>
									<?php foreach ($agama as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-4">
								<select class="form-control" name="sex" required>
									<option value="">Pilih Jenis Kelamin</option>
									<option value="1">Pria</option>
									<option value="2">Wanita</option>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
							<div class="col-sm-4">
								<select class="form-control" name="pendidikan_kk_id" required>
									<option value="">Pilih Pendidikan KK</option>
									<?php foreach ($pendidikan_kk as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<label class="col-sm-2 col-form-label">Pendidikan</label>
							<div class="col-sm-4">
								<select class="form-control" name="pendidikan_sedang_id">
									<option value="">Pilih Pendidikan</option>
									<?php foreach ($pendidikan as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Pekerjaan</label>
							<div class="col-sm-4">
								<select class="form-control" name="pekerjaan_id" required>
									<option value="">Pilih Pendidikan</option>
									<?php foreach ($pekerjaan as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<label class="col-sm-2 col-form-label">Status Kawin</label>
							<div class="col-sm-4">
								<select class="form-control" name="status_kawin" required>
									<option value="">Pilih Status Kawin</option>
									<?php foreach ($kawin as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Kewarganegara</label>
							<div class="col-sm-10">
								<select class="form-control" name="status_kawin" required>
									<option value="">Pilih Kewarganegaraan</option>
									<?php foreach ($warganegara as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Dokumen Pasport</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" value="" name="dokumen_pasport"
									placeholder="Masukan Dokumen Pasport">
							</div>
							<label class="col-sm-2 col-form-label">Dokumen Kitas</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" value="" name="documen_kitas"
									placeholder="Masukan Dokumen Kitas">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Tanggal Akhir Pasport</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" value="" name="tanggal_akhir_paspor">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">NIK Ayah</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="ayah_nik"
									placeholder="Masukan NIK Ayah">
							</div>
							<label class="col-sm-2 col-form-label">Nama Ayah</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="nama_ayah"
									placeholder="Masukan Nama Ayah">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">NIK Ibu</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="ibu_nik"
									placeholder="Masukan NIK Ibu">
							</div>
							<label class="col-sm-2 col-form-label">Nama Ibu</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="nama_ibu"
									placeholder="Masukan Nama Ibu">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Foto</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" value="" name="foto" placeholder="Masukan Foto">
							</div>
							<label class="col-sm-2 col-form-label">Golongan Darah</label>
							<div class="col-sm-4">
								<select class="form-control" name="golongan_darah_id" required>
									<option value="">Pilih Golongan Darah</option>
									<?php foreach ($golongan_darah as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Id Cluster</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="id_cluster">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-4">
								<select class="form-control" name="status" required>
									<option value="">Pilih Status</option>
									<?php foreach ($status as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Alamat Sebelumnya</label>
							<div class="col-sm-4">
								<textarea rows="5" class="form-control" cols="40" name="alamat_sebelumnya"
									placeholder="Masukan Alamat Sebelumnya" required></textarea>
							</div>
							<label class="col-sm-2 col-form-label">Alamat Sekarang</label>
							<div class="col-sm-4">
								<textarea rows="5" class="form-control" cols="40" name="alamat_sekarang"
									placeholder="Masukan Alamat Sekarang" required></textarea>
							</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Cacat</label>
							<div class="col-sm-4">
								<select class="form-control" name="cacat_id" required>
									<option value="">Pilih Cacat</option>
									<?php foreach ($cacat as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<label class="col-sm-2 col-form-label">Sakit Menahun</label>
							<div class="col-sm-4">
								<select class="form-control" name="sakit_menahun_id" required>
									<option value="">Pilih Cacat</option>
									<?php foreach ($sakit_menahun as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Akta Perkawinan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="akta_perkawinan"
									placeholder="Masukan No Akta Perkawinan">
							</div>
							<label class="col-sm-2 col-form-label">Tanggal Perkawinan</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" value="" name="tanggalperkawinan">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Akta Perceraian</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="akta_perceraian"
									placeholder="Masukan No Akta Perceraian">
							</div>
							<label class="col-sm-2 col-form-label">Tanggal Perceraian</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" value="" name="tanggalperceraian">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Cara KB</label>
							<div class="col-sm-4">
								<select class="form-control" name="cara_kb_id">
									<option value="">Pilih Cara KB</option>
									<?php foreach ($cara_kb as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Telepon</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="telepon"
									placeholder="Masukan No Telepon" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">No KK Sebelumnya</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="no_kk_sebelumnya"
									placeholder="Masukan No KK Sebelumnya">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Ktp El</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="ktp_el">
							</div>
							<label class="col-sm-2 col-form-label">Status Rekam</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="status_rekam">
							</div>
						</div>
						<hr class="mt-4">
						<div class="text-center">
							<h5 class="m-0">Data Kelahiran </h5>
						</div>
						<hr class="mb-4">
						
					</form>
				</div><!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</div><!-- /.container-fluid -->

