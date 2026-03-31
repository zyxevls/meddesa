<?php

class RekamMedis extends BaseModel
{
    public $id;
    public $reservasi_id;
    public $pasien_id;
    public $dokter_id;
    public $keluhan_utama;
    public $pemeriksaan_fisik;
    public $diagnosa;
    public $tindakan;
    public $catatan_dokter;
    public $tanggal_periksa;
    public $created_at;

    // Join properties
    public $nomor_antrean;
    public $no_rm;
    public $nama_pasien;
    public $nama_dokter;
    public $spesialisasi;

    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->reservasi_id = $data['reservasi_id'] ?? null;
        $this->pasien_id = $data['pasien_id'] ?? null;
        $this->dokter_id = $data['dokter_id'] ?? null;
        $this->keluhan_utama = $data['keluhan_utama'] ?? null;
        $this->pemeriksaan_fisik = $data['pemeriksaan_fisik'] ?? null;
        $this->diagnosa = $data['diagnosa'] ?? null;
        $this->tindakan = $data['tindakan'] ?? null;
        $this->catatan_dokter = $data['catatan_dokter'] ?? null;
        $this->tanggal_periksa = $data['tanggal_periksa'] ?? null;
        $this->created_at = $data['created_at'] ?? null;

        // Join properties
        $this->nomor_antrean = $data['nomor_antrean'] ?? null;
        $this->no_rm = $data['no_rm'] ?? null;
        $this->nama_pasien = $data['nama_pasien'] ?? null;
        $this->nama_dokter = $data['nama_dokter'] ?? null;
        $this->spesialisasi = $data['spesialisasi'] ?? null;
    }
}
