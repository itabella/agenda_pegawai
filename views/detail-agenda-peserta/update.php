<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPeserta */

$this->title = 'Update Detail Agenda Peserta: ' . $model->id_detail_agenda_peserta;
$this->params['breadcrumbs'][] = ['label' => 'Detail Agenda Peserta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detail_agenda_peserta, 'url' => ['view', 'id' => $model->id_detail_agenda_peserta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-agenda-peserta-update">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
