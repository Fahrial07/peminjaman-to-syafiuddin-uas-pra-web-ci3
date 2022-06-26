<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('./assets/css/bootstrap.min.css') ?>">
	<title>Aplikasi Peminjaman | Data Peminjaman</title>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark">
		<div class="container-fluid">
			<span class="navbar-brand mb-0 h1">Aplikasi Peminjaman</span>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card m-5">
					<div class="card-header bg-info">
						<h5 class="fw-bold">Data Peminjaman</h5>
					</div>
					<div class="card-body">
						<div class="btn-group">
							<a href="<?= base_url('tambah') ?>" class="btn btn-success btn-sm fw-bold"> + Tambah Data</a>
						</div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Nama Nasabah</th>
										<th scope="col">Jumlah Pinjaman</th>
										<th scope="col">Bunga</th>
										<th>Tenor ( Bln )</th>
										<th>Total Bunga</th>
										<th>Total Bayar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$n = 1;
									foreach ($data as $d) {
									?>
										<tr>
											<th scope="row"><?= $n; ?></th>

											<td><?= $d->nama ?></td>

											<td>
												Rp. <?= number_format($d->pinjam, 0) ?>
											</td>

											<td>
												<?php
												//mencari jumlah bunga dari persentase
												$pin = $d->pinjam;
												$persen = $d->bunga / 100;
												$hasil = $persen * $pin;
												?>

												Rp. <?= number_format($hasil, 0) ?> ( <?= $d->bunga ?> % )
											</td>

											<td>
												<?= $d->jangka_waktu ?> Bulan
											</td>

											<td>
												<?php
												//mencari total bunga dari jumlah bunga di kali tenor
												$jumlah = $hasil * $d->jangka_waktu
												?>

												Rp. <?= number_format($jumlah, 0) ?>
											</td>

											<td>
												<?php
												//mencari jumlah bayar dari total bunga dan pinjaman
												$bayar = $jumlah + $d->pinjam;
												?>

												Rp. <?= number_format($bayar, 0) ?>
											</td>
											<td>
												<div class="btn-group">
													<button class="btn btn-warning btn-sm fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#exampleHapus<?= $d->id ?>">Edit</button>
													<a href="<?= base_url('hapus/' . $d->id) ?>" class="btn btn-danger btn-sm fw-bold">Hapus</a>

												</div>

												<!-- Modal -->
												<div class="modal fade" id="exampleHapus<?= $d->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<form action="<?= base_url('update/' . $d->id) ?>" method="post" enctype="multipart/form-data">
																	<div class="form-group mb-3">
																		<label for="" class="mb-2">Nama Nasabah :</label>
																		<input type="text" name="nama" value="<?= $d->nama ?>" class="form-control">
																	</div>
																	<div class="form-group mb-3">
																		<label for="" class="mb-2">Jumlah Pinjaman :</label>
																		<input type="number" name="pinjam" value="<?= $d->pinjam ?>" class="form-control">
																	</div>
																	<div class="form-group mb-3">
																		<label for="" class="mb-2">Tenor / Jangka Waktu ( Bulan ) :</label>
																		<input type="number" name="waktu" value="<?= $d->jangka_waktu ?>" class="form-control">
																	</div>
																	<div class="form-group">
																		<button type="submit" class="btn btn-success btn-sm">Simpan</button>
																	</div>
																</form>
															</div>
															<div class="modal-footer">
															</div>
														</div>
													</div>
												</div>


											</td>
										</tr>
									<?php
										$n++;
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('./assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>