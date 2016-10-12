<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\DetailAgendaPeserta;
use yii\helpers\ArrayHelper;
use app\models\Pegawai;
use softark\duallistbox\DualListbox;


/* @var $this yii\web\View */
/* @var $model app\models\DetailAgendaPeserta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form">
 
    <?php $form = ActiveForm::begin(); ?>

    <?php
        $options = [
            'multiple' => true,
            'size' => 2,
        ];
    ?>

    <?php
    echo $form->field($model, 'number')->widget(DualListbox::classname(), [
        'attribute' => 'no_hp',
        'items' => ArrayHelper::map($data,'id_pegawai','nama_pegawai'),
        'options' => $options,
        'clientOptions' => [
            'moveOnSelect' => false,
            'selectedListLabel' => 'Daftar Kontak Terpilih',
                   'nonSelectedListLabel' => 'Daftar Kontak Tersedia',
        ],
        ])->label('Nomor HP');
    ?>
        <?= $form->field($model, 'text')->textarea(['rows' => 6])?>
      <center> 
        <div class="form-group">
            <?= Html::submitButton('Kirim SMS', ['detail-agenda-peserta/kirim-sms'], ['class' => 'btn btn-success']) ?>
   

        <?= Html::submitButton('Batal', ['detail-agenda-peserta/view'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin membatalkan pesan ini?',
                'method' => 'post',
            ],
        ]) ?>

          </div>
          </center>
    <?php ActiveForm::end(); ?>
 
</div><!-- form -->