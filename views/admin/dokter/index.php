<?php
$dokterList = $dokters ?? [];
$totalDokter = count($dokterList);
$dokterAktif = count(array_filter($dokterList, static fn($item) => (int) ($item['is_active'] ?? 0) === 1));
$dokterNonAktif = $totalDokter - $dokterAktif;
$totalSpesialisasi = count(array_unique(array_filter(array_map(static fn($item) => trim((string) ($item['spesialisasi'] ?? '')), $dokterList))));
?>

<section class="space-y-6">
	<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-teal-600 via-cyan-700 to-blue-800 p-7 text-white shadow-xl">
		<div class="absolute -right-10 -top-10 h-44 w-44 rounded-full bg-white/10"></div>
		<div class="absolute -bottom-12 right-20 h-40 w-40 rounded-full bg-cyan-300/20"></div>
		<div class="relative flex flex-col gap-5 md:flex-row md:items-center md:justify-between">
			<div>
				<p class="mb-1 text-xs uppercase tracking-[0.3em] text-cyan-100">Manajemen SDM Medis</p>
				<h1 class="text-3xl font-semibold leading-tight md:text-4xl">Data Dokter</h1>
				<p class="mt-2 max-w-2xl text-sm text-blue-100 md:text-base">
					Kelola data dokter, status keaktifan, dan informasi spesialisasi untuk pelayanan klinik desa.
				</p>
			</div>
			<a href="/admin/dokter/create" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-blue-700 shadow-lg transition duration-300 hover:-translate-y-0.5 hover:bg-cyan-50">
				<i class="fas fa-plus"></i>
				Tambah Dokter
			</a>
		</div>
	</div>

	<div class="flex flex-wrap gap-4">
		<article class="flex flex-1 items-center gap-4 min-w-[180px] rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md">
			<div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
				<i class="fas fa-user-doctor"></i>
			</div>
			<div>
				<p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Total Dokter</p>
				<p class="text-xl font-bold text-slate-800"><?= number_format($totalDokter, 0, ',', '.') ?></p>
			</div>
		</article>

		<article class="flex flex-1 items-center gap-4 min-w-[180px] rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 shadow-sm transition hover:shadow-md">
			<div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
				<i class="fas fa-circle-check"></i>
			</div>
			<div>
				<p class="text-[10px] font-bold uppercase tracking-wider text-emerald-600">Aktif</p>
				<p class="text-xl font-bold text-emerald-700"><?= number_format($dokterAktif, 0, ',', '.') ?></p>
			</div>
		</article>

		<article class="flex flex-1 items-center gap-4 min-w-[180px] rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md">
			<div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
				<i class="fas fa-stethoscope"></i>
			</div>
			<div>
				<p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Spesialisasi</p>
				<p class="text-xl font-bold text-slate-800"><?= number_format($totalSpesialisasi, 0, ',', '.') ?></p>
			</div>
		</article>

		<article class="flex flex-1 items-center gap-4 min-w-[180px] rounded-2xl border border-rose-100 bg-rose-50/40 p-4 shadow-sm transition hover:shadow-md">
			<div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-rose-100 text-rose-600">
				<i class="fas fa-user-slash"></i>
			</div>
			<div>
				<p class="text-[10px] font-bold uppercase tracking-wider text-rose-500">Non Aktif</p>
				<p class="text-xl font-bold text-rose-700"><?= number_format($dokterNonAktif, 0, ',', '.') ?></p>
			</div>
		</article>
	</div>

	<div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
		<div class="mb-4 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
			<h2 class="text-lg font-semibold text-slate-800">Daftar Dokter</h2>
			<div class="relative w-full md:w-80">
				<i class="fas fa-search pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
				<input id="dokter-search" type="text" placeholder="Cari NIP, nama, SIP, atau spesialisasi..." class="w-full rounded-xl border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">
			</div>
		</div>

		<div class="overflow-hidden rounded-xl border border-slate-200">
			<div class="overflow-x-auto">
				<table class="min-w-full text-sm">
					<thead class="bg-slate-100 text-slate-700">
						<tr>
							<th class="px-4 py-3 text-left font-semibold">No</th>
							<th class="px-4 py-3 text-left font-semibold">NIP</th>
							<th class="px-4 py-3 text-left font-semibold">Nama Dokter</th>
							<th class="px-4 py-3 text-left font-semibold">SIP</th>
							<th class="px-4 py-3 text-left font-semibold">Spesialisasi</th>
							<th class="px-4 py-3 text-left font-semibold">No. Telp</th>
							<th class="px-4 py-3 text-left font-semibold">Status</th>
							<th class="px-4 py-3 text-center font-semibold">Aksi</th>
						</tr>
					</thead>
					<tbody id="dokter-table-body" class="divide-y divide-slate-200 bg-white text-slate-700">
						<?php if (empty($dokterList)): ?>
							<tr>
								<td colspan="8" class="px-4 py-8 text-center text-slate-500">Belum ada data dokter.</td>
							</tr>
						<?php endif; ?>

						<?php foreach ($dokterList as $index => $item): ?>
							<tr class="transition hover:bg-blue-50/40">
								<td class="px-4 py-3 font-medium text-slate-800"><?= $index + 1 ?></td>
								<td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars($item['nip'] ?? '-') ?></td>
								<td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars($item['nama_dokter'] ?? '-') ?></td>
								<td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars($item['sip'] ?? '-') ?></td>
								<td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars($item['spesialisasi'] ?? '-') ?></td>
								<td class="px-4 py-3 font-medium text-slate-800"><?= htmlspecialchars($item['no_telp'] ?? '-') ?></td>
								<td class="px-4 py-3">
									<?php if ((int) ($item['is_active'] ?? 0) === 1): ?>
										<span class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-medium text-emerald-700">
											<i class="fas fa-check mr-1"></i> Aktif
										</span>
									<?php else: ?>
										<span class="inline-flex items-center rounded-full bg-rose-100 px-2.5 py-0.5 text-xs font-medium text-rose-700">
											<i class="fas fa-times mr-1"></i> Non Aktif
										</span>
									<?php endif; ?>
								</td>
								<td class="px-4 py-3">
									<div class="flex items-center justify-center gap-2">
										<a href="/admin/dokter/detail/<?= $item['id'] ?>" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-teal-200 bg-teal-50 text-teal-600 transition hover:bg-teal-100" title="Detail">
											<i class="fas fa-eye text-xs"></i>
										</a>
										<a href="/admin/dokter/edit/<?= $item['id'] ?>" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-blue-200 bg-blue-50 text-blue-600 transition hover:bg-blue-100" title="Edit">
											<i class="fas fa-pen text-xs"></i>
										</a>
										<a href="/admin/dokter/delete/<?= $item['id'] ?>" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100 handle-swal" title="Hapus">
											<i class="fas fa-trash text-xs"></i>
										</a>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
	(function() {
		const searchInput = document.getElementById('dokter-search');
		const tableBody = document.getElementById('dokter-table-body');

		if (!searchInput || !tableBody) {
			return;
		}

		document.querySelectorAll('.handle-swal').forEach(function(button) {
			button.addEventListener('click', function(event) {
				event.preventDefault();
				const url = this.getAttribute('href');

				Swal.fire({
					title: 'Konfirmasi Hapus',
					text: 'Apakah Anda yakin ingin menghapus data dokter ini?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya, hapus!',
					cancelButtonText: 'Batal'
				}).then(function(result) {
					if (result.isConfirmed) {
						window.location.href = url;
					}
				});
			});
		});

		searchInput.addEventListener('input', function() {
			const keyword = this.value.trim().toLowerCase();
			const rows = tableBody.querySelectorAll('tr');

			rows.forEach(function(row) {
				const cells = row.querySelectorAll('td');
				if (!cells.length) {
					return;
				}

				const searchText = [
					cells[1]?.textContent || '',
					cells[2]?.textContent || '',
					cells[3]?.textContent || '',
					cells[4]?.textContent || '',
					cells[5]?.textContent || ''
				].join(' ').toLowerCase();

				row.style.display = searchText.includes(keyword) ? '' : 'none';
			});
		});
	})();
</script>
