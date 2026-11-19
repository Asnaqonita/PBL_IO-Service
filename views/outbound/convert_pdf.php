<?php
// Siapkan data mahasiswa dan detail program dari controller untuk mengisi template cetak Surat Rekomendasi Perjalanan Outbound
$nama          = $data['nama'] ?? '[Nama Mahasiswa]';
$nim           = $data['nim'] ?? '[NIM]';
$jurusan       = $data['jurusan'] ?? '[Jurusan]';
$prodi         = $data['prodi'] ?? '[Program Studi]';
$program       = $data['kategori_program'] ?? '[Nama Program]';
$tujuan        = $data['univ_tujuan'] ?? '[Universitas/Negara Tujuan]';
$tgl_mulai     = $data['tgl_mulai'] ?? '-';
$tgl_selesai   = $data['tgl_selesai'] ?? '-';
$penandatangan = $data['penandatangan'] ?? 'Direktur Politeknik Negeri Jakarta';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Rekomendasi Outbound - <?php echo htmlspecialchars($nama); ?></title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.5; margin: 40px; }
        .kop-surat { text-align: center; border-bottom: 3px double #000; padding-bottom: 10px; margin-bottom: 20px; }
        .kop-surat h3 { margin: 0; font-size: 14pt; text-transform: uppercase; }
        .kop-surat h4 { margin: 0; font-size: 12pt; text-transform: uppercase; }
        .kop-surat p { margin: 0; font-size: 9pt; font-style: italic; }
        .judul-surat { text-align: center; margin-bottom: 20px; }
        .judul-surat h5 { margin: 0; text-decoration: underline; font-size: 13pt; text-transform: uppercase; }
        .judul-surat p { margin: 0; font-size: 11pt; }
        .isi-surat { text-align: justify; }
        .table-data { width: 100%; margin: 15px 0; border-collapse: collapse; }
        .table-data td { padding: 4px 8px; vertical-align: top; }
        .ttd-box { width: 40%; float: right; text-align: center; margin-top: 40px; }
        .clear { clear: both; }
    </style>
</head>
<body>

    <!-- KOP SURAT PNJ -->
    <div class="kop-surat">
        <h3>KEMENTERIAN PENDIDIKAN, KEBudayaan, RISET, DAN TEKNOLOGI</h3>
        <h4>POLITEKNIK NEGERI JAKARTA</h4>
        <p>Jl. Prof. DR. G.A. Siwabessy, Kampus UI Depok 16425</p>
        <p>Telepon (021) 7270036, Fax (021) 7270034 | Website: http://www.pnj.ac.id</p>
    </div>

    <!-- JUDUL SURAT -->
    <div class="judul-surat">
        <h5>SURAT REKOMENDASI PERJALANAN OUTBOUND</h5>
        <p>Nomor: B/<?php echo rand(100, 999); ?>/PL3/LN/<?php echo date('Y'); ?></p>
    </div>

    <!-- ISI SURAT -->
    <div class="isi-surat">
        <p>Yang bertanda tangan di bawah ini pimpinan Politeknik Negeri Jakarta memberikan rekomendasi kepada mahasiswa berikut:</p>
        
        <table class="table-data">
            <tr>
                <td width="30%">Nama Lengkap</td>
                <td width="5%">:</td>
                <td><strong><?php echo htmlspecialchars($nama); ?></strong></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($nim); ?></td>
            </tr>
            <tr>
                <td>Jurusan / Prodi</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($jurusan); ?> / <?php echo htmlspecialchars($prodi); ?></td>
            </tr>
        </table>

        <p>Untuk melaksanakan kegiatan akademis/studi pada program <strong><?php echo htmlspecialchars($program); ?></strong> di <strong><?php echo htmlspecialchars($tujuan); ?></strong> yang dilaksanakan pada tanggal <strong><?php echo htmlspecialchars($tgl_mulai); ?></strong> sampai dengan <strong><?php echo htmlspecialchars($tgl_selesai); ?></strong>.</p>

        <p>Demikian surat rekomendasi ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
    </div>

    <!-- BLOK TANDA TANGAN DINAMIS -->
    <div class="ttd-box">
        <p>Depok, <?php echo date('d F Y'); ?><br>
        <?php echo htmlspecialchars($penandatangan); ?>,</p>
        <br><br><br><br>
        <p><strong><u>( NAMA PEJABAT PNJ )</u></strong><br>
        NIP. 19800101XXXXXXXXX</p>
    </div>
    <div class="clear"></div>

</body>
</html>