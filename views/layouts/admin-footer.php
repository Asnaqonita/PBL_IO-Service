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
<!-- ============ TOAST CONTAINER ============ -->
<div class="toasts" id="toasts"></div>

<!-- ============ FOOTER ============ -->
<footer>
  <b>I/O Service</b> — Kantor Urusan Internasional Politeknik Negeri Jakarta &copy; 2026.
</footer>

<!-- ============ JAVASCRIPT LOGIC ============ -->
<script>
// Tab Switching
function switchTab(key) {
  document.querySelectorAll('.page').forEach(el => el.classList.remove('active'));
  const target = document.getElementById('tab-' + key);
  if (target) {
    target.classList.add('active');
  }

  // Update navbar links active status
  ['dashboard', 'outbound', 'inbound', 'pdln', 'akun', 'faq', 'loket', 'profil', 'notifikasi'].forEach(k => {
    const btn = document.getElementById('nav-' + k);
    if (!btn) return;
    if (k === key) {
      btn.classList.add('active');
    } else {
      btn.classList.remove('active');
    }
  });

  window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Drawer Toggle
function toggleDrawer(open) {
  const drawer = document.getElementById('drawer');
  const scrim = document.getElementById('scrim');
  if (!drawer || !scrim) return;
  const isOpen = open !== undefined ? open : !drawer.classList.contains('open');
  drawer.classList.toggle('open', isOpen);
  scrim.classList.toggle('on', isOpen);
  drawer.setAttribute('aria-hidden', !isOpen);
}

// Modal Check Handlers
function openCheckModal(name, role, cat, title, country) {
  const mdlName = document.getElementById('mdl-name');
  const mdlRole = document.getElementById('mdl-role');
  const mdlTitle = document.getElementById('mdl-title');
  const mdlCountry = document.getElementById('mdl-country');
  const modal = document.getElementById('checkModal');
  
  if (mdlName) mdlName.innerText = name;
  if (mdlRole) mdlRole.innerText = role;
  if (mdlTitle) mdlTitle.innerText = cat + ' — ' + title;
  if (mdlCountry) mdlCountry.innerText = country;
  if (modal) modal.classList.add('open');
}

function closeCheckModal() {
  const modal = document.getElementById('checkModal');
  if (modal) modal.classList.remove('open');
}

function handleCheckModalSubmit(e) {
  e.preventDefault();
  closeCheckModal();
  toast('Status berkas berhasil diperbarui & notifikasi terkirim!');
}

// Gallery Carousel Logic
(function initGallery() {
  const tr = document.getElementById('galTrack');
  if (!tr) return;
  const slides = tr.querySelectorAll('.slide');
  const n = slides.length;
  const cnt = document.getElementById('galCnt');
  if (!n) return;

  const step = () => slides.length > 1 ? slides[1].offsetLeft - slides[0].offsetLeft : tr.clientWidth;
  const atEnd = () => tr.scrollLeft + tr.clientWidth >= tr.scrollWidth - 6;
  const pad = v => String(v).padStart(2, '0');
  let paused = false;

  function idx() { return Math.min(n - 1, Math.round(tr.scrollLeft / step())); }
  function show() { if (cnt) cnt.textContent = pad(atEnd() ? n : idx() + 1) + ' / ' + pad(n); }
  function to(i) { i = Math.max(0, Math.min(n - 1, i)); tr.scrollTo({ left: i * step(), behavior: 'smooth' }); }
  function next() { if (atEnd()) tr.scrollTo({ left: 0, behavior: 'smooth' }); else to(idx() + 1); }
  function prev() { if (tr.scrollLeft < 6) tr.scrollTo({ left: tr.scrollWidth, behavior: 'smooth' }); else to(idx() - 1); }

  const nextBtn = document.getElementById('galNext');
  const prevBtn = document.getElementById('galPrev');
  if (nextBtn) nextBtn.onclick = next;
  if (prevBtn) prevBtn.onclick = prev;

  tr.addEventListener('scroll', show, { passive: true });
  window.addEventListener('resize', show);
  show();

  slides.forEach(s => s.addEventListener('click', e => {
    const was = s.classList.contains('open');
    slides.forEach(x => x.classList.remove('open'));
    if (!was) s.classList.add('open');
    e.stopPropagation();
  }));

  slides.forEach(s => s.addEventListener('keydown', e => {
    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); s.click(); }
  }));
  document.addEventListener('click', () => slides.forEach(x => x.classList.remove('open')));

  ['mouseenter', 'focusin', 'touchstart'].forEach(ev => tr.addEventListener(ev, () => paused = true, { passive: true }));
  ['mouseleave', 'focusout'].forEach(ev => tr.addEventListener(ev, () => paused = false));
  setInterval(() => {
    const dashTab = document.getElementById('tab-dashboard');
    if (!paused && !document.hidden && dashTab && dashTab.classList.contains('active') && !tr.querySelector('.slide.open')) {
      next();
    }
  }, 4500);
})();

// Build Ticker Text
(function buildTicker() {
  const words = ['INTERNATIONAL PNJ', 'EXCHANGE', 'COLLABORATION', 'VISITS', 'RESEARCH'];
  const row = words.map(x => `<span>${x}</span>`).join('');
  const tk = document.getElementById('tk');
  if (tk) tk.innerHTML = row.repeat(6);
})();

// Filter User in Data Akun Tab
function filterUser(role) {
  document.querySelectorAll('.u-row').forEach(row => {
    row.style.display = (role === 'all' || row.dataset.role === role) ? '' : 'none';
  });
  document.querySelectorAll('.filter-user-btn').forEach(btn => {
    if (btn.getAttribute('data-role') === role) {
      btn.className = 'btn main filter-user-btn';
    } else {
      btn.className = 'btn ghost filter-user-btn';
    }
  });
}

// Add FAQ Form
function handleFaqSubmit(e) {
  e.preventDefault();
  const kat = document.getElementById('faqKat').value;
  const q = document.getElementById('faqQ').value.trim();
  const a = document.getElementById('faqA').value.trim();
  if (!q || !a) return;

  const list = document.getElementById('faqList');
  const count = list.querySelectorAll('.qa').length + 1;
  const pad = String(count).padStart(2, '0');

  const details = document.createElement('details');
  details.className = 'qa';
  details.open = true;
  details.innerHTML = `
    <summary>
      <span><b style="color:var(--t500);margin-right:8px">${pad}</b> [${kat}] ${escapeHtml(q)}</span>
      <button type="button" onclick="this.closest('.qa').remove(); toast('FAQ dihapus', true);" style="background:none;border:none;color:var(--red);font-size:11px;font-weight:700;cursor:pointer;text-transform:uppercase">Hapus</button>
    </summary>
    <p>${escapeHtml(a)}</p>
  `;
  list.prepend(details);
  e.target.reset();
  toast('FAQ baru berhasil ditambahkan!');
}

function escapeHtml(str) {
  return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

// Toggle Ambil Surat di Loket
function toggleAmbil(btn) {
  const row = btn.closest('tr');
  const badge = row.querySelector('.status-ambil');
  if (badge.dataset.status === 'done') {
    badge.className = 'st g-proses status-ambil';
    badge.textContent = 'Belum Diambil';
    badge.dataset.status = 'pending';
    btn.className = 'btn main';
    btn.textContent = 'Tandai Sudah Diambil';
    toast('Status diubah: Belum Diambil', true);
  } else {
    badge.className = 'st g-disetujui status-ambil';
    badge.textContent = 'Sudah Diambil ✓';
    badge.dataset.status = 'done';
    btn.className = 'btn ghost';
    btn.textContent = 'Batal Ambil';
    toast('Dokumen ditandai telah diambil ✓');
  }
}

// Toast Notification
function toast(msg, warn = false) {
  const wrap = document.getElementById('toasts');
  if (!wrap) return;
  const t = document.createElement('div');
  t.className = 'toast' + (warn ? ' warn' : '');
  t.textContent = msg;
  wrap.appendChild(t);
  setTimeout(() => t.remove(), 3200);
}
</script>
</body>
</html>
