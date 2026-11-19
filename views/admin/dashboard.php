<?php
// Pastikan BASE_URL sudah siap dipakai sebelum merender tampilan beranda utama dashboard admin
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
<!-- 1. DASHBOARD / BERANDA ADMIN                                          -->
<!-- ===================================================================== -->
<section class="page active" id="tab-dashboard">
  <!-- HERO WELCOME -->
  <div class="hero">
    <div class="hero-l">
      <h1>Welcome</h1>
      <p class="lead">Satu pintu untuk urusan perjalanan dan kunjungan lintas negara civitas Politeknik Negeri Jakarta. Ajukan, pantau, dan ambil dokumen tanpa antre.</p>
      <button type="button" class="btn slate" id="heroLogin" onclick="toggleDrawer(true)">MENU ADMIN</button>
    </div>
    <div class="hero-r">
      <div class="band">
        <!-- GALERI GESER -->
        <div class="track" id="galTrack">
          <figure class="slide" tabindex="0">
            <div class="pic p1" data-slot="1" style="--img:url('<?php echo BASE_URL; ?>assets/images/opening_confe.jpeg')"></div>
            <figcaption><b>Grand Opening</b><span>Pembukaan program kerja sama dengan mitra internasional.</span></figcaption>
          </figure>
          <figure class="slide" tabindex="0">
            <div class="pic p2" data-slot="2" style="--img:url('<?php echo BASE_URL; ?>assets/images/green_camp.jpeg')"></div>
            <figcaption><b>Summer Camp</b><span>Pertukaran pelajar dalam program Green Summer Camp 2026.</span></figcaption>
          </figure>
          <figure class="slide" tabindex="0">
            <div class="pic p3" data-slot="3" style="--img:url('<?php echo BASE_URL; ?>assets/images/tech_pro.jpeg')"></div>
            <figcaption><b>Future Tech Seminar</b><span>Seminar teknologi masa depan dengan berbagai tamu luar dan dalam negeri.</span></figcaption>
          </figure>
          <figure class="slide" tabindex="0">
            <div class="pic p4" data-slot="4" style="--img:url('<?php echo BASE_URL; ?>assets/images/international_cs.jpeg')"></div>
            <figcaption><b>International Students</b><span>Kerja sama dengan perguruan tinggi global rumpun TIK.</span></figcaption>
          </figure>
          <figure class="slide" tabindex="0">
            <div class="pic p5" data-slot="5" style="--img:url('<?php echo BASE_URL; ?>assets/images/gse.jpeg')"></div>
            <figcaption><b>Space Exhibition</b><span>Pameran dan klub penelitian luar angkasa global.</span></figcaption>
          </figure>
        </div>
      </div>
      <div class="gctl">
        <button type="button" id="galPrev" aria-label="Previous"><svg width="14" height="14" viewBox="0 0 14 14"><path d="M9 2L4 7l5 5" fill="none" stroke="currentColor" stroke-width="2"/></svg></button>
        <button type="button" id="galNext" aria-label="Next"><svg width="14" height="14" viewBox="0 0 14 14"><path d="M5 2l5 5-5 5" fill="none" stroke="currentColor" stroke-width="2"/></svg></button>
        <span class="cnt" id="galCnt">01 / 05</span>
        <i class="bar"></i>
      </div>
    </div>
  </div>

  <!-- TICKER -->
  <div class="ticker" aria-hidden="true">
    <div class="tk" id="tk"></div>
  </div>

  <!-- LAYANAN SECTION -->
  <div class="svc">
    <h2 class="sec-title">Layanan</h2>
    <div class="cards">
      <button type="button" class="card" onclick="switchTab('outbound')">
        <div style="display:flex;justify-content:space-between;align-items:flex-start">
          <span class="big">01</span>
          <span class="bdg">5 Baru</span>
        </div>
        <h3>Outbound</h3>
        <p>Civitas PNJ mengurus dokumen yang butuh izin negara: paspor, visa, dan surat izin keluar negeri.</p>
        <span class="go">CEK OUTBOUND</span>
      </button>
      <button type="button" class="card y" onclick="switchTab('inbound')">
        <div style="display:flex;justify-content:space-between;align-items:flex-start">
          <span class="big">02</span>
          <span class="bdg" style="background:var(--t300)">3 Baru</span>
        </div>
        <h3>Inbound</h3>
        <p>Pihak eksternal dan luar negeri mengajukan kunjungan, kolaborasi, atau kegiatan di PNJ.</p>
        <span class="go">CEK INBOUND</span>
      </button>
      <button type="button" class="card" onclick="switchTab('pdln')">
        <div style="display:flex;justify-content:space-between;align-items:flex-start">
          <span class="big">03</span>
          <span class="bdg">2 Baru</span>
        </div>
        <h3>PDLN</h3>
        <p>Pengajuan Perjalanan Dinas Luar Negeri untuk seminar, studi banding, pelatihan, dan riset.</p>
        <span class="go">CEK PDLN</span>
      </button>
    </div>

    <!-- KPI STATS -->
    <div class="kpis">
      <div class="kpi">
        <span class="k-l">Total Pengajuan Masuk</span>
        <b class="k-v">12</b>
        <span class="k-s">Semester berjalan</span>
      </div>
      <div class="kpi">
        <span class="k-l">Perlu Dicek Admin</span>
        <b class="k-v" style="color:#C48400">5</b>
        <span class="k-s" style="color:#92400E">Menunggu verifikasi berkas</span>
      </div>
      <div class="kpi">
        <span class="k-l">Surat Selesai &amp; Siap Diambil</span>
        <b class="k-v" style="color:var(--t600)">4</b>
        <span class="k-s" style="color:var(--t700)">Tersedia PDF &amp; fisik di loket</span>
      </div>
    </div>

    <!-- 3 VISUAL PANELS -->
    <div class="panels">
      <!-- Status Donut -->
      <section class="panel">
        <h3>Status Pengajuan</h3>
        <div class="donut">
          <svg viewBox="0 0 200 200" role="group">
            <circle class="ring" cx="100" cy="100" r="70" />
            <circle class="arc" cx="100" cy="100" r="70" stroke="var(--t600)" stroke-dasharray="146 294" stroke-dashoffset="0" />
            <circle class="arc" cx="100" cy="100" r="70" stroke="var(--y)" stroke-dasharray="183 257" stroke-dashoffset="-146" />
            <circle class="arc" cx="100" cy="100" r="70" stroke="var(--t300)" stroke-dasharray="73 367" stroke-dashoffset="-329" />
            <circle class="arc" cx="100" cy="100" r="70" stroke="var(--red)" stroke-dasharray="38 402" stroke-dashoffset="-402" />
            <text class="dn" x="100" y="106">12</text>
            <text class="dl" x="100" y="126">BERKAS</text>
          </svg>
        </div>
        <ul class="lg">
          <li class="lgr"><i style="background:var(--t600)"></i><span>Selesai / Terbit</span><b>4</b><em>33%</em></li>
          <li class="lgr"><i style="background:var(--y)"></i><span>Sedang Dicek</span><b>5</b><em>42%</em></li>
          <li class="lgr"><i style="background:var(--t300)"></i><span>Proses TTD</span><b>2</b><em>17%</em></li>
          <li class="lgr"><i style="background:var(--red)"></i><span>Perlu Revisi</span><b>1</b><em>8%</em></li>
        </ul>
      </section>

      <!-- Rincian Layanan -->
      <section class="panel">
        <h3>Rincian per Layanan &amp; Akun</h3>
        <ul class="rank">
          <li class="rk">
            <span class="rk-n">01</span>
            <div style="flex:1">
              <span class="rk-name">Outbound (Paspor/Visa/Izin)</span>
              <div class="rk-bar">
                <i style="width:75%;background:var(--t600)"></i>
                <b>5</b>
              </div>
            </div>
          </li>
          <li class="rk">
            <span class="rk-n">02</span>
            <div style="flex:1">
              <span class="rk-name">Inbound (Tamu &amp; Delegasi)</span>
              <div class="rk-bar">
                <i style="width:45%;background:var(--t400)"></i>
                <b>3</b>
              </div>
            </div>
          </li>
          <li class="rk">
            <span class="rk-n">03</span>
            <div style="flex:1">
              <span class="rk-name">PDLN (Dosen &amp; Tendik)</span>
              <div class="rk-bar">
                <i style="width:60%;background:var(--y)"></i>
                <b>4</b>
              </div>
            </div>
          </li>
        </ul>
        <div style="margin-top:18px;padding-top:14px;border-top:1px dashed var(--t300);font-size:13.5px;color:var(--muted)">
          <b style="display:block;margin-bottom:6px;color:var(--t800);text-transform:uppercase;font-size:11px;letter-spacing:.08em">Terdaftar di Database:</b>
          <div style="display:flex;justify-content:space-between;padding:3px 0"><span>Mahasiswa PNJ:</span><b style="color:var(--t900)">180 Akun</b></div>
          <div style="display:flex;justify-content:space-between;padding:3px 0"><span>Sivitas Dosen/Tendik:</span><b style="color:var(--t900)">42 Akun</b></div>
          <div style="display:flex;justify-content:space-between;padding:3px 0"><span>Pihak Eksternal/Luar:</span><b style="color:var(--t900)">26 Akun</b></div>
        </div>
      </section>

      <!-- Pengajuan Terbaru Highlight -->
      <section class="panel">
        <h3>Pengajuan Terbaru</h3>
        <div class="hl">
          <span class="hl-m"><svg width="15" height="15"><use href="#i-hourglass"/></svg> Menunggu Dicek</span>
          <b class="hl-n">5 Berkas</b>
          <span class="hl-c">Segera periksa kelengkapan lampiran pemohon</span>
        </div>
        <div class="nw">
          <span class="st g-proses" style="font-size:11px;padding:2px 7px">● BARU MASUK</span>
          <b>Asna Qonita (Outbound)</b>
          <p><svg width="15" height="15"><use href="#i-globe"/></svg> Rekomendasi Paspor &amp; Visa • Malaysia</p>
          <button type="button" onclick="openCheckModal('Asna Qonita', 'Mahasiswa PNJ (NIM: 2507411018)', 'Outbound', 'Surat Rekomendasi Paspor &amp; Visa', 'Malaysia')" class="btn main" style="margin-top:12px;width:100%;font-size:11.5px;padding:9px 16px">
            Periksa Sekarang &rarr;
          </button>
        </div>
      </section>
    </div>

    <!-- SHORTCUTS -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:16px;margin-bottom:60px">
      <div onclick="switchTab('loket')" style="background:#fff;border:1.5px solid var(--t200);padding:18px 22px;display:flex;align-items:center;justify-content:space-between;cursor:pointer;transition:.25s" onmouseover="this.style.borderColor='var(--t600)';this.style.boxShadow='4px 4px 0 var(--t200)'" onmouseout="this.style.borderColor='var(--t200)';this.style.boxShadow='none'">
        <div style="display:flex;align-items:center;gap:14px">
          <span style="width:32px;height:32px;background:var(--t600);color:#fff;display:grid;place-items:center;font-weight:700">&gt;</span>
          <div>
            <h4 style="font:700 17px var(--serif);color:var(--t800)">Loket Pengambilan Surat Fisik</h4>
            <span style="font-size:13px;color:var(--muted)">4 Surat selesai siap diambil pemohon</span>
          </div>
        </div>
        <span class="btn ghost" style="padding:6px 14px;font-size:11px">Buka &rarr;</span>
      </div>

      <div onclick="switchTab('faq')" style="background:#fff;border:1.5px solid var(--t200);padding:18px 22px;display:flex;align-items:center;justify-content:space-between;cursor:pointer;transition:.25s" onmouseover="this.style.borderColor='var(--t600)';this.style.boxShadow='4px 4px 0 var(--t200)'" onmouseout="this.style.borderColor='var(--t200)';this.style.boxShadow='none'">
        <div style="display:flex;align-items:center;gap:14px">
          <span style="width:32px;height:32px;background:var(--t600);color:#fff;display:grid;place-items:center;font-weight:700">&gt;</span>
          <div>
            <h4 style="font:700 17px var(--serif);color:var(--t800)">Kelola Pertanyaan Umum (FAQ)</h4>
            <span style="font-size:13px;color:var(--muted)">Atur FAQ dan pertanyaan di landing page user</span>
          </div>
        </div>
        <span class="btn ghost" style="padding:6px 14px;font-size:11px">Buka &rarr;</span>
      </div>
    </div>
  </div>
</section>
