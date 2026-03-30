<?php

class PasienRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        return $this->db->query("SELECT * FROM pasien ORDER BY created_at DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM pasien WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($no_rm, $nik, $no_bpjs, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $alamat, $no_telephone, $golongan_darah, $pekerjaan, $status_perkawinan, $no_kk)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO pasien (no_rm, nik, no_bpjs, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telephone, golongan_darah, pekerjaan, status_perkawinan, no_kk)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([$no_rm, $nik, $no_bpjs, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $alamat, $no_telephone, $golongan_darah, $pekerjaan, $status_perkawinan, $no_kk]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            "UPDATE pasien SET no_rm=?, nik=?, no_bpjs=?, nama=?, jenis_kelamin=?, tempat_lahir=?, tanggal_lahir=?, alamat=?, no_telephone=?, golongan_darah=?, pekerjaan=?, status_perkawinan=?, no_kk=? WHERE id=?"
        );
        $stmt->execute([...$data, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM pasien WHERE id=?");
        $stmt->execute([$id]);
    }
}
