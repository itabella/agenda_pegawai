<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Pegawai;
use app\models\Tugas;
use app\models\DetailAgendaPegawai;

/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-agenda-pegawai-form">
<center><h1>FORM TAMBAH PESERTA</h1></center>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_agenda')->textInput([ 'value'=>$id_agenda ,'readOnly'=>true]) ?>

  
    <?= $form->field($model, 'id_pegawai')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Pegawai::find()->all(),'id_pegawai','nama_pegawai'),
        'options' => ['placeholder' => 'nama_pegawai'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Nama Pegawai');
    ?>

    <?= $form->field($model, 'kode_tugas')->hiddenInput([ 'value'=>$kode_tugas=2 ])->label(false) ?>

    
     <?php //$form->field($model, 'kode_tugas')->widget(Select2::classname(), [
     //   // 'data' => ArrayHelper::map(Tugas::find()->$model->'1','kode_tugas','nama_tugas'),
     //    'data' => ArrayHelper::map(Tugas::find()->where(['kode_tugas'=>1])->all())
     //    'options' => ['placeholder' => 'nama_tugas'],
     //    'pluginOptions' => [
     //        'allowClear' => true
     //    ],
     //    ])->label('Nama Tugas');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
