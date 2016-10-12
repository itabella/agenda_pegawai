<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SifatAgenda */

$this->params['breadcrumbs'][] = ['label' => 'Sifat Agenda', 'url' => ['index']];
?>
<div class="sifat-agenda-view">
<center>
    <h1>Detail Sifat Agenda</h1>
</center><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_sifat_agenda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sifat_agenda], [
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
            'id_sifat_agenda',
            'nama_sifat_agenda',
        ],
    ]) ?>

</div>
