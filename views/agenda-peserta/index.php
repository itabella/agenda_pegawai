<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgendaPesertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agenda Peserta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-peserta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Agenda Peserta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_agenda_peserta',
            'nama_aktivitas',
            'waktu_mulai',
            'waktu_selesai',
            'keterangan:ntext',
            'tanggal_entry',
            'update_by',
            'idAgenda.nama_agenda',
            'idUnit.nama_unit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
