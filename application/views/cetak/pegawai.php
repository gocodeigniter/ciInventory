<?php
  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
  $pdf->SetTitle('Daftar Pegawai');
  $pdf->SetHeaderMargin(30);
  $pdf->SetTopMargin(20);
  $pdf->setFooterMargin(20);
  $pdf->SetAutoPageBreak(true);
  $pdf->SetAuthor('Ramdhan Eka Saputra');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->AddPage();
  $i=0;

  $html = '<h3>Daftar Pegawai</h3>
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th width="5%" align="center">No</th>
      <th width="15%" align="center">NIP</th>
      <th width="35%" align="center">Nama Pegawai</th>
      <th width="45%" align="center">Alamat</th>
    </tr>';

  foreach( $pegawai as $row ) {
    $i++;
    $html .= '<tr>
      <td align="center">' . $i . '</td>
      <td align="center">' . $row['nip'] . '</td>
      <td>' . $row['nama_pegawai'] . '</td>
      <td>' . $row['alamat'] . '</td>
    </tr>';
  }

  $html .= '</table>';

  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('daftar_pegawai.pdf', 'I');
?>
