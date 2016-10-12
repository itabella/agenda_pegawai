<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tugas */

$this->params['breadcrumbs'][] = ['label' => 'Tugas', 'url' => ['index']];
?>
<div class="tugas-view">
<center>
    <h1>View Tugas</h1>
</center><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kode_tugas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kode_tugas], [
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
            'kode_tugas',
            'nama_tugas',
        ],
    ]) ?>

</div>
