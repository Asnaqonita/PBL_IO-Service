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
<!-- 6. TAB FAQ (FITUR KELOLA PERTANYAAN UMUM & JAWABAN)                   -->
<!-- ===================================================================== -->
<section class="page" id="tab-faq">
  <div class="wrap">
    <div class="crumb"><a href="#" onclick="switchTab('dashboard'); return false;">Beranda</a> / <b>FAQ</b></div>
    <div class="fhead">
      <div>
        <h2 class="ftitle">Kelola<em>FAQ &amp; Template</em></h2>
        <p class="fsub">Kelola daftar tanya jawab yang tampil pada halaman landing page user.</p>
      </div>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(340px,1fr));gap:28px;align-items:start">
      <div>
        <h3 style="font:700 22px var(--serif);color:var(--t800);margin-bottom:16px">Daftar FAQ Tampil di Beranda</h3>
        <div id="faqList">
          <details class="qa" open>
            <summary>
              <span><b style="color:var(--t500);margin-right:8px">01</b> Bagaimana cara mengajukan dokumen Outbound?</span>
              <button type="button" onclick="this.closest('.qa').remove(); toast('FAQ dihapus', true);" style="background:none;border:none;color:var(--red);font-size:11px;font-weight:700;cursor:pointer;text-transform:uppercase">Hapus</button>
            </summary>
            <p>Masuk ke akun Anda, lengkapi profil, lalu pilih menu Outbound dan unggah dokumen syarat dalam format PDF.</p>
          </details>

          <details class="qa">
            <summary>
              <span><b style="color:var(--t500);margin-right:8px">02</b> Berapa lama proses verifikasi berkas di KUI?</span>
              <button type="button" onclick="this.closest('.qa').remove(); toast('FAQ dihapus', true);" style="background:none;border:none;color:var(--red);font-size:11px;font-weight:700;cursor:pointer;text-transform:uppercase">Hapus</button>
            </summary>
            <p>Verifikasi memakan waktu 3–5 hari kerja. Anda akan mendapat notifikasi saat surat siap diambil di loket.</p>
          </details>
        </div>
      </div>

      <div class="shell">
        <h3 style="font:700 24px var(--serif);color:var(--t900);margin-bottom:4px">Tambah FAQ Baru</h3>
        <p style="font-size:13.5px;color:var(--muted);margin-bottom:20px">Pertanyaan yang ditambahkan akan langsung tersimpan dan aktif.</p>
        <form onsubmit="handleFaqSubmit(event)">
          <div class="f">
            <label>Kategori Layanan</label>
            <select id="faqKat" required>
              <option value="Outbound">Outbound</option>
              <option value="Inbound">Inbound</option>
              <option value="PDLN">PDLN</option>
              <option value="Umum">Umum &amp; Akun</option>
            </select>
          </div>
          <div class="f">
            <label>Pertanyaan</label>
            <input type="text" id="faqQ" placeholder="Tuliskan pertanyaan baru..." required>
          </div>
          <div class="f">
            <label>Jawaban Lengkap</label>
            <textarea id="faqA" placeholder="Tuliskan jawaban penjelasan..." required></textarea>
          </div>
          <button type="submit" class="btn main" style="width:100%;margin-top:10px">Simpan FAQ Baru</button>
        </form>
      </div>
    </div>
  </div>
</section>
