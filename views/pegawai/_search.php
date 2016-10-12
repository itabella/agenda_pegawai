<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'nama_pegawai') ?>

    <?= $form->field($model, 'nip_nik') ?>

    <?= $form->field($model, 'alamat_pegawai') ?>

    <?= $form->field($model, 'no_hp') ?>

    <?= $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'kode_jabatan') ?>

    <?php // echo $form->field($model, 'id_unit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
