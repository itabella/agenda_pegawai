<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaPeserta */

$this->title = $model->id_agenda_peserta;
$this->params['breadcrumbs'][] = ['label' => 'Agenda Peserta', 'url' => ['index']];

?>
<div class="agenda-peserta-view">

 
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_agenda_peserta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_agenda_peserta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_agenda_peserta',
            'nama_aktivitas',
            'waktu_mulai',
            'waktu_selesai',
            'keterangan:ntext',
            'tanggal_entry',
            'update_by',
            'idAgenda.nama_agenda',
            'idUnit.nama_unit',
            'idRuang.nama_ruang',
        ],
    ]) ?>

</div>
