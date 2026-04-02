<?php

class Dokter extends BaseModel
{
    public $id;
    public $nip;
    public $sip;
    public $nama_dokter;
    public $spesialisasi;
    public $images;
    public $no_telp;
    public $is_active;
    public $created_at;

    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->nip = $data['nip'] ?? null;
        $this->sip = $data['sip'] ?? null;
        $this->nama_dokter = $data['nama_dokter'] ?? $data['nama'] ?? null;
        $this->spesialisasi = $data['spesialisasi'] ?? null;
        $this->images = $data['images'] ?? null;
        $this->no_telp = $data['no_telp'] ?? null;
        $this->is_active = isset($data['is_active']) ? (bool)$data['is_active'] : true;
        $this->created_at = $data['created_at'] ?? null;
    }
}
