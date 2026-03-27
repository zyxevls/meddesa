<?php
$pasienList = $pasiens ?? [];
$totalPasien = count($pasienList);
$pasienPria = count(array_filter($pasienList, static fn($item) => ($item['jenis_kelamin'] ?? '') === 'Laki-laki'));
$pasienPerempuan = count(array_filter($pasienList, static fn($item) => ($item['jenis_kelamin'] ?? '') === 'Perempuan'));
?>

<section class="space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-cyan-600 via-blue-700 to-indigo-800 p-7 text-white shadow-xl">
        <div class="absolute -right-10 -top-10 h-44 w-44 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-12 right-20 h-40 w-40 rounded-full bg-cyan-300/20"></div>
        <div class="relative flex flex-col gap-5 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="mb-1 text-xs uppercase tracking-[0.3em] text-cyan-100">Manajemen Pasien</p>
                <h1 class="text-3xl font-semibold leading-tight md:text-4xl">Data Pasien</h1>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">
                    Daftar pasien terdaftar untuk membantu proses pendaftaran, pemeriksaan, dan tindak lanjut layanan.
                </p>
            </div>
            <a href="/admin/pasien/create" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-blue-700 shadow-lg transition duration-300 hover:-translate-y-0.5 hover:bg-cyan-50">
                <i class="fas fa-plus"></i>
                Tambah Pasien
            </a>
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Total Pasien</p>
            <p class="mt-3 text-3xl font-semibold text-slate-800"><?= number_format($totalPasien, 0, ',', '.') ?></p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Pasien Laki-laki</p>
            <p class="mt-3 text-3xl font-semibold text-slate-800"><?= number_format($pasienPria, 0, ',', '.') ?></p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Pasien Perempuan</p>
            <p class="mt-3 text-3xl font-semibold text-slate-800"><?= number_format($pasienPerempuan, 0, ',', '.') ?></p>
        </article>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="mb-4 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <h2 class="text-lg font-semibold text-slate-800">Daftar Pasien</h2>
            <div class="relative w-full md:w-80">
                <i class="fas fa-search pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input id="pasien-search" type="text" placeholder="Cari no RM, nama, NIK, atau telepon..." class="w-full rounded-xl border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-200">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-slate-100 text-slate-700">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">No</th>
                            <th class="px-4 py-3 text-left font-semibold">No. RM</th>
                            <th class="px-4 py-3 text-left font-semibold">Nama Pasien</th>
                            <th class="px-4 py-3 text-left font-semibold">Jenis Kelamin</th>
                            <th class="px-4 py-3 text-left font-semibold">Gol. Darah</th>
                            <th class="px-4 py-3 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pasien-table-body" class="divide-y divide-slate-200 bg-white text-slate-700">
                        <?php if (empty($pasienList)): ?>
                            <tr>
                                <td colspan="14" class="px-4 py-8 text-center text-slate-500">Belum ada data pasien.</td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($pasienList as $item): ?>
                            <tr class="transition hover:bg-blue-50/40">
                                <td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars((string) ($item['id'] ?? '-')) ?></td>
                                <td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars((string) ($item['no_rm'] ?? '-')) ?></td>
                                <td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars((string) ($item['nama'] ?? '-')) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars((string) ($item['jenis_kelamin'] ?? '-')) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars((string) ($item['golongan_darah'] ?? '-')) ?></td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="/admin/pasien/detail/<?= urlencode((string) ($item['id'] ?? '')) ?>" class="inline-flex items-center rounded-lg bg-blue-100 px-3 py-1.5 text-xs font-semibold text-blue-700 hover:bg-blue-200">Detail</a>
                                        <a href="/admin/pasien/edit/<?= urlencode((string) ($item['id'] ?? '')) ?>" class="inline-flex items-center rounded-lg bg-amber-100 px-3 py-1.5 text-xs font-semibold text-amber-700 hover:bg-amber-200">Edit</a>
                                        <a href="/admin/pasien/delete/<?= urlencode((string) ($item['id'] ?? '')) ?>" class="inline-flex items-center rounded-lg bg-rose-100 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-200 handle-swal">Hapus</a>
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
        const searchInput = document.getElementById('pasien-search');
        const tableBody = document.getElementById('pasien-table-body');

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

        const toast = document.getQuerySelector('.handle-toast');
        if (toast)

            if (!searchInput || !tableBody) {
                return;
            }

        searchInput.addEventListener('input', function() {
            const keyword = this.value.trim().toLowerCase();
            const rows = tableBody.querySelectorAll('tr');

            rows.forEach(function(row) {
                const cells = row.querySelectorAll('td');
                if (!cells.length) {
                    return;
                }

                const searchText = [
                    cells[0]?.textContent || '',
                    cells[1]?.textContent || '',
                    cells[2]?.textContent || '',
                    cells[6]?.textContent || ''
                ].join(' ').toLowerCase();

                const visible = searchText.includes(keyword);
                row.style.display = visible ? '' : 'none';
            });
        });
    })();
</script>