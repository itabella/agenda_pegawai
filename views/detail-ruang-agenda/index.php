<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailRuangAgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Ruang Agenda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-ruang-agenda-index">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detail Ruang Agenda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detail_ruang_agenda',
            'id_agenda_peserta',
            'id_ruang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
