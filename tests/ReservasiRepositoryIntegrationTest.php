<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/Support/SqliteSchema.php';
require_once __DIR__ . '/../app/models/BaseModel.php';
require_once __DIR__ . '/../app/models/Reservasi.php';
require_once __DIR__ . '/../app/repositories/ReservasiRepository.php';

final class ReservasiRepositoryIntegrationTest extends TestCase
{
    use SqliteSchema;

    public function testCreateFindAndDeleteWithJoinColumns(): void
    {
        $pdo = $this->createSqliteConnection();
        $this->createBaseTables($pdo);

        $pdo->exec("INSERT INTO pasien (no_rm, nama, jenis_kelamin, golongan_darah, no_bpjs) VALUES ('RM100', 'Sinta', 'P', 'B', 'BPJS01')");
        $pasienId = (int) $pdo->lastInsertId();

        $pdo->exec("INSERT INTO dokter (nip, sip, nama_dokter, spesialisasi, images, no_telp, is_active) VALUES ('1988', 'SIP88', 'dr. Bima', 'Umum', 'bima.jpg', '0812', 1)");
        $dokterId = (int) $pdo->lastInsertId();

        $repo = new ReservasiRepository($pdo);

        $repo->create($pasienId, 'A-01', $dokterId, 'Umum', '2026-04-02', 'Batuk', 'menunggu');
        $id = (int) $pdo->lastInsertId();

        $found = $repo->find($id);
        $this->assertInstanceOf(Reservasi::class, $found);
        $this->assertSame('Sinta', $found->nama_pasien);
        $this->assertSame('dr. Bima', $found->nama_dokter);
        $this->assertSame('A-01', $found->nomor_antrean);

        $repo->update($id, [
            $pasienId,
            'A-02',
            $dokterId,
            'Gigi',
            '2026-04-03',
            'Sakit gigi',
            'diproses',
        ]);

        $updated = $repo->find($id);
        $this->assertSame('A-02', $updated->nomor_antrean);
        $this->assertSame('Gigi', $updated->poli_tujuan);

        $all = $repo->all();
        $this->assertCount(1, $all);

        $repo->delete($id);
        $this->assertNull($repo->find($id));
    }
}
