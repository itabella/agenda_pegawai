<?php

use yii\helpers\Html;
use app\models\pegawai;

/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPeserta */
/* detai agenda peserta digunakan untuk menghubungkan agenda peserta dimana agendanya banyak*/

$this->title = 'Tambah Detail Agenda Peserta';
$this->params['breadcrumbs'][] = ['label' => 'Detail Agenda Peserta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-agenda-peserta-create">
<center>
    <h1><?= Html::encode($this->title) ?></h1>
</center><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
