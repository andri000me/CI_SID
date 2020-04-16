<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container-fluid">
	<div class="row">
		<!-- /.col -->
		<div class="col-md-12">
			<div class="card">
				<div class="card-header p-2">
				</div><!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal" action="<?php echo base_url(); ?>Keluarga/simpan_kk" method="POST">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">NO KK</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="no_kk" placeholder="Masukan NO KK"
									required>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih Penduduk</label>
                            <div class="col-sm-9" >
                                <input type="hidden" class="form-control" name="id" id="id"value="">
                                <input type="text" class="form-control title" name="nama" id="nama" value="" placeholder="Pilih Penduduk" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
							<label class="col-sm-2 col-form-label">Alamat</label>
							<div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id_cluster" id="id_cluster"value="">
                                <textarea rows="5" class="form-control" cols="40" name="alamat_sekarang" id="alamat_sekarang"
										placeholder="Masukan Alamat"></textarea>
                            </div>
						</div>
						<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
					</form>
				</div><!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</div><!-- /.container-fluid -->
