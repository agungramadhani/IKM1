<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type='text/javascript' src="<?php echo base_url('/assets/js/jquery.min.js'); ?>"></script>

<script type='text/javascript' src="<?php echo base_url('/assets/js/jquery.dataTables.min.js'); ?>"></script>

<script type='text/javascript' src="<?php echo base_url('/assets/js/bootstrap.js'); ?>"></script>

<script type='text/javascript' src="<?php echo base_url('/assets/js/dataTables.bootstrap.js'); ?>"></script>

<?php if (empty($useSimple)) { ?>
	<script src="<?php echo base_url('/assets/js/msdnaa.js'); ?>"></script>
<?php } ?>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url('/assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>

<script>
	$(document).ready(function() {
		var kode_parameter = $('#where').val();
		$.ajax({
			url: "<?php echo base_url('kuisioner/cok') ?>",
			type: "POST",
			dataType: "application/json; charset=utf-8",
			data: {
				'kode_parameter': kode_parameter,
			}
		}).done(function(response) {
			// for (var i = 1; i <= response.data.length; i++) {
			// 	var option = '<option value="' + response.data[i].kode_parameter + '">'+ response.data[i].value+ '</option>';
			// 	$('#kus1').append(option);
			// }
			console.log(response);
		});
	});
	// $(document).ready(function() {
	// 	$("#jawab").on('change', function() {
	// 		var formData = {
	// 			'jawaban': $('input[name=jawab]:checked').val(),
	// 			'id_user': $('input[name=id_user]').val(),
	// 			'kode_pertanyaan': $('input[name=kode_pertanyaan]').val()
	// 		};
	// 		$.ajax({
	// 			type: "POST",
	// 			url: "<?= base_url('saveform') ?>",
	// 			data: formData,
	// 			success: function(data) {
	// 				console.log(formData)
	// 			}
	// 		});
	// 	});
	// });
</script>
</body>

</html>