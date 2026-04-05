<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Weblab\Breadcrumb;

require_once __DIR__ . '/../app/helpers/breadcrumb.php';

final class BreadcrumbHelperTest extends TestCase
{
    private mixed $originalRequestUri;

    protected function setUp(): void
    {
        $this->originalRequestUri = $_SERVER['REQUEST_URI'] ?? null;
    }

    protected function tearDown(): void
    {
        if ($this->originalRequestUri === null) {
            unset($_SERVER['REQUEST_URI']);
            return;
        }

        $_SERVER['REQUEST_URI'] = $this->originalRequestUri;
    }

    public function testBreadcrumbsOnHomePathOnlyContainsBeranda(): void
    {
        $_SERVER['REQUEST_URI'] = '/';

        $result = breadcrumbs();

        $this->assertInstanceOf(Breadcrumb::class, $result);
        $this->assertSame([
            [
                'title' => 'Beranda',
                'link' => '/',
                'name' => 'Beranda',
            ],
        ], $result->breadcrumbPath());
    }

    public function testBreadcrumbsSkipNumericSegmentAndOverrideLastLabel(): void
    {
        $_SERVER['REQUEST_URI'] = '/admin/pasien/edit/12';

        $result = breadcrumbs('Ubah Data Pasien');

        $this->assertSame([
            [
                'title' => 'Beranda',
                'link' => '/',
                'name' => 'Beranda',
            ],
            [
                'title' => 'Admin',
                'link' => '/admin',
                'name' => 'Admin',
            ],
            [
                'title' => 'Pasien',
                'link' => '/admin/pasien',
                'name' => 'Pasien',
            ],
            [
                'title' => 'Ubah Data Pasien',
                'link' => '/admin/pasien/edit',
                'name' => 'Ubah Data Pasien',
            ],
        ], $result->breadcrumbPath());
    }
}
