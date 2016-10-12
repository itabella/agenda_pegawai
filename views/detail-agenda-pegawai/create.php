<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPegawai */

$this->title = 'Tambah Penanggung Jawab';
$this->params['breadcrumbs'][] = ['label' => 'Tambah Penangung Jawab', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-agenda-pegawai-create">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
