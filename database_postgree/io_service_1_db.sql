--
-- PostgreSQL database dump
--

\restrict NVbYJiFf74dRJKbyTr0H4scGlXbP6kChzpW1YYRllGAs3w4gVYK5PmPVDnWFQao

-- Dumped from database version 17.11
-- Dumped by pg_dump version 17.11

-- Started on 2026-11-19 18:30:12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 223 (class 1259 OID 16459)
-- Name: admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin (
    id_admin integer NOT NULL,
    username character varying(50) NOT NULL,
    email_admin character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    nama_admin character varying(100) NOT NULL,
    jabatan_kui character varying(100) DEFAULT 'Staf KUI PNJ'::character varying,
    last_sync timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.admin OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 16458)
-- Name: admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.admin_id_admin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.admin_id_admin_seq OWNER TO postgres;

--
-- TOC entry 5135 (class 0 OID 0)
-- Dependencies: 222
-- Name: admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.admin_id_admin_seq OWNED BY public.admin.id_admin;


--
-- TOC entry 220 (class 1259 OID 16430)
-- Name: civitas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.civitas (
    nip character varying(30) NOT NULL,
    id_user integer NOT NULL,
    nidn character varying(30),
    nama_lengkap character varying(100) NOT NULL,
    gelar_depan character varying(30),
    gelar_belakang character varying(50),
    jabatan character varying(100) NOT NULL,
    pangkat_golongan character varying(50),
    unit_kerja character varying(100) NOT NULL,
    no_paspor character varying(30),
    no_hp character varying(20) NOT NULL,
    email_pnj character varying(100) NOT NULL,
    alamat text
);


ALTER TABLE public.civitas OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 16537)
-- Name: dokumen_inbound; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dokumen_inbound (
    id_dok_inbound integer NOT NULL,
    id_inbound integer NOT NULL,
    file_scan_paspor text,
    file_proposal_tor text,
    file_surat_instansi text,
    file_cv text,
    tgl_unggah timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.dokumen_inbound OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 16536)
-- Name: dokumen_inbound_id_dok_inbound_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.dokumen_inbound_id_dok_inbound_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.dokumen_inbound_id_dok_inbound_seq OWNER TO postgres;

--
-- TOC entry 5136 (class 0 OID 0)
-- Dependencies: 230
-- Name: dokumen_inbound_id_dok_inbound_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.dokumen_inbound_id_dok_inbound_seq OWNED BY public.dokumen_inbound.id_dok_inbound;


--
-- TOC entry 227 (class 1259 OID 16497)
-- Name: dokumen_outbound; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dokumen_outbound (
    id_dok_outbound integer NOT NULL,
    id_outbound integer NOT NULL,
    file_ktm_ktp text,
    file_pengantar_jurusan text,
    file_loa_undangan text,
    file_transkrip text,
    tgl_unggah timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.dokumen_outbound OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 16496)
-- Name: dokumen_outbound_id_dok_outbound_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.dokumen_outbound_id_dok_outbound_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.dokumen_outbound_id_dok_outbound_seq OWNER TO postgres;

--
-- TOC entry 5137 (class 0 OID 0)
-- Dependencies: 226
-- Name: dokumen_outbound_id_dok_outbound_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.dokumen_outbound_id_dok_outbound_seq OWNED BY public.dokumen_outbound.id_dok_outbound;


--
-- TOC entry 247 (class 1259 OID 16704)
-- Name: faq; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.faq (
    id_faq integer NOT NULL,
    id_admin integer,
    kategori character varying(50) NOT NULL,
    pertanyaan text NOT NULL,
    jawaban text NOT NULL,
    urutan_tampil integer DEFAULT 1,
    status_aktif boolean DEFAULT true
);


ALTER TABLE public.faq OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 16703)
-- Name: faq_id_faq_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.faq_id_faq_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.faq_id_faq_seq OWNER TO postgres;

--
-- TOC entry 5138 (class 0 OID 0)
-- Dependencies: 246
-- Name: faq_id_faq_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.faq_id_faq_seq OWNED BY public.faq.id_faq;


--
-- TOC entry 229 (class 1259 OID 16514)
-- Name: inbound; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.inbound (
    id_inbound integer NOT NULL,
    kode_pengajuan character varying(30) NOT NULL,
    no_paspor character varying(30) NOT NULL,
    jenis_kegiatan character varying(100) NOT NULL,
    nama_program character varying(150) NOT NULL,
    unit_host_pnj character varying(100) NOT NULL,
    negara_asal character varying(50),
    tgl_kedatangan date NOT NULL,
    tgl_kepulangan date NOT NULL,
    penanggung_jawab character varying(100),
    status_inbound character varying(50) DEFAULT 'Tahap 1 - Baru Masuk'::character varying,
    hasil_convert_pdf text,
    file_loa_resmi text,
    catatan_admin text,
    verified_by_admin integer,
    tgl_pengajuan timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.inbound OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 16513)
-- Name: inbound_id_inbound_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.inbound_id_inbound_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.inbound_id_inbound_seq OWNER TO postgres;

--
-- TOC entry 5139 (class 0 OID 0)
-- Dependencies: 228
-- Name: inbound_id_inbound_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.inbound_id_inbound_seq OWNED BY public.inbound.id_inbound;


--
-- TOC entry 239 (class 1259 OID 16633)
-- Name: laporan_pdln; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.laporan_pdln (
    id_laporan integer NOT NULL,
    id_pdln integer NOT NULL,
    tgl_kirim timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    total_realisasi_biaya numeric(15,2) DEFAULT 0,
    ringkasan_hasil text,
    file_sp_setneg_user text,
    file_laporan_akhir text NOT NULL,
    dokumentasi_kegiatan text,
    tindak_lanjut text,
    status_laporan character varying(30) DEFAULT 'Sudah Dikirim'::character varying
);


ALTER TABLE public.laporan_pdln OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 16632)
-- Name: laporan_pdln_id_laporan_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.laporan_pdln_id_laporan_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.laporan_pdln_id_laporan_seq OWNER TO postgres;

--
-- TOC entry 5140 (class 0 OID 0)
-- Dependencies: 238
-- Name: laporan_pdln_id_laporan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.laporan_pdln_id_laporan_seq OWNED BY public.laporan_pdln.id_laporan;


--
-- TOC entry 243 (class 1259 OID 16670)
-- Name: loket_pengambilan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.loket_pengambilan (
    id_loket integer NOT NULL,
    kode_pengajuan character varying(30) NOT NULL,
    kategori_layanan character varying(30) NOT NULL,
    nomor_surat_resmi character varying(100),
    nama_surat character varying(150) NOT NULL,
    status_ambil_fisik character varying(30) DEFAULT 'Siap Diambil di Loket KUI'::character varying,
    tgl_ambil date,
    updated_by_admin integer
);


ALTER TABLE public.loket_pengambilan OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 16669)
-- Name: loket_pengambilan_id_loket_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.loket_pengambilan_id_loket_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.loket_pengambilan_id_loket_seq OWNER TO postgres;

--
-- TOC entry 5141 (class 0 OID 0)
-- Dependencies: 242
-- Name: loket_pengambilan_id_loket_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.loket_pengambilan_id_loket_seq OWNED BY public.loket_pengambilan.id_loket;


--
-- TOC entry 219 (class 1259 OID 16416)
-- Name: mahasiswa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mahasiswa (
    nim character varying(20) NOT NULL,
    id_user integer NOT NULL,
    nama_lengkap character varying(100) NOT NULL,
    tempat_lahir character varying(50),
    tanggal_lahir date,
    jenis_kelamin character varying(15),
    jurusan character varying(100) NOT NULL,
    prodi character varying(100) NOT NULL,
    angkatan integer,
    ipk numeric(3,2),
    no_paspor character varying(30),
    no_hp character varying(20) NOT NULL,
    alamat text
);


ALTER TABLE public.mahasiswa OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16444)
-- Name: mahasiswa_luar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mahasiswa_luar (
    no_paspor character varying(30) NOT NULL,
    id_user integer NOT NULL,
    full_name character varying(100) NOT NULL,
    nationality character varying(50) NOT NULL,
    gender character varying(15),
    birth_date date,
    home_institution character varying(150) NOT NULL,
    country_origin character varying(50),
    department character varying(100),
    academic_level character varying(50),
    phone_number character varying(30) NOT NULL,
    emergency_contact character varying(50),
    passport_expiry date,
    address text
);


ALTER TABLE public.mahasiswa_luar OWNER TO postgres;

--
-- TOC entry 245 (class 1259 OID 16683)
-- Name: notifikasi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.notifikasi (
    id_notif integer NOT NULL,
    id_user integer NOT NULL,
    id_admin integer,
    judul character varying(150) NOT NULL,
    pesan text NOT NULL,
    is_read boolean DEFAULT false,
    tgl_kirim timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.notifikasi OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 16682)
-- Name: notifikasi_id_notif_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.notifikasi_id_notif_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.notifikasi_id_notif_seq OWNER TO postgres;

--
-- TOC entry 5142 (class 0 OID 0)
-- Dependencies: 244
-- Name: notifikasi_id_notif_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.notifikasi_id_notif_seq OWNED BY public.notifikasi.id_notif;


--
-- TOC entry 225 (class 1259 OID 16474)
-- Name: outbound; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.outbound (
    id_outbound integer NOT NULL,
    kode_pengajuan character varying(30) NOT NULL,
    nim character varying(20) NOT NULL,
    jenis_layanan character varying(100) NOT NULL,
    nama_program character varying(150) NOT NULL,
    negara_tujuan character varying(50) NOT NULL,
    universitas_tujuan character varying(150),
    tgl_mulai date NOT NULL,
    tgl_selesai date NOT NULL,
    status_outbound character varying(50) DEFAULT 'Tahap 1 - Baru Masuk'::character varying,
    hasil_convert_pdf text,
    file_surat_resmi text,
    catatan_admin text,
    verified_by_admin integer,
    tgl_pengajuan timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.outbound OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 16473)
-- Name: outbound_id_outbound_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.outbound_id_outbound_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.outbound_id_outbound_seq OWNER TO postgres;

--
-- TOC entry 5143 (class 0 OID 0)
-- Dependencies: 224
-- Name: outbound_id_outbound_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.outbound_id_outbound_seq OWNED BY public.outbound.id_outbound;


--
-- TOC entry 237 (class 1259 OID 16614)
-- Name: paspor_exit_permit; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.paspor_exit_permit (
    id_proses_paspor integer NOT NULL,
    id_pdln integer NOT NULL,
    tgl_kirim timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    jenis_proses character varying(50) NOT NULL,
    file_syarat_paspor text NOT NULL,
    status_saat_ini character varying(50) DEFAULT 'Menunggu Fisik di KUI'::character varying,
    CONSTRAINT paspor_exit_permit_jenis_proses_check CHECK (((jenis_proses)::text = ANY ((ARRAY['Exit Permit'::character varying, 'Paspor Baru'::character varying])::text[])))
);


ALTER TABLE public.paspor_exit_permit OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 16613)
-- Name: paspor_exit_permit_id_proses_paspor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.paspor_exit_permit_id_proses_paspor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.paspor_exit_permit_id_proses_paspor_seq OWNER TO postgres;

--
-- TOC entry 5144 (class 0 OID 0)
-- Dependencies: 236
-- Name: paspor_exit_permit_id_proses_paspor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.paspor_exit_permit_id_proses_paspor_seq OWNED BY public.paspor_exit_permit.id_proses_paspor;


--
-- TOC entry 233 (class 1259 OID 16554)
-- Name: pdln; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pdln (
    id_pdln integer NOT NULL,
    kode_pdln character varying(30) NOT NULL,
    id_user integer NOT NULL,
    kategori_pemohon character varying(20) NOT NULL,
    nim character varying(20),
    nip character varying(30),
    nama_kegiatan character varying(150) NOT NULL,
    jenis_kegiatan character varying(100),
    negara_tujuan character varying(50) NOT NULL,
    institusi_tujuan character varying(150) NOT NULL,
    tgl_berangkat date NOT NULL,
    tgl_pulang date NOT NULL,
    sumber_dana character varying(100),
    file_memo text,
    file_tor text,
    file_bukti_reg text,
    file_pembiayaan text,
    file_jadwal text,
    file_clearance text,
    file_mou text,
    status_pdln character varying(50) DEFAULT 'Tahap Awal - Verifikasi KUI'::character varying,
    progres_persen integer DEFAULT 20,
    catatan_admin text,
    wajib_laporan character varying(10) DEFAULT 'Ya'::character varying,
    wajib_paspor character varying(10) DEFAULT 'Tidak'::character varying,
    verified_by_admin integer,
    tgl_pengajuan timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pdln_kategori_pemohon_check CHECK (((kategori_pemohon)::text = ANY ((ARRAY['mahasiswa'::character varying, 'sivitas'::character varying])::text[])))
);


ALTER TABLE public.pdln OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 16553)
-- Name: pdln_id_pdln_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pdln_id_pdln_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pdln_id_pdln_seq OWNER TO postgres;

--
-- TOC entry 5145 (class 0 OID 0)
-- Dependencies: 232
-- Name: pdln_id_pdln_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pdln_id_pdln_seq OWNED BY public.pdln.id_pdln;


--
-- TOC entry 235 (class 1259 OID 16591)
-- Name: sp_setneg; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sp_setneg (
    id_sp_setneg integer NOT NULL,
    id_pdln integer NOT NULL,
    nomor_sp_setneg character varying(100),
    file_sp_final text NOT NULL,
    tgl_terbit_setneg date DEFAULT CURRENT_DATE,
    uploaded_by_admin integer,
    waktu_upload timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.sp_setneg OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 16590)
-- Name: sp_setneg_id_sp_setneg_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sp_setneg_id_sp_setneg_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.sp_setneg_id_sp_setneg_seq OWNER TO postgres;

--
-- TOC entry 5146 (class 0 OID 0)
-- Dependencies: 234
-- Name: sp_setneg_id_sp_setneg_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sp_setneg_id_sp_setneg_seq OWNED BY public.sp_setneg.id_sp_setneg;


--
-- TOC entry 241 (class 1259 OID 16652)
-- Name: template_surat; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.template_surat (
    id_template integer NOT NULL,
    kategori_layanan character varying(30) NOT NULL,
    format_nomor_surat character varying(100) NOT NULL,
    jabatan_penandatangan character varying(100) NOT NULL,
    nama_pejabat character varying(100) NOT NULL,
    nip_pejabat character varying(50) NOT NULL,
    paragraf_pembuka text,
    daftar_persyaratan text,
    updated_by_admin integer,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT template_surat_kategori_layanan_check CHECK (((kategori_layanan)::text = ANY ((ARRAY['Outbound'::character varying, 'Inbound'::character varying, 'PDLN'::character varying])::text[])))
);


ALTER TABLE public.template_surat OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 16651)
-- Name: template_surat_id_template_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.template_surat_id_template_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.template_surat_id_template_seq OWNER TO postgres;

--
-- TOC entry 5147 (class 0 OID 0)
-- Dependencies: 240
-- Name: template_surat_id_template_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.template_surat_id_template_seq OWNED BY public.template_surat.id_template;


--
-- TOC entry 218 (class 1259 OID 16400)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    username character varying(50) NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(255),
    sso_id character varying(100),
    role character varying(20) NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT users_role_check CHECK (((role)::text = ANY ((ARRAY['mahasiswa'::character varying, 'sivitas'::character varying, 'eksternal'::character varying])::text[])))
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16399)
-- Name: users_id_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_user_seq OWNER TO postgres;

--
-- TOC entry 5148 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_user_seq OWNED BY public.users.id_user;


--
-- TOC entry 4821 (class 2604 OID 16462)
-- Name: admin id_admin; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin ALTER COLUMN id_admin SET DEFAULT nextval('public.admin_id_admin_seq'::regclass);


--
-- TOC entry 4832 (class 2604 OID 16540)
-- Name: dokumen_inbound id_dok_inbound; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dokumen_inbound ALTER COLUMN id_dok_inbound SET DEFAULT nextval('public.dokumen_inbound_id_dok_inbound_seq'::regclass);


--
-- TOC entry 4827 (class 2604 OID 16500)
-- Name: dokumen_outbound id_dok_outbound; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dokumen_outbound ALTER COLUMN id_dok_outbound SET DEFAULT nextval('public.dokumen_outbound_id_dok_outbound_seq'::regclass);


--
-- TOC entry 4857 (class 2604 OID 16707)
-- Name: faq id_faq; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.faq ALTER COLUMN id_faq SET DEFAULT nextval('public.faq_id_faq_seq'::regclass);


--
-- TOC entry 4829 (class 2604 OID 16517)
-- Name: inbound id_inbound; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inbound ALTER COLUMN id_inbound SET DEFAULT nextval('public.inbound_id_inbound_seq'::regclass);


--
-- TOC entry 4846 (class 2604 OID 16636)
-- Name: laporan_pdln id_laporan; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laporan_pdln ALTER COLUMN id_laporan SET DEFAULT nextval('public.laporan_pdln_id_laporan_seq'::regclass);


--
-- TOC entry 4852 (class 2604 OID 16673)
-- Name: loket_pengambilan id_loket; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.loket_pengambilan ALTER COLUMN id_loket SET DEFAULT nextval('public.loket_pengambilan_id_loket_seq'::regclass);


--
-- TOC entry 4854 (class 2604 OID 16686)
-- Name: notifikasi id_notif; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notifikasi ALTER COLUMN id_notif SET DEFAULT nextval('public.notifikasi_id_notif_seq'::regclass);


--
-- TOC entry 4824 (class 2604 OID 16477)
-- Name: outbound id_outbound; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.outbound ALTER COLUMN id_outbound SET DEFAULT nextval('public.outbound_id_outbound_seq'::regclass);


--
-- TOC entry 4843 (class 2604 OID 16617)
-- Name: paspor_exit_permit id_proses_paspor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paspor_exit_permit ALTER COLUMN id_proses_paspor SET DEFAULT nextval('public.paspor_exit_permit_id_proses_paspor_seq'::regclass);


--
-- TOC entry 4834 (class 2604 OID 16557)
-- Name: pdln id_pdln; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pdln ALTER COLUMN id_pdln SET DEFAULT nextval('public.pdln_id_pdln_seq'::regclass);


--
-- TOC entry 4840 (class 2604 OID 16594)
-- Name: sp_setneg id_sp_setneg; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sp_setneg ALTER COLUMN id_sp_setneg SET DEFAULT nextval('public.sp_setneg_id_sp_setneg_seq'::regclass);


--
-- TOC entry 4850 (class 2604 OID 16655)
-- Name: template_surat id_template; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.template_surat ALTER COLUMN id_template SET DEFAULT nextval('public.template_surat_id_template_seq'::regclass);


--
-- TOC entry 4819 (class 2604 OID 16403)
-- Name: users id_user; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id_user SET DEFAULT nextval('public.users_id_user_seq'::regclass);


--
-- TOC entry 5105 (class 0 OID 16459)
-- Dependencies: 223
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5102 (class 0 OID 16430)
-- Dependencies: 220
-- Data for Name: civitas; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5113 (class 0 OID 16537)
-- Dependencies: 231
-- Data for Name: dokumen_inbound; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5109 (class 0 OID 16497)
-- Dependencies: 227
-- Data for Name: dokumen_outbound; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5129 (class 0 OID 16704)
-- Dependencies: 247
-- Data for Name: faq; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5111 (class 0 OID 16514)
-- Dependencies: 229
-- Data for Name: inbound; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5121 (class 0 OID 16633)
-- Dependencies: 239
-- Data for Name: laporan_pdln; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5125 (class 0 OID 16670)
-- Dependencies: 243
-- Data for Name: loket_pengambilan; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5101 (class 0 OID 16416)
-- Dependencies: 219
-- Data for Name: mahasiswa; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.mahasiswa VALUES ('2507411017', 1, 'Jaemin', 'Jakarta', '2000-09-09', 'Laki-Laki', 'Teknik Informatika dan Komputer', 'Teknik Informatika', 2015, 3.86, 'C123456', '081234567890', 'korea');


--
-- TOC entry 5103 (class 0 OID 16444)
-- Dependencies: 221
-- Data for Name: mahasiswa_luar; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5127 (class 0 OID 16683)
-- Dependencies: 245
-- Data for Name: notifikasi; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5107 (class 0 OID 16474)
-- Dependencies: 225
-- Data for Name: outbound; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5119 (class 0 OID 16614)
-- Dependencies: 237
-- Data for Name: paspor_exit_permit; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5115 (class 0 OID 16554)
-- Dependencies: 233
-- Data for Name: pdln; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5117 (class 0 OID 16591)
-- Dependencies: 235
-- Data for Name: sp_setneg; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5123 (class 0 OID 16652)
-- Dependencies: 241
-- Data for Name: template_surat; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5100 (class 0 OID 16400)
-- Dependencies: 218
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users VALUES (1, 'jaeminie23', 'jaemin@mhsw.pnj.ac.id', '$2y$10$wC.CyBOyg/xLKFgXNb.O8.aJdxDdM91HHJQVweBq/q4FhqHcgoI9a', NULL, 'mahasiswa', '2026-11-19 17:06:14.112436');


--
-- TOC entry 5149 (class 0 OID 0)
-- Dependencies: 222
-- Name: admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.admin_id_admin_seq', 1, false);


--
-- TOC entry 5150 (class 0 OID 0)
-- Dependencies: 230
-- Name: dokumen_inbound_id_dok_inbound_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dokumen_inbound_id_dok_inbound_seq', 1, false);


--
-- TOC entry 5151 (class 0 OID 0)
-- Dependencies: 226
-- Name: dokumen_outbound_id_dok_outbound_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dokumen_outbound_id_dok_outbound_seq', 1, false);


--
-- TOC entry 5152 (class 0 OID 0)
-- Dependencies: 246
-- Name: faq_id_faq_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.faq_id_faq_seq', 1, false);


--
-- TOC entry 5153 (class 0 OID 0)
-- Dependencies: 228
-- Name: inbound_id_inbound_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.inbound_id_inbound_seq', 1, false);


--
-- TOC entry 5154 (class 0 OID 0)
-- Dependencies: 238
-- Name: laporan_pdln_id_laporan_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.laporan_pdln_id_laporan_seq', 1, false);


--
-- TOC entry 5155 (class 0 OID 0)
-- Dependencies: 242
-- Name: loket_pengambilan_id_loket_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.loket_pengambilan_id_loket_seq', 1, false);


--
-- TOC entry 5156 (class 0 OID 0)
-- Dependencies: 244
-- Name: notifikasi_id_notif_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.notifikasi_id_notif_seq', 1, false);


--
-- TOC entry 5157 (class 0 OID 0)
-- Dependencies: 224
-- Name: outbound_id_outbound_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.outbound_id_outbound_seq', 1, false);


--
-- TOC entry 5158 (class 0 OID 0)
-- Dependencies: 236
-- Name: paspor_exit_permit_id_proses_paspor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.paspor_exit_permit_id_proses_paspor_seq', 1, false);


--
-- TOC entry 5159 (class 0 OID 0)
-- Dependencies: 232
-- Name: pdln_id_pdln_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pdln_id_pdln_seq', 1, false);


--
-- TOC entry 5160 (class 0 OID 0)
-- Dependencies: 234
-- Name: sp_setneg_id_sp_setneg_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sp_setneg_id_sp_setneg_seq', 1, false);


--
-- TOC entry 5161 (class 0 OID 0)
-- Dependencies: 240
-- Name: template_surat_id_template_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.template_surat_id_template_seq', 1, false);


--
-- TOC entry 5162 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_user_seq', 1, true);


--
-- TOC entry 4885 (class 2606 OID 16472)
-- Name: admin admin_email_admin_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_email_admin_key UNIQUE (email_admin);


--
-- TOC entry 4887 (class 2606 OID 16468)
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 4889 (class 2606 OID 16470)
-- Name: admin admin_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_username_key UNIQUE (username);


--
-- TOC entry 4877 (class 2606 OID 16438)
-- Name: civitas civitas_id_user_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.civitas
    ADD CONSTRAINT civitas_id_user_key UNIQUE (id_user);


--
-- TOC entry 4879 (class 2606 OID 16436)
-- Name: civitas civitas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.civitas
    ADD CONSTRAINT civitas_pkey PRIMARY KEY (nip);


--
-- TOC entry 4903 (class 2606 OID 16547)
-- Name: dokumen_inbound dokumen_inbound_id_inbound_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dokumen_inbound
    ADD CONSTRAINT dokumen_inbound_id_inbound_key UNIQUE (id_inbound);


--
-- TOC entry 4905 (class 2606 OID 16545)
-- Name: dokumen_inbound dokumen_inbound_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dokumen_inbound
    ADD CONSTRAINT dokumen_inbound_pkey PRIMARY KEY (id_dok_inbound);


--
-- TOC entry 4895 (class 2606 OID 16507)
-- Name: dokumen_outbound dokumen_outbound_id_outbound_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dokumen_outbound
    ADD CONSTRAINT dokumen_outbound_id_outbound_key UNIQUE (id_outbound);


--
-- TOC entry 4897 (class 2606 OID 16505)
-- Name: dokumen_outbound dokumen_outbound_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dokumen_outbound
    ADD CONSTRAINT dokumen_outbound_pkey PRIMARY KEY (id_dok_outbound);


--
-- TOC entry 4931 (class 2606 OID 16713)
-- Name: faq faq_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.faq
    ADD CONSTRAINT faq_pkey PRIMARY KEY (id_faq);


--
-- TOC entry 4899 (class 2606 OID 16525)
-- Name: inbound inbound_kode_pengajuan_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inbound
    ADD CONSTRAINT inbound_kode_pengajuan_key UNIQUE (kode_pengajuan);


--
-- TOC entry 4901 (class 2606 OID 16523)
-- Name: inbound inbound_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inbound
    ADD CONSTRAINT inbound_pkey PRIMARY KEY (id_inbound);


--
-- TOC entry 4919 (class 2606 OID 16645)
-- Name: laporan_pdln laporan_pdln_id_pdln_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laporan_pdln
    ADD CONSTRAINT laporan_pdln_id_pdln_key UNIQUE (id_pdln);


--
-- TOC entry 4921 (class 2606 OID 16643)
-- Name: laporan_pdln laporan_pdln_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laporan_pdln
    ADD CONSTRAINT laporan_pdln_pkey PRIMARY KEY (id_laporan);


--
-- TOC entry 4927 (class 2606 OID 16676)
-- Name: loket_pengambilan loket_pengambilan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.loket_pengambilan
    ADD CONSTRAINT loket_pengambilan_pkey PRIMARY KEY (id_loket);


--
-- TOC entry 4873 (class 2606 OID 16424)
-- Name: mahasiswa mahasiswa_id_user_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mahasiswa
    ADD CONSTRAINT mahasiswa_id_user_key UNIQUE (id_user);


--
-- TOC entry 4881 (class 2606 OID 16452)
-- Name: mahasiswa_luar mahasiswa_luar_id_user_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mahasiswa_luar
    ADD CONSTRAINT mahasiswa_luar_id_user_key UNIQUE (id_user);


--
-- TOC entry 4883 (class 2606 OID 16450)
-- Name: mahasiswa_luar mahasiswa_luar_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mahasiswa_luar
    ADD CONSTRAINT mahasiswa_luar_pkey PRIMARY KEY (no_paspor);


--
-- TOC entry 4875 (class 2606 OID 16422)
-- Name: mahasiswa mahasiswa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mahasiswa
    ADD CONSTRAINT mahasiswa_pkey PRIMARY KEY (nim);


--
-- TOC entry 4929 (class 2606 OID 16692)
-- Name: notifikasi notifikasi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notifikasi
    ADD CONSTRAINT notifikasi_pkey PRIMARY KEY (id_notif);


--
-- TOC entry 4891 (class 2606 OID 16485)
-- Name: outbound outbound_kode_pengajuan_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.outbound
    ADD CONSTRAINT outbound_kode_pengajuan_key UNIQUE (kode_pengajuan);


--
-- TOC entry 4893 (class 2606 OID 16483)
-- Name: outbound outbound_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.outbound
    ADD CONSTRAINT outbound_pkey PRIMARY KEY (id_outbound);


--
-- TOC entry 4915 (class 2606 OID 16626)
-- Name: paspor_exit_permit paspor_exit_permit_id_pdln_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paspor_exit_permit
    ADD CONSTRAINT paspor_exit_permit_id_pdln_key UNIQUE (id_pdln);


--
-- TOC entry 4917 (class 2606 OID 16624)
-- Name: paspor_exit_permit paspor_exit_permit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paspor_exit_permit
    ADD CONSTRAINT paspor_exit_permit_pkey PRIMARY KEY (id_proses_paspor);


--
-- TOC entry 4907 (class 2606 OID 16569)
-- Name: pdln pdln_kode_pdln_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pdln
    ADD CONSTRAINT pdln_kode_pdln_key UNIQUE (kode_pdln);


--
-- TOC entry 4909 (class 2606 OID 16567)
-- Name: pdln pdln_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pdln
    ADD CONSTRAINT pdln_pkey PRIMARY KEY (id_pdln);


--
-- TOC entry 4911 (class 2606 OID 16602)
-- Name: sp_setneg sp_setneg_id_pdln_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sp_setneg
    ADD CONSTRAINT sp_setneg_id_pdln_key UNIQUE (id_pdln);


--
-- TOC entry 4913 (class 2606 OID 16600)
-- Name: sp_setneg sp_setneg_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sp_setneg
    ADD CONSTRAINT sp_setneg_pkey PRIMARY KEY (id_sp_setneg);


--
-- TOC entry 4923 (class 2606 OID 16663)
-- Name: template_surat template_surat_kategori_layanan_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.template_surat
    ADD CONSTRAINT template_surat_kategori_layanan_key UNIQUE (kategori_layanan);


--
-- TOC entry 4925 (class 2606 OID 16661)
-- Name: template_surat template_surat_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.template_surat
    ADD CONSTRAINT template_surat_pkey PRIMARY KEY (id_template);


--
-- TOC entry 4865 (class 2606 OID 16413)
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- TOC entry 4867 (class 2606 OID 16409)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


--
-- TOC entry 4869 (class 2606 OID 16415)
-- Name: users users_sso_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_sso_id_key UNIQUE (sso_id);


--
-- TOC entry 4871 (class 2606 OID 16411)
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- TOC entry 4933 (class 2606 OID 16439)
-- Name: civitas civitas_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.civitas
    ADD CONSTRAINT civitas_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON DELETE CASCADE;


--
-- TOC entry 4940 (class 2606 OID 16548)
-- Name: dokumen_inbound dokumen_inbound_id_inbound_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dokumen_inbound
    ADD CONSTRAINT dokumen_inbound_id_inbound_fkey FOREIGN KEY (id_inbound) REFERENCES public.inbound(id_inbound) ON DELETE CASCADE;


--
-- TOC entry 4937 (class 2606 OID 16508)
-- Name: dokumen_outbound dokumen_outbound_id_outbound_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dokumen_outbound
    ADD CONSTRAINT dokumen_outbound_id_outbound_fkey FOREIGN KEY (id_outbound) REFERENCES public.outbound(id_outbound) ON DELETE CASCADE;


--
-- TOC entry 4953 (class 2606 OID 16714)
-- Name: faq faq_id_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.faq
    ADD CONSTRAINT faq_id_admin_fkey FOREIGN KEY (id_admin) REFERENCES public.admin(id_admin) ON DELETE SET NULL;


--
-- TOC entry 4938 (class 2606 OID 16526)
-- Name: inbound inbound_no_paspor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inbound
    ADD CONSTRAINT inbound_no_paspor_fkey FOREIGN KEY (no_paspor) REFERENCES public.mahasiswa_luar(no_paspor) ON DELETE CASCADE;


--
-- TOC entry 4939 (class 2606 OID 16531)
-- Name: inbound inbound_verified_by_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inbound
    ADD CONSTRAINT inbound_verified_by_admin_fkey FOREIGN KEY (verified_by_admin) REFERENCES public.admin(id_admin) ON DELETE SET NULL;


--
-- TOC entry 4948 (class 2606 OID 16646)
-- Name: laporan_pdln laporan_pdln_id_pdln_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laporan_pdln
    ADD CONSTRAINT laporan_pdln_id_pdln_fkey FOREIGN KEY (id_pdln) REFERENCES public.pdln(id_pdln) ON DELETE CASCADE;


--
-- TOC entry 4950 (class 2606 OID 16677)
-- Name: loket_pengambilan loket_pengambilan_updated_by_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.loket_pengambilan
    ADD CONSTRAINT loket_pengambilan_updated_by_admin_fkey FOREIGN KEY (updated_by_admin) REFERENCES public.admin(id_admin) ON DELETE SET NULL;


--
-- TOC entry 4932 (class 2606 OID 16425)
-- Name: mahasiswa mahasiswa_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mahasiswa
    ADD CONSTRAINT mahasiswa_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON DELETE CASCADE;


--
-- TOC entry 4934 (class 2606 OID 16453)
-- Name: mahasiswa_luar mahasiswa_luar_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mahasiswa_luar
    ADD CONSTRAINT mahasiswa_luar_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON DELETE CASCADE;


--
-- TOC entry 4951 (class 2606 OID 16698)
-- Name: notifikasi notifikasi_id_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notifikasi
    ADD CONSTRAINT notifikasi_id_admin_fkey FOREIGN KEY (id_admin) REFERENCES public.admin(id_admin) ON DELETE SET NULL;


--
-- TOC entry 4952 (class 2606 OID 16693)
-- Name: notifikasi notifikasi_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notifikasi
    ADD CONSTRAINT notifikasi_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON DELETE CASCADE;


--
-- TOC entry 4935 (class 2606 OID 16486)
-- Name: outbound outbound_nim_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.outbound
    ADD CONSTRAINT outbound_nim_fkey FOREIGN KEY (nim) REFERENCES public.mahasiswa(nim) ON DELETE CASCADE;


--
-- TOC entry 4936 (class 2606 OID 16491)
-- Name: outbound outbound_verified_by_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.outbound
    ADD CONSTRAINT outbound_verified_by_admin_fkey FOREIGN KEY (verified_by_admin) REFERENCES public.admin(id_admin) ON DELETE SET NULL;


--
-- TOC entry 4947 (class 2606 OID 16627)
-- Name: paspor_exit_permit paspor_exit_permit_id_pdln_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paspor_exit_permit
    ADD CONSTRAINT paspor_exit_permit_id_pdln_fkey FOREIGN KEY (id_pdln) REFERENCES public.pdln(id_pdln) ON DELETE CASCADE;


--
-- TOC entry 4941 (class 2606 OID 16570)
-- Name: pdln pdln_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pdln
    ADD CONSTRAINT pdln_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON DELETE CASCADE;


--
-- TOC entry 4942 (class 2606 OID 16575)
-- Name: pdln pdln_nim_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pdln
    ADD CONSTRAINT pdln_nim_fkey FOREIGN KEY (nim) REFERENCES public.mahasiswa(nim) ON DELETE SET NULL;


--
-- TOC entry 4943 (class 2606 OID 16580)
-- Name: pdln pdln_nip_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pdln
    ADD CONSTRAINT pdln_nip_fkey FOREIGN KEY (nip) REFERENCES public.civitas(nip) ON DELETE SET NULL;


--
-- TOC entry 4944 (class 2606 OID 16585)
-- Name: pdln pdln_verified_by_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pdln
    ADD CONSTRAINT pdln_verified_by_admin_fkey FOREIGN KEY (verified_by_admin) REFERENCES public.admin(id_admin) ON DELETE SET NULL;


--
-- TOC entry 4945 (class 2606 OID 16603)
-- Name: sp_setneg sp_setneg_id_pdln_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sp_setneg
    ADD CONSTRAINT sp_setneg_id_pdln_fkey FOREIGN KEY (id_pdln) REFERENCES public.pdln(id_pdln) ON DELETE CASCADE;


--
-- TOC entry 4946 (class 2606 OID 16608)
-- Name: sp_setneg sp_setneg_uploaded_by_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sp_setneg
    ADD CONSTRAINT sp_setneg_uploaded_by_admin_fkey FOREIGN KEY (uploaded_by_admin) REFERENCES public.admin(id_admin) ON DELETE SET NULL;


--
-- TOC entry 4949 (class 2606 OID 16664)
-- Name: template_surat template_surat_updated_by_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.template_surat
    ADD CONSTRAINT template_surat_updated_by_admin_fkey FOREIGN KEY (updated_by_admin) REFERENCES public.admin(id_admin) ON DELETE SET NULL;


-- Completed on 2026-11-19 18:30:13

--
-- PostgreSQL database dump complete
--

\unrestrict NVbYJiFf74dRJKbyTr0H4scGlXbP6kChzpW1YYRllGAs3w4gVYK5PmPVDnWFQao

