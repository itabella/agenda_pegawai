<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisAgenda */

$this->title = 'Create Jenis Agenda';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Agenda', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-agenda-create">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
