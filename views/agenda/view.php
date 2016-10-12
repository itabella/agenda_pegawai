<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\DetailAgendaPegawai;
use app\models\Pegawai;


/* @var $this yii\web\View */
/* @var $model app\models\Agenda */

?>
<div class="agenda-view">
<center>
    <h1><?= Html::encode('Detail Agenda') ?></h1>
</center><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_agenda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_agenda], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a('Tambah Penanggung Jawab', ['detail-agenda-pegawai/create',
            ], ['class' => 'btn btn-success']) 
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_agenda',
            'nama_agenda',
            'tanggal',
            'keterangan:ntext',
            'tanggal_entry',
            'update_by',
            'idJenisAgenda.jenis_agenda',
            'idSifatAgenda.nama_sifat_agenda',
            'idUnit.nama_unit',
        ],
    ]) ?>
   
</div>
