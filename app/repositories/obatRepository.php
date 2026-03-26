<?php

class ObatRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        return  $this->db->query("SELECT * FROM obat ORDER BY id DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM obat WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO obat (nama, harga, stok) 
            VALUES (?, ?, ?)");
        $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            "UPDATE obat SET nama=?, harga=?, stok=? WHERE id=?"
        );
        $stmt->execute([...$data, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM obat WHERE id=?");
        $stmt->execute([$id]);
    }
}
