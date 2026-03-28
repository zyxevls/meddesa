<?php $formObat = $obat ?? []; ?>

<section class="mx-auto max-w-7xl space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-teal-600 via-cyan-700 to-blue-800 p-7 text-white shadow-xl">
        <div class="absolute -right-8 -top-8 h-36 w-36 rounded-full bg-white/15"></div>
        <div class="absolute -bottom-10 left-1/3 h-28 w-28 rounded-full bg-cyan-300/30"></div>
        <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-100">Detail Obat</p>
                <h1 class="mt-1 text-3xl font-bold leading-tight md:text-4xl">Informasi Detail Obat</h1>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">Berikut adalah informasi lengkap mengenai persediaan obat di sistem.</p>
            </div>
            <a href="/admin/obat" class="inline-flex items-center gap-2 self-start rounded-xl border border-white/40 bg-white/15 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/25 md:self-auto">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[3fr_1fr]">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
            <div class="space-y-8">
                <div>
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-cyan-100 text-cyan-700"><i class="fas fa-id-card"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Identitas Obat</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                        <div>
                            <p class="text-sm font-semibold text-slate-500">Kode Obat</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formObat['kode_obat'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-500">Nama Obat</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formObat['nama'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-500">Kategori</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formObat['kategori'] ?? '-') ?></p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-700"><i class="fas fa-box-open"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Informasi Stok & Penyimpanan</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div>
                            <p class="text-sm font-semibold text-slate-500">Jumlah Stok</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formObat['stok'] ?? '0') ?></p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-500">Harga Satuan</p>
                            <p class="mt-1 text-base font-medium text-slate-800">Rp <?= number_format($formObat['harga'] ?? 0, 0, ',', '.') ?></p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-500">Tanggal Expired</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= date('d F Y', strtotime($formObat['tanggal_expired'] ?? 'now')) ?></p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-500">Rak Penyimpanan</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formObat['rak_penyimpanan'] ?? '-') ?></p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
                    <a href="/admin/obat/edit/<?= $formObat['id'] ?>" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-amber-500 to-orange-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-orange-200 transition hover:-translate-y-0.5">
                        <i class="fas fa-edit"></i>
                        Edit Data Obat
                    </a>
                </div>
            </div>
        </div>

        <aside class="space-y-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="text-base font-semibold text-slate-800">Status Persediaan</h3>
                <div class="mt-4 space-y-3">
                    <?php 
                    $stok = $formObat['stok'] ?? 0;
                    $statusClass = $stok > 20 ? 'bg-emerald-100 text-emerald-700' : ($stok > 0 ? 'bg-amber-100 text-amber-700' : 'bg-red-100 text-red-700');
                    $statusText = $stok > 20 ? 'Stok Aman' : ($stok > 0 ? 'Stok Menipis' : 'Stok Habis');
                    ?>
                    <div class="flex items-center justify-between py-2 border-b border-slate-50">
                        <span class="text-sm text-slate-600">Status Stok:</span>
                        <span class="inline-flex px-2 py-1 text-xs font-bold rounded-full <?= $statusClass ?>"><?= $statusText ?></span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-slate-600">Terakhir Update:</span>
                        <span class="text-sm font-medium text-slate-800"><?= date('d/m/Y') ?></span>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-cyan-200 bg-gradient-to-br from-cyan-50 to-blue-50 p-5 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wider text-cyan-800">Tips Inventori</p>
                <p class="mt-2 text-sm text-slate-700">Lakukan pengecekan stok secara berkala untuk memastikan ketersediaan obat bagi pasien.</p>
            </div>
        </aside>
    </div>
</section>
