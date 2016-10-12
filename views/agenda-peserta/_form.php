<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\agenda;
use app\models\unit;
use app\models\Ruang;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaPeserta */
/* @var $form yii\widgets\ActiveForm */
$addon = <<< HTML
<span class="input-group-addon">
    <i class="glyphicon glyphicon-calendar"></i>
</span>
HTML;
?>

<div class="agenda-peserta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_aktivitas')->textInput(['maxlength' => true]) ?>

  <?php
echo '<div class="input-group drp-container">';
echo DateRangePicker::widget([
   'model'=>$model,
   'attribute' => 'kvdate1',
   'useWithAddon'=>true,
   'convertFormat'=>true,
   'startAttribute' => 'waktu_mulai',
   'endAttribute' => 'waktu_selesai',
   'pluginOptions'=>[
     'timePicker'=>true,
     'timePickerIncrement'=>5,
     'locale'=>['format' => 'Y-m-d H:i:s'],
   ]
]) . $addon;
echo '</div>';?>

    <?= $form->field($model, 'id_agenda')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Agenda::find()->all(),'id_agenda','nama_agenda'),
        'options' => ['placeholder' => 'nama_agenda'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Nama agenda');
    ?>

    <?= $form->field($model, 'id_unit')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Unit::find()->all(),'id_unit','nama_unit'),
        'options' => ['placeholder' => 'nama_unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Nama unit');
    ?>

    <?= $form->field($model, 'id_ruang')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Ruang::find()->all(),'id_ruang','nama_ruang'),
        'options' => ['placeholder' => 'nama_ruang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Nama Ruang');
    ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_entry')->hiddenInput(['value'=> date("Y-m-d H:i:s")])->label(false)?>


    <?php // $form->field($model, 'update_by')->textInput() ?>
      <?= $form->field($model, 'update_by')->hiddenInput(['value'=>@Yii::$app->user->identity->username ])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
