<?php

class DokterController
{
    private $repo;

    public function __construct()
    {
        $this->repo = new DokterRepository(Database::connect());
    }

    public function index()
    {
        Middleware::auth();

        $dokters = $this->repo->all();

        $content = BASE_PATH . '/views/admin/dokter/index.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function create()
    {
        Middleware::auth();

        $content = BASE_PATH . '/views/admin/dokter/create.php';
        require BASE_PATH . '/views/layouts/app.php';
    }

    public function store()
    {
        Middleware::auth();

        $this->repo->create([
            $_POST['nip'],
            $_POST['sip'],
            $_POST['nama_dokter'],
            $_POST['spesialisasi'],
            $_POST['images'] ?? null,
            $_POST['no_telp'],
            $_POST['is_active'] ?? '1',
        ]);

        flash()->success('Dokter berhasil ditambahkan.');
        header('Location: /admin/dokter');
        exit;
    }

    public function edit($id)
    {
        Middleware::auth();

        $dokter = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/dokter/edit.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function update($id)
    {
        Middleware::auth();

        $this->repo->update($id, [
            $_POST['nip'],
            $_POST['sip'],
            $_POST['nama_dokter'],
            $_POST['spesialisasi'],
            $_POST['images'] ?? null,
            $_POST['no_telp'],
            $_POST['is_active'] ?? '1',
        ]);

        flash()->success('Data dokter berhasil diperbarui.');
        header('Location: /admin/dokter');
        exit;
    }

    public function detail($id)
    {
        Middleware::auth();

        $dokter = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/dokter/detail.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function destroy($id)
    {
        Middleware::auth();

        $this->repo->destroy($id);

        flash()->success('Data dokter berhasil dihapus.');
        header('Location: /admin/dokter');
        exit;
    }
}
