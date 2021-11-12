<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Import Excel Codeigniter</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-3">
    <?php
    if (session()->getFlashdata('message')) {
    ?>
      <div class="alert alert-info">
        <?= session()->getFlashdata('message') ?>
      </div>
    <?php
    }
    ?>
    <form method="post" action="/siswa/simpanExcel" enctype="multipart/form-data">
      <div class="form-group">
        <label>File Excel</label>
        <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Upload</button>
      </div>
    </form>
    <table class="table table-bordered">
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