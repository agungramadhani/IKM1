<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Beranda | Kritik dan Saran Responden</h1>

			<h4 align="left">Selamat Datang <?php echo $this->session->adminName . " (" . $this->session->sessionEmail . ")"; ?></h4>
			<div class="row placeholders">
				<div class="col-xs-12 col-sm-12 placeholder">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Simpulan Kuisioner dari <?php echo $jumlahResponden; ?> Responden</h3>
						</div>

					</div>
				</div>
				<div class="row">
					<table class="table table-striped table-bordered table-hover" id="dataTables-list">
						<thead>
							<tr>
								<th class="title-center" style="font-size:1em; text-align:center;">No</th>
								<th class="title-center" style="font-size:1em; text-align:center;">Kritik dan Saran</th>
								<th class="title-center" style="font-size:1em; text-align:center;">Frekuensi</th>
								<th class="title-center" style="font-size:1em; text-align:center;">Persentase</th>

							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>

							<?php foreach ($dataa as $ls) {
							?>
								<tr>
									<td class="title-center" style="font-size:1em; text-align:center;"><?php echo $no++; ?></td>
									<td class="title-center" style="font-size:1em; text-align:center;"><?php echo $ls['value']; ?></td>
									<td class="title-center" style="font-size:1em; text-align:center;"><?php echo $ls['frekuensi_kritik']; ?></td>
									<td class="title-center" style="font-size:1em; text-align:center;"><?php echo $ls['frekuensi_kritik'] / $data3['jumlah'] * 100; ?>%</td>
								</tr>
							<?php } ?>
							<tr>
								<th class="title-center" style="font-size:1em; text-align:center;" colspan="2">Jumlah</th>
								<th class="title-center" style="font-size:1em; text-align:center;"><?php echo $data3['jumlah'] ?></th>
								<th class="title-center" style="font-size:1em; text-align:center;"><?php echo $data3['jumlah'] / $data3['jumlah'] * 100; ?>%</th>
							</tr>
						</tbody>
					</table>
				</div>

				<div>
					<canvas id="myChart"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
foreach ($dataa as $qq) {
	$kritik[] = $qq['value'];
	$frekuensi[] = $qq['frekuensi_kritik'];
	$ini = $qq['frekuensi_kritik'];
	$kiki = $data3['jumlah'];
	$hasil[] = $ini / $kiki * 100;
}
?>
<script>
	const labels = <?php echo json_encode($kritik) ?>;
	const data = {
		labels: labels,
		datasets: [{
			label: "Persentase (%)",
			data: <?php echo json_encode($hasil) ?>,
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
</script>