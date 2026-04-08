<?php

class PegawaiController
{
    private $repo;

    public function __construct()
    {
        $this->repo = new PegawaiRepository(Database::connect());
    }

    public function index()
    {
        Middleware::auth();

        $pegawais = $this->repo->all();

        $content = BASE_PATH . '/views/admin/pegawai/index.php';
        require BASE_PATH . '/views/layouts/app.php';
    }

    public function create()
    {
        Middleware::auth();

        $content = BASE_PATH . '/views/admin/pegawai/create.php';
        require BASE_PATH . '/views/layouts/app.php';
    }

    public function store()
    {
        Middleware::auth();

        $this->repo->create(
            $_POST['nip'],
            $_POST['nama_pegawai'],
            $_POST['jabatan'],
            $_POST['no_telp'],
            $_POST['email'] ?? '',
            $_POST['alamat'] ?? '',
            $_POST['tgl_lahir'] ?? '',
            $_POST['pendidikan'] ?? '',
            $_POST['is_active'] ?? '1'
        );

        flash()->success('Pegawai berhasil ditambahkan.');
        header('Location: /admin/pegawai');
        exit;
    }

    public function edit($id)
    {
        Middleware::auth();

        $pegawai = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/pegawai/edit.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function update($id)
    {
        Middleware::auth();

        $this->repo->update(
            $id,
            $_POST['nip'],
            $_POST['nama_pegawai'],
            $_POST['jabatan'],
            $_POST['no_telp'],
            $_POST['email'] ?? '',
            $_POST['alamat'] ?? '',
            $_POST['tgl_lahir'] ?? '',
            $_POST['pendidikan'] ?? '',
            $_POST['is_active'] ?? '1'
        );

        flash()->success('Pegawai berhasil diperbarui.');
        header('Location: /admin/pegawai');
        exit;
    }

    public function destroy($id)
    {
        Middleware::auth();

        $this->repo->delete($id);

        flash()->success('Pegawai berhasil dihapus.');
        header('Location: /admin/pegawai');
        exit;
    }

    public function detail($id)
    {
        Middleware::auth();

        $pegawai = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/pegawai/detail.php';

        require BASE_PATH . '/views/layouts/app.php';
    }
}
