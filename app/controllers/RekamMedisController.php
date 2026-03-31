<?php

class RekamMedisController
{
    private $repo;

    public function __construct()
    {
        $this->repo = new RekamMedisRepository(Database::connect());
    }

    public function index()
    {
        Middleware::auth();

        $rekam_medis = $this->repo->all();
        $content = BASE_PATH . '/views/admin/rekam-medis/index.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function create()
    {
        Middleware::auth();

        $content = BASE_PATH . '/views/admin/rekam-medis/create.php';
        $pasiens = (new PasienRepository(Database::connect()))->all();
        $dokters = $this->getDokters();
        $reservasis = (new ReservasiRepository(Database::connect()))->all();

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function store()
    {
        Middleware::auth();

        $reservasiID = $_POST['reservasi_id'] ?? null;
        $pasienID = $_POST['pasien_id'] ?? null;
        $dokterID = $_POST['dokter_id'] ?? null;

        if (empty($reservasiID)) {
            flash()->error('Reservasi wajib dipilih.');
            header('Location: /admin/rekam-medis/create');
            exit;
        }

        if (empty($pasienID) || empty($dokterID)) {
            flash()->error('Pasien dan Dokter wajib dipilih.');
            header('Location: /admin/rekam-medis/create');
            exit;
        }

        $this->repo->create(
            $reservasiID,
            $pasienID,
            $dokterID,
            $_POST['keluhan_utama'] ?? '',
            $_POST['pemeriksaan_fisik'] ?? '',
            $_POST['diagnosa'] ?? '',
            $_POST['tindakan'] ?? '',
            $_POST['catatan_dokter'] ?? '',
            $_POST['tanggal_periksa'] ?? date('Y-m-d H:i:s')
        );

        flash()->success('Data rekam medis berhasil ditambahkan.');
        header('Location: /admin/rekam-medis');
        exit;
    }

    public function edit($id)
    {
        Middleware::auth();

        $rekam_medis = $this->repo->find($id);
        $pasiens = (new PasienRepository(Database::connect()))->all();
        $dokters = $this->getDokters();
        $reservasis = (new ReservasiRepository(Database::connect()))->all();

        $content = BASE_PATH . '/views/admin/rekam-medis/edit.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function update($id)
    {
        Middleware::auth();

        $existing = $this->repo->find($id);
        $reservasiID = $_POST['reservasi_id'] ?? $existing['reservasi_id'];
        $pasienID = $_POST['pasien_id'] ?? $existing['pasien_id'];
        $dokterID = $_POST['dokter_id'] ?? $existing['dokter_id'];

        if (empty($reservasiID)) {
            flash()->error('Reservasi wajib dipilih.');
            header("Location: /admin/rekam-medis/edit/$id");
            exit;
        }

        if (empty($pasienID) || empty($dokterID)) {
            flash()->error('Pasien dan Dokter wajib dipilih.');
            header("Location: /admin/rekam-medis/edit/$id");
            exit;
        }

        $this->repo->update($id, [
            'reservasi_id' => $reservasiID,
            'pasien_id' => $pasienID,
            'dokter_id' => $dokterID,
            'keluhan_utama' => $_POST['keluhan_utama'] ?? '',
            'pemeriksaan_fisik' => $_POST['pemeriksaan_fisik'] ?? '',
            'diagnosa' => $_POST['diagnosa'] ?? '',
            'tindakan' => $_POST['tindakan'] ?? '',
            'catatan_dokter' => $_POST['catatan_dokter'] ?? '',
            'tanggal_periksa' => $_POST['tanggal_periksa'] ?? date('Y-m-d H:i:s')
        ]);

        flash()->success('Data rekam medis berhasil diperbarui.');
        header('Location: /admin/rekam-medis');
        exit;
    }

    public function detail($id)
    {
        Middleware::auth();
        $rekam_medis = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/rekam-medis/detail.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function destroy($id)
    {
        Middleware::auth();

        $this->repo->delete($id);

        flash()->success('Data rekam medis berhasil dihapus.');
        header('Location: /admin/rekam-medis');
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
