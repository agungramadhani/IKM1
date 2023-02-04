<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="SiPuas | Sistem Kuisioner Kepuasaan Masyrakat">
  <meta name="author" content="Saptanto Sindu K U">
  <!-- <link rel="icon" href="../../favicon.ico">  -->

  <title>Cetak Registrasi</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url("/assets/css/bootstrap.css"); ?>" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url("/assets/images/logo.png"); ?>" rel="shortcut icon">

  <!-- Style for DataTables -->
  <link href="<?php echo base_url("/assets/css/dataTables.bootstrap.css"); ?>" rel="stylesheet">
  <style type="text/css">
    .tabel {
      font-size: 16px;
    }

    table,
    td,
    th {
      text-align: center;
      font-size: 20px;
    }

    .tabel th {
      border-bottom: solid 1px black;
      border-top: solid 1px black;
      padding: 3px 3px;
    }

    td {
      padding: 3px 3px;

    }

    /* .header{
            float: left;
            /* background: #555; */
    /* } */
    .logo {
      float: left;
      width: 100px;
      height: 100px;
      /* background: #555; */
    }

    .container {
      width: 400px;
      height: 200px;
      overflow: hidden;
    }

    .container img {

      margin: -35px -450px -450px -100px;
    }

    table {
      border-collapse: collapse;

    }

    .center {
      margin-left: auto;
      margin-right: auto;
    }

    .left {
      margin-left: auto;
      margin-right: 150px;
    }

    div {
      width: 400px;
      height: 300px;
    }

    .garis_tepi1 {
      border: 2px solid black;
    }
  </style>
</head>

<body>
  <div align="top" class="garis_tepi1 center">

    <table width="10%" height="10%" class="center">
      <tr>
        <td></td>
      </tr>
    </table>
    <table align="center">
      <tr>
        <td>
          <font size=24> <?php if (empty($list['id_visit'])) {
                            echo "ID Kosong";
                          } else {
                            echo $list['id_visit'];
                          } ?>
        </td>
      </tr>
      <tr>
        <td></td>

      </tr>
      <tr>
        <td><?php if (empty($list['nama'])) {
              echo "Nama Kosong";
            } else {
              echo $list['nama'];
            } ?></td>
      </tr>
      <tr>
        <td><?php if (empty($list['jenkel'])) {
              echo "Jenis Kelamin Kosong";
            } else {
              echo $list['jenkel'];
            } ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

      </tr>
      <tr>
        <td><?php if (empty($list['instansi'])) {
              echo "Instansi Kosong";
            } else {
              echo $list['instansi'];
            } ?></td>
      </tr>
      <tr>
        <td><?php if (empty($list['date_created'])) {
              echo "Tanggal Kosong";
            } else {
              $dated = date('d-m-Y', strtotime($list['date_created']));
              echo $dated;
            } ?></td>
      </tr>
    </table>
  </div>
  <br>
  <br>
  <script>
    window.print();
    setInterval(() => {
      window.location.href = '<?php echo base_url("dashboard"); ?>';
    }, 10000);
  </script>
</body>

</html>