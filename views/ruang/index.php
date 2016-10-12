<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RuangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ruang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruang-index">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ruang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_ruang',
            'nama_ruang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
