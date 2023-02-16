<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h3 class="page-header" style="border-bottom: solid 1px blue">Daftar Responden</h3>
			<div class="row">
				<table class="table table-striped table-bordered table-hover" id="dataTables-list">
					<thead>
						<tr>
							<th class="title-center" style="font-size:1em; text-align:center;">No.</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Nama</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Umur</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Alamat</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Waktu</th>
							<th class="title-center" style="font-size:1em; text-align:center;">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($listRespon as $item) { ?>
							<tr>
								<td style="font-size:1em; text-align:center;"><?php echo $no++ ?></td>
								<td style="font-size:1em; text-align:center;"><?php echo $item['nama'] ?></td>
								<td style="font-size:1em; text-align:center;"><?php echo $item['umur'] ?></td>
								<td style="font-size:1em; text-align:center;"><?php echo $item['alamat'] ?></td>
								<td style="font-size:1em; text-align:center;"><?php echo $item['date'] ?></td>
								<td style="font-size:1em; text-align:center;">
									<?php echo anchor(base_url('administrasi/detail_respon/' . $item['id_visit']), '<div class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#multiCollapseExample2"><i class="fa fa-search-plus"></i></div></button></a>'); ?>
								</td>
							</tr>
						<?php }
						?>
					</tbody>
				</table>
			</div>
			</br>
			</br>
			<!-- <div class="collapse multi-collapse" id="multiCollapseExample2">
				<div class="card-body">
					<h4 class="page-header" style="border-bottom: solid 1px blue">Detail Respon</h4>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="font-size:1em; text-align:center;">No.</th>
								<th style="font-size:1em; text-align:center;">Nama</th>
								<th style="font-size:1em; text-align:center;">Pertanyaan</th>
								<th style="font-size:1em; text-align:center;">Jawaban</th>
							</tr>
						</thead>
						<?php
						// foreach ($no_wifi as $tyy) {
						// $no_wifi = $this->db->query("SELECT hasil_survey,alamat,pic,foto_stiker,lat,lng FROM data_wifi")->row();
						?>
						<tbody>
							<?php
							$no = 1;
							foreach ($respon as $item) { ?>
								<tr>
									<td style="font-size:1em; text-align:center;"><?php echo $no++ ?></td>
									<td style="font-size:1em; text-align:center;"><?php echo $item['nama'] ?></td>
									<td style="font-size:1em; text-align:left;"><?php echo $item['parameter'] ?></td>
									<td style="font-size:1em; text-align:center;"><?php echo $item['value'] ?></td>
								</tr>
							<?php }
							?>
						</tbody>
					</table>
				</div>
				<!-/.card-body -->
		</div>
		<!-- <div>
				<canvas id="myChart"></canvas>
			</div> -->
	</div>
</div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
foreach ($unsur as $qq) {
	$indikator[] = $qq['kode_parameter'];
	$kiki[] = $qq['rata_rata'];
}
?>
<script>
	const labels = <?php echo json_encode($indikator) ?>;
	const data = {
		labels: labels,
		datasets: [{
			label: "Jumlah Nilai",
			data: <?php echo json_encode($kiki) ?>,
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 159, 64, 0.2)',
				'rgba(255, 205, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(201, 203, 207, 0.2)'
			],
			borderColor: [
				'rgb(255, 99, 132)',
				'rgb(255, 159, 64)',
				'rgb(255, 205, 86)',
				'rgb(75, 192, 192)',
				'rgb(54, 162, 235)',
				'rgb(153, 102, 255)',
				'rgb(201, 203, 207)'
			],
			borderWidth: 1
		}]
	};

	const config = {
		type: 'bar',
		data: data,
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		},
	};

	var myChart = new Chart(
		document.getElementById('myChart'),
		config
	);
</script> -->