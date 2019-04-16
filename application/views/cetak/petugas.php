<?php
  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
  $pdf->SetTitle('Daftar Produk');
  $pdf->SetHeaderMargin(30);
  $pdf->SetTopMargin(20);
  $pdf->setFooterMargin(20);
  $pdf->SetAutoPageBreak(true);
  $pdf->SetAuthor('Author');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->AddPage();
  $i=0;

  $html = '<h3>Daftar Petugas</h3>
  <table border="1" cellpadding="2" cellspacing="0">
    <tr>
      <th width="5%" align="center">No</th>
      <th width="35%" align="center">Username</th>
      <th width="45%" align="center">Nama Petugas</th>
      <th width="15%" align="center">Level</th>
    </tr>';

  foreach( $petugas as $row ) {
    $i++;
    $html .= '<tr>
      <td align="center">' . $i . '</td>
      <td>' . $row['username'] . '</td>
      <td>' . $row['nama_petugas'] . '</td>
      <td align="center">' . $row['nama_level'] . '</td>
    </tr>';
  }

  $html .= '</table>';

  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('daftar_produk.pdf', 'I');
?>
