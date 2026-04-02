<?php $formPasien = $pasien ?? []; ?>

<section class="mx-auto max-w-7xl space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-teal-600 via-cyan-700 to-blue-800 p-7 text-white shadow-xl">
        <div class="absolute -right-8 -top-8 h-36 w-36 rounded-full bg-white/15"></div>
        <div class="absolute -bottom-10 left-1/3 h-28 w-28 rounded-full bg-cyan-300/30"></div>
        <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-100">Detail Pasien</p>
                <h1 class="mt-1 text-3xl font-bold leading-tight md:text-4xl">Informasi Detail Pasien</h1>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">Berikut adalah data lengkap pasien yang terdaftar di dalam sistem MedDesa.</p>
            </div>
            <a href="/admin/pasien" class="inline-flex items-center gap-2 self-start rounded-xl border border-white/40 bg-white/15 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/25 md:self-auto">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[3fr_1fr]">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
            <div class="space-y-8">
                <!-- Identitas Utama -->
                <div>
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-cyan-100 text-cyan-700"><i class="fas fa-id-card"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Identitas Utama</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">No Rekam Medis</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formPasien['no_rm'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">NIK (KTP)</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formPasien['nik'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Nomor BPJS</p>
                            <?php if (!empty($formPasien['no_bpjs'])): ?>
                                <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formPasien['no_bpjs']) ?></p>
                            <?php else: ?>
                                <p class="mt-1 text-sm font-bold text-rose-600">Tidak Ada (Umum)</p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Nama Lengkap</p>
                            <p class="mt-1 text-base font-bold text-slate-900"><?= htmlspecialchars($formPasien['nama'] ?? '-') ?></p>
                        </div>
                    </div>
                </div>

                <!-- Profil Pasien -->
                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-700"><i class="fas fa-user"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Profil & Personal</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Lahir</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formPasien['tempat_lahir'] ?? '-') ?>, <?= date('d F Y', strtotime($formPasien['tanggal_lahir'] ?? 'now')) ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Jenis Kelamin</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formPasien['jenis_kelamin'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Gol. Darah</p>
                            <span class="mt-1 inline-flex h-7 w-7 items-center justify-center rounded-full bg-rose-100 text-xs font-bold text-rose-700"><?= htmlspecialchars($formPasien['golongan_darah'] ?? '-') ?></span>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Pekerjaan</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formPasien['pekerjaan'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Status Perkawinan</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formPasien['status_perkawinan'] ?? '-') ?></p>
                        </div>
                        <div class="col-span-3">
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Alamat Lengkap</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formPasien['alamat'] ?? '-') ?></p>
                        </div>
                    </div>
                </div>

                <!-- Kontak & Admin -->
                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-100 text-indigo-700"><i class="fas fa-file-medical"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Kontak & Administrasi</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-2">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Nomor Telepon</p>
                            <p class="mt-1 text-base font-medium text-blue-600"><?= htmlspecialchars($formPasien['no_telephone'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Nomor Kartu Keluarga</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars($formPasien['no_kk'] ?? '-') ?></p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
                    <a href="/admin/pasien/edit/<?= $formPasien['id'] ?? '' ?>" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-amber-500 to-orange-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-orange-100 transition hover:-translate-y-0.5">
                        <i class="fas fa-edit"></i>
                        Edit Data Pasien
                    </a>
                </div>
            </div>
        </div>

        <aside class="space-y-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="text-base font-semibold text-slate-800">Status Rekam Medis</h3>
                <div class="mt-4 space-y-3">
                    <div class="flex items-center justify-between border-b border-slate-50 py-2">
                        <span class="text-sm text-slate-600">Metode:</span>
                        <?php if (!empty($formPasien['no_bpjs'])): ?>
                            <span class="inline-flex rounded-full bg-emerald-100 px-2 py-1 text-xs font-bold text-emerald-700">BPJS Kesehatan</span>
                        <?php else: ?>
                            <span class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-xs font-bold text-blue-700">Pasien Umum</span>
                        <?php endif; ?>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-slate-600">Terdaftar Sejak:</span>
                        <span class="text-sm font-medium text-slate-800"><?= date('d/m/Y') ?></span>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-cyan-200 bg-gradient-to-br from-cyan-50 to-blue-50 p-5 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wider text-cyan-800">Informasi Penting</p>
                <p class="mt-2 text-sm text-slate-700 italic">"Pastikan memverifikasi fisik KTP/Kartu BPJS saat pasien datang untuk berobat."</p>
            </div>
        </aside>
    </div>
</section>