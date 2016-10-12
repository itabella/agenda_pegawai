<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JenisAgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Agenda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-agenda-index">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jenis Agenda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_jenis_agenda',
            'jenis_agenda',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
