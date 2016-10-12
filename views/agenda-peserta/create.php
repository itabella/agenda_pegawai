<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AgendaPeserta */

$this->title = 'Create Agenda Peserta';
$this->params['breadcrumbs'][] = ['label' => 'Agenda Peserta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-peserta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
