<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Agenda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-index">

    <center><h1><?= Html::encode($this->title) ?></h1></center>
    <br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Agenda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_agenda',
            'nama_agenda',
            'tanggal',
            'keterangan:ntext',
            //'tanggal_entry',
            // 'update_by',
            // 'id_jenis_agenda',
            // 'id_sifat_agenda',
            // 'id_unit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
