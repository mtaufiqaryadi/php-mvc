<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'index mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMhs();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'index mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMhsById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMhs($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'warning');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusMhsById($id) > 0) {
            Flasher::setFlash('berhasil', 'menghapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'menghapus', 'warning');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMhsById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMhs($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'index mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariMhs();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
