<?php

class ReservasiController
{
    private $repo;

    public function __construct()
    {
        $this->repo = new ReservasiRepository(Database::connect());
    }

    public function index()
    {
        Middleware::auth();
        $reservasis = $this->repo->all();
        $content = BASE_PATH . '/views/admin/reservasi/index.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function create()
    {
        Middleware::auth();
        $pasienRepo = new PasienRepository(Database::connect());
        $pasiens = $pasienRepo->all();

        $content = BASE_PATH . '/views/admin/reservasi/create.php';
        require BASE_PATH . '/views/layouts/app.php';
    }

    public function store()
    {
        Middleware::auth();

        $this->repo->create(
            $_POST['pasien_id'],
            $_POST['nomor_antrean'],
            $_POST['poli_tujuan'],
            $_POST['tanggal_reservasi'],
            $_POST['keluhan'],
            $_POST['status']
        );

        flash()->success('Data reservasi berhasil ditambahkan.');
        header('Location: /admin/reservasi');
        exit;
    }

    public function edit($id)
    {
        Middleware::auth();

        $reservasi = $this->repo->find($id);
        $pasienRepo = new PasienRepository(Database::connect());
        $pasiens = $pasienRepo->all();

        $content = BASE_PATH . '/views/admin/reservasi/edit.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function update($id)
    {
        Middleware::auth();

        $this->repo->update($id, [
            $_POST['pasien_id'],
            $_POST['nomor_antrean'],
            $_POST['poli_tujuan'],
            $_POST['tanggal_reservasi'],
            $_POST['keluhan'],
            $_POST['status']
        ]);

        flash()->success('Data reservasi berhasil diperbarui.');
        header('Location: /admin/reservasi');
        exit;
    }

    public function detail($id)
    {
        Middleware::auth();

        $reservasi = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/reservasi/detail.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function destroy($id)
    {
        Middleware::auth();

        $this->repo->delete($id);

        flash()->success('Data reservasi berhasil dihapus.');
        header('Location: /admin/reservasi');
        exit;
    }

    public function delete($id)
    {
        $this->destroy($id);
    }
}
