<?php
include '../database/koneksi.php';
 
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Pengajuan Cuti.doc");

$idcuti = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg, jabatan jb, golongan gl WHERE ct.id_pegawai=pg.id_pegawai and pg.id_jabatan=jb.id_jabatan and pg.id_golongan = gl.id_golongan and id_cutipegawai='$idcuti'");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak PDF</title>
</head>
<body>
    <p>
    Karawang, 22 Juni 2020
</p>
<p>
    Kepada
</p>
<p>
    Yth. Ketua Pengadilan Agama Karawang
</p>
<p>
    Di Karawang
</p>
<p align="center">
    <strong><u></u></strong>
</p>
<p align="center">
    <strong><u>PERMINTAAN DAN PEMBERIAN CUTI</u></strong>
</p>
<p align="center">
    Nomor: W10-A7/ /KP.05.2/06/2020
</p>
<div align="center">
    <table border="1" cellspacing="0" cellpadding="0" width="680">
        <tbody>
            <tr>
                <td width="66" valign="top">
                    <p>
                        I.
                    </p>
                </td>
                <td width="614" colspan="14" valign="top">
                    <p>
                        DATA PEGAWAI
                    </p>
                </td>
            </tr>
            <tr>
                <td width="102" colspan="2" valign="top">
                    <p>
                        Nama
                    </p>
                </td>
                <td width="238" colspan="5" valign="top">
                    <p>
                        <strong><?php echo $row['nama_pegawai'] ?></strong>
                    </p>
                </td>
                <td width="104" colspan="3" valign="top">
                    <p>
                        NIP
                    </p>
                </td>
                <td width="237" colspan="5" valign="top">
                    <p>
                        <strong> </strong>
                        <strong><?php echo $row['nip'] ?></strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="102" colspan="2" valign="top">
                    <p>
                        Jabatan
                    </p>
                </td>
                <td width="238" colspan="5" valign="top">
                    <p>
                        <?php echo $row['nama_jabatan'] ?>
                    </p>
                </td>
                <td width="104" colspan="3" valign="top">
                    <p>
                        Masa Kerja
                    </p>
                </td>
                <td width="237" colspan="5" valign="top">
                    <p>
                        -
                    </p>
                </td>
            </tr>
            <tr>
                <td width="102" colspan="2" valign="top">
                    <p>
                        Unit Kerja
                    </p>
                </td>
                <td width="579" colspan="13" valign="top">
                    <p>
                        <?php echo $row['unit_kerja'] ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        II.
                    </p>
                </td>
                <td width="614" colspan="14" valign="top">
                    <p>
                        JENIS CUTI YANG DIAMBIL
                    </p>
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        1.
                    </p>
                </td>
                <td width="131" colspan="3" valign="top">
                    <p>
                        Cuti Tahunan
                    </p>
                </td>
                <td width="143" colspan="3" valign="top">
                    <?php 
                    
                    if ($row['jenis_cuti'] == 'Cuti Tahunan') {
                        ?>
                        V
                        <?php
                    }
                    
                    ?>
                </td>
                <td width="27" colspan="2" valign="top">
                    <p>
                        2.
                    </p>
                </td>
                <td width="144" colspan="5" valign="top">
                    <p>
                        Cuti Besar
                    </p>
                </td>
                <td width="170" valign="top">
                    <?php 
                    
                    if ($row['jenis_cuti'] == 'Cuti Besar') {
                        ?>
                        V
                        <?php
                    }
                    
                    ?>
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        3.
                    </p>
                </td>
                <td width="131" colspan="3" valign="top">
                    <p>
                        Cuti Sakit
                    </p>
                </td>
                <td width="143" colspan="3" valign="top">
                    <?php 
                    
                    if ($row['jenis_cuti'] == 'Cuti Sakit') {
                        ?>
                        V
                        <?php
                    }
                    
                    ?>
                </td>
                <td width="27" colspan="2" valign="top">
                    <p>
                        4.
                    </p>
                </td>
                <td width="144" colspan="5" valign="top">
                    <p>
                        Cuti Melahirkan
                    </p>
                </td>
                <td width="170" valign="top">
                    <?php 
                    
                    if ($row['jenis_cuti'] == 'Cuti Melahirkan') {
                        ?>
                        V
                        <?php
                    }
                    
                    ?>
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        5.
                    </p>
                </td>
                <td width="131" colspan="3" valign="top">
                    <p>
                        Cuti Karena Alasan
                    </p>
                    <p>
                        Penting
                    </p>
                </td>
                <td width="143" colspan="3" valign="top">
                    <?php 
                    
                    if ($row['jenis_cuti'] == 'Cuti Karena Alasan Penting') {
                        ?>
                        V
                        <?php
                    }
                    
                    ?>
                </td>
                <td width="27" colspan="2" valign="top">
                    <p>
                        6.
                    </p>
                </td>
                <td width="144" colspan="5" valign="top">
                    <p>
                        Cuti di Luar Tanggungan
                    </p>
                    <p>
                        Negara
                    </p>
                </td>
                <td width="170" valign="top">
                    <?php 
                    
                    if ($row['jenis_cuti'] == 'Cuti diluar Tanggungan Negara') {
                        ?>
                        V
                        <?php
                    }
                    
                    ?>
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        III.
                    </p>
                </td>
                <td width="614" colspan="14" valign="top">
                    <p>
                        ALASAN CUTI
                    </p>
                </td>
            </tr>
            <tr>
                <td width="680" colspan="15" valign="top">
                    <p>
                        <?php echo $row['alasan_cuti'] ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        IV.
                    </p>
                </td>
                <td width="614" colspan="14" valign="top">
                    <p>
                        LAMANYA CUTI
                    </p>
                </td>
            </tr>
            <tr>
                <td width="197" colspan="4" valign="top">
                    <p>
                        Selama
                    </p>
                </td>
                <td width="162" colspan="4" valign="top">
                    <p>
                        Hari/Bulan/Tahun *
                    </p>
                </td>
                <td width="142" colspan="5" valign="top">
                    <p align="center">
                        Mulai Tanggal
                    </p>
                </td>
                <td width="180" colspan="2" valign="top">
                    <p align="center">
                        S/D
                    </p>
                </td>
            </tr>
            <tr>
                <td width="197" colspan="4" valign="top">
                    <p>
                        <?php echo $row['lama_cuti'] ?>
                    </p>
                </td>
                <td width="162" colspan="4" valign="top">
                    <p>
                        <?php echo $row['ket_lama_cuti'] ?>
                    </p>
                </td>
                <td width="142" colspan="5" valign="top">
                    <p align="center">
                        <?php echo $row['dari_tanggal'] ?>
                    </p>
                </td>
                <td width="180" colspan="2" valign="top">
                    <p align="center">
                        <?php echo $row['sampai_dengan'] ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        V.
                    </p>
                </td>
                <td width="614" colspan="14" valign="top">
                    <p>
                        CATATAN CUTI***
                    </p>
                </td>
            </tr>
            <tr>
                <td width="680" colspan="15" valign="top">
                    <p>
                        Keterangan ( text )
                    </p>
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        1.
                    </p>
                </td>
                <td width="293" colspan="7" valign="top">
                    <p>
                        CUTI TAHUNAN
                    </p>
                </td>
                <td width="133" colspan="4" valign="top">
                    <p>
                        2. CUTI BESAR
                    </p>
                </td>
                <td width="189" colspan="3" valign="top">
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        Tahun
                    </p>
                </td>
                <td width="131" colspan="3" valign="top">
                    <p>
                        Sisa
                    </p>
                </td>
                <td width="162" colspan="4" valign="top">
                    <p>
                        Keterangan
                    </p>
                </td>
                <td width="133" colspan="4" valign="top">
                    <p>
                        3. CUTI SAKIT
                    </p>
                </td>
                <td width="189" colspan="3" valign="top">
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        N.2
                    </p>
                </td>
                <td width="131" colspan="3" valign="top">
                    <p>
                        Varchar
                    </p>
                </td>
                <td width="162" colspan="4" valign="top">
                    <p>
                        Varchar
                    </p>
                </td>
                <td width="133" colspan="4" valign="top">
                    <p>
                        4. CUTI MELAHIRKAN
                    </p>
                </td>
                <td width="189" colspan="3" valign="top">
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        N.1
                    </p>
                </td>
                <td width="131" colspan="3" valign="top">
                    <p>
                        Varchar
                    </p>
                </td>
                <td width="162" colspan="4" valign="top">
                    <p>
                        Varchar
                    </p>
                </td>
                <td width="133" colspan="4" valign="top">
                    <p>
                        5. CUTI KARENA ALASAN PENTING
                    </p>
                </td>
                <td width="189" colspan="3" valign="top">
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        N
                    </p>
                </td>
                <td width="131" colspan="3" valign="top">
                    <p>
                        Varchar
                    </p>
                </td>
                <td width="162" colspan="4" valign="top">
                    <p>
                        Varchar
                    </p>
                </td>
                <td width="133" colspan="4" valign="top">
                    <p>
                        6. CUTI DI LUAR TANGGUNG NEGARA
                    </p>
                </td>
                <td width="189" colspan="3" valign="top">
                </td>
            </tr>
            <tr>
                <td width="66" valign="top">
                    <p>
                        VI.
                    </p>
                </td>
                <td width="614" colspan="14" valign="top">
                    <p>
                        ALAMAT SELAMA MENJALANKAN CUTI
                    </p>
                </td>
            </tr>
            <tr>
                <td width="332" colspan="6" valign="top">
                    <p>
                        Keterangan ( Varchar )
                    </p>
                </td>
                <td width="113" colspan="5" valign="top">
                    <p>
                        No. Telefon :
                    </p>
                    <p>
                        ( int )
                    </p>
                </td>
                <td width="235" colspan="4" valign="top">
                    <p>
                        Hormat saya
                    </p>
                    <p>
                        <strong><u></u></strong>
                    </p>
                    <p>
                        <strong>NIP : </strong>
                        <strong> <?php echo $row['nip'] ?></strong>
                    </p>
                </td>
            </tr>
            <?php 
                if ($row['ketua'] == null && $row['panmud_kasubag'] != null && $row['panitera_sekretaris'] != null) {
                    $atasankasubagpanmud = $row['panmud_kasubag'];
                    $atasanpaniterasekretaris = $row['panitera_sekretaris'];

                    $selectpanmudkasubag = mysqli_query($koneksi, "SELECT * FROM pegawai pg, jabatan jb WHERE pg.id_jabatan = jb.id_jabatan and pg.nip='$atasankasubagpanmud'");
                    $kasubagpanmudrow = mysqli_fetch_array($selectpanmudkasubag);

                    $selectpaniterasekretaris = mysqli_query($koneksi, "SELECT * FROM pegawai pg, jabatan jb WHERE pg.id_jabatan = jb.id_jabatan and pg.nip='$atasanpaniterasekretaris'");
                    $paniterasekretarisrow = mysqli_fetch_array($selectpaniterasekretaris);
                    ?>
                <tr>
                    <td width="66" valign="top">
                        <p>
                            VII.
                        </p>
                    </td>
                    <td width="614" colspan="14" valign="top">
                        <p>
                            PERTIMBANGAN ATASAN LANGSUNG **
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="197" colspan="4" valign="top">
                        <p>
                            DISETUJUI
                        </p>
                    </td>
                    <td width="116" valign="top">
                        <p>
                            PERUBAHAN ****
                        </p>
                    </td>
                    <td width="132" colspan="6" valign="top">
                        <p>
                            DITANGGUHKAN ****
                        </p>
                    </td>
                    <td width="235" colspan="4" valign="top">
                        <p>
                            TIDAK DITETUJUI ****
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="197" colspan="4" valign="top">
                    </td>
                    <td width="116" valign="top">
                    </td>
                    <td width="132" colspan="6" valign="top">
                    </td>
                    <td width="235" colspan="4" valign="top">
                    </td>
                </tr>
                <tr>
                    <td width="445" colspan="11" valign="top">
                    </td>
                    <td width="235" colspan="4" valign="top">

                    
                        <p>
                            <strong><?php echo $kasubagpanmudrow['nama_jabatan'] ?> </strong>
                        </p>
                        <p>
                            <strong></strong>
                        </p>
                        <p>
                            <strong></strong>
                        </p>
                        <p>
                            <strong></strong>
                        </p>
                        <p>
                            <strong><u><?php echo $kasubagpanmudrow['nama_pegawai'] ?> </u></strong>
                        </p>
                        <p>
                            <strong>NIP : <?php echo $kasubagpanmudrow['nip'] ?></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="66" valign="top">
                    </td>
                    <td width="614" colspan="14" valign="top">
                    </td>
                </tr>
                <tr>
                    <td width="66" valign="top">
                    </td>
                    <td width="614" colspan="14" valign="top">
                    </td>
                </tr>
                <tr>
                    <td width="66" valign="top">
                        <p>
                            VIII.
                        </p>
                    </td>
                    <td width="614" colspan="14" valign="top">
                        <p>
                            KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="151" colspan="3" valign="top">
                        <p>
                            DISETUJUI
                        </p>
                    </td>
                    <td width="162" colspan="2" valign="top">
                        <p>
                            PERUBAHAN ****
                        </p>
                    </td>
                    <td width="132" colspan="6" valign="top">
                        <p>
                            DITANGGUHKAN ****
                        </p>
                    </td>
                    <td width="235" colspan="4" valign="top">
                        <p>
                            TIDAK DISETUJUI
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="151" colspan="3" valign="top">
                    </td>
                    <td width="162" colspan="2" valign="top">
                    </td>
                    <td width="132" colspan="6" valign="top">
                    </td>
                    <td width="235" colspan="4" valign="top">
                    </td>
                </tr>
                <tr>
                    <td width="445" colspan="11" valign="top">
                    </td>
                    <td width="235" colspan="4" valign="top">
                        <p>
                            <?php echo $paniterasekretarisrow['nama_jabatan'] ?>
                        </p>
                        <p>
                            <strong><u> <?php echo $paniterasekretarisrow['nama_pegawai'] ?></u></strong>
                        </p>
                        <p>
                            <strong>NIP.</strong>
                            <strong> </strong>
                            <strong><?php echo $paniterasekretarisrow['nip'] ?></strong>
                        </p>
                    </td>
                </tr>
                    <?php
                } else if ($row['panmud_kasubag'] == null && $row['panitera_sekretaris'] == null && $row['ketua'] == null) {

                    ?>
                    <tr>
                        <td width="66" valign="top">
                            <p>
                                VII.
                            </p>
                        </td>
                        <td width="614" colspan="14" valign="top">
                            <p>
                                PERTIMBANGAN ATASAN LANGSUNG **
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="197" colspan="4" valign="top">
                            <p>
                                DISETUJUI
                            </p>
                        </td>
                        <td width="116" valign="top">
                            <p>
                                PERUBAHAN ****
                            </p>
                        </td>
                        <td width="132" colspan="6" valign="top">
                            <p>
                                DITANGGUHKAN ****
                            </p>
                        </td>
                        <td width="235" colspan="4" valign="top">
                            <p>
                                TIDAK DITETUJUI ****
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="197" colspan="4" valign="top">
                        </td>
                        <td width="116" valign="top">
                        </td>
                        <td width="132" colspan="6" valign="top">
                        </td>
                        <td width="235" colspan="4" valign="top">
                        </td>
                    </tr>
                    <tr>
                        <td width="445" colspan="11" valign="top">
                        </td>
                        <td width="235" colspan="4" valign="top">

                        
                            <p>
                                <strong> </strong>
                            </p>
                            <p>
                                <strong></strong>
                            </p>
                            <p>
                                <strong></strong>
                            </p>
                            <p>
                                <strong></strong>
                            </p>
                            <p>
                                <strong><u> </u></strong>
                            </p>
                            <p>
                                <strong>NIP : </strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="66" valign="top">
                        </td>
                        <td width="614" colspan="14" valign="top">
                        </td>
                    </tr>
                    <tr>
                        <td width="66" valign="top">
                        </td>
                        <td width="614" colspan="14" valign="top">
                        </td>
                    </tr>
                    <tr>
                        <td width="66" valign="top">
                            <p>
                                VIII.
                            </p>
                        </td>
                        <td width="614" colspan="14" valign="top">
                            <p>
                                KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="151" colspan="3" valign="top">
                            <p>
                                DISETUJUI
                            </p>
                        </td>
                        <td width="162" colspan="2" valign="top">
                            <p>
                                PERUBAHAN ****
                            </p>
                        </td>
                        <td width="132" colspan="6" valign="top">
                            <p>
                                DITANGGUHKAN ****
                            </p>
                        </td>
                        <td width="235" colspan="4" valign="top">
                            <p>
                                TIDAK DISETUJUI
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="151" colspan="3" valign="top">
                        </td>
                        <td width="162" colspan="2" valign="top">
                        </td>
                        <td width="132" colspan="6" valign="top">
                        </td>
                        <td width="235" colspan="4" valign="top">
                        </td>
                    </tr>
                    <tr>
                        <td width="445" colspan="11" valign="top">
                        </td>
                        <td width="235" colspan="4" valign="top">
                            <p>
                                
                            </p>
                            <p>
                                <strong><u></u></strong>
                            </p>
                            <p>
                                <strong>NIP.</strong>
                                <strong> </strong>
                                <strong></strong>
                            </p>
                        </td>
                    </tr>
                    <?php

                } else if ($row['panmud_kasubag'] == null && $row['panitera_sekretaris'] == null && $row['ketua'] != null) {


                    ?>
                    <tr>
                        <td width="66" valign="top">
                            <p>
                                VII.
                            </p>
                        </td>
                        <td width="614" colspan="14" valign="top">
                            <p>
                                PERTIMBANGAN ATASAN LANGSUNG **
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="197" colspan="4" valign="top">
                            <p>
                                DISETUJUI
                            </p>
                        </td>
                        <td width="116" valign="top">
                            <p>
                                PERUBAHAN ****
                            </p>
                        </td>
                        <td width="132" colspan="6" valign="top">
                            <p>
                                DITANGGUHKAN ****
                            </p>
                        </td>
                        <td width="235" colspan="4" valign="top">
                            <p>
                                TIDAK DITETUJUI ****
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="197" colspan="4" valign="top">
                        </td>
                        <td width="116" valign="top">
                        </td>
                        <td width="132" colspan="6" valign="top">
                        </td>
                        <td width="235" colspan="4" valign="top">
                        </td>
                    </tr>
                    <tr>
                        <td width="445" colspan="11" valign="top">
                        </td>
                        <td width="235" colspan="4" valign="top">

                        
                            <p>
                                <strong></strong>
                            </p>
                            <p>
                                <strong></strong>
                            </p>
                            <p>
                                <strong></strong>
                            </p>
                            <p>
                                <strong></strong>
                            </p>
                            <p>
                                <strong><u></u></strong>
                            </p>
                            <p>
                                <strong>NIP : </strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="66" valign="top">
                        </td>
                        <td width="614" colspan="14" valign="top">
                        </td>
                    </tr>
                    <tr>
                        <td width="66" valign="top">
                        </td>
                        <td width="614" colspan="14" valign="top">
                        </td>
                    </tr>
                    <tr>
                        <td width="66" valign="top">
                            <p>
                                VIII.
                            </p>
                        </td>
                        <td width="614" colspan="14" valign="top">
                            <p>
                                KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="151" colspan="3" valign="top">
                            <p>
                                DISETUJUI
                            </p>
                        </td>
                        <td width="162" colspan="2" valign="top">
                            <p>
                                PERUBAHAN ****
                            </p>
                        </td>
                        <td width="132" colspan="6" valign="top">
                            <p>
                                DITANGGUHKAN ****
                            </p>
                        </td>
                        <td width="235" colspan="4" valign="top">
                            <p>
                                TIDAK DISETUJUI
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="151" colspan="3" valign="top">
                        </td>
                        <td width="162" colspan="2" valign="top">
                        </td>
                        <td width="132" colspan="6" valign="top">
                        </td>
                        <td width="235" colspan="4" valign="top">
                        </td>
                    </tr>
                    <tr>
                        <td width="445" colspan="11" valign="top">
                        </td>
                        <td width="235" colspan="4" valign="top">
                            <p>
                                KETUA
                            </p>
                            <p>
                                <strong><u>Dr. M. BASIR, M.H.</u></strong>
                            </p>
                            <p>
                                <strong>NIP.</strong>
                                <strong> </strong>
                                <strong>196507021992031005</strong>
                            </p>
                        </td>
                    </tr>
                    <?php

                } else if ($row['panmud_kasubag'] == null && $row['panitera_sekretaris'] != null && $row['ketua'] != null) {
                    $atasantengahpaniterasekretaris = $row['panitera_sekretaris'];

                    $selecttengahpaniterasekretaris = mysqli_query($koneksi, "SELECT * FROM pegawai pg, jabatan jb WHERE pg.id_jabatan = jb.id_jabatan and pg.nip='$atasantengahpaniterasekretaris'");
                    $tengahpaniterasekretarisrow = mysqli_fetch_array($selecttengahpaniterasekretaris);
                    ?>
                <tr>
                    <td width="66" valign="top">
                        <p>
                            VII.
                        </p>
                    </td>
                    <td width="614" colspan="14" valign="top">
                        <p>
                            PERTIMBANGAN ATASAN LANGSUNG **
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="197" colspan="4" valign="top">
                        <p>
                            DISETUJUI
                        </p>
                    </td>
                    <td width="116" valign="top">
                        <p>
                            PERUBAHAN ****
                        </p>
                    </td>
                    <td width="132" colspan="6" valign="top">
                        <p>
                            DITANGGUHKAN ****
                        </p>
                    </td>
                    <td width="235" colspan="4" valign="top">
                        <p>
                            TIDAK DITETUJUI ****
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="197" colspan="4" valign="top">
                    </td>
                    <td width="116" valign="top">
                    </td>
                    <td width="132" colspan="6" valign="top">
                    </td>
                    <td width="235" colspan="4" valign="top">
                    </td>
                </tr>
                <tr>
                    <td width="445" colspan="11" valign="top">
                    </td>
                    <td width="235" colspan="4" valign="top">

                    
                        <p>
                            <strong><?php echo $tengahpaniterasekretarisrow['nama_jabatan'] ?> </strong>
                        </p>
                        <p>
                            <strong></strong>
                        </p>
                        <p>
                            <strong></strong>
                        </p>
                        <p>
                            <strong></strong>
                        </p>
                        <p>
                            <strong><u><?php echo $tengahpaniterasekretarisrow['nama_pegawai'] ?> </u></strong>
                        </p>
                        <p>
                            <strong>NIP : <?php echo $tengahpaniterasekretarisrow['nip'] ?></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="66" valign="top">
                    </td>
                    <td width="614" colspan="14" valign="top">
                    </td>
                </tr>
                <tr>
                    <td width="66" valign="top">
                    </td>
                    <td width="614" colspan="14" valign="top">
                    </td>
                </tr>
                <tr>
                    <td width="66" valign="top">
                        <p>
                            VIII.
                        </p>
                    </td>
                    <td width="614" colspan="14" valign="top">
                        <p>
                            KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="151" colspan="3" valign="top">
                        <p>
                            DISETUJUI
                        </p>
                    </td>
                    <td width="162" colspan="2" valign="top">
                        <p>
                            PERUBAHAN ****
                        </p>
                    </td>
                    <td width="132" colspan="6" valign="top">
                        <p>
                            DITANGGUHKAN ****
                        </p>
                    </td>
                    <td width="235" colspan="4" valign="top">
                        <p>
                            TIDAK DISETUJUI
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="151" colspan="3" valign="top">
                    </td>
                    <td width="162" colspan="2" valign="top">
                    </td>
                    <td width="132" colspan="6" valign="top">
                    </td>
                    <td width="235" colspan="4" valign="top">
                    </td>
                </tr>
                <tr>
                    <td width="445" colspan="11" valign="top">
                    </td>
                    <td width="235" colspan="4" valign="top">
                        <p>
                            KETUA
                        </p>
                        <p>
                            <strong><u> Dr. M. BASIR, M.H.</u></strong>
                        </p>
                        <p>
                            <strong>NIP.</strong>
                            <strong> </strong>
                            <strong>196507021992031005</strong>
                        </p>
                    </td>
                </tr>
                <?php

                }

                ?>
            <tr height="0">
                <td width="66">
                </td>
                <td width="36">
                </td>
                <td width="49">
                </td>
                <td width="46">
                </td>
                <td width="116">
                </td>
                <td width="19">
                </td>
                <td width="8">
                </td>
                <td width="19">
                </td>
                <td width="8">
                </td>
                <td width="77">
                </td>
                <td width="1">
                </td>
                <td width="46">
                </td>
                <td width="9">
                </td>
                <td width="10">
                </td>
                <td width="170">
                </td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>