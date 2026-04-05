<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/Support/SqliteSchema.php';
require_once __DIR__ . '/../app/models/BaseModel.php';
require_once __DIR__ . '/../app/models/Dokter.php';
require_once __DIR__ . '/../app/repositories/DokterRepository.php';

final class DokterRepositoryIntegrationTest extends TestCase
{
    use SqliteSchema;

    public function testCrudCycleOnSqliteInMemory(): void
    {
        $pdo = $this->createSqliteConnection();
        $this->createBaseTables($pdo);

        $repo = new DokterRepository($pdo);

        $newId = (int) $repo->create([
            '198001012006041001',
            'SIP-01',
            'dr. Maya',
            'Anak',
            'maya.jpg',
            '0812000001',
            1,
        ]);

        $found = $repo->find($newId);
        $this->assertInstanceOf(Dokter::class, $found);
        $this->assertSame('dr. Maya', $found->nama_dokter);
        $this->assertSame('Anak', $found->spesialisasi);

        $repo->update($newId, [
            '198001012006041001',
            'SIP-01A',
            'dr. Maya Putri',
            'Penyakit Dalam',
            'maya-new.jpg',
            '0812000002',
            0,
        ]);

        $updated = $repo->find($newId);
        $this->assertSame('dr. Maya Putri', $updated->nama_dokter);
        $this->assertSame('Penyakit Dalam', $updated->spesialisasi);
        $this->assertSame(0, $updated->is_active);

        $all = $repo->all();
        $this->assertCount(1, $all);

        $repo->destroy($newId);
        $this->assertNull($repo->find($newId));
    }
}
