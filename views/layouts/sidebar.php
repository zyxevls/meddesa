<?php $currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH); ?>
<?php
$navItems = [
    ['href' => '/admin/dashboard', 'prefix' => '/admin/dashboard', 'icon' => 'fa-chart-line', 'label' => 'Dashboard'],
    ['href' => '/admin/pasien', 'prefix' => '/admin/pasien', 'icon' => 'fa-users', 'label' => 'Pasien'],
    ['href' => '/admin/reservasi', 'prefix' => '/admin/reservasi', 'icon' => 'fa-calendar-check', 'label' => 'Reservasi'],
    ['href' => '/admin/rekam-medis', 'prefix' => '/admin/rekam-medis', 'icon' => 'fa-clipboard-list', 'label' => 'Rekam Medis'],
    ['href' => '/admin/obat', 'prefix' => '/admin/obat', 'icon' => 'fa-pills', 'label' => 'Obat'],
    ['href' => '/admin/pegawai', 'prefix' => '/admin/pegawai', 'icon' => 'fa-user-md', 'label' => 'Pegawai'],
    ['href' => '/admin/keuangan', 'prefix' => '/admin/keuangan', 'icon' => 'fa-money-bill-wave', 'label' => 'Keuangan'],
    ['href' => '/admin/laporan', 'prefix' => '/admin/laporan', 'icon' => 'fa-file-alt', 'label' => 'Laporan'],
];
?>

<!-- Sidebar -->
<aside class="app-sidebar fixed left-0 top-20 z-40 h-[calc(100vh-5rem)] w-[15rem] overflow-hidden border-r border-white/10 bg-slate-950/95 text-white shadow-[0_20px_60px_rgba(15,23,42,0.35)] backdrop-blur-xl transition-all duration-300">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(56,189,248,0.15),transparent_28%),radial-gradient(circle_at_bottom_left,rgba(59,130,246,0.12),transparent_26%)]"></div>

    <div class="relative flex h-full flex-col">
        <div class="flex items-center justify-between border-b border-white/10 px-4 py-4">
            <div class="flex items-center gap-3 overflow-hidden">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-400 via-blue-500 to-indigo-600 shadow-lg shadow-blue-900/30">
                    <i class="fas fa-hospital text-sm text-white"></i>
                </div>
                <div class="sidebar-brand-text min-w-0">
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-sky-300/80">Panel</p>
                    <h2 class="text-base font-extrabold tracking-tight text-white">MedDesa</h2>
                </div>
            </div>

            <button type="button" id="sidebar-toggle" class="sidebar-toggle inline-flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-200 transition hover:bg-white/10 hover:text-white" aria-label="Collapse sidebar" aria-pressed="false">
                <i class="fas fa-angle-left sidebar-collapse-icon transition-transform duration-300"></i>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto px-3 py-4">
            <p class="sidebar-section-title px-3 pb-3 text-[11px] font-bold uppercase tracking-[0.3em] text-slate-400">Navigasi Utama</p>
            <ul class="space-y-1">
                <?php foreach ($navItems as $item): ?>
                    <?php $isActive = strpos($currentPath, $item['prefix']) === 0; ?>
                    <li>
                        <a href="<?= htmlspecialchars($item['href']) ?>" data-nav-prefix="<?= htmlspecialchars($item['prefix']) ?>" class="group flex items-center gap-3 rounded-2xl px-4 py-3.5 transition-all duration-200 <?= $isActive ? 'sidebar-active bg-sky-500/15 text-white shadow-[0_10px_30px_rgba(14,165,233,0.18)] ring-1 ring-sky-400/30' : 'text-slate-300 hover:bg-white/10 hover:text-white' ?>">
                            <i class="fas <?= htmlspecialchars($item['icon']) ?> w-5 shrink-0 text-center text-slate-300 transition group-hover:text-sky-300 <?= $isActive ? 'text-sky-200' : '' ?>"></i>
                            <span class="sidebar-label min-w-0 flex-1 font-semibold tracking-tight"><?= htmlspecialchars($item['label']) ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class="sidebar-section-title px-3 pb-3 text-[11px] font-bold uppercase tracking-[0.3em] text-slate-400">Akun</p>
            <a href="/logout" class="group flex items-center gap-3 rounded-2xl px-4 py-3.5 text-slate-300 transition-all duration-200 hover:bg-rose-500/15 hover:text-white">
                <i class="fas fa-sign-out-alt w-5 shrink-0 text-center text-rose-300 transition group-hover:text-rose-200"></i>
                <span class="sidebar-label min-w-0 flex-1 font-semibold tracking-tight">Logout</span>
            </a>
        </nav>
    </div>
</aside>