<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Pegawai;
use app\models\Tugas;
use app\models\Agenda;

/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-agenda-pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_agenda')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Agenda::find()->all(),'id_agenda','nama_agenda'),
        'options' => ['placeholder' => 'nama_agenda'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Nama Agenda');
    ?>


  
    <?= $form->field($model, 'id_pegawai')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Pegawai::find()->all(),'id_pegawai','nama_pegawai'),
        'options' => ['placeholder' => 'nama_pegawai'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Nama Pegawai');
    ?>

    <?= $form ->field($model, 'kode_tugas')->hiddenInput( ['value'=>$kode_tugas=2])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
