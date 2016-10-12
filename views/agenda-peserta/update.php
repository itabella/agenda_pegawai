<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaPeserta */

$this->title = 'Update Agenda Peserta ';
$this->params['breadcrumbs'][] = ['label' => 'Agenda Peserta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_agenda_peserta, 'url' => ['view', 'id' => $model->id_agenda_peserta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agenda-peserta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
