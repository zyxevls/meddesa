<?php $formReservasi = $reservasi ?? []; ?>

<section class="mx-auto max-w-7xl space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-teal-600 via-cyan-700 to-blue-800 p-7 text-white shadow-xl">
        <div class="absolute -right-8 -top-8 h-36 w-36 rounded-full bg-white/15"></div>
        <div class="absolute -bottom-10 left-1/3 h-28 w-28 rounded-full bg-cyan-300/30"></div>
        <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-100">Edit Reservasi</p>
                <h1 class="mt-1 text-3xl font-bold leading-tight md:text-4xl">Edit Data Reservasi</h1>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">Gunakan formulir ini untuk melakukan pembaruan data reservasi yang valid ke sistem.</p>
            </div>
            <a href="/admin/reservasi" class="inline-flex items-center gap-2 self-start rounded-xl border border-white/40 bg-white/15 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/25 md:self-auto">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[3fr_1fr]">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
            <form method="POST" action="/admin/reservasi/update/<?= $formReservasi['id'] ?? '' ?>" class="space-y-8">
                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                    <div class="relative searchable-select" data-required-message="Pasien Belum Dipilih|Silakan cari dan pilih pasien dari daftar yang tersedia.">
                        <label for="pasien_search" class="mb-2 block text-sm font-semibold text-slate-700">Pilih Pasien (No. RM / Nama)</label>
                        <div class="relative group">
                            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none group-focus-within:text-cyan-500 transition-colors"></i>
                            <input id="pasien_search" data-role="search-input" type="text" autocomplete="off" placeholder="Ketik No. RM atau Nama Pasien..."
                                value="<?= htmlspecialchars(($formReservasi['no_rm'] ?? '') . ' - ' . ($formReservasi['nama'] ?? '')) ?>"
                                class="w-full rounded-xl border border-slate-300 bg-slate-50 pl-11 pr-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                            <input type="hidden" name="pasien_id" id="pasien_id_hidden" data-role="hidden-input" value="<?= htmlspecialchars($formReservasi['pasien_id'] ?? '') ?>" required>
                        </div>

                        <div id="pasien_results" data-role="result-dropdown" class="absolute z-50 mt-2 w-full max-h-60 overflow-y-auto rounded-xl border border-slate-200 bg-white p-2 shadow-xl hidden">
                            <?php foreach ($pasiens as $pasien): ?>
                                <div class="result-item group flex cursor-pointer items-center justify-between rounded-lg px-4 py-2.5 transition hover:bg-cyan-50" data-id="<?= $pasien['id'] ?>" data-text="<?= htmlspecialchars($pasien['no_rm'] . ' - ' . $pasien['nama']) ?>">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800"><?= htmlspecialchars($pasien['nama']) ?></p>
                                        <p class="text-xs text-slate-500"><?= htmlspecialchars($pasien['no_rm']) ?></p>
                                    </div>
                                    <i class="fas fa-plus text-[10px] text-cyan-500 opacity-0 transition group-hover:opacity-100"></i>
                                </div>
                            <?php endforeach; ?>
                            <div data-role="no-results" class="px-4 py-3 text-center text-sm text-slate-500 hidden">
                                Pasien tidak ditemukan.
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="nomor_antrean" class="mb-2 block text-sm font-semibold text-slate-700">Nomor Antrean</label>
                        <input id="nomor_antrean" name="nomor_antrean" type="text" value="<?= htmlspecialchars($formReservasi['nomor_antrean'] ?? '') ?>" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                    </div>
                    <div class="relative searchable-select" data-required-message="Dokter Belum Dipilih|Silakan cari dan pilih dokter dari daftar yang tersedia.">
                        <label for="dokter_search" class="mb-2 block text-sm font-semibold text-slate-700">Pilih Dokter (Nama)</label>
                        <div class="relative group">
                            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none group-focus-within:text-cyan-500 transition-colors"></i>
                            <input id="dokter_search" data-role="search-input" type="text" autocomplete="off" placeholder="Ketik Nama Dokter..."
                                value="<?= htmlspecialchars($formReservasi['nama_dokter'] ?? '') ?>"
                                class="w-full rounded-xl border border-slate-300 bg-slate-50 pl-11 pr-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                            <input type="hidden" name="dokter_id" id="dokter_id_hidden" data-role="hidden-input" value="<?= htmlspecialchars($formReservasi['dokter_id'] ?? '') ?>" required>
                        </div>
                        <div id="dokter_result_dropdown" data-role="result-dropdown" class="absolute z-50 mt-2 w-full max-h-60 overflow-y-auto rounded-xl border border-slate-200 bg-white p-2 shadow-xl hidden">
                            <?php foreach ($dokters as $dokter): ?>
                                <div class="result-item group flex cursor-pointer items-center justify-between rounded-lg px-4 py-2.5 transition hover:bg-cyan-50" data-id="<?= $dokter['id'] ?>" data-text="<?= htmlspecialchars($dokter['nama_dokter']) ?>">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800"><?= htmlspecialchars($dokter['nama_dokter']) ?></p>
                                        <p class="text-xs text-slate-500"><?= htmlspecialchars($dokter['spesialisasi']) ?></p>
                                    </div>
                                    <i class="fas fa-plus text-[10px] text-cyan-500 opacity-0 transition group-hover:opacity-100"></i>
                                </div>
                            <?php endforeach; ?>
                            <div data-role="no-results" class="px-4 py-3 text-center text-sm text-slate-500 hidden">
                                Dokter tidak ditemukan.
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="poli_tujuan" class="mb-2 block text-sm font-semibold text-slate-700">Poli Tujuan</label>
                        <select id="poli_tujuan" name="poli_tujuan" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                            <option value="">Pilih Poli Tujuan</option>
                            <option value="Poli Umum" <?= ($formReservasi['poli_tujuan'] ?? '') === 'Poli Umum' ? 'selected' : '' ?>>Poli Umum</option>
                            <option value="Poli Gigi" <?= ($formReservasi['poli_tujuan'] ?? '') === 'Poli Gigi' ? 'selected' : '' ?>>Poli Gigi</option>
                            <option value="Poli KIA" <?= ($formReservasi['poli_tujuan'] ?? '') === 'Poli KIA' ? 'selected' : '' ?>>Poli KIA</option>
                            <option value="Poli Lansia" <?= ($formReservasi['poli_tujuan'] ?? '') === 'Poli Lansia' ? 'selected' : '' ?>>Poli Lansia</option>
                            <option value="IGD" <?= ($formReservasi['poli_tujuan'] ?? '') === 'IGD' ? 'selected' : '' ?>>IGD</option>
                        </select>
                    </div>
                </div>

                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-700"><i class="fas fa-user"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Status Reservasi</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-4">
                        <div class="col-span-3">
                            <label for="keluhan" class="mb-2 block text-sm font-semibold text-slate-700">Keluhan</label>
                            <textarea id="keluhan" name="keluhan" type="text" rows="5" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100"><?= htmlspecialchars($formReservasi['keluhan'] ?? '') ?></textarea>
                        </div>
                        <div class="grid-flow-row space-y-3">
                            <div>
                                <label for="status" class="mb-2 block text-sm font-semibold text-slate-700">Status Reservasi</label>
                                <select id="status" name="status" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                                    <option value="">Pilih Status</option>
                                    <option value="Menunggu" <?= ($formReservasi['status'] ?? '') === 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                                    <option value="Diperiksa" <?= ($formReservasi['status'] ?? '') === 'Diperiksa' ? 'selected' : '' ?>>Diperiksa</option>
                                    <option value="Selesai" <?= ($formReservasi['status'] ?? '') === 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                    <option value="Batal" <?= ($formReservasi['status'] ?? '') === 'Batal' ? 'selected' : '' ?>>Batal</option>
                                </select>
                            </div>
                            <div>
                                <label for="tanggal_reservasi" class="mb-2 block text-sm font-semibold text-slate-700">Tanggal Reservasi</label>
                                <input id="tanggal_reservasi" name="tanggal_reservasi" type="date" value="<?= htmlspecialchars($formReservasi['tanggal_reservasi'] ?? '') ?>" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
                    <a href="/admin/reservasi" class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-teal-600 to-blue-700 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-cyan-100 transition hover:-translate-y-0.5 cursor-pointer">
                        <i class="fas fa-save"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <aside class="space-y-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="text-base font-semibold text-slate-800">Panduan Edit</h3>
                <p class="mt-2 text-sm text-slate-600">Pastikan NIK, BPJS, dan nomor rekam medis sudah benar untuk mencegah duplikasi data.</p>
                <div class="mt-4 rounded-xl bg-slate-50 p-4 text-sm text-slate-700">
                    <p class="font-semibold text-slate-800">Checklist:</p>
                    <ul class="mt-2 space-y-1">
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Cek validitas NIK/BPJS.</span></li>
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Update nomor telepon aktif.</span></li>
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Verifikasi alamat terbaru.</span></li>
                    </ul>
                </div>
            </div>

            <div class="rounded-2xl border border-cyan-200 bg-gradient-to-br from-cyan-50 to-blue-50 p-5 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wider text-cyan-800">Pembaruan Sistem</p>
                <p class="mt-2 text-sm text-slate-700">Setiap perubahan data pasien akan tercatat di log aktivitas sistem MedDesa.</p>
            </div>
        </aside>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.searchable-select').each(function() {
            const $container = $(this);
            const $searchInput = $container.find('[data-role="search-input"]');
            const $resultsDropdown = $container.find('[data-role="result-dropdown"]');
            const $hiddenInput = $container.find('[data-role="hidden-input"]');
            const $resultItems = $container.find('.result-item');
            const $noResults = $container.find('[data-role="no-results"]');

            $searchInput.on('focus input', function() {
                const searchTerm = String($(this).val() || '').toLowerCase().trim();
                let visibleCount = 0;

                $resultItems.each(function() {
                    const text = String($(this).data('text') || '').toLowerCase();
                    if (text.includes(searchTerm)) {
                        $(this).removeClass('hidden');
                        visibleCount++;
                    } else {
                        $(this).addClass('hidden');
                    }
                });

                $noResults.toggleClass('hidden', visibleCount > 0);
                $resultsDropdown.removeClass('hidden');
            });

            $resultItems.on('click', function() {
                const id = $(this).data('id');
                const displayText = $(this).data('text');

                $searchInput.val(displayText);
                $hiddenInput.val(id);
                $resultsDropdown.addClass('hidden');

                $searchInput.removeClass('border-red-500 ring-2 ring-red-100');
                $searchInput.addClass('border-cyan-500 bg-white ring-2 ring-cyan-100');

                setTimeout(() => {
                    $searchInput.removeClass('ring-2 ring-cyan-100');
                }, 1000);
            });
        });

        // Close all dropdowns when clicking outside selectable containers
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.searchable-select').length) {
                $('.searchable-select [data-role="result-dropdown"]').addClass('hidden');
            }
        });

        // Prevent form submission if any searchable required option not selected
        $('form').on('submit', function(e) {
            let invalidSelect = null;

            $('.searchable-select').each(function() {
                const $container = $(this);
                const $hiddenInput = $container.find('[data-role="hidden-input"]');
                const $searchInput = $container.find('[data-role="search-input"]');

                if ($hiddenInput.prop('required') && !$hiddenInput.val()) {
                    invalidSelect = {
                        container: $container,
                        input: $searchInput,
                    };
                    return false;
                }

                return true;
            });

            if (invalidSelect) {
                e.preventDefault();

                const msgData = String(invalidSelect.container.data('required-message') || 'Data Belum Dipilih|Silakan pilih data dari daftar yang tersedia.').split('|');
                const title = msgData[0] || 'Data Belum Dipilih';
                const text = msgData[1] || 'Silakan pilih data dari daftar yang tersedia.';

                invalidSelect.input.focus().addClass('border-red-500 ring-2 ring-red-100');

                Swal.fire({
                    icon: 'error',
                    title,
                    text,
                    confirmButtonColor: '#0891b2'
                });
            }
        });
    });
</script>
