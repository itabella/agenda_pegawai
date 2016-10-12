<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ruang".
 *
 * @property integer $id_ruang
 * @property string $nama_ruang
 *
 * @property DetailRuangAgenda[] $detailRuangAgendas
 */
class Ruang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ruang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_ruang'], 'required'],
            [['nama_ruang'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ruang' => 'Id Ruang',
            'nama_ruang' => 'Nama Ruang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailRuangAgendas()
    {
        return $this->hasMany(DetailRuangAgenda::className(), ['id_ruang' => 'id_ruang']);
    }
}
