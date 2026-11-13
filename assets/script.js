/* ---------- 1. KAMUS BAHASA (EN) ---------- */
const EN = {
  /* --- PDLN: submenu, dashboard, progress, laporan, panduan --- */
  s_input: 'Submit Request',
  s_progress: 'Progress',
  s_laporan: 'Activity Report',
  s_panduan: 'Guide',
  s_template: 'Templates',
  d_sub:
    'Summary of PNJ overseas official travel (PDLN) requests: status, destination countries and latest activity.',
  a1_t: 'Submit a PDLN',
  a1_d: 'Fill in the activity and participant data and upload supporting documents in one integrated form.',
  a2_t: 'Check Progress',
  a2_d: 'See the status, progress percentage and admin notes of requests already submitted.',
  a2_b: 'View List',
  a3_d: 'Activity finished? Upload the report and documentation so the request can be closed.',
  a3_b: 'Submit Report',
  kp1_l: 'Total Setneg Letters',
  kp1_s: 'Setneg letters issued',
  kp2_l: 'Total Official Passports',
  kp2_s: 'Processed & completed',
  kp3_l: 'Total Reports',
  kp3_s: 'Reports received',
  p_status: 'Status Distribution',
  p_neg: 'Top Destination Countries',
  p_hl: "This Month's Highlights",
  pr_em: 'Requests',
  pr_sub: 'Track status, progress percentage and verification notes from the Admin.',
  f_ph: 'Search name, activity or destination country...',
  f_jab: 'All Positions',
  f_st: 'All Statuses',
  f_st_proses: 'In Progress (all stages)',
  f_reset: 'Reset',
  st_baru: 'Newly Submitted',
  st_verifikasi: 'Document Verification',
  st_setneg: 'Awaiting Setneg',
  st_disetujui: 'Approved',
  st_ditolak: 'Rejected',
  so_new: 'Newest',
  so_old: 'Oldest',
  so_az: 'Activity name Aâ€“Z',
  so_prog: 'Highest progress',
  th_no: 'No',
  th_keg: 'Activity Name',
  th_pes: 'Participant',
  th_jab: 'Position',
  th_tmp: 'Location',
  th_aju: 'Submitted',
  th_st: 'Status',
  th_prog: 'Progress',
  th_cat: 'Notes / Action',
  emp_t: 'No matching requests',
  emp_d: 'Change the keyword or filters, then try again.',
  lp_em: 'Report',
  lp_sub: 'Report the results of an approved PDLN activity that has taken place.',
  lp_s1: 'Report Details',
  lp_rel: 'Related Request',
  lp_email: 'Reporter Email',
  lp_mulai: 'Activity Start Date',
  lp_selesai: 'Activity End Date',
  lp_hasil: 'Summary of Activity Results',
  lp_ph1: 'Describe the activity carried out and its main results...',
  lp_capaian: 'Outcomes & Benefits for PNJ',
  lp_ph2: 'Write the outcomes, collaborations or benefits gained...',
  lp_d_lap: 'Activity Report',
  lp_d_doc: 'Activity Documentation (photos)',
  lp_d_sert: 'Certificate / Proof of Attendance',
  lp_d_biaya: 'Expense Accountability Proof',
  kirim_lap: 'Submit Report',
  b_buka: 'Open',
  gd1_t: 'Get the File Templates',
  gd1_d: 'Open the Templates section below this page to see the list of official formats.',
  gd2_t: 'Fill in the Request Form',
  gd2_d: 'Complete the activity and participant data correctly in the Submit Request menu.',
  gd3_t: 'Upload Mandatory Documents',
  gd3_d:
    'Upload files marked with a red asterisk (*). If approved, you will need to process the Official Passport and Exit Permit.',
  gd4_t: 'Monitor & Report',
  gd4_d:
    'Follow the progress in the Progress menu. Once the activity is done, send the report via Activity Report.',
  okN_pdln: 'Track its status in the PDLN Progress menu.',
  okT_lap: 'Report Submitted',
  okN_lap: 'Thank you. The report will be verified by the Admin.',
  goProg: 'View Progress',
  goDash: 'PDLN Dashboard',
  againRep: 'Another Report',
  acc: 'Account',
  belum: 'Not signed in',
  silakan: 'Please log in to continue',
  m_profil: 'My Profile',
  m_ajuan: 'My Requests',
  m_notif: 'Notifications',
  m_set: 'Account Settings',
  m_bantuan: 'Help Center',
  m_lang: 'Language',
  m_login: 'Login',
  m_logout: 'Logout',
  h_lead:
    'One door for international travel and visits of the Politeknik Negeri Jakarta community. Apply, track, and collect documents without queuing.',
  c_out:
    'PNJ community members process documents that need state permission: passports, visas, and exit permits.',
  c_in: 'External and international parties apply for visits, collaboration, or activities at PNJ.',
  c_pdln: 'Overseas official travel requests for seminars, benchmarking, training, and research.',
  c_go: 'OPEN FORM',
  s_flow: 'How it works',
  st1: 'Fill in the form',
  st1d: 'Choose a service, complete the data, and upload documents.',
  st2: 'Verification',
  st2d: 'Staff check that your files are complete and consistent.',
  st3: 'Approval',
  st3d: 'Leadership approves, or asks for corrections if needed.',
  st4: 'Documents issued',
  st4d: 'Download the letters and documents from your account.',
  pdln_sub:
    'Overseas Official Travel request. Fill in the activity details, upload documents, then add every participant.',
  ob_sub:
    'Processing of documents that need state permission for PNJ community members: passports, visas, and exit permits.',
  in_sub: 'Processing of visits and documents for external or international parties coming to PNJ.',
  s_data: 'Activity Details',
  s_upload: 'PDLN Document Upload',
  s_upload2: 'Document Upload',
  s_peserta: 'Participants',
  l_email: 'Applicant Email',
  l_email2: 'Applicant Email',
  l_email3: 'Contact Person Email',
  l_jenis: 'Activity Type',
  l_nama_keg: 'Activity Name',
  l_nama_keg2: 'Activity / Agenda Name',
  l_tgl_mulai: 'Activity Start Date',
  l_tgl_selesai: 'Activity End Date',
  l_inst: 'Destination Institution',
  l_tempat: 'Venue (City, Country)',
  l_rtl: 'Follow-up Plan',
  ph_inst: 'University / institution name',
  ph_tempat: 'e.g. Tokyo, Japan',
  ph_rtl: 'Describe the follow-up plan after the activity...',
  ph_negara: 'e.g. Japan',
  ph_asal: 'University / organisation',
  ph_keperluan: 'Describe the purpose of travel and the documents you need...',
  ph_agenda: 'Summary of the agenda while at PNJ...',
  sel_pilih: 'Selectâ€¦',
  k_studi: 'Benchmarking / Visit',
  k_konf: 'Seminar / Conference',
  k_latih: 'Training / Workshop',
  k_riset: 'Research / Collaboration',
  k_tukar: 'Lecturer / Student Exchange',
  k_lain: 'Other',
  d_undangan: 'Invitation',
  d_tor: 'Activity ToR',
  d_tugas: 'Assignment Letter',
  d_rab: 'Budget Plan (RAB)',
  d_lain: 'Other Supporting Documents (optional)',
  drop_t: 'Choose a file or drag it here',
  drop_h: 'PDF / JPG / PNG Â· max 5 MB',
  peserta: 'Participant',
  p_nama: 'Full Name & Title',
  p_paspor: 'Passport Number',
  p_jenjab: 'Position Type',
  p_namajab: 'Position Title',
  p_email: 'Participant Email',
  p_telp: 'Phone Number',
  p_nik: 'National ID (NIK)',
  p_ktp: 'ID Card (KTP)',
  p_pasf: 'Passport',
  j_pilih: 'Select position',
  j_dosen: 'Lecturer',
  j_tendik: 'Education Staff',
  j_pimp: 'Leadership',
  j_mhs: 'Student',
  p_more: 'Are there other participants?',
  no: 'No',
  yes: 'Yes',
  p_add: '+ Add Participant',
  rm: 'Remove',
  batal: 'Cancel',
  kirim: 'Submit Request',
  hint_req: '* required',
  err_req: 'Required, or the format is not valid',
  ob_s1: 'Applicant Details',
  ob_s2: 'Requested Service',
  l_status: 'Civitas Status',
  l_nipnim: 'Employee ID / Student ID',
  l_unit: 'Unit / Department',
  l_layanan: 'Service Type',
  lay_baru: 'New Passport',
  lay_perp: 'Passport Renewal / Replacement',
  lay_izin: 'Exit Permit / Recommendation Letter',
  lay_imi: 'Immigration Cover Letter',
  l_negara: 'Destination Country',
  l_berangkat: 'Planned Departure',
  l_kembali: 'Planned Return',
  l_biaya: 'Funding Source',
  bi_mandiri: 'Self-funded',
  bi_bea: 'Scholarship',
  bi_inst: 'Institutional Budget',
  bi_pen: 'Event Organizer',
  l_keperluan: 'Purpose of Travel',
  d_ktp: 'ID Card (KTP)',
  d_kk: 'Family Card (KK)',
  d_foto: 'Recent Photo (white background)',
  d_pasl: 'Old Passport (if any)',
  d_pengantar: 'Cover / Invitation Letter',
  d_tiket: 'Ticket / Itinerary (optional)',
  in_s1: 'Applicant (External Party)',
  in_s2: 'Activity Details at PNJ',
  in_s4: 'Guests / Participants',
  l_pic: 'Applicant / Contact Person',
  l_asal: 'Home Institution',
  l_negara_asal: 'Country of Origin',
  ki_kunj: 'Institutional Visit',
  ki_kuliah: 'Guest Lecture',
  ki_riset: 'Research Collaboration',
  ki_mou: 'MoU / MoA Signing',
  ki_konf: 'Conference / Workshop',
  l_unit_tuju: 'Destination Unit / Department',
  in_umum: 'Head Office / General',
  l_pic_pnj: 'PNJ Contact Person',
  l_agenda: 'Agenda / Activity Plan',
  l_butuh: 'Service Needs',
  n_visa: 'Visa Invitation Letter',
  n_akom: 'Accommodation',
  n_trans: 'Transportation',
  n_pener: 'Interpreter',
  n_pend: 'Campus Escort',
  d_mohon: 'Official Request Letter',
  d_agenda: 'Proposal / Activity Agenda',
  d_profil: 'Institution Profile (optional)',
  g_nama: 'Full Name (as in passport)',
  g_warga: 'Nationality',
  g_jab: 'Position / Affiliation',
  g_pasf: 'Passport Scan (data page)',
  g_more: 'Are there other guests?',
  g_add: '+ Add Guest',
  tamu: 'Guest',
  faq_t: 'Frequently Asked Questions',
  q1: 'Who can submit a request?',
  a1: 'PNJ community members (lecturers, staff, students) for Outbound and PDLN. External or international parties apply through Inbound.',
  q2: 'How long does verification take?',
  a2: 'Initial verification usually takes 3â€“5 working days once all documents are complete.',
  q3: 'Which document formats are accepted?',
  a3: 'PDF, JPG, or PNG, up to 5 MB per file.',
  q4: 'Can I edit a request after sending it?',
  a4: 'No. A submitted request cannot be edited. If you spot a mistake after submitting, contact the admin or helpdesk through the ticket form on this page to have it cancelled, then submit a new request with the correct details.',
  q5: 'What if there is more than one participant?',
  a5: 'Choose Yes on the other-participants question, then add each person. Up to 10 per request.',
  ft: 'Integrated international services of Politeknik Negeri Jakarta',
  lg_t: 'Sign in',
  lg_demo: 'Demo: enter anything to sign in.',
  lg_user: 'Email / Employee ID',
  lg_pass: 'Password',
  lg_btn: 'Sign In',
  ok_t: 'Request Submitted',
  ok_note: 'Track the status from My Requests.',
  ok_again: 'New Request',
  ok_home: 'Back to Home',
  u_sipil: 'Civil Engineering',
  u_mesin: 'Mechanical Engineering',
  u_elek: 'Electrical Engineering',
  u_tik: 'Informatics & Computer Engineering',
  u_akun: 'Accounting',
  u_niaga: 'Business Administration',
  u_grafika: 'Graphic Engineering & Publishing',
  u_pasca: 'Graduate School',
  sel_jenis: 'Select activity type',
  o_kat_pilih: 'Select program category',
  ph_namakeg: 'Name of conference, seminar, etc.',
  d_memo: 'Approval Memo',
  d_jadwal: 'Activity Schedule',
  d_setneg: 'State Secretariat Approval Letter',
  d_relevansi: 'Relevance Statement Letter',
  d_biaya: 'Funding Statement Letter',
  d_mou: 'Draft MoU / MoA',
  b_opt: 'Optional',
  d_brosur: 'Brochure',
  d_regis: 'Registration Proof',
  d_clear: 'Clearance Letter',
  b_ada: 'If any',
  s_upload: 'PDLN Document Upload',
  o_s1: 'Student Details',
  o_nama: 'Full Name',
  o_nim: 'Student ID (NIM)',
  u_sipil: 'Civil Engineering',
  u_mesin: 'Mechanical Engineering',
  u_elek: 'Electrical Engineering',
  u_tik: 'Informatics & Computer Engineering',
  u_akun: 'Accounting',
  u_niaga: 'Business Administration',
  u_grafika: 'Graphic Engineering & Publishing',
  u_pasca: 'Graduate School',
  o_jur: 'Department',
  o_ph_prodi: 'e.g. Informatics Engineering',
  o_prodi: 'Study Program',
  o_ph_kelas: 'e.g. 5A',
  o_kelas: 'Class',
  o_ipk: 'Latest GPA',
  o_ipkup: 'Upload Transcript Proof',
  o_wa: 'WhatsApp Number',
  o_email: 'PNJ Email',
  o_s2: 'Program Details',
  o_k_ex: 'Exchange / Student Mobility',
  o_k_int: 'International Internship',
  o_kat: 'Program Category',
  o_jl: 'Service Type',
  o_jl_pilih: 'Select Service Type',
  o_jl1: 'Passport Application Cover Letter',
  o_jl2: 'Active Student Certificate / Statement of Enrollment',
  o_jl3: 'Visa Recommendation Letter',
  o_ph_univ: 'University or company name',
  o_univ: 'Destination University / Company',
  ph_negara: 'e.g. Japan',
  l_negara: 'Destination Country',
  o_mulai: 'Program Duration: Start Date',
  o_selesai: 'Program Duration: End Date',
  s_upload2: 'Document Upload',
  o_d_trans: 'Academic Transcript',
  o_d_rek: 'Recommendation Letter from Department / Head of Study Program',
  o_d_ortu: 'Parent / Guardian Permission Letter',
  o_d_pasp: 'Valid Passport',
  o_d_toefl: 'TOEFL/IELTS Certificate',
  i_sA: 'Applicant Personal Information',
  i_nama: 'Full Name (as in passport)',
  i_warga: 'Nationality / Country of Origin',
  p_paspor: 'Passport Number',
  i_exp: 'Passport Expiry Date',
  i_male: 'Male',
  i_female: 'Female',
  i_gender: 'Gender',
  i_dob: 'Date of Birth',
  i_email: 'Personal Email',
  i_wa: 'WhatsApp / Phone Number',
  i_sB: 'Academic Background (Home Institution)',
  i_univ: 'Home University Name',
  i_major: 'Major',
  i_dept: 'Department',
  i_bach: 'Bachelor',
  i_mast: 'Master',
  i_dip: 'Diploma',
  i_deg: 'Current Degree Level',
  i_sC: 'Program Selection at PNJ',
  i_t1: 'Exchange Semester',
  i_t2: 'Short Course / Cultural Immersion',
  i_t3: 'Summer Program',
  i_t4: 'Research Internship',
  i_type: 'Inbound Program Type',
  i_host: 'Host Department at PNJ',
  i_ph_period: 'e.g. Odd Semester 2026/2027',
  i_period: 'Intended Study Period',
  i_sD: 'Document Uploads (PDF/JPG)',
  i_h_pass: 'Valid for at least 6â€“12 months',
  i_d_pass: 'Passport Scan Page',
  i_d_trans: 'Official Academic Transcript',
  i_d_foto: 'Formal Passport Photo (Red/White Background)',
  i_d_eng: 'English Proficiency Certificate / Recommendation Letter from Home University',
  i_h_health: 'Required for residence permit / visa processing',
  i_d_health: 'Health Statement / Medical Clearance',
  ph_nip: 'Enter a dash (-) if PPPK / non-civil servant',
  ph_namajab: 'As written in the letter',
  b_tpl: 'Template',
  n_home: 'Home',
  s_svc: 'Services',
  g1t: 'Grand Opening',
  g1d: 'Opening of a cooperation program with international partners.',
  g2t: 'Summer Camp',
  g2d: 'Student exchange in the Green Summer Camp 2026 program.',
  g3t: 'Future Tech Seminar',
  g3d: 'A future technology seminar with guests from Indonesia and abroad.',
  g4t: 'International Computer Students',
  g4d: 'Cooperation with global universities in the computing (ICT) cluster.',
  g5t: 'Space Exhibition',
  g5d: 'Exhibition and club for global space research.',
  tk_t: "Can't find your answer?",
  tk_d: 'Send a question ticket. We will reply by email.',
  tk_nama: 'Name',
  tk_email: 'Email',
  tk_topik: 'Topic',
  tk_isi: 'Your Question',
  tk_ph: 'Write your question in as much detail as you can...',
  tk_akun: 'Account & Login',
  tk_dok: 'Documents & Upload',
  tk_kirim: 'Send Ticket',
  tk_ok: 'Ticket sent',
  tk_ok_d: 'Our reply will be sent to this email:',
  tk_again: 'Send Another Ticket',
};
const J = {
  id: {
    st_baru: 'Baru Diajukan',
    st_verifikasi: 'Verifikasi Dokumen',
    st_setneg: 'Menunggu Setneg',
    st_disetujui: 'Disetujui',
    st_ditolak: 'Ditolak',
    g_proses: 'Sedang Proses',
    g_disetujui: 'Disetujui',
    g_ditolak: 'Ditolak',
    total: 'TOTAL',
    unit: 'pengajuan',
    ppl: 'orang',
    j_dosen: 'Dosen',
    j_tendik: 'Tenaga Kependidikan',
    j_pimp: 'Pimpinan',
    j_mhs: 'Mahasiswa',
    more: 'Selengkapnya',
    less: 'Sembunyikan',
    fill: 'Isi Laporan',
    show: 'Menampilkan',
    of: 'dari',
    prev: 'Sebelumnya',
    next: 'Berikutnya',
    page: 'Halaman',
    hlNone: 'Belum ada pengajuan',
    hlCap: 'Pengajuan bulan ini',
    hlNew: 'Pengajuan Terbaru',
    lpPick: 'Pilih pengajuan yang sudah disetujui',
    lpNone: 'Belum ada pengajuan yang disetujui',
    th_no: 'No',
    th_keg: 'Nama Kegiatan',
    th_pes: 'Nama Peserta',
    th_jab: 'Jabatan',
    th_tmp: 'Tempat Kegiatan',
    th_aju: 'Diajukan',
    th_st: 'Status',
    th_prog: 'Progress',
    th_cat: 'Catatan / Aksi',
    newReq: 'Kegiatan baru',
    repDone: 'Laporan terkirim',
    invalid: 'Masih ada isian wajib yang belum lengkap',
    big: 'Ukuran file melebihi 5 MB',
    soon: 'Fitur ini segera hadir',
    max: 'Maksimal 10 orang per pengajuan',
    tplSoon: 'Template belum tersedia',
    in: 'Berhasil masuk',
    out: 'Anda telah keluar',
    reset: 'Kosongkan seluruh isian form?',
    cut: 'Data peserta tambahan akan dihapus. Lanjutkan?',
    accBtn: 'AKUN SAYA',
    tNo: 'Nomor tiket',
    tMod: 'Layanan',
    tAt: 'Dikirim',
    tDoc: 'Dokumen terunggah',
    tPe: 'Jumlah peserta',
    tSt: 'Status',
    wait: 'Menunggu Verifikasi',
    date: 'Tanggal selesai tidak boleh lebih awal dari tanggal mulai',
  },
  en: {
    st_baru: 'Newly Submitted',
    st_verifikasi: 'Document Verification',
    st_setneg: 'Awaiting Setneg',
    st_disetujui: 'Approved',
    st_ditolak: 'Rejected',
    g_proses: 'In Progress',
    g_disetujui: 'Approved',
    g_ditolak: 'Rejected',
    total: 'TOTAL',
    unit: 'requests',
    ppl: 'people',
    j_dosen: 'Lecturer',
    j_tendik: 'Education Staff',
    j_pimp: 'Leadership',
    j_mhs: 'Student',
    more: 'Read more',
    less: 'Show less',
    fill: 'Submit Report',
    show: 'Showing',
    of: 'of',
    prev: 'Previous',
    next: 'Next',
    page: 'Page',
    hlNone: 'No requests yet',
    hlCap: 'Requests this month',
    hlNew: 'Latest Request',
    lpPick: 'Choose an approved request',
    lpNone: 'No approved requests yet',
    th_no: 'No',
    th_keg: 'Activity Name',
    th_pes: 'Participant',
    th_jab: 'Position',
    th_tmp: 'Location',
    th_aju: 'Submitted',
    th_st: 'Status',
    th_prog: 'Progress',
    th_cat: 'Notes / Action',
    newReq: 'New activity',
    repDone: 'Report submitted',
    invalid: 'Some required fields are incomplete',
    big: 'File exceeds 5 MB',
    soon: 'Coming soon',
    max: 'Maximum 10 people per request',
    tplSoon: 'Template not available yet',
    in: 'Signed in',
    out: 'You have been signed out',
    reset: 'Clear all form fields?',
    cut: 'Additional participant data will be removed. Continue?',
    accBtn: 'MY ACCOUNT',
    tNo: 'Ticket number',
    tMod: 'Service',
    tAt: 'Sent',
    tDoc: 'Documents uploaded',
    tPe: 'Participants',
    tSt: 'Status',
    wait: 'Awaiting Verification',
    date: "End date can't be earlier than the start date",
  },
};

/* ---------- 2. UTIL ---------- */
const $ = (s, r = document) => r.querySelector(s);
const $$ = (s, r = document) => [...r.querySelectorAll(s)];
let lang = 'id';
try {
  lang = localStorage.getItem('io_lang') || 'id';
} catch (e) {}
let user = null;
const T = (k) => J[lang][k];
const esc = (s) =>
  String(s).replace(
    /[&<>"']/g,
    (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' })[c],
  );

function applyLang(root = document) {
  $$('[data-i18n]', root).forEach((el) => {
    if (el.dataset.id === undefined) el.dataset.id = el.innerHTML;
    el.innerHTML = lang === 'en' && EN[el.dataset.i18n] ? EN[el.dataset.i18n] : el.dataset.id;
  });
  $$('[data-i18n-ph]', root).forEach((el) => {
    if (el.dataset.phid === undefined) el.dataset.phid = el.getAttribute('placeholder') || '';
    const k = el.dataset.i18nPh;
    el.placeholder = lang === 'en' && EN[k] ? EN[k] : el.dataset.phid;
  });
}
function setLang(l) {
  lang = l;
  try {
    localStorage.setItem('io_lang', l);
  } catch (e) {}
  document.documentElement.lang = l;
  $$('[data-lang]').forEach((b) => b.classList.toggle('on', b.dataset.lang === l));
  applyLang();
  syncAuthUI();
  buildTicker();
  if (typeof renderPdln === 'function') renderPdln();
}
/* marquee */
const TK_WORDS = ['INTERNATIONAL PNJ', 'EXCHANGE', 'COLLABORATION', 'VISITS', 'RESEARCH'];
const TK = { id: TK_WORDS, en: TK_WORDS };
function buildTicker() {
  const tk = $('#tk');
  if (!tk) return;
  const row = TK[lang].map((x) => `<span>${x}</span>`).join('');
  tk.innerHTML =
    row.repeat(6); /* 6 salinan, geser -50% = 3 salinan: selalu penuh di layar lebar */
}
function toast(msg, warn) {
  const t = document.createElement('div');
  t.className = 'toast' + (warn ? ' warn' : '');
  t.textContent = msg;
  $('#toasts').appendChild(t);
  setTimeout(() => t.remove(), 3200);
}

/* ---------- 3. ROUTER ---------- */
const PAGES = ['home', 'outbound', 'inbound', 'pdln', 'login', 'register', 'profile'];
const SUBS = ['dash', 'input', 'progress', 'laporan'];
let curPage = 'home',
  curSub = 'dash';
function setNav() {
  const faq = $('#faq');
  const atFaq =
    curPage === 'home' && faq && faq.getBoundingClientRect().top < window.innerHeight * 0.5;
  $$('.nav a').forEach((a) =>
    a.classList.toggle('active', atFaq ? a.dataset.page === 'faq' : a.dataset.page === curPage),
  );
}
function showSub(sub) {
  curSub = sub;
  $$('.psub').forEach((x) => x.classList.toggle('active', x.id === 'psub-' + sub));
  $$('.psb-main a').forEach((a) => a.classList.toggle('active', a.dataset.sub === sub));
  if (sub === 'dash' || sub === 'progress') renderPdln();
}
function scrollToAcc(id) {
  const d = $('#acc-' + id);
  if (!d) return;
  d.open = true;
  const off = ($('.top').offsetHeight || 0) + ($('#psubbar').offsetHeight || 0) + 14;
  setTimeout(
    () =>
      window.scrollTo({
        top: d.getBoundingClientRect().top + window.scrollY - off,
        behavior: 'smooth',
      }),
    60,
  );
}
function go(p) {
  closeDrawer();
  let [base, sub] = String(p || '').split('/');
  const toFaq = base === 'faq';
  if (toFaq) base = 'home';
  if (!PAGES.includes(base)) base = 'home';
  const changed = curPage !== base;
  curPage = base;
  $$('.page').forEach((x) => x.classList.toggle('active', x.id === 'page-' + base));
  if (toFaq) {
    history.replaceState(null, '', '#faq');
    setTimeout(
      () => {
        $('#faq').scrollIntoView({ behavior: 'smooth' });
        setNav();
      },
      changed ? 80 : 0,
    );
    setNav();
    return;
  }
  setNav();
  let hash = base;
  if (base === 'pdln') {
    const aux = sub === 'panduan' || sub === 'template';
    if (aux) {
      const sw = curSub !== 'dash';
      if (sw) showSub('dash');
      hash = 'pdln/' + sub;
      setTimeout(() => scrollToAcc(sub), changed || sw ? 150 : 0);
    } else {
      showSub(SUBS.includes(sub) ? sub : 'dash');
      hash = curSub === 'dash' ? 'pdln' : 'pdln/' + curSub;
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  } else if (base === 'profile') {
    const profPage = $('#page-profile');
    if (!profPage) {
      window.location.href = 'profile.html' + (sub ? '#' + sub : '');
      return;
    }
    if (typeof switchProfileTab === 'function') {
      switchProfileTab(sub || 'profil');
    }
    hash = sub ? 'profile/' + sub : 'profile';
    window.scrollTo({ top: 0, behavior: 'smooth' });
  } else window.scrollTo({ top: 0, behavior: 'smooth' });
  if (location.hash !== '#' + hash) history.replaceState(null, '', '#' + hash);
}
window.addEventListener('scroll', setNav, { passive: true });
document.addEventListener('click', (e) => {
  const g = e.target.closest('[data-go]');
  if (g) {
    e.preventDefault();
    go(g.dataset.go);
  }
});

/* ---------- 4. DRAWER & LOGIN ---------- */
const drawer = $('#drawer'),
  scrim = $('#scrim');
function openDrawer() {
  if (drawer) {
    drawer.classList.add('open');
    drawer.setAttribute('aria-hidden', 'false');
  }
  if (scrim) {
    scrim.classList.add('on');
  }
}
function closeDrawer() {
  if (drawer) {
    drawer.classList.remove('open');
    drawer.setAttribute('aria-hidden', 'true');
  }
  if (scrim) {
    scrim.classList.remove('on');
  }
}
const burgerBtn = $('#burger'),
  drawerCloseBtn = $('#drawerClose');
if (burgerBtn) burgerBtn.onclick = openDrawer;
if (drawerCloseBtn) drawerCloseBtn.onclick = closeDrawer;
if (scrim) scrim.onclick = closeDrawer;
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    closeDrawer();
    $$('.modal.open').forEach((m) => m.classList.remove('open'));
  }
});
$$('[data-soon]').forEach((b) => (b.onclick = () => toast(T('soon'))));
$$('[data-lang]').forEach((b) => (b.onclick = () => setLang(b.dataset.lang)));

function openModal(id) {
  $('#' + id).classList.add('open');
}
$$('.modal').forEach((m) =>
  m.addEventListener('mousedown', (e) => {
    if (e.target === m) m.classList.remove('open');
  }),
);
$$('[data-close]').forEach((b) => (b.onclick = () => b.closest('.modal').classList.remove('open')));

function syncAuthUI() {
  const av = $('#avatar'),
    nm = $('#uName'),
    mt = $('#uMeta'),
    ab = $('#authBtn'),
    hb = $('#heroLogin');
  if (user) {
    av.textContent = user.name[0].toUpperCase();
    av.classList.remove('guest');
    nm.removeAttribute('data-i18n');
    nm.textContent = user.name;
    mt.removeAttribute('data-i18n');
    mt.textContent = user.id;
    ab.className = 'btn danger';
    ab.removeAttribute('data-i18n');
    ab.textContent = EN.m_logout;
    ab.textContent = 'Logout';
    hb.textContent = T('accBtn');
    $('#burger').classList.add('dot');
  } else {
    av.textContent = '?';
    av.classList.add('guest');
    nm.setAttribute('data-i18n', 'belum');
    mt.setAttribute('data-i18n', 'silakan');
    nm.innerHTML = lang === 'en' ? EN.belum : 'Belum masuk';
    mt.innerHTML = lang === 'en' ? EN.silakan : 'Silakan login untuk melanjutkan';
    ab.className = 'btn slate';
    ab.setAttribute('data-i18n', 'm_login');
    ab.textContent = lang === 'en' ? EN.m_login : 'Login';
    if (hb) hb.textContent = 'LOGIN';
    const bg = $('#burger');
    if (bg) bg.classList.remove('dot');
  }
}
const abBtn = $('#authBtn'),
  hlBtn = $('#heroLogin'),
  lfForm = $('#loginForm');
if (abBtn)
  abBtn.onclick = () => {
    if (user) {
      user = null;
      syncAuthUI();
      toast(T('out'));
      closeDrawer();
    } else {
      closeDrawer();
      go('login');
    }
  };
if (hlBtn)
  hlBtn.onclick = () => {
    if (user) openDrawer();
    else go('login');
  };
if (lfForm)
  lfForm.onsubmit = (e) => {
    e.preventDefault();
    const lgU = $('#lgUser');
    const id = lgU ? lgU.value.trim() : '';
    if (!id) return;
    const base = id.split('@')[0].replace(/[._-]+/g, ' ');
    const name = base.replace(/\b\w/g, (c) => c.toUpperCase());
    user = { name: name || 'Pengguna', id: id };
    const lm = $('#loginModal');
    if (lm) lm.classList.remove('open');
    e.target.reset();
    syncAuthUI();
    toast(T('in'));
    $$('[data-auto=email]').forEach((i) => {
      if (!i.value && id.includes('@')) i.value = id;
    });
    $$('[data-auto=name]').forEach((i) => {
      if (!i.value) i.value = user.name;
    });
  };

/* ===== AUTH PAGES INTERACTION (LOGIN, SSO, REGISTER) ===== */
// 1. Submit Form Login Halaman Penuh
const fLogin = $('#f-login');
if (fLogin) {
  fLogin.addEventListener('submit', (e) => {
    e.preventDefault();
    const idInput = $('#loginUser'),
      passInput = $('#loginPassword');
    const id = idInput ? idInput.value.trim() : '';
    const pass = passInput ? passInput.value.trim() : '';
    let valid = true;

    if (!id) {
      if (idInput) idInput.closest('.f').classList.add('invalid');
      valid = false;
    }
    if (!pass) {
      if (passInput) passInput.closest('.f').classList.add('invalid');
      valid = false;
    }
    if (!valid) {
      toast(T('invalid') || 'Silakan lengkapi kolom yang wajib diisi', true);
      return;
    }

    const base = id.split('@')[0].replace(/[._-]+/g, ' ');
    const name = base.replace(/\b\w/g, (c) => c.toUpperCase());
    user = { name: name || 'Pengguna', id: id };
    fLogin.reset();
    syncAuthUI();
    toast(T('in') || 'Berhasil masuk');
    go('home');
  });
}

// 2. Klik Login SSO PNJ
document.addEventListener('click', (e) => {
  const ssoBtn = e.target.closest('#btnSsoLogin');
  if (!ssoBtn) return;
  e.preventDefault();
  user = { name: 'Sivitas PNJ (Dosen/Mhs)', id: 'sivitas@pnj.ac.id' };
  syncAuthUI();
  toast('Berhasil masuk via Single Sign-On PNJ');
  go('home');
});

// 3. Toggle Lihat Password (Eye Icon)
document.addEventListener('click', (e) => {
  const eyeBtn = e.target.closest('.btn-eye');
  if (!eyeBtn) return;
  const targetId = eyeBtn.dataset.toggle;
  const input = targetId ? $('#' + targetId) : eyeBtn.previousElementSibling;
  if (!input) return;
  if (input.type === 'password') {
    input.type = 'text';
    eyeBtn.classList.add('show');
  } else {
    input.type = 'password';
    eyeBtn.classList.remove('show');
  }
});

// 4. Tab Switcher Kategori Registrasi (Sivitas PNJ vs Mahasiswa Luar)
document.addEventListener('click', (e) => {
  const tabBtn = e.target.closest('.reg-cat-card');
  if (!tabBtn) return;
  const targetPaneId = tabBtn.dataset.target;
  if (!targetPaneId) return;

  $$('.reg-cat-card').forEach((b) => {
    const isCur = b === tabBtn;
    b.classList.toggle('active', isCur);
    b.setAttribute('aria-selected', isCur ? 'true' : 'false');
  });

  $$('.reg-pane').forEach((p) => {
    p.classList.toggle('active', p.id === targetPaneId);
  });
});

// 5. Submit Form Registrasi Sivitas PNJ & Eksternal
['f-register-pnj', 'f-register-ext'].forEach((fid) => {
  const form = $('#' + fid);
  if (!form) return;
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    let first = null;
    $$('.f', form).forEach((f) => {
      const c = $('input,select,textarea', f);
      if (!c || !c.required) return;
      let ok = c.value.trim() !== '';
      if (ok && c.type === 'email') ok = c.checkValidity();
      if (c.type === 'password' && c.name.includes('confirm')) {
        const orig = $('input[name=password]', form);
        if (orig && orig.value !== c.value) ok = false;
      }
      f.classList.toggle('invalid', !ok);
      if (!ok && !first) first = f;
    });

    const terms = $('input[type=checkbox][required]', form);
    if (terms && !terms.checked) {
      toast('Silakan centang pernyataan persetujuan terlebih dahulu', true);
      return;
    }

    if (first) {
      toast(T('invalid') || 'Silakan lengkapi formulir pendaftaran dengan benar', true);
      $('input,select,textarea', first).focus();
      return;
    }

    const nameInput = $('input[name=nama]', form);
    const emailInput = $('input[name=email]', form);
    const userName = nameInput ? nameInput.value.trim() : 'Pendaftar Baru';
    const userEmail = emailInput ? emailInput.value.trim() : '';

    user = { name: userName, id: userEmail };
    form.reset();
    syncAuthUI();
    toast('Pendaftaran berhasil! Selamat datang, ' + userName);
    go('home');
  });
});

/* galeri */
(function () {
  const tr = $('#galTrack');
  if (!tr) return;
  const slides = $$('.slide', tr),
    n = slides.length,
    cnt = $('#galCnt');
  if (!cnt || n === 0) return;
  const step = () =>
    slides.length > 1
      ? slides[1].offsetLeft - slides[0].offsetLeft || slides[0].offsetWidth + 16
      : tr.clientWidth;
  const atEnd = () => tr.scrollLeft + tr.clientWidth >= tr.scrollWidth - 6;
  const pad = (v) => String(v).padStart(2, '0');
  let paused = false;
  function idx() {
    return Math.min(n - 1, Math.max(0, Math.round(tr.scrollLeft / step())));
  }
  function show() {
    if (cnt) cnt.textContent = pad(atEnd() ? n : idx() + 1) + ' / ' + pad(n);
  }
  function to(i) {
    i = Math.max(0, Math.min(n - 1, i));
    tr.scrollTo({ left: i * step(), behavior: 'smooth' });
  }
  function next() {
    if (atEnd()) tr.scrollTo({ left: 0, behavior: 'smooth' });
    else to(idx() + 1);
  }
  function prev() {
    if (tr.scrollLeft < 6) tr.scrollTo({ left: tr.scrollWidth, behavior: 'smooth' });
    else to(idx() - 1);
  }
  const gNext = $('#galNext'),
    gPrev = $('#galPrev');
  if (gNext) gNext.onclick = next;
  if (gPrev) gPrev.onclick = prev;
  tr.addEventListener('scroll', show, { passive: true });
  window.addEventListener('resize', show);
  show();

  slides.forEach((s) =>
    s.addEventListener('click', (e) => {
      const was = s.classList.contains('open');
      slides.forEach((x) => x.classList.remove('open'));
      if (!was) s.classList.add('open');
      e.stopPropagation();
    }),
  );
  slides.forEach((s) =>
    s.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        s.click();
      }
    }),
  );
  document.addEventListener('click', () => slides.forEach((x) => x.classList.remove('open')));

  const rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  ['mouseenter', 'focusin', 'touchstart'].forEach((ev) =>
    tr.addEventListener(ev, () => (paused = true), { passive: true }),
  );
  ['mouseleave', 'focusout'].forEach((ev) => tr.addEventListener(ev, () => (paused = false)));
  if (!rm)
    setInterval(() => {
      const homePage = $('#page-home');
      if (
        !paused &&
        !document.hidden &&
        homePage &&
        homePage.classList.contains('active') &&
        !$('.slide.open')
      )
        next();
    }, 4500);
})();

/* tiket */
(function () {
  const form = $('#tktForm');
  if (!form) return;
  const wrap = $('#tkWrap'),
    done = $('#tkDone');
  const clear = (e) => {
    const f = e.target.closest('.f');
    if (f) f.classList.remove('invalid');
  };
  form.addEventListener('input', clear);
  form.addEventListener('change', clear);
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    let first = null;
    $$('.f', form).forEach((f) => {
      const c = $('input,select,textarea', f);
      if (!c || !c.required) return;
      let ok = c.value.trim() !== '';
      if (ok && c.type === 'email') ok = c.checkValidity();
      f.classList.toggle('invalid', !ok);
      if (!ok && !first) first = f;
    });
    if (first) {
      toast(T('invalid'), true);
      $('input,select,textarea', first).focus();
      return;
    }
    const tkNo = $('#tkNo'),
      tkMail = $('#tkMail');
    if (tkNo) tkNo.textContent = 'TKT-2026-' + String(Math.floor(1000 + Math.random() * 9000));
    if (tkMail) tkMail.textContent = $('input[type=email]', form).value.trim();
    if (wrap) wrap.hidden = true;
    if (done) done.hidden = false;
  });
  const tkAgain = $('#tkAgain');
  if (tkAgain) {
    tkAgain.onclick = () => {
      form.reset();
      $$('.f.invalid', form).forEach((f) => f.classList.remove('invalid'));
      if (done) done.hidden = true;
      if (wrap) wrap.hidden = false;
      $$('[data-auto=email]', form).forEach((i) => {
        if (user && user.id.includes('@')) i.value = user.id;
      });
      $$('[data-auto=name]', form).forEach((i) => {
        if (user) i.value = user.name;
      });
    };
  }
})();

/* ---------- 5. FORM ---------- */
function enhance(root) {
  $$('.f', root).forEach((f) => {
    if (!f.querySelector('.err'))
      f.insertAdjacentHTML(
        'beforeend',
        '<small class="err" data-i18n="err_req">Wajib diisi atau format belum sesuai</small>',
      );
  });
  $$('input[type=date]', root).forEach((i) => {
    if (i.dataset.role === 'start') i.min = new Date().toISOString().slice(0, 10);
  });
  applyLang(root);
}
function dropHTML(k, label, req) {
  return `<div class="f"><div class="lrow"><label data-i18n="${k}">${label}
  </label></div><div class="drop"><input type="file" ${req ? 'required' : ''} accept=".pdf,.jpg,.jpeg,.png">
  <div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span>
  <small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>`;
}
function updateDrop(inp) {
  const d = inp.closest('.drop'),
    ul = $('.files', d),
    f = inp.files[0];
  if (f && f.size > 5 * 1048576) {
    toast(T('big'), true);
    inp.value = '';
    return updateDrop(inp);
  }
  if (f) {
    d.classList.add('has');
    ul.innerHTML = `<li><span>${esc(f.name)}</span><em>${Math.max(1, Math.round(f.size / 1024))} KB</em><button type="button" class="rm" aria-label="Remove">✕</button></li>`;
  } else {
    d.classList.remove('has');
    ul.innerHTML = '';
  }
}
document.addEventListener('change', (e) => {
  const t = e.target;
  if (t.matches('.drop input[type=file]')) updateDrop(t);
  if (t.matches('input[data-role=start]')) {
    const form = t.closest('form');
    const end = $('input[data-role=end]', form);
    if (end) {
      end.min = t.value || '';
      if (end.value && t.value && end.value < t.value) end.value = '';
    }
  }
});
document.addEventListener('click', (e) => {
  const rm = e.target.closest('.files .rm');
  if (rm) {
    e.preventDefault();
    const inp = $('input[type=file]', rm.closest('.drop'));
    inp.value = '';
    updateDrop(inp);
    inp.dispatchEvent(new Event('input', { bubbles: true }));
  }
});
['dragenter', 'dragover'].forEach((ev) =>
  document.addEventListener(ev, (e) => {
    const d = e.target.closest && e.target.closest('.drop');
    if (d) d.classList.add('over');
  }),
);
['dragleave', 'drop'].forEach((ev) =>
  document.addEventListener(ev, (e) => {
    const d = e.target.closest && e.target.closest('.drop');
    if (d) d.classList.remove('over');
  }),
);

/* progress */
function requiredCtl(form) {
  return $$('input[required],select[required],textarea[required]', form);
}
function isFilled(c) {
  return c.type === 'file' ? c.files.length > 0 : c.value.trim() !== '';
}
function updateProgress(form) {
  const list = requiredCtl(form);
  if (!list.length) return;
  const pct = Math.round((list.filter(isFilled).length / list.length) * 100);
  const wrap = form.closest('.wrap');
  if (!wrap) return;
  const pg = wrap.querySelector('.progress');
  if (!pg) return;
  const iEl = $('i', pg),
    bEl = $('b', pg);
  if (iEl) iEl.style.width = pct + '%';
  if (bEl) bEl.textContent = pct + '%';
  pg.classList.toggle('full', pct === 100);
}
['input', 'change'].forEach((ev) =>
  document.addEventListener(ev, (e) => {
    const form = e.target.closest && e.target.closest('form.shell');
    if (!form) return;
    const f = e.target.closest('.f');
    if (f) f.classList.remove('invalid');
    updateProgress(form);
  }),
);

function validate(form) {
  let first = null;
  $$('.f', form).forEach((f) => {
    const c = $('input:not([type=checkbox]),select,textarea', f);
    if (!c || !c.required) {
      return;
    }
    let ok = isFilled(c);
    if (ok && c.type === 'email') ok = c.checkValidity();
    if (ok && c.dataset.max) {
      const v = parseFloat(c.value.replace(',', '.'));
      ok = !isNaN(v) && v >= 0 && v <= parseFloat(c.dataset.max);
    }
    if (ok && c.dataset.role === 'end') {
      const s = $('input[data-role=start]', form);
      if (s && s.value && c.value < s.value) ok = false;
    }
    f.classList.toggle('invalid', !ok);
    if (!ok && !first) first = f;
  });
  return first;
}
function resetForm(form) {
  form.reset();
  $$('.drop', form).forEach((d) => {
    d.classList.remove('has');
    $('.files', d).innerHTML = '';
  });
  $$('.f.invalid', form).forEach((f) => f.classList.remove('invalid'));
  const pl = $('.plist', form);
  if (pl) {
    pl.innerHTML = '';
    addP(pl, false);
  }
  updateProgress(form);
}
$$('form.shell').forEach((form) => {
  if (form.classList.contains('reg-shell')) return;
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const bad = validate(form);
    if (bad) {
      toast(T('invalid'), true);
      bad.scrollIntoView({ behavior: 'smooth', block: 'center' });
      const c = $('input,select,textarea', bad);
      if (c && c.type !== 'file') setTimeout(() => c.focus({ preventScroll: true }), 350);
      return;
    }
    const mod = form.dataset.mod,
      no = mod + '-2026-' + String(Math.floor(1000 + Math.random() * 9000));
    const docs = $$('input[type=file]', form).filter((i) => i.files.length).length;
    const pe = $$('.pcard', form).length || 1;
    const now = new Date().toLocaleString(lang === 'en' ? 'en-GB' : 'id-ID', {
      dateStyle: 'medium',
      timeStyle: 'short',
    });
    $('#okSum').innerHTML =
      `<div><span>${T('tNo')}</span><b>${no}</b></div><div><span>${T('tMod')}</span><b>${mod}</b></div>` +
      `<div><span>${T('tAt')}</span><b>${now}</b></div><div><span>${T('tDoc')}</span><b>${docs}</b></div>` +
      (mod === 'LAPORAN' ? '' : `<div><span>${T('tPe')}</span><b>${pe}</b></div>`) +
      `<div><span>${T('tSt')}</span><b class="tag">${T('wait')}</b></div>`;
    if (mod === 'PDLN') pdlnAdd(form);
    if (mod === 'LAPORAN') pdlnReport(form);
    okSetup(form);
    $('#okAgain').dataset.form = form.id;
    $('#okHome').dataset.go = form.dataset.okGo || 'home';
    openModal('okModal');
  });
  const resetBtn = $('[data-reset]', form);
  if (resetBtn) {
    resetBtn.onclick = () => {
      if (confirm(T('reset'))) resetForm(form);
    };
  }
});
const okHome = $('#okHome'),
  okAgain = $('#okAgain');
if (okHome)
  okHome.onclick = () => {
    const againBtn = $('#okAgain');
    const fid = againBtn ? againBtn.dataset.form : '';
    const f = fid ? $('#' + fid) : null;
    if (f) resetForm(f);
    const om = $('#okModal');
    if (om) om.classList.remove('open');
    go(okHome.dataset.go || 'home');
  };
if (okAgain)
  okAgain.onclick = () => {
    const fid = okAgain ? okAgain.dataset.form : '';
    const f = fid ? $('#' + fid) : null;
    if (f) resetForm(f);
    const om = $('#okModal');
    if (om) om.classList.remove('open');
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

/* ---------- 6. PESERTA ---------- */
function pCardHTML(variant, rm) {
  const name = variant === 'inbound' ? 'Tamu' : 'Peserta';
  const key = variant === 'inbound' ? 'tamu' : 'peserta';
  let body;
  if (variant === 'inbound') {
    body = `
      <div class="f"><label data-i18n="g_nama">Nama Lengkap (sesuai paspor)</label><input type="text" required></div>
      <div class="f"><label data-i18n="g_warga">Kewarganegaraan</label><input type="text" required></div>
      <div class="f"><label data-i18n="p_paspor">Nomor Paspor</label><input type="text" required></div>
      <div class="f"><label data-i18n="g_jab">Jabatan / Afiliasi</label><input type="text" required></div>
      <div class="f"><label data-i18n="p_email">Email Peserta</label><input type="email" required></div>
      <div class="f"><label data-i18n="p_telp">Nomor Telepon</label><input type="tel"></div>
      <div class="full">${dropHTML('g_pasf', 'Scan Paspor (halaman data)', true)}</div>`;
  } else {
    body = `
      <div class="f"><label data-i18n="p_nama">Nama Lengkap & Gelar</label><input type="text" required data-k="pnama"></div>
      <div class="f"><label>NIP</label><input type="text" required placeholder="Isi strip (-) jika PPPK/Non PNS" data-i18n-ph="ph_nip"></div>
      <div class="f"><label data-i18n="p_nik">NIK</label><input type="text" required inputmode="numeric" maxlength="16"></div>
      <div class="f"><label data-i18n="p_paspor">Nomor Paspor</label><input type="text" required></div>
      <div class="f"><label data-i18n="p_jenjab">Jenis Jabatan</label>
        <select required data-k="pjab"><option value="" data-i18n="j_pilih">Pilih jabatan</option><option data-i18n="j_dosen">Dosen</option><option data-i18n="j_tendik">Tenaga Kependidikan</option><option data-i18n="j_pimp">Pimpinan</option><option data-i18n="j_mhs">Mahasiswa</option></select></div>
      <div class="f"><label data-i18n="p_namajab">Nama Jabatan</label><input type="text" required placeholder="Sesuai tertera dalam surat" data-i18n-ph="ph_namajab"></div>
      <div class="f"><label data-i18n="p_email">Email Peserta</label><input type="email" required></div>
      <div class="f"><label data-i18n="p_telp">Nomor Telepon</label><input type="tel" required inputmode="tel"></div>
      ${dropHTML('p_ktp', 'KTP', false)}
      ${dropHTML('p_pasf', 'Paspor', false)}`;
  }
  return `<div class="pcard"><div class="p-head"><h4><span data-i18n="${key}">${name}</span> <span class="pn">1</span></h4>${rm ? '<button type="button" class="rm-p" data-i18n="rm">Hapus</button>' : ''}</div><div class="grid">${body}</div></div>`;
}
function renumber(pl) {
  $$('.pcard', pl).forEach((c, i) => {
    $('.pn', c).textContent = i + 1;
  });
}
function addP(pl, rm) {
  const wrap = document.createElement('div');
  wrap.innerHTML = pCardHTML(pl.dataset.variant, rm);
  const card = wrap.firstElementChild;
  pl.appendChild(card);
  renumber(pl);
  enhance(card);
  return card;
}
['pdln'].forEach((mod) => {
  /* add peserta PDLN */
  const pl = $('#pl-' + mod),
    add = $('#add-' + mod);
  if (!pl || !add) return;
  const form = pl.closest('form');
  addP(pl, false);
  add.onclick = () => {
    if ($$('.pcard', pl).length >= 10) return toast(T('max'), true);
    const c = addP(pl, true);
    if (form) updateProgress(form);
    c.scrollIntoView({ behavior: 'smooth', block: 'center' });
  };
  pl.addEventListener('click', (e) => {
    const r = e.target.closest('.rm-p');
    if (!r) return;
    r.closest('.pcard').remove();
    renumber(pl);
    if (form) updateProgress(form);
  });
});

/* ---------- 7. PDLN: data dummy, dashboard, progress ----------*/
const NEG = {
  jp: { id: 'Jepang', en: 'Japan' },
  us: { id: 'Amerika Serikat', en: 'United States' },
  cn: { id: 'Tiongkok', en: 'China' },
  my: { id: 'Malaysia', en: 'Malaysia' },
  au: { id: 'Australia', en: 'Australia' },
  de: { id: 'Jerman', en: 'Germany' },
  kr: { id: 'Korea Selatan', en: 'South Korea' },
  nl: { id: 'Belanda', en: 'Netherlands' },
};
const dAgo = (n) => {
  const t = new Date();
  t.setDate(t.getDate() - n);
  return (
    t.getFullYear() +
    '-' +
    String(t.getMonth() + 1).padStart(2, '0') +
    '-' +
    String(t.getDate()).padStart(2, '0')
  );
};
const PDLN_DATA = [
  {
    kegiatan: 'Benchmarking Sistem Penjaminan Mutu',
    peserta: ['Dr. Rina Kusumawati, M.T.'],
    jab: 'dosen',
    kota: 'Beijing',
    neg: 'cn',
    d: dAgo(0),
    st: 'baru',
    prog: 20,
    lap: false,
    note: null,
  },
  {
    kegiatan: 'International Conference on Applied Engineering',
    peserta: ['Bagas Pratama, M.Kom.', 'Sekar Ayu Lestari, M.T.'],
    jab: 'dosen',
    kota: 'Tokyo',
    neg: 'jp',
    d: dAgo(0),
    st: 'verifikasi',
    prog: 40,
    lap: false,
    note: {
      id: 'Scan paspor halaman data kurang jelas. Mohon unggah ulang dengan resolusi lebih tinggi.',
      en: 'The passport data page scan is unclear. Please re-upload it in a higher resolution.',
    },
  },
  {
    kegiatan: 'Student Exchange Program Orientation',
    peserta: ['Fadli Ramadhan'],
    jab: 'mahasiswa',
    kota: 'Kuala Lumpur',
    neg: 'my',
    d: dAgo(16),
    st: 'setneg',
    prog: 70,
    lap: false,
    note: {
      id: 'Berkas sudah lengkap, saat ini menunggu persetujuan Sekretariat Negara.',
      en: 'Documents are complete; currently awaiting approval from the State Secretariat.',
    },
  },
  {
    kegiatan: 'Workshop Kurikulum Vokasi Berbasis Industri',
    peserta: ['Ir. Hendra Wijaya, M.M.'],
    jab: 'pimpinan',
    kota: 'Sydney',
    neg: 'au',
    d: dAgo(24),
    st: 'baru',
    prog: 20,
    lap: false,
    note: null,
  },
  {
    kegiatan: 'Joint Research Meeting Smart Manufacturing',
    peserta: ['Dewi Anggraini, Ph.D.', 'Yusuf Maulana, M.Sc.'],
    jab: 'dosen',
    kota: 'Munich',
    neg: 'de',
    d: dAgo(41),
    st: 'disetujui',
    prog: 100,
    lap: true,
    note: null,
  },
  {
    kegiatan: 'Seminar Internasional Pendidikan Teknik',
    peserta: ['Nurul Hidayati, M.Pd.'],
    jab: 'tendik',
    kota: 'Osaka',
    neg: 'jp',
    d: dAgo(58),
    st: 'disetujui',
    prog: 100,
    lap: true,
    note: null,
  },
  {
    kegiatan: 'Technology Transfer Visit',
    peserta: ['Prof. Andi Setiawan, Ph.D.'],
    jab: 'pimpinan',
    kota: 'Seoul',
    neg: 'kr',
    d: dAgo(77),
    st: 'disetujui',
    prog: 100,
    lap: false,
    note: {
      id: 'Disetujui. Silakan proses Paspor Dinas dan Exit Permit.',
      en: 'Approved. Please process the Official Passport and Exit Permit.',
    },
  },
  {
    kegiatan: 'Pelatihan Pengelolaan Laboratorium Digital',
    peserta: ['Ayu Wulandari, S.T.'],
    jab: 'tendik',
    kota: 'Boston',
    neg: 'us',
    d: dAgo(95),
    st: 'disetujui',
    prog: 100,
    lap: true,
    note: null,
  },
  {
    kegiatan: 'Kunjungan Industri Manufaktur Otomotif',
    peserta: ['Rizky Maulana', 'Putri Salsabila', 'Dimas Aditya'],
    jab: 'mahasiswa',
    kota: 'Nagoya',
    neg: 'jp',
    d: dAgo(120),
    st: 'disetujui',
    prog: 100,
    lap: false,
    note: null,
  },
  {
    kegiatan: 'Konferensi Energi Terbarukan Asia',
    peserta: ['Dr. Maya Puspita, M.Eng.'],
    jab: 'dosen',
    kota: 'Delft',
    neg: 'nl',
    d: dAgo(150),
    st: 'disetujui',
    prog: 100,
    lap: false,
    note: null,
  },
  {
    kegiatan: 'Studi Banding Pusat Karier',
    peserta: ['Eko Prasetyo, S.Kom.'],
    jab: 'tendik',
    kota: 'California',
    neg: 'us',
    d: dAgo(175),
    st: 'disetujui',
    prog: 100,
    lap: false,
    note: null,
  },
  {
    kegiatan: 'Pameran Inovasi Teknologi Terapan',
    peserta: ['Lukman Hakim, M.T.'],
    jab: 'dosen',
    kota: 'Shanghai',
    neg: 'cn',
    d: dAgo(200),
    st: 'ditolak',
    prog: 40,
    lap: false,
    note: {
      id: 'Surat Tugas belum ditandatangani pimpinan. Mohon lengkapi, lalu ajukan kembali sebagai pengajuan baru.',
      en: 'The Assignment Letter has not been signed by the leader. Please complete it and resubmit as a new request.',
    },
  },
];
const GRP = {
  baru: 'proses',
  verifikasi: 'proses',
  setneg: 'proses',
  disetujui: 'disetujui',
  ditolak: 'ditolak',
};
const GCOL = { proses: 'var(--c-wait)', disetujui: 'var(--c-ok)', ditolak: 'var(--c-no)' };
const STIC = { proses: 'i-hourglass', disetujui: 'i-check', ditolak: 'i-x' };
const ICON = (n) => `<svg class="ic" aria-hidden="true"><use href="#i-${n}"/></svg>`;
const locale = () => (lang === 'en' ? 'en-GB' : 'id-ID');
const fmtD = (d) => {
  const [y, m, dd] = d.split('-');
  return `${dd}/${m}/${y}`;
};
const negName = (x) => (NEG[x] ? NEG[x][lang] : x);
const place = (x) => (x.kota ? `${x.kota}, ${negName(x.neg)}` : negName(x.neg));
const pct = (n, t) => (t ? Math.round((n / t) * 100) : 0);
let PG = { q: '', jab: '', st: '', so: 'new', page: 1 };
const PSZ = 6;

/* tooltip grafik (textContent) */
function tipShow(x, y, title, sub) {
  const tip = $('#tip');
  if (!tip) return;
  tip.innerHTML = '';
  const b = document.createElement('b');
  b.textContent = title;
  tip.appendChild(b);
  if (sub) {
    const sp = document.createElement('span');
    sp.textContent = sub;
    tip.appendChild(sp);
  }
  tip.hidden = false;
  const w = tip.offsetWidth,
    h = tip.offsetHeight;
  tip.style.left = Math.max(8, Math.min(x + 14, window.innerWidth - w - 8)) + 'px';
  tip.style.top = Math.max(8, Math.min(y - h - 10, window.innerHeight - h - 8)) + 'px';
}
const tipHide = () => {
  const tip = $('#tip');
  if (tip) tip.hidden = true;
};
function bindTip(el, title, sub) {
  if (!el) return;
  el.addEventListener('mousemove', (e) => tipShow(e.clientX, e.clientY, title, sub));
  el.addEventListener('mouseleave', tipHide);
  el.addEventListener('focus', () => {
    const r = el.getBoundingClientRect();
    tipShow(r.left + r.width / 2, r.top, title, sub);
  });
  el.addEventListener('blur', tipHide);
}

function renderDash() {
  if (!$('#donutBox')) return;
  const D = PDLN_DATA,
    tot = D.length;
  /* KPI */
  const k = {
    'kp-setneg': D.filter((x) => x.st === 'disetujui').length,
    'kp-paspor': D.filter((x) => x.st === 'disetujui').length,
    'kp-laporan': D.filter((x) => x.lap).length,
  };
  const rm = matchMedia('(prefers-reduced-motion:reduce)').matches;
  Object.keys(k).forEach((id) => {
    const el = $('#' + id),
      to = k[id],
      from = +el.dataset.v || 0;
    el.dataset.v = to;
    if (rm || from === to) {
      el.textContent = to;
      return;
    }
    const t0 = performance.now();
    (function f(t) {
      const r = Math.min(1, (t - t0) / 600);
      el.textContent = Math.round(from + (to - from) * (1 - Math.pow(1 - r, 3)));
      if (r < 1) requestAnimationFrame(f);
    })(t0);
  });
  /* donut */
  const groups = ['proses', 'disetujui', 'ditolak'].map((g) => ({
    g,
    n: D.filter((x) => GRP[x.st] === g).length,
  }));
  const R = 86,
    C = 2 * Math.PI * R,
    GAP = 3,
    nz = groups.filter((x) => x.n > 0).length;
  let off = 0,
    arcs = '';
  groups.forEach((x) => {
    if (!x.n) return;
    const len = (C * x.n) / tot,
      vis = nz > 1 ? Math.max(len - GAP, 1) : len;
    arcs += `<circle class="arc" data-g="${x.g}" cx="100" cy="100" r="${R}" stroke="${GCOL[x.g]}" stroke-dasharray="${vis.toFixed(2)} ${(C - vis).toFixed(2)}" stroke-dashoffset="${(-off).toFixed(2)}" transform="rotate(-90 100 100)" tabindex="0" role="img" aria-label="${esc(T('g_' + x.g))}: ${x.n} (${pct(x.n, tot)}%)"/>`;
    off += len;
  });
  const box = $('#donutBox');
  box.innerHTML =
    `<div class="donut"><svg viewBox="0 0 200 200" role="group" aria-label="${esc(T('g_proses'))}, ${esc(T('g_disetujui'))}, ${esc(T('g_ditolak'))}"><circle class="ring" cx="100" cy="100" r="${R}"/>${arcs}<text class="dn" x="100" y="108">${tot}</text><text class="dl" x="100" y="130">${T('total')}</text></svg></div>` +
    `<ul class="lg">${groups.map((x) => `<li><button type="button" class="lgr" data-g="${x.g}"><i style="background:${GCOL[x.g]}"></i><span>${esc(T('g_' + x.g))}</span><b>${x.n}</b><em>${pct(x.n, tot)}%</em></button></li>`).join('')}</ul>`;
  const dn = $('.donut', box);
  const hl = (g) => {
    if (g) dn.dataset.hl = g;
    else delete dn.dataset.hl;
    $$('.lgr', box).forEach((b) => b.classList.toggle('on', b.dataset.g === g));
  };
  $$('.arc', box).forEach((a) => {
    const x = groups.find((q) => q.g === a.dataset.g);
    bindTip(a, T('g_' + x.g), `${x.n} ${T('unit')} Â· ${pct(x.n, tot)}%`);
    a.addEventListener('mouseenter', () => hl(x.g));
    a.addEventListener('mouseleave', () => hl(null));
    a.addEventListener('focus', () => hl(x.g));
    a.addEventListener('blur', () => hl(null));
  });
  $$('.lgr', box).forEach((b) => {
    b.addEventListener('mouseenter', () => hl(b.dataset.g));
    b.addEventListener('mouseleave', () => hl(null));
    b.addEventListener('focus', () => hl(b.dataset.g));
    b.addEventListener('blur', () => hl(null));
    b.addEventListener('click', () => {
      PG = { q: '', jab: '', st: b.dataset.g, so: 'new', page: 1 };
      go('pdln/progress');
    });
  });
  /* negara */
  const cnt = {};
  D.forEach((x) => {
    cnt[x.neg] = (cnt[x.neg] || 0) + 1;
  });
  const top = Object.entries(cnt)
      .sort((a, b) => b[1] - a[1] || negName(a[0]).localeCompare(negName(b[0])))
      .slice(0, 5),
    mx = top.length ? top[0][1] : 1;
  $('#rankBox').innerHTML =
    `<ul class="rank">${top.map(([n, c], i) => `<li><button type="button" class="rk" data-n="${esc(n)}"><span class="rk-n">${i + 1}</span><span><span class="rk-name">${esc(negName(n))}</span><span class="rk-bar"><i style="--w:${((c / mx) * 100).toFixed(1)}"></i><b>${c}</b></span></span></button></li>`).join('')}</ul>`;
  $$('.rk', $('#rankBox')).forEach((b) => {
    const c = cnt[b.dataset.n];
    bindTip(b, negName(b.dataset.n), `${c} ${T('unit')}`);
    b.addEventListener('click', () => {
      PG = { q: negName(b.dataset.n), jab: '', st: '', so: 'new', page: 1 };
      go('pdln/progress');
    });
  });
  /* highlight */
  const now = new Date(),
    ym = now.getFullYear() + '-' + String(now.getMonth() + 1).padStart(2, '0');
  const month = D.filter((x) => x.d.startsWith(ym)).length;
  const newest = D.slice().sort((a, b) => b.d.localeCompare(a.d))[0];
  const mlabel = now
    .toLocaleDateString(locale(), { month: 'short', year: 'numeric' })
    .toUpperCase();
  $('#hlBox').innerHTML =
    `<div class="hl"><div class="hl-m">${ICON('cal')}<span>${esc(mlabel)}</span></div><b class="hl-n">${month}</b><span class="hl-c">${T('hlCap')}</span></div>` +
    `<div class="nw-h">${ICON('pin')}<span>${T('hlNew')}</span></div>` +
    (newest
      ? `<div class="nw"><b>${esc(newest.kegiatan)}</b><p>${ICON('user')}<span>${esc(newest.peserta[0])}${newest.peserta.length > 1 ? ' +' + (newest.peserta.length - 1) : ''}</span></p><p>${ICON('globe')}<span>${esc(place(newest))}</span></p><p>${ICON('cal')}<span>${fmtD(newest.d)}</span></p>${stChip(newest)}</div>`
      : `<p class="none">${T('hlNone')}</p>`);
}
function stChip(x) {
  const g = GRP[x.st];
  return `<span class="st g-${g}">${ICON(STIC[g])}${esc(T('st_' + x.st))}</span>`;
}

function filtered() {
  const q = PG.q.trim().toLowerCase();
  let L = PDLN_DATA.filter((x) => {
    if (PG.jab && x.jab !== PG.jab) return false;
    if (PG.st && PG.st !== x.st && PG.st !== GRP[x.st]) return false;
    if (q) {
      const hay = [
        x.kegiatan,
        x.peserta.join(' '),
        x.kota,
        NEG[x.neg] ? NEG[x.neg].id + ' ' + NEG[x.neg].en : x.neg,
      ]
        .join(' ')
        .toLowerCase();
      if (!hay.includes(q)) return false;
    }
    return true;
  });
  const so = PG.so;
  L.sort((a, b) =>
    so === 'old'
      ? a.d.localeCompare(b.d)
      : so === 'az'
        ? a.kegiatan.localeCompare(b.kegiatan)
        : so === 'prog'
          ? b.prog - a.prog || b.d.localeCompare(a.d)
          : b.d.localeCompare(a.d),
  );
  return L;
}
function renderProgress() {
  if (!$('#ptb')) return;
  const L = filtered(),
    pages = Math.max(1, Math.ceil(L.length / PSZ));
  PG.page = Math.min(Math.max(1, PG.page), pages);
  const from = (PG.page - 1) * PSZ,
    rows = L.slice(from, from + PSZ);
  $('#fq').value = PG.q;
  $('#fjab').value = PG.jab;
  $('#fst').value = PG.st;
  $('#fso').value = PG.so;
  const L10 = (k) => esc(T(k));
  $('#ptb').innerHTML = rows
    .map((x, i) => {
      const g = GRP[x.st],
        n = x.note ? x.note[lang] : '';
      const act = n
        ? `<div class="nt">${esc(n)}</div>${n.length > 70 ? `<button type="button" class="lnk" data-more>${L10('more')}</button>` : ''}`
        : '';
      const rep =
        x.st === 'disetujui' && !x.lap
          ? `<button type="button" class="mini" data-rep="${PDLN_DATA.indexOf(x)}">${L10('fill')}</button>`
          : '';
      return (
        `<tr><td data-l="${L10('th_no')}">${from + i + 1}</td>` +
        `<td class="cv" data-l="${L10('th_keg')}"><span class="t-keg">${esc(x.kegiatan)}</span></td>` +
        `<td data-l="${L10('th_pes')}"><span class="pill">${esc(x.peserta[0])}</span>${x.peserta.length > 1 ? `<span class="pn2">+${x.peserta.length - 1}</span>` : ''}</td>` +
        `<td data-l="${L10('th_jab')}">${L10('j_' + ({ pimpinan: 'pimp', mahasiswa: 'mhs' }[x.jab] || x.jab))}</td>` +
        `<td data-l="${L10('th_tmp')}">${esc(place(x))}</td>` +
        `<td data-l="${L10('th_aju')}">${fmtD(x.d)}</td>` +
        `<td data-l="${L10('th_st')}">${stChip(x)}</td>` +
        `<td data-l="${L10('th_prog')}"><div class="pb g-${g}"><span class="pbt"><i style="width:${x.prog}%"></i></span><em>${x.prog}%</em></div></td>` +
        `<td class="cv" data-l="${L10('th_cat')}">${act || (rep ? '' : '<span class="dsh">â€“</span>')}${rep}</td></tr>`
      );
    })
    .join('');
  $('#pEmpty').hidden = L.length > 0;
  $('.twrap', $('#psub-progress')).hidden = L.length === 0;
  $('#pInfo').textContent = L.length
    ? `${T('show')} ${from + 1}â€“${from + rows.length} ${T('of')} ${L.length}`
    : '';
  const pg = $('#pPager');
  pg.innerHTML = '';
  if (pages > 1) {
    const mk = (label, p, cls, dis, aria) => {
      const b = document.createElement('button');
      b.type = 'button';
      b.textContent = label;
      if (cls) b.className = cls;
      b.disabled = dis;
      if (aria) b.setAttribute('aria-label', aria);
      b.onclick = () => {
        PG.page = p;
        renderProgress();
      };
      pg.appendChild(b);
    };
    mk('â€¹', PG.page - 1, '', PG.page === 1, T('prev'));
    for (let p = 1; p <= pages; p++)
      mk(String(p), p, p === PG.page ? 'on' : '', false, T('page') + ' ' + p);
    mk('â€º', PG.page + 1, '', PG.page === pages, T('next'));
  }
}
function renderLapSelect() {
  if (!$('#lpRel')) return;
  const sel = $('#lpRel'),
    prev = sel.value;
  const opts = PDLN_DATA.map((x, i) => ({ x, i })).filter(
    (o) => o.x.st === 'disetujui' && !o.x.lap,
  );
  sel.innerHTML =
    `<option value="">${esc(opts.length ? T('lpPick') : T('lpNone'))}</option>` +
    opts
      .map((o) => `<option value="${o.i}">${esc(o.x.kegiatan)} â€” ${esc(place(o.x))}</option>`)
      .join('');
  if (opts.some((o) => String(o.i) === prev)) sel.value = prev;
}
function renderPdln() {
  renderDash();
  renderProgress();
  renderLapSelect();
}

/* filter */
(function () {
  const fq = $('#fq');
  if (!fq) return;
  const upd = () => {
    PG.page = 1;
    renderProgress();
  };
  let tm;
  fq.addEventListener('input', (e) => {
    PG.q = e.target.value;
    clearTimeout(tm);
    tm = setTimeout(upd, 120);
  });
  [
    ['fjab', 'jab'],
    ['fst', 'st'],
    ['fso', 'so'],
  ].forEach(([id, k]) => {
    const el = $('#' + id);
    if (el)
      el.addEventListener('change', (e) => {
        PG[k] = e.target.value;
        upd();
      });
  });
  const reset = () => {
    PG = { q: '', jab: '', st: '', so: 'new', page: 1 };
    renderProgress();
  };
  const fre = $('#fre'),
    fre2 = $('#fre2');
  if (fre) fre.onclick = reset;
  if (fre2) fre2.onclick = reset;
  const ptb = $('#ptb');
  if (ptb) {
    ptb.addEventListener('click', (e) => {
      const m = e.target.closest('[data-more]');
      if (m) {
        const nt = m.previousElementSibling;
        const o = nt.classList.toggle('open');
        m.textContent = T(o ? 'less' : 'more');
        return;
      }
      const r = e.target.closest('[data-rep]');
      if (r) {
        go('pdln/laporan');
        setTimeout(() => {
          const lp = $('#lpRel');
          if (lp) lp.value = r.dataset.rep;
          const fl = $('#f-laporan');
          if (fl) updateProgress(fl);
        }, 80);
      }
    });
  }
})();

function pdlnAdd(form) {
  const names = $$('[data-k=pnama]', form)
    .map((i) => i.value.trim())
    .filter(Boolean);
  const jabs = ['', 'dosen', 'tendik', 'pimpinan', 'mahasiswa'];
  const sel = $('[data-k=pjab]', form),
    tmp = ($('[data-k=tempat]', form).value || '').trim(),
    parts = tmp
      .split(',')
      .map((x) => x.trim())
      .filter(Boolean);
  const neg = parts.length > 1 ? parts.pop() : parts[0] || '-',
    kota = parts.join(', ');
  const found = Object.keys(NEG).find(
    (k) =>
      NEG[k].id.toLowerCase() === neg.toLowerCase() ||
      NEG[k].en.toLowerCase() === neg.toLowerCase(),
  );
  PDLN_DATA.unshift({
    kegiatan: $('[data-k=kegiatan]', form).value.trim(),
    peserta: names.length ? names : ['-'],
    jab: jabs[sel ? sel.selectedIndex : 1] || 'dosen',
    kota: kota,
    neg: found || neg,
    d: dAgo(0),
    st: 'baru',
    prog: 20,
    lap: false,
    note: null,
  });
  PG = { q: '', jab: '', st: '', so: 'new', page: 1 };
  renderPdln();
}
function pdlnReport(form) {
  const i = +$('#lpRel', form).value;
  if (PDLN_DATA[i]) {
    PDLN_DATA[i].lap = true;
  }
  renderPdln();
}

const OK_ID = {
  ok_t: 'Pengajuan Terkirim',
  ok_note: 'Pantau statusnya lewat menu Pengajuan Saya.',
  ok_home: 'Ke Beranda',
  ok_again: 'Ajukan Lagi',
  okN_pdln: 'Pantau statusnya di menu Progress PDLN.',
  okT_lap: 'Laporan Terkirim',
  okN_lap: 'Terima kasih. Laporan akan diverifikasi oleh Admin.',
  goProg: 'Lihat Progress',
  goDash: 'Dashboard PDLN',
  againRep: 'Laporan Lain',
};
function okSetup(form) {
  const d = form.dataset,
    set = (sel, key) => {
      const el = $(sel);
      el.dataset.i18n = key;
      el.dataset.id = OK_ID[key];
    };
  set('#okModal h3', d.okT || 'ok_t');
  set('#okModal p', d.okN || 'ok_note');
  set('#okHome', d.okGok || 'ok_home');
  set('#okAgain', d.okAk || 'ok_again');
  applyLang($('#okModal'));
}

/*link unduhan template PDLN di sini */
const TPL_LINK = {
  tor: '',
  memo: '',
  tugas: '',
  undangan: '',
  jadwal: '',
  setneg: '',
  relevansi: '',
  pembiayaan: '',
  mou: '',
  laporan: '',
};
document.addEventListener('click', (e) => {
  const b = e.target.closest('.tpl');
  if (!b) return;
  e.preventDefault();
  const u = TPL_LINK[b.dataset.tpl];
  if (u) window.open(u, '_blank', 'noopener');
  else toast(T('tplSoon'));
});

/* ---------- PROFIL & ROLE SYSTEM ---------- */
const roleDB = {
  mahasiswa: {
    initial: "A",
    name: "Asna Qonita",
    email: "snqnt1812@gmail.com",
    badge: "Mahasiswa PNJ",
    idLabel: "Nomor Induk Mahasiswa (NIM)",
    idVal: "2507411018",
    navPengajuanTitle: "Riwayat Outbound",
    activeCount: "1 Berkas Aktif",
    btnApplyText: "+ BUAT PENGAJUAN OUTBOUND",
    btnApplyGo: "outbound",
    cardBadge: "MAHASISWA",
    secTitle: "Informasi Identitas Mahasiswa",
    formHTML: `
      <div class="f">
        <div class="lrow">
          <label>NIM (Nomor Induk Mahasiswa)</label>
          <span class="bdg">PRIMARY KEY</span>
        </div>
        <input type="text" id="profNIM" value="2507411018" readonly style="background:#F2FBFB;font-weight:700;">
      </div>
      <div class="f">
        <label>Nama Lengkap Sesuai KTP / Paspor</label>
        <input type="text" id="profNama" value="Asna Qonita" required>
      </div>
      <div class="f">
        <label>Email Mahasiswa Aktif</label>
        <input type="email" id="profEmail" value="snqnt1812@gmail.com" required>
      </div>
      <div class="f">
        <label>Nomor WhatsApp Aktif</label>
        <input type="tel" id="profWA" value="081234567890" required>
      </div>
      <div class="f">
        <label>Tempat Lahir</label>
        <input type="text" id="profTmpLahir" value="Jakarta" required>
      </div>
      <div class="f">
        <label>Tanggal Lahir</label>
        <input type="date" id="profTglLahir" value="2004-12-18" required>
      </div>
      <div class="f">
        <label>Jenis Kelamin</label>
        <select id="profGender" required>
          <option selected>Perempuan</option>
          <option>Laki-Laki</option>
        </select>
      </div>
      <div class="f">
        <label>Jurusan</label>
        <input type="text" id="profJurusan" value="Teknik Informatika dan Komputer" required>
      </div>
      <div class="f">
        <label>Program Studi</label>
        <input type="text" id="profProdi" value="Teknik Informatika" required>
      </div>
      <div class="f">
        <label>Semester / Angkatan</label>
        <input type="text" id="profSemester" value="Semester 5 / 2024" required>
      </div>
      <div class="f full">
        <label>Alamat Domisili Sekarang</label>
        <textarea id="profAlamat" rows="2" required>Jl. Prof. DR. G.A. Siwabessy, Kampus PNJ Depok, Jawa Barat 16425</textarea>
      </div>
    `,
    historyHTML: `
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
          <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px;" onclick="toast('Menampilkan detail pengajuan Outbound...')">Lihat Detail</button>
        </div>
      </div>
    `
  },
  sivitas: {
    initial: "H",
    name: "Dr. Hendra Wijaya, S.T., M.T.",
    email: "hendra@pnj.ac.id",
    badge: "Sivitas (Dosen / Tendik)",
    idLabel: "Nomor Induk Pegawai (NIP/NIDN)",
    idVal: "197804122005011002",
    navPengajuanTitle: "Riwayat PDLN",
    activeCount: "1 Berkas Selesai",
    btnApplyText: "+ PENGAJUAN PDLN BARU",
    btnApplyGo: "pdln/input",
    cardBadge: "DOSEN / SIVITAS",
    secTitle: "Informasi Identitas Sivitas (Dosen/Tendik)",
    formHTML: `
      <div class="f">
        <div class="lrow">
          <label>NIP / NIDN Pegawai</label>
          <span class="bdg">PRIMARY KEY</span>
        </div>
        <input type="text" id="profNIP" value="197804122005011002" readonly style="background:#F2FBFB;font-weight:700;">
      </div>
      <div class="f">
        <label>Nama Lengkap Tanpa Gelar</label>
        <input type="text" id="profNama" value="Hendra Wijaya" required>
      </div>
      <div class="f">
        <label>Gelar Depan</label>
        <input type="text" id="profGelarDepan" value="Dr.">
      </div>
      <div class="f">
        <label>Gelar Belakang</label>
        <input type="text" id="profGelarBelakang" value="S.T., M.T.">
      </div>
      <div class="f">
        <label>Email Resmi PNJ</label>
        <input type="email" id="profEmail" value="hendra@pnj.ac.id" required>
      </div>
      <div class="f">
        <label>Nomor WhatsApp</label>
        <input type="tel" id="profWA" value="085678901234" required>
      </div>
      <div class="f">
        <label>Jabatan Fungsional / Struktural</label>
        <select id="profJabatan" required>
          <option selected>Lektor Kepala</option>
          <option>Lektor</option>
          <option>Asisten Ahli</option>
          <option>Tenaga Kependidikan</option>
        </select>
      </div>
      <div class="f">
        <label>Unit Kerja / Jurusan Asal</label>
        <input type="text" id="profUnit" value="Jurusan Teknik Elektro" required>
      </div>
    `,
    historyHTML: `
      <div class="profile-sub-item">
        <div class="profile-sub-info">
          <div style="display:flex;gap:8px;align-items:center;">
            <span class="bdg" style="background:var(--t600);color:#fff;">PDLN</span>
            <span class="st g-disetujui" style="font-size:11.5px;">Surat SP Terbit</span>
          </div>
          <h4>Izin Setneg: Seminar Internasional IEEE ICEEE</h4>
          <p>Tujuan: Berlin, Jerman · Jenis: Konferensi Ilmiah · No. SP: 241/SP-PDLN/PNJ/2026</p>
        </div>
        <div style="display:flex;align-items:center;gap:12px;">
          <div style="text-align:right;">
            <span style="font-size:12px;color:var(--muted);display:block;">Progress</span>
            <b style="color:var(--t700);font-size:15px;">100%</b>
          </div>
          <button type="button" class="btn main" style="padding:8px 16px;font-size:11.5px;" onclick="toast('Mengunduh Surat Persetujuan (SP) PDF...')">Unduh SP PDF</button>
        </div>
      </div>
    `
  },
  eksternal: {
    initial: "K",
    name: "Kenji Takahashi",
    email: "kenji@gunma.ac.jp",
    badge: "External / Inbound Guest",
    idLabel: "Passport Number",
    idVal: "TK8891201",
    navPengajuanTitle: "My Inbound Records",
    activeCount: "1 Active Request",
    btnApplyText: "+ APPLY INBOUND REQUEST",
    btnApplyGo: "inbound",
    cardBadge: "INBOUND GUEST",
    secTitle: "External Guest & Student Information",
    formHTML: `
      <div class="f">
        <div class="lrow">
          <label>Passport Number</label>
          <span class="bdg">PRIMARY KEY</span>
        </div>
        <input type="text" id="profPassport" value="TK8891201" readonly style="background:#F2FBFB;font-weight:700;">
      </div>
      <div class="f">
        <label>Full Name (as in Passport)</label>
        <input type="text" id="profNama" value="Kenji Takahashi" required>
      </div>
      <div class="f">
        <label>Nationality / Country</label>
        <input type="text" id="profNationality" value="Japan" required>
      </div>
      <div class="f">
        <label>Active Email Address</label>
        <input type="email" id="profEmail" value="kenji@gunma.ac.jp" required>
      </div>
      <div class="f">
        <label>Contact Phone / WhatsApp</label>
        <input type="tel" id="profWA" value="+81 90 1234 5678" required>
      </div>
      <div class="f">
        <label>Date of Birth</label>
        <input type="date" id="profDOB" value="1998-08-22" required>
      </div>
      <div class="f">
        <label>Origin Institution / University</label>
        <input type="text" id="profOrigin" value="National Institute of Technology (NIT), Gunma College" required>
      </div>
      <div class="f">
        <label>Host Department in PNJ</label>
        <input type="text" id="profHost" value="Informatics and Computer Engineering" required>
      </div>
    `,
    historyHTML: `
      <div class="profile-sub-item">
        <div class="profile-sub-info">
          <div style="display:flex;gap:8px;align-items:center;">
            <span class="bdg" style="background:var(--t400);color:var(--t900);">INBOUND</span>
            <span class="st g-proses" style="font-size:11.5px;">Awaiting LoA</span>
          </div>
          <h4>Joint Research Collaboration Visit</h4>
          <p>Host: PNJ TIK Department · Duration: 30 Days · Ref Code: INB-2026-089</p>
        </div>
        <div style="display:flex;align-items:center;gap:12px;">
          <div style="text-align:right;">
            <span style="font-size:12px;color:var(--muted);display:block;">Progress</span>
            <b style="color:var(--t700);font-size:15px;">60%</b>
          </div>
          <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px;" onclick="toast('Opening Inbound details...')">View Details</button>
        </div>
      </div>
    `
  }
};

let currentRole = 'mahasiswa';

/* Helper LocalStorage Database Pengguna */
function getUsersDB() {
  try {
    return JSON.parse(localStorage.getItem('io_users_db')) || [];
  } catch (e) {
    return [];
  }
}

function saveUserToDB(u) {
  const db = getUsersDB();
  const idx = db.findIndex(x => (x.id && x.id === u.id) || (x.email && x.email.toLowerCase() === u.email.toLowerCase()));
  if (idx >= 0) {
    db[idx] = Object.assign(db[idx], u);
  } else {
    db.push(u);
  }
  try {
    localStorage.setItem('io_users_db', JSON.stringify(db));
    localStorage.setItem('io_current_user', JSON.stringify(u));
  } catch (e) {}
}

function findUserInDB(ident) {
  if (!ident) return null;
  const db = getUsersDB();
  const q = String(ident).trim().toLowerCase();
  return db.find(u => (u.id && String(u.id).toLowerCase() === q) || (u.email && u.email.toLowerCase() === q) || (u.nama && u.nama.toLowerCase() === q)) || null;
}

function getCurrentUserSession() {
  try {
    const s = localStorage.getItem('io_current_user');
    if (s) return JSON.parse(s);
  } catch (e) {}
  return null;
}

function changeSystemRole(roleKey, customData, showToast = true) {
  // Normalisasi role
  if (roleKey === 'dosen' || roleKey === 'tendik') roleKey = 'civitas';
  if (!roleDB[roleKey]) roleKey = 'mahasiswa';
  currentRole = roleKey;

  const data = roleDB[roleKey];
  const userObj = Object.assign({}, data, customData || {});
  userObj.role = roleKey;
  userObj.name = userObj.nama || userObj.name || data.name;
  userObj.initial = userObj.name ? userObj.name[0].toUpperCase() : data.initial;

  // 1. Sinkronkan Dropdown Selector di Atas Header
  const sel = document.getElementById('role-selector');
  if (sel) sel.value = roleKey;

  // 2. Toggle Tampilan Blok Form Sesuai ERD
  const formMhs = document.getElementById('form-fields-mahasiswa');
  const formCiv = document.getElementById('form-fields-civitas');
  const formExt = document.getElementById('form-fields-eksternal');
  if (formMhs) formMhs.style.display = (roleKey === 'mahasiswa') ? 'grid' : 'none';
  if (formCiv) formCiv.style.display = (roleKey === 'civitas') ? 'grid' : 'none';
  if (formExt) formExt.style.display = (roleKey === 'eksternal') ? 'grid' : 'none';

  // Toggle Judul Seksi Form
  const secT = document.getElementById('pane-profil-sec-title');
  if (secT) secT.textContent = data.secTitle;

  // Isi Field Input Sesuai ERD (Jika ada customData atau dari database/default)
  if (roleKey === 'mahasiswa') {
    const fNim = document.getElementById('profMhsNim'); if (fNim) fNim.value = userObj.nim || userObj.id || data.idVal;
    const fNama = document.getElementById('profMhsNama'); if (fNama) fNama.value = userObj.name;
    const fEmail = document.getElementById('profMhsEmail'); if (fEmail) fEmail.value = userObj.email || data.email;
    const fWa = document.getElementById('profMhsWA'); if (fWa) fWa.value = userObj.whatsapp || userObj.no_hp || '081234567890';
    const fJur = document.getElementById('profMhsJurusan'); if (fJur && userObj.jurusan) fJur.value = userObj.jurusan;
    const fPro = document.getElementById('profMhsProdi'); if (fPro && userObj.prodi) fPro.value = userObj.prodi;
  } else if (roleKey === 'civitas') {
    const fNip = document.getElementById('profCivNip'); if (fNip) fNip.value = userObj.nip || userObj.id || data.idVal;
    const fNama = document.getElementById('profCivNama'); if (fNama) fNama.value = userObj.nama_asli || userObj.name;
    const fEmail = document.getElementById('profCivEmail'); if (fEmail) fEmail.value = userObj.email || data.email;
    const fWa = document.getElementById('profCivWA'); if (fWa) fWa.value = userObj.whatsapp || userObj.no_hp || '085678901234';
    const fUnit = document.getElementById('profCivUnit'); if (fUnit && (userObj.unit_kerja || userObj.jurusan)) fUnit.value = userObj.unit_kerja || userObj.jurusan;
  } else if (roleKey === 'eksternal') {
    const fPas = document.getElementById('profExtPaspor'); if (fPas) fPas.value = userObj.no_paspor || userObj.id || data.idVal;
    const fNama = document.getElementById('profExtNama'); if (fNama) fNama.value = userObj.name;
    const fEmail = document.getElementById('profExtEmail'); if (fEmail) fEmail.value = userObj.email || data.email;
    const fWa = document.getElementById('profExtPhone'); if (fWa) fWa.value = userObj.whatsapp || userObj.no_telp || '+81 90 1234 5678';
    const fInst = document.getElementById('profExtInstansi'); if (fInst && userObj.asal_instansi) fInst.value = userObj.asal_instansi;
    const fNeg = document.getElementById('profExtNegara'); if (fNeg && userObj.negara_asal) fNeg.value = userObj.negara_asal;
  }

  // 3. Update Kolom Kiri: Kartu Profil Sidebar
  const sideAv = document.getElementById('side-avatar'); if (sideAv) sideAv.textContent = userObj.initial;
  const sideNm = document.getElementById('side-name'); if (sideNm) sideNm.textContent = userObj.name;
  const sideEm = document.getElementById('side-email'); if (sideEm) sideEm.textContent = userObj.email || data.email;
  const sideBdg = document.getElementById('side-badge'); if (sideBdg) sideBdg.textContent = data.badge;
  const sideLbl = document.getElementById('side-id-label'); if (sideLbl) sideLbl.textContent = data.idLabel;
  const sideVal = document.getElementById('side-id-val'); if (sideVal) sideVal.textContent = userObj.id || userObj.nim || userObj.nip || userObj.no_paspor || data.idVal;
  const menuPeng = document.getElementById('menu-txt-pengajuan'); if (menuPeng) menuPeng.textContent = data.navPengajuanTitle;

  // 4. Update Header Drawer Akun
  const drwAv = document.getElementById('drawer-avatar') || document.getElementById('avatar'); if (drwAv) { drwAv.textContent = userObj.initial; drwAv.classList.remove('guest'); }
  const drwNm = document.getElementById('drawer-user-name') || document.getElementById('uName'); if (drwNm) drwNm.textContent = userObj.name;
  const drwMt = document.getElementById('drawer-user-meta') || document.getElementById('uMeta'); if (drwMt) drwMt.textContent = `${userObj.id || data.idVal} · ${data.badge}`;
  const drwLblPeng = document.getElementById('drawer-label-pengajuan'); if (drwLblPeng) drwLblPeng.textContent = data.navPengajuanTitle;

  // 5. Update Tab Riwayat & Pengajuan
  const actCnt = document.getElementById('dash-active-count'); if (actCnt) actCnt.textContent = data.activeCount;
  const btnApply = document.getElementById('btn-buat-pengajuan');
  if (btnApply) {
    btnApply.textContent = data.btnApplyText;
    btnApply.setAttribute('data-go', data.btnApplyGo);
    if (btnApply.tagName === 'A') btnApply.href = '#' + data.btnApplyGo;
  }

  // Toggle Kelompok Riwayat
  const hMhs = document.getElementById('history-items-mahasiswa'); if (hMhs) hMhs.style.display = (roleKey === 'mahasiswa') ? 'block' : 'none';
  const hCiv = document.getElementById('history-items-civitas'); if (hCiv) hCiv.style.display = (roleKey === 'civitas') ? 'block' : 'none';
  const hExt = document.getElementById('history-items-eksternal'); if (hExt) hExt.style.display = (roleKey === 'eksternal') ? 'block' : 'none';

  // Toggle Kelompok Notifikasi
  const nMhs = document.getElementById('notif-items-mahasiswa'); if (nMhs) nMhs.style.display = (roleKey === 'mahasiswa') ? 'block' : 'none';
  const nCiv = document.getElementById('notif-items-civitas'); if (nCiv) nCiv.style.display = (roleKey === 'civitas') ? 'block' : 'none';
  const nExt = document.getElementById('notif-items-eksternal'); if (nExt) nExt.style.display = (roleKey === 'eksternal') ? 'block' : 'none';

  // 6. Update Virtual ID Card KUI
  const cardB = document.getElementById('card-badge'); if (cardB) cardB.textContent = data.cardBadge;
  const cardN = document.getElementById('card-name'); if (cardN) cardN.textContent = userObj.name.toUpperCase();
  const cardL = document.getElementById('card-id-label'); if (cardL) cardL.textContent = data.idLabel;
  const cardV = document.getElementById('card-id-val'); if (cardV) cardV.textContent = userObj.id || userObj.nim || userObj.nip || userObj.no_paspor || data.idVal;

  // Simpan Sesi Aktif
  try {
    localStorage.setItem('io_current_user', JSON.stringify(userObj));
  } catch (e) {}

  if (showToast) {
    toast(`Tampilan akun disesuaikan dengan role: ${data.badge}`);
  }
}

function initUserRole() {
  const saved = getCurrentUserSession();
  if (saved && saved.role && roleDB[saved.role]) {
    changeSystemRole(saved.role, saved, false);
    user = { name: saved.name || saved.nama, id: saved.id, role: saved.role };
  } else {
    changeSystemRole('mahasiswa', null, false);
    user = { name: roleDB.mahasiswa.name, id: roleDB.mahasiswa.idVal, role: 'mahasiswa' };
  }
  syncAuthUI();
}

/* Handler Registrasi Sivitas PNJ */
function handleRegisterPnj(e) {
  if (e) e.preventDefault();
  const fRole = $('#pnjRole') ? $('#pnjRole').value : 'mahasiswa';
  const fNama = $('#pnjNama') ? $('#pnjNama').value.trim() : '';
  const fNimNip = $('#pnjNim') ? $('#pnjNim').value.trim() : '';
  const fJurusan = $('#pnjJurusan') ? $('#pnjJurusan').value : '';
  const fProdi = $('#pnjProdi') ? $('#pnjProdi').value.trim() : '';
  const fWa = $('#pnjWa') ? $('#pnjWa').value.trim() : '';
  const fEmail = $('#pnjEmail') ? $('#pnjEmail').value.trim() : '';
  const fPass = $('#pnjPass') ? $('#pnjPass').value : '';
  const fPassConf = $('#pnjPassConf') ? $('#pnjPassConf').value : '';

  if (!fNama || !fNimNip || !fEmail) {
    toast('Harap lengkapi semua kolom pendaftaran yang wajib!', true);
    return;
  }
  if (fPass && fPassConf && fPass !== fPassConf) {
    toast('Konfirmasi kata sandi tidak cocok!', true);
    return;
  }

  const role = (fRole === 'mahasiswa') ? 'mahasiswa' : 'civitas';
  const newUser = {
    role: role,
    nama: fNama,
    name: fNama,
    id: fNimNip,
    nim: (role === 'mahasiswa') ? fNimNip : '',
    nip: (role === 'civitas') ? fNimNip : '',
    jurusan: fJurusan,
    unit_kerja: fJurusan,
    prodi: fProdi,
    whatsapp: fWa,
    no_hp: fWa,
    email: fEmail,
    jabatan: (role === 'civitas') ? (fRole === 'dosen' ? 'Dosen PNJ' : 'Tenaga Kependidikan') : ''
  };

  saveUserToDB(newUser);
  changeSystemRole(role, newUser, false);
  user = { name: fNama, id: fNimNip, role: role };
  syncAuthUI();
  toast(`Pendaftaran berhasil! Selamat datang di Portal I/O, ${fNama}.`);
  go('profile');
}

/* Handler Registrasi Mahasiswa Luar / Eksternal */
function handleRegisterExt(e) {
  if (e) e.preventDefault();
  const fNama = $('#extNama') ? $('#extNama').value.trim() : '';
  const fPaspor = $('#extIdNo') ? $('#extIdNo').value.trim() : '';
  const fInst = $('#extInst') ? $('#extInst').value.trim() : '';
  const fNeg = $('#extCountry') ? $('#extCountry').value.trim() : '';
  const fEmail = $('#extEmail') ? $('#extEmail').value.trim() : '';
  const fWa = $('#extPhone') ? $('#extPhone').value.trim() : '';
  const fPass = $('#extPass') ? $('#extPass').value : '';
  const fPassConf = $('#extPassConf') ? $('#extPassConf').value : '';

  if (!fNama || !fPaspor || !fEmail) {
    toast('Please complete all required fields!', true);
    return;
  }
  if (fPass && fPassConf && fPass !== fPassConf) {
    toast('Password confirmation does not match!', true);
    return;
  }

  const newUser = {
    role: 'eksternal',
    nama: fNama,
    name: fNama,
    id: fPaspor,
    no_paspor: fPaspor,
    asal_instansi: fInst,
    negara_asal: fNeg,
    jurusan_asal: 'International Studies',
    prodi_tujuan: 'Teknik Informatika dan Komputer',
    whatsapp: fWa,
    no_telp: fWa,
    email: fEmail
  };

  saveUserToDB(newUser);
  changeSystemRole('eksternal', newUser, false);
  user = { name: fNama, id: fPaspor, role: 'eksternal' };
  syncAuthUI();
  toast(`Registration successful! Welcome to I/O Service, ${fNama}.`);
  go('profile');
}

/* Handler Login Terintegrasi */
function handleLoginSubmit(e) {
  if (e) e.preventDefault();
  const ident = ($('#loginUser') ? $('#loginUser').value : ($('#lgUser') ? $('#lgUser').value : '')).trim();
  if (!ident) {
    toast('Silakan masukkan email, NIM, atau NIP Anda!', true);
    return;
  }

  // Cek apakah akun terdaftar di localStorage DB
  const matched = findUserInDB(ident);
  if (matched) {
    changeSystemRole(matched.role, matched, false);
    user = { name: matched.nama || matched.name, id: matched.id, role: matched.role };
    syncAuthUI();
    toast(`Selamat datang kembali, ${user.name}!`);
    go('profile');
    return;
  }

  // Deteksi otomatis role jika input baru
  let role = 'mahasiswa';
  if (/^19[0-9]{8}/.test(ident) || ident.toLowerCase().includes('dosen') || ident.toLowerCase().includes('hendra')) {
    role = 'civitas';
  } else if (/^[A-Za-z]{1,3}[0-9]{5,}/.test(ident) || ident.toLowerCase().includes('kenji') || ident.toLowerCase().includes('ext') || ident.includes('.jp')) {
    role = 'eksternal';
  }

  const def = roleDB[role];
  const logged = {
    role: role,
    nama: def.name,
    name: def.name,
    id: (ident.includes('@') ? def.idVal : ident),
    email: (ident.includes('@') ? ident : def.email)
  };

  changeSystemRole(role, logged, false);
  user = { name: logged.name, id: logged.id, role: role };
  syncAuthUI();
  toast(`Login berhasil sebagai ${def.badge}!`);
  go('profile');
}

/* Demo Quick Login */
function handleDemoLogin(roleKey) {
  const def = roleDB[roleKey];
  if (!def) return;
  const demoUser = {
    role: roleKey,
    nama: def.name,
    name: def.name,
    id: def.idVal,
    email: def.email
  };
  changeSystemRole(roleKey, demoUser, false);
  user = { name: def.name, id: def.idVal, role: roleKey };
  syncAuthUI();
  toast(`Login Demo: Masuk sebagai ${def.badge}`);
  go('profile');
}

function switchProfileTab(tabId) {
  const panes = ['profil', 'pengajuan', 'notifikasi', 'pengaturan'];
  panes.forEach(p => {
    const el = document.getElementById('pane-' + p);
    if (el) el.style.display = 'none';
    const btn = document.getElementById('tab-btn-' + p);
    if (btn) btn.classList.remove('active');
  });

  const activePane = document.getElementById('pane-' + tabId);
  if (activePane) activePane.style.display = 'block';

  const activeBtn = document.getElementById('tab-btn-' + tabId);
  if (activeBtn) activeBtn.classList.add('active');

  const titles = {
    profil: 'Profil Pengguna',
    pengajuan: (roleDB[currentRole] && roleDB[currentRole].navPengajuanTitle) || 'Riwayat Pengajuan',
    notifikasi: 'Pusat Notifikasi',
    pengaturan: 'Pengaturan Akun'
  };
  const cr = document.getElementById('crumb-active-title');
  if (cr) cr.textContent = titles[tabId] || 'Profil Pengguna';
}

function saveProfileData(e) {
  if (e) e.preventDefault();
  let updatedName = '';
  if (currentRole === 'mahasiswa') {
    const el = document.getElementById('profMhsNama');
    if (el) updatedName = el.value.trim();
  } else if (currentRole === 'civitas') {
    const el = document.getElementById('profCivNama');
    if (el) updatedName = el.value.trim();
  } else if (currentRole === 'eksternal') {
    const el = document.getElementById('profExtNama');
    if (el) updatedName = el.value.trim();
  }

  if (updatedName) {
    const sName = document.getElementById('side-name'); if (sName) sName.textContent = updatedName;
    const cName = document.getElementById('card-name'); if (cName) cName.textContent = updatedName.toUpperCase();
    const dName = document.getElementById('uName'); if (dName) dName.textContent = updatedName;
    if (user) user.name = updatedName;
  }
  toast('Data profil berhasil disimpan!');
}

function handlePasswordChange(e) {
  if (e) e.preventDefault();
  const op = document.getElementById('oldPass');
  const np = document.getElementById('newPass');
  const cp = document.getElementById('confirmPass');
  if (!op || !np || !cp) return;

  if (np.value.length < 8) {
    toast('Kata sandi baru minimal harus 8 karakter!', true);
    return;
  }
  if (np.value !== cp.value) {
    toast('Konfirmasi kata sandi tidak cocok!', true);
    return;
  }
  toast('Kata sandi berhasil diperbarui.');
  op.value = '';
  np.value = '';
  cp.value = '';
}

function saveNotificationPreferences(e) {
  if (e) e.preventDefault();
  const emailNotif = document.getElementById('chkNotifEmail') ? document.getElementById('chkNotifEmail').checked : true;
  const waNotif = document.getElementById('chkNotifWA') ? document.getElementById('chkNotifWA').checked : true;
  const newsNotif = document.getElementById('chkNotifNewsletter') ? document.getElementById('chkNotifNewsletter').checked : false;

  try {
    const prefs = { emailNotif, waNotif, newsNotif, updatedAt: new Date().toISOString() };
    localStorage.setItem('io_notif_prefs', JSON.stringify(prefs));
  } catch(err) {}

  toast('Preferensi notifikasi & komunikasi berhasil disimpan.');
}

function terminateSingleSession(btn, deviceName) {
  if (!confirm(`Cabut akses login untuk perangkat "${deviceName}"?`)) return;
  const card = btn ? btn.closest('.session-card') : null;
  if (card) {
    card.style.opacity = '0.45';
    card.style.pointerEvents = 'none';
    const actionDiv = btn.parentElement;
    if (actionDiv) {
      actionDiv.innerHTML = '<span class="st g-ditolak" style="font-size:10.5px;">AKSES DICABUT</span>';
    }
  }
  toast(`Akses untuk ${deviceName} berhasil dicabut.`);
}

function logoutOtherSessions() {
  if (!confirm('Apakah Anda yakin ingin mengeluarkan akun dari seluruh perangkat lain? Hanya sesi di perangkat ini yang tetap aktif.')) return;
  
  document.querySelectorAll('.session-card:not(.current)').forEach(card => {
    card.style.opacity = '0.45';
    card.style.pointerEvents = 'none';
    const lastCol = card.querySelector('div:last-child');
    if (lastCol) {
      lastCol.innerHTML = '<span class="st g-ditolak" style="font-size:10.5px;">SESI BERAKHIR</span>';
    }
  });

  toast('Berhasil keluar dari seluruh sesi perangkat lain.');
}

function handleDeactivateAccount() {
  const answer = prompt('PERINGATAN: Menonaktifkan akun akan menangguhkan seluruh permohonan dokumen internasional Anda di KUI PNJ.\n\nKetik "NONAKTIFKAN" untuk mengonfirmasi:');
  if (answer === null) return;
  if (answer.trim().toUpperCase() !== 'NONAKTIFKAN') {
    toast('Konfirmasi dibatalkan. Kata konfirmasi tidak cocok.', true);
    return;
  }

  toast('Permohonan penonaktifan akun diterima. Menutup sesi...', true);
  setTimeout(() => {
    alertLogout();
  }, 2000);
}

function alertLogout() {
  closeDrawer();
  try { localStorage.removeItem('io_current_user'); } catch(e) {}
  user = null;
  syncAuthUI();
  toast('Anda telah keluar dari akun.');
  go('login');
}

/* ---------- INIT ---------- */
enhance(document);
setLang(lang);
$$('form.shell').forEach(updateProgress);

// Inisialisasi Peran Pengguna saat Halaman Pertama Dimuat
initUserRole();

// Event Listener Form Registrasi & Login
const regPnjForm = document.getElementById('f-register-pnj');
if (regPnjForm) regPnjForm.onsubmit = handleRegisterPnj;

const regExtForm = document.getElementById('f-register-ext');
if (regExtForm) regExtForm.onsubmit = handleRegisterExt;

const fullLoginForm = document.getElementById('f-login');
if (fullLoginForm) fullLoginForm.onsubmit = handleLoginSubmit;

const modalLoginForm = document.getElementById('loginForm');
if (modalLoginForm) modalLoginForm.onsubmit = handleLoginSubmit;

{
  const pages = $$('.page');
  let h = (location.hash || '').slice(1);
  if (!h && pages.length === 1 && pages[0].id) {
    h = pages[0].id.replace('page-', '');
  }
  h = h || 'home';
  go(h);
  if (h !== 'faq' && !/^pdln\/(panduan|template)$/.test(h)) window.scrollTo(0, 0);
}
window.addEventListener('hashchange', () => go(location.hash.slice(1)));
