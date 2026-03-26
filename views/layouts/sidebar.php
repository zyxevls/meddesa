<?php $currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH); ?>

<!-- Sidebar -->
<div class="fixed left-0 top-20 w-56 h-[calc(100vh-5rem)] bg-gradient-to-b from-slate-800 to-slate-900 border-r border-slate-700 overflow-y-auto">
    <nav class="py-6">
        <ul class="space-y-1 px-3">
            <li>
                <a href="/admin/dashboard" data-nav-prefix="/admin/dashboard" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-chart-line w-5 flex-shrink-0 group-hover:text-blue-400"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/pasien" data-nav-prefix="/admin/pasien" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-users w-5 flex-shrink-0 group-hover:text-blue-400"></i>
                    <span class="font-medium">Pasien</span>
                </a>
            </li>
            <li>
                <a href="/admin/obat" data-nav-prefix="/admin/obat" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 group <?= strpos($currentPath, '/admin/obat') === 0 ? 'bg-blue-600/90 text-white shadow-lg shadow-blue-900/25' : 'text-slate-300 hover:bg-slate-700 hover:text-white' ?>">
                    <i class="fas fa-pills w-5 flex-shrink-0 group-hover:text-blue-400"></i>
                    <span class="font-medium">Obat</span>
                </a>
            </li>
            <li>
                <a href="/admin/rekam-medis" data-nav-prefix="/admin/rekam-medis" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-clipboard-list w-5 flex-shrink-0 group-hover:text-blue-400"></i>
                    <span class="font-medium">Rekam Medis</span>
                </a>
            </li>
            <li>
                <a href="/admin/pegawai" data-nav-prefix="/admin/pegawai" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-user-md w-5 flex-shrink-0 group-hover:text-blue-400"></i>
                    <span class="font-medium">Pegawai</span>
                </a>
            </li>
            <li>
                <a href="/admin/keuangan" data-nav-prefix="/admin/keuangan" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-money-bill-wave w-5 flex-shrink-0 group-hover:text-blue-400"></i>
                    <span class="font-medium">Keuangan</span>
                </a>
            </li>
            <li>
                <a href="/admin/laporan" data-nav-prefix="/admin/laporan" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-file-alt w-5 flex-shrink-0 group-hover:text-blue-400"></i>
                    <span class="font-medium">Laporan</span>
                </a>
            </li>
        </ul>

        <!-- Divider -->
        <div class="my-6 border-t border-slate-700"></div>

        <!-- Logout -->
        <ul class="space-y-1 px-3">
            <li>
                <a href="/logout" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-red-600 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-sign-out-alt w-5 flex-shrink-0"></i>
                    <span class="font-medium">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</div>