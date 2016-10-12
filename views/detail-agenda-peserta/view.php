<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPeserta */

$this->params['breadcrumbs'][] = ['label' => 'Detail Agenda Peserta', 'url' => ['index']];
?>
<div class="detail-agenda-peserta-view">
<center>
    <h1>Detail Agenda Peserta</h1>
</center><br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_detail_agenda_peserta',
            'idAgendaPeserta.nama_aktivitas',
            'idAgendaPeserta.waktu_mulai',
            'idAgendaPeserta.waktu_selesai',
            'idAgendaPeserta.tanggal_entry',
            'idAgendaPeserta.keterangan',
            'idAgendaPeserta.update_by',
        ],
    ]) ?>

<?= DetailView::widget([
        'model' => $ruang,
        'attributes' => [
            'idRuang.nama_ruang',
        ],
    ]) ?>

    <h4><center><b>Daftar Peserta rapat</b></center></h4>
    <table border="0" width="800px" align="center">


      <?php foreach ($peserta as $key) {
        echo "<tr align='center'>";
        echo "<td>".$key->idPegawai->nama_pegawai."</td>";
        echo "</tr>";

      }?>
    </table>

</br>

    <center>
    <?= Html::a('Cetak Presensi', ['detail-agenda-peserta/pdfreport',
     'id' => $model->id_detail_agenda_peserta,
     'id_agenda_peserta' => $model->id_agenda_peserta,
    ], [
    'class'=>'btn btn-danger',
    'target'=>'_blank',
    'data-toggle'=>'tooltip',
    'title'=>'Will open the generated PDF file in a new window'
       ]);
    ?>

    <?= Html::a('Kirim SMS', ['detail-agenda-peserta/send-sms',
    //'id' => $model->id_detail_agenda_peserta,
     'id_agenda_peserta' => $model->id_agenda_peserta,
    ], ['class' => 'btn btn-success'
     ]) ?>
    </center>


</div>
