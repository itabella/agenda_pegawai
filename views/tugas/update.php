<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tugas */

$this->title = 'Edit Tugas';
$this->params['breadcrumbs'][] = ['label' => 'Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tugas-update">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
