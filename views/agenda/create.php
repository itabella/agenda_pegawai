<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Agenda */
$this->title = 'Tambah Agenda';
$this->params['breadcrumbs'][] = ['label' => 'Agenda', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-create">

    <center><h1><?= Html::encode($this->title) ?></h1></center><br><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
