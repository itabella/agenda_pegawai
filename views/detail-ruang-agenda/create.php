<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DetailRuangAgenda */

$this->title = 'Tambah Detail Ruang Agenda';
$this->params['breadcrumbs'][] = ['label' => 'Detail Ruang Agenda', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-ruang-agenda-create">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
