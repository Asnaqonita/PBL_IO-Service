<?php
// Siapkan data pemohon Inbound yang dikirim dari controller untuk dicetak ke template surat penerimaan (Letter of Acceptance)
$nama_pemohon = $data['nama_lengkap'] ?? '[Nama Pemohon]';
$paspor       = $data['no_paspor'] ?? '[No Paspor]';
$univ_asal    = $data['univ_asal'] ?? '[Universitas Asal]';
$program      = $data['jenis_program'] ?? '[Jenis Program Inbound]';
$jurusan_pnj  = $data['jurusan_tujuan'] ?? '[Jurusan Tujuan]';
$periode      = $data['periode'] ?? '[Periode Studi]';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Penerimaan Inbound - <?php echo htmlspecialchars($nama_pemohon); ?></title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11pt; line-height: 1.6; margin: 40px; }
        .header-logo { text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px; }
        .header-logo h2 { margin: 0; font-size: 14pt; }
        .header-logo p { margin: 0; font-size: 10pt; color: #555; }
        .title { text-align: center; margin: 20px 0; text-transform: uppercase; font-weight: bold; text-decoration: underline; }
        .content-table { width: 100%; margin: 15px 0; }
        .content-table td { padding: 3px 5px; }
        .ttd { margin-top: 50px; float: right; width: 40%; text-align: center; }
        .clear { clear: both; }
    </style>
</head>
<body>

    <div class="header-logo">
        <h2>INTERNATIONAL OFFICE — POLITEKNIK NEGERI JAKARTA</h2>
        <p>Letter of Acceptance / Surat Keterangan Penerimaan Program Inbound</p>
    </div>

    <div class="title">LETTER OF ACCEPTANCE</div>

    <p>International Office Politeknik Negeri Jakarta menerangkan bahwa pemohon di bawah ini:</p>

    <table class="content-table">
        <tr>
            <td width="35%">Nama Pemohon</td>
            <td width="5%">:</td>
            <td><strong><?php echo htmlspecialchars($nama_pemohon); ?></strong></td>
        </tr>
        <tr>
            <td>Nomor Paspor</td>
            <td>:</td>
            <td><?php echo htmlspecialchars($paspor); ?></td>
        </tr>
        <tr>
            <td>Universitas Asal</td>
            <td>:</td>
            <td><?php echo htmlspecialchars($univ_asal); ?></td>
        </tr>
    </table>

    <p>Dinyatakan <strong>DITERIMA</strong> untuk mengikuti kegiatan <strong><?php echo htmlspecialchars($program); ?></strong> pada Jurusan <strong><?php echo htmlspecialchars($jurusan_pnj); ?></strong> Politeknik Negeri Jakarta untuk periode <strong><?php echo htmlspecialchars($periode); ?></strong>.</p>

    <p>Surat ini digunakan sebagai kelengkapan dokumen imigrasi dan konfirmasi izin tinggal sementara selama masa studi/kunjungan berlangsung.</p>

    <div class="ttd">
        <p>Depok, <?php echo date('d F Y'); ?><br>Kepala Kantor Urusan Internasional</p>
        <br><br><br>
        <p><strong><u>( Kepala KUI PNJ )</u></strong><br>NIP. 19850202XXXXXXXXX</p>
    </div>
    <div class="clear"></div>

</body>
</html>