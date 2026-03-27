<?php

use Weblab\Breadcrumb;

$breadcrumbLabels = [
    'admin' => 'Admin',
    'dashboard' => 'Dashboard',
    'obat' => 'Obat',
    'pasien' => 'Pasien',
    'create' => 'Tambah',
    'edit' => 'Edit',
    'detail' => 'Detail',
];

function breadcrumbs(string $currentPageTitle = null): Breadcrumb
{
    global $breadcrumbLabels;

    $breadcrumb = new Breadcrumb();
    $breadcrumb->setSeparator('');

    $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $uri = trim($uri, '/');
    $segments = $uri !== '' ? explode('/', $uri) : [];

    $breadcrumb->addBreadcrumb('Beranda', '/');

    $path = '';
    $lastNonNumericIndex = -1;

    for ($i = count($segments) - 1; $i >= 0; $i--) {
        if (!is_numeric($segments[$i])) {
            $lastNonNumericIndex = $i;
            break;
        }
    }

    foreach ($segments as $index => $segment) {
        if (is_numeric($segment)) {
            continue;
        }

        $path .= '/' . $segment;
        $label = $breadcrumbLabels[$segment] ?? ucfirst($segment);

        if ($index === $lastNonNumericIndex && $currentPageTitle !== null) {
            $label = $currentPageTitle;
        }

        $breadcrumb->addBreadcrumb($label, $path);
    }

    return $breadcrumb;
}
