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
        return $this->db->query("
            SELECT reservasi.*, pasien.nama, pasien.no_rm, pasien.jenis_kelamin, pasien.golongan_darah, pasien.no_bpjs
            FROM reservasi 
            LEFT JOIN pasien ON reservasi.pasien_id = pasien.id 
            ORDER BY reservasi.created_at DESC
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("
            SELECT reservasi.*, pasien.nama, pasien.no_rm, pasien.jenis_kelamin, pasien.golongan_darah, pasien.no_bpjs
            FROM reservasi 
            LEFT JOIN pasien ON reservasi.pasien_id = pasien.id 
            WHERE reservasi.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($pasien_id, $nomor_antrean, $poli_tujuan, $tanggal_reservasi, $keluhan, $status)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO reservasi (pasien_id, nomor_antrean, poli_tujuan, tanggal_reservasi, keluhan, status)
                VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([$pasien_id, $nomor_antrean, $poli_tujuan, $tanggal_reservasi, $keluhan, $status]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            "UPDATE reservasi SET pasien_id=?, nomor_antrean=?, poli_tujuan=?, tanggal_reservasi=?, keluhan=?, status=? WHERE id=?"
        );
        $stmt->execute([...$data, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM reservasi WHERE id=?");
        $stmt->execute([$id]);
    }
}
