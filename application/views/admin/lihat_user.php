<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h3 class="page-header" style="border-bottom: solid 1px blue">Lihat User</h3>

			<div style="margin-right:1px; padding-bottom:45px; margin-top:-20px">
				<a href="<?php echo site_url("administrasi/export_user") ?>" class="btn btn-primary pull-right">Export ke Excel</a>
			</div>

			<div class="row">
				<table class="table table-striped table-bordered table-hover" id="dataTables-list">
					<thead>
						<tr>
							<th class="title-center" style="font-size:1em; text-align:center;">No.</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Nomor NIK</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Nama</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Alamat</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Umur</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Jenis Kelamin</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Instansi</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Keperluan</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Nomor Pol</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Waktu Pengisian</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($listUser as $item) {
							echo '<tr>
										<td>' . $no++ . '</td>
										<td>' . $item['nik'] . '</td>
										<td>' . $item['nama'] . '</td>
										<td>' . $item['alamat'] . '</td>
										<td>' . $item['umur'] . '</td>
										<td>' . $item['jenkel'] . '</td>
										<td>' . $item['instansi'] . '</td>
										<td>' . $item['keperluan'] . '</td>
										<td>' . $item['no_pol'] . '</td>
										<td>' . $item['date_created'] . '</td>
										
								</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>