<!-- ===== 2. INPUT PENGAJUAN (form PDLN) ===== -->
<?php
// Tarik data profil user dari $profil atau session untuk mengisi otomatis (auto-fill) bagian identitas pemohon PDLN
$u = (!empty($profil) && is_array($profil)) ? $profil : ($_SESSION['user'] ?? []);
// Cek apakah pemohon yang login ini Mahasiswa atau Sivitas (Dosen/Tendik) supaya kolom yang muncul sesuai rolenya
$rawRolePdln = strtolower(trim((string)($u['role'] ?? 'sivitas')));
$isMhsPdln   = ($rawRolePdln === 'mahasiswa');
$valKatPemohon = $isMhsPdln ? 'mahasiswa' : 'sivitas';

// Siapkan nilai auto-fill untuk masing-masing kolom identitas pemohon
$valPdlnNama    = htmlspecialchars((string)($u['nama_lengkap'] ?? $u['nama'] ?? $u['name'] ?? ''), ENT_QUOTES, 'UTF-8');
$valPdlnNim     = htmlspecialchars((string)($u['nim'] ?? ($isMhsPdln ? ($u['nomor_induk'] ?? '') : '')), ENT_QUOTES, 'UTF-8');
$valPdlnNip     = htmlspecialchars((string)($u['nip'] ?? (!$isMhsPdln ? ($u['nomor_induk'] ?? '') : '')), ENT_QUOTES, 'UTF-8');
$valPdlnNidn    = htmlspecialchars((string)($u['nidn'] ?? ''), ENT_QUOTES, 'UTF-8');
$valPdlnJurusan = htmlspecialchars((string)($u['jurusan'] ?? ''), ENT_QUOTES, 'UTF-8');
$valPdlnProdi   = htmlspecialchars((string)($u['prodi'] ?? ''), ENT_QUOTES, 'UTF-8');
$valPdlnJabatan = htmlspecialchars((string)($u['jabatan'] ?? ''), ENT_QUOTES, 'UTF-8');
$valPdlnPangkat = htmlspecialchars((string)($u['pangkat_golongan'] ?? ''), ENT_QUOTES, 'UTF-8');
$valPdlnUnit    = htmlspecialchars((string)($u['unit_kerja'] ?? $u['instansi'] ?? ''), ENT_QUOTES, 'UTF-8');
$valPdlnPaspor  = htmlspecialchars((string)($u['no_paspor'] ?? ''), ENT_QUOTES, 'UTF-8');
$valPdlnHp      = htmlspecialchars((string)($u['no_hp'] ?? $u['whatsapp'] ?? ''), ENT_QUOTES, 'UTF-8');
$valPdlnEmail   = htmlspecialchars((string)($u['email_pnj'] ?? $u['email'] ?? ''), ENT_QUOTES, 'UTF-8');
?>
<div class="psub" id="psub-input">
  <div class="wrap">
    <div class="crumb"><a href="#home" data-go="home" data-i18n="n_home">Beranda</a> / <a href="#pdln" data-go="pdln">PDLN</a> / <b data-i18n="s_input">Input Pengajuan</b></div>
    <div class="fhead">
      <h2 class="ftitle">Form<em>PDLN</em></h2>
      <div class="progress"><span><i></i></span><b>0%</b></div>
      <p class="fsub" data-i18n="pdln_sub">Pengajuan Perjalanan Dinas Luar Negeri (PDLN) Politeknik Negeri Jakarta. Isi identitas pemohon, detail kegiatan luar negeri, dan unggah 7 berkas syarat pengajuan Setneg.</p>
    </div>

    <form class="shell" id="f-pdln" action="index.php?url=pdln/store" method="POST" enctype="multipart/form-data" data-mod="PDLN" data-ok-n="okN_pdln" data-ok-go="pdln/progress" data-ok-gok="goProg" novalidate>
      <input type="hidden" name="kategori_pemohon" id="pdlnKategoriPemohon" value="<?= htmlspecialchars($valKatPemohon, ENT_QUOTES, 'UTF-8') ?>">

      <!-- ============================================================= -->
      <!-- SECTION 01: IDENTITAS PEMOHON PDLN (DINAMIS SESUAI ROLE USER) -->
      <!-- ============================================================= -->
      <div class="sec">
        <span class="num">01</span>
        <h3 id="pdln-sec1-title"><?= $isMhsPdln ? 'Identitas Pemohon (Mahasiswa PNJ)' : 'Identitas Pemohon (Sivitas PNJ — Dosen & Tendik)' ?></h3>
        <i class="dash"></i>
      </div>

      <!-- 1A. BLOK KHUSUS ROLE MAHASISWA (Tabel mahasiswa: nim, nama_lengkap, jurusan, prodi, no_paspor, no_hp, email) -->
      <div id="pdln-fields-mahasiswa" class="grid" style="<?= $isMhsPdln ? 'display:grid;' : 'display:none;' ?>">
        <div class="f">
          <label data-i18n="o_nama">Nama Lengkap Mahasiswa</label>
          <input type="text" name="nama_lengkap" id="pdlnMhsNama" required data-k="pnama" value="<?= $valPdlnNama ?>" <?= !$isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label data-i18n="o_nim">NIM (Nomor Induk Mahasiswa)</label>
          <input type="text" name="nim" id="pdlnMhsNim" required inputmode="numeric" value="<?= $valPdlnNim ?>" <?= !$isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label data-i18n="o_jur">Jurusan</label>
          <input type="text" name="jurusan" id="pdlnMhsJurusan" required placeholder="Contoh: Teknik Informatika dan Komputer" value="<?= $valPdlnJurusan ?>" <?= !$isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label data-i18n="o_prodi">Program Studi</label>
          <input type="text" name="prodi" id="pdlnMhsProdi" required placeholder="Contoh: D4 Teknik Informatika" value="<?= $valPdlnProdi ?>" <?= !$isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label data-i18n="p_paspor">Nomor Paspor</label>
          <input type="text" name="no_paspor" id="pdlnMhsPaspor" required placeholder="Cth. C1234567 atau -" value="<?= $valPdlnPaspor ?>" <?= !$isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label data-i18n="o_wa">Nomor WhatsApp / HP</label>
          <input type="tel" name="no_hp" id="pdlnMhsHp" required inputmode="tel" placeholder="08xx xxxx xxxx" value="<?= $valPdlnHp ?>" <?= !$isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f full">
          <label data-i18n="o_email">Email Resmi PNJ</label>
          <input type="email" name="email" id="pdlnMhsEmail" required placeholder="nama@mhsw.pnj.ac.id" value="<?= $valPdlnEmail ?>" <?= !$isMhsPdln ? 'disabled' : '' ?>>
        </div>
      </div>

      <!-- 1B. BLOK KHUSUS ROLE SIVITAS / DOSEN & TENDIK (Tabel civitas: nip, nidn, nama_lengkap, jabatan, pangkat_golongan, unit_kerja, no_paspor, no_hp, email_pnj) -->
      <div id="pdln-fields-sivitas" class="grid" style="<?= !$isMhsPdln ? 'display:grid;' : 'display:none;' ?>">
        <div class="f">
          <label data-i18n="p_nama">Nama Lengkap &amp; Gelar</label>
          <input type="text" name="nama_lengkap" id="pdlnCivNama" required data-k="pnama" value="<?= $valPdlnNama ?>" <?= $isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label>NIP (Nomor Induk Pegawai)</label>
          <input type="text" name="nip" id="pdlnCivNip" required placeholder="Isi strip (-) jika PPPK/Non PNS" data-i18n-ph="ph_nip" value="<?= $valPdlnNip ?>" <?= $isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label>NIDN (Khusus Dosen / Opsional)</label>
          <input type="text" name="nidn" id="pdlnCivNidn" placeholder="Kosongkan atau isi (-) jika Tendik" value="<?= $valPdlnNidn ?>" <?= $isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label data-i18n="p_namajab">Jabatan (Dosen / Tendik)</label>
          <input type="text" name="jabatan" id="pdlnCivJabatan" required placeholder="Contoh: Dosen PNJ - Lektor Kepala / Tendik" data-k="pjab" value="<?= $valPdlnJabatan ?>" <?= $isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label>Pangkat / Golongan</label>
          <input type="text" name="pangkat_golongan" id="pdlnCivPangkat" placeholder="Contoh: Pembina / IV/a (Opsional)" value="<?= $valPdlnPangkat ?>" <?= $isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label data-i18n="l_unit">Unit Kerja / Jurusan Homebase</label>
          <input type="text" name="unit_kerja" id="pdlnCivUnit" required placeholder="Contoh: Jurusan Teknik Elektro / KUI" value="<?= $valPdlnUnit ?>" <?= $isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label data-i18n="p_paspor">Nomor Paspor</label>
          <input type="text" name="no_paspor" id="pdlnCivPaspor" required placeholder="Cth. C1234567 atau -" value="<?= $valPdlnPaspor ?>" <?= $isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f">
          <label data-i18n="p_telp">Nomor WhatsApp / HP</label>
          <input type="tel" name="no_hp" id="pdlnCivHp" required inputmode="tel" placeholder="08xx xxxx xxxx" value="<?= $valPdlnHp ?>" <?= $isMhsPdln ? 'disabled' : '' ?>>
        </div>

        <div class="f full">
          <label data-i18n="l_email">Email Resmi PNJ (@pnj.ac.id)</label>
          <input type="email" name="email_pnj" id="pdlnCivEmail" required placeholder="nama@pnj.ac.id" value="<?= $valPdlnEmail ?>" <?= $isMhsPdln ? 'disabled' : '' ?>>
        </div>
      </div>

      <!-- ============================================================= -->
      <!-- SECTION 02: DETAIL KEGIATAN LUAR NEGERI (SESUAI TABEL pdln)   -->
      <!-- ============================================================= -->
      <div class="sec"><span class="num">02</span><h3 data-i18n="s_data">Detail Kegiatan Luar Negeri</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f">
          <label data-i18n="l_nama_keg">Nama Kegiatan</label>
          <input type="text" name="nama_kegiatan" required maxlength="150" placeholder="Nama konferensi, seminar, studi banding, dsb." data-i18n-ph="ph_namakeg" data-k="kegiatan">
        </div>

        <div class="f">
          <label data-i18n="l_jenis">Jenis Kegiatan</label>
          <select name="jenis_kegiatan" required>
            <option value="" data-i18n="sel_jenis">Pilih jenis kegiatan</option>
            <option value="Studi Banding / Kunjungan" data-i18n="k_studi">Studi Banding / Kunjungan</option>
            <option value="Seminar / Konferensi" data-i18n="k_konf">Seminar / Konferensi</option>
            <option value="Pelatihan / Workshop" data-i18n="k_latih">Pelatihan / Workshop</option>
            <option value="Penelitian / Riset Kolaborasi" data-i18n="k_riset">Penelitian / Riset Kolaborasi</option>
            <option value="Pertukaran Dosen / Mahasiswa" data-i18n="k_tukar">Pertukaran Dosen / Mahasiswa</option>
            <option value="Lainnya" data-i18n="k_lain">Lainnya</option>
          </select>
        </div>

        <div class="f">
          <label data-i18n="l_negara">Negara Tujuan</label>
          <input type="text" name="negara_tujuan" required maxlength="50" placeholder="Contoh: Jepang" data-i18n-ph="ph_negara" data-k="tempat">
        </div>

        <div class="f">
          <label data-i18n="l_inst">Institusi Tujuan</label>
          <input type="text" name="institusi_tujuan" required maxlength="150" placeholder="Nama universitas / lembaga tujuan" data-i18n-ph="ph_inst">
        </div>

        <div class="f">
          <label data-i18n="l_berangkat">Tanggal Berangkat</label>
          <input type="date" name="tgl_berangkat" required data-role="start">
        </div>

        <div class="f">
          <label data-i18n="l_kembali">Tanggal Pulang</label>
          <input type="date" name="tgl_pulang" required data-role="end">
        </div>

        <div class="f full">
          <label data-i18n="l_biaya">Sumber Dana / Pembiayaan</label>
          <select name="sumber_dana" required>
            <option value="" data-i18n="sel_pilih">Pilih sumber dana…</option>
            <option value="DIPA PNJ / Anggaran Institusi" data-i18n="bi_inst">DIPA PNJ / Anggaran Institusi</option>
            <option value="Beasiswa / Hibah" data-i18n="bi_bea">Beasiswa / Hibah</option>
            <option value="Penyelenggara / Mitra Luar Negeri" data-i18n="bi_pen">Penyelenggara / Mitra Luar Negeri</option>
            <option value="Biaya Mandiri" data-i18n="bi_mandiri">Biaya Mandiri</option>
          </select>
        </div>
      </div>

      <!-- ============================================================= -->
      <!-- SECTION 03: 7 BERKAS SYARAT PENGAJUAN SETNEG (TABEL pdln)     -->
      <!-- ============================================================= -->
      <div class="sec"><span class="num">03</span><h3 data-i18n="s_upload">Berkas Syarat Pengajuan Setneg (7 Dokumen)</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f">
          <div class="lrow"><label data-i18n="d_memo">Memo Persetujuan</label><button type="button" class="tpl" data-tpl="memo" data-i18n="b_tpl">Template</button></div>
          <div class="drop">
            <input type="file" name="file_memo" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div>
            <ul class="files"></ul>
          </div>
        </div>

        <div class="f">
          <div class="lrow"><label data-i18n="d_tor">TOR Kegiatan</label><button type="button" class="tpl" data-tpl="tor" data-i18n="b_tpl">Template</button></div>
          <div class="drop">
            <input type="file" name="file_tor" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div>
            <ul class="files"></ul>
          </div>
        </div>

        <div class="f">
          <div class="lrow"><label data-i18n="d_regis">Bukti Registrasi / Undangan (LoA)</label><button type="button" class="tpl" data-tpl="undangan" data-i18n="b_tpl">Template</button></div>
          <div class="drop">
            <input type="file" name="file_bukti_reg" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div>
            <ul class="files"></ul>
          </div>
        </div>

        <div class="f">
          <div class="lrow"><label data-i18n="d_biaya">Surat Pernyataan Pembiayaan</label><button type="button" class="tpl" data-tpl="pembiayaan" data-i18n="b_tpl">Template</button></div>
          <div class="drop">
            <input type="file" name="file_pembiayaan" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div>
            <ul class="files"></ul>
          </div>
        </div>

        <div class="f">
          <div class="lrow"><label data-i18n="d_jadwal">Jadwal Kegiatan</label><button type="button" class="tpl" data-tpl="jadwal" data-i18n="b_tpl">Template</button></div>
          <div class="drop">
            <input type="file" name="file_jadwal" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div>
            <ul class="files"></ul>
          </div>
        </div>

        <div class="f">
          <div class="lrow"><label data-i18n="d_clear">Clearance Letter / Surat Tugas</label><button type="button" class="tpl" data-tpl="tugas" data-i18n="b_tpl">Template</button></div>
          <div class="drop">
            <input type="file" name="file_clearance" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div>
            <ul class="files"></ul>
          </div>
        </div>

        <div class="f full">
          <div class="lrow"><label data-i18n="d_mou">Draft MoU / MoA</label><span class="bdg" data-i18n="b_opt">Opsional</span><button type="button" class="tpl" data-tpl="mou" data-i18n="b_tpl">Template</button></div>
          <div class="drop">
            <input type="file" name="file_mou" accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div>
            <ul class="files"></ul>
          </div>
        </div>
      </div>

      <div class="actions">
        <span class="hint" data-i18n="hint_req">* wajib diisi</span>
        <button type="button" class="btn ghost" data-reset data-i18n="batal">Batal</button>
        <button type="submit" class="btn main" data-i18n="kirim">Kirim Pengajuan</button>
      </div>
    </form>
  </div>
</div>
