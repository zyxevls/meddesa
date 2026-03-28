<section class="mx-auto max-w-7xl space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-teal-600 via-cyan-700 to-blue-800 p-7 text-white shadow-xl">
        <div class="absolute -right-8 -top-8 h-36 w-36 rounded-full bg-white/15"></div>
        <div class="absolute -bottom-10 left-1/3 h-28 w-28 rounded-full bg-cyan-300/30"></div>
        <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-100">Tambahkan Obat</p>
                <h1 class="mt-1 text-3xl font-bold leading-tight md:text-4xl">Tambah Data Obat Baru</h1>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">Isi formulir berikut untuk menambahkan obat ke sistem pelayanan klinik.</p>
            </div>
            <a href="/admin/obat" class="inline-flex items-center gap-2 self-start rounded-xl border border-white/40 bg-white/15 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/25 md:self-auto">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[3fr_1fr]">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
            <form method="POST" action="/admin/obat/store" class="space-y-8">
                <div>
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-cyan-100 text-cyan-700"><i class="fas fa-id-card"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Identitas Obat</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                        <div>
                            <label for="kode_obat" class="mb-2 block text-sm font-semibold text-slate-700">Kode Obat</label>
                            <input id="kode_obat" name="kode_obat" type="text" required placeholder="Masukan kode obat" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="nama" class="mb-2 block text-sm font-semibold text-slate-700">Nama Obat</label>
                            <input id="nama" name="nama" type="text" required placeholder="Masukan nama obat" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="kategori" class="mb-2 block text-sm font-semibold text-slate-700">Kategori</label>
                            <select id="kategori" name="kategori" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                                <option value="">Pilih Kategori</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Kapsul">Kapsul</option>
                                <option value="Sirup">Sirup</option>
                                <option value="Injeksi">Injeksi</option>
                                <option value="Salep">Salep</option>
                                <option value="Alkes">Alat Kesehatan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-700"><i class="fas fa-user"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Informasi Obat</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div>
                            <label for="stok" class="mb-2 block text-sm font-semibold text-slate-700">Stok</label>
                            <input id="stok" name="stok" type="text" required placeholder="Masukan jumlah stok" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="harga" class="mb-2 block text-sm font-semibold text-slate-700">Harga</label>
                            <input id="harga" name="harga" type="text" required placeholder="Masukan harga obat" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="tanggal_expired" class="mb-2 block text-sm font-semibold text-slate-700">Tanggal Expired</label>
                            <input id="tanggal_expired" name="tanggal_expired" type="date" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="rak_penyimpanan" class="mb-2 block text-sm font-semibold text-slate-700">Rak Penyimpanan</label>
                            <input id="rak_penyimpanan" name="rak_penyimpanan" type="text" required placeholder="Masukan nomor rak" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
                    <a href="/admin/obat" class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-teal-600 to-blue-700 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-cyan-200 transition hover:-translate-y-0.5 cursor-pointer">
                        <i class="fas fa-save"></i>
                        Simpan Data Obat
                    </button>
                </div>
            </form>
        </div>

        <aside class="space-y-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="text-base font-semibold text-slate-800">Panduan Sinkronisasi</h3>
                <p class="mt-2 text-sm text-slate-600">Pastikan Kode Obat dan Nama Obat sudah sesuai dengan standar farmasi klinik.</p>
                <div class="mt-4 rounded-xl bg-slate-50 p-4 text-sm text-slate-700">
                    <p class="font-semibold text-slate-800">Checklist:</p>
                    <ul class="mt-2 space-y-1">
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Gunakan kode unik untuk tiap obat.</span></li>
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Cek kembali tanggal kadaluarsa.</span></li>
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Pastikan stok awal bernilai positif.</span></li>
                    </ul>
                </div>
            </div>

            <div class="rounded-2xl border border-cyan-200 bg-gradient-to-br from-cyan-50 to-blue-50 p-5 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wider text-cyan-800">Tips Inventori</p>
                <p class="mt-2 text-sm text-slate-700">Gunakan kategori dan rak yang tepat untuk memudahkan tim medis dalam pengambilan obat.</p>
            </div>
        </aside>
    </div>
</section>