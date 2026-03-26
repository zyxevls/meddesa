<?php
$totalJenis = count($obats ?? []);
$totalStok = 0;
$totalNilai = 0;

foreach ($obats ?? [] as $item) {
    $stok = (int) ($item['stok'] ?? 0);
    $harga = (int) ($item['harga'] ?? 0);
    $totalStok += $stok;
    $totalNilai += ($stok * $harga);
}
?>

<section class="space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-cyan-600 via-blue-700 to-indigo-800 p-7 text-white shadow-xl">
        <div class="absolute -right-10 -top-10 h-44 w-44 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-12 right-20 h-40 w-40 rounded-full bg-cyan-300/20"></div>
        <div class="relative flex flex-col gap-5 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="mb-1 text-xs uppercase tracking-[0.3em] text-cyan-100">Manajemen Farmasi</p>
                <h1 class="text-3xl font-semibold leading-tight md:text-4xl">Inventori Obat</h1>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">
                    Kelola stok obat, pantau nilai persediaan, dan lakukan pembaruan data dengan alur kerja yang lebih cepat.
                </p>
            </div>
            <a href="/admin/obat/create" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-blue-700 shadow-lg transition duration-300 hover:-translate-y-0.5 hover:bg-cyan-50">
                <i class="fas fa-plus"></i>
                Tambah Obat
            </a>
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Jenis Obat</p>
            <p class="mt-3 text-3xl font-semibold text-slate-800"><?= number_format($totalJenis, 0, ',', '.') ?></p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Total Stok</p>
            <p class="mt-3 text-3xl font-semibold text-slate-800"><?= number_format($totalStok, 0, ',', '.') ?></p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Nilai Persediaan</p>
            <p class="mt-3 text-3xl font-semibold text-slate-800">Rp <?= number_format($totalNilai, 0, ',', '.') ?></p>
        </article>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="mb-4 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <h2 class="text-lg font-semibold text-slate-800">Daftar Obat</h2>
            <div class="relative w-full md:w-72">
                <i class="fas fa-search pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input id="obat-search" type="text" placeholder="Cari nama obat..." class="w-full rounded-xl border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-200">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-slate-100 text-slate-700">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">Nama Obat</th>
                            <th class="px-4 py-3 text-left font-semibold">Stok</th>
                            <th class="px-4 py-3 text-left font-semibold">Harga</th>
                            <th class="px-4 py-3 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="obat-table-body" class="divide-y divide-slate-200 bg-white text-slate-700">
                        <?php if (empty($obats)): ?>
                            <tr>
                                <td colspan="4" class="px-4 py-8 text-center text-slate-500">Belum ada data obat.</td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($obats as $obat): ?>
                            <tr class="transition hover:bg-blue-50/40">
                                <td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars($obat['nama']) ?></td>
                                <td class="px-4 py-3"><?= number_format((int) $obat['stok'], 0, ',', '.') ?></td>
                                <td class="px-4 py-3">Rp <?= number_format((int) $obat['harga'], 0, ',', '.') ?></td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-3">
                                        <a href="/admin/obat/edit/<?= $obat['id'] ?>" class="inline-flex items-center gap-1 rounded-lg border border-blue-200 bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700 transition hover:bg-blue-100">
                                            <i class="fas fa-pen"></i>
                                            Edit
                                        </a>
                                        <a href="/admin/obat/delete/<?= $obat['id'] ?>" class="inline-flex items-center gap-1 rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 transition hover:bg-red-100" onclick="return confirm('Hapus data obat ini?')">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    (function() {
        const searchInput = document.getElementById('obat-search');
        const tableBody = document.getElementById('obat-table-body');

        if (!searchInput || !tableBody) {
            return;
        }

        searchInput.addEventListener('input', function() {
            const keyword = this.value.trim().toLowerCase();
            const rows = tableBody.querySelectorAll('tr');

            rows.forEach(function(row) {
                const nameCell = row.querySelector('td');
                if (!nameCell) {
                    return;
                }

                const visible = nameCell.textContent.toLowerCase().includes(keyword);
                row.style.display = visible ? '' : 'none';
            });
        });
    })();
</script>