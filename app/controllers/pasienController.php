<?php

class PasienController
{
    private $repo;

    public function __construct()
    {
        $this->repo = new PasienRepository(Database::connect());
    }

    public function index()
    {
        Middleware::auth();
        $pasiens = $this->repo->all();
        $content = BASE_PATH . '/views/admin/pasien/index.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function create()
    {
        Middleware::auth();

        $content = BASE_PATH . '/views/admin/pasien/create.php';
        require BASE_PATH . '/views/layouts/app.php';
    }

    public function store()
    {
        Middleware::auth();

        $this->repo->create(
            $_POST['no_rm'],
            $_POST['nik'],
            $_POST['no_bpjs'],
            $_POST['nama'],
            $_POST['jenis_kelamin'],
            $_POST['tempat_lahir'],
            $_POST['tanggal_lahir'],
            $_POST['alamat'],
            $_POST['no_telephone'],
            $_POST['golongan_darah'],
            $_POST['pekerjaan'],
            $_POST['status_perkawinan'],
            $_POST['no_kk']
        );

        flash()->success('Data pasien berhasil ditambahkan.');
        header('Location: /admin/pasien');
        exit;
    }

    public function edit($id)
    {
        Middleware::auth();

        $pasien = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/pasien/edit.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function update($id)
    {
        Middleware::auth();

        $this->repo->update($id, [
            $_POST['no_rm'],
            $_POST['nik'],
            $_POST['no_bpjs'],
            $_POST['nama'],
            $_POST['jenis_kelamin'],
            $_POST['tempat_lahir'],
            $_POST['tanggal_lahir'],
            $_POST['alamat'],
            $_POST['no_telephone'],
            $_POST['golongan_darah'],
            $_POST['pekerjaan'],
            $_POST['status_perkawinan'],
            $_POST['no_kk']
        ]);

        flash()->success('Data pasien berhasil diperbarui.');
        header('Location: /admin/pasien');
        exit;
    }

    public function detail($id)
    {
        Middleware::auth();

        $pasien = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/pasien/detail.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function destroy($id)
    {
        Middleware::auth();

        $this->repo->delete($id);

        flash()->success('Data pasien berhasil dihapus.');
        header('Location: /admin/pasien');
        exit;
    }

    public function delete($id)
    {
        $this->destroy($id);
    }
}
