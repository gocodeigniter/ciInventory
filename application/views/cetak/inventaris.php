<?php
  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
  $pdf->SetTitle('Daftar Inventaris');
  $pdf->SetHeaderMargin(30);
  $pdf->SetTopMargin(20);
  $pdf->setFooterMargin(20);
  $pdf->SetAutoPageBreak(true);
  $pdf->SetAuthor('Ramdhan Eka Saputra');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->AddPage();
  $i=0;

  $html = '<h3>Daftar Inventaris</h3>
  <table border="1" cellpadding="2" cellspacing="0">
    <tr>
      <th width="5%" align="center">No</th>
      <th width="10%" align="center">Kode</th>
      <th width="12%" align="center">Nama</th>
      <th width="13%" align="center">Jenis</th>
      <th width="10%" align="center">Kondisi</th>
      <th width="10%" align="center">Jumlah</th>
      <th width="15%" align="center">Tanggal Register</th>
      <th width="15%" align="center">Keterangan</th>
      <th width="10%" align="center">Nama Petugas</th>
      <th width="4%" align="center">Ruang</th>
    </tr>';

  foreach( $inventaris as $row ) {
    $i++;
    $html .= '<tr>
      <td align="center">' . $i . '</td>
      <td align="center">' . $row['kode_inventaris'] . '</td>
      <td align="center">' . $row['nama'] . '</td>
      <td align="center">' . $row['nama_jenis'] . '</td>
      <td align="center">' . $row['kondisi'] . '</td>
      <td align="center">' . $row['jumlah'] . '</td>
      <td align="center">' . date('D, d M Y', strtotime( $row['tanggal_register'] ) ) . '</td>
      <td align="center">' . $row['keterangan'] . '</td>
      <td align="center">' . $row['nama_petugas'] . '</td>
      <td align="center">' . $row['nama_ruang'] . '</td>
    </tr>';
  }

  $html .= '</table>';

  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('daftar_inventaris.pdf', 'I');
?>
