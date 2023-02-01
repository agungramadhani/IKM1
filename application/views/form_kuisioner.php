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
								<input type="text" name="id_visit" class="form-control" placeholder="Isikan Nomor Kunjungan" id=id_visit onkeyup="isi_otomatis()" required autofocus />
							</td>
						</tr>
					</table>
					<table class="table-kuisioner">
						<tr>
							<td>NIK</td>
							<td><input type="text" id="nik" disabled></td>
						</tr>
						<tr>
							<td>NAMA</td>
							<td><input type="text" id="nama" disabled></td>
						</tr>
						<tr>
							<td>UMUR</td>
							<td><input type="text" id="umur" disabled></td>
						</tr>
						<tr>
							<td>Jenkel</td>
							<td><input type="text" id="jenkel" disabled></td>
						</tr>
					</table>
					</br>
					<?php $i = 1; ?>
					<?php foreach ($data as $pertanyaan) : ?>
						<tr>
							<?php echo $i; ?>
							<td> <input type="hidden" id="kode" name="kode_parameter[<?= $pertanyaan['kode_parameter'] ?>]" value="<?= $pertanyaan['kode_parameter'] ?>">
						<tr>&nbsp;<?= $pertanyaan['parameter'] ?></tr>
						</tr>
						<table class="table-kuisioner" border="0">
							<?php if ($pertanyaan['type'] == 'Option') : ?>
								<tr>

									<!-- <input id="dis_dokter" name="dis_dokter" class="form-control" type="text" value="" disabled> -->

									<select name="kus[<?= $pertanyaan['kode_parameter'] ?>]" id="kus" class="form-control">
										<option value="0">--Pilih--</option>
										<?php
										$valuejwb = $this->db->query("select * from v_kuisioner where kode_parameter='" . $pertanyaan['kode_parameter'] . "'")->result_array();;

										foreach ($valuejwb as $vlj) { ?>
											<option value="<?= $vlj['value'] ?>"><?= $vlj['value'] ?></option>
										<?php  } ?>
									</select>
								</tr>
								<tr>
								<?php elseif ($pertanyaan['type'] == 'textarea') : ?>
									<td><textarea name="kus[<?= $pertanyaan['kode_parameter'] ?>]" cols="30" rows="10"> </textarea></td>
								</tr>
							<?php endif ?>
						</table>
						<!-- Button trigger modal -->

						<?php if ($i <= 4) {
							$i++;
						} ?>

					<?php endforeach ?>

					<br>
					<button class="btn btn-lg btn-warning btn-block btn-custom" type="submit" name="submit" onclick="func()" style="width: 120px;">Kirim</button><br>
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
	function isi_otomatis() {
		var id = $("#id_visit").val();
		$.ajax({
			url: 'kuisioner/coklat',
			data: "id_visit=" + id,
		}).success(function(data) {
			var json = data,
				obj = JSON.parse(json);
			$('#nik').val(obj.nik);
			$('#nama').val(obj.nama);
			$('#alamat').val(obj.alamat);
			$('#umur').val(obj.umur);
			$('#jenkel').val(obj.jenkel);
		});
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>