<?php
  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
  $pdf->SetTitle('Daftar Peminjaman');
  $pdf->SetHeaderMargin(30);
  $pdf->SetTopMargin(20);
  $pdf->setFooterMargin(20);
  $pdf->SetAutoPageBreak(true);
  $pdf->SetAuthor('Ramdhan Eka Saputra');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->AddPage();
  $i=0;

  $html = '<h3>Daftar Peminjaman</h3>
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th width="5%" align="center">No</th>
      <th width="20%" align="center">Nama Peminjaman</th>
      <th width="28%" align="center">Tanggal Pinjam</th>
      <th width="28%" align="center">Tanggal Kembali</th>
      <th width="19%" align="center">Status Peminjaman</th>
    </tr>';

  foreach( $peminjaman as $row ) {
    $i++;
    $html .= '<tr>
      <td align="center">' . $i . '</td>
      <td>' . $row['nama_pegawai'] . '</td>
      <td>' . date('D, d M Y - H:i', strtotime( $row['tanggal_pinjam'] ) ) . '</td>
      <td>' . date('D, d M Y - H:i', strtotime( $row['tanggal_kembali'] ) ) . '</td>
      <td align="center">' . $row['status_peminjaman'] . '</td>
    </tr>';
  }

  $html .= '</table>';

  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('daftar_peminjaman.pdf', 'I');
?>
