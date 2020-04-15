<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>l_asséts/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>l_asséts/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>l_asséts/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>l_asséts/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>l_asséts/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>l_asséts/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>l_asséts/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- sweetalert2-->
<script src="<?php echo base_url(); ?>l_asséts/sweetalert2/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
    });
  });

  const flashData = $('.flash-data').data('flashdata');
  const title = $('.flash-data').data('title');

  if (flashData) {
      Swal({
          title: title,
          text: 'Berhasil ' + flashData,
          type: 'success'
      });
  }

  // tombol-hapus
  $('.tombol-hapus').on('click', function (e) {

      e.preventDefault();
      const href = $(this).attr('href');

      Swal({
          title: 'Apakah anda yakin',
          text: "Data akan dihapus",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus Data!'
      }).then((result) => {
          if (result.value) {
              document.location.href = href;
          }
      })
  });

</script>

<script type="text/javascript">
	$(document).ready(function(){
		$(".title").autocomplete({
		source: "<?php echo site_url('Keluarga/get_autocomplete/?');?>",

			select: function (event, ui) {
				$('#nama').val(ui.item.label);
        $('[name="id"]').val(ui.item.id);
        $('[name="alamat_sekarang"]').val(ui.item.alamat_sekarang);
        $('[name="id_cluster"]').val(ui.item.id_cluster);
			},
			response: function(event, ui) {
				if (!ui.content.length) {
					var noResult = { value:"",label:"Tidak Ditemukan" };
					ui.content.push(noResult);
				}
			}
		});
	});
</script>


 
 
 
