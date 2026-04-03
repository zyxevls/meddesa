<?php

class ObatRepository
{
    private $db;

    public function __construct($db = null)
    {
        $this->db = $db ?: Database::connect();
    }

    public function all()
    {
        $rows = $this->db->query("SELECT * FROM obat ORDER BY id DESC")
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($row) {
            return new Obat($row);
        }, $rows);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM obat WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? new Obat($row) : null;
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO obat (kode_obat, nama, kategori, stok, harga, tanggal_expired, rak_penyimpanan) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            "UPDATE obat SET kode_obat=?, nama=?, kategori=?, stok=?, harga=?, tanggal_expired=?, rak_penyimpanan=? WHERE id=?"
        );
        $stmt->execute([...$data, $id]);
    }

    public function destroy($id)
    {
        $stmt = $this->db->prepare("DELETE FROM obat WHERE id=?");
        $stmt->execute([$id]);
    }
}
