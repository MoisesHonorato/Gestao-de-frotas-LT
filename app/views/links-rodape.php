<!-- ================ HOME =============== -->
<!-- jQuery-->
<script src="<?php echo URL_BASE ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo URL_BASE ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?php echo URL_BASE ?>assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo URL_BASE ?>assets/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="<?php echo URL_BASE ?>assets/vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo URL_BASE ?>assets/build/js/custom.min.js"></script>

<script src="<?php echo URL_BASE ?>assets/js/js.js"></script>

<!-- =========== link para pesquisar no select ======== -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
	$(document).ready(function() {
		$('.select2').select2();
	});
</script> -->

<!-- ======= / link para pesquisar no select =============================-->


<!-- ======================= PROJETO =================== -->
<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

<!-- jquery.inputmask Responsável por formatar o telefone -->
<script src="<?php echo URL_BASE ?>assets/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

<!-- Upload de arquivo -->
<script>
	function pegaArquivo(files) {
		var file = files[0];
		const fileReader = new FileReader();
		fileReader.onloadend = function() {
			$("#imgUp").attr("src", fileReader.result);
		}
		fileReader.readAsDataURL(file);
	}
</script>