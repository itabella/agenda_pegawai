<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ruang */

$this->title = 'Edit Ruang';
$this->params['breadcrumbs'][] = ['label' => 'Ruang', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ruang-update">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
