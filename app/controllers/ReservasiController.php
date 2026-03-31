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
        $pasiens = (new PasienRepository(Database::connect()))->all();
        $dokters = $this->getDokters();

        $content = BASE_PATH . '/views/admin/reservasi/create.php';
        require BASE_PATH . '/views/layouts/app.php';
    }

    public function store()
    {
        Middleware::auth();

        $dokterId = $_POST['dokter_id'] ?? null;
        if (empty($dokterId)) {
            flash()->error('Dokter wajib dipilih.');
            header('Location: /admin/reservasi/create');
            exit;
        }

        $this->repo->create(
            $_POST['pasien_id'],
            $_POST['nomor_antrean'],
            $dokterId,
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
        $pasiens = (new PasienRepository(Database::connect()))->all();
        $dokters = $this->getDokters();

        $content = BASE_PATH . '/views/admin/reservasi/edit.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function update($id)
    {
        Middleware::auth();

        $existing = $this->repo->find($id);
        $dokterId = $_POST['dokter_id'] ?? ($existing['dokter_id'] ?? null);

        if (empty($dokterId)) {
            flash()->error('Dokter wajib dipilih.');
            header('Location: /admin/reservasi/edit/' . $id);
            exit;
        }

        $this->repo->update($id, [
            $_POST['pasien_id'],
            $_POST['nomor_antrean'],
            $dokterId,
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

    private function getDokters()
    {
        try {
            $stmt = Database::connect()->query('SELECT id, nip, sip, nama_dokter, spesialisasi FROM dokter ORDER BY nama_dokter ASC');
            return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        } catch (Throwable $e) {
            return [];
        }
    }
}
