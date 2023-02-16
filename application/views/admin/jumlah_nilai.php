<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="page-header" style="border-bottom: solid 1px blue">Jumlah Nilai Rata - Rata dan NRR Tertimbang</h3>

            <h4 align="left">Selamat Datang <?php echo $this->session->adminName . " (" . $this->session->sessionEmail . ")"; ?></h4>
            <div class="row placeholders">
                <div class="col-xs-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Jumlah Nilai Rata - Rata dan NRR Tertimbang</h3>
                        </div>

                    </div>
                    <div>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-list">
                            <thead>
                                <tr>
                                    <th class="title-center" style="font-size:1em; text-align:center;">No</th>
                                    <th class="title-center" style="font-size:1em; text-align:center;">Unsur Pelayanan</th>
                                    <th class="title-center" style="font-size:1em; text-align:center;">Rata - Rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($unsur as $item) {
                                    echo '<tr>
										<td>' . $no++ . '</td>
										<td>' . $item['parameter'] . '</td>
                                        <td style="text-align:center;">' . $item['rata_rata'] . '</td>
								        </tr>';
                                }
                                ?>
                                <tr>
                                    <th class="title-center" style="font-size:1em; text-align:center;" colspan="2">Jumlah NRR Tertimbang</th>
                                    <th class="title-center" style="font-size:1em; text-align:center;"><?php foreach ($total as $i) {
                                                                                                            echo number_format($i['total'], 2);
                                                                                                        ?><?php } ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
</script>