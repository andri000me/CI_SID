<!DOCTYPE html>
<html>
  <head>
     <title>Sistem Informasi Desa</title>
    <!-- meta -->
    <?php echo @$_meta; ?>

    <!-- css --> 
    <?php echo @$_css; ?>

  </head>
  
  <body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

      <!-- header -->
      <?php echo @$_header; ?> <!-- nav -->
      
      <!-- sidebar-->
      
      <?php 
	  		echo @$_sidebar; 
	  		/*if ($this->session->userdata('level') =='admin'){
				echo @$_sidebaradmin; 
			}else if ($this->session->userdata('level') =='baaku'){
				echo @$_sidebarbaaku; 
			}else if ($this->session->userdata('level') =='keuangan'){
				echo @$_sidebarkeuangan; 
			}else if ($this->session->userdata('level') =='kepegawaian'){
				echo @$_sidebarkepegawaian; 
			}else if ($this->session->userdata('level') =='kerumahtanggaan'){
				echo @$_sidebarkerumahtanggaan; 
			} */
	  	
	   ?>
      <!-- content -->
      <?php echo @$_content; ?> <!-- headerContent --><!-- mainContent -->
    
      <!-- footer -->
      <?php echo @$_footer; ?>
    
        <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
  <!-- /.control-sidebar -->
    </div> <!-- ./wrapper -->

    <!-- js -->
    <?php echo @$_js; ?>
  </body>
</html>