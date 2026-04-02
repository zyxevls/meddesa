<?php $formDokter = $dokter ?? []; ?>

<section class="mx-auto max-w-7xl space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-teal-600 via-cyan-700 to-blue-800 p-7 text-white shadow-xl">
        <div class="absolute -right-8 -top-8 h-36 w-36 rounded-full bg-white/15"></div>
        <div class="absolute -bottom-10 left-1/3 h-28 w-28 rounded-full bg-cyan-300/30"></div>
        <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-100">Registrasi Dokter</p>
                <h1 class="mt-1 text-3xl font-bold leading-tight md:text-4xl">Detail Data Dokter</h1>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">Informasi lengkap dokter dan data praktik.</p>
            </div>
            <div class="flex gap-2 self-start md:self-auto">
                <a href="/admin/dokter/edit/<?= $formDokter['id'] ?? '' ?>" class="inline-flex items-center gap-2 rounded-xl border border-white/40 bg-white/15 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/25">
                    <i class="fas fa-pen"></i>
                    Edit
                </a>
                <a href="/admin/dokter" class="inline-flex items-center gap-2 rounded-xl border border-white/40 bg-white/15 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/25">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[3fr_1fr]">
        <div class="space-y-6">
            <?php if (!empty($formDokter['images'])): ?>
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                    <div class="flex items-start gap-6">
                        <img
                            src="<?= htmlspecialchars($formDokter['images']) ?>"
                            alt="Foto <?= htmlspecialchars($formDokter['nama_dokter'] ?? '') ?>"
                            class="h-32 w-32 rounded-2xl border border-slate-200 object-cover cursor-zoom-in hover:scale-105 transition-transform"
                            data-image-preview="<?= htmlspecialchars($formDokter['images']) ?>"
                            title="Klik untuk melihat ukuran penuh">
                        <div class="flex-1">
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-600">Profil Dokter</p>
                            <h2 class="mt-2 text-2xl font-bold text-slate-800"><?= htmlspecialchars($formDokter['nama_dokter'] ?? '-') ?></h2>
                            <p class="mt-1 text-base font-semibold text-slate-600"><?= htmlspecialchars($formDokter['spesialisasi'] ?? '-') ?></p>
                            <p class="mt-3 text-xs text-slate-500">Klik foto untuk melihat ukuran penuh</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                <div>
                    <div class="mb-6 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-cyan-100 text-cyan-700"><i class="fas fa-id-card"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Identitas Dokter</h2>
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">NIP</p>
                            <p class="mt-2 text-lg font-semibold text-slate-800"><?= htmlspecialchars($formDokter['nip'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Nomor SIP</p>
                            <p class="mt-2 text-lg font-semibold text-slate-800"><?= htmlspecialchars($formDokter['sip'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Nama Dokter</p>
                            <p class="mt-2 text-lg font-semibold text-slate-800"><?= htmlspecialchars($formDokter['nama_dokter'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Spesialisasi</p>
                            <p class="mt-2 text-lg font-semibold text-slate-800"><?= htmlspecialchars($formDokter['spesialisasi'] ?? '-') ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                <div>
                    <div class="mb-6 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-700"><i class="fas fa-phone"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Kontak & Status</h2>
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">No. Telepon</p>
                            <p class="mt-2 text-lg font-semibold text-slate-800">
                                <a href="tel:<?= htmlspecialchars($formDokter['no_telp'] ?? '') ?>" class="text-blue-600 hover:underline">
                                    <?= htmlspecialchars($formDokter['no_telp'] ?? '-') ?>
                                </a>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Status</p>
                            <p class="mt-2">
                                <?php if ((int) ($formDokter['is_active'] ?? 0) === 1): ?>
                                    <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-3 py-1.5 text-sm font-semibold text-emerald-700"><i class="fas fa-check-circle"></i>Aktif</span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-2 rounded-full bg-rose-100 px-3 py-1.5 text-sm font-semibold text-rose-700"><i class="fas fa-circle-xmark"></i>Non Aktif</span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <aside class="space-y-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="text-base font-semibold text-slate-800">Ringkasan</h3>
                <div class="mt-4 rounded-xl bg-slate-50 p-4 text-sm text-slate-700 space-y-3">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-600">Nama</p>
                        <p class="mt-1 font-semibold text-slate-800"><?= htmlspecialchars($formDokter['nama_dokter'] ?? '-') ?></p>
                    </div>
                    <div class="border-t border-slate-200 pt-3">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-600">Spesialisasi</p>
                        <p class="mt-1 font-semibold text-slate-800"><?= htmlspecialchars($formDokter['spesialisasi'] ?? '-') ?></p>
                    </div>
                    <div class="border-t border-slate-200 pt-3">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-600">Status</p>
                        <p class="mt-1">
                            <?= ((int) ($formDokter['is_active'] ?? 0) === 1) ? '<span class="font-semibold text-emerald-600">Aktif</span>' : '<span class="font-semibold text-rose-600">Non Aktif</span>' ?>
                        </p>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</section>

<!-- Image Modal -->
<div id="imageModal" class="hidden fixed inset-0 z-[70] items-center justify-center bg-slate-900/75 backdrop-blur-sm">
    <div class="relative flex max-h-[85vh] max-w-[90vw] items-center justify-center">
        <button id="modalClose" class="absolute -top-10 right-0 text-white hover:text-slate-200 transition">
            <i class="fas fa-times text-2xl cursor-pointer"></i>
        </button>
        <img id="modalImage" src="" alt="Preview" class="max-h-[85vh] max-w-[90vw] rounded-xl object-contain">
    </div>
</div>

<script>
    (function() {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const closeButton = document.getElementById('modalClose');
        const previewTrigger = document.querySelector('[data-image-preview]');

        if (!modal || !previewTrigger) return;

        function openModal(imageSrc) {
            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        previewTrigger.addEventListener('click', function() {
            openModal(previewTrigger.getAttribute('data-image-preview'));
        });

        closeButton.addEventListener('click', closeModal);

        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    })();
</script>