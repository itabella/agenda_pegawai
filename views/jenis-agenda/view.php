<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JenisAgenda */


$this->params['breadcrumbs'][] = ['label' => 'Jenis Agenda', 'url' => ['index']];
?>
<div class="jenis-agenda-view">
<center>
    <h1>Jenis Agenda</h1>
</center><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_jenis_agenda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_jenis_agenda], [
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
            'id_jenis_agenda',
            'jenis_agenda',
        ],
    ]) ?>

</div>
