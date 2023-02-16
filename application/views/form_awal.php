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
			<label class="control-label col-sm-3" for="nohp">No HP*</label>
			<div class="col-sm-9">
				<input type="number" name="nohp" value="<?php echo set_value('nohp') ?>" class="form-control" placeholder="Isikan Alamat responden" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="desa">Desa/Kelurahan*</label>
			<div class="col-md-3">
				<input type="text" name="desa" class="form-control" value="<?php echo set_value('desa') ?>" placeholder="Isikan Alamat responden" required autofocus />
			</div>
			<label class="control-label col-xs-3" style="width: 100px;" for="rtrw">RT/RW*</label>
			<div class="col-md-3">
				<input type="text" name="rtrw" value="<?php echo set_value('rtrw') ?>" class="form-control" placeholder="Isikan RT/RW" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="kecamatan">Kecamatan*</label>
			<div class="col-md-3">
				<input type="text" name="kecamatan" value="<?php echo set_value('kecamatan') ?>" class="form-control" placeholder="Isikan Alamat responden" required autofocus />
			</div>
			<label class="control-label col-xs-3" style="width: 100px;" for="kabupaten">Kabupaten*</label>
			<div class="col-md-3">
				<input type="text" name="kabupaten" value="LAMONGAN" class="form-control" placeholder="Isikan Suku/Etnis" required autofocus readonly />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="umur">Umur*</label>
			<div class="col-sm-9">
				<input type="number" name="umur" value="<?php echo set_value('umur') ?>" class="form-control" placeholder="Isikan Umur responden" required autofocus />
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
			<label class="control-label col-xs-3" for="suku">Suku/Etnis*</label>
			<div class="col-xs-3">
				<select name="suku" id="suku" style="height: 30px;">
					<option value="#">-- Pilih --</option>
					<option value="Jawa" style="font-size: medium;">Jawa</option>
					<option value="Madura" style="font-size: medium;">Madura</option>
					<option value="China" style="font-size: medium;">China/Tionghoa</option>
					<option value="Arab" style="font-size: medium;">Arab</option>
					<option value="5" onchange="suku()" style="font-size: medium;">Lainnya</option>
				</select>
			</div>
			<div class="col-md-6">
				<input type="text" name="suku" id="sukuu" class="form-control" placeholder="Isikan Suku Responden" disabled="disabled" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="pendidikan">Pendidikan Terakhir*</label>
			<div class="col-xs-3">
				<select name="pendidikan" style="height: 30px;">
					<option value="#">-- Pilih --</option>
					<option value="Tidak Sekolah" style="font-size: medium;">Tidak Sekolah</option>
					<option value="SD/Sederajat" style="font-size: medium;">SD/Sederajat</option>
					<option value="SLTP/Sederajat" style="font-size: medium;">SLTP/Sederajat</option>
					<option value="SLTA/Sederajat" style="font-size: medium;">SLTA/Sederajat</option>
					<option value="PT/Sederajat" style="font-size: medium;">PT/Sederajat</option>
					<option value="Pend.Nonformal(Ponpes/Kursus)" style="font-size: medium;">Pend.Nonformal(Ponpes/Kursus)</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="agama">Agama*</label>
			<div class="col-xs-3">
				<select name="agama" id="agama" style="height: 30px;">
					<option value="#">-- Pilih --</option>
					<option value="Islam" style="font-size: medium;">Islam</option>
					<option value="Kristen" style="font-size: medium;">Kristen</option>
					<option value="Katolik" style="font-size: medium;">Katolik</option>
					<option value="Budha" style="font-size: medium;">Budha</option>
					<option value="Hindu" style="font-size: medium;">Hindu</option>
					<option value="Khonghucu" style="font-size: medium;">Khong Hu Chu</option>
					<option value="Penghayat Kepercayaan" style="font-size: medium;">Penghayat Kepercayaan</option>
					<option value="5" onchange="agama()" style="font-size: medium;">Lainnya</option>
				</select>
			</div>
			<div class="col-md-6">
				<input type="text" name="agama" id="agamaa" class="form-control" placeholder="Isikann Agama Respnden" disabled="disabled" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="pekerjaan">Pekerjaan*</label>
			<div class="col-xs-3">
				<select name="pekerjaan" id="pekerjaan" style="height: 30px;">
					<option value="#">-- Pilih --</option>
					<option value="Pns" style="font-size: medium;">PNS</option>
					<option value="TNI-POLRI" style="font-size: medium;">TNI-POLRI</option>
					<option value="Pengusaha" style="font-size: medium;">Pengusaha</option>
					<option value="Pedagang" style="font-size: medium;">Pedangan</option>
					<option value="Karyawan" style="font-size: medium;">Karawan</option>
					<option value="Petani" style="font-size: medium;">Petani</option>
					<option value="Sektor Informal" style="font-size: medium;">Sektor Informal</option>
					<option value="Nelayan" style="font-size: medium;">Nelayan</option>
					<option value="Ibu Rumah Tangga" style="font-size: medium;">Ibu Rumah Tangga</option>
					<option value="Pengangguran" style="font-size: medium;">Pengangguran</option>
					<option value="5" onchange="pekerjaan()" style="font-size: medium;">Lainnya</option>
				</select>
			</div>
			<div class="col-md-6">
				<input type="text" name="pekerjaan" id="pekerjaann" class="form-control" placeholder="Isikan Pekerjaan responden" disabled="disabled" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="pekerjaan">Pekerjaan Orang Tua/Suami/Istri*</label>
			<div class="col-xs-3">
				<select name="pekerjaanortu" id="pekerjaanortu" style="height: 30px;">
					<option value="#">-- Pilih --</option>
					<option value="PNS" style="font-size: medium;">PNS</option>
					<option value="TNI-POLRI" style="font-size: medium;">TNI-POLRI</option>
					<option value="Pengusaha" style="font-size: medium;">Pengusaha</option>
					<option value="Pedagang" style="font-size: medium;">Pedagang</option>
					<option value="Karyawan" style="font-size: medium;">Karyawan</option>
					<option value="Petani" style="font-size: medium;">Petani</option>
					<option value="Sektor Informal" style="font-size: medium;">Sektor Informal</option>
					<option value="Nelayan" style="font-size: medium;">Nelayan</option>
					<option value="Ibu Rumah Tangga" style="font-size: medium;">Ibu Rumah Tangga</option>
					<option value="Pengangguran" style="font-size: medium;">Pengangguran</option>
					<option value="5" onchange="pekerjaanortu()" style="font-size: medium;">Lainnya</option>
				</select>
			</div>
			<div class="col-md-6">
				<input type="text" name="pekerjaanortuu" id="pekerjaanortuu" class="form-control" placeholder="Isikan Pekerjaan responden" disabled="disabled" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="penghasilan">Penghasilan Per-Bulan*</label>
			<div class="col-xs-3">
				<select name="penghasilan" style="height: 30px;">
					<option value="#">-- Pilih --</option>
					<option value="Tidak/Belum Berpenghasilan" style="font-size: medium;">Tidak/Belum Berpenghasilan</option>
					<option value="< Rp. 1 juta" style="font-size: medium;">
						< Rp. 1 juta</option>
					<option value="Rp. 1 juta - Rp. 2 juta" style="font-size: medium;">Rp. 1 juta - Rp. 2 juta</option>
					<option value="Rp. 2 juta - Rp. 3 juta" style="font-size: medium;">Rp. 2 juta - Rp. 3 juta</option>
					<option value="> Rp. 3 juta" style="font-size: medium;">> 3 juta</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="nopol">Organisasi Sosial Keagamaan*</label>
			<div class="col-xs-3">
				<select name="organisasi" id="organisasi" style="height: 30px;">
					<option value="#">-- Pilih --</option>
					<option value="NU/di bawah naungan NU" style="font-size: medium;">NU</option>
					<option value="Muhammadiyah/di bawah naungan Muhammadiyah" style="font-size: medium;">Muhammadiyah</option>
					<option value="Ormas Islam Lainnya" style="font-size: medium;">Ormas Islam Lainnya</option>
					<option value="Ormas di bawah Gereja" style="font-size: medium;">Ormas di bawah Gereja</option>
					<option value="Ormas di bawah Hindu" style="font-size: medium;">Ormas di bawah Hindu</option>
					<option value="Ormas di bawah Budha" style="font-size: medium;">Ormas di bawah Budha</option>
					<option value="Tidak Mengidentifikasi" style="font-size: medium;">Tidak Mengidentifikasi</option>
					<option value="5" onchange="ii()" style="font-size: medium;">Lainnya</option>
				</select>
			</div>
			<div class="col-md-6">
				<input type="text" name="organisasii" id="organisasii" class="form-control" placeholder="Isikan Pekerjaan responden" disabled="disabled" required autofocus />
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