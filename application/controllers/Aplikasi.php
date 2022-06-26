<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aplikasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_aplikasi');
	}

	public function index()
	{
		$data = array(
			'data'	=> $this->M_aplikasi->getData()
		);

		$this->load->view('aplikasi/index', $data);
	}

	public function tambah()
	{
		$this->load->view('aplikasi/tambah');
	}

	public function aksi()
	{
		$nama = $this->input->post('nama');
		$pinjam = $this->input->post('pinjam');
		$waktu = $this->input->post('waktu');

		//perkondsian penentuan bunga dalam %
		if ($pinjam < 100000) {
			//jika kurang atau sama dengan 100.000
			$bunga = '0.5';
		} else if ($pinjam == 100000) {
			//jika lebih 100.000 atau kurang sama dengan 500.000
			$bunga = '1';
		} else if ($pinjam == 500000 || $pinjam < 100000) {
			//jika lebih 500.000 atau kurang sama dengan 1000.000
			$bunga = '1.5';
		} else if ($pinjam == 1000000 || $pinjam < 5000000) {
			//jika lebih 1000.000 atau kurang sama dengan 5000.000
			$bunga = '2';
		} else if ($pinjam >= 5000000) {
			//jika lebih dari 5000.000
			$bunga = '2.5';
		}

		$data = array(
			'nama'	=> $nama,
			'pinjam'	=> $pinjam,
			'bunga'	=> $bunga,
			'jangka_waktu'	=> $waktu
		);

		$this->M_aplikasi->insert($data);
		redirect('home');
	}

	public function edit($id)
	{
		$nama = $this->input->post('nama');
		$pinjam = $this->input->post('pinjam');
		$waktu = $this->input->post('waktu');

		//perkondsian penentuan bunga dalam %
		if ($pinjam < 100000) {
			//jika kurang atau sama dengan 100.000
			$bunga = '0.5';
		} else if ($pinjam == 100000) {
			//jika lebih 100.000 atau kurang sama dengan 500.000
			$bunga = '1';
		} else if ($pinjam == 500000 || $pinjam < 100000) {
			//jika lebih 500.000 atau kurang sama dengan 1000.000
			$bunga = '1.5';
		} else if ($pinjam == 1000000 || $pinjam < 5000000) {
			//jika lebih 1000.000 atau kurang sama dengan 5000.000
			$bunga = '2';
		} else if ($pinjam >= 5000000) {
			//jika lebih dari 5000.000
			$bunga = '2.5';
		}

		$data = array(
			'nama'	=> $nama,
			'pinjam'	=> $pinjam,
			'bunga'	=> $bunga,
			'jangka_waktu'	=> $waktu
		);

		$this->M_aplikasi->update($id, $data);
		redirect('home');
	}

	public function delete($id)
	{
		$this->M_aplikasi->delete($id);
		redirect('home');
	}
}
