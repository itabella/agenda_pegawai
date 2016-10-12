<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property integer $id_unit
 * @property string $nama_unit
 *
 * @property Agenda[] $agendas
 * @property AgendaPeserta[] $agendaPesertas
 * @property Pegawai[] $pegawais
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_unit'], 'required'],
            [['nama_unit'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_unit' => 'Id Unit',
            'nama_unit' => 'Nama Unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendas()
    {
        return $this->hasMany(Agenda::className(), ['id_unit' => 'id_unit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaPesertas()
    {
        return $this->hasMany(AgendaPeserta::className(), ['id_unit' => 'id_unit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['id_unit' => 'id_unit']);
    }
}
