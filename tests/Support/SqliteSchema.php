<?php

declare(strict_types=1);

trait SqliteSchema
{
    private function createSqliteConnection(): PDO
    {
        if (!in_array('sqlite', PDO::getAvailableDrivers(), true)) {
            $this->markTestSkipped(
                'pdo_sqlite driver is not available. Enable ext-pdo_sqlite to run SQLite integration tests.'
            );
        }

        $pdo = new PDO('sqlite::memory:');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    private function createBaseTables(PDO $pdo): void
    {
        $pdo->exec(
            'CREATE TABLE pasien (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                no_rm TEXT,
                nik TEXT,
                no_bpjs TEXT,
                nama TEXT,
                jenis_kelamin TEXT,
                tempat_lahir TEXT,
                tanggal_lahir TEXT,
                alamat TEXT,
                no_telephone TEXT,
                golongan_darah TEXT,
                pekerjaan TEXT,
                status_perkawinan TEXT,
                no_kk TEXT,
                created_at TEXT DEFAULT CURRENT_TIMESTAMP
            )'
        );

        $pdo->exec(
            'CREATE TABLE dokter (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nip TEXT,
                sip TEXT,
                nama_dokter TEXT,
                spesialisasi TEXT,
                images TEXT,
                no_telp TEXT,
                is_active INTEGER,
                created_at TEXT DEFAULT CURRENT_TIMESTAMP
            )'
        );

        $pdo->exec(
            'CREATE TABLE reservasi (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                pasien_id INTEGER,
                nomor_antrean TEXT,
                dokter_id INTEGER,
                poli_tujuan TEXT,
                tanggal_reservasi TEXT,
                keluhan TEXT,
                status TEXT,
                created_at TEXT DEFAULT CURRENT_TIMESTAMP
            )'
        );

        $pdo->exec(
            'CREATE TABLE rekam_medis (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                reservasi_id INTEGER,
                pasien_id INTEGER,
                dokter_id INTEGER,
                keluhan_utama TEXT,
                pemeriksaan_fisik TEXT,
                diagnosa TEXT,
                tindakan TEXT,
                catatan_dokter TEXT,
                tanggal_periksa TEXT,
                created_at TEXT DEFAULT CURRENT_TIMESTAMP
            )'
        );

        $pdo->exec(
            'CREATE TABLE obat (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                kode_obat TEXT,
                nama TEXT,
                kategori TEXT,
                stok INTEGER,
                harga REAL,
                tanggal_expired TEXT,
                rak_penyimpanan TEXT,
                created_at TEXT DEFAULT CURRENT_TIMESTAMP
            )'
        );
    }
}
