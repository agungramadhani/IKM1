<div class="container">
	<div class="container-page">
		<div class="row form-kuisioner">
			<a href="<?= base_url('dashboard') ?>">
				<h4>HOME</h4>
			</a>
			<h2>Formulir Kuisioner Responden Tentang Pelayanan Publik</h2>
			<hr>
			<form method="POST" action="<?php echo base_url("saveform"); ?>" role="form" enctype="multipart/form-data">
				<div class="col-md-6">
					<label for="prosedur">Masukkan Identitas Nomor Kunjungan*</label>
					<table class="table-kuisioner" border="0">
						<tr>
							<td>
								<input type="text" name="id_user" value="<?php echo set_value('id_user') ?>" class="form-control" placeholder="Isikan Nomor Kunjungan" required autofocus />
							</td>
						</tr>
					</table></br>
					<?php $i = 1; ?>
					<?php foreach ($data as $pertanyaan) : ?>
						<tr>
							<?php echo $i; ?>
							<td> <input type="hidden" id="where" name="kode_parameter[<?= $pertanyaan['kode_parameter'] ?>]" value="<?= $pertanyaan['kode_parameter'] ?>">						
						<tr>&nbsp;<?= $pertanyaan['parameter'] ?></tr>
						</tr>
						<table class="table-kuisioner" border="0">
						<?php if ($pertanyaan['type'] == 'Option') : ?>
							<tr>

								<!-- <input id="dis_dokter" name="dis_dokter" class="form-control" type="text" value="" disabled> -->
								
								<select type="text" name="kus1" id="kus1" class="form-control">
									<?php 
									$valuejwb = $this->db->query("select * from v_kuisioner where kode_parameter='".$pertanyaan['kode_parameter']."'")->result_array();;
										foreach ($valuejwb as $vlj){ ?> 
									<option value="0"><?= $vlj['value'] ?></option>
									<?php  } ?>
								</select>
							</tr>
							<?php endif ?>
							<tr>
							<?php if ($pertanyaan['type'] == 'textarea') : ?>
								<td>&nbsp;<?= $pertanyaan['parameter'] ?></td><br>
								<td><textarea name="value" cols="30" rows="10"> </textarea></td>
								<?php endif ?>
							</tr>
						</table>
						<?php if ($i <= 4) {
							$i++;
						} ?>

					<?php endforeach ?>

					<br>
					<button class="btn btn-lg btn-warning btn-block btn-custom" type="submit" name="submit" style="width: 120px;">Kirim</button><br>
					</br>&copy;Powered By <a href="#" target="_top">Admin</a>


					<?php
					if (validation_errors() == true || !empty($error)) {
						echo "<div class= \"alert alert-danger\"><ul>";
						if (validation_errors() == true) echo validation_errors('<li>', '</li>');
						if (!empty($error)) echo $error;
						echo "</ul></div>";
					}
					?>

				</div>
			</form>
		</div>
	</div>
</div>
<!-- <script ></script> -->
<script>
	// $(document).ready(function() {
	// 	function cok() {
	// 		var kode_parameter = $('#where').val();
	// 		$.ajax({
	// 			url: "<?php echo base_url('kuisioner/cok') ?>",
	// 			type: "POST",
	// 			dataType: "application/json; charset=utf-8",
	// 			data: {
	// 				'kode_parameter': kode_parameter
	// 			},
	// 			success: function(response) {
	// 				$.each(response, function(index, value) {
	// 					$('#kus1').append('<option value="' + value.kode_parameter + '">' + value.kode_parameter + '</option>');
	// 				});
	// 			}
	// 		});
	// 	};
	// });
	// $('#kus1').click(function() {
	// 	var kode_parameter = $('#where').val();
	// 	$.ajax({
	// 		url: "<?php echo base_url('kuisioner/cok') ?>",
	// 		type: "POST",
	// 		dataType: "application/json; charset=utf-8",
	// 		data: {
	// 			'kode_parameter': kode_parameter
	// 		},
	// 		success: function(response) {
	// 			$.each(response, function(index, value) {
	// 				$('#kus1').append('<option value="' + value.kode_parameter + '">' + value.kode_parameter + '</option>');
	// 			});
	// 		}
	// 	});
	// });
	// window.onload = function() {
	// 	cok();
	// };
	// function cok() {
	// 	// alert("success");
	// 	var kode_parameter = $('#where').val();
	// 	$.ajax({
	// 		url: "<?php echo base_url('kuisioner/cok') ?>",
	// 		type: "POST",
	// 		dataType: "application/json; charset=utf-8",
	// 		data: {
	// 			'kode_parameter': kode_parameter,
	// 		}
	// 	}).done(function(response) {
	// 		for (var i = 1; i <= response.data.length; i++) {
	// 			var option = '<option value="' + response.data[i].kode_parameter + '">'+ response.data[i].value+ '</option>';
	// 			$('#kus1').append(option);
	// 		}
	// 		console.log(response);
	// 	});
	// }
</script>