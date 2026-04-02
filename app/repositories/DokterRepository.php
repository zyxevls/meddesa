<?php

class DokterRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        $rows = $this->db->query("SELECT * FROM dokter ORDER BY id DESC")
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($row) {
            return new Dokter($row);
        }, $rows);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM dokter WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? new Dokter($row) : null;
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO dokter (nip, sip, nama_dokter, spesialisasi, images, no_telp, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE dokter SET nip=?, sip=?, nama_dokter=?, spesialisasi=?, images=?, no_telp=?, is_active=? WHERE id=?");
        $stmt->execute([...$data, $id]);
    }

    public function destroy($id)
    {
        $stmt = $this->db->prepare("DELETE FROM dokter WHERE id=?");
        $stmt->execute([$id]);
    }
}
