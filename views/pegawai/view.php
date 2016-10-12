<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
?>
<div class="pegawai-view">
<center>
    <h1>Detail Pegawai</h1>
</center><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pegawai], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pegawai], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            array(
                'attribute'=>'foto',
                'value'=>'@web/uploads/' .$model->foto,
                'format' => ['image',['width'=>'120','height'=>'150']],
                ),
            //'id_pegawai',
            'nama_pegawai',
            'nip_nik',
            'alamat_pegawai',
            'no_hp',
            'kodeJabatan.nama_jabatan',
            'idUnit.nama_unit',
        ],
    ]) ?>

</div>
