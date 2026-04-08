<?php

class PegawaiRepository
{
    private $db;

    public function __construct($db = null)
    {
        $this->db = $db ?? Database::connect();
    }

    public function all()
    {
        $rows = $this->db->query("SELECT * FROM pegawai ORDER BY created_at DESC")
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($row) {
            return new Pegawai($row);
        }, $rows);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM pegawai WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? new Pegawai($row) : null;
    }

    public function create($nik, $nip, $nama_lengkap, $jenis_kelamin, $jabatan, $status_pegawai, $no_hp, $alamat, $tanggal_masuk)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO pegawai (nik, nip, nama_lengkap, jenis_kelamin, jabatan, status_pegawai, no_hp, alamat, tanggal_masuk)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([$nik, $nip, $nama_lengkap, $jenis_kelamin, $jabatan, $status_pegawai, $no_hp, $alamat, $tanggal_masuk]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            "UPDATE pegawai SET nik=?, nip=?, nama_lengkap=?, jenis_kelamin=?, jabatan=?, status_pegawai=?, no_hp=?, alamat=?, tanggal_masuk=? WHERE id=?"
        );
        $stmt->execute([...$data, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM pegawai WHERE id=?");
        $stmt->execute([$id]);
    }
}
