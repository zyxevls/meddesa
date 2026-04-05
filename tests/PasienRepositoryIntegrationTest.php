<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/Support/SqliteSchema.php';
require_once __DIR__ . '/../app/models/BaseModel.php';
require_once __DIR__ . '/../app/models/Pasien.php';
require_once __DIR__ . '/../app/repositories/PasienRepository.php';

final class PasienRepositoryIntegrationTest extends TestCase
{
    use SqliteSchema;

    public function testCrudCycleOnSqliteInMemory(): void
    {
        $pdo = $this->createSqliteConnection();
        $this->createBaseTables($pdo);

        $repo = new PasienRepository($pdo);

        $repo->create(
            'RM001',
            '3173000000000001',
            '000111222333',
            'Andi Pratama',
            'L',
            'Bandung',
            '1990-01-01',
            'Jl. Melati',
            '081234567890',
            'O',
            'Karyawan',
            'Menikah',
            '3201000000000001'
        );

        $id = (int) $pdo->lastInsertId();

        $found = $repo->find($id);
        $this->assertInstanceOf(Pasien::class, $found);
        $this->assertSame('Andi Pratama', $found->nama);
        $this->assertSame('RM001', $found->no_rm);

        $repo->update($id, [
            'RM001-REV',
            '3173000000000001',
            '000111222333',
            'Andi Pratama Update',
            'L',
            'Bandung',
            '1990-01-01',
            'Jl. Melati No.2',
            '081234567891',
            'A',
            'Wiraswasta',
            'Menikah',
            '3201000000000001',
        ]);

        $updated = $repo->find($id);
        $this->assertSame('RM001-REV', $updated->no_rm);
        $this->assertSame('Andi Pratama Update', $updated->nama);

        $all = $repo->all();
        $this->assertCount(1, $all);

        $repo->delete($id);
        $this->assertNull($repo->find($id));
    }
}
