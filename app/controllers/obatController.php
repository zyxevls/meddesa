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
        $content = '../views/obat/index.php';

        require '../views/layouts/app.php';
    }

    public function create()
    {
        Middleware::auth();

        $content = '../views/obat/create.php';
        require '../views/layouts/app.php';
    }

    public function store()
    {
        Middleware::auth();

        $this->repo->create([
            $_POST['nama'],
            $_POST['harga'],
            $_POST['stok']
        ]);

        header('Location: /admin/obat');
    }

    public function edit($id)
    {
        Middleware::auth();

        $obat = $this->repo->find($id);
        $content = '../views/obat/edit.php';

        require '../views/layouts/app.php';
    }
}
