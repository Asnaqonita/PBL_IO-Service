<?php
if (!defined('BASE_URL')) {
    $configFile = __DIR__ . '/../../config/config.php';
    if (file_exists($configFile)) {
        require_once $configFile;
    } else {
        define('BASE_URL', '/IO_Service/');
    }
}
?>
<!-- ===================================================================== -->
<!-- MODAL PERIKSA BERKAS & VERIFIKASI DOKUMEN                             -->
<!-- ===================================================================== -->
<div class="modal" id="checkModal" onclick="if(event.target === this) closeCheckModal();">
  <div class="mbox">
    <button type="button" class="x" onclick="closeCheckModal()" aria-label="Tutup">✕</button>
    <h3 id="mdl-title">Periksa Pengajuan</h3>
    <p style="font-size:13.5px;color:var(--muted);margin-bottom:16px">Verifikasi dokumen lampiran dan perbarui tahap proses pemohon.</p>

    <div class="sum">
      <div><span>Nama Pemohon:</span><b id="mdl-name">Asna Qonita</b></div>
      <div><span>Kategori / Profil:</span><b id="mdl-role" style="color:var(--t600)">Mahasiswa PNJ</b></div>
      <div><span>Negara Tujuan:</span><b id="mdl-country">Malaysia</b></div>
    </div>

    <div style="margin-bottom:18px">
      <label style="font:600 12px var(--sans);letter-spacing:.05em;text-transform:uppercase;color:var(--t800);display:block;margin-bottom:8px">
        Dokumen yang Diunggah Pemohon:
      </label>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;font-size:13px">
        <div style="padding:10px 12px;border:1.5px solid var(--t200);background:var(--t50);display:flex;justify-content:space-between;align-items:center">
          <span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap">1. Identitas_KTM.pdf</span>
          <a href="#" onclick="alert('Membuka preview dokumen KTM...'); return false;" style="color:var(--t600);font-weight:700;margin-left:8px">Lihat</a>
        </div>
        <div style="padding:10px 12px;border:1.5px solid var(--t200);background:var(--t50);display:flex;justify-content:space-between;align-items:center">
          <span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap">2. Berkas_Syarat.pdf</span>
          <a href="#" onclick="alert('Membuka preview berkas syarat...'); return false;" style="color:var(--t600);font-weight:700;margin-left:8px">Lihat</a>
        </div>
      </div>
    </div>

    <form onsubmit="handleCheckModalSubmit(event)">
      <div class="f">
        <label>Ubah Status / Alur Pengajuan</label>
        <select required>
          <option value="01">01. Isi Form (Baru Masuk)</option>
          <option value="02" selected>02. Verifikasi Berkas (Sedang Dicek)</option>
          <option value="rev">! Minta Perbaikan Dokumen Pemohon</option>
          <option value="03">03. Proses Dokumen &amp; Penandatanganan</option>
          <option value="04">04. Dokumen Selesai &amp; Siap Diambil di Loket</option>
        </select>
      </div>
      <div class="f">
        <label>Unggah Surat Selesai (Format PDF jika ada)</label>
        <input type="file" accept=".pdf">
      </div>
      <div class="f">
        <label>Catatan Petugas (Tampil di Notifikasi Akun User)</label>
        <textarea placeholder="Contoh: Berkas telah lengkap. Silakan pantau status pengambilan fisik."></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:20px;padding-top:16px;border-top:1px dashed var(--t300)">
        <button type="button" class="btn ghost" onclick="closeCheckModal()">Batal</button>
        <button type="submit" class="btn main">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>
