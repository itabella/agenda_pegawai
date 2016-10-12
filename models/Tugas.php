<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tugas".
 *
 * @property integer $kode_tugas
 * @property string $nama_tugas
 *
 * @property DetailAgendaPegawai[] $detailAgendaPegawais
 */
class Tugas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tugas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_tugas'], 'required'],
            [['nama_tugas'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_tugas' => 'Kode Tugas',
            'nama_tugas' => 'Nama Tugas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailAgendaPegawais()
    {
        return $this->hasMany(DetailAgendaPegawai::className(), ['kode_tugas' => 'kode_tugas']);
    }
}
