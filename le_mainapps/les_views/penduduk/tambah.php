<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
	div,
	option,
	label {
		font-size: 13px;
		margin: 0;
	}

	h5 {
		font-size: 15px;
	}

	input[type=text],
	input[type=date],
	input[type=file],
	select {
		width: 100%;
		padding: 3px 3px;
		margin: 2px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

</style>
<div class="container-fluid">
	<div class="row">
		<!-- /.col -->
		<div class="col-sm-2">
			<form action="<?php echo base_url(); ?>Penduduk/simpan" method="post">

				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>l_asséts/foto/no_photo.jpg" alt="User profile picture">
						</div>
					</div>
					<div class="card-body">
						<div class="form-group">
							<input type="file" class="" value="" name="foto" placeholder="">
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
		</div>
		<div class="col-md-10">
			<div class="card">
				<div class="card-header p-2">
				<a href="<?php echo base_url(); ?>Penduduk"
						class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
						title="Kembali Ke Data Penduduk"><i class="fa fa-arrow-alt-circle-left"></i> Kembali Ke Halaman
						Penduduk</a>
				</div><!-- /.card-header -->
				<div class="card-body">
					
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>NIK</label>
								<input type="text" class="" value="" name="nik" placeholder="Masukan NIK" required>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="" value="" name="nama" placeholder="Masukan Nama" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<table style="width:100%">
								<thead>
									<tr>
										<th>Wajib KTP</th>
										<th>KTP Elektrtonik</th>
										<th>Status Rekam</th>
										<th>Tag ID Card</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><input type="text" class="" disabled></td>
										<td><select class="" name="ktp_el">
												<option value="">Pilih KTP El</option>
												<?php foreach ($ktp_el as $row): ?>
												<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?>
												</option>
												<?php endforeach; ?>
											</select></td>
										<td><select class="" name="status_rekam">
												<option value="">Pilih Status Rekam</option>
												<?php foreach ($status_rekam as $row): ?>
												<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?>
												</option>
												<?php endforeach; ?>
											</select></td>
										<td><input type="text" class="" name="tag_id_card"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>No KK Sebelumnya</label>
								<input type="text" class="" value="" name="no_kk_sebelumnya"
									placeholder="Masukan No KK Sebelumnya">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Hubungan Dalam Keluarga</label>
								<select class="" name="rtm_level" required>
									<option value="">Pilih Hubungan Dalam Keluarga</option>
									<?php foreach ($rtm_level as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="" name="sex" required>
									<option value="">Pilih Jenis Kelamin</option>
									<option value="1">Pria</option>
									<option value="2">Wanita</option>
								</select>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="" name="agama_id" required>
									<option value="">Pilih Agama</option>
									<?php foreach ($agama as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Status Penduduk</label>
								<select class="" name="status" required>
									<option value="">Pilih Status</option>
									<?php foreach ($status as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-12" style="background-color:rgb(30, 136, 243)">
							<h5 class="m-0" style="color:white">DATA KELAHIRAN</h5>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>No Akta Kelahiran</label>
								<input type="text" class="" value="" name="akta_lahir"
									placeholder="Masukan No Akta Kelahiran">
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label>Tempat Lahir</label>
								<input type="text" class="" value="" placeholder="Masukan Tempat Lahir"
									name="tempatlahir" placeholder="Masukan Tempat Lahir" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="date" class="" value="" name="tanggallahir"
									placeholder="Masukan Tanggal Lahir" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Waktu Lahir</label>
								<input type="text" class="" value="" name="waktu_lahir"
									placeholder="Masukan waktu kelahiran">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Tempat Dilahirkan</label>
								<select class="" name="tempat_dilahirkan">
									<option value="">Pilih Tempat dilahirkan</option>
									<?php foreach ($tempat_dilahirkan as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Jenis Kelahiran</label>
								<select class="" name="jenis_kelahiran">
									<option value="">Pilih Jenis Kelahiran</option>
									<?php foreach ($jenis_kelahiran as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label> Anak Ke </label><small class="text-danger"> (Di isi dengan Angka) </small>
								<input type="text" class="" value="" name="kelahiran_anak_ke"
									placeholder="Masukan waktu kelahiran">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Penolong Kelahiran</label>
								<select class="" name="penolong_kelahiran">
									<option value="">Pilih Status</option>
									<?php foreach ($penolong_kelahiran as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label> Berat Lahir </label><small class="text-danger"> (Gram) </small>
								<input type="text" class="" value="" name="berat_lahir"
									placeholder="Masukan berat lahir">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label> Panjang Lahir</label><small class="text-danger"> (Cm) </small>
								<input type="text" class="" value="" name="panjang_lahir"
									placeholder="Masukan panjang lahir">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12" style="background-color:rgb(30, 136, 243)">
							<h5 class="m-0" style="color:white">PENDIDIKAN DAN PEKERJAAN</h5>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Pendidikan dalam KK</label>
								<select class="" name="pendidikan_kk_id" required>
									<option value="">Pilih Pendidikan KK</option>
									<?php foreach ($pendidikan_kk as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Pendidikan sedang ditempuh</label>
								<select class="" name="pendidikan_sedang_id">
									<option value="">Pilih Pendidikan</option>
									<?php foreach ($pendidikan as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Pekerjaan</label>
								<select class="" name="pekerjaan_id" required>
									<option value="">Pilih Pekerjaan</option>
									<?php foreach ($pekerjaan as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12" style="background-color:rgb(30, 136, 243)">
							<h5 class="m-0" style="color:white">DATA KEWARGANEGARAAN </h5>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Status Warga Negara</label>
								<select class="" name="warganegara_id" required>
									<option value="">Pilih Kewarganegaraan</option>
									<?php foreach ($warganegara as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label>Nomor Pasport</label>
								<input type="text" class="" value="" name="dokumen_pasport"
									placeholder="Masukan No Pasport">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Tanggal Berakhir Pasport</label>
								<input type="date" class="" value="" name="tanggal_akhir_paspor">
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label>Dokumen Kitas</label>
								<input type="text" class="" value="" name="dokumen_kitas"
									placeholder="Masukan No Kitas">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12" style="background-color:rgb(30, 136, 243)">
							<h5 class="m-0" style="color:white">DATA ORANG TUA</h5>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>NIK Ayah</label>
								<input type="text" class="" value="" name="ayah_nik" placeholder="Masukan NIK Ayah">
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label>Nama Ayah</label>
								<input type="text" class="" value="" name="nama_ayah" placeholder="Masukan Nama Ayah">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>NIK Ibu</label>
								<input type="text" class="" value="" name="ibu_nik" placeholder="Masukan NIK Ibu">
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label>Nama Ibu</label>
								<input type="text" class="" value="" name="nama_ibu" placeholder="Masukan Nama Ibu">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12" style="background-color:rgb(30, 136, 243)">
							<h5 class="m-0" style="color:white">ALAMAT</h5>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>No Telepon</label>
								<input type="text" class="" value="" name="telepon" placeholder="Masukan No Telepon"
									required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Alamat Sebelumnya</label>
								<input type="text" class="" value="" name="alamat_sebelumnya"
									placeholder="Masukan Alamat Sebelumnya" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Alamat Sekarang</label>
								<input type="text" class="" value="" name="alamat_sekarang"
									placeholder="Masukan Alamat sekarang" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12" style="background-color:rgb(30, 136, 243)">
							<h5 class="m-0" style="color:white">STATUS PERKAWINAN </h5>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Status Perkawinan</label>
								<select class="" name="status_kawin" required>
									<option value="">Pilih Status Kawin</option>
									<?php foreach ($kawin as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>No Akta Perkawinan</label>
								<input type="text" class="" value="" name="akta_perkawinan"
									placeholder="Masukan No Akta Perkawinan">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Tanggal Perkawinan</label>
								<input type="date" class="" value="" name="tanggalperkawinan"
									placeholder="Masukan No Akta Perceraian">
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label>No Akta Perceraian</label>
								<input type="text" class="" value="" name="akta_perceraian"
									placeholder="Masukan No Akta Perceraian">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Tanggal Perceraian</label>
								<input type="date" class="" value="" name="tanggalperceraian">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12" style="background-color:rgb(30, 136, 243)">
							<h5 class="m-0" style="color:white">DATA KESEHATAN </h5>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Golongan Darah</label>
								<select class="" name="golongan_darah_id" required>
									<option value="">Pilih Golongan Darah</option>
									<?php foreach ($golongan_darah as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Cacat</label>
								<select class="" name="cacat_id" required>
									<option value="">Pilih Cacat</option>
									<?php foreach ($cacat as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Sakit Menahun</label>
								<select class="" name="sakit_menahun_id" required>
									<option value="">Pilih Sakit Menahun</option>
									<?php foreach ($sakit_menahun as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Cara KB</label>
								<select class="" name="cara_kb_id">
									<option value="">Pilih Cara KB</option>
									<?php foreach ($cara_kb as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Asuransi</label>
								<select class="" name="id_asuransi">
									<option value="">Pilih Asuransi</option>
									<?php foreach ($id_asuransi as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<button type="submit" class="btn btn-success" name="submit" value="Submit"> Simpan
						</button>
					</div>
					</form>
				</div><!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</div><!-- /.container-fluid -->
