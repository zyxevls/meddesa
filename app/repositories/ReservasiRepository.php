<?php

class ReservasiRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        $rows = $this->db->query("
            SELECT reservasi.*, pasien.nama, pasien.no_rm, pasien.jenis_kelamin, pasien.golongan_darah, pasien.no_bpjs, dokter.nama_dokter
            FROM reservasi 
            LEFT JOIN pasien ON reservasi.pasien_id = pasien.id
            LEFT JOIN dokter ON reservasi.dokter_id = dokter.id
            ORDER BY reservasi.created_at DESC
        ")->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($row) {
            return new Reservasi($row);
        }, $rows);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("
            SELECT reservasi.*, pasien.nama, pasien.no_rm, pasien.jenis_kelamin, pasien.golongan_darah, pasien.no_bpjs, dokter.nama_dokter
            FROM reservasi 
            LEFT JOIN pasien ON reservasi.pasien_id = pasien.id 
            LEFT JOIN dokter ON reservasi.dokter_id = dokter.id
            WHERE reservasi.id = ?
        ");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? new Reservasi($row) : null;
    }

    public function create($pasien_id, $nomor_antrean, $dokter_id, $poli_tujuan, $tanggal_reservasi, $keluhan, $status)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO reservasi (pasien_id, nomor_antrean, dokter_id, poli_tujuan, tanggal_reservasi, keluhan, status)
                VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([$pasien_id, $nomor_antrean, $dokter_id, $poli_tujuan, $tanggal_reservasi, $keluhan, $status]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            "UPDATE reservasi SET pasien_id=?, nomor_antrean=?, dokter_id=?, poli_tujuan=?, tanggal_reservasi=?, keluhan=?, status=? WHERE id=?"
        );
        $stmt->execute([...$data, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM reservasi WHERE id=?");
        $stmt->execute([$id]);
    }
}
