<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisAgenda */

$this->title = 'Update Jenis Agenda';;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Agenda', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis_agenda, 'url' => ['view', 'id' => $model->id_jenis_agenda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-agenda-update">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
