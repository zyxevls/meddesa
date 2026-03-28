<?php

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

    <div class="flex flex-wrap gap-4">
        <!-- Keuangan & Volume -->
        <article class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md min-w-[200px] flex-1">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-cyan-50 text-cyan-600">
                <i class="fas fa-pills"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Jenis Obat</p>
                <p class="text-xl font-bold text-slate-800"><?= number_format($totalJenis ?? 0, 0, ',', '.') ?></p>
            </div>
        </article>

        <article class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md min-w-[200px] flex-1">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                <i class="fas fa-boxes"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Total Stok</p>
                <p class="text-xl font-bold text-slate-800"><?= number_format($totalStok ?? 0, 0, ',', '.') ?></p>
            </div>
        </article>

        <!-- Alerts & Warnings -->
        <?php $hampirHabis = count(array_filter($obats, function ($o) {
            return ($o['stok'] ?? 0) <= 10;
        })); ?>
        <article class="flex items-center gap-4 rounded-2xl border border-rose-100 bg-rose-50/40 p-4 shadow-sm transition hover:shadow-md min-w-[180px] flex-1">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-rose-100 text-rose-600">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-rose-500">Hampir Habis</p>
                <p class="text-xl font-bold text-rose-700"><?= number_format($hampirHabis, 0, ',', '.') ?></p>
            </div>
        </article>

        <article class="flex items-center gap-4 rounded-2xl border border-red-100 bg-red-100/30 p-4 shadow-sm transition hover:shadow-md min-w-[180px] flex-1">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-600 text-white">
                <i class="fas fa-calendar-times"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-red-600">Kedaluwarsa</p>
                <p class="text-xl font-bold text-red-800"><?= number_format($expiredCount ?? 0, 0, ',', '.') ?></p>
            </div>
        </article>

        <article class="flex items-center gap-4 rounded-2xl border border-amber-100 bg-amber-50/50 p-4 shadow-sm transition hover:shadow-md min-w-[220px] flex-1">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                <i class="fas fa-clock"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-amber-600">Segera Kedalwarsa</p>
                <p class="text-xl font-bold text-amber-700"><?= number_format($expiringSoonCount ?? 0, 0, ',', '.') ?></p>
            </div>
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
                            <th class="px-4 py-3 text-left font-semibold">No</th>
                            <th class="px-4 py-3 text-left font-semibold">Kode Obat</th>
                            <th class="px-4 py-3 text-left font-semibold">Nama Obat</th>
                            <th class="px-4 py-3 text-left font-semibold">Kategori</th>
                            <th class="px-4 py-3 text-left font-semibold">Stok</th>
                            <th class="px-4 py-3 text-left font-semibold">Harga</th>
                            <th class="px-4 py-3 text-left font-semibold">Tanggal Expired</th>
                            <th class="px-4 py-3 text-left font-semibold">Rak Penyimpanan</th>
                            <th class="px-4 py-3 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="obat-table-body" class="divide-y divide-slate-200 bg-white text-slate-700">
                        <?php if (empty($obats)): ?>
                            <tr>
                                <td colspan="9" class="px-4 py-8 text-center text-slate-500">Belum ada data obat.</td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($obats as $index => $item): ?>
                            <tr class="transition hover:bg-blue-50/40">
                                <td class="px-4 py-3 font-medium text-slate-800"><?= $index + 1 ?></td>
                                <td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars($item['kode_obat'] ?? '') ?></td>
                                <td class="px-4 py-3 font-medium text-slate-800">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-900"><?= htmlspecialchars($item['nama'] ?? '') ?></span>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-slate-800"><?= htmlspecialchars($item['kategori'] ?? '') ?></span>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-slate-800"><?= number_format($item['stok'] ?? 0, 0, ',', '.') ?></span>
                                        <?php if (($item['stok'] ?? 0) <= 10): ?>
                                            <span class="text-[10px] font-bold uppercase text-rose-600">Re-stock!</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-medium text-slate-800">Rp <?= number_format($item['harga'] ?? 0, 0, ',', '.') ?></td>
                                <td class="px-4 py-3">
                                    <?php
                                    $expiryDate = new DateTime($item['tanggal_expired'] ?? 'now');
                                    $today = new DateTime();
                                    $diff = $today->diff($expiryDate);
                                    $isExpired = $expiryDate < $today;
                                    $isSoon = !$isExpired && $diff->days <= 90;
                                    ?>
                                    <div class="flex flex-col leading-tight">
                                        <span class="<?= $isExpired ? 'text-red-600 font-bold' : ($isSoon ? 'text-amber-600 font-semibold' : 'text-slate-700') ?>">
                                            <?= date('d/m/Y', strtotime($item['tanggal_expired'] ?? 'now')) ?>
                                        </span>
                                        <?php if ($isExpired): ?>
                                            <span class="text-[10px] font-bold uppercase text-red-600">Expired!</span>
                                        <?php elseif ($isSoon): ?>
                                            <span class="text-[10px] font-bold uppercase text-amber-600">Segera Expired</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="rounded-lg bg-slate-100 px-2 py-1 text-xs font-semibold text-slate-700">
                                        <?= htmlspecialchars($item['rak_penyimpanan'] ?? '-') ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="/admin/obat/detail/<?= $item['id'] ?>" title="Lihat Detail" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-teal-200 bg-teal-50 text-teal-600 transition hover:bg-teal-100" title="Detail">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        <a href="/admin/obat/edit/<?= $item['id'] ?>" title="Edit" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-blue-200 bg-blue-50 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                            <i class="fas fa-pen text-xs"></i>
                                        </a>
                                        <a href="/admin/obat/delete/<?= $item['id'] ?>" title="Hapus" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100 handle-swal" title="Hapus">
                                            <i class="fas fa-trash text-xs"></i>
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

        const deleteButtons = document.querySelectorAll('.handle-swal');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const url = this.getAttribute('href');

                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: 'Apakah Anda yakin ingin menghapus obat ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });

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