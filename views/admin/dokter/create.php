<section class="mx-auto max-w-7xl space-y-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-teal-600 via-cyan-700 to-blue-800 p-7 text-white shadow-xl">
        <div class="absolute -right-8 -top-8 h-36 w-36 rounded-full bg-white/15"></div>
        <div class="absolute -bottom-10 left-1/3 h-28 w-28 rounded-full bg-cyan-300/30"></div>
        <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-100">Registrasi Dokter</p>
                <h1 class="mt-1 text-3xl font-bold leading-tight md:text-4xl">Tambah Data Dokter</h1>
                <p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">Lengkapi form berikut untuk menambahkan data dokter baru ke sistem MedDesa.</p>
            </div>
            <a href="/admin/dokter" class="inline-flex items-center gap-2 self-start rounded-xl border border-white/40 bg-white/15 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/25 md:self-auto">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[3fr_1fr]">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
            <form method="POST" action="/admin/dokter/store" enctype="multipart/form-data" class="space-y-8">
                <div>
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-cyan-100 text-cyan-700"><i class="fas fa-id-card"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Identitas Dokter</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-2">
                        <div>
                            <label for="nip" class="mb-2 block text-sm font-semibold text-slate-700">NIP</label>
                            <input id="nip" name="nip" type="text" required placeholder="Contoh: 198701012012121001" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="sip" class="mb-2 block text-sm font-semibold text-slate-700">Nomor SIP</label>
                            <input id="sip" name="sip" type="text" required placeholder="Contoh: 445/SIP-DOK/2026" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="nama_dokter" class="mb-2 block text-sm font-semibold text-slate-700">Nama Dokter</label>
                            <input id="nama_dokter" name="nama_dokter" type="text" required placeholder="Contoh: dr. Andi Saputra" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="spesialisasi" class="mb-2 block text-sm font-semibold text-slate-700">Spesialisasi</label>
                            <input id="spesialisasi" name="spesialisasi" type="text" required placeholder="Contoh: Dokter Umum" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-200 pt-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-700"><i class="fas fa-phone"></i></span>
                        <h2 class="text-lg font-semibold text-slate-800">Kontak & Status</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                        <div>
                            <label for="no_telp" class="mb-2 block text-sm font-semibold text-slate-700">No. Telepon</label>
                            <input id="no_telp" name="no_telp" type="text" required placeholder="Contoh: 081234567890" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                        </div>
                        <div>
                            <label for="images" class="mb-2 block text-sm font-semibold text-slate-700">Foto Dokter (Opsional)</label>
                            <input id="images" name="images" type="file" accept="image/png,image/jpeg,image/jpg,image/webp" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition file:mr-3 file:rounded-lg file:border-0 file:bg-cyan-100 file:px-3 file:py-1.5 file:font-semibold file:text-cyan-700 hover:file:bg-cyan-200 focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                            <p class="mt-1 text-xs text-slate-500">Format: JPG, PNG, WEBP. Maksimal 2MB. Gambar otomatis di-crop 1:1 dan dikompres.</p>
                            <div class="mt-3">
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Preview Foto</p>
                                <img
                                    id="images-preview"
                                    src=""
                                    alt="Preview foto dokter"
                                    class="mt-2 h-24 w-24 rounded-xl border border-slate-200 object-cover cursor-zoom-in hover:scale-105 transition-transform hidden"
                                    data-image-preview=""
                                    title="Klik untuk melihat ukuran penuh">
                            </div>
                        </div>
                        <div>
                            <label for="is_active" class="mb-2 block text-sm font-semibold text-slate-700">Status</label>
                            <select id="is_active" name="is_active" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-700 outline-none transition focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-cyan-100">
                                <option value="1" selected>Aktif</option>
                                <option value="0">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
                    <a href="/admin/dokter" class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
                    <button type="submit" class="inline-flex cursor-pointer items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-teal-600 to-blue-700 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-cyan-200 transition hover:-translate-y-0.5">
                        <i class="fas fa-save"></i>
                        Simpan Data Dokter
                    </button>
                </div>
            </form>
        </div>

        <aside class="space-y-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="text-base font-semibold text-slate-800">Panduan Input</h3>
                <div class="mt-4 rounded-xl bg-slate-50 p-4 text-sm text-slate-700">
                    <p class="font-semibold text-slate-800">Checklist:</p>
                    <ul class="mt-2 space-y-1">
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>NIP dan SIP valid.</span></li>
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Spesialisasi sesuai layanan.</span></li>
                        <li class="flex items-start gap-2"><i class="fas fa-check-circle mt-1 text-emerald-500"></i><span>Nomor telepon aktif.</span></li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
</section>

<script>
    (function() {
        const input = document.getElementById('images');
        const preview = document.getElementById('images-preview');

        if (!input || !preview) {
            return;
        }

        function showPreview(blob) {
            const objectUrl = URL.createObjectURL(blob);
            preview.src = objectUrl;
            preview.setAttribute('data-image-preview', objectUrl);
            preview.classList.remove('hidden');
        }

        function openModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');

            if (!modal || !modalImage || !imageSrc) {
                return;
            }

            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');

            if (!modal || !modalImage) {
                return;
            }

            modal.classList.add('hidden');
            modal.classList.remove('flex');
            modalImage.removeAttribute('src');
            document.body.style.overflow = '';
        }

        input.addEventListener('change', function() {
            const file = input.files && input.files[0] ? input.files[0] : null;
            if (!file) {
                preview.classList.add('hidden');
                preview.removeAttribute('src');
                preview.setAttribute('data-image-preview', '');
                return;
            }

            if (!file.type.startsWith('image/')) {
                return;
            }

            const image = new Image();
            const blobUrl = URL.createObjectURL(file);

            image.onload = function() {
                const side = Math.min(image.width, image.height);
                const sx = Math.floor((image.width - side) / 2);
                const sy = Math.floor((image.height - side) / 2);
                const canvas = document.createElement('canvas');
                canvas.width = 512;
                canvas.height = 512;

                const ctx = canvas.getContext('2d');
                ctx.drawImage(image, sx, sy, side, side, 0, 0, 512, 512);

                canvas.toBlob(function(blob) {
                    if (!blob) {
                        showPreview(file);
                        return;
                    }

                    const compressedFile = new File([blob], 'dokter_' + Date.now() + '.webp', {
                        type: 'image/webp',
                        lastModified: Date.now()
                    });

                    const dt = new DataTransfer();
                    dt.items.add(compressedFile);
                    input.files = dt.files;
                    showPreview(blob);
                }, 'image/webp', 0.8);
            };

            image.src = blobUrl;
        });

        preview.addEventListener('click', function() {
            if (preview.classList.contains('hidden')) {
                return;
            }

            const fullImageUrl = preview.getAttribute('data-image-preview') || preview.src;
            openModal(fullImageUrl);
        });

        document.addEventListener('click', function(event) {
            const target = event.target;
            if (!target) {
                return;
            }

            if (target.id === 'modalClose' || target.closest('#modalClose')) {
                closeModal();
                return;
            }

            if (target.id === 'imageModal') {
                closeModal();
            }
        });

        document.addEventListener('keydown', function(event) {
            const currentModal = document.getElementById('imageModal');
            if (event.key === 'Escape' && currentModal && !currentModal.classList.contains('hidden')) {
                closeModal();
            }
        });
    })();
</script>

<!-- Image Modal -->
<div id="imageModal" class="hidden fixed inset-0 z-[70] items-center justify-center bg-slate-900/75 backdrop-blur-sm">
    <div class="relative flex max-h-[85vh] max-w-[90vw] items-center justify-center">
        <button id="modalClose" class="absolute -top-10 right-0 text-white hover:text-slate-200 transition">
            <i class="fas fa-times text-2xl cursor-pointer"></i>
        </button>
        <img id="modalImage" src="" alt="Preview" class="max-h-[85vh] max-w-[90vw] rounded-xl object-contain">
    </div>
</div>