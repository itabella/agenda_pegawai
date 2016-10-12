<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPegawai */

$this->params['breadcrumbs'][] = ['label' => 'Detail Agenda Pegawai', 'url' => ['index']];
?>
<div class="detail-agenda-pegawai-view">
<center>
    <h1>Detail Agenda Pegawai</h1>
</center><br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_detail_agenda',
            'idAgenda.nama_agenda',
            'idAgenda.tanggal',
            'idAgenda.tanggal_entry',
           //'kodeTugas.nama_tugas',
            'idAgenda.keterangan',
            'idAgenda.update_by',
        ],
    ]) ?>

    <h2>Daftar Pimpinan Rombongan</h2>
  
     <?php 
     foreach ($peserta as $key) {
        echo $key->idPegawai->nama_pegawai;
        echo "<br>";
     }
    ?>
     <?= Html::a('Tambah PJ', ['tambah', 'id' => $model->id_detail_agenda, 'id_agenda'=>$model->id_agenda],  ['class' => 'btn btn-primary']) ?>

</div>
