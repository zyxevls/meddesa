<?php
$statusLabelsJson = json_encode($statusLabels ?? []);
$statusValuesJson = json_encode($statusValues ?? []);
$chartLabels7DaysJson = json_encode($chartLabels7Days ?? []);
$chartValues7DaysJson = json_encode($chartValues7Days ?? []);
$chartLabelsPasienBaruJson = json_encode($chartLabelsPasienBaru ?? []);
$chartValuesPasienBaruJson = json_encode($chartValuesPasienBaru ?? []);
$spesialisasiLabelsJson = json_encode($spesialisasiLabels ?? []);
$spesialisasiValuesJson = json_encode($spesialisasiValues ?? []);
$genderLabelsJson = json_encode($genderLabels ?? []);
$genderValuesJson = json_encode($genderValues ?? []);
$golonganDarahLabelsJson = json_encode($golonganDarahLabels ?? []);
$golonganDarahValuesJson = json_encode($golonganDarahValues ?? []);
$reservasiPoliLabelsJson = json_encode($reservasiPoliLabels ?? []);
$reservasiPoliValuesJson = json_encode($reservasiPoliValues ?? []);
$kategoriObatLabelsJson = json_encode($kategoriObatLabels ?? []);
$kategoriObatValuesJson = json_encode($kategoriObatValues ?? []);
$stokObatStatusLabelsJson = json_encode($stokObatStatusLabels ?? []);
$stokObatStatusValuesJson = json_encode($stokObatStatusValues ?? []);
?>

<section class="space-y-8">
    <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-slate-950 via-cyan-900 to-sky-700 px-6 py-8 text-white shadow-2xl shadow-slate-300/40 md:px-8 md:py-10">
        <div class="absolute -right-20 -top-24 h-72 w-72 rounded-full bg-cyan-400/20 blur-3xl"></div>
        <div class="absolute -bottom-24 left-1/3 h-72 w-72 rounded-full bg-sky-300/15 blur-3xl"></div>
        <div class="relative grid gap-6 lg:grid-cols-[1.35fr_1fr] lg:items-end">
            <div class="space-y-5">
                <span class="inline-flex w-fit items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.35em] text-cyan-100 backdrop-blur">
                    <i class="fas fa-chart-line"></i>
                    Ringkasan Operasional
                </span>
                <div class="space-y-3">
                    <h1 class="max-w-2xl text-4xl font-black leading-tight md:text-5xl">Dashboard</h1>
                    <p class="max-w-2xl text-sm leading-7 text-cyan-50/90 md:text-base">Seluruh angka di bawah ini diambil langsung dari data pasien, obat, dokter, reservasi, dan rekam medis yang sudah tersimpan di sistem.</p>
                </div>
                <div class="grid gap-3 sm:grid-cols-3">
                    <div class="rounded-2xl border border-white/10 bg-white/10 px-4 py-3 backdrop-blur">
                        <p class="text-xs uppercase tracking-[0.25em] text-cyan-100">Pasien</p>
                        <p class="mt-1 text-2xl font-bold"><?= number_format((int) ($totalPasien ?? 0)) ?></p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 px-4 py-3 backdrop-blur">
                        <p class="text-xs uppercase tracking-[0.25em] text-cyan-100">Reservasi Hari Ini</p>
                        <p class="mt-1 text-2xl font-bold"><?= number_format((int) ($reservasiHariIni ?? 0)) ?></p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 px-4 py-3 backdrop-blur">
                        <p class="text-xs uppercase tracking-[0.25em] text-cyan-100">Dokter Aktif</p>
                        <p class="mt-1 text-2xl font-bold"><?= number_format((int) ($totalDokterAktif ?? 0)) ?></p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:gap-4">
                <div class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur md:p-5">
                    <p class="text-sm text-cyan-100">Total Obat</p>
                    <p class="mt-2 text-3xl font-black md:mt-3 md:text-4xl"><?= number_format((int) ($totalObat ?? 0)) ?></p>
                    <p class="mt-2 text-xs text-cyan-50/75">Item aktif dalam stok</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur md:p-5">
                    <p class="text-sm text-cyan-100">Rekam Medis</p>
                    <p class="mt-2 text-3xl font-black md:mt-3 md:text-4xl"><?= number_format((int) ($totalRekamMedis ?? 0)) ?></p>
                    <p class="mt-2 text-xs text-cyan-50/75">Catatan layanan tersimpan</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur md:p-5">
                    <p class="text-sm text-cyan-100">Total Dokter</p>
                    <p class="mt-2 text-3xl font-black md:mt-3 md:text-4xl"><?= number_format((int) ($totalDokter ?? 0)) ?></p>
                    <p class="mt-2 text-xs text-cyan-50/75">Tenaga medis terdaftar</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur md:p-5">
                    <p class="text-sm text-cyan-100">Dokter Aktif</p>
                    <p class="mt-2 text-3xl font-black md:mt-3 md:text-4xl"><?= number_format((int) ($totalDokterAktif ?? 0)) ?></p>
                    <p class="mt-2 text-xs text-cyan-50/75">Siap praktik</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-200/60 overflow-hidden">
            <p class="text-sm text-slate-500">Pasien Baru 30 Hari</p>
            <div class="mt-3 flex items-end justify-between gap-4">
                <p class="text-3xl font-black text-cyan-700 md:text-[2.6rem]"><?= number_format((int) ($totalPasienBaru30Hari ?? 0)) ?></p>
                <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-semibold text-cyan-700">+30 hari</span>
            </div>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-200/60 overflow-hidden">
            <p class="text-sm text-slate-500">Total Stok Obat</p>
            <div class="mt-3 flex items-end justify-between gap-4">
                <p class="text-3xl font-black text-emerald-700 md:text-[2.6rem]"><?= number_format((int) ($totalStokObat ?? 0)) ?></p>
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">Inventory</span>
            </div>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-200/60 overflow-hidden">
            <p class="text-sm text-slate-500">Reservasi Hari Ini</p>
            <div class="mt-3 flex items-end justify-between gap-4">
                <p class="text-3xl font-black text-amber-700 md:text-[2.6rem]"><?= number_format((int) ($reservasiHariIni ?? 0)) ?></p>
                <span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">Today</span>
            </div>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-200/60 overflow-hidden">
            <p class="text-sm text-slate-500">Rekam Medis</p>
            <div class="mt-3 flex items-end justify-between gap-4">
                <p class="text-3xl font-black text-rose-700 md:text-[2.6rem]"><?= number_format((int) ($totalRekamMedis ?? 0)) ?></p>
                <span class="rounded-full bg-rose-50 px-3 py-1 text-xs font-semibold text-rose-700">Data</span>
            </div>
        </div>
    </div>

    <div class="rounded-[1.5rem] border border-slate-200 bg-white px-4 py-4 shadow-sm shadow-slate-200/60 md:px-6">
        <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                <span class="text-sm text-slate-500">Total Dokter</span>
                <span class="text-lg font-bold text-slate-900"><?= number_format((int) ($totalDokter ?? 0)) ?></span>
            </div>
            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                <span class="text-sm text-slate-500">Dokter Aktif</span>
                <span class="text-lg font-bold text-emerald-700"><?= number_format((int) ($totalDokterAktif ?? 0)) ?></span>
            </div>
            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                <span class="text-sm text-slate-500">Dokter Non Aktif</span>
                <span class="text-lg font-bold text-rose-700"><?= number_format((int) ($totalDokterNonAktif ?? 0)) ?></span>
            </div>
            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                <span class="text-sm text-slate-500">Spesialisasi</span>
                <span class="text-lg font-bold text-cyan-700"><?= number_format((int) ($totalSpesialisasi ?? 0)) ?></span>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.35fr_0.95fr]">
        <div class="min-w-0 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 overflow-hidden">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Reservasi 7 Hari Terakhir</h2>
                    <p class="text-sm text-slate-500">Tren kunjungan membantu melihat pola layanan harian.</p>
                </div>
                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Trend</span>
            </div>
            <div class="h-[260px] md:h-[300px] max-w-full">
                <canvas id="reservasiTrendChart"></canvas>
            </div>
        </div>

        <div class="min-w-0 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 overflow-hidden">
            <div class="mb-5">
                <h2 class="text-xl font-bold text-slate-900">Status Reservasi</h2>
                <p class="text-sm text-slate-500">Distribusi status antrean dari data yang tersimpan.</p>
            </div>
            <div class="h-[260px] md:h-[300px] max-w-full">
                <canvas id="statusReservasiChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-3">
        <div class="min-w-0 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 xl:col-span-2 overflow-hidden">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Pasien Baru 7 Hari</h2>
                    <p class="text-sm text-slate-500">Menunjukkan pertumbuhan pendaftaran pasien terbaru.</p>
                </div>
                <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-indigo-700">Growth</span>
            </div>
            <div class="h-[240px] md:h-[280px] max-w-full">
                <canvas id="pasienBaruChart"></canvas>
            </div>
        </div>

        <div class="min-w-0 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 overflow-hidden">
            <div class="mb-5">
                <h2 class="text-xl font-bold text-slate-900">Jenis Kelamin Pasien</h2>
                <p class="text-sm text-slate-500">Komposisi data demografi pasien.</p>
            </div>
            <div class="h-[240px] md:h-[280px] max-w-full">
                <canvas id="genderChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-2">
        <div class="min-w-0 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 overflow-hidden">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Dokter per Spesialisasi</h2>
                    <p class="text-sm text-slate-500">Komposisi dokter aktif di sistem.</p>
                </div>
                <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-sky-700">SDM</span>
            </div>
            <div class="h-[240px] md:h-[280px] max-w-full">
                <canvas id="spesialisasiChart"></canvas>
            </div>
        </div>

        <div class="min-w-0 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 overflow-hidden">
            <div class="mb-5">
                <h2 class="text-xl font-bold text-slate-900">Golongan Darah Pasien</h2>
                <p class="text-sm text-slate-500">Distribusi data klinis yang tersedia.</p>
            </div>
            <div class="h-[240px] md:h-[280px] max-w-full">
                <canvas id="golonganDarahChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-2">
        <div class="min-w-0 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 overflow-hidden">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Reservasi per Poli</h2>
                    <p class="text-sm text-slate-500">Poli yang paling sering dipilih pasien.</p>
                </div>
                <span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-amber-700">Demand</span>
            </div>
            <div class="h-[240px] md:h-[280px] max-w-full">
                <canvas id="reservasiPoliChart"></canvas>
            </div>
        </div>

        <div class="min-w-0 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 overflow-hidden">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Kategori Obat</h2>
                    <p class="text-sm text-slate-500">Variasi kategori yang tersimpan di inventory.</p>
                </div>
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Inventory</span>
            </div>
            <div class="h-[240px] md:h-[280px] max-w-full">
                <canvas id="kategoriObatChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-2">
        <div class="min-w-0 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 overflow-hidden">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Status Stok Obat</h2>
                    <p class="text-sm text-slate-500">Kondisi stok yang perlu dipantau.</p>
                </div>
                <span class="rounded-full bg-rose-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-rose-700">Stock</span>
            </div>
            <div class="h-[240px] md:h-[280px] max-w-full">
                <canvas id="stokObatChart"></canvas>
            </div>
        </div>

        <div class="min-w-0 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 overflow-hidden">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Detail Reservasi Status</h2>
                    <p class="text-sm text-slate-500">Distribusi status antrean dari data yang tersimpan.</p>
                </div>
                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Status</span>
            </div>
            <div class="h-[240px] md:h-[280px] max-w-full">
                <canvas id="statusReservasiChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-2">
        <div class="rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Reservasi Terbaru</h2>
                    <p class="text-sm text-slate-500">Daftar aktivitas terbaru dari pasien yang mendaftar.</p>
                </div>
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Live</span>
            </div>

            <div class="space-y-3">
                <?php if (!empty($recentReservasi)): ?>
                    <?php foreach ($recentReservasi as $item): ?>
                        <?php
                        $status = strtolower((string) ($item['status'] ?? 'menunggu'));
                        $badgeClass = 'bg-slate-100 text-slate-700';
                        if (in_array($status, ['selesai', 'done', 'completed'], true)) {
                            $badgeClass = 'bg-emerald-100 text-emerald-700';
                        } elseif (in_array($status, ['proses', 'diproses', 'on_process'], true)) {
                            $badgeClass = 'bg-amber-100 text-amber-700';
                        } elseif (in_array($status, ['batal', 'cancel', 'dibatalkan'], true)) {
                            $badgeClass = 'bg-rose-100 text-rose-700';
                        }
                        ?>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="text-sm font-semibold text-slate-500"><?= htmlspecialchars($item['nomor_antrean'] ?? '-') ?> · <?= htmlspecialchars($item['tanggal_reservasi'] ?? '-') ?></p>
                                    <p class="mt-1 text-base font-bold text-slate-900"><?= htmlspecialchars($item['nama_pasien'] ?? '-') ?></p>
                                    <p class="mt-1 text-sm text-slate-600"><?= htmlspecialchars($item['poli_tujuan'] ?? '-') ?> · <?= htmlspecialchars($item['nama_dokter'] ?? '-') ?></p>
                                </div>
                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold <?= $badgeClass ?>"><?= htmlspecialchars(ucfirst($status)) ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">
                        Belum ada data reservasi terbaru.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Pasien & Rekam Medis Terbaru</h2>
                    <p class="text-sm text-slate-500">Data operasional terbaru yang baru masuk ke sistem.</p>
                </div>
                <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-sky-700">Recent</span>
            </div>

            <div class="space-y-4">
                <div>
                    <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Pasien Baru</p>
                    <div class="space-y-2">
                        <?php if (!empty($recentPasien)): ?>
                            <?php foreach ($recentPasien as $pasien): ?>
                                <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="text-sm font-bold text-slate-900"><?= htmlspecialchars($pasien['nama'] ?? '-') ?></p>
                                            <p class="text-xs text-slate-500"><?= htmlspecialchars($pasien['no_rm'] ?? '-') ?> · <?= htmlspecialchars($pasien['jenis_kelamin'] ?? '-') ?> · <?= htmlspecialchars($pasien['golongan_darah'] ?? '-') ?></p>
                                        </div>
                                        <span class="text-xs text-slate-400"><?= htmlspecialchars($pasien['created_at'] ?? '-') ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-5 text-sm text-slate-500">Belum ada data pasien terbaru.</div>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Rekam Medis Terbaru</p>
                    <div class="space-y-2">
                        <?php if (!empty($recentRekamMedis)): ?>
                            <?php foreach ($recentRekamMedis as $rekamMedis): ?>
                                <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                    <p class="text-sm font-bold text-slate-900"><?= htmlspecialchars($rekamMedis['nama_pasien'] ?? '-') ?></p>
                                    <p class="text-xs text-slate-500"><?= htmlspecialchars($rekamMedis['diagnosa'] ?? '-') ?> · <?= htmlspecialchars($rekamMedis['tindakan'] ?? '-') ?></p>
                                    <p class="mt-1 text-xs text-slate-400"><?= htmlspecialchars($rekamMedis['tanggal_periksa'] ?? '-') ?> · <?= htmlspecialchars($rekamMedis['nama_dokter'] ?? '-') ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-5 text-sm text-slate-500">Belum ada data rekam medis terbaru.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-2">
        <div class="rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Stok Obat Rendah</h2>
                    <p class="text-sm text-slate-500">Daftar obat yang butuh perhatian segera.</p>
                </div>
                <span class="rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-orange-700">Alert</span>
            </div>
            <div class="space-y-2">
                <?php if (!empty($lowStockObat)): ?>
                    <?php foreach ($lowStockObat as $obat): ?>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="text-sm font-bold text-slate-900"><?= htmlspecialchars($obat['nama'] ?? '-') ?></p>
                                    <p class="text-xs text-slate-500"><?= htmlspecialchars($obat['kode_obat'] ?? '-') ?> · <?= htmlspecialchars($obat['kategori'] ?? '-') ?> · Rak <?= htmlspecialchars($obat['rak_penyimpanan'] ?? '-') ?></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-bold text-orange-700"><?= htmlspecialchars((string) ($obat['stok'] ?? 0)) ?></p>
                                    <p class="text-xs text-slate-400"><?= htmlspecialchars($obat['tanggal_expired'] ?? '-') ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-5 text-sm text-slate-500">Tidak ada obat stok rendah.</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Obat Mendekati Expired</h2>
                    <p class="text-sm text-slate-500">Inventory yang perlu dicek ulang segera.</p>
                </div>
                <span class="rounded-full bg-fuchsia-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-fuchsia-700">Expired</span>
            </div>
            <div class="space-y-2">
                <?php if (!empty($expiringObat)): ?>
                    <?php foreach ($expiringObat as $obat): ?>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="text-sm font-bold text-slate-900"><?= htmlspecialchars($obat['nama'] ?? '-') ?></p>
                                    <p class="text-xs text-slate-500"><?= htmlspecialchars($obat['kode_obat'] ?? '-') ?> · <?= htmlspecialchars($obat['kategori'] ?? '-') ?> · Rak <?= htmlspecialchars($obat['rak_penyimpanan'] ?? '-') ?></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-bold text-fuchsia-700"><?= htmlspecialchars($obat['tanggal_expired'] ?? '-') ?></p>
                                    <p class="text-xs text-slate-400">Stok <?= htmlspecialchars((string) ($obat['stok'] ?? 0)) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-5 text-sm text-slate-500">Tidak ada obat yang mendekati expired.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>
<script>
    (function() {
        if (typeof Chart === 'undefined') {
            return;
        }

        const reservasiTrendCanvas = document.getElementById('reservasiTrendChart');
        const pasienBaruCanvas = document.getElementById('pasienBaruChart');
        const statusReservasiCanvas = document.getElementById('statusReservasiChart');
        const spesialisasiCanvas = document.getElementById('spesialisasiChart');
        const genderCanvas = document.getElementById('genderChart');
        const golonganDarahCanvas = document.getElementById('golonganDarahChart');
        const reservasiPoliCanvas = document.getElementById('reservasiPoliChart');
        const kategoriObatCanvas = document.getElementById('kategoriObatChart');
        const stokObatCanvas = document.getElementById('stokObatChart');

        if (reservasiTrendCanvas) {
            new Chart(reservasiTrendCanvas, {
                type: 'line',
                data: {
                    labels: <?= $chartLabels7DaysJson ?: '[]' ?>,
                    datasets: [{
                        label: 'Reservasi',
                        data: <?= $chartValues7DaysJson ?: '[]' ?>,
                        borderColor: '#0891b2',
                        backgroundColor: 'rgba(8, 145, 178, 0.14)',
                        pointBackgroundColor: '#0f766e',
                        pointBorderColor: '#ffffff',
                        pointRadius: 4,
                        tension: 0.38,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            top: 8,
                            right: 8,
                            bottom: 8,
                            left: 8
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            titleColor: '#ffffff',
                            bodyColor: '#e2e8f0',
                            padding: 12,
                            cornerRadius: 12
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#64748b'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#64748b',
                                precision: 0
                            },
                            grid: {
                                color: 'rgba(148, 163, 184, 0.18)'
                            }
                        }
                    }
                }
            });
        }

        if (pasienBaruCanvas) {
            new Chart(pasienBaruCanvas, {
                type: 'line',
                data: {
                    labels: <?= $chartLabelsPasienBaruJson ?: '[]' ?>,
                    datasets: [{
                        label: 'Pasien Baru',
                        data: <?= $chartValuesPasienBaruJson ?: '[]' ?>,
                        borderColor: '#4f46e5',
                        backgroundColor: 'rgba(79, 70, 229, 0.12)',
                        pointBackgroundColor: '#4f46e5',
                        pointBorderColor: '#ffffff',
                        pointRadius: 4,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: 8
                    },
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { grid: { display: false }, ticks: { color: '#64748b' } },
                        y: { beginAtZero: true, ticks: { color: '#64748b', precision: 0 }, grid: { color: 'rgba(148, 163, 184, 0.18)' } }
                    }
                }
            });
        }

        if (statusReservasiCanvas) {
            new Chart(statusReservasiCanvas, {
                type: 'doughnut',
                data: {
                    labels: <?= $statusLabelsJson ?: '[]' ?>,
                    datasets: [{
                        data: <?= $statusValuesJson ?: '[]' ?>,
                        backgroundColor: ['#0ea5e9', '#f59e0b', '#10b981', '#ef4444', '#64748b'],
                        borderWidth: 0,
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '68%',
                    layout: {
                        padding: 8
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                pointStyle: 'circle',
                                color: '#475569',
                                padding: 16
                            }
                        }
                    }
                }
            });
        }

        if (spesialisasiCanvas) {
            new Chart(spesialisasiCanvas, {
                type: 'bar',
                data: {
                    labels: <?= $spesialisasiLabelsJson ?: '[]' ?>,
                    datasets: [{
                        label: 'Dokter',
                        data: <?= $spesialisasiValuesJson ?: '[]' ?>,
                        backgroundColor: ['#0369a1', '#0891b2', '#0f766e', '#14b8a6', '#38bdf8'],
                        borderRadius: 14,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: 8
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#64748b'
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#64748b',
                                precision: 0
                            },
                            grid: {
                                color: 'rgba(148, 163, 184, 0.18)'
                            }
                        }
                    }
                }
            });
        }

        if (genderCanvas) {
            new Chart(genderCanvas, {
                type: 'pie',
                data: {
                    labels: <?= $genderLabelsJson ?: '[]' ?>,
                    datasets: [{
                        data: <?= $genderValuesJson ?: '[]' ?>,
                        backgroundColor: ['#0ea5e9', '#f472b6', '#84cc16', '#f59e0b'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: 8
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { usePointStyle: true, pointStyle: 'circle', color: '#475569', padding: 16 }
                        }
                    }
                }
            });
        }

        if (golonganDarahCanvas) {
            new Chart(golonganDarahCanvas, {
                type: 'doughnut',
                data: {
                    labels: <?= $golonganDarahLabelsJson ?: '[]' ?>,
                    datasets: [{
                        data: <?= $golonganDarahValuesJson ?: '[]' ?>,
                        backgroundColor: ['#0284c7', '#ef4444', '#f59e0b', '#22c55e', '#8b5cf6', '#14b8a6', '#64748b'],
                        borderWidth: 0,
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '62%',
                    layout: {
                        padding: 8
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { usePointStyle: true, pointStyle: 'circle', color: '#475569', padding: 12 }
                        }
                    }
                }
            });
        }

        if (reservasiPoliCanvas) {
            new Chart(reservasiPoliCanvas, {
                type: 'bar',
                data: {
                    labels: <?= $reservasiPoliLabelsJson ?: '[]' ?>,
                    datasets: [{
                        label: 'Reservasi',
                        data: <?= $reservasiPoliValuesJson ?: '[]' ?>,
                        backgroundColor: '#0f766e',
                        borderRadius: 14,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    layout: {
                        padding: 8
                    },
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, ticks: { color: '#64748b', precision: 0 }, grid: { color: 'rgba(148, 163, 184, 0.18)' } },
                        y: { ticks: { color: '#64748b' }, grid: { display: false } }
                    }
                }
            });
        }

        if (kategoriObatCanvas) {
            new Chart(kategoriObatCanvas, {
                type: 'polarArea',
                data: {
                    labels: <?= $kategoriObatLabelsJson ?: '[]' ?>,
                    datasets: [{
                        data: <?= $kategoriObatValuesJson ?: '[]' ?>,
                        backgroundColor: ['rgba(14,165,233,0.8)', 'rgba(16,185,129,0.8)', 'rgba(245,158,11,0.8)', 'rgba(244,63,94,0.8)', 'rgba(139,92,246,0.8)', 'rgba(20,184,166,0.8)']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: 8
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { usePointStyle: true, pointStyle: 'circle', color: '#475569', padding: 12 }
                        }
                    },
                    scales: {
                        r: {
                            grid: { color: 'rgba(148, 163, 184, 0.18)' },
                            angleLines: { color: 'rgba(148, 163, 184, 0.18)' },
                            ticks: { color: '#94a3b8', backdropColor: 'transparent' }
                        }
                    }
                }
            });
        }

        if (stokObatCanvas) {
            new Chart(stokObatCanvas, {
                type: 'doughnut',
                data: {
                    labels: <?= $stokObatStatusLabelsJson ?: '[]' ?>,
                    datasets: [{
                        data: <?= $stokObatStatusValuesJson ?: '[]' ?>,
                        backgroundColor: ['#ef4444', '#f59e0b', '#22c55e'],
                        borderWidth: 0,
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '62%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { usePointStyle: true, pointStyle: 'circle', color: '#475569', padding: 12 }
                        }
                    }
                }
            });
        }
    })();
</script>