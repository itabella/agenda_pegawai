<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DetailRuangAgenda */

$this->params['breadcrumbs'][] = ['label' => 'Detail Ruang Agenda', 'url' => ['index']];
?>
<div class="detail-ruang-agenda-view">
<center>
    <h1>View Detail Ruang</h1>
</center><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_detail_ruang_agenda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_detail_ruang_agenda], [
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
            //'id_detail_ruang_agenda',
            'id_agenda_peserta',
            'id_ruang',
        ],
    ]) ?>

</div>
