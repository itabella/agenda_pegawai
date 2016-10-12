<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPeserta */
?>
<br><br><br><br><br>
    <h1 align="center">Presensi Rapat</h1>
<br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idAgendaPeserta.nama_aktivitas',
            'idAgendaPeserta.waktu_mulai',
        ],

    ])  ?>


    <p><b>Daftar Peserta rapat</b></p>
    <table border="1" width="800px">
     <tr >
      <th width="5%" align="center"> No. </th>
      <th width="35%" align="center"> Nama </th>
      <th width="15%" align="center"> Waktu Kehadiran </th>
      <th width="30%" align="center"> Tanda Tangan </th>
    </tr>
    
      $i=0;
      <?php foreach ($peserta as $key) {
        $i++;
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$key->idPegawai->nama_pegawai."</td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";
        
      }?>
    </table>
