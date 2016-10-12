<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailRuangAgenda */

$this->title = 'Update Detail Ruang Agenda';
$this->params['breadcrumbs'][] = ['label' => 'Detail Ruang Agenda', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-ruang-agenda-update">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
   </center><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
