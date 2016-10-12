<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailAgendaPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agenda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-agenda-pegawai-index">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Agenda', ['agenda/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_detail_agenda',
            'idAgenda.nama_agenda',
            'idPegawai.nama_pegawai',
            'kodeTugas.nama_tugas',


             [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>',
                            ['view', 'id' => $model->id_detail_agenda, 'id_agenda' => $model->id_agenda],
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
