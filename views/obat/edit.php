<?php $formObat = $obat ?? $medicine ?? []; ?>

<section class="mx-auto max-w-3xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Inventori Obat</p>
            <h1 class="mt-1 text-3xl font-semibold text-slate-800">Edit Data Obat</h1>
            <p class="mt-2 text-sm text-slate-600">Perbarui informasi obat agar data inventori tetap akurat.</p>
        </div>
        <a href="/admin/obat" class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <form method="POST" action="/admin/obat/update/<?= (int) ($formObat['id'] ?? 0) ?>" class="space-y-5">
            <input type="hidden" name="id" value="<?= (int) ($formObat['id'] ?? 0) ?>">

            <div>
                <label for="nama" class="mb-2 block text-sm font-semibold text-slate-700">Nama Obat</label>
                <input id="nama" name="nama" type="text" required value="<?= htmlspecialchars($formObat['nama'] ?? '') ?>" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label for="stok" class="mb-2 block text-sm font-semibold text-slate-700">Stok</label>
                    <input id="stok" name="stok" type="number" min="0" required value="<?= (int) ($formObat['stok'] ?? 0) ?>" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">
                </div>
                <div>
                    <label for="harga" class="mb-2 block text-sm font-semibold text-slate-700">Harga (Rp)</label>
                    <input id="harga" name="harga" type="number" min="0" required value="<?= (int) ($formObat['harga'] ?? 0) ?>" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="/admin/obat" class="rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
                <button type="submit" class="rounded-xl bg-gradient-to-r from-cyan-600 to-blue-700 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-200 transition hover:-translate-y-0.5">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</section>