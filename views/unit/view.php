<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->params['breadcrumbs'][] = ['label' => 'Unit', 'url' => ['index']];
?>
<div class="unit-view">
<center>
    <h1>View Unit</h1>
</center>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_unit], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_unit], [
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
            'id_unit',
            'nama_unit',
        ],
    ]) ?>

</div>
