<?php

class Reservasi extends BaseModel
{
    public $id;
    public $pasien_id;
    public $nomor_antrean;
    public $dokter_id;
    public $poli_tujuan;
    public $tanggal_reservasi;
    public $keluhan;
    public $status;
    public $created_at;

    // Join properties
    public $nama_pasien;
    public $no_rm;
    public $nama_dokter;

    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->pasien_id = $data['pasien_id'] ?? null;
        $this->nomor_antrean = $data['nomor_antrean'] ?? null;
        $this->dokter_id = $data['dokter_id'] ?? null;
        $this->poli_tujuan = $data['poli_tujuan'] ?? null;
        $this->tanggal_reservasi = $data['tanggal_reservasi'] ?? null;
        $this->keluhan = $data['keluhan'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->created_at = $data['created_at'] ?? null;

        // Join properties
        $this->nama_pasien = $data['nama'] ?? $data['nama_pasien'] ?? null;
        $this->no_rm = $data['no_rm'] ?? null;
        $this->nama_dokter = $data['nama_dokter'] ?? null;
    }
}
