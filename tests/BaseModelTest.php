<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/models/BaseModel.php';

final class BaseModelTest extends TestCase
{
    public function testOffsetSetAndGetWorks(): void
    {
        $model = new BaseModel();

        $model['nama'] = 'Budi';

        $this->assertSame('Budi', $model['nama']);
    }

    public function testOffsetExistsChecksProperty(): void
    {
        $model = new BaseModel();
        $model['alamat'] = 'Desa Suka Maju';

        $this->assertTrue(isset($model['alamat']));
        $this->assertFalse(isset($model['tidak_ada']));
    }

    public function testOffsetUnsetSetsPropertyToNull(): void
    {
        $model = new BaseModel();
        $model['telepon'] = '08123456789';

        unset($model['telepon']);

        $this->assertTrue(isset($model['telepon']));
        $this->assertNull($model['telepon']);
    }

    public function testToArrayReturnsAllProperties(): void
    {
        $model = new BaseModel();
        $model['id'] = 10;
        $model['nama'] = 'Andi';

        $this->assertSame([
            'id' => 10,
            'nama' => 'Andi',
        ], $model->toArray());
    }
}
