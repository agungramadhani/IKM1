<div class="container">
	<form class="form-responden form-horizontal" method="POST" action="<?php echo base_url("save"); ?>" role="form" enctype="multipart/form-data">
		<a href="<?= base_url('dashboard') ?>">
			<h4>HOME</h4>
		</a>
		<h3 align="center">Formulir Registrasi Kunjungan </h3><br>
		<div class="form-group">
			<label class="control-label col-sm-3" for="nik">Nomor NIK*</label>
			<div class="col-sm-9">
				<input type="number" name="nik" value="<?php echo set_value('nik') ?>" class="form-control" placeholder="Isikan NIK responden" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="nama">Nama Pengunjung*</label>
			<div class="col-sm-9">
				<input type="text" name="nama" value="<?php echo set_value('nama') ?>" class="form-control" placeholder="Isikan Nama responden" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="alamat">Alamat*</label>
			<div class="col-sm-9">
				<input type="text" name="alamat" value="<?php echo set_value('alamat') ?>" class="form-control" placeholder="Isikan Alamat responden" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="umur">Umur*</label>
			<div class="col-sm-9">
				<input type="text" name="umur" value="<?php echo set_value('umur') ?>" class="form-control" placeholder="Isikan Umur responden" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Jenis Kelamin*</label>
			<div class="col-sm-9">
				<div class="radio">
					<label><input type="radio" name="jenkel" value="Laki-Laki" <?php echo set_radio('jenkel', '0', TRUE); ?> required> Laki-Laki</label>
					<label><input type="radio" name="jenkel" value="Perempuan" <?php echo set_radio('jenkel', '1'); ?> required> Perempuan</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="instansi">Nama Instansi*</label>
			<div class="col-sm-9">
				<input type="text" name="instansi" value="<?php echo set_value('instansi') ?>" class="form-control" placeholder="Isikan Nama Instansi responden" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="keperluan">Keperluan Kunjungan*</label>
			<div class="col-sm-9">
				<input type="text" name="keperluan" value="<?php echo set_value('keperluan') ?>" class="form-control" placeholder="Isikan Keperluan Kunjungan responden" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="nopol">Nomor Pol</label>
			<div class="col-sm-9">
				<input type="text" name="nopol" value="<?php echo set_value('nopol') ?>" class="form-control" placeholder="Isikan Nomor Pol responden" />
			</div>
		</div>
		<div>Keterangan : * = Harus diisi</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Registrasi</button><br>
		<?php
		$validasi = validation_errors();
		if (!empty($validasi)) {
			echo "<div class= \"alert alert-danger\"><ol type='1'>";
			if (!empty($validasi)) echo validation_errors("<li>", "</li>");
			echo "</ol></div>";
		}
		?>
	</form>
</div>