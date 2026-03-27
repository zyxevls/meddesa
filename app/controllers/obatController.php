<?php

class ObatController
{
    private $repo;

    public function __construct()
    {
        $this->repo = new ObatRepository(Database::connect());
    }

    public function index()
    {
        Middleware::auth();

        $obats = $this->repo->all();
        $content = BASE_PATH . '/views/admin/obat/index.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function create()
    {
        Middleware::auth();

        $content = BASE_PATH . '/views/admin/obat/create.php';
        require BASE_PATH . '/views/layouts/app.php';
    }

    public function store()
    {
        Middleware::auth();

        $this->repo->create([
            $_POST['nama'],
            $_POST['harga'],
            $_POST['stok']
        ]);

        flash()->success('Data obat berhasil ditambahkan.');
        header('Location: /admin/obat');
        exit;
    }

    public function edit($id)
    {
        Middleware::auth();

        $obat = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/obat/edit.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function update($id)
    {
        Middleware::auth();

        $this->repo->update($id, [
            $_POST['nama'],
            $_POST['harga'],
            $_POST['stok']
        ]);

        flash()->success('Data obat berhasil diperbarui.');
        header('Location: /admin/obat');
        exit;
    }

    public function destroy($id)
    {
        Middleware::auth();

        $this->repo->delete($id);

        flash()->success('Data obat berhasil dihapus.');
        header('Location: /admin/obat');
        exit;
    }
}
