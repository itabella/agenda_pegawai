<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\JenisAgenda;
use app\models\SifatAgenda;
use app\models\Unit;
use app\models\pegawai;


/* @var $this yii\web\View */
/* @var $model app\models\Agenda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agenda-form">

    <?php $form = ActiveForm::begin(); ?>
    <center>
     <table border="0" width="1000px">
     <tr ><td width="45%">
     <?= $form->field($model, 'nama_agenda')->textInput(['maxlength' => true]) ?>
     <?= $form->field($model, 'tanggal')->widget(DateTimePicker::classname(), [
         'model' => $model,
        'attribute' => 'datetime_2',
        'options' => ['placeholder' => 'waktu'],
        'pluginOptions' => [
        'autoclose' => true
         ]
    ]);
    ?>

   

    <?= $form->field($model, 'tanggal_entry')->hiddenInput(['value'=> date("Y-m-d H:i:s")])->label(false)?>

    <?= $form->field($model, 'update_by')->hiddenInput(['value'=>@Yii::$app->user->identity->username ])->label(false)?>
    
    <?= $form->field($model, 'id_jenis_agenda')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(JenisAgenda::find()->all(),'id_jenis_agenda','jenis_agenda'),
        'options' => ['placeholder' => 'jenis_agenda'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('jenis agenda');
    ?>

    <?= $form->field($model, 'id_sifat_agenda')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(SifatAgenda::find()->all(),'id_sifat_agenda','nama_sifat_agenda'),
        'options' => ['placeholder' => 'nama_sifat_agenda'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Sifat agenda');
    ?>

   
    </td><td width="10%" align="center">
    </td><td width="45%">

     <?= $form->field($model, 'id_unit')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Unit::find()->all(),'id_unit','nama_unit'),
        'options' => ['placeholder' => 'nama_unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Nama Unit');
    ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    </td></tr></table></center>
    <?php ActiveForm::end(); ?>

</div>
