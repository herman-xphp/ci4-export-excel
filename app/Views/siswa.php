<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Eksport Excel Codeigniter</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-3">
    <a href="/home/exportExcel" class="btn btn-primary">Download Excel</a>
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Alamat Siswa</th>
        </tr>
      </thead>
      <tbody id="contactTable">
        <?php
        if (!empty($Siswa)) {
          foreach ($Siswa as $dt) {
        ?>
            <tr>
              <td><?= $dt['nis'] ?></td>
              <td><?= $dt['nama_siswa'] ?></td>
              <td><?= $dt['alamat'] ?></td>
            </tr>
          <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="3">Tidak ada data</td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>