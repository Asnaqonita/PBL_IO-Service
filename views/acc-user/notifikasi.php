<!-- TAB 3: PUSAT NOTIFIKASI (BERDASARKAN ROLE ERD) -->
<section id="pane-notifikasi" class="profile-pane" style="display:none;">
  <div class="shell">
    <div class="sec">
      <span class="num">03</span>
      <h3>Pemberitahuan Sistem &amp; Progres Berkas</h3>
      <i class="dash"></i>
    </div>

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">
      <span style="font-size:13px;color:var(--muted);font-weight:600;">Menampilkan notifikasi terbaru terkait verifikasi berkas:</span>
      <button type="button" class="btn ghost" style="padding:6px 14px;font-size:11px;" onclick="toast('Semua notifikasi telah ditandai sudah dibaca.')">Tandai Semua Dibaca</button>
    </div>

    <!-- 1. Notifikasi Mahasiswa (Outbound) -->
    <div id="notif-items-mahasiswa" class="role-notif-group">
      <div class="profile-notif-item unread">
        <span class="profile-notif-dot"></span>
        <div style="flex:1;">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px;">
            <b style="font-size:14.5px;color:var(--t900);">Verifikasi Berkas Outbound Sedang Berjalan</b>
            <span style="font-size:11.5px;color:var(--muted);">Hari ini, 10:45 WIB</span>
          </div>
          <p style="font-size:13px;color:var(--muted);margin:0;">Dokumen permohonan rekomendasi paspor &amp; visa Anda telah diterima dan saat ini sedang dalam proses review oleh validator KUI.</p>
        </div>
      </div>

      <div class="profile-notif-item unread">
        <span class="profile-notif-dot"></span>
        <div style="flex:1;">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px;">
            <b style="font-size:14.5px;color:var(--t900);">Surat Rekomendasi Jurusan Divalidasi</b>
            <span style="font-size:11.5px;color:var(--muted);">Kemarin, 14:20 WIB</span>
          </div>
          <p style="font-size:13px;color:var(--muted);margin:0;">Surat persetujuan jurusan dan tanda tangan kaprodi telah diverifikasi keabsahannya untuk program mobilitas mahasiswa.</p>
        </div>
      </div>

      <div class="profile-notif-item">
        <div style="width:9px;height:9px;margin-top:6px;flex-shrink:0;"></div>
        <div style="flex:1;">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px;">
            <b style="font-size:14.5px;color:var(--t900);">Pengingat Kelengkapan Berkas Outbound</b>
            <span style="font-size:11.5px;color:var(--muted);">3 Hari yang lalu</span>
          </div>
          <p style="font-size:13px;color:var(--muted);margin:0;">Pastikan seluruh file persyaratan (transkrip, paspor, surat izin ortu) diunggah dalam format PDF yang jelas dan berukuran maksimal 5 MB.</p>
        </div>
      </div>
    </div>

    <!-- 2. Notifikasi Civitas (PDLN) -->
    <div id="notif-items-civitas" class="role-notif-group" style="display:none;">
      <div class="profile-notif-item unread">
        <span class="profile-notif-dot"></span>
        <div style="flex:1;">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px;">
            <b style="font-size:14.5px;color:var(--t900);">Surat Persetujuan (SP) Setneg Telah Terbit</b>
            <span style="font-size:11.5px;color:var(--muted);">Hari ini, 09:15 WIB</span>
          </div>
          <p style="font-size:13px;color:var(--muted);margin:0;">Surat persetujuan izin perjalanan dinas luar negeri dari Kemensetneg telah selesai diproses. Silakan unduh dokumen PDF pada menu Riwayat PDLN.</p>
        </div>
      </div>

      <div class="profile-notif-item unread">
        <span class="profile-notif-dot"></span>
        <div style="flex:1;">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px;">
            <b style="font-size:14.5px;color:var(--t900);">Validasi Dokumen TOR &amp; Undangan Resmi Selesai</b>
            <span style="font-size:11.5px;color:var(--muted);">2 Hari yang lalu</span>
          </div>
          <p style="font-size:13px;color:var(--muted);margin:0;">Berkas TOR dan surat undangan seminar IEEE telah disetujui pimpinan dan diteruskan ke Biro Kerja Sama Kemendikbudristek.</p>
        </div>
      </div>
    </div>

    <!-- 3. Notifikasi Mahasiswa Luar (Inbound) -->
    <div id="notif-items-eksternal" class="role-notif-group" style="display:none;">
      <div class="profile-notif-item unread">
        <span class="profile-notif-dot"></span>
        <div style="flex:1;">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px;">
            <b style="font-size:14.5px;color:var(--t900);">Letter of Acceptance (LoA) Under Review</b>
            <span style="font-size:11.5px;color:var(--muted);">Today, 11:30 WIB</span>
          </div>
          <p style="font-size:13px;color:var(--muted);margin:0;">Your inbound research visit request has been approved by the department. Formal Letter of Acceptance is currently being signed by the Director.</p>
        </div>
      </div>

      <div class="profile-notif-item unread">
        <span class="profile-notif-dot"></span>
        <div style="flex:1;">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px;">
            <b style="font-size:14.5px;color:var(--t900);">Passport Verification Completed</b>
            <span style="font-size:11.5px;color:var(--muted);">Yesterday, 16:00 WIB</span>
          </div>
          <p style="font-size:13px;color:var(--muted);margin:0;">Passport scan document has met all validity standards for foreign student visa clearance in Indonesia.</p>
        </div>
      </div>
    </div>

  </div>
</section>
