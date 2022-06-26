<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('./assets/css/bootstrap.min.css') ?>">
	<title>Aplikasi Peminjaman | Tambah Data</title>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark">
		<div class="container-fluid">
			<span class="navbar-brand mb-0 h1">Aplikasi Peminjaman</span>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<div class="col-lg-8">
				<div class="card mt-5">
					<div class="card-header bg-primary">
						<h5 class="fw-bold text-white">Tambah Data</h5>
					</div>
					<div class="card-body">
						<form action="<?= base_url('insert') ?>" method="post" enctype="multipart/form-data">
							<div class="form-group mb-3">
								<label for="" class="mb-2">Nama Nasabah :</label>
								<input type="text" name="nama" class="form-control">
							</div>
							<div class="form-group mb-3">
								<label for="" class="mb-2">Jumlah Pinjaman :</label>
								<input type="number" name="pinjam" class="form-control">
							</div>
							<div class="form-group mb-3">
								<label for="" class="mb-2">Tenor / Jangka Waktu ( Bulan ) :</label>
								<input type="number" name="waktu" class="form-control">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('./assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>