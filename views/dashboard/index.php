<section class="page active" id="page-home">
  <div class="hero">
    <div class="hero-l">
      <h1>Welcome</h1>
      <p class="lead" data-i18n="h_lead">Satu pintu untuk urusan perjalanan dan kunjungan lintas negara civitas Politeknik Negeri Jakarta. Ajukan, pantau, dan ambil dokumen tanpa antre.</p>
      <button type="button" class="btn slate" id="heroLogin">LOGIN</button>
    </div>
    <div class="hero-r">
      <div class="band">
        <!-- GALERI -->
        <div class="track" id="galTrack">
          <figure class="slide" tabindex="0">
            <div class="pic p1" data-slot="1" style="--img:url('images/opening_confe.jpeg')"></div>
            <figcaption><b data-i18n="g1t">Grand Opening</b><span data-i18n="g1d">Pembukaan program kerja sama dengan mitra internasional.</span></figcaption>
          </figure>
          <figure class="slide" tabindex="0">
            <div class="pic p2" data-slot="2" style="--img:url('images/green_camp.jpeg')"></div>
            <figcaption><b data-i18n="g2t">Summer Camp</b><span data-i18n="g2d">Pertukaran pelajar dalam program Green Summer Camp 2026.</span></figcaption>
          </figure>
          <figure class="slide" tabindex="0">
            <div class="pic p3" data-slot="3" style="--img:url('images/tech_pro.jpeg')"></div>
            <figcaption><b data-i18n="g3t">Future Tech Seminar</b><span data-i18n="g3d">Seminar teknologi masa depan dengan berbagai tamu luar dan dalam negeri.</span></figcaption>
          </figure>
          <figure class="slide" tabindex="0">
            <div class="pic p4" data-slot="4" style="--img:url('images/international_cs.jpeg')"></div>
            <figcaption><b data-i18n="g4t">International Computer Students</b><span data-i18n="g4d">Kerja sama dengan perguruan tinggi global rumpun TIK.</span></figcaption>
          </figure>
          <figure class="slide" tabindex="0">
            <div class="pic p5" data-slot="5" style="--img:url('images/gse.jpeg')"></div>
            <figcaption><b data-i18n="g5t">Space Exhibition</b><span data-i18n="g5d">Pameran dan klub penelitian luar angkasa global.</span></figcaption>
          </figure>
        </div>
      </div>
      <div class="gctl">
        <button type="button" id="galPrev" aria-label="Previous"><svg width="14" height="14" viewBox="0 0 14 14"><path d="M9 2L4 7l5 5" fill="none" stroke="currentColor" stroke-width="2"/></svg></button>
        <button type="button" id="galNext" aria-label="Next"><svg width="14" height="14" viewBox="0 0 14 14"><path d="M5 2l5 5-5 5" fill="none" stroke="currentColor" stroke-width="2"/></svg></button>
        <span class="cnt" id="galCnt">01 / 05</span><i class="bar"></i>
      </div>
    </div>
  </div>
  <div class="ticker" aria-hidden="true"><div class="tk" id="tk"></div></div>
  <div class="svc">
    <h2 class="sec-title" data-i18n="s_svc">Layanan</h2>
    <div class="cards">
      <button type="button" class="card" data-go="outbound">
        <span class="big">01</span>
        <h3>Outbound</h3>
        <p data-i18n="c_out">Civitas PNJ mengurus dokumen yang butuh izin negara: paspor, visa, dan surat izin keluar negeri.</p>
        <span class="go" data-i18n="c_go">BUKA FORM</span>
      </button>
      <button type="button" class="card y" data-go="inbound">
        <span class="big">02</span>
        <h3>Inbound</h3>
        <p data-i18n="c_in">Pihak eksternal dan luar negeri mengajukan kunjungan, kolaborasi, atau kegiatan di PNJ.</p>
        <span class="go" data-i18n="c_go">BUKA FORM</span>
      </button>
      <button type="button" class="card" data-go="pdln">
        <span class="big">03</span>
        <h3>PDLN</h3>
        <p data-i18n="c_pdln">Pengajuan Perjalanan Dinas Luar Negeri untuk seminar, studi banding, pelatihan, dan riset.</p>
        <span class="go" data-i18n="c_go">BUKA FORM</span>
      </button>
    </div>
  </div>
  <div class="flow">
    <h2 data-i18n="s_flow">Alur Pengajuan</h2>
    <div class="steps">
      <div class="step"><div class="n">1</div><h4 data-i18n="st1">Isi form</h4><p data-i18n="st1d">Pilih layanan, lengkapi data dan unggah dokumen.</p></div>
      <div class="step"><div class="n">2</div><h4 data-i18n="st2">Verifikasi</h4><p data-i18n="st2d">Petugas memeriksa kelengkapan dan kesesuaian berkas.</p></div>
      <div class="step"><div class="n">3</div><h4 data-i18n="st3">Persetujuan</h4><p data-i18n="st3d">Pimpinan menyetujui, atau meminta perbaikan jika perlu.</p></div>
      <div class="step"><div class="n">4</div><h4 data-i18n="st4">Dokumen terbit</h4><p data-i18n="st4d">Unduh surat dan dokumen hasil pengajuan dari akunmu.</p></div>
    </div>
  </div>

<!-- ============ FAQ + TIKET (di beranda / klik navbar ke sini) ============ -->
<section class="faqsec" id="faq">
  <div class="faqin">
  <div class="faql">
    <h2 class="sec-title" data-i18n="faq_t">Pertanyaan Umum</h2>
    <details class="qa" open><summary data-i18n="q1">Siapa saja yang dapat mengajukan?</summary><p data-i18n="a1">Civitas PNJ (dosen, tenaga kependidikan, mahasiswa) untuk Outbound dan PDLN. Pihak eksternal atau luar negeri mengajukan lewat Inbound.</p></details>
    <details class="qa"><summary data-i18n="q2">Berapa lama proses verifikasi?</summary><p data-i18n="a2">Verifikasi awal umumnya 3–5 hari kerja setelah seluruh dokumen dinyatakan lengkap.</p></details>
    <details class="qa"><summary data-i18n="q3">Format dokumen apa yang diterima?</summary><p data-i18n="a3">PDF, JPG, atau PNG dengan ukuran maksimal 5 MB per berkas.</p></details>
    <details class="qa"><summary data-i18n="q4">Apakah pengajuan bisa diubah setelah dikirim?</summary><p data-i18n="a4">Tidak. Pengajuan yang sudah dikirim tidak dapat diubah. Jika ada kesalahan setelah submit, hubungi admin atau helpdesk lewat form tiket di halaman ini untuk meminta pembatalan, lalu buat pengajuan baru dengan data yang benar.</p></details>
    <details class="qa"><summary data-i18n="q5">Bagaimana jika pesertanya lebih dari satu?</summary><p data-i18n="a5">Pilih Ya pada pertanyaan peserta lainnya, lalu tambahkan data setiap peserta. Maksimal 10 orang per pengajuan.</p></details>
  </div>
  <aside class="tkt" id="tkt">
    <div id="tkWrap">
      <h3 data-i18n="tk_t">Tidak menemukan jawabanmu?</h3>
      <p data-i18n="tk_d">Kirim tiket pertanyaan. Jawabannya kami kirim ke email-mu.</p>
      <form id="tktForm" novalidate>
        <div class="grid">
          <div class="f"><label data-i18n="tk_nama">Nama</label><input type="text" required data-auto="name"></div>
          <div class="f"><label data-i18n="tk_email">Email</label><input type="email" required data-auto="email" placeholder="nama@email.com"></div>
          <div class="f full"><label data-i18n="tk_topik">Topik</label>
            <select required><option value="" data-i18n="sel_pilih">Pilih…</option><option>Outbound</option><option>Inbound</option><option>PDLN</option><option data-i18n="tk_akun">Akun & Login</option><option data-i18n="tk_dok">Dokumen & Upload</option><option data-i18n="k_lain">Lainnya</option></select></div>
          <div class="f full"><label data-i18n="tk_isi">Isi Pertanyaan</label><textarea required placeholder="Tulis pertanyaanmu selengkap mungkin..." data-i18n-ph="tk_ph"></textarea></div>
        </div>
        <button type="submit" class="btn main" data-i18n="tk_kirim">Kirim Tiket</button>
      </form>
    </div>
    <div class="tk-done" id="tkDone" hidden>
      <span class="tk-no" id="tkNo"></span>
      <h3 data-i18n="tk_ok">Tiket terkirim</h3>
      <p data-i18n="tk_ok_d">Jawaban akan dikirim ke email berikut:</p>
      <span class="mail" id="tkMail"></span>
      <button type="button" class="btn ghost" id="tkAgain" data-i18n="tk_again">Kirim Tiket Lain</button>
    </div>
  </aside>
  </div>
</section>
</section>