<section class="mx-auto max-w-7xl space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-teal-600 via-cyan-700 to-blue-800 p-7 text-white shadow-xl">
        <div class="absolute -right-8 -top-8 h-36 w-36 rounded-full bg-white/15"></div>
        <div class="absolute -bottom-10 left-1/3 h-28 w-28 rounded-full bg-cyan-300/30"></div>
        <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-100">Tambah Reservasi</p>
                <h1 class="mt-1 text-3xl font-bold leading-tight md:text-4xl">Tambah Data Reservasi Baru</h1>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">Isi formulir berikut untuk menambahkan reservasi ke sistem pelayanan klinik.</p>
            </div>
            <a href="/admin/reservasi" class="inline-flex items-center gap-2 self-start rounded-xl border border-white/40 bg-white/15 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/25 md:self-auto">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[3fr_1fr]">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
            <form method="POST" action="/admin/reservasi/store" class="space-y-8">
                <div>
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-cyan-100 text-cyan-700"><i class="fas fa-id-card"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Identitas Utama</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div class="relative">
                            <label for="pasien_search" class="mb-2 block text-sm font-semibold text-slate-700">Pilih Pasien (No. RM / Nama)</label>
                            <div class="relative group">
                                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none group-focus-within:text-cyan-500 transition-colors"></i>
                                <input id="pasien_search" type="text" autocomplete="off" placeholder="Ketik No. RM atau Nama Pasien..." class="w-full rounded-xl border border-slate-300 bg-slate-50 pl-11 pr-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                                <input type="hidden" name="pasien_id" id="pasien_id_hidden" required>
                            </div>

                            <!-- Results Dropdown -->
                            <div id="pasien_results" class="absolute z-50 mt-2 w-full max-h-60 overflow-y-auto rounded-xl border border-slate-200 bg-white p-2 shadow-xl hidden">
                                <?php foreach ($pasiens as $pasien): ?>
                                    <div class="pasien-item group flex cursor-pointer items-center justify-between rounded-lg px-4 py-2.5 transition hover:bg-cyan-50" data-id="<?= $pasien['id'] ?>" data-text="<?= htmlspecialchars($pasien['no_rm'] . ' - ' . $pasien['nama']) ?>">
                                        <div>
                                            <p class="text-sm font-semibold text-slate-800"><?= htmlspecialchars($pasien['nama']) ?></p>
                                            <p class="text-xs text-slate-500"><?= htmlspecialchars($pasien['no_rm']) ?></p>
                                        </div>
                                        <i class="fas fa-plus text-[10px] text-cyan-500 opacity-0 transition group-hover:opacity-100"></i>
                                    </div>
                                <?php endforeach; ?>
                                <div id="no_results" class="px-4 py-3 text-center text-sm text-slate-500 hidden">
                                    Pasien tidak ditemukan.
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="nomor_antrean" class="mb-2 block text-sm font-semibold text-slate-700">Nomor Antrean</label>
                            <input id="nomor_antrean" name="nomor_antrean" type="text" required placeholder="Masukan Nomor Antrean" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="poli_tujuan" class="mb-2 block text-sm font-semibold text-slate-700">Poli Tujuan</label>
                            <select id="poli_tujuan" name="poli_tujuan" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                                <option value="">Pilih Poli Tujuan</option>
                                <option value="Poli Umum">Poli Umum</option>
                                <option value="Poli Gigi">Poli Gigi</option>
                                <option value="Poli KIA">Poli KIA</option>
                                <option value="Poli Lansia">Poli Lansia</option>
                                <option value="IGD">IGD</option>
                            </select>
                        </div>
                        <div>
                            <label for="tanggal_reservasi" class="mb-2 block text-sm font-semibold text-slate-700">Tanggal Reservasi</label>
                            <input id="tanggal_reservasi" name="tanggal_reservasi" type="date" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                    </div>
                </div>

                <div class="border-t b  order-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-700"><i class="fas fa-user"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Status Reservasi</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-4">
                        <div class="col-span-3">
                            <label for="keluhan" class="mb-2 block text-sm font-semibold text-slate-700">Keluhan</label>
                            <textarea id="keluhan" name="keluhan" type="text" required placeholder="Masukan Keluhan Pasien" rows="5" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100"></textarea>
                        </div>
                        <div>
                            <label for="status" class="mb-2 block text-sm font-semibold text-slate-700">Status Reservasi</label>
                            <select id="status" name="status" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                                <option value="">Pilih Status</option>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Diperiksa">Diperiksa</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Batal">Batal</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
                    <a href="/admin/reservasi" class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-teal-600 to-blue-700 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-cyan-200 transition hover:-translate-y-0.5 cursor-pointer">
                        <i class="fas fa-save"></i>
                        Simpan Reservasi
                    </button>
                </div>
            </form>
        </div>

        <aside class="space-y-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="text-base font-semibold text-slate-800">Panduan Singkat</h3>
                <p class="mt-2 text-sm text-slate-600">Pastikan NIK, BPJS, dan nomor rekam medis sudah benar untuk mencegah duplikasi data.</p>
                <div class="mt-4 rounded-xl bg-slate-50 p-4 text-sm text-slate-700">
                    <p class="font-semibold text-slate-800">Checklist:</p>
                    <ul class="mt-2 space-y-1">
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Isi semua field wajib.</span></li>
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Nomor telepon aktif.</span></li>
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Alamat ditulis lengkap.</span></li>
                    </ul>
                </div>
            </div>

            <div class="rounded-2xl border border-cyan-200 bg-gradient-to-br from-cyan-50 to-blue-50 p-5 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wider text-cyan-800">Tips Input Cepat</p>
                <p class="mt-2 text-sm text-slate-700">Gunakan format konsisten untuk memudahkan pencarian data pasien di halaman index.</p>
            </div>
        </aside>
    </div>
</section>

<script>
    $(document).ready(function() {
        const $searchInput = $('#pasien_search');
        const $resultsDropdown = $('#pasien_results');
        const $hiddenInput = $('#pasien_id_hidden');
        const $pasienItems = $('.pasien-item');
        const $noResults = $('#no_results');

        // Show/Filter results on input
        $searchInput.on('focus input', function() {
            const searchTerm = $(this).val().toLowerCase();
            let visibleCount = 0;

            $pasienItems.each(function() {
                const text = $(this).data('text').toLowerCase();
                if (text.includes(searchTerm)) {
                    $(this).removeClass('hidden');
                    visibleCount++;
                } else {
                    $(this).addClass('hidden');
                }
            });

            if (visibleCount === 0) {
                $noResults.removeClass('hidden');
            } else {
                $noResults.addClass('hidden');
            }

            $resultsDropdown.removeClass('hidden');
        });

        // Handle item selection
        $pasienItems.on('click', function() {
            const id = $(this).data('id');
            const displayText = $(this).data('text');

            $searchInput.val(displayText);
            $hiddenInput.val(id);
            $resultsDropdown.addClass('hidden');
            
            // Visual feedback
            $searchInput.addClass('border-cyan-500 bg-white ring-2 ring-cyan-100');
            setTimeout(() => {
                $searchInput.removeClass('ring-2 ring-cyan-100');
            }, 1000);
        });

        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.relative').length) {
                $resultsDropdown.addClass('hidden');
            }
        });

        // Prevent form submission if no patient selected
        $('form').on('submit', function(e) {
            if (!$hiddenInput.val()) {
                e.preventDefault();
                $searchInput.focus().addClass('border-red-500 ring-2 ring-red-100');
                Swal.fire({
                    icon: 'error',
                    title: 'Pasien Belum Dipilih',
                    text: 'Silakan cari dan pilih pasien dari daftar yang tersedia.',
                    confirmButtonColor: '#0891b2'
                });
            }
        });
    });
</script>