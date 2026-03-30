<?php

class Dokter extends BaseModel
{
    public $id;
    public $nip;
    public $sip;
    public $nama_dokter;
    public $spesialisasi;
    public $no_telp;
    public $alamat;
    public $created_at;

    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->nip = $data['nip'] ?? null;
        $this->sip = $data['sip'] ?? null;
        $this->nama_dokter = $data['nama_dokter'] ?? $data['nama'] ?? null;
        $this->spesialisasi = $data['spesialisasi'] ?? null;
        $this->no_telp = $data['no_telp'] ?? null;
        $this->alamat = $data['alamat'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
    }
}
