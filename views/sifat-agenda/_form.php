<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SifatAgenda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sifat-agenda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_sifat_agenda')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
