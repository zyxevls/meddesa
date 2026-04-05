<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/models/BaseModel.php';
require_once __DIR__ . '/../app/models/Dokter.php';

final class DokterTest extends TestCase
{
    public function testConstructorMapsGivenData(): void
    {
        $dokter = new Dokter([
            'id' => 1,
            'nip' => '198101012005011001',
            'sip' => 'SIP-001',
            'nama_dokter' => 'dr. Sinta',
            'spesialisasi' => 'Umum',
            'images' => 'sinta.jpg',
            'no_telp' => '0811111111',
            'is_active' => '0',
            'created_at' => '2026-04-02 08:00:00',
        ]);

        $this->assertSame(1, $dokter->id);
        $this->assertSame('198101012005011001', $dokter->nip);
        $this->assertSame('SIP-001', $dokter->sip);
        $this->assertSame('dr. Sinta', $dokter->nama_dokter);
        $this->assertSame('Umum', $dokter->spesialisasi);
        $this->assertSame('sinta.jpg', $dokter->images);
        $this->assertSame('0811111111', $dokter->no_telp);
        $this->assertSame(0, $dokter->is_active);
        $this->assertSame('2026-04-02 08:00:00', $dokter->created_at);
    }

    public function testNamaFallbackUsesNamaWhenNamaDokterMissing(): void
    {
        $dokter = new Dokter([
            'nama' => 'dr. Bimo',
        ]);

        $this->assertSame('dr. Bimo', $dokter->nama_dokter);
    }

    public function testDefaultIsActiveIsOne(): void
    {
        $dokter = new Dokter();

        $this->assertSame(1, $dokter->is_active);
    }
}
