<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Jabatan;
use app\models\Unit; 
use app\models\AuthItem; 

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($pegawai, 'nama_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($pegawai, 'nip_nik')->textInput() ?>

    <?= $form->field($pegawai, 'alamat_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($pegawai, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($assignment, 'item_name')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(AuthItem::find()->where(['type' => 1])->all(),'name','name'),
        'options' => ['placeholder' => 'Level'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Level User');
    ?>

    <?= $form->field($pegawai, 'kode_jabatan')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Jabatan::find()->all(),'kode_jabatan','nama_jabatan'),
        'options' => ['placeholder' => 'nama_jabatan'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('nama jabatan');
    ?>

    <?= $form->field($pegawai, 'id_unit')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Unit::find()->all(),'id_unit','nama_unit'),
        'options' => ['placeholder' => 'nama_unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Unit');
    ?>



    <?= $form->field($pegawai, 'foto')->fileInput() ?>
    <?php
        if ($pegawai->foto) {
            echo Html::img(Yii::getAlias('@web').'/'.$pegawai->foto,['height' => '100px', 'width'=>'100px']); 
        }
    ?>



    <div class="form-group">
        <?= Html::submitButton($pegawai->isNewRecord ? 'Create' : 'Update', ['class' => $pegawai->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
