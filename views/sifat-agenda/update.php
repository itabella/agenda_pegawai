<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SifatAgenda */

$this->title = 'Edit Sifat Agenda';
$this->params['breadcrumbs'][] = ['label' => 'Sifat Agenda', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sifat-agenda-update">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
