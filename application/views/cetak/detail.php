<?php
  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
  $pdf->SetTitle('Daftar Detail');
  $pdf->SetHeaderMargin(30);
  $pdf->SetTopMargin(20);
  $pdf->setFooterMargin(20);
  $pdf->SetAutoPageBreak(true);
  $pdf->SetAuthor('Ramdhan Eka Saputra');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->AddPage();
  $i=0;

  $html = '<h3>Daftar Detail</h3>
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th width="5%" align="center">No</th>
      <th width="25%" align="center">Nama Peminjam</th>
      <th width="25%" align="center">Tanggal Pinjam</th>
      <th width="25%" align="center">Tanggal Kembali</th>
      <th width="20%" align="center">Status Peminjaman</th>
    </tr>';

  foreach( $detail as $row ) {
    $i++;
    $html .= '<tr>
      <td align="center">' . $i . '</td>
      <td>' . $row['nama_pegawai'] . '</td>
      <td align="center">' . date('D, d M Y', strtotime( $row['tanggal_pinjam'] )) . '</td>
      <td align="center">' . date('D, d M Y', strtotime( $row['tanggal_kembali'] )) . '</td>
      <td align="center">' . $row['status_peminjaman'] . '</td>
      </tr>';

      $html .= '<tr>
        <td></td>
        <td align="center">Kode Barang</td>
        <td colspan="2" align="center">Nama Barang</td>
        <td align="center">Jumlah Barang</td>
      </tr>';

      foreach( $row['detail'] as $col ) {
        $html .= '<tr>
          <td></td>
          <td align="center">' . $col['kode_inventaris'] . '</td>
          <td colspan="2" align="center">' . $col['nama'] . '</td>
          <td align="center">' . $col['jumlah'] . '</td>
        </tr>';
      }
  }

  $html .= '</table>';

  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('daftar_detail.pdf', 'I');
?>
