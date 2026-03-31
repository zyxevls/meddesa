<?php

class RekamMedisRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        $rows = $this->db->query("
            SELECT rekam_medis.*, reservasi.nomor_antrean, pasien.no_rm, pasien.nama AS nama_pasien, dokter.nama_dokter, dokter.spesialisasi
            FROM rekam_medis
            LEFT JOIN reservasi ON rekam_medis.reservasi_id = reservasi.id
            LEFT JOIN pasien ON reservasi.pasien_id = pasien.id
            LEFT JOIN dokter ON reservasi.dokter_id = dokter.id
        ")->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($row) {
            return new RekamMedis($row);
        }, $rows);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare(
            "
            SELECT rekam_medis.*, reservasi.nomor_antrean, pasien.no_rm, pasien.nama AS nama_pasien, dokter.nama_dokter, dokter.spesialisasi
            FROM rekam_medis
            LEFT JOIN reservasi ON rekam_medis.reservasi_id = reservasi.id
            LEFT JOIN pasien ON reservasi.pasien_id = pasien.id
            LEFT JOIN dokter ON reservasi.dokter_id = dokter.id
            WHERE rekam_medis.id = ?"
        );
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? new RekamMedis($row) : null;
    }

    public function create($reservasi_id, $pasien_id, $dokter_id, $keluhan_utama, $pemeriksaan_fisik, $diagnosa, $tindakan, $catatan_dokter, $tanggal_periksa)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO rekam_medis (reservasi_id, pasien_id, dokter_id, keluhan_utama, pemeriksaan_fisik, diagnosa, tindakan, catatan_dokter, tanggal_periksa)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        return $stmt->execute([$reservasi_id, $pasien_id, $dokter_id, $keluhan_utama, $pemeriksaan_fisik, $diagnosa, $tindakan, $catatan_dokter, $tanggal_periksa]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            "UPDATE rekam_medis SET reservasi_id=?, pasien_id=?, dokter_id=?, keluhan_utama=?, pemeriksaan_fisik=?, diagnosa=?, tindakan=?, catatan_dokter=?, tanggal_periksa=? WHERE id=?"
        );
        return $stmt->execute([
            $data['reservasi_id'],
            $data['pasien_id'],
            $data['dokter_id'],
            $data['keluhan_utama'],
            $data['pemeriksaan_fisik'],
            $data['diagnosa'],
            $data['tindakan'],
            $data['catatan_dokter'],
            $data['tanggal_periksa'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM rekam_medis WHERE id=?");
        return $stmt->execute([$id]);
    }
}
