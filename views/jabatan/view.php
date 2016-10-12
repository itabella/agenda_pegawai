<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jabatan */

$this->params['breadcrumbs'][] = ['label' => 'Jabatan', 'url' => ['index']];
?>
<div class="jabatan-view">
<center>
    <h1>View Jabatan</h1>
</center><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kode_jabatan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kode_jabatan], [
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
            'kode_jabatan',
            'nama_jabatan',
        ],
    ]) ?>

</div>
