<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SifatAgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sifat Agenda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sifat-agenda-index">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sifat Agenda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id_sifat_agenda',
            'nama_sifat_agenda',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
