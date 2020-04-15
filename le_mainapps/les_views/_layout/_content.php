<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" > <!--style="border-bottom:#0749E0 1px solid;" -->
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
            	Halaman <?php echo @$judul; ?>
                <small style="font-size:15px;"><?php echo @$deskripsi; ?></small>
            </h1>
            	
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php echo @$menu1; ?>
              
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  

  <!-- Main content -->
 <!-- <section class="content">
  </section>
  -->
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    		<?php echo @$_mainContent; ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  
</div>


