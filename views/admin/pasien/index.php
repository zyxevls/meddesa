<?php
$pasienList = $pasiens ?? [];
$totalPasien = count($pasienList);
$pasienPria = count(array_filter($pasienList, static fn($item) => ($item['jenis_kelamin'] ?? '') === 'Laki-laki'));
$pasienPerempuan = count(array_filter($pasienList, static fn($item) => ($item['jenis_kelamin'] ?? '') === 'Perempuan'));
$pasienBpjs = count(array_filter($pasienList, static fn($item) => !empty($item['no_bpjs'])));
$pasienUmum = $totalPasien - $pasienBpjs;
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

    <!-- Mini Dashboard -->
    <div class="flex flex-wrap gap-4">
        <article class="flex flex-1 items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md min-w-[180px]">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Total Pasien</p>
                <p class="text-xl font-bold text-slate-800"><?= number_format($totalPasien, 0, ',', '.') ?></p>
            </div>
        </article>

        <article class="flex flex-1 items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md min-w-[180px]">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-cyan-50 text-cyan-600">
                <i class="fas fa-mars"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Laki-laki</p>
                <p class="text-xl font-bold text-slate-800"><?= number_format($pasienPria, 0, ',', '.') ?></p>
            </div>
        </article>

        <article class="flex flex-1 items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md min-w-[180px]">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-rose-50 text-rose-600">
                <i class="fas fa-venus"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Perempuan</p>
                <p class="text-xl font-bold text-slate-800"><?= number_format($pasienPerempuan, 0, ',', '.') ?></p>
            </div>
        </article>

        <article class="flex flex-1 items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md min-w-[180px]">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                <i class="fas fa-id-card-clip"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Pasien BPJS</p>
                <p class="text-xl font-bold text-slate-800"><?= number_format($pasienBpjs, 0, ',', '.') ?></p>
            </div>
        </article>

        <article class="flex flex-1 items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md min-w-[180px]">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                <i class="fas fa-user-tag"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Pasien Umum</p>
                <p class="text-xl font-bold text-slate-800"><?= number_format($pasienUmum, 0, ',', '.') ?></p>
            </div>
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
                            <th class="px-4 py-3 text-left font-semibold">BPJS</th>
                            <th class="px-4 py-3 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pasien-table-body" class="divide-y divide-slate-200 bg-white text-slate-700">
                        <?php if (empty($pasienList)): ?>
                            <tr>
                                <td colspan="14" class="px-4 py-8 text-center text-slate-500">Belum ada data pasien.</td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($pasienList as $index => $item): ?>
                            <tr class="transition hover:bg-blue-50/40">
                                <td class="px-4 py-3 font-medium text-slate-800"><?= $index + 1 ?></td>
                                <td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars((string) ($item['no_rm'] ?? '-')) ?></td>
                                <td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars((string) ($item['nama'] ?? '-')) ?></td>
                                <td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars((string) ($item['jenis_kelamin'] ?? '-')) ?></td>
                                <td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars((string) ($item['golongan_darah'] ?? '-')) ?></td>
                                <td class="px-4 py-3 font-medium text-slate-800"><?php if ($item['no_bpjs'] != null) { ?>
                                        <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                            <i class="fas fa-check mr-1"></i> Ya
                                        </span>
                                    <?php } else { ?>
                                        <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">
                                            <i class="fas fa-times mr-1"></i> Tidak
                                        </span>
                                    <?php } ?>
                                </td>
                                <td class="px-4 py-3 font-medium text-slate-800">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="/admin/pasien/detail/<?= $item['id'] ?>" title="Lihat Detail" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-teal-200 bg-teal-50 text-teal-600 transition hover:bg-teal-100" title="Detail">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        <a href="/admin/pasien/edit/<?= $item['id'] ?>" title="Edit" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-blue-200 bg-blue-50 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                            <i class="fas fa-pen text-xs"></i>
                                        </a>
                                        <a href="/admin/pasien/delete/<?= $item['id'] ?>" title="Hapus" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100 handle-swal" title="Hapus">
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