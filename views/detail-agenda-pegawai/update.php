<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPegawai */

$this->title = 'Update Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Detail Agenda Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detail_agenda, 'url' => ['view', 'id' => $model->id_detail_agenda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-agenda-pegawai-update">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
