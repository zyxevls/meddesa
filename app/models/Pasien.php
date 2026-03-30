<?php

class Pasien extends BaseModel
{
    public $id;
    public $no_rm;
    public $nik;
    public $no_bpjs;
    public $nama;
    public $jenis_kelamin;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $alamat;
    public $no_telephone;
    public $golongan_darah;
    public $pekerjaan;
    public $status_perkawinan;
    public $no_kk;
    public $created_at;

    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->no_rm = $data['no_rm'] ?? null;
        $this->nik = $data['nik'] ?? null;
        $this->no_bpjs = $data['no_bpjs'] ?? null;
        $this->nama = $data['nama'] ?? null;
        $this->jenis_kelamin = $data['jenis_kelamin'] ?? null;
        $this->tempat_lahir = $data['tempat_lahir'] ?? null;
        $this->tanggal_lahir = $data['tanggal_lahir'] ?? null;
        $this->alamat = $data['alamat'] ?? null;
        $this->no_telephone = $data['no_telephone'] ?? null;
        $this->golongan_darah = $data['golongan_darah'] ?? null;
        $this->pekerjaan = $data['pekerjaan'] ?? null;
        $this->status_perkawinan = $data['status_perkawinan'] ?? null;
        $this->no_kk = $data['no_kk'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
    }
}
