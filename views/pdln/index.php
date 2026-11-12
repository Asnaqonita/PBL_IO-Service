<!-- ============ PDLN ============ -->
<!-- Struktur: submenu (#psubbar) dan 4 panel (.psub: dash, input, progress, laporan) -->
<section class="page" id="page-pdln">

  <div class="psubbar" id="psubbar">
    <div class="psb-in">
      <div class="psb-aux" aria-label="Panduan dan template">
        <a href="#pdln/panduan" data-go="pdln/panduan"><svg class="ic"><use href="#i-book"/></svg><span data-i18n="s_panduan">Panduan</span></a>
        <a href="#pdln/template" data-go="pdln/template"><svg class="ic"><use href="#i-folder"/></svg><span data-i18n="s_template">Template</span></a>
      </div>
      <nav class="psb-main" aria-label="Menu PDLN">
        <a href="#pdln/input" data-go="pdln/input" data-sub="input" data-i18n="s_input">Input Pengajuan</a>
        <a href="#pdln/progress" data-go="pdln/progress" data-sub="progress" data-i18n="s_progress">Progress</a>
        <a href="#pdln/laporan" data-go="pdln/laporan" data-sub="laporan" data-i18n="s_laporan">Laporan Kegiatan</a>
      </nav>
    </div>
  </div>

  <!-- ===== 1. DASHBOARD PDLN ===== -->
  <?php require_once __DIR__ . '/dashboard.php'; ?>

  <!-- ===== 2. INPUT PENGAJUAN (form PDLN) ===== -->
  <?php require_once __DIR__ . '/form.php'; ?>

  <!-- ===== 3. PROGRESS ===== -->
  <?php require_once __DIR__ . '/progress.php'; ?>

  <!-- ===== 4. LAPORAN KEGIATAN ===== -->
  <?php require_once __DIR__ . '/laporan.php'; ?>

</section>
