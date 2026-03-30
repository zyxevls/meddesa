<?php

class Obat extends BaseModel
{
    public $id;
    public $kode_obat;
    public $nama;
    public $kategori;
    public $stok;
    public $harga;
    public $tanggal_expired;
    public $rak_penyimpanan;
    public $created_at;

    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->kode_obat = $data['kode_obat'] ?? null;
        $this->nama = $data['nama'] ?? null;
        $this->kategori = $data['kategori'] ?? null;
        $this->stok = $data['stok'] ?? null;
        $this->harga = $data['harga'] ?? null;
        $this->tanggal_expired = $data['tanggal_expired'] ?? null;
        $this->rak_penyimpanan = $data['rak_penyimpanan'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
    }
}
