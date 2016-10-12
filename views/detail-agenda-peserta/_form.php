<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pegawai;
use softark\duallistbox\DualListbox;
use kartik\select2\Select2;
use app\models\AgendaPeserta;

/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPeserta */
/* @var $form yii\widgets\ActiveForm */
?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-duallistbox.css" rel="stylesheet">
	

<div class="detail-agenda-peserta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'id_agenda_peserta')->textInput() ?>


     <?= $form->field($model, 'id_agenda_peserta')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(AgendaPeserta::find()->all(),'id_agenda_peserta','nama_aktivitas'),
        'options' => ['placeholder' => 'nama_aktivitas'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Nama aktivitas');
    ?>

   <?php
    $options = [
        'multiple' => true,
        'size' => 20,
    ];
    ?>

    <?= $form->field($model, 'id_pegawai')->widget(DualListbox::classname(), [
        'attribute' => 'id_pegawai',
        'items' => ArrayHelper::map(Pegawai::find()->all(),'id_pegawai','nama_pegawai'),
        'options' => $options,
        'clientOptions' => [
            'moveOnSelect' => false,
            'selectedListLabel' => 'Selected Items',
            'nonSelectedListLabel' => 'Available Items',
        ],
        ])->label('Nama Pegawai');
    ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
