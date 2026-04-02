<?php

class DashboardController
{
    public function index()
    {
        Middleware::auth();

        $db = Database::connect();
        $today = date('Y-m-d');
        $sevenDaysAgo = date('Y-m-d', strtotime('-6 days'));

        $totalPasien = (int) $db->query('SELECT COUNT(*) FROM pasien')->fetchColumn();
        $totalPasienBaru30Hari = (int) $db->query("SELECT COUNT(*) FROM pasien WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")->fetchColumn();
        $totalObat = (int) $db->query('SELECT COUNT(*) FROM obat')->fetchColumn();
        $totalKategoriObat = (int) $db->query("SELECT COUNT(DISTINCT kategori) FROM obat WHERE kategori IS NOT NULL AND kategori <> ''")->fetchColumn();
        $totalObatHabis = (int) $db->query('SELECT COUNT(*) FROM obat WHERE stok = 0')->fetchColumn();
        $totalObatMenipis = (int) $db->query('SELECT COUNT(*) FROM obat WHERE stok > 0 AND stok <= 10')->fetchColumn();
        $totalObatExpired = (int) $db->query('SELECT COUNT(*) FROM obat WHERE tanggal_expired IS NOT NULL AND tanggal_expired < CURDATE()')->fetchColumn();
        $totalObatSoonExpired = (int) $db->query('SELECT COUNT(*) FROM obat WHERE tanggal_expired IS NOT NULL AND tanggal_expired BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)')->fetchColumn();
        $totalStokObat = (int) $db->query('SELECT COALESCE(SUM(stok), 0) FROM obat')->fetchColumn();
        $totalDokter = (int) $db->query('SELECT COUNT(*) FROM dokter')->fetchColumn();
        $totalDokterAktif = (int) $db->query('SELECT COUNT(*) FROM dokter WHERE is_active = 1')->fetchColumn();
        $totalDokterNonAktif = max(0, $totalDokter - $totalDokterAktif);
        $totalSpesialisasi = (int) $db->query("SELECT COUNT(DISTINCT spesialisasi) FROM dokter WHERE spesialisasi IS NOT NULL AND spesialisasi <> ''")->fetchColumn();
        $totalRekamMedis = (int) $db->query('SELECT COUNT(*) FROM rekam_medis')->fetchColumn();
        $totalReservasi = (int) $db->query('SELECT COUNT(*) FROM reservasi')->fetchColumn();
        $reservasiTodayStmt = $db->prepare('SELECT COUNT(*) FROM reservasi WHERE DATE(tanggal_reservasi) = ?');
        $reservasiTodayStmt->execute([$today]);
        $reservasiHariIni = (int) $reservasiTodayStmt->fetchColumn();

        $pasienGenderRows = $db->query(
            "SELECT COALESCE(NULLIF(jenis_kelamin, ''), 'Tidak Diketahui') AS label, COUNT(*) AS total
            FROM pasien
            GROUP BY COALESCE(NULLIF(jenis_kelamin, ''), 'Tidak Diketahui')
            ORDER BY total DESC"
        )->fetchAll(PDO::FETCH_ASSOC);

        $golonganDarahRows = $db->query(
            "SELECT COALESCE(NULLIF(golongan_darah, ''), 'Tidak Diketahui') AS label, COUNT(*) AS total
            FROM pasien
            GROUP BY COALESCE(NULLIF(golongan_darah, ''), 'Tidak Diketahui')
            ORDER BY total DESC"
        )->fetchAll(PDO::FETCH_ASSOC);

        $statusReservasiRows = $db->query(
            "SELECT COALESCE(NULLIF(status, ''), 'menunggu') AS status_label, COUNT(*) AS total
            FROM reservasi
            GROUP BY COALESCE(NULLIF(status, ''), 'menunggu')"
        )->fetchAll(PDO::FETCH_ASSOC);

        $reservasiPerHariRows = $db->prepare(
            "SELECT DATE(tanggal_reservasi) AS tanggal, COUNT(*) AS total
            FROM reservasi
            WHERE tanggal_reservasi BETWEEN ? AND CURDATE()
            GROUP BY DATE(tanggal_reservasi)
            ORDER BY tanggal ASC"
        );
        $reservasiPerHariRows->execute([$sevenDaysAgo]);
        $reservasiPerHariRows = $reservasiPerHariRows->fetchAll(PDO::FETCH_ASSOC);

        $pasienBaruPerHariRows = $db->prepare(
            "SELECT DATE(created_at) AS tanggal, COUNT(*) AS total
            FROM pasien
            WHERE created_at BETWEEN ? AND CURDATE()
            GROUP BY DATE(created_at)
            ORDER BY tanggal ASC"
        );
        $pasienBaruPerHariRows->execute([$sevenDaysAgo]);
        $pasienBaruPerHariRows = $pasienBaruPerHariRows->fetchAll(PDO::FETCH_ASSOC);

        $dokterSpesialisasiRows = $db->query(
            "SELECT spesialisasi, COUNT(*) AS total
            FROM dokter
            GROUP BY spesialisasi
            ORDER BY total DESC, spesialisasi ASC
            LIMIT 5"
        )->fetchAll(PDO::FETCH_ASSOC);

        $reservasiPerPoliRows = $db->query(
            "SELECT COALESCE(NULLIF(poli_tujuan, ''), 'Tidak Diketahui') AS poli, COUNT(*) AS total
            FROM reservasi
            GROUP BY COALESCE(NULLIF(poli_tujuan, ''), 'Tidak Diketahui')
            ORDER BY total DESC, poli ASC
            LIMIT 6"
        )->fetchAll(PDO::FETCH_ASSOC);

        $kategoriObatRows = $db->query(
            "SELECT COALESCE(NULLIF(kategori, ''), 'Tanpa Kategori') AS kategori, COUNT(*) AS total
            FROM obat
            GROUP BY COALESCE(NULLIF(kategori, ''), 'Tanpa Kategori')
            ORDER BY total DESC, kategori ASC
            LIMIT 6"
        )->fetchAll(PDO::FETCH_ASSOC);

        $stokObatStatusRows = $db->query(
            "SELECT status_label, COUNT(*) AS total
            FROM (
                SELECT CASE
                    WHEN stok = 0 THEN 'Habis'
                    WHEN stok <= 10 THEN 'Menipis'
                    ELSE 'Aman'
                END AS status_label
                FROM obat
            ) AS stok_status
            GROUP BY status_label
            ORDER BY FIELD(status_label, 'Habis', 'Menipis', 'Aman')"
        )->fetchAll(PDO::FETCH_ASSOC);

        $recentReservasi = $db->query(
            "SELECT reservasi.tanggal_reservasi, reservasi.nomor_antrean, reservasi.poli_tujuan, reservasi.status,
                pasien.nama AS nama_pasien, dokter.nama_dokter
            FROM reservasi
            LEFT JOIN pasien ON reservasi.pasien_id = pasien.id
            LEFT JOIN dokter ON reservasi.dokter_id = dokter.id
            ORDER BY reservasi.created_at DESC
            LIMIT 6"
        )->fetchAll(PDO::FETCH_ASSOC);

        $recentPasien = $db->query(
            "SELECT id, no_rm, nama, jenis_kelamin, golongan_darah, created_at
            FROM pasien
            ORDER BY created_at DESC, id DESC
            LIMIT 6"
        )->fetchAll(PDO::FETCH_ASSOC);

        $recentRekamMedis = $db->query(
            "SELECT rekam_medis.tanggal_periksa, rekam_medis.diagnosa, rekam_medis.tindakan,
                reservasi.nomor_antrean, pasien.nama AS nama_pasien, dokter.nama_dokter, dokter.spesialisasi
            FROM rekam_medis
            LEFT JOIN reservasi ON rekam_medis.reservasi_id = reservasi.id
            LEFT JOIN pasien ON rekam_medis.pasien_id = pasien.id
            LEFT JOIN dokter ON rekam_medis.dokter_id = dokter.id
            ORDER BY rekam_medis.tanggal_periksa DESC, rekam_medis.id DESC
            LIMIT 6"
        )->fetchAll(PDO::FETCH_ASSOC);

        $lowStockObat = $db->query(
            "SELECT kode_obat, nama, kategori, stok, tanggal_expired, rak_penyimpanan
            FROM obat
            ORDER BY stok ASC, tanggal_expired ASC, id DESC
            LIMIT 6"
        )->fetchAll(PDO::FETCH_ASSOC);

        $expiringObat = $db->query(
            "SELECT kode_obat, nama, kategori, stok, tanggal_expired, rak_penyimpanan
            FROM obat
            WHERE tanggal_expired IS NOT NULL
            ORDER BY tanggal_expired ASC, stok ASC
            LIMIT 6"
        )->fetchAll(PDO::FETCH_ASSOC);

        $chartLabels7Days = [];
        $chartValues7Days = [];
        $reservasiLookup = [];
        foreach ($reservasiPerHariRows as $row) {
            $reservasiLookup[$row['tanggal']] = (int) $row['total'];
        }

        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-{$i} days"));
            $chartLabels7Days[] = date('d M', strtotime($date));
            $chartValues7Days[] = $reservasiLookup[$date] ?? 0;
        }

        $pasienBaruLookup = [];
        foreach ($pasienBaruPerHariRows as $row) {
            $pasienBaruLookup[$row['tanggal']] = (int) $row['total'];
        }

        $chartLabelsPasienBaru = [];
        $chartValuesPasienBaru = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-{$i} days"));
            $chartLabelsPasienBaru[] = date('d M', strtotime($date));
            $chartValuesPasienBaru[] = $pasienBaruLookup[$date] ?? 0;
        }

        $statusLabels = [];
        $statusValues = [];
        foreach ($statusReservasiRows as $row) {
            $statusLabels[] = ucfirst(str_replace('_', ' ', (string) $row['status_label']));
            $statusValues[] = (int) $row['total'];
        }

        $spesialisasiLabels = [];
        $spesialisasiValues = [];
        foreach ($dokterSpesialisasiRows as $row) {
            $spesialisasiLabels[] = $row['spesialisasi'] ?: 'Tanpa Spesialisasi';
            $spesialisasiValues[] = (int) $row['total'];
        }

        $genderLabels = [];
        $genderValues = [];
        foreach ($pasienGenderRows as $row) {
            $genderLabels[] = $row['label'];
            $genderValues[] = (int) $row['total'];
        }

        $golonganDarahLabels = [];
        $golonganDarahValues = [];
        foreach ($golonganDarahRows as $row) {
            $golonganDarahLabels[] = $row['label'];
            $golonganDarahValues[] = (int) $row['total'];
        }

        $reservasiPoliLabels = [];
        $reservasiPoliValues = [];
        foreach ($reservasiPerPoliRows as $row) {
            $reservasiPoliLabels[] = $row['poli'];
            $reservasiPoliValues[] = (int) $row['total'];
        }

        $kategoriObatLabels = [];
        $kategoriObatValues = [];
        foreach ($kategoriObatRows as $row) {
            $kategoriObatLabels[] = $row['kategori'];
            $kategoriObatValues[] = (int) $row['total'];
        }

        $stokObatStatusLabels = [];
        $stokObatStatusValues = [];
        foreach ($stokObatStatusRows as $row) {
            $stokObatStatusLabels[] = $row['status_label'];
            $stokObatStatusValues[] = (int) $row['total'];
        }

        $content = BASE_PATH . '/views/admin/dashboard/index.php';
        require BASE_PATH . '/views/layouts/app.php';
    }
}
