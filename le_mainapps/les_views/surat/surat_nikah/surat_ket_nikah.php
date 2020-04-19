<style>
	.form-pria {
		display: none;
	}

	.form-wanita {
		display: none;
	}

</style>
<div class="card">
	<div class="card-header bg-primary">
		<div class="row">
			<div class="col-sm-12">

			</div>
		</div>
	</div>
	<form action="kesini" method="post">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<h5>A. CALON PASANGAN PRIA</h5>
			</div>
			<div class="col-sm-6">
				<div class="btn-group col-sm-8" data-toggle="buttons">
					<label class="btn btn-info btn-flat form-check-label">
						<input type="radio" name="calon_pria" value="wargaDesa" required>Warga Desa
					</label>
					<label class="btn btn-info btn-flat form-check-label ">
						<input type="radio" name="calon_pria" value="wargaLuarDesa"> Warga Luar Desa
					</label>
				</div>
			</div>
		</div>
		<div class="wargaDesa form-pria">
			<?php  $this->load->view('surat/surat_nikah/data_pria_desa'); ?>
		</div>
		<div class="wargaLuarDesa form-pria">
			<?php  $this->load->view('surat/surat_nikah/data_pria_luar_desa'); ?>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<h5>B. CALON PASANGAN WANITA</h5>
			</div>
			<div class="col-sm-6">
				<div class="btn-group col-sm-8" data-toggle="buttons">
					<label class="btn btn-info btn-flat form-check-label">
						<input type="radio" name="calon_wanita" value="wargaDesaWanita" required>Warga Desa
					</label>
					<label class="btn btn-info btn-flat form-check-label ">
						<input type="radio" name="calon_wanita" value="wargaLuarDesaWanita"> Warga Luar Desa
					</label>
				</div>
			</div>
		</div>

		<div class="wargaDesaWanita form-wanita">
			<?php  $this->load->view('surat/surat_nikah/data_wanita_desa'); ?>
		</div>
		<div class="wargaLuarDesaWanita form-wanita">
			<?php  $this->load->view('surat/surat_nikah/data_wanita_luar_desa'); ?>
		</div>

	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<div class="col-sm-12 bg-primary my-2">
						<label class="control-label m-0"><strong>C. DATA PERNIKAHAN</strong></label>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 control-label">Hari, Tanggal, Jam</label>
					<div class="col-sm-5 ">
						<input class="form-control hari" type="text" name="hari_nikah" id="hari_nikah"
							placeholder="Hari Nikah" value="">
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<input title="Pilih Tanggal" class="form-control" name="tanggal_nikah" type="text"
								placeholder="Tgl. Nikah" value="" />
						</div>
					</div>
					<div class="col-sm-2">
						<div class="input-group">
							<input class="form-control" name="jam_nikah" id="jammenit_1" type="text"
								placeholder="Jam Nikah" value="" />
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 control-label"><strong>Tempat</strong></label>
					<div class="col-sm-8">
						<input name="tempat_nikah" class="form-control" type="text" placeholder="Tempat" value="">
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-12 bg-primary my-2">
					<label class="control-label m-0"><strong>D. PENANDA TANGAN</strong></label>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group row">
					<label class="col-sm-2 control-label"><strong>Tanda Tangan</strong></label>
					<div class="col-sm-8">
						<input name="tanda_tangan" class="form-control" type="text" placeholder="Tanda Tangan" value="">
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group row">
						<button class="btn btn-success" value="submit" name="submit" >Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>

</div>
