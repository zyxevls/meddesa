<?php

class Pegawai extends BaseModel
{
    public $id;
    public $nik;
    public $nip;
    public $nama_lengkap;
    public $jenis_kelamin;
    public $jabatan;
    public $status_pegawai;
    public $no_hp;
    public $alamat;
    public $tanggal_masuk;
    public $is_active;
    public $created_at;

    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->nik = $data['nik'] ?? null;
        $this->nip = $data['nip'] ?? null;
        $this->nama_lengkap = $data['nama_lengkap'] ?? $data['nama'] ?? null;
        $this->jenis_kelamin = $data['jenis_kelamin'] ?? null;
        $this->jabatan = $data['jabatan'] ?? null;
        $this->status_pegawai = $data['status_pegawai'] ?? null;
        $this->no_hp = $data['no_hp'] ?? null;
        $this->alamat = $data['alamat'] ?? null;
        $this->tanggal_masuk = $data['tanggal_masuk'] ?? null;
        $this->is_active = isset($data['is_active']) ? (int) $data['is_active'] : 1;
        $this->created_at = $data['created_at'] ?? null;
    }
}
