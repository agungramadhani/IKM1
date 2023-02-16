<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="page-header" style="border-bottom: solid 1px blue">Karakteristik Responden</h3>

            <h4 align="left">Selamat Datang <?php echo $this->session->adminName . " (" . $this->session->sessionEmail . ")"; ?></h4>
            <div class="row placeholders">
                <div class="col-xs-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Karakteristik Responden PPK</h3>
                        </div>

                    </div>
                    <div>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-list">
                            <thead>
                                <tr>
                                    <th class="title-center" style="font-size:1em; text-align:center;">No</th>
                                    <th class="title-center" style="font-size:1em; text-align:center;">Karakteristik</th>
                                    <th class="title-center" style="font-size:1em; text-align:center;">Indikator</th>
                                    <th class="title-center" style="font-size:1em; text-align:center;">Persentasi (%)</th>
                                </tr>
                                <tr>
                                    <th class="title-center" style="font-size:1em; vertical-align: middle; text-align:center;" rowspan="4">1</th>
                                    <th class="title-center" style="font-size:1em; vertical-align: middle; text-align:center;" rowspan="4">Umur</th>
                                    <?php foreach ($nilai as $ls) {
                                    ?>
                                        <td class="title-center" style="font-size:1em; text-align:center;"><?php echo $ls['RANGE_AGE']; ?></td>
                                        <td class="title-center" style="font-size:1em; text-align:center;"><?php echo $ls['hasil'] / $ssi['HSL'] * 100; ?>%</td>

                                </tr>
                            <?php } ?>
                            <tr>
                                <th class="title-center" style="font-size:1em; vertical-align: middle; text-align:center;" rowspan="2">2</th>
                                <th class="title-center" style="font-size:1em; vertical-align: middle; text-align:center" rowspan="2">Jenis Kelamin</th>
                                <?php foreach ($si as $ni) {
                                ?>
                                    <td class="title-center" style="font-size:1em; text-align:center;"><?php echo $ni['jenkel']; ?></td>
                                    <td class="title-center" style="font-size:1em; text-align:center;"><?php echo $ni['jenis'] / $sii['hasil'] * 100 ?>%</td>

                            </tr>
                        <?php } ?>
                        </tr>
                        </table>

                    </div>
                </div>

            </div>
            <br><br>
            <div>
                <canvas id="myChart"></canvas>
            </div>
            <br><br>
            <div>
                <canvas id="myChartt"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
foreach ($nilai as $qq) {
    $indikator[] = $qq['RANGE_AGE'];
    $ini = $qq['hasil'];
    $kiki = $ssi['HSL'];
    $hasil = $ini / $kiki * 100;
    $persen[] = $hasil;
}
?>
<script>
    const labels = <?php echo json_encode($indikator) ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: "Umur (%)",
            data: <?php echo json_encode($persen) ?>,
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

<?php
foreach ($si as $q) {
    $indi[] = $q['jenkel'];
    $itu = $q['jenis'];
    $kaka = $sii['hasil'];
    $rr = $itu / $kaka * 100;
    $per[] = $rr;
}
?>
<script>
    const labelss = <?php echo json_encode($indi) ?>;
    const dataa = {
        labels: labelss,
        datasets: [{
            label: "Jenis (%)",
            data: <?php echo json_encode($per) ?>,
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

    const configg = {
        type: 'bar',
        data: dataa,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    var myChartt = new Chart(
        document.getElementById('myChartt'),
        configg
    );
</script>