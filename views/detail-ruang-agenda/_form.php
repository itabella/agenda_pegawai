<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Ruang;

/* @var $this yii\web\View */
/* @var $model app\models\DetailRuangAgenda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-ruang-agenda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_agenda_peserta')->textInput() ?>

    <?= $form->field($model, 'id_ruang')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Ruang::find()->all(),'id_ruang','nama_ruang'),
        'options' => ['placeholder' => 'nama_ruang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Nama Ruang');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
