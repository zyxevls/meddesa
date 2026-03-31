<?php
$rekamMedis = $rekam_medis ?? [];
$itemId = $rekamMedis['id'] ?? '';
?>

<section class="mx-auto max-w-7xl space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-teal-600 via-cyan-700 to-blue-800 p-7 text-white shadow-xl">
        <div class="absolute -right-8 -top-8 h-36 w-36 rounded-full bg-white/15"></div>
        <div class="absolute -bottom-10 left-1/3 h-28 w-28 rounded-full bg-cyan-300/30"></div>
        <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-100">Detail Rekam Medis</p>
                <h1 class="mt-1 text-3xl font-bold leading-tight md:text-4xl">Informasi Detail Rekam Medis</h1>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">Berikut adalah data lengkap rekam medis pasien yang terdaftar di dalam sistem MedDesa.</p>
            </div>
            <a href="/admin/rekam-medis" class="inline-flex items-center gap-2 self-start rounded-xl border border-white/40 bg-white/15 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/25 md:self-auto">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[3fr_1fr]">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
            <div class="space-y-8">
                <!-- Identitas Pasien & Dokter -->
                <div>
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-cyan-100 text-cyan-700"><i class="fas fa-id-card"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Identitas Pasien & Dokter</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">No Antrean</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars((string) ($rekamMedis['nomor_antrean'] ?? '-')) ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">No Rekam Medis</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars((string) ($rekamMedis['no_rm'] ?? '-')) ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Nama Pasien</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars((string) ($rekamMedis['nama_pasien'] ?? '-')) ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Nama Dokter</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars((string) ($rekamMedis['nama_dokter'] ?? '-')) ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Spesialisasi</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars((string) ($rekamMedis['spesialisasi'] ?? '-')) ?></p>
                        </div>
                    </div>
                </div>

                <!-- Tanggal & Keluhan Utama -->
                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-700"><i class="fas fa-calendar-check"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Waktu & Keluhan</h2>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Tanggal Periksa</p>
                            <p class="mt-1 text-base font-medium text-slate-800"><?= htmlspecialchars((string) ($rekamMedis['tanggal_periksa'] ?? '-')) ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Keluhan Utama</p>
                            <p class="mt-1 whitespace-pre-wrap rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm text-slate-800"><?= nl2br(htmlspecialchars((string) ($rekamMedis['keluhan_utama'] ?? '-'))) ?></p>
                        </div>
                    </div>
                </div>

                <!-- Pemeriksaan Fisik -->
                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-rose-100 text-rose-700"><i class="fas fa-stethoscope"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Pemeriksaan Fisik</h2>
                    </div>
                    <div>
                        <p class="whitespace-pre-wrap rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm text-slate-800"><?= nl2br(htmlspecialchars((string) ($rekamMedis['pemeriksaan_fisik'] ?? '-'))) ?></p>
                    </div>
                </div>

                <!-- Diagnosa -->
                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-amber-100 text-amber-700"><i class="fas fa-notes-medical"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Diagnosa</h2>
                    </div>
                    <div>
                        <p class="whitespace-pre-wrap rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm text-slate-800"><?= nl2br(htmlspecialchars((string) ($rekamMedis['diagnosa'] ?? '-'))) ?></p>
                    </div>
                </div>

                <!-- Tindakan -->
                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700"><i class="fas fa-hands-praying"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Tindakan</h2>
                    </div>
                    <div>
                        <p class="whitespace-pre-wrap rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm text-slate-800"><?= nl2br(htmlspecialchars((string) ($rekamMedis['tindakan'] ?? '-'))) ?></p>
                    </div>
                </div>

                <!-- Catatan Dokter -->
                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-purple-100 text-purple-700"><i class="fas fa-clipboard-list"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Catatan Dokter</h2>
                    </div>
                    <div>
                        <p class="whitespace-pre-wrap rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm text-slate-800"><?= nl2br(htmlspecialchars((string) ($rekamMedis['catatan_dokter'] ?? '-'))) ?></p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
                    <a href="/admin/rekam-medis/edit/<?= urlencode((string) $itemId) ?>" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-amber-500 to-orange-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-orange-100 transition hover:-translate-y-0.5">
                        <i class="fas fa-edit"></i>
                        Edit Rekam Medis
                    </a>
                </div>
            </div>
        </div>

        <aside class="space-y-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="text-base font-semibold text-slate-800">Informasi Rekam Medis</h3>
                <div class="mt-4 space-y-3">
                    <div class="flex items-center justify-between border-b border-slate-50 py-2">
                        <span class="text-sm text-slate-600">No. Antrean:</span>
                        <span class="text-sm font-medium text-slate-800"><?= htmlspecialchars((string) ($rekamMedis['nomor_antrean'] ?? '-')) ?></span>
                    </div>
                    <div class="flex items-center justify-between border-b border-slate-50 py-2">
                        <span class="text-sm text-slate-600">Status Data:</span>
                        <span class="inline-flex rounded-full bg-emerald-100 px-2 py-1 text-xs font-bold text-emerald-700">Tersimpan</span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-slate-600">Terdaftar Sejak:</span>
                        <span class="text-sm font-medium text-slate-800">
                            <?php
                            $createdAt = $rekamMedis['created_at'] ?? '';
                            echo $createdAt ? date('d/m/Y H:i', strtotime($createdAt)) : '-';
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-cyan-200 bg-gradient-to-br from-cyan-50 to-blue-50 p-5 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wider text-cyan-800">⚠️ Informasi Penting</p>
                <p class="mt-2 text-sm text-slate-700 italic">"Data rekam medis bersifat rahasia dan handling harus sesuai dengan standar privasi pasien."</p>
            </div>
        </aside>
    </div>
</section>