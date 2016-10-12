<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailAgendaPesertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Agenda Peserta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-agenda-peserta-index">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Detail Agenda Peserta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_detail_agenda_peserta',
            'idAgendaPeserta.nama_aktivitas',
            'idAgendaPeserta.waktu_mulai',
            'idAgendaPeserta.waktu_selesai',
            'idAgendaPeserta.update_by',
            //'idPegawai.nama_pegawai',

                [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>',
                            ['view', 'id' => $model->id_detail_agenda_peserta, 'id_agenda_peserta' => $model->id_agenda_peserta],
                            [
                                'title' => 'View',
                                'data-pjax' => '0',
                            ]
                        );
                    },

                ],
            ],
        ],
    ]); ?>
</div>
