<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ruang */

$this->params['breadcrumbs'][] = ['label' => 'Ruang', 'url' => ['index']];

?>
<div class="ruang-view">
<center>
    <h1>Detail ruang</h1>
</center><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_ruang], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_ruang], [
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
            'id_ruang',
            'nama_ruang',
        ],
    ]) ?>

</div>
