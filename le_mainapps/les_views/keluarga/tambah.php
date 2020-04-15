<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- /.card -->
<style>
	/* Style the form */
	#regForm {
		background-color: #ffffff;
		width: 100%;
		min-width: 300px;
	}

	/* Style the input fields */
	input {
		padding: 10px;
		width: 100%;
		font-size: 17px;
		font-family: Raleway;
		border: 1px solid #aaaaaa;
	}

	textarea {
		font-family: Raleway;
		border: 1px solid #aaaaaa;
	}

	/* Mark input boxes that gets an error on validation: */
	select.invalid {
		background-color: #ffdddd;
	}

	textarea.invalid {
		background-color: #ffdddd;
	}

	input.invalid {
		background-color: #ffdddd;
	}

	/* Hide all steps by default: */
	.tab {
		display: none;
	}

	/* Make circles that indicate the steps of the form: */
	.step {
		height: 15px;
		width: 15px;
		margin: 0 2px;
		background-color: #bbbbbb;
		border: none;
		border-radius: 50%;
		display: inline-block;
		opacity: 0.5;
	}

	/* Mark the active step: */
	.step.active {
		opacity: 1;
	}

	/* Mark the steps that are finished and valid: */
	.step.finish {
		background-color: #4CAF50;
	}

</style>
<div class="container-fluid">
	<div class="row">
		<!-- /.col -->
		<div class="col-md-12">
			<div class="card">
				<div class="card-header p-2">
				</div><!-- /.card-header -->
				<div class="card-body">
					<form id="regForm" action="<?php echo base_url(); ?>Keluarga/simpan" method="post">
						<h3 class="my-3 text-center">Identitas</h3>
						<!-- One "tab" for each step in the form: -->
						<div class="tab">
							<h5 class="m-0">Data Diri</h5>
							<hr class="mt-2">
							<!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> -->
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
									<input type="text" class="form-control wajib" value="" name="nik"
										placeholder="Masukan NIK">
								</div>
								<label class="col-sm-2 col-form-label">Pilih KK Level</label>
								<div class="col-sm-4">
									<select class="form-control" name="kk_level">
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
									<input type="text" class="form-control wajib" value="" name="nama"
										placeholder="Masukan Nama">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">RT Hubungan</label>
								<div class="col-sm-4">
									<select class="form-control" name="id_rtm">
										<option value="">Pilih RT Hubungan</option>
										<?php foreach ($rtm_hubungan as $row): ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<label class="col-sm-2 col-form-label">RT Level</label>
								<div class="col-sm-4">
									<select class="form-control" name="rtm_level">
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
									<input type="text" class="form-control wajib" value=""
										placeholder="Masukan Tempat Lahir" name="tempatlahir"
										placeholder="Masukan Tempat Lahir">
								</div>
								<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-4">
									<input type="date" class="form-control wajib" value="" name="tanggallahir"
										placeholder="Masukan Tanggal Lahir">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Agama</label>
								<div class="col-sm-4">
									<select class="form-control" name="agama_id">
										<option value="">Pilih Agama</option>
										<?php foreach ($agama as $row): ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<label class="col-sm-2 col-form-label">Status Kawin</label>
								<div class="col-sm-4">
									<select class="form-control" name="status_kawin">
										<option value="">Pilih Status Kawin</option>
										<?php foreach ($kawin as $row): ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
								<div class="col-sm-4">
									<select class="form-control" name="sex">
										<option value="">Pilih Jenis Kelamin</option>
										<option value="1">Pria</option>
										<option value="2">Wanita</option>
									</select>
								</div>
								<label class="col-sm-2 col-form-label">Telepon</label>
								<div class="col-sm-4">
									<input type="text" class="form-control wajib" value="" name="telepon"
										placeholder="Masukan No Telepon">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Foto</label>
								<div class="col-sm-4">
									<input type="file" class="form-control" value="" name="foto"
										placeholder="Masukan Foto">
								</div>
								<label class="col-sm-2 col-form-label">Golongan Darah</label>
								<div class="col-sm-4">
									<select class="form-control" name="golongan_darah_id">
										<option value="">Pilih Golongan Darah</option>
										<?php foreach ($golongan_darah as $row): ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>

						<div class="tab">
							<h5 class="m-0">Informasi</h5>
							<hr class="mt-2">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
								<div class="col-sm-4">
									<select class="form-control" name="pendidikan_kk_id">
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
									<select class="form-control" name="pekerjaan_id">
										<option value="">Pilih Pendidikan</option>
										<?php foreach ($pekerjaan as $row): ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Kewarganegara</label>
								<div class="col-sm-10">
									<select class="form-control" name="warganegara_id">
										<option value="">Pilih Kewarganegaraan</option>
										<?php foreach ($warganegara as $row): ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-4">
									<select class="form-control" name="status">
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
									<textarea rows="5" class="form-control wajib" cols="40" name="alamat_sebelumnya"
										placeholder="Masukan Alamat Sebelumnya"></textarea>
								</div>
								<label class="col-sm-2 col-form-label">Alamat Sekarang</label>
								<div class="col-sm-4">
									<textarea rows="5" class="form-control wajib" cols="40" name="alamat_sekarang"
										placeholder="Masukan Alamat Sekarang"></textarea>
								</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Cacat</label>
								<div class="col-sm-4">
									<select class="form-control" name="cacat_id">
										<option value="">Pilih Cacat</option>
										<?php foreach ($cacat as $row): ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<label class="col-sm-2 col-form-label">Sakit Menahun</label>
								<div class="col-sm-4">
									<select class="form-control" name="sakit_menahun_id">
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

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Dokumen Pasport</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" value="" name="dokumen_pasport"
										placeholder="Masukan Dokumen Pasport">
								</div>
								<label class="col-sm-2 col-form-label">Dokumen Kitas</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" value="" name="documen_kitas"
										placeholder="Masukan Dokumen Kitas">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Tanggal Akhir Pasport</label>
								<div class="col-sm-4">
									<input type="date" class="form-control" value="" name="tanggal_akhir_paspor">
								</div>
							</div>
						</div>

						<div class="tab">
							<h5 class="m-0">Data Orang Tua</h5>
							<hr class="mt-2">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">NIK Ayah</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" value="" name="ayah_nik"
										placeholder="Masukan NIK Ayah">
								</div>
								<label class="col-sm-2 col-form-label">Nama Ayah</label>
								<div class="col-sm-4">
									<input type="text" class="form-control wajib" value="" name="nama_ayah"
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
									<input type="text" class="form-control wajib" value="" name="nama_ibu"
										placeholder="Masukan Nama Ibu">
								</div>
							</div>
						</div>

						<div class="tab">
							<h5 class="m-0">Data Kelahiran</h5>
							<hr class="mt-2">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Akta Lahir</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" value="" name="akta_lahir"
										placeholder="Masukan No Akta Kelahiran">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Waktu Lahir</label>
								<div class="col-sm-10">
									<input type="" class="form-control" value="" name="waktu_lahir"
										placeholder="Masukan Waktu Lahir">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Tempat dilahirkan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" value="" name="tempat_dilahirkan"
										placeholder="Masukan Tempat Dilahirkan">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Jenis Lahiran</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" value="" name="jenis_lahiran"
										placeholder="Masukan Jenis lahiran">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Kelahiran Anak ke</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" value="" name="kelahiran_anak_ke"
										placeholder="" maxlength="2">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Penolong Kelahiran</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" value="" name="penolong_kelahiran"
										placeholder="Masukan Penolong Kelahiran">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Berat Lahir</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" value="" name="berat_lahir"
										placeholder="Masukan berat lahir ...Kg">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Panjang Lahir</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" value="" name="panjang_lahir"
										placeholder="Masukan Panjang lahir ... Cm">
								</div>
							</div>
						</div>

						<div style="overflow:auto;">
							<div style="float:right;">
								<button type="button" id="prevBtn" class="btn btn-warning"
									onclick="nextPrev(-1)">Sebelumnya</button>
								<button type="button" id="nextBtn" class="btn btn-primary"
									onclick="nextPrev(1)">Selanjutnya</button>
							</div>
						</div>
						
						<!-- Circles which indicates the steps of the form: -->
						<div style="text-align:center;margin-top:40px;">
							<span class="step"></span>
							<span class="step"></span>
							<span class="step"></span>
							<span class="step"></span>
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
<script>
	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the current tab

	function showTab(n) {
		// This function will display the specified tab of the form ...
		var x = document.getElementsByClassName("tab");
		x[n].style.display = "block";
		// ... and fix the Previous/Next buttons:
		if (n == 0) {
			document.getElementById("prevBtn").style.display = "none";
		} else {
			document.getElementById("prevBtn").style.display = "inline";
		}
		if (n == (x.length - 1)) {
			document.getElementById("nextBtn").innerHTML = "Simpan";
		} else {
			document.getElementById("nextBtn").innerHTML = "Selanjutnya";
		}
		// ... and run a function that displays the correct step indicator:
		fixStepIndicator(n)
	}

	function nextPrev(n) {
		// This function will figure out which tab to display
		var x = document.getElementsByClassName("tab");
		// Exit the function if any field in the current tab is invalid:
		if (n == 1 && !validateForm()) return false;
		// Hide the current tab:
		x[currentTab].style.display = "none";
		// Increase or decrease the current tab by 1:
		currentTab = currentTab + n;
		// if you have reached the end of the form... :
		if (currentTab >= x.length) {
			//...the form gets submitted:
			document.getElementById("regForm").submit();
			return false;
		}
		// Otherwise, display the correct tab:
		showTab(currentTab);
	}

	function validateForm() {
		// This function deals with validation of the form fields
		var x, y, i, z, valid = true;
		x = document.getElementsByClassName("tab");
		y = x[currentTab].getElementsByClassName("form-control wajib");
		// A loop that checks every input field in the current tab:
		for (i = 0; i < y.length; i++) {
			// If a field is empty...
			if (y[i].value == "") {
				// add an "invalid" class to the field:
				y[i].className += " invalid";
				// and set the current valid status to false:
				valid = false;
			}
		}
		// If the valid status is true, mark the step as finished and valid:
		if (valid) {
			document.getElementsByClassName("step")[currentTab].className += " finish";
		}
		return valid; // return the valid status
	}

	function fixStepIndicator(n) {
		// This function removes the "active" class of all steps...
		var i, x = document.getElementsByClassName("step");
		for (i = 0; i < x.length; i++) {
			x[i].className = x[i].className.replace(" active", "");
		}
		//... and adds the "active" class to the current step:
		x[n].className += " active";
	}

</script>
