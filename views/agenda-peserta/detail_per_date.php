<?php

use yii\helpers\Html;
use yii\grid\GridView;
?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_agenda_peserta',
            'nama_aktivitas',
            'waktu_mulai',
            'waktu_selesai',
            'idRuang.nama_ruang',
            'keterangan:ntext',
            'idUnit.nama_unit',
            'tanggal_entry',
            'update_by',
            // 'id_agenda',
        ],
    ]);
?>
