<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/models/BaseModel.php';
require_once __DIR__ . '/../app/models/Reservasi.php';

final class ReservasiTest extends TestCase
{
    public function testConstructorMapsMainFields(): void
    {
        $reservasi = new Reservasi([
            'id' => 5,
            'pasien_id' => 2,
            'nomor_antrean' => 'A-10',
            'dokter_id' => 7,
            'poli_tujuan' => 'Umum',
            'tanggal_reservasi' => '2026-04-03',
            'keluhan' => 'Demam',
            'status' => 'menunggu',
            'created_at' => '2026-04-02 09:00:00',
            'nama_pasien' => 'Rina',
            'no_rm' => 'RM001',
            'nama_dokter' => 'dr. Sinta',
        ]);

        $this->assertSame(5, $reservasi->id);
        $this->assertSame(2, $reservasi->pasien_id);
        $this->assertSame('A-10', $reservasi->nomor_antrean);
        $this->assertSame(7, $reservasi->dokter_id);
        $this->assertSame('Umum', $reservasi->poli_tujuan);
        $this->assertSame('2026-04-03', $reservasi->tanggal_reservasi);
        $this->assertSame('Demam', $reservasi->keluhan);
        $this->assertSame('menunggu', $reservasi->status);
        $this->assertSame('2026-04-02 09:00:00', $reservasi->created_at);
        $this->assertSame('Rina', $reservasi->nama_pasien);
        $this->assertSame('RM001', $reservasi->no_rm);
        $this->assertSame('dr. Sinta', $reservasi->nama_dokter);
    }

    public function testNamaPasienFallbackUsesNama(): void
    {
        $reservasi = new Reservasi([
            'nama' => 'Sari',
        ]);

        $this->assertSame('Sari', $reservasi->nama_pasien);
    }
}
