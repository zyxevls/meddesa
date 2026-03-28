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

        $totalJenis = count($obats);
        $totalStok = array_sum(array_column($obats, 'stok'));

        $today = new DateTime();
        $nextMonth = (new DateTime())->modify('+3 months');

        $expiredCount = 0;
        $expiringSoonCount = 0;

        foreach ($obats as $obat) {
            $expiryDate = new DateTime($obat['tanggal_expired']);
            if ($expiryDate < $today) {
                $expiredCount++;
            } elseif ($expiryDate <= $nextMonth) {
                $expiringSoonCount++;
            }
        }

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
            $_POST['kode_obat'],
            $_POST['nama'],
            $_POST['kategori'],
            $_POST['stok'],
            $_POST['harga'],
            $_POST['tanggal_expired'],
            $_POST['rak_penyimpanan'],
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
            $_POST['kode_obat'],
            $_POST['nama'],
            $_POST['kategori'],
            $_POST['stok'],
            $_POST['harga'],
            $_POST['tanggal_expired'],
            $_POST['rak_penyimpanan'],
        ]);

        flash()->success('Data obat berhasil diperbarui.');
        header('Location: /admin/obat');
        exit;
    }

    public function detail($id)
    {
        Middleware::auth();

        $obat = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/obat/detail.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function destroy($id)
    {
        Middleware::auth();

        $this->repo->destroy($id);

        flash()->success('Data obat berhasil dihapus.');
        header('Location: /admin/obat');
        exit;
    }
}
