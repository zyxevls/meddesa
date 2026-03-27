<?php $formPasien = $pasien ?? []; ?>

<section class="mx-auto max-w-7xl space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-teal-600 via-cyan-700 to-blue-800 p-7 text-white shadow-xl">
        <div class="absolute -right-8 -top-8 h-36 w-36 rounded-full bg-white/15"></div>
        <div class="absolute -bottom-10 left-1/3 h-28 w-28 rounded-full bg-cyan-300/30"></div>
        <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-100">Detail Pasien</p>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">Berikut adalah detail data pasien di sistem pelayanan.</p>
            </div>
            <a href="/admin/pasien" class="inline-flex items-center gap-2 self-start rounded-xl border border-white/40 bg-white/15 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/25 md:self-auto">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[3fr_1fr]">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
            <form method="GET" action="/admin/pasien/<?= $formPasien['id'] ?? '' ?>/update" class="space-y-8">
                <div>
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-cyan-100 text-cyan-700"><i class="fas fa-id-card"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Identitas Utama</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div>
                            <label for="no_rm" class="mb-2 block text-sm font-semibold text-slate-700">No Rekam Medis</label>
                            <input id="no_rm" name="no_rm" type="text" value="<?= htmlspecialchars($formPasien['no_rm'] ?? '') ?>" readonly placeholder="Contoh: RM-2026-001" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="nik" class="mb-2 block text-sm font-semibold text-slate-700">NIK</label>
                            <input id="nik" name="nik" type="text" value="<?= htmlspecialchars($formPasien['nik'] ?? '') ?>" readonly placeholder="Contoh: 3201XXXXXXXXXXXX" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="no_bpjs" class="mb-2 block text-sm font-semibold text-slate-700">No BPJS</label>
                            <input id="no_bpjs" name="no_bpjs" type="text" value="<?= htmlspecialchars($formPasien['no_bpjs'] ?? '') ?>" readonly placeholder="Contoh: 0001234567890" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="nama" class="mb-2 block text-sm font-semibold text-slate-700">Nama Lengkap</label>
                            <input id="nama" name="nama" type="text" value="<?= htmlspecialchars($formPasien['nama'] ?? '') ?>" readonly placeholder="Contoh: Budi Santoso" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-700"><i class="fas fa-user"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Profil Pasien</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div>
                            <label for="tempat_lahir" class="mb-2 block text-sm font-semibold text-slate-700">Tempat Lahir</label>
                            <input id="tempat_lahir" name="tempat_lahir" type="text" value="<?= htmlspecialchars($formPasien['tempat_lahir'] ?? '') ?>" readonly placeholder="Contoh: Jakarta" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="mb-2 block text-sm font-semibold text-slate-700">Tanggal Lahir</label>
                            <input id="tanggal_lahir" name="tanggal_lahir" type="date" value="<?= htmlspecialchars($formPasien['tanggal_lahir'] ?? '') ?>" readonly class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="mb-2 block text-sm font-semibold text-slate-700">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" disabled class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?= ($formPasien['jenis_kelamin'] ?? '') === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= ($formPasien['jenis_kelamin'] ?? '') === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label for="golongan_darah" class="mb-2 block text-sm font-semibold text-slate-700">Golongan Darah</label>
                            <input id="golongan_darah" name="golongan_darah" type="text" value="<?= htmlspecialchars($formPasien['golongan_darah'] ?? '') ?>" readonly placeholder="Contoh: A / B / AB / O" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="alamat" class="mb-2 block text-sm font-semibold text-slate-700">Alamat</label>
                        <input id="alamat" name="alamat" type="text" value="<?= htmlspecialchars($formPasien['alamat'] ?? '') ?>" readonly placeholder="Contoh: Jl. Merdeka No. 123, RT 01/RW 02" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                    </div>
                </div>

                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-100 text-indigo-700"><i class="fas fa-file-medical"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Kontak dan Informasi</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div>
                            <label for="no_telephone" class="mb-2 block text-sm font-semibold text-slate-700">No Telephone</label>
                            <input id="no_telephone" name="no_telephone" type="text" value="<?= htmlspecialchars($formPasien['no_telephone'] ?? '') ?>" readonly placeholder="Contoh: 081234567890" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="pekerjaan" class="mb-2 block text-sm font-semibold text-slate-700">Pekerjaan</label>
                            <input id="pekerjaan" name="pekerjaan" type="text" value="<?= htmlspecialchars($formPasien['pekerjaan'] ?? '') ?>" readonly placeholder="Contoh: Petani" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="status_perkawinan" class="mb-2 block text-sm font-semibold text-slate-700">Status Perkawinan</label>
                            <input id="status_perkawinan" name="status_perkawinan" type="text" value="<?= htmlspecialchars($formPasien['status_perkawinan'] ?? '') ?>" readonly placeholder="Contoh: Menikah" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="no_kk" class="mb-2 block text-sm font-semibold text-slate-700">No. Kartu Keluarga</label>
                            <input id="no_kk" name="no_kk" type="text" value="<?= htmlspecialchars($formPasien['no_kk'] ?? '') ?>" readonly placeholder="Contoh: 3201XXXXXXXXXXXX" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                    </div>
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