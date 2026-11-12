<!-- TAB 2: RIWAYAT & PENGAJUAN SAYA (BERDASARKAN ROLE ERD) -->
<section id="pane-pengajuan" class="profile-pane" style="display:none;">
  
  <!-- Virtual ID Card & Status Ringkasan -->
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:24px;">
    
    <!-- Panel Ringkasan Dokumen Aktif -->
    <div class="shell" style="padding:28px 24px;display:flex;flex-direction:column;justify-content:space-between;">
      <div style="display:flex;justify-content:space-between;align-items:flex-start;">
        <div>
          <span class="bdg" id="dash-badge-status">STATUS DOKUMEN</span>
          <h4 style="font:700 28px/1.2 var(--serif);color:var(--t900);margin-top:8px;" id="dash-active-count">1 Berkas Aktif</h4>
          <p style="font-size:13px;color:var(--muted);margin-top:4px;" id="dash-active-desc">Dokumen permohonan sedang dalam proses verifikasi tim KUI PNJ.</p>
        </div>
        <div style="width:48px;height:48px;background:var(--t100);display:grid;place-items:center;border:1.5px solid var(--t400);color:var(--t700);">
          <svg width="24" height="24" style="fill:none;stroke:currentColor;stroke-width:2"><use href="#i-docok"/></svg>
        </div>
      </div>
      <div style="margin-top:24px;">
        <a id="btn-buat-pengajuan" href="#outbound" data-go="outbound" class="btn main" style="width:100%;text-align:center;">
          + BUAT PENGAJUAN OUTBOUND
        </a>
      </div>
    </div>

    <!-- Virtual ID Card KUI PNJ -->
    <div class="kui-card">
      <div class="kui-card-top">
        <span class="kui-card-brand">I<b>/</b>O <span>PNJ IDENTITY</span></span>
        <span class="kui-card-badge" id="card-badge">MAHASISWA</span>
      </div>
      <div class="kui-card-mid">
        <p class="kui-card-label">Nama Pemegang / Cardholder</p>
        <p class="kui-card-name" id="card-name">ASNA QONITA</p>
      </div>
      <div class="kui-card-bot">
        <div>
          <p class="kui-card-label" id="card-id-label">ID / NIM</p>
          <p class="kui-card-id" id="card-id-val">2507411018</p>
        </div>
        <div class="kui-card-status">
          <svg width="12" height="12" style="fill:currentColor"><circle cx="6" cy="6" r="5"/></svg>
          <span id="card-status-text">ACTIVE</span>
        </div>
      </div>
    </div>

  </div>

  <!-- Daftar Riwayat Dokumen Sesuai Role ERD -->
  <div class="shell">
    <div class="sec">
      <span class="num">02</span>
      <h3 id="pane-history-title">Daftar Pengajuan Outbound Aktif</h3>
      <i class="dash"></i>
    </div>

    <!-- 1. Riwayat Mahasiswa (Outbound) -->
    <div id="history-items-mahasiswa" class="role-history-group">
      <div class="profile-sub-item">
        <div class="profile-sub-info">
          <div style="display:flex;gap:8px;align-items:center;">
            <span class="bdg" style="background:var(--y);color:var(--t900);">OUTBOUND</span>
            <span class="st g-proses" style="font-size:11.5px;">Sedang Dicek KUI</span>
          </div>
          <h4>Permohonan Rekomendasi Paspor &amp; Visa</h4>
          <p>Tujuan: Universiti Teknologi Malaysia (UTM) · Kategori: Student Mobility / IISMA · Tanggal Pengajuan: 10 Nov 2026</p>
        </div>
        <div style="display:flex;align-items:center;gap:12px;">
          <div style="text-align:right;">
            <span style="font-size:12px;color:var(--muted);display:block;">Progress</span>
            <b style="color:var(--t700);font-size:15px;">40%</b>
          </div>
          <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px;" onclick="toast('Membuka rincian pengajuan rekomendasi paspor...')">Lihat Detail</button>
        </div>
      </div>
    </div>

    <!-- 2. Riwayat Civitas (PDLN) -->
    <div id="history-items-civitas" class="role-history-group" style="display:none;">
      <div class="profile-sub-item">
        <div class="profile-sub-info">
          <div style="display:flex;gap:8px;align-items:center;">
            <span class="bdg" style="background:var(--t600);color:#fff;">PDLN</span>
            <span class="st g-disetujui" style="font-size:11.5px;">Surat SP Terbit</span>
          </div>
          <h4>Izin Setneg: Seminar Internasional IEEE ICEEE</h4>
          <p>Tujuan: Berlin, Jerman · Jenis: Konferensi Ilmiah · No. SP: 241/SP-PDLN/PNJ/2026 · Sumber Biaya: DIPA PNJ</p>
        </div>
        <div style="display:flex;align-items:center;gap:12px;">
          <div style="text-align:right;">
            <span style="font-size:12px;color:var(--muted);display:block;">Progress</span>
            <b style="color:var(--t700);font-size:15px;">100%</b>
          </div>
          <button type="button" class="btn main" style="padding:8px 16px;font-size:11.5px;" onclick="toast('Mengunduh Surat Persetujuan (SP) PDF...')">Unduh SP PDF</button>
        </div>
      </div>
    </div>

    <!-- 3. Riwayat Mahasiswa Luar (Inbound) -->
    <div id="history-items-eksternal" class="role-history-group" style="display:none;">
      <div class="profile-sub-item">
        <div class="profile-sub-info">
          <div style="display:flex;gap:8px;align-items:center;">
            <span class="bdg" style="background:var(--t400);color:var(--t900);">INBOUND</span>
            <span class="st g-proses" style="font-size:11.5px;">Awaiting LoA Signature</span>
          </div>
          <h4>Joint Research Collaboration Visit</h4>
          <p>Host Department: PNJ TIK · Home University: NIT Gunma College (Japan) · Ref: INB-2026-089</p>
        </div>
        <div style="display:flex;align-items:center;gap:12px;">
          <div style="text-align:right;">
            <span style="font-size:12px;color:var(--muted);display:block;">Progress</span>
            <b style="color:var(--t700);font-size:15px;">60%</b>
          </div>
          <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px;" onclick="toast('Opening Inbound application details...')">View Details</button>
        </div>
      </div>
    </div>

  </div>
</section>
