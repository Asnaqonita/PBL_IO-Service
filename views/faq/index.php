<?php
// Seksi daftar Pertanyaan Umum (FAQ) beserta form pengiriman tiket bantuan ke email tim KUI PNJ
?>
<section class="faqsec active" id="faq">
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
        <form id="tktForm" action="index.php?url=faq/store" method="POST" novalidate>
          <div class="grid">
            <div class="f"><label data-i18n="tk_nama">Nama</label><input type="text" name="nama" required data-auto="name"></div>
            <div class="f"><label data-i18n="tk_email">Email</label><input type="email" name="email" required data-auto="email" placeholder="nama@email.com"></div>
            <div class="f full"><label data-i18n="tk_topik">Topik</label>
              <select name="topik" required><option value="" data-i18n="sel_pilih">Pilih…</option><option>Outbound</option><option>Inbound</option><option>PDLN</option><option data-i18n="tk_akun">Akun & Login</option><option data-i18n="tk_dok">Dokumen & Upload</option><option data-i18n="k_lain">Lainnya</option></select></div>
            <div class="f full"><label data-i18n="tk_isi">Isi Pertanyaan</label><textarea name="pertanyaan" required placeholder="Tulis pertanyaanmu selengkap mungkin..." data-i18n-ph="tk_ph"></textarea></div>
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