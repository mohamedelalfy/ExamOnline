

	<!-- End /Footer -->
	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->



	<!-- jQuery Plugins -->
	<script type="text/javascript" src="{{ url('/') }}/design/js/jquery.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/design/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/design/js/main.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/design/js/jsdelivr.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/design/js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/design/js/studentquiz.js"></script>
	



	<!-- REQUIRED JS SCRIPTS -->

	<link rel="stylesheet" href="{{ url('/') }}/design/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="{{ url('/') }}/design/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/design/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ url('/') }}/design/adminlte/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>

<!-- jQuery Plugins -->
	<script type="text/javascript" src="{{ url('/') }}/design/js/swiper.min.js"></script>
	<script>
		$(document).ready(function(){
			var table = $('#datatable').DataTable({
				"pagingType": "full_numbers",
			"lengthMenu":[
				[ 10, 25, 50,-1],
				[10,25,50,"All"]
				],
				"responsive":true,
				"language": {
					"search": "_INPUT_",
					"searchPlaceholder": "Search records"
				}
			});
			
		})
	</script>

</body>
</html>