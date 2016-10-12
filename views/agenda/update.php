<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agenda */


$this->params['breadcrumbs'][] = ['label' => 'Agenda', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_agenda, 'url' => ['view', 'id' => $model->id_agenda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agenda-update">
<center>
    <h1>Edit Agenda</h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
